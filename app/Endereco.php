<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'rua', 'numero', 'bairro', 'cep', 'cd_uf','referencia', 'complemento', 'cd_cliente'
    ];

=======

    protected $fillable = [
        'rua', 'numero', 'bairro', 'cep', 'cd_uf', 'referencia', 'complemento', 'cd_cliente'
    ]; 
>>>>>>> c123f1eda9df5149cacd92c105d6470890d9eab8

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function uf()
    {
        return $this->hasMany(Uf::class);
    }
}
