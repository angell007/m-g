<?php

namespace App\Exports;

use App\Inmueble;
use Maatwebsite\Excel\Concerns\FromCollection;

class InmuebleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inmueble::all();
    }
}
