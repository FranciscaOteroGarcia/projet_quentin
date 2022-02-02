<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function marques(){
        return $this->belongsTo('App\Models\Marque');
    }

    public function magasin(){
        return $this->belongsTo('App\Models\Magasin');
    }

}
