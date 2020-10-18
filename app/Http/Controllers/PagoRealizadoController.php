<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\Http\Requests\PagoRealizadoStoreRequest;
use App\Http\Requests\PagoRealizadoUpdateRequest;
use App\PagoRealizado;
use App\Repositories\PagoRealizadoRepository;

class PagoRealizadoController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PagoRealizadoRepository $realizadoRepository)
    {
        $this->repository = $realizadoRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return $this->repository->all();
        }
        return view('realizado.index');
    }

    public function show($id)
    {
        try {
            $realizado = $this->repository->find($id);
            if (null == $realizado) {
                return response()->json(['error' =>  'PagoRealizado no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $realizado, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(PagoRealizadoStoreRequest $realizadoRequest)
    {
        try {
            $contrato = Contrato::where('codigo', request()->get('codigo'))->first(['id']);
            $data = request()->all();
            $data['contrato_id'] = $contrato->id;
            $realizado = $this->repository->Create($data);
            return response()->json(['data' => $realizado, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(PagoRealizadoUpdateRequest $realizadoUpdateRequest, $id)
    {
        try {
            if ($this->repository->update($realizadoUpdateRequest->all(), $id)) {
                return response()->json(['error' =>  'Update Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: PagoRealizado no found', 'code' => 404], 404);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: PagoRealizado no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function searchInContract($id)
    {
        try {
            $descuentos = PagoRealizado::with('contrato:id', 'user:name,id')
                ->where('contrato_id', $id)->get();
            return response()->json(['data' =>  $descuentos, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
