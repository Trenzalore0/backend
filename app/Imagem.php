<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagens';

    protected $fillable = [
        'ds_imagem',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
