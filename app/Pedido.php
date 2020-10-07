<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function status_pedido()
    {
        return $this->hasOne(Status_pedido::class);
    }

    public function item_pedido()
    {
        return $this->belongsTo(Item_pedido::class);
    }
}
