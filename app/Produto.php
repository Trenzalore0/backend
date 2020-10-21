<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{


    public function categoria()
    {
        return $this->hasMany(Categoria::class);
    }

    public function imagem()
    {
        return $this->hasOne(Imagem::class);
    }

    public function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }

    public function item_pedido()
    {
        return $this->belongsTo(Item_pedido::class);
    }
}
