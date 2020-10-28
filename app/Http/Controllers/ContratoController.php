<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\Http\Requests\ContratoStoreRequest;
use App\Http\Requests\ContratoUpdateRequest;
use App\Repositories\ContratoRepository;
use Carbon\Carbon;

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
        $contrato = $this->repository->find($id);

        if (request()->wantsJson()) {
            try {
                if (null == $contrato) {
                    return response()->json(['error' =>  'Contrato no found', 'code' => 404], 404);
                }
                return response()->json(['data' =>  $contrato, 'code' => 200], 200);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
            }
        }
        return view('contrato.show', compact('contrato'));
    }

    // try {
    //     $contrato = $this->repository->find($id);
    //     if (null == $contrato) {
    //         return response()->json(['error' =>  'Contrato no found', 'code' => 404], 404);
    //     }
    //     return response()->json(['data' =>  $contrato, 'code' => 200], 200);
    // } catch (\Throwable $th) {
    //     return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
    // }


    public function store(ContratoStoreRequest $contratoRequest)
    {
        try {
            $contrato = $this->repository->Create($contratoRequest->all());
            return response()->json(['data' => $contrato, 'message' => 'Registro Exitoso', 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(ContratoUpdateRequest $contratoUpdateRequest)
    {
        try {
            if ($this->repository->update($contratoUpdateRequest->all(), request()->get('id'))) {
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

    public function getDataForPago()
    {
        try {
            $contrato = Contrato::with([
                'descuentos' => function ($query) {
                    $query->whereBetween('fecha', [Carbon::createFromDate(request()->get('min')), Carbon::createFromDate(request()->get('max'))]);
                },
                'inmueble'
            ])->find(request()->get('codigo'));
            return response()->json(['data' =>  $contrato, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function getDataForDescuento()
    {
        try {
            $contrato = Contrato::with([
                'descuentos',
                'inmueble'
            ])->find(request()->get('codigo'));
            return response()->json(['data' =>  $contrato, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function filterSearch()
    {
        try {

            if (request()->get('id') == null && request()->get('id') == '') {
                return redirect()->action(
                    [ContratoController::class, 'index']
                );
            }

            $contrato = Contrato::where('codigo', request()->get('id'))->first();

            if ($contrato == null && $contrato == '') {
                return redirect()->action(
                    [ContratoController::class, 'index']
                );
            }

            return redirect()->action(
                [ContratoController::class, 'show'],
                ['id' =>  $contrato->id]
            );

            return response()->json(['data' =>  $contrato, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
