<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagenStoreRequest;
use App\Http\Requests\ImagenUpdateRequest;
use App\Imagen;
use App\Repositories\ImagenRepository;

class ImagenController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ImagenRepository $ImagenRepository)
    {
        $this->repository = $ImagenRepository;
    }

    public function index()
    {
        if (request()->wantsJson()) {
			
            return response()->json($this->repository->getAll(request()->get('id')));
        }
        return view('imagen.index');
    }

    public function show($id)
    {
        if (request()->wantsJson()) {
            try {
				
                // $Imagen = $this->repository->find($id);
                // if (null == $Imagen) {
                    // return response()->json(['error' =>  'Imagen no found', 'code' => 404], 404);
                // }
                // return response()->json(['data' =>  $Imagen, 'code' => 200], 200);
				return response()->json($this->repository->getAll($id));
				
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
            }
        }
        return view('imagen.show', compact('id'));
    }

    public function store(ImagenStoreRequest $ImagenRequest)
    {
        if (request()->expectsJson()) {
            try {
                if (request()->file('image')) {
                    $filename = '_' . time() . '.' . request()->file('image')->getClientOriginalExtension();
                    request()->file('image')->move(public_path() . "/file", $filename);

                    $imagen = Imagen::create([
                        'path' => $filename,
                        'inmueble_id' => request()->get('id')
                    ]);

                    return response()->json(['data' =>   Imagen::where('inmueble_id', request()->get('id'))->orderBy('id', 'Desc')->get(['*']),  'code' => 200], 200);
                }
                return response()->json(['error' =>  'Operacion no realizada.', 'code' => 404], 404);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
            }
        }
    }

    public function update(ImagenUpdateRequest $ImagenUpdateRequest, $id)
    {
        try {
            if ($this->repository->update($ImagenUpdateRequest->except('propietario'), $id)) {
                return response()->json(['data' => $this->repository->find($id),  'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Imagen no found', 'code' => 404], 404);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: Imagen no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function uploadPortada()
    {
        if (request()->expectsJson()) {
            try {
                if (request()->file('image')) {
                    $imagen = Imagen::find(request()->get('id'));
                    $filename = '_' . time() . '.' . request()->file('image')->getClientOriginalExtension();
                    request()->file('image')->move(public_path() . "/file", $filename);
                    $imagen->portada = $filename;
                    $imagen->save();
                    return response()->json(['data' =>  $imagen->portada, 'code' => 200], 200);
                }
                return response()->json(['error' =>  'Operacion no realizada.', 'code' => 404], 404);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
            }
        }
    }
}
