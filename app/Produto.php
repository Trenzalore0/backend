<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $fillable = [
        'ds_produto', 'nome_produto', 'ano_produto', 'valor_produto', 'desconto_produto'
    ];
}
