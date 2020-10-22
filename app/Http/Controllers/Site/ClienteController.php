<?php

namespace App\Http\Controllers\Site;

use App\Models\Cliente;

class ClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = Cliente::class;
        $this->tipo = 'cliente';
    }
}
