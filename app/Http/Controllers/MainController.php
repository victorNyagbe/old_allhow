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
                $pdf_path = '';
                $pdf_taille = '';
                $video_path = '';
                $video_taille = '';

                switch ($fileTypeIdentity) {
                    case '2294':
                        $video_taille = Fichier::where('document_id', $document->id)->value('taille_video');

                        $video_path = Fichier::where('document_id', $document->id)->value('path_video');

                        $fileType = 'Video';
                        break;

                    case '1146':
                        $pdf_taille = Fichier::where('document_id', $document->id)->value('taille_pdf');

                        $pdf_path = Fichier::where('document_id', $document->id)->value('path_pdf');

                        $fileType = 'PDF';
                        break;
                    
                    default:
                        abort('404');
                        break;
                }

                return view('visitors.showDocument', compact('document', 'video_taille', 'video_path', 'pdf_taille', 'pdf_path', 'fileType'));
            
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
        $frenchDocs = Document::where([
            ['version', '=', 'french'],
            ['status', '=', 1]
        ])->simplePaginate(20);
        return $frenchDocs;
    }

    public function getEnglishDocs() {
        $englishDocs = Document::where([
            ['version', '=', 'english'],
            ['status', '=', 1]
        ])->simplePaginate(20);
        return $englishDocs;
    }
}
