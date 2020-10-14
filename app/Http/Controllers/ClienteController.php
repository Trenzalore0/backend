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
<<<<<<< HEAD
        return view('clientes.adicionar');
=======
        return view('cliente.create');
>>>>>>> 3e435be945f964402a3a42645825adbe98c8535d
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
<<<<<<< HEAD
        return view('clientes.editar', compact('cliente'));
=======
        return view('cliente.edit', compact('cliente'));
>>>>>>> 3e435be945f964402a3a42645825adbe98c8535d
    }

    public function atualizar(Request $req, $id)
    {
        $cliente = $req->all();
        Cliente::find($id)->update($cliente);

        $req->session()
            ->flash(
                'mensagem',
<<<<<<< HEAD
                "O produto $req->nome foi atualizado com sucesso"
            );

        return redirect()->route('produtos');
=======
                "Os dados de $req->nome foram atualizados com sucesso"
            );

        return redirect()->route('cliente');
>>>>>>> 3e435be945f964402a3a42645825adbe98c8535d
    }

    public function deletar(Request $req, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        $req->session()->flash('mensagem', "Dados de $cliente->nome excluido com sucesso!");
        return redirect()->route('cliente');
    }


    
}
