<?php

namespace App\Observers;

// use App\Http\Services\ImagenUploadService;
use App\Inmueble;
use Illuminate\Support\Facades\File;

// use App\Services\ImagenUploadService;

class InmuebleObserver
{
    /**
     * Handle the  inmueble "created" event.
     *
     * @param  \App\Inmueble  $inmueble
     * @return void
     */
    public function creating(Inmueble $inmueble)
    {
        if (request()->file('portada')) {
            $filename = '_' . time() . '.' . request()->file('portada')->getClientOriginalExtension();
            request()->file('portada')->move(public_path() . "/file", $filename);
            $inmueble->portada = $filename;
        }
    }

    /**
     * Handle the  inmueble "updated" event.
     *
     * @param  \App\Inmueble  $inmueble
     * @return void
     */
    public function updating(Inmueble $inmueble)
    {
        if (request()->file('portada')) {
            File::delete(public_path('/file/' .  $inmueble->portada));
            $filename = '_' . time() . '.' . request()->file('portada')->getClientOriginalExtension();
            request()->file('portada')->move(public_path() . "/file", $filename);
            $inmueble->portada = $filename;

        }

        switch ($inmueble->tipo) {
            case 'apartamento':
                $inmueble->codigo = "Apto-" . $inmueble->id;
                break;
            case 'bodega':
                $inmueble->codigo = "Bd-" . $inmueble->id;
                break;
            case 'local':
                $inmueble->codigo = "Lc-" . $inmueble->id;
                break;
            case 'casa':
                $inmueble->codigo = "Cs-" . $inmueble->id;
                break;
        }
    }

    /**
     * Handle the  inmueble "deleted" event.
     *
     * @param  \App\Inmueble  $inmueble
     * @return void
     */
    public function deleted(Inmueble $inmueble)
    {
        //
    }

    /**
     * Handle the  inmueble "restored" event.
     *
     * @param  \App\Inmueble  $inmueble
     * @return void
     */
    public function restored(Inmueble $inmueble)
    {
        //
    }

    /**
     * Handle the  inmueble "force deleted" event.
     *
     * @param  \App\Inmueble  $inmueble
     * @return void
     */
    public function forceDeleted(Inmueble $inmueble)
    {
        //
    }
}
