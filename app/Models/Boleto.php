<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    protected $fillable = [
        'dados_boleto'
    ];

    public function tipo_pagamento()
    {
        return $this->belongsTo(Tipo_Pagamento::class);
    }
}
