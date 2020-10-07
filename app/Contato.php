<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function clienteContatos()
    {
        return $this->hasOne(Cliente::class);
    }
}
