<?php

namespace App\Http\Controllers;

// use App\Http\Requests\PagoRealizadoStoreRequest;
// use App\Http\Requests\PagoRealizadoUpdateRequest;
// use App\PagoRealizado;
// use App\Repositories\PagoRealizadoRepository;

class RegistroPagosController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function realizados()
    {
        return view('registro.realizado');
    }

    public function recibidos()
    {
        return view('registro.recibido');
    }

    public function descuentos()
    {
        return view('registro.descuento');
    }

}
