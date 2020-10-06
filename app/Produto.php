<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function pais()
    {
        return $this->hasOne(Pais_origem::class);
    }
}
