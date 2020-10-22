<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function login()
    {
        return $this->hasOne(Login::class);
    }
}
