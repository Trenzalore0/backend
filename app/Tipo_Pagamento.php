<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Pagamento extends Model
{
    protected $table='tipo_pagamentos';
    public function boleto()
    {
        return $this->hasOne(Boleto::class);
    }

    public function pagamento()
    {
        return $this->belongsTo(Pagamento::class);
    }
}
