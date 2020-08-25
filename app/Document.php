<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Vendeur;

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
}
