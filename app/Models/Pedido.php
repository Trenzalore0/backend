<?php

namespace App\Models;

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

  protected $fillable = [
    'id', 'cd_cliente', 'cd_tipo_pagamento',
    'cd_status_pedido', 'cd_pagamento',
    'cd_endereco_entrega', 'valor_total'
  ];
}
