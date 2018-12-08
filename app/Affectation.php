<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    //
    protected $fillable = [
        'id_anneacademique','id_etudiant','etat','id_classe'
    ];
    
}
