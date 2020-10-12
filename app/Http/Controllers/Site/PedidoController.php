<?php

namespace App\Http\Controllers\Site;

use App\Pedido;

class PedidoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Pedido::class;
        $this->tipo = 'pedido';
    }
}
