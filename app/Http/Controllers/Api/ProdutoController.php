<?php

namespace App\Http\Controllers\Api;

use App\Produto;
use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(){
        
        return response()->json(Produto::all());
    }


public function buscar($id){
    $produto = Produto::find($id);

    if (is_null($produto)) {
        return response()->json('Endereco não encontrado', 404);
    }
    return response()->json($produto, 200);
}

}


