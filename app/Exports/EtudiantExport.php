<?php

namespace App\Exports;

use App\Etudiant;
use Maatwebsite\Excel\Concerns\FromCollection;

class EtudiantExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Etudiant::all();
    }
}
