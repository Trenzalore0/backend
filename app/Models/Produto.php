<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

  protected $table = 'produtos';

  protected $fillable = [
    'ds_produto', 'nome_produto',
    'ano_produto', 'valor_produto',
    'desconto_produto', 'cd_pais_origem',
    'cd_categoria', 'ds_imagem', 'status_produto'
  ];

  public function categoria()
  {
    return $this->hasMany(Categoria::class);
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
