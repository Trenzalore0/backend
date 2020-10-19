<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaoCretido extends Model
{
    protected $table = 'cartao_credito';

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
}
