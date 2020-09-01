<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Vendeur;
use App\Fichier;
use Illuminate\Support\Str;

class Document extends Model
{

    use SoftDeletes;

    protected $guarded = ['id'];

    public function getStatusAttribute($attribute) {
        return [
            0 => 'En attente',
            1 => 'Approuvé'
        ][$attribute];
    }

    public function vendeur() {
        return $this->belongsTo(Vendeur::class);
    }

    public function fichiers() {
        return $this->hasMany(Fichier::class);
    }

    public function pathShowDoc() {
        return url("document/{$this->id}-" . Str::slug($this->nom) . "/show");
    }
}
