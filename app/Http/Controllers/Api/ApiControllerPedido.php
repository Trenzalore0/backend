<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pedido;

class ApiControllerPedido extends Controller
{
    public function listarPedido(Request $req)
    {
        $dados = Pedido::all();

        return $dados::paginate($req->per_page);
    }
}
