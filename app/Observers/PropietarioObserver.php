<?php

namespace App\Observers;

use App\Propietario;

class PropietarioObserver
{
    /**
     * Handle the propietario "created" event.
     *
     * @param  \App\propietario  $propietario
     * @return void
     */
    public function creating(Propietario $propietario)
    {
        $propietario->full_name = $propietario->nombre . ' ' . $propietario->apellido;
    }

    /**
     * Handle the propietario "updated" event.
     *
     * @param  \App\propietario  $propietario
     * @return void
     */
    public function updated(Propietario $propietario)
    {
        //
    }

    /**
     * Handle the propietario "deleted" event.
     *
     * @param  \App\propietario  $propietario
     * @return void
     */
    public function deleted(Propietario $propietario)
    {
        //
    }

    /**
     * Handle the propietario "restored" event.
     *
     * @param  \App\propietario  $propietario
     * @return void
     */
    public function restored(Propietario $propietario)
    {
        //
    }

    /**
     * Handle the propietario "force deleted" event.
     *
     * @param  \App\propietario  $propietario
     * @return void
     */
    public function forceDeleted(Propietario $propietario)
    {
        //
    }
}
