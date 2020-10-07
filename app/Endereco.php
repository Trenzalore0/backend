<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

}
