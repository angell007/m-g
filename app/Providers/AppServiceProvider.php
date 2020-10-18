<?php

namespace App\Providers;

use App\Arrendatario;
use App\Contrato;
use App\Descuento;
use App\Inmueble;
use App\Observers\ArrendatarioObserver;
use App\Observers\ContratoObserver;
use App\Observers\DescuentoObserver;
use App\Observers\InmuebleObserver;
use App\Observers\PendienteObserver;
use App\Observers\PropietarioObserver;
use App\Observers\RealizadoObserver;
use App\Observers\RecibidoObserver;
use App\PagoRealizado;
use App\PagoRecibido;
use App\Pendiente;
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
        Inmueble::observe(InmuebleObserver::class);
        Arrendatario::observe(ArrendatarioObserver::class);
        Contrato::observe(ContratoObserver::class);
        PagoRecibido::observe(RecibidoObserver::class);
        PagoRealizado::observe(RealizadoObserver::class);
        Descuento::observe(DescuentoObserver::class);
        Pendiente::observe(PendienteObserver::class);
    }
}
