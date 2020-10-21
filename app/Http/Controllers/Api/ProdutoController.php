<?php

namespace App\Http\Controllers\Api;

use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;
use App\Pais_origem;

class ProdutoController extends Controller
{

  public function listar()
    {

        return response()->json(Produto::all());
    }


  public function buscar($id)
  {
    $produto = Produto::find($id);

    if (is_null($produto)) {
      return response()->json('Produto não encontrado', 404);
    }
    return response()->json($produto, 200);
  }

  // public function buscarCategoria($id)
  // {
  //   $categoria = Categoria::find($id);
  //   $produto = Produto::find('cd_categoria');

  //   return response()->json($categoria->all($produto), 200);
  // }

  public function index(Request $req)
  {
    $dados = Produto::all();

     $tipo = $this->tipo;
  
  foreach ($dados as $dado) {

    
    $cate = Categoria::find($dado['cd_categoria']);
      $dado['cd_categoria'] = $cate->ds_categoria;
    }

    $mensagem = $req->session()->get('mensagem');

    return view("site.index", compact('dados', 'tipo', 'mensagem'));
  }
}






// buscaCategoria()


// buscarPreco()

// listarPreco()

// listarCategoria()
