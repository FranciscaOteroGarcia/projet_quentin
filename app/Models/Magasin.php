<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function voiture(){
        return $this->hasMany('App\Models\Voiture');
    }
}
