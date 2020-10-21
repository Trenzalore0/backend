<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pedido;

class ApiControllerPedido extends Controller
{
    public function listarPedidos(Request $req)
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
        $dados = $req->all();
        
        return response()->json(Pedido::create($dados), 201);
    }

    public function atualizarPedido(Request $req, $id)
    {  
        $dados = $req->all();

        $pedido = $req::find($id);

        if(is_null($pedido))
        {
            return response()->json(['erro','Pedido não encontrado'],404);
        }

        return response()->json($pedido->update($dados),200);

    }
}
