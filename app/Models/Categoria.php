<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'ds_categoria'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

}
