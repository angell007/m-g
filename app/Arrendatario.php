<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrendatario extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'identificacion',
        'tipo_identificacion',
        'ciudad',
        'departamento',
        'direccion',
        'barrio',
        'telefono',
        'opcional_telefono'
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
    public function pago_recibidos()
    {
        return $this->hasMany(PagoRecibido::class);
    }
}
