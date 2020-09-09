<?php

namespace App\Providers;

use App\Observers\PropietarioObserver;
use App\Propietario;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Propietario::observe(PropietarioObserver::class);
    }
}
