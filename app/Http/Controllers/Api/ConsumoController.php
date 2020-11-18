<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\mailSac;
use App\Models\Imagem;
use App\Models\Produto;
use App\Models\Uf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;

class ConsumoController extends Controller
{
  public function listUF()
  {
    return response()->json(Uf::all(), 200);
  }

  public function GetImages($tipo)
  {
    $response = Imagem::where('tipo_imagem', '=', $tipo)->get();

    if (count($response) == 0) {
      return response()->json(['error' => 'tipo de imagem não encontrado'], 404);
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

  public function SAC(Request $req)
  {
    $data = $req->all();

    $user = new stdClass;
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->subject = $data['subject'];
    $user->message = $data['message'];

    $sendClient = new mailSac($user, $user->email, false);
    $sendServer = new mailSac($user, "desvinho@gmail.com", true);

    try {
      Mail::send($sendClient);
      Mail::send($sendServer);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 200);
    }

    return response()->json('mensagem enviada com sucesso!', 202);
  }

  public function buscar($pesquisa)
  {
    $products = Produto::where('nome_produto', 'like', "%$pesquisa%")->get();

    if (empty($pesquisa)) {
      return response()->json('produto não localizado', 200);
    }

    foreach ($products as $product) {
      $product['ds_imagem'] = url($product['ds_imagem']);
    }

    return response()->json($products, 202);
  }
}
