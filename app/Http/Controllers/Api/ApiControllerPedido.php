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

        // return $dados::paginate($req->per_page);
        return response()->json($dados , 200);
    }
    public function cancelarPedido($id)
    {
        $pedido = Pedido::find($id);

        if(is_null($pedido))
        {
            return response()->json(['erro'=>'Pedido não encontrado',404]);
        }

        return response()->json('Pedido cancelado',200);
    }
    public function adicionarPedido(Request $req)
    {
        
    }
    public function atualizarPedido(Request $req)
    {
        
    }
}
