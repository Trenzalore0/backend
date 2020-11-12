<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartaoCredito extends Model
{
  protected $table = 'cartao_creditos';

  protected $fillable = [
    'nome_titular', 'cpf_titular', 'numero_cartao', 'cd_cliente'
  ];

  public function cliente()
  {
    return $this->hasOne(Cliente::class);
  }
}
