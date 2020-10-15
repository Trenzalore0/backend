<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function login()
    {
        return $this->hasOne(Login::class);
    }
}
