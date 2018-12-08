<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    protected $fillable = [
        'nom', 'nom_arabe','address','address_arabe','raison_social'
    ];
}
