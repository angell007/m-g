<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoRecibido extends Model
{
    protected $fillable = [
        'arrendatario_id',
        'user_id',
        'contrato_id',
        'fecha',
        'otros',
        'administracion',
        'canon',
        'concepto',
        'valor',
        'estado',
        'observaciones',
        'desde',
        'hasta'
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
