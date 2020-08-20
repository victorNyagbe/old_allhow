<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;

class DocController extends Controller
{
    public function showDocInPending($document) {
        $doc = Document::where('id', $document)->value('path');
        return view('administrations.documents.show', compact('doc'));
    }
}
