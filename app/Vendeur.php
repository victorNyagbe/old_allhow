<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Document;

class Vendeur extends Model
{
    protected $guarded = ['id'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

}
