<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaoCretido extends Model
{
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
}
