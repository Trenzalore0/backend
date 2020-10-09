<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

        public function index(Request $req)
    {
        $clientes = Cliente::all();

        $mensagem = $req->session()->get('mensagem');

        return view('cliente.index', compact('cliente', 'mensagem'));
    }

    public function adicionar()
    {
        return view('cliente.create');
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
        return view('cliente.edit', compact('cliente'));
    }

    public function atualizar(Request $req, $id)
    {
        $cliente = $req->all();
        Cliente::find($id)->update($cliente);

        $req->session()
            ->flash(
                'mensagem',
                "Os dados de $req->nome foram atualizados com sucesso"
            );

        return redirect()->route('cliente');
    }

    public function deletar(Request $req, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        $req->session()->flash('mensagem', "Dados de $cliente->nome excluido com sucesso!");
        return redirect()->route('cliente');
    }


    
}
