<?php

namespace App\Http\Controllers;

use App\Arrendatario;
use App\Exports\ArrendatarioExport;
use App\Exports\PropietarioExport;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InformeController extends Controller
{
    public function arrendatarios()
    {
        return view('informes.arrendatarios.front');
    }
    public function descargarArrendatarios()
    {
        try {
            return Excel::download(new ArrendatarioExport(request()->all()), "informeArrendatarios _" . Carbon::now() . ".xlsx");
        } catch (\Throwable $th) {
            return json_encode($th->getMessage());
        }
    }

    public function propietarios()
    {
        return view('informes.propietarios.front');
    }
    public function descargarPropietarios()
    {
        try {
            return Excel::download(new PropietarioExport(request()->all()), "informePropietarios _" . Carbon::now() . ".xlsx");
        } catch (\Throwable $th) {
            return json_encode($th->getMessage());
        }
    }
}
