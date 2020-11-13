<?php

namespace App\Http\Controllers\Api;

use App\Models\Boleto;
use App\Models\CartaoCredito;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Http\Controllers\Controller;
use App\Models\Item_pedido;
use App\Models\Pedido;
use App\Models\Status_pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
  public function listAll($id)
  {
    $client = Cliente::find($id);

    if (is_null($client)) {
      return response()->json('cliente não encontrado', 400);
    }

    $orders = Pedido::where('cd_cliente', '=', $id)->get();

    foreach ($orders as $order) {
      $products = Item_pedido::where('cd_pedido', '=', $order->id)->get();

      $valor_total = 0;
      $quantidade = 0;
      foreach ($products as $product) {
        $valor_total += $product->valor_produto;
        $quantidade += $product->quantidade_produto;
      }

      $order->valor_total = $valor_total;
      $order->quantidade_produto = $quantidade;

      $status = Status_pedido::find($order->cd_status_pedido);
      $order->cd_status_pedido = $status->ds_status;
    }

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

    if ($pay == 2) {
      $pay->id = $data['dados_pagamento']['id_cartao'];

      $card = CartaoCredito::find($pay['id']);
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
      'cd_cliente' => $client,
      'cd_tipo_pagamento' => $type_payment,
      'cd_pagamento' => $pay->id,
      'cd_endereco_entrega' => $address,
      'cd_status_pedido' => $status
    ];

    $order = Pedido::create($newOrder);

    $products = $data['produtos'];

    foreach ($products as $product) {
      $newProduct = [
        'cd_pedido' => $order->id,
        'cd_produto' => $product['id_produto'],
        'quantidade_produto' => $product['quantidade'],
        'valor_produto' => $product['valor_produto']
      ];
      Item_pedido::create($newProduct);
    }

    return response()->json('Items criados com sucesso', 201);
  }
}
