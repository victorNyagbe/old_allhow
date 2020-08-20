<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendeur;

class Document extends Model
{
    protected $guarded = ['id'];

    public function getStatusAttribute($attribute) {
        return [
            0 => 'En attente',
            1 => 'Approuvé',
            2 => 'Rejeté'
        ][$attribute];
    }

    public function vendeur() {
        return $this->belongsTo(Vendeur::class);
    }
}
