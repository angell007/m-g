<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inmueble extends Model
{
    protected $fillable = [
        'direccion',
        'propietario_id',
        'ciudad',
        'departamento',
        'tipo',
        'proposito',
        'habitaciones',
        'canon',
        'portada'
    ];


    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
}
