<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $fillable = [
    'id', 'nome', 'email', 'rg', 'cpf', 'data_de_nascimento', 'genero', 'cd_login'
  ];

  protected $table = 'clientes';

  public function login()
  {
    return $this->hasOne(Login::class);
  }

  public function contatos()
  {
    return $this->belongsTo(Contato::class);
  }

  public function pedido()
  {
    return $this->belongsTo(Pedido::class);
  }

  public function endereco()
  {
    return $this->belongsTo(Endereco::class);
  }

  public function cartao()
  {
    return $this->belongsTo(CartaoCretido::class);
  }
}
