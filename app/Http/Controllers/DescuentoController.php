<?php

namespace App\Http\Controllers;

use App\Descuento;
use App\Http\Requests\DescuentoStoreRequest;
use App\Http\Requests\DescuentoUpdateRequest;
use App\Repositories\DescuentoRepository;
use Illuminate\Support\Facades\Auth;

class DescuentoController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DescuentoRepository $descuentoRepository)
    {
        $this->repository = $descuentoRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return $this->repository->all();
        }
        return view('descuento.index');
    }

    public function show($id)
    {
        try {
            $descuento = $this->repository->find($id);
            if (null == $descuento) {
                return response()->json(['error' =>  'Descuento no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $descuento, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(DescuentoStoreRequest $descuentoRequest)
    {
        try {
            $descuento = $this->repository->Create($descuentoRequest->all());
            return response()->json(['data' => $descuento, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(DescuentoUpdateRequest $descuentoUpdateRequest, $id)
    {
        try {
            if ($this->repository->update($descuentoUpdateRequest->all(), $id)) {
                return response()->json(['error' =>  'Update Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Descuento no found', 'code' => 404], 404);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Descuento no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }


    public function searchInContract($id)
    {
        try {
            $descuentos = Descuento::with('contrato:id', 'user:name,id',)
                ->where('contrato_id', $id)->get();
            return response()->json(['data' =>  $descuentos, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
