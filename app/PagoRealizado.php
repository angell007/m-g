<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoRealizado extends Model
{
    protected $fillable = [
        'propietario_id',
        'user_id',
        'contrato_id',
        'fecha',
        'otros',
        'totalCreditos',
        'totalDebitos',
        'administracion',
        'descuentos',
        'canon',
        'comision',
        'iva',
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
