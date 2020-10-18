<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\Http\Requests\PagoRecibidoStoreRequest;
use App\Http\Requests\PagoRecibidoUpdateRequest;
use App\PagoRecibido;
use App\Repositories\PagoRecibidoRepository;

class PagoRecibidoController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PagoRecibidoRepository $recibidoRepository)
    {
        $this->repository = $recibidoRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return $this->repository->all();
        }
        return view('recibido.index');
    }

    public function show($id)
    {
        try {
            $recibido = $this->repository->find($id);
            if (null == $recibido) {
                return response()->json(['error' =>  'PagoRecibido no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $recibido, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(PagoRecibidoStoreRequest $recibidoRequest)
    {
        try {
            $contrato = Contrato::where('codigo', request()->get('codigo'))->first(['id']);
            $data = request()->all();
            $data['contrato_id'] = $contrato->id;
            $recibido = $this->repository->Create($data);
            return response()->json(['data' => $recibido, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(PagoRecibidoUpdateRequest $recibidoUpdateRequest, $id)
    {
        try {
            if ($this->repository->update($recibidoUpdateRequest->all(), $id)) {
                return response()->json(['error' =>  'Update Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: PagoRecibido no found', 'code' => 404], 404);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: PagoRecibido no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function searchInContract($id)
    {
        try {
            $descuentos = PagoRecibido::with('contrato:id', 'user:name,id')
                ->where('contrato_id', $id)->get();
            return response()->json(['data' =>  $descuentos, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
