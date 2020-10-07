<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_pedido extends Model
{
    public function produto()
    {
        return $this->hasMany(Produto::class);
    }

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }
}
