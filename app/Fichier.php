<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Document;

class Fichier extends Model
{
    protected $guarded = [];

    public function document() {
        return $this->belongsTo(Document::class);
    }
}
