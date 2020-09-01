<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use App\Vendeur;
use App\Fichier;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\DocumentApprovedMail;
use App\Mail\DocumentRejectedMail;

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
            'docPDFFr' => 'required|mimes:pdf',
            'docPDFEn' => 'required|mimes:pdf',
            'docVideoFr' => 'required|mimes:mp4,avi',
            'docVideoEn' => 'required|mimes:mp4,avi'
        ],
        [
            'docId.required' => 'L\'identité de ce document est inexistante',
            'docAuthorId.required' => 'Veuillez renseigner l\'auteur de ce document',
            'docNameFr.required' => 'Veuillez renseigner le nom de ce document en français',
            'docNameEn.required' => 'Veuillez renseigner le nom de ce document en anglais',
            'docPDFFr.required' => 'Veuillez charger le PDF du document en version française',
            'docPDFFr.mimes' => 'Veuillez charger le PDF du document version française en extension .pdf',
            'docPDFEn.required' => 'Veuillez charger le PDF du document en version anglaise',
            'docPDFEn.mimes' => 'Veuillez charger le PDF du document version anglaise en extension .pdf',
            'docVideoFr.required' => 'Veuillez charger la vidéo du document en version française',
            'docVideoFr.mimes' => 'Veuillez charger la vidéo du document version française en extension .mp4 ou .avi',
            'docVideoEn.required' => 'Veuillez charger la vidéo du document en version anglaise',
            'docVideoEn.mimes' => 'Veuillez charger la vidéo du document version anglaise en extension .mp4 ou .avi',
            'docAuthor.required' => 'Champ auteur non renseigné'
        ]);

        $documentApproved = Document::find($request->input('docId'));

        if ($documentApproved == null) {
            return back()->with('error', 'Ce document est inexistant ou introuvable');
        } else {

            $fileSendBySeller = Fichier::where('document_id', $documentApproved->id)->first();

            if (request()->has('docPDFFr') && request()->has('docVideoFr')) {

                File::delete([
                    public_path('storage/' . $fileSendBySeller->path_pdf)
                ]);

                $taille_pdfFr= $_FILES['docPDFFr']['size'] / 1000000;
                $taille_videoFr = $_FILES['docVideoFr']['size'] / 1000000;

                $taille_pdfEn = $_FILES['docPDFEn']['size'] / 1000000;
                $taille_videoEn = $_FILES['docVideoEn']['size'] / 1000000;

                $documentApproved->update([
                    'nom' => $request->input('docNameFr'),
                    'vendeur_id' => $request->input('docAuthorId'),
                    'status' => 1,
                    'reference' => 'doc_' . time(),
                    'version' => 'french'
                ]);

                $saveFrenchFiles = Fichier::create([
                    'path_pdf' => request()->docPDFFr->storeAs('db/fichiers/fr/pdfs/', time() . "_" . $request->file('docPDFFr')->getClientOriginalName(), 'public'),
                    'path_video' => request()->docVideoFr->storeAs('db/fichiers/fr/videos/', time() . "_" . $request->file('docVideoFr')->getClientOriginalName(), 'public'),
                    'taille_pdf' => $taille_pdfFr,
                    'taille_video' => $taille_videoFr,
                    'document_id' => $documentApproved->id
                ]);

                $documentTranslated = Document::create([
                    'nom' => $request->input('docNameEn'),
                    'vendeur_id' => $request->input('docAuthorId'),
                    'status' => 1,
                    'reference' => $documentApproved->reference,
                    'version' => 'english'
                ]);

                $saveEnglishFiles  = Fichier::create([
                    'path_pdf' => request()->docPDFEn->storeAs('db/fichiers/en/pdfs/', time() . "_" . $request->file('docPDFEn')->getClientOriginalName(), 'public'),
                    'path_video' => request()->docVideoEn->storeAs('db/fichiers/en/videos/', time() . "_" . $request->file('docVideoEn')->getClientOriginalName(), 'public'),
                    'taille_pdf' => $taille_pdfEn,
                    'taille_video' => $taille_videoEn,
                    'document_id' => $documentApproved->id
                ]);

            }

            $author = Vendeur::where('id', $documentApproved->vendeur_id)->value('username');
            $author_email = Vendeur::where('id', $documentApproved->vendeur_id)->value('email');

            $data = [
                'username' => $author,
                'nom_document' => $documentApproved->nom,
                'author_mail' => $author_email
            ];

            Mail::to($author_email)->send(new DocumentApprovedMail($data));

            return redirect(route('administration.docApproved'))->with('success', 'Le document ' . $documentApproved->nom . ' de ' . $author . ' a été approuvé avec succès. La version anglaise est ' . $documentTranslated->nom);
        }
    }

    public function rejectDocumentByAdmin($document) {
        $findDocument = Document::find($document);

        if ($findDocument == null) {

            return back()->with('error', 'Ce document n\'existe pas');

        } else {

            $documentToBeRejectedName = $findDocument->nom;

            $seller = Vendeur::where('id', $findDocument->vendeur_id)->first();

            $documentFile = Fichier::where('document_id', $findDocument->id)->first();

            $data = [
                'seller_name' => $seller->username,
                'seller_email' => $seller->email,
                'nom_document' => $findDocument->nom
            ];

            $findDocument->delete();

            File::delete([
                public_path('storage/' . $documentFile->path_pdf)
            ]);

            Mail::to($seller->email)->send(new DocumentRejectedMail($data));

            return back()->with('success', 'Le document ' . $documentToBeRejectedName . ' a été rejeté');
        }
    }
}
