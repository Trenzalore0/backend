<?php

namespace App\Http\Controllers\Site;

use App\Cliente;

class ClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = Cliente::class;
        $this->tipo = 'cliente';
    }
}
