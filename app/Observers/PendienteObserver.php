<?php

namespace App\Observers;

use App\Pendiente;
use Illuminate\Support\Facades\Cache;

class PendienteObserver
{
    /**
     * Handle the pendiente "created" event.
     *
     * @param  \App\Pendiente  $pendiente
     * @return void
     */
    public function created(Pendiente $pendiente)
    {
        //41152
    }

    public function creating(Pendiente $pendiente)
    {
        $pendiente->user_id = Cache::get('user')['id'];
    }

    /**
     * Handle the pendiente "updated" event.
     *
     * @param  \App\Pendiente  $pendiente
     * @return void
     */
    public function updated(Pendiente $pendiente)
    {
        //
    }

    /**
     * Handle the pendiente "deleted" event.
     *
     * @param  \App\Pendiente  $pendiente
     * @return void
     */
    public function deleted(Pendiente $pendiente)
    {
        //
    }

    /**
     * Handle the pendiente "restored" event.
     *
     * @param  \App\Pendiente  $pendiente
     * @return void
     */
    public function restored(Pendiente $pendiente)
    {
        //
    }

    /**
     * Handle the pendiente "force deleted" event.
     *
     * @param  \App\Pendiente  $pendiente
     * @return void
     */
    public function forceDeleted(Pendiente $pendiente)
    {
        //
    }
}
