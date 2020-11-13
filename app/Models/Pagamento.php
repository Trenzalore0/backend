<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    public function tipo_pagamento()
    {
        return $this->hasOne(Tipo_Pagamento::class);
    }
}
