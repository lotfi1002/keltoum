<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'firstname', 'lastname','arabicfirstname','arabiclastname','address','arabicaddress','cne','codemassar','datenaissance', 'lieunaissance', 'lieunaissancearab','sexe','autre','datecreation','nompere','nommere','cinpere','telepere','telemere','email','active'
    ];
}
