<?php

namespace App;

use Facade\FlareClient\Http\Client;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
    
}
