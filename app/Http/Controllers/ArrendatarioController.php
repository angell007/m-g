<?php

namespace App\Http\Controllers;

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
            return response()->json(['data' => $arrendatario, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 200], 200);
        }
    }

    public function update(ArrendatarioUpdateRequest $arrendatarioUpdateRequest)
    {
        try {
            if ($this->repository->update($arrendatarioUpdateRequest->except(['_token', '_method']), $arrendatarioUpdateRequest->get('id'))) {
                return response()->json(['error' =>  'Update Correcto', 'code' => 200], 200);
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
}
