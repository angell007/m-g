<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function arrendatarios()
    {
        return view('informes.arrendatarios.front');
    }
}
