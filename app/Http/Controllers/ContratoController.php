<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContratoStoreRequest;
use App\Http\Requests\ContratoUpdateRequest;
use App\Repositories\ContratoRepository;

class ContratoController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContratoRepository $contratoRepository)
    {
        $this->repository = $contratoRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return $this->repository->all();
        }
        return view('contrato.index');
    }

    public function show($id)
    {
        try {
            $contrato = $this->repository->find($id);
            if (null == $contrato) {
                return response()->json(['error' =>  'Contrato no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $contrato, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(ContratoStoreRequest $contratoRequest)
    {
        try {
            $contrato = $this->repository->Create($contratoRequest->all());
            return response()->json(['data' => $contrato, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(ContratoUpdateRequest $contratoUpdateRequest, $id)
    {
        try {
            if ($this->repository->update($contratoUpdateRequest->all(), $id)) {
                return response()->json(['error' =>  'Update Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Contrato no found', 'code' => 404], 404);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Contrato no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
