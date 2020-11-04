<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartaoCredito extends Model
{
    protected $table = 'cartao_credito';

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
}
