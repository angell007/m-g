<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
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

}
