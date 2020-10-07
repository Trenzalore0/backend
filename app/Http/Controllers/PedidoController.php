<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $requisicao)
    {
        $produtos = Produto::all();
        $pedidos = Pedido::all();
        $mensagem = $requisicao->session()->get('mensagem');
        return view('/Pedido.index', compact('pedidos','produtos','mensagem'));
    }

    public function adicionarPedido() {
        $produtos = Produto::all();
        return view('Pedido.adicionarPedido', compact('produtos'));
    }

    public function detalharPedido(Request $req) {
        $produtos = Produto::all();

        return view('Pedido.detalhePedido', compact('produtos'));
    }

    public function atualizarPedido() {
        return 'teste';
    }

    public function deletarPedido() {
        return 'teste';
    }


}
