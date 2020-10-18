<?php

namespace App\Observers;

use App\PagoRealizado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RealizadoObserver
{
    /**
     * Handle the pago realizado "created" event.
     *
     * @param  \App\PagoRealizado  $pagoRealizado
     * @return void
     */
    public function creating(PagoRealizado $pagoRealizado)
    {
        $pagoRealizado->user_id = Cache::get('user')['id'];
    }

    /**
     * Handle the pago realizado "updated" event.
     *
     * @param  \App\PagoRealizado  $pagoRealizado
     * @return void
     */
    public function updated(PagoRealizado $pagoRealizado)
    {
        //
    }

    /**
     * Handle the pago realizado "deleted" event.
     *
     * @param  \App\PagoRealizado  $pagoRealizado
     * @return void
     */
    public function deleted(PagoRealizado $pagoRealizado)
    {
        //
    }

    /**
     * Handle the pago realizado "restored" event.
     *
     * @param  \App\PagoRealizado  $pagoRealizado
     * @return void
     */
    public function restored(PagoRealizado $pagoRealizado)
    {
        //
    }

    /**
     * Handle the pago realizado "force deleted" event.
     *
     * @param  \App\PagoRealizado  $pagoRealizado
     * @return void
     */
    public function forceDeleted(PagoRealizado $pagoRealizado)
    {
        //
    }
}
