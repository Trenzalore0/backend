<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Pagamento extends Model
{
    public function boleto()
    {
        return $this->hasOne(Boleto::class);
    }

    public function pagamento()
    {
        return $this->belongsTo(Pagamento::class);
    }
}
