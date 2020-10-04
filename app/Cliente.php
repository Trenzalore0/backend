<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //

    public function login()
    {
        return $this->hasOne(Login::class);
    }

    public function contatos()
    {
        return $this->belongsToMany(Contato::class);
    }
}
