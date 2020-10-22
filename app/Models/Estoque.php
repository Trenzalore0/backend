<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    public function produto()
    {
        return $this->hasMany(Produto::class);
    }
}
