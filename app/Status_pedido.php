<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_pedido extends Model
{
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}