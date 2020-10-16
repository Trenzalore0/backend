<?php

namespace App;
use App\Cliente;

use Illuminate\Database\Eloquent\Model;

class CartaoCredito extends Model
{
    protected $table = 'cartao_creditos';
    
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    protected $fillable = [
        'nome_titular','cpf_titular','numero_cartao'
    ];
}
