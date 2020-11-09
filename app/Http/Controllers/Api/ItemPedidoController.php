<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item_pedido;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ItemPedidoController extends Controller
{
  public function listAll()
  {
    return response()->json(Item_pedido::all(), 200);
  }

  public function selectProdutosPedido(Request $req)
  {
    $pedido = $req->all();

    $products = Item_pedido::where('cd_pedido', $pedido['id']);
 
    return response()->json($products, 200);
  }

  public function createItem(Request $req, $id)
  {
    if(!is_null(Pedido::find($id))) {
      return response()->json('Pedido não encontrado', 404);
    }

    $products = $req->all();

    foreach ($products as $product) {
      $newProduct = [
        'cd_pedido' => $id,
        'cd_produto' => $product->id,
        'quantidade_produto' => $product->quantidade_produto,
        'valor_produto' => $product->valor
      ];
      Item_pedido::create($newProduct);
    }

    return response()->json('Items criados com sucesso', 201);
  }
}
