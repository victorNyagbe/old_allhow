<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Vendeur;
use App\Fichier;
use Illuminate\Support\Facades\Mail;
use App\Mail\SellerSendDocument;

class DocumentController extends Controller
{

    public function __construct(){
        $this->middleware('check.session');
    }
    
    public function SellerSendDocumentForm() {
        return view('sellers.documents.send');
    }
    public function sellerSendDocument(Request $request) {
        
        $request->validate([
            'document' => 'required|string',
            'fichier_doc' => 'required|file|mimes:pdf,zip,doc,docx'
        ],
        [
            'document.required' => 'Veuillez renseigner le nom du document',
            'document.string' => 'Le nom du document doit être une chaîne de caractères',
            'fichier_doc.required' => 'Veuillez choisir un fichier',
            'fichier_doc.file' => 'Votre document n\'est pas un fichier',
            'fichier_doc.mimes' => 'Votre document doit avoir une extension .pdf ou .doc ou .docx'
        ]);

        $taille = $_FILES['fichier_doc']['size'] / 1000000;

        if (request()->has('fichier_doc')) {
            $documentToBeExaminated = Document::create([
                'nom' => $request->input('document'),
                'status' => 0,
                'vendeur_id' => session()->get('id')
            ]);

            $documentFiles = Fichier::create([
                'path_pdf' => request()->fichier_doc->storeAs('db/fichiers/temp/pdfs/', time() . "_" . $request->file('fichier_doc')->getClientOriginalName(), 'public'),
                'taille_pdf' => $taille,
                'document_id' => $documentToBeExaminated->id
            ]);
        }

        $allhowMail = 'deblaa.ap@gmail.com';

        $vendeur = Vendeur::where('id', session()->get('id'))->first();

        $data = [
            'username' => $vendeur->username,
            'email' => $vendeur->email,
            'nomDoc' => $documentToBeExaminated->nom,
            'document' => $documentFiles->path_pdf      
        ];

        Mail::to($allhowMail)->send(new SellerSendDocument($data));

        return redirect(route('sellers.documents'))->with('success', 'Votre document a été envoyé avec succès. On vous donnera le statut du document après son étude');    
    }

    public function listDoc() {
        $documents = Document::where('vendeur_id', session()->get('id'))->get();
        return view('sellers.documents.list', compact('documents'));
    }
}
