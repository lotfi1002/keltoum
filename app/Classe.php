<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{

    protected $fillable = [
        'nom_classe', 'cycle','niveau','id_ecole'
    ];
}
