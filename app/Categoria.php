<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = [
        'id','ds_categoria'
    ];
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

}
