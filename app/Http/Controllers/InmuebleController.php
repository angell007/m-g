<?php

namespace App\Http\Controllers;

use App\Http\Requests\InmuebleStoreRequest;
use App\Http\Requests\InmuebleUpdateRequest;
use App\Inmueble;
use App\Repositories\InmuebleRepository;

class InmuebleController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InmuebleRepository $InmuebleRepository)
    {
        $this->repository = $InmuebleRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return response()->json($this->repository->all());
        }
        return view('inmueble.index');
    }

    public function show($id)
    {
        $inmueble = $this->repository->find($id);

        if (request()->wantsJson()) {
            try {
                if (null == $inmueble) {
                    return response()->json(['error' =>  'Inmueble no found', 'code' => 404], 404);
                }
                return response()->json(['data' =>  $inmueble, 'code' => 200], 200);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
            }
        }
        return view('inmueble.show', compact('inmueble'));
    }

    public function store(InmuebleStoreRequest $InmuebleRequest)
    {
        try {
            $Inmueble = $this->repository->Create($InmuebleRequest->all());
            return response()->json(['data' => $Inmueble, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 200], 200);
        }
    }

    public function update(InmuebleUpdateRequest $InmuebleUpdateRequest, $id)
    {
        try {
            if ($this->repository->update($InmuebleUpdateRequest->except('propietario'), $id)) {
                return response()->json(['data' => $this->repository->find($id),  'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Inmueble no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 200], 200);
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

    public function uploadPortada()
    {
        if (request()->expectsJson()) {
            try {
                if (request()->file('image')) {
                    $inmueble = Inmueble::find(request()->get('id'));
                    $filename = '_' . time() . '.' . request()->file('image')->getClientOriginalExtension();
                    request()->file('image')->move(public_path() . "/file", $filename);
                    $inmueble->portada = $filename;
                    $inmueble->save();
                    return response()->json(['data' =>  $inmueble->portada, 'code' => 200], 200);
                }
                return response()->json(['error' => request()->file('image'), 'code' => 404], 404);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
            }
        }
    }

    // public function getGallery()
    // {
    //     if (request()->wantsJson()) {
    //         return response()->json($this->repository->allGallery(request()->get('id')));
    //     }
    // }
}
