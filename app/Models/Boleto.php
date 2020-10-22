<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    public function tipo_pagamento()
    {
        return $this->belongsTo(Tipo_Pagamento::class);
    }
}
