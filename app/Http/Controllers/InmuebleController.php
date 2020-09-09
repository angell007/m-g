<?php

namespace App\Http\Controllers;

use App\Http\Requests\InmuebleStoreRequest;
use App\Http\Requests\InmuebleUpdateRequest;
use App\Repositories\InmuebleRepository;

class InmuebleController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InmuebleRepository $propietarioRepository)
    {
        $this->repository = $propietarioRepository;
    }

    public function index()
    {
        // if (request()->ajax())  {
        // if (request()->isJson()) {
            // if ( request()->acceptsJson()) {
            // if (request()->expectsJson()) {
            if (request()->wantsJson()) {
            return response()->json($this->repository->all());
        } 
        // else {
            return view('inmueble.index');
        // }

        // abort(404);
    }

    public function show($id)
    {
        try {
            $propietario = $this->repository->find($id);
            if (null == $propietario) {
                return response()->json(['error' =>  'Inmueble no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $propietario, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(InmuebleStoreRequest $propietarioRequest)
    {
        try {
            $propietario = $this->repository->Create($propietarioRequest->all());
            return response()->json(['data' => $propietario, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(InmuebleUpdateRequest $propietarioUpdateRequest, $id)
    {
        try {
            if ($this->repository->update($propietarioUpdateRequest->all(), $id)) {
                return response()->json(['error' =>  'Update Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Inmueble no found', 'code' => 404], 404);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Inmueble no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
