<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropietarioStoreRequest;
use App\Http\Requests\PropietarioUpdateRequest;
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
            return response()->json(['data' => $propietario, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(PropietarioUpdateRequest $propietarioUpdateRequest, $id)
    {
        try {
            if ($this->repository->update($propietarioUpdateRequest->all(), $id)) {
                return response()->json(['error' =>  'Update Correcto', 'code' => 200], 200);
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
}
