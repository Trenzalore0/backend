<?php

namespace App\Http\Controllers\Api;

use App\Boleto;
use App\CartaoCretido;
use App\Cliente;
use App\Endereco;
use App\Http\Controllers\Controller;
use App\Item_pedido;
use App\Pedido;
use Illuminate\Http\Request;

class ItemPedidoController extends Controller
{
  public function listAll($id)
  {
    $client = Cliente::find($id);

    if (is_null($client)) {
      return response()->json('cliente não encontrado', 400);
    }

    $orders = Pedido::where('cd_cliente', '=', $id)->get();

    return response()->json($orders, 200);
  }

  public function selectProdutosPedido($id)
  {
    $products = Item_pedido::where('cd_pedido', '=', $id)->get();

    return response()->json($products, 200);
  }

  public function create(Request $req)
  {
    $data = $req->all();

    $client = $data['cliente'];

    if (is_null(Cliente::find($client))) {
      return response()->json('cliente não encontrado', 400);
    }

    $address = $data['endereco_entrega'];

    if (is_null(Endereco::find($address))) {
      return response()->json('endereço não encontrado', 400);
    }

    $pay = $data['tipo_pagamento'];

    if ($pay == 1) {
      $pay['id'] = $data['dados_pagamento']['id_cartao'];

      $card = CartaoCretido::find($pay['id']);
      if (is_null($card)) {
        return response()->json('cartão não encontrado', 400);
      }
    } else {
      $billet = $data['dados_pagamento']['ds_boleto'];

      $pay = Boleto::create([
        'dados_boleto' => $billet
      ]);
    }
    
    $status = 1;

    $type_payment = $data['tipo_pagamento'];
    
    $newOrder = [
      'cd_cliente' => $client['id'],
      'cd_tipo_pagamento' => $type_payment,
      'cd_pagamento' => $pay['id'],
      'cd_endereco_entrega' => $address,
      'cd_status_pedido' => $status
    ];

    $order = Pedido::create($newOrder);

    $products = $data['produtos'];

    foreach ($products as $product) {
      $newProduct = [
        'cd_pedido' => $order['id'],
        'cd_produto' => $product['id_produto'],
        'quantidade_produto' => $product['quantidade_produto'],
        'valor_produto' => $product['valor_produto']
      ];
      Item_pedido::create($newProduct);
    }

    return response()->json('Items criados com sucesso', 201);
  }
}
