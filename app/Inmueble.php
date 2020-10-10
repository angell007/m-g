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
        'barrio',
        'amoblado',
        'parqueadero',
        'baños',
        'departamento',
        'tipo',
        'proposito',
        'habitaciones',
        'canon',
        'portada',
        'descripcion'
    ];
    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}
