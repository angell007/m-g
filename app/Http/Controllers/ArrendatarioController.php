<?php

namespace App\Http\Controllers;

use App\Arrendatario;
use App\Http\Requests\ArrendatarioStoreRequest;
use App\Http\Requests\ArrendatarioUpdateRequest;
use App\Repositories\ArrendatarioRepository;

class ArrendatarioController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArrendatarioRepository $arrendatarioRepository)
    {
        $this->repository = $arrendatarioRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return $this->repository->all();
        }

        return view('arrendatario.index');
    }

    public function show($id)
    {
        try {
            $arrendatario = $this->repository->find($id);
            if (null == $arrendatario) {
                return response()->json(['error' =>  'Arrendatario no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $arrendatario, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(ArrendatarioStoreRequest $arrendatarioRequest)
    {
        try {
            $arrendatario = $this->repository->Create($arrendatarioRequest->all());
            return response()->json(['data' => $arrendatario,  'message' => 'Registro correcto', 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 200], 200);
        }
    }

    public function update(ArrendatarioUpdateRequest $arrendatarioUpdateRequest)
    {
        try {
            if ($this->repository->update($arrendatarioUpdateRequest->except(['_token', '_method']), $arrendatarioUpdateRequest->get('id'))) {
                return response()->json(['message' =>  'Update Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Arrendatario no found', 'code' => 404], 404);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Arrendatario no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function search()
    {
        try {
            return response()
                ->json(['data' => Arrendatario::with('contratos', 'contratos.inmueble', 'contratos.pago_recibidos')->where('identificacion', request()->get('identificacion'))->first(), 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function filtrado()
    {
        try {


            if (request()->wantsJson()) {

                try {

                    $query = Arrendatario::query();

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

                    $arrendatarios = $query->get(['nombre', 'apellido', 'email', 'identificacion', 'tipo_identificacion', 'direccion', 'telefono','id' ]);

                    return response()->json(compact('arrendatarios'), 200);
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
