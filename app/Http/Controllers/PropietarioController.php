<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropietarioStoreRequest;
use App\Http\Requests\PropietarioUpdateRequest;
use App\Propietario;
use App\Repositories\PropietarioRepository;

class PropietarioController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PropietarioRepository $propietarioRepository)
    {
        $this->repository = $propietarioRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return $this->repository->all();
        }
        return view('propietario.index');
    }

    public function show($id)
    {
        try {
            $propietario = $this->repository->find($id);
            if (null == $propietario) {
                return response()->json(['error' =>  'Propietario no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $propietario, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(PropietarioStoreRequest $propietarioRequest)
    {
        try {
            $propietario = $this->repository->Create($propietarioRequest->all());
            return response()->json(['data' => $propietario, 'message' => 'Registro exitoso', 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(PropietarioUpdateRequest $propietarioUpdateRequest)
    {
        try {
            if ($this->repository->update($propietarioUpdateRequest->except(['_token', '_method']), request()->get('id'))) {
                return response()->json(['message' =>  'Update Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Propietario no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function destroy($id)
    {
        try {
            if (($this->repository->delete($id))) {
                return response()->json(['data' =>  'Eliminado Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Propietario no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function search()
    {
        try {
            return response()
                ->json(['data' => Propietario::with('contratos', 'contratos.inmueble' , 'contratos.pago_realizados')->where('identificacion', request()->get('identificacion'))->first(), 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }


    public function filtrado()
    {
        try {


            if (request()->wantsJson()) {

                try {

                    $query = Propietario::query();

                    $query->when(request()->get('Searchnombre') != null, function ($q) {
                        return $q->where('nombre', 'like', '%' . request()->get('Searchnombre')  . '%');
                    });
                    $query->when(request()->get('Searchapellido') != null, function ($q) {
                        return $q->where('apellido', 'like', '%' . request()->get('Searchapellido')  . '%');
                    });
                    $query->when(request()->get('Searchemail') != null, function ($q) {
                        return $q->where('email', 'like', '%' . request()->get('Searchemail')  . '%');
                    });
                    $query->when(request()->get('Searchdocuemento') != null, function ($q) {
                        return $q->where('identificacion', 'like', '%' . request()->get('Searchdocuemento')  . '%');
                    });

                    $propietarios = $query->get(['nombre', 'apellido', 'email', 'identificacion', 'tipo_identificacion', 'direccion', 'telefono', 'id']);

                    return response()->json(compact('propietarios'), 200);
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
