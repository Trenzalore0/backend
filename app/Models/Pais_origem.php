<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais_origem extends Model
{
    protected $table = 'pais_origem';

    protected $fillable = [
        'ds_pais_origem'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
