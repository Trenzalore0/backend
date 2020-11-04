<?php

namespace App\Http\Controllers\Site;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Status_pedido;
use Illuminate\Http\Request;

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
            $status = Status_pedido::find($dado['cd_status_pedido']);
            $dado->cd_status_pedido = $status->ds_status;
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

        $tipo = $this->tipo;

        $rota = '.edit';

        $status = Status_pedido::all();



        // $produtos = Produto::all();

        return view(
            "site.adicionar",
            compact(
                'dados',
                'tipo',
               'rota',
               'status'
            )
        );
    }
}
