<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $requisicao)
    {
        $pedidos = Pedido::all();
        $mensagem = $requisicao->session()->get('mensagem');
        return view('/Pedido.index', compact('pedidos','mensagem'));
    }

    public function adicionarPedido() {
        return view('Pedido.adicionarPedido');
    }

    public function detalharPedido() {
        return view('Pedido.detalhePedido');
    }

    public function atualizarPedido() {
        return 'teste';
    }

    public function deletarPedido() {
        return 'teste';
    }


}
