<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $fillable = [
        'inmueble_id',
        'user_id',
        'contrato_id',
        'fecha',
        'concepto',
        'valor',
        'estado',
        'observaciones',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
