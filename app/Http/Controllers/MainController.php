<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use App\Fichier;


class MainController extends Controller
{
    public function showDoc($id) {
        if (!session()->has('identity')) {
            abort('404');
        } else {
            $fileTypeIdentity = session()->get('identity');
            $document = Document::find($id);

            if ($document == null) {
                abort('404');
            } else {

                switch ($fileTypeIdentity) {
                    case '2294':
                        $file = Fichier::where('document_id', $document->id)->get(['taille_video', 'path_video']);
                        $fileType = 'Video';
                        break;

                    case '1146':
                        $file = Fichier::where('document_id', $document->id)->get(['taille_pdf', 'path_pdf']);
                        $fileType = 'PDF';
                        break;
                    
                    default:
                        abort('404');
                        break;
                }

                return view('visitors.showDocument', compact('document', 'file', 'fileType'));
            
            }
        }

    }

    public function accueil() {
        $documents = $this->getFrenchDocs();
        $frenchzone = 'frenchzone';
        return view('visitors.accueil', compact('frenchzone', 'documents'));
    }

    public function accueilpdf() {
        $documents = $this->getFrenchDocs();
        $frenchzone = 'frenchzone';
        return view('visitors.accueilpdf', compact('frenchzone', 'documents'));
    }

    public function home() {
        $docs = $this->getEnglishDocs();
        $englishzone = 'englishzone';
        return view('visitors.english.home', compact('englishzone', 'docs'));
    }

    public function homepdf() {
        $docs = $this->getEnglishDocs();
        $englishzone = 'englishzone';
        return view('visitors.english.homepdf', compact('englishzone', 'docs'));
    }

    public function getFrenchDocs() {
        $frenchDocs = Document::where('version', 'french')->simplePaginate(20);
        return $frenchDocs;
    }

    public function getEnglishDocs() {
        $englishDocs = Document::where('version', 'english')->simplePaginate(20);
        return $englishDocs;
    }
}
