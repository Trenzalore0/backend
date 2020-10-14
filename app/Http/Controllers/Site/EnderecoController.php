<?php

namespace App\Http\Controllers\Site;

use App\Uf;
use App\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnderecoController extends BaseController
{
  public function __construct()
  {
    $this->classe = Endereco::class;
    $this->tipo = 'endereco';
  }

  public function index(Request $req)
  {
    $dados = $this->classe::all();

    $tipo = $this->tipo;

    foreach ($dados as $dado) {
      $cliente = Cliente::find($dado['cd_cliente']);
      $dado['cd_cliente'] = $cliente->nome;

      $pais = Uf::find($dado['cd_uf']);
      $dado['cd_uf'] = $pais->ds_uf;
    }

    $mensagem = $req->session()->get('mensagem');

    return view("site.index", compact('dados', 'tipo', 'mensagem'));
  }

  public function adicionar()
  {
    $tipo = $this->tipo;

    $pais = Uf::all();

    $cliente = Cliente::all();

    return view(
      "site.adicionar",
      compact(
        'tipo',
        'pais',
        'cliente'
      )
    );
  }


}
