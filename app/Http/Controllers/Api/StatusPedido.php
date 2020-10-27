<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Status_pedido;

class StatusPedido extends Controller
{
    public function listar(Request $req)    
    { 
        $dados=Status_pedido::all();
        if(is_null($dados)){
            return response()->json('Não encontrado',404);
        }    

       return response()->json(Status_pedido::all(),200);
    }
}
