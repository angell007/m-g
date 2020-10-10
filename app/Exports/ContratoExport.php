<?php

namespace App\Exports;

use App\Contrato;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContratoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contrato::all();
    }
}
