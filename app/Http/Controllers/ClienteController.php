<?php

namespace App\Http\Controllers;

use App\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $req)
    {
        $clientes = Cliente::all();

        $mensagem = $req->session()->get('mensagem');

        return view('clientes.index', compact('clientes', 'mensagem'));
    }

    public function adicionar()
    {
        return view('clientes.adicionar');
    }

    public function salvar(Request $req)
    {
        Cliente::create($req->all());
        $req->session()
        ->flash(
            'mensagem',
            "$req->nome adicionado com sucesso"
        );

          return redirect()->route('cliente');

    }

    public function editar($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.editar', compact('cliente'));
    }

    public function atualizar(Request $req, $id)
    {
        $cliente = $req->all();
        Cliente::find($id)->update($cliente);

        $req->session()
            ->flash(
                'mensagem',
                "O produto $req->nome foi atualizado com sucesso"
            );

        return redirect()->route('produtos');
    }

    public function deletar(Request $req, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        $req->session()->flash('mensagem', "Dados de $cliente->nome excluido com sucesso!");
        return redirect()->route('cliente');
    }

}
