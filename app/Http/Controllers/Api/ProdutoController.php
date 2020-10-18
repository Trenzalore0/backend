<?php

namespace App\Http\Controllers\Api;

use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;

class ProdutoController extends Controller
{


  public function buscar($id)
  {
    $produto = Produto::find($id);

    if (is_null($produto)) {
      return response()->json('Produto não encontrado', 404);
    }
    return response()->json($produto, 200);
  }

  public function buscarCategoria($id)
  {
    $categoria = Categoria::find($id);
    $produto = Produto::find('cd_categoria');

    return response()->json($categoria->all($produto), 200);
  }


}






// buscaCategoria()


// buscarPreco()

// listarPreco()

// listarCategoria()
