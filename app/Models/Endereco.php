<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    protected $fillable = [
        'rua', 'numero', 'bairro', 'cep', 'cd_uf', 'referencia', 'complemento', 'cd_cliente'
    ]; 

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function uf()
    {
        return $this->hasMany(Uf::class);
    }
}
