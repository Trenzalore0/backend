<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartaoCredito;

class ApiCartaoCredController extends Controller
{
  public function listarCartao($id)
  {
    $cartoes = CartaoCredito::where('cd_cliente', '=', $id)->get();

    if(count($cartoes) == 0) {
      return response()->json('não encontramos cartões para esse usuario', 200);
    }

    return response()->json($cartoes, 200);
  }

  public function adicionarCartao(Request $req)
  {
    $cartoes = $req->all();

    return response()->json(CartaoCredito::create($cartoes), 201);
  }

  public function buscarCartao(Request $req, $id)
  {
    $cartao = CartaoCredito::find($id);

    if (is_null($cartao)) {
      return response()->json('Cartao nao encontrado', 404);
    }

    return response()->json($cartao, 201);
  }

  public function editarCartao(Request $req, $id)
  {
    $cartao = CartaoCredito::find($id);

    if (is_null($cartao)) {
      return response()->json('Cartao não encontrado', 404);
    }

    $cartao->update($req->all());

    return response()->json('ATUALIZADO', 202);
  }

  public function removerCartao(Request $req, $id)
  {
    $cartao = CartaoCredito::find($id);

    if (is_null($cartao)) {
      return response()->json('Cartao não encontrado', 404);
    }

    return response()->json(CartaoCredito::destroy($id), 201);
  }
}
