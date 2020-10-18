<?php

namespace App\Http\Controllers\Api;

use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;

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

  public function buscarCategoria($id)
  {
    // $categoria = Categoria::find($id);
    $produto = Produto::find('cd_categoria');

    return response()->json($produto->all($id), 200);
  }

  // public function index(Request $req)

  // {

  //   $dados = $this->classe::all();

  //   foreach ($dados as $dado) {

  //     $img = Imagem::find($dado['cd_imagem']);

  //     $dado['cd_imagem'] = url($img->ds_imagem);

  //   }


}






// buscaCategoria()


// buscarPreco()

// listarPreco()

// listarCategoria()
