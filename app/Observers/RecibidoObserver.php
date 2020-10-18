<?php

namespace App\Observers;

use App\PagoRecibido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RecibidoObserver
{
    /**
     * Handle the pago recibido "created" event.
     *
     * @param  \App\PagoRecibido  $pagoRecibido
     * @return void
     */
    public function creating(PagoRecibido $pagoRecibido)
    {
        $pagoRecibido->user_id = Cache::get('user')['id'];
    }

    /**
     * Handle the pago recibido "updated" event.
     *
     * @param  \App\PagoRecibido  $pagoRecibido
     * @return void
     */
    public function updated(PagoRecibido $pagoRecibido)
    {
        //
    }

    /**
     * Handle the pago recibido "deleted" event.
     *
     * @param  \App\PagoRecibido  $pagoRecibido
     * @return void
     */
    public function deleted(PagoRecibido $pagoRecibido)
    {
        //
    }

    /**
     * Handle the pago recibido "restored" event.
     *
     * @param  \App\PagoRecibido  $pagoRecibido
     * @return void
     */
    public function restored(PagoRecibido $pagoRecibido)
    {
        //
    }

    /**
     * Handle the pago recibido "force deleted" event.
     *
     * @param  \App\PagoRecibido  $pagoRecibido
     * @return void
     */
    public function forceDeleted(PagoRecibido $pagoRecibido)
    {
        //
    }
}
