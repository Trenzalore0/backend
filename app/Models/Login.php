<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $fillable = [
        'login', 'senha', 'cd_perfil'
    ]; 
    
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function perfil()
    {
        return $this->hasMany(Perfil::class);
    }
    
}

