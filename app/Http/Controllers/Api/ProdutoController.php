<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Pais_origem;

class ProdutoController extends Controller
{

  public function listar()
  {
    $products = Produto::all();

    foreach($products as $product) {
      $product['ds_imagem'] = url($product['ds_imagem']);
    }

    return response()->js on($products, 200);
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
    if (is_null(Categoria::find($id))) {
      return response()->json('categoria não encontrada', 404);
    }

    $produtos = Produto::where('cd_categoria', '=', $id)->get(    );
  
    return response()->json($produtos, 200);
  }

  public function buscarPais($id)
  {
    if (is_null(Pais_origem::find($id))) {
      return response()->json('pais não encontrado', 404);
    }

    $produtos = Produto::where('cd_pais_origem', '=', $id)->get();

    return response()->json($produtos, 200);
  }

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
