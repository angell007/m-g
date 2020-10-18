<?php

namespace App\Observers;

use App\Descuento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DescuentoObserver
{
    /**
     * Handle the descuento "created" event.
     *
     * @param  \App\Descuento  $descuento
     * @return void
     */
    public function creating(Descuento $descuento)
    {
        $descuento->user_id = Cache::get('user')['id'];
    }

    /**
     * Handle the descuento "updated" event.
     *
     * @param  \App\Descuento  $descuento
     * @return void
     */
    public function updated(Descuento $descuento)
    {
        //
    }

    /**
     * Handle the descuento "deleted" event.
     *
     * @param  \App\Descuento  $descuento
     * @return void
     */
    public function deleted(Descuento $descuento)
    {
        //
    }

    /**
     * Handle the descuento "restored" event.
     *
     * @param  \App\Descuento  $descuento
     * @return void
     */
    public function restored(Descuento $descuento)
    {
        //
    }

    /**
     * Handle the descuento "force deleted" event.
     *
     * @param  \App\Descuento  $descuento
     * @return void
     */
    public function forceDeleted(Descuento $descuento)
    {
        //
    }
}
