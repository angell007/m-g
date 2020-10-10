<?php

namespace App\Http\Controllers;

use App\Inmueble;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($nombre)
    {
        switch ($nombre) {
            case 'casas':
                $inmuebles =   $inmuebles = Inmueble::where('tipo',  'casa')->paginate(11);
                break;
            case 'locales':
                $inmuebles =   $inmuebles = Inmueble::where('tipo', 'local')->paginate(11);
                break;
            case 'bodegas':
                $inmuebles =   $inmuebles = Inmueble::where('tipo', 'bodega')->paginate(11);
                break;
            case 'apartamentos':
                $inmuebles =   $inmuebles = Inmueble::where('tipo', 'apartamento')->paginate(11);
                break;
            default:
                $inmuebles = Inmueble::all();
                break;
        }

        if (request()->wantsJson()) {
            return $inmuebles;
        }

        $nuevos = Inmueble::take(3)->get();
        return view('galeria.categorias', compact('inmuebles', 'nuevos'));
    }
    public function getCountCategory()
    {
        // if (request()->wantsJson()) {

        $countCategory = [];
        $countPropositos = [];
        $inmueblesTipos = Inmueble::get()->groupBy('tipo');
        $inmueblesPropositos = Inmueble::get()->groupBy('proposito');

        $inmueblesPropositos = Inmueble::get()->groupBy('proposito');

        foreach ($inmueblesTipos->keys() as $tipo) {
            $countCategory[$tipo] =  count($inmueblesTipos[$tipo]);
        }

        foreach ($inmueblesPropositos->keys() as $proposito) {
            $countPropositos[$proposito] =  count($inmueblesPropositos[$proposito]);
        }

        // return [$countCategory, $countPropositos];

        return request()->all();

        // return [$countCategory, $countPropositos];




        // }
    }
    public function getFiltered()
    {
        // if (request()->wantsJson()) {

        // foreach (request()->all() as ) {
        //     # code...
        // }

        // proposito: null
        // tipo: null
        // rango: null
        // habitaciones: null

        // amoblado: "on"
        // parqueadero: "on"
        // barrio: null
        // baños: null

        // return request()->all();


        $query = Inmueble::query();

        $query->when(request('proposito') != null, function ($q) {
            return $q->where('proposito', 'like', '%' . request()->get('proposito') . '%');
        });

        $query->when(request('tipo') != null, function ($q) {
            return $q->where('tipo', 'like', '%' . request()->get('tipo') . '%');
        });

        $query->when(request('rango') != null, function ($q) {

            $rango = 'canon';
            if (request()->get('rango') != null) {
                if (request()->get('proposito') == 'venta') {
                    $rango = 'precio';
                }
            }

            return $q->where($rango, '<=',  (float)(str_replace('.', '', request()->get('rango'))));
        });

        $query->when(request('habitaciones') == '3', function ($q) {
            return $q->where('habitaciones', '>=',  request()->get('habitaciones'));
        });

        $query->when(request('habitaciones') != null && request('habitaciones') != '3', function ($q) {
            return $q->where('habitaciones', '<=',  request()->get('habitaciones'));
        });

        // $query->when(request('amoblado') == 'on', function ($q) {
        //     return $q->where('tipo', 'like', '%' . request()->get('tipo') . '%');
        // });

        $resul = $query->paginate();
        return $resul;

        // $inmuebles = Inmueble::where('proposito', 'like', '%' . request()->get('proposito') . '%')
        //     ->where('tipo', 'like', '%' . request()->get('tipo') . '%')
        //     // ->where($rango, '<=', request()->get('rango') )
        //     ->get();

        // $countCategory = [];
        // $countPropositos = [];
        // $inmueblesTipos = Inmueble::get()->groupBy('tipo');
        // $inmueblesPropositos = Inmueble::get()->groupBy('proposito');

        // $inmueblesPropositos = Inmueble::get()->groupBy('proposito');

        // foreach ($inmueblesTipos->keys() as $tipo) {
        //     $countCategory[$tipo] =  count($inmueblesTipos[$tipo]);
        // }

        // foreach ($inmueblesPropositos->keys() as $proposito) {
        //     $countPropositos[$proposito] =  count($inmueblesPropositos[$proposito]);
        // }

        // }
    }

    public function show($codigo)
    {

        $codigo = ucfirst($codigo);
        $inmueble = Inmueble::with('imagenes')->where('codigo', $codigo)->firstOrFail();

        if (request()->wantsJson()) {

            try {

                $query = Inmueble::query();

                $query->when($inmueble->proposito != null, function ($q) use ($inmueble) {
                    return $q->where('proposito', 'like', '%' . $inmueble->proposito . '%');
                });

                $query->when($inmueble->tipo != null, function ($q)  use ($inmueble) {
                    return $q->where('tipo', 'like', '%' . $inmueble->tipo . '%');
                });

                $query->when($inmueble->rango != null, function ($q)  use ($inmueble) {

                    $rango = 'canon';
                    if ($inmueble->proposito == 'venta') {
                        $rango = 'precio';
                    }

                    return $q->where($rango, '<=',  (float)(str_replace('.', '', $inmueble->rango)));
                });

                $query->when($inmueble->habitaciones == '3', function ($q)  use ($inmueble) {
                    return $q->where('habitaciones', '>=', $inmueble->habitaciones);
                });

                $query->when($inmueble->habitaciones != null && $inmueble->habitaciones != '3', function ($q)  use ($inmueble) {
                    return $q->where('habitaciones', '<=', $inmueble->habitaciones);
                });

                $relacionados = $query->get();

                return response()->json([compact('inmueble', 'relacionados'), 200], 200);
            } catch (\Throwable $th) {
                throw $th;
            }
        }


        return view('galeria.show');
    }
}
