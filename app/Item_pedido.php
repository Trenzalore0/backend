<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_pedido extends Model
{
    protected $table = 'item_pedido';

    protected $fillable = [
        'cd_pedido', 'cd_produto', 'quantidade_produto', 'valor_produto'
    ];

    public function produto()
    {
        return $this->hasMany(Produto::class);
    }

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }
}
