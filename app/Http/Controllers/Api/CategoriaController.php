<?php

namespace App\Http\Controllers\Api;

use App\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProdutoController;
use App\Produto;

class CategoriaController extends Controller
{
    public function listaCategoria()
    {
        return response()->json(Categoria::all());
    }

    public function ProdutoCategoria(Request $req, $id)
    {

    $produtos = Produto::find($id);
    

    // return response()->json($categoria->all($produto), 200);
  }
    
}
