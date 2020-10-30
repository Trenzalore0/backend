<?php

namespace App\Http\Controllers\Api;

use App\Models\Endereco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uf;

class EnderecoController extends Controller
{
  protected $endereco;

  public function listar()
  {
    return response()->json(Endereco::all(), 200);
  }

  public function salvar(Request $req)
  {
    $endereco = $req->all();

    return response()->json(Endereco::create($endereco), 201);
  }

  public function buscar($id)
  {
    $addresses = Endereco::where('cd_cliente', '=', $id)->get();

    if (count($addresses) == 0) {
      return response()->json('Endereco não encontrado', 404);
    }

    foreach ($addresses as $address) {
      $address->cd_uf = Uf::find($address->cd_uf)->ds_uf;
    }

    return response()->json($addresses, 200);
  }

  public function atualizar(Request $req, $id)
  {
    $endereco = $req->all();

    $idendereco = Endereco::find($id);

    if (is_null($idendereco)) {
      return response()->json(['erro' => 'Cliente não encontrado'], 404);
    }

    return response()->json($idendereco->update($endereco), 200);
  }
}
