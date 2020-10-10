<?php

namespace App\Exports;

use App\Propietario;
use Maatwebsite\Excel\Concerns\FromCollection;

class PropietarioExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Propietario::all();
    }
}
