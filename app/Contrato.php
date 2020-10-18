<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
        'propietario_id',
        'arrendatario_id',
        'inmueble_id',
        'codigo',
        'inicio',
        'fin',
        'prorroga',
        'observaciones',
    ];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }

    public function arrendatario()
    {
        return $this->belongsTo(Arrendatario::class);
    }

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }

    public function descuentos()
    {
        return $this->hasMany(Descuento::class);
    }

    public function pago_recibidos()
    {
        return $this->hasMany(PagoRecibido::class);
    }

    public function pago_realizados()
    {
        return $this->hasMany(PagoRealizado::class);
    }
}
