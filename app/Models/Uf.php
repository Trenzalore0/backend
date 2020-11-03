<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    protected $table = 'ufs';

    protected $fillable = [
        'ds_uf'
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
