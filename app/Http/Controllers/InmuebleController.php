<?php

namespace App\Http\Controllers;

use App\Http\Requests\InmuebleStoreRequest;
use App\Http\Requests\InmuebleUpdateRequest;
use App\Inmueble;
use App\Propietario;
use App\Repositories\InmuebleRepository;
use Illuminate\Support\Facades\File;

class InmuebleController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InmuebleRepository $InmuebleRepository)
    {
        $this->repository = $InmuebleRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return response()->json($this->repository->all());
        }
        return view('inmueble.index');
    }

    public function show($id)
    {
        $inmueble = $this->repository->find($id);

        if (request()->wantsJson()) {
            try {
                if (null == $inmueble) {
                    return response()->json(['error' =>  'Inmueble no found', 'code' => 404], 404);
                }
                return response()->json(['data' =>  $inmueble, 'code' => 200], 200);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
            }
        }
        return view('inmueble.show', compact('inmueble'));
    }

    public function store(InmuebleStoreRequest $InmuebleRequest)
    {
        try {
            $Inmueble = $this->repository->Create($InmuebleRequest->all());
            switch ($Inmueble->tipo) {
                case 'apartamento':
                    $Inmueble->codigo = "Apto-" . $Inmueble->id;
                    break;
                case 'bodega':
                    $Inmueble->codigo = "Bd-" . $Inmueble->id;
                    break;
                case 'local':
                    $Inmueble->codigo = "Lc-" . $Inmueble->id;
                    break;
                case 'casa':
                    $Inmueble->codigo = "Cs-" . $Inmueble->id;
                    break;
            }
            $Inmueble->save();

            return response()->json(['data' => $Inmueble, 'message' => 'Registro Exitoso', 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 200], 200);
        }
    }

    public function update(InmuebleUpdateRequest $InmuebleUpdateRequest)
    {
        try {

            if ($this->repository->update($InmuebleUpdateRequest->all(), request()->get('id'))) {
                return response()->json(['data' => $this->repository->find(request()->get('id')), 'message' => 'Update Correcto',  'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Inmueble no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 200], 200);
        }
    }

    public function destroy($id)
    {
        try {
            if (($this->repository->delete($id))) {
                return response()->json(['data' =>  'Eliminado Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Inmueble no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function uploadPortada()
    {
        if (request()->expectsJson()) {
            try {
                if (request()->file('image')) {
                    $inmueble = Inmueble::find(request()->get('id'));
                    File::delete(public_path('/file/' .  $inmueble->portada));
                    $filename = '_' . time() . '.' . request()->file('image')->getClientOriginalExtension();
                    request()->file('image')->move(public_path() . "/file", $filename);
                    $inmueble->portada = $filename;
                    $inmueble->save();
                    return response()->json(['data' =>  $inmueble->portada, 'code' => 200], 200);
                }
                return response()->json(['error' => request()->file('image'), 'code' => 404], 404);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
            }
        }
    }


    public function filtrado()
    {
        try {

            if (request()->wantsJson()) {
                try {
                    $query = Inmueble::query();

                    $query->when(request()->get('SearchPropietario') != null, function ($q) {
                        $propietario = Propietario::where(
                            'identificacion',
                            'like',
                            '%' .  request()->get('SearchPropietario')  . '%'
                        )->first();

                        if ($propietario != null) {
                            return $q->where('propietario_id', 'like', '%' . $propietario->id  . '%');
                        }
                    });
                    $query->when(request()->get('SearchCodigo') != null, function ($q) {
                        return $q->where('codigo', 'like', '%' . request()->get('SearchCodigo')  . '%');
                    });
                    $query->when(request()->get('SearchDireccion') != null, function ($q) {
                        return $q->where('direccion', 'like', '%' . request()->get('SearchDireccion')  . '%');
                    });
                    $query->when(request()->get('SearchCiudad') != null, function ($q) {
                        return $q->where('ciudad', 'like', '%' . request()->get('SearchCiudad')  . '%');
                    });

                    $query->when(request()->get('SearchDepartamento') != null, function ($q) {
                        return $q->where('departamento', 'like', '%' . request()->get('SearchDepartamento')  . '%');
                    });

                    $query->when(request()->get('SearchProposito') != null, function ($q) {
                        return $q->where('proposito', 'like', '%' . request()->get('SearchProposito')  . '%');
                    });

                    $inmuebles = $query->with('propietario:id,nombre,apellido,identificacion,full_name')->orderBy('id', 'Desc')->get([
                        'propietario_id',
                        'codigo',
                        'direccion',
                        'ciudad',
                        'departamento',
                        'proposito',
                        'habitaciones',
                        'canon',
                        'portada',
                        'descripcion',
                        'id'
                    ]);

                    return response()->json(compact('inmuebles'), 200);
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function search($codigo)
    {
        try {
            $inmueble = Inmueble::where('codigo', $codigo)->first();
            return response()->json(['data' => $inmueble, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
