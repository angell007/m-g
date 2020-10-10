<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable = [
        'path',
        'inmueble_id',
    ];


    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }
}
