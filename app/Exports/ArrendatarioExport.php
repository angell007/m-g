<?php

namespace App\Exports;

use App\Arrendatario;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArrendatarioExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Arrendatario::all();
    }
}
