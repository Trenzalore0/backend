<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item_pedido;
use App\Pedido;
use Illuminate\Http\Request;

class ItemPedidoController extends Controller
{
  public function listAll()
  {
    return response()->json(Item_pedido::all(), 200);
  }

  public function selectProdutosPedido($id)
  {
    $products = Item_pedido::where('cd_pedido', $id);

    return response()->json($products, 200);
  }

  public function createItem(Request $req)
  {
    $products = $req->all();
    $id = $products[0]['cd_pedido'];
    if(is_null(Pedido::find($id))) {
      return response()->json('Pedido não encontrado', 404);
    }

    foreach ($products as $product) {
      $newProduct = [
        'cd_pedido' => $product['cd_pedido'],
        'cd_produto' => $product['cd_produto'],
        'quantidade_produto' => $product['quantidade_produto'],
        'valor_produto' => $product['valor_produto']
      ];
      Item_pedido::create($newProduct);
    }

    return response()->json('Items criados com sucesso', 201);
  }
}
