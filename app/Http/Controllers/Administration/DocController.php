<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use App\Vendeur;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\DocumentApprovedMail;

class DocController extends Controller
{
    public function showDocToBeApproved($document) {
        $doc = Document::where('id', $document)->first();
        return view('administrations.documents.showDocToBeApproved', compact('doc'));
    }

    public function approveDocumentByAdmin(Request $request) {
        $request->validate([
            'docId' => 'required',
            'docAuthorId' => 'required',
            'docAuthor' => 'required',
            'docNameFr' => 'required',
            'docNameEn' => 'required',
            'docPDFFr' => 'required',
            'docPDFEn' => 'required',
            'docVideoFr' => 'required',
            'docVideoEn' => 'required'
        ],
        [
            'docId.required' => 'L\'identité de ce document est inexistante',
            'docAuthorId.required' => 'Veuillez renseigner l\'auteur de ce document',
            'docNameFr.required' => 'Veuillez renseigner le nom de ce document en français',
            'docNameEn.required' => 'Veuillez renseigner le nom de ce document en anglais',
            'docPDFFr.required' => 'Veuillez charger le PDF du document en version française',
            'docPDFEn.required' => 'Veuillez charger le PDF du document en version anglaise',
            'docVideoFr.required' => 'Veuillez charger la vidéo du document en version française',
            'docVideoEn.required' => 'Veuillez charger la vidéo du document en version anglaise',
            'docAuthor.required' => 'Champ auteur non renseigné'
        ]);

        $documentApproved = Document::find($request->input('docId'));

        if ($documentApproved == null) {
            return back()->with('error', 'Ce document est inexistant ou introuvable');
        } else {

            if (request()->has('docPDF') && request()->has('docVideo')) {

                File::delete([
                    public_path('db/fichiers/temp/pdfs/' . $documentApproved->pathpdf)
                ]);

                $taille_pdf = $_FILES['docPDFFr']['size'] / 1000000;
                $taille_video = $_FILES['docVideoFr']['size'] / 1000000;

                $documentApproved->update([
                    'pathpdf' => request()->docPDFFr->storeAs('db/fichiers/fr/pdfs/', time() . "_" . $request->file('docPDFFr')->getClientOriginalName(), 'public'),
                    'pathvideo' => request()->docVideoFr->storeAs('db/fichiers/fr/videos/', time() . "_" . $request->file('docVideoFr')->getClientOriginalName(), 'public'),
                    'nom' => $request->input('docNameFr'),
                    'vendeur_id' => $request->input('docAuthorId'),
                    'status' => 1,
                    'taillepdf' => $taille_pdf,
                    'taillevideo' => $taille_video,
                    'version' => 'french'
                ]);

                $documentTranslated = Document::create([
                    'pathpdf' => request()->docPDFEn->storeAs('db/fichiers/en/pdfs/', time() . "_" . $request->file('docPDFEn')->getClientOriginalName(), 'public'),
                    'pathvideo' => request()->docVideoEn->storeAs('db/fichiers/en/videos/', time() . "_" . $request->file('docVideoEn')->getClientOriginalName(), 'public'),
                    'nom' => $request->input('docNameEn'),
                    'vendeur_id' => $request->input('docAuthorId'),
                    'status' => 1,
                    'taillepdf' => $taille_pdf,
                    'taillevideo' => $taille_video,
                    'version' => 'english'
                ]);

            }

            $author = Vendeur::where('id', $documentApproved->vendeur_id)->value('username');
            $author_email = Vendeur::where('id', $documentApproved->vendeur_id)->value('email');

            $data = [
                'username' => $author,
                'nom_document' => $documentApproved->nom,
                'author_mail' => $author_email
            ];

            Mail::to($author_email)->send(new DocumentApprovedMail($data))->subject('Validation Document');

            return redirect(route('administration.docApproved'))->with('success', 'Le document ' . $documentApproved->nom . ' de ' . $author . ' a été approuvé avec succès. La version anglaise est ' . $documentTranslated->nom);
        }
    }

    public function rejectDocumentByAdmin($document) {
        $findDocument = Document::find($document);

        if ($findDocument == null) {
            return back()->with('error', 'Ce document n\'existe pas');
        } else {
            $findDocument->delete();

            return back()->with('success', 'Le document a été rejeté avec succès');
        }
    }
}
