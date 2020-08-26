<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use App\Vendeur;

class MainController extends Controller
{
    public function dashboard(){
        $countApprovedDocuments = Document::where('status', 1)->count();
        $countPendingDocuments = Document::where('status', 0)->count();
        $countRejectedDocuments = Document::onlyTrashed()->count();
        $countSellers = Vendeur::all()->count();
        return view('administrations.dashboard', compact('countApprovedDocuments', 'countPendingDocuments', 'countRejectedDocuments', 'countSellers'));
    }

    public function documentsApproved() {
        $approvedDocuments = Document::where('status', 1)->get();
        return view('administrations.docApproved', compact('approvedDocuments'));
    }

    public function documentsPending() {
        $pendingDocuments = Document::where('status', 0)->get();
        return view('administrations.docPending', compact('pendingDocuments'));
    }

    public function documentsRejected() {
        $rejectedDocuments = Document::onlyTrashed()->get();
        return view('administrations.docRejected', compact('rejectedDocuments'));
    }

    public function listSellers() {
        $sellers = Vendeur::all();
        return view('administrations.sellers', compact('sellers'));
    }
}
