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
    $products = Produto::where('status_produto', '=', 'ativado')->get();

    foreach($products as $product) {
      $product['ds_imagem'] = url($product['ds_imagem']);
    }

    return response()->json($products, 200);
  }

  public function buscar($id)
  {
    $products = Produto::where('id', '=', $id)->get();

    if (count($products) == 0) {
      return response()->json('Produto não encontrado', 200);
    }

    foreach($products as $product) {
      $product['ds_imagem'] = url($product['ds_imagem']);
    }

    return response()->json($products[0], 202);
  }

  public function buscarCategoria($id)
  {
    if (is_null(Categoria::find($id))) {
      return response()->json('categoria não encontrada', 404);
    }

    $produtos = Produto::where('cd_categoria', '=', $id)->get();

    foreach($produtos as $produto) {
      $produto->ds_imagem = url($produto->ds_imagem);
    }
  
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
