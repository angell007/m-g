<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendienteStoreRequest;
use App\Http\Requests\PendienteUpdateRequest;
use App\Pendiente;
use App\Repositories\PendienteRepository;

class PendienteController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PendienteRepository $pendienteRepository)
    {
        $this->repository = $pendienteRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return $this->repository->all();
        }
        return view('pendiente.index');
    }

    public function show($id)
    {
        try {
            $pendiente = $this->repository->find($id);
            if (null == $pendiente) {
                return response()->json(['error' =>  'Pendiente no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $pendiente, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(PendienteStoreRequest $pendienteRequest)
    {
        try {
            $pendiente = $this->repository->Create($pendienteRequest->all());
            return response()->json(['data' => $pendiente, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(PendienteUpdateRequest $pendienteUpdateRequest)
    {
        try {
            if ($this->repository->update($pendienteUpdateRequest->all(), request()->get('id'))) {
                return response()->json(['error' =>  'Update Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Pendiente no found', 'code' => 404], 404);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Pendiente no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }


    public function searchInContract($id)
    {
        try {
            $pendientes = Pendiente::with('contrato:id', 'user:name,id')
                ->where('contrato_id', $id)->get();
            return response()->json(['data' =>  $pendientes, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
