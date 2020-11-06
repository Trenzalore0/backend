<?php

namespace App\Http\Controllers\Site;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Item_pedido;
use App\Models\Status_pedido;

class PedidoController extends BaseController
{
  public function __construct()
  {
    $this->classe = Pedido::class;
    $this->tipo = 'pedido';
  }

  public function index(Request $req)
  {
    $dados = $this->classe::all();

    foreach ($dados as $dado) {
      $cliente = Cliente::find($dado['cd_cliente']);
      $dado->cd_cliente = $cliente->nome;
    }


    $tipo = $this->tipo;

    $mensagem = $req->session()->get('mensagem');

    return view("site.index", compact('dados', 'tipo', 'mensagem'));
  }

  public function adicionar()
  {
    $tipo = $this->tipo;

    // $produtos = Produto::all();

    $rota = '.store';

    return view("site.adicionar", compact('tipo', 'rota'));
  }

  public function editar($id)
  {
    $dados = $this->classe::find($id);

    $dados->cd_cliente = Cliente::find($dados->cd_cliente)->nome; 

    $dados->valor_total = \number_format($dados->valor_total, 2, ',', '');

    $produtos = Item_pedido::where('cd_pedido', '=', $id)->paginate(5); 

    foreach ($produtos as $produto) {
      $produto->cd_produto = Produto::find($produto->cd_produto)->nome_produto;
      $produto->valor_produto = \number_format($produto->valor_produto, 2, ',', '');
    }

    $tipo = $this->tipo;

    $rota = '.edit';

    $status = Status_pedido::all();

    return view(
      "site.adicionar",
      compact(
        'dados',  
        'tipo',
        'produtos',
        'status',
        'rota'
      )
    );
  }
}
