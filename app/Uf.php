<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
