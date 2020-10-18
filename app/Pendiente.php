<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendiente extends Model
{
    protected $fillable = [
        'contrato_id',
        'user_id',
        'fecha',
        'body',
        'estado'
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
