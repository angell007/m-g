<?php

namespace App\Observers;

use App\Imagen;
use App\Inmueble;

class ImagenUploadService
{
    public  function upload($img, $id)
    {
        if ($img) {
            $filename = '_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path() . "/file", $filename);

            $imagen = Imagen::create([
                'path' => $filename,
                'inmueble_id' => $id
            ]);
        }
    }

    public function uploadPortada($img, $id)
    {
        try {
            if ($img) {
                $inmueble = Inmueble::find($id);
                $filename = '_' . time() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path() . "/file", $filename);
                $inmueble->portada = $filename;
                $inmueble->save();
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
