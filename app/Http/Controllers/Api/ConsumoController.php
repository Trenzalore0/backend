<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Imagem;
use App\Models\Uf;
use Illuminate\Http\Request;

class ConsumoController extends Controller
{
  public function listUF()
  {
    return response()->json(Uf::all(), 200);
  }

  public function GetImages($tipo)
  {
    $response = Imagem::where('tipo_imagem', '=', $tipo)->get();

    if (\count($response) == 0) {
      return response()->json('tipo de imagem não encontrado', 404);
    }

    foreach ($response as $image) {
      $image['ds_imagem'] = url($image['ds_imagem']);
    }

    return response()->json($response, 200);
  }

  public function Buscar ($pesquisa)
  {
    $products = Produto::where('nome_produto', 'like', "%{$pesquisa}%")->get();

    if (count($pesquisa) == 0) {
      return response()->json('produto não localizado', 201);
    }

    foreach($products as $product) {
      $product['ds_imagem'] = url($product['ds_imagem']);
    }

    return response()->json($products, 200);
  }

}
