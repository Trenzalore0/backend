<?php

namespace App\Http\Controllers\Api;

use App\Models\Boleto;
use App\Models\CartaoCredito;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Http\Controllers\Controller;
use App\Mail\mailPedido;
use App\Models\Item_pedido;
use App\Models\Pedido;
use App\Models\Status_pedido;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    $client = Cliente::find($data['cliente']);

    if (empty($client)) {
      return response()->json('cliente não encontrado', 400);
    }

    $address = $data['endereco_entrega'];

    if (empty(Endereco::find($address))) {
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
      'cd_cliente' => $client->id,
      'cd_tipo_pagamento' => $type_payment,
      'cd_pagamento' => $pay->id,
      'cd_endereco_entrega' => $address,
      'cd_status_pedido' => $status,
      'valor_total' => $data['valor_total']
    ];

    try {
      $order = Pedido::create($newOrder);
    } catch (Exception $e) {
      return response()->json($e, 200);
    }
    
    $products = $data['produtos'];

    foreach ($products as $product) {
      $newProduct = [
        'cd_pedido' => $order->id,
        'cd_produto' => $product['id'],
        'quantidade_produto' => $product['quantidade'],
        'valor_produto' => $product['valor_produto']
      ];
      Item_pedido::create($newProduct);
    }

    $sendEmail = new mailPedido($client, $order);

    try {
      Mail::send($sendEmail);
    } catch (Exception $e) {
      return response()->json($e, 200);
    }
    
    return response()->json('Pedido criado com sucesso!', 201);
  }  
}
