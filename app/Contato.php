<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{

    protected $fillable = [
        'ds_contato', 'cd_cliente'
    ]; 

    public function cliente()
    {
        return $this->hasMany(Cliente::class);
    }
}
