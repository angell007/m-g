<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inmueble extends Model
{
    protected $fillable = [
        'ciudad',
        'codigo',
        'propietario_id',
        'departamento',
        'direccion',
        'proposito',
        'canon',
        'portada',
        'habitaciones',
        'barrio',
        'amoblado',
        'precio',
        'administracion',
        'comision',
        'descripcion',
        'tipo',
        'baños',
        'parqueadero',
        'estado',
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
