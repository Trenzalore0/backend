<?php

namespace App\Http\Controllers\Site;

use App\Mail\mailPedido;
use App\Mail\mailStatusPedido;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Status_pedido;
use Illuminate\Http\Request;
use App\Models\Item_pedido;
use Exception;
use Illuminate\Support\Facades\Mail;

class PedidoController extends BaseController
{
  public function __construct()
  {
    $this->classe = Pedido::class;
    $this->tipo = 'pedido';
  }

  public function index(Request $req)
  {
    $dados = $this->classe::paginate(5);

    foreach ($dados as $dado) {
      $cliente = Cliente::find($dado->cd_cliente);
      $dado->cd_cliente = $cliente->nome;

      $status = Status_pedido::find($dado['cd_status_pedido']);
      $dado->cd_status_pedido = $status->ds_status;
    }

    $tipo = $this->tipo;

    $mensagem = $req->session()->get('mensagem');
    $classe = $req->session()->get('classe');

    return view("site.index", compact(
      'dados',
      'tipo',
      'mensagem',
      'classe'
    ));
  }

  public function editar($id)
  {
    $dados = $this->classe::find($id);

    $dados->cd_cliente = Cliente::find($dados->cd_cliente)->nome;

    $dados->valor_total = \number_format(
      $dados->valor_total,
      2,
      ',',
      ''
    );

    $produtos = Item_pedido::where('cd_pedido', '=', $id)->paginate(5);

    foreach ($produtos as $produto) {
      $produto->cd_produto = Produto::find($produto->cd_produto)->nome_produto;
      $produto->valor_produto = \number_format(
        $produto->valor_produto,
        2,
        ',',
        ''
      );
    }

    $tipo = $this->tipo;

    $rota = '.update';

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

  public function atualizar(Request $req, $id)
  {
    $dados = $req->all();

    try {
      $pedido = $this->classe::find($id);

      $pedido->update($dados);

      $req->session()
        ->flash(
          'mensagem',
          "O pedido $id foi atualizado com sucesso"
        );

      $req->session()
        ->flash(
          'classe',
          "alert-success"
        );

      $usuario = Cliente::find($pedido->cd_cliente);

      $status = Status_pedido::find($dados['cd_status_pedido']);

      $emaiSend = new mailStatusPedido(
        $usuario,
        $pedido,
        $status
      );
      
      // return $emaiSend;

      Mail::send($emaiSend);
      
    } catch (Exception $e) {

      $req->session()
        ->flash('mensagem', $e);

      $req->session()
        ->flash(
          'classe',
          "alert-danger"
        );
    }

    return redirect()->route("$this->tipo.index");
  }
}
