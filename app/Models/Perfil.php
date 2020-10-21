<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
