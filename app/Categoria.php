<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
