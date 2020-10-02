<?php

namespace App\Observers;

use App\Arrendatario;

class ArrendatarioObserver
{
    /**
     * Handle the  arrendatario "created" event.
     *
     * @param  \App\Arrendatario  $arrendatario
     * @return void
     */
    public function creating(Arrendatario $propietario)
    {
        $propietario->full_name = $propietario->nombre . ' ' . $propietario->apellido;
    }

    /**
     * Handle the  arrendatario "updated" event.
     *
     * @param  \App\Arrendatario  $arrendatario
     * @return void
     */
    public function updated(Arrendatario $arrendatario)
    {
        //
    }

    /**
     * Handle the  arrendatario "deleted" event.
     *
     * @param  \App\Arrendatario  $arrendatario
     * @return void
     */
    public function deleted(Arrendatario $arrendatario)
    {
        //
    }

    /**
     * Handle the  arrendatario "restored" event.
     *
     * @param  \App\Arrendatario  $arrendatario
     * @return void
     */
    public function restored(Arrendatario $arrendatario)
    {
        //
    }

    /**
     * Handle the  arrendatario "force deleted" event.
     *
     * @param  \App\Arrendatario  $arrendatario
     * @return void
     */
    public function forceDeleted(Arrendatario $arrendatario)
    {
        //
    }
}
