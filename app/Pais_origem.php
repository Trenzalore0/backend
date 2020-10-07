<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais_origem extends Model
{
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
