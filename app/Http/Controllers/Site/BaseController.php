<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $classe;

    protected $tipo;

    public function index(Request $req)
    {
        $dados = $this->classe::all();

        $tipo = $this->tipo;

        $mensagem = $req->session()->get('mensagem');

        return view("site.index", compact('dados', 'tipo', 'mensagem'));
    }

    public function adicionar()
    {
        $tipo = $this->tipo;

        $rota = '.store';

        return view("site.adicionar", compact('tipo', 'rota'));
    }

    public function salvar(Request $req)
    {
        $this->classe::create($req->all());
        $req->session()
            ->flash(
                'mensagem',
                "$req->nome adicionado com sucesso"
            );

        return redirect()->route("$this->tipo.index");
    }

    public function editar($id)
    {
        $dados = $this->classe::find($id);

        $tipo = $this->tipo;

        $rota = '.update';

        return view("site.adicionar", compact('dados', 'tipo', 'rota'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();
        $this->classe::find($id)->update($dados);

        $req->session()
            ->flash(
                'mensagem',
                "O produto $req->nome foi atualizado com sucesso"
            );

        return redirect()->route("$this->tipo.index");
    }

    public function deletar(Request $req, $id)
    {
        $dado = $this->classe::find($id);
        $dado->delete();

        $req->session()
            ->flash(
                'mensagem',
                "Dados de $dado->nome excluido com sucesso!"
            );

        return redirect()->route("$this->tipo.index");
    }
}
