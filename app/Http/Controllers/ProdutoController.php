<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Pais_origem;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $req)
    {
        $produtos = Produto::all();
        $mensagem = $req->session()->get('mensagem');

        return view('produtos.index', compact('produtos', 'mensagem'));
    }

    public function adicionar()
    {
        $paises = Pais_origem::all();
        return view('produtos.adicionar',compact('paises'));
    }

    public function salvar(Request $req)
    {
        $produto = $req->all();

        $req->session()->flash(
            'mensagem',
            "Produto $req->nome com sucesso!"
        );

        if ($req->hasFile('imagem')) {
            $produto['imagem'] = $this->tratarImagem($req, $produto);
        }


        Produto::create($produto);

        $req->session()
          ->flash(
              'mensagem',
              "Produto de $req->nome adicionado com sucesso"
          );

        return redirect()->route('produto.index');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);

        return view('produtos.editar', compact('produto'));
    }

    public function atualizar(Request $req, $id)
    {
        $requisicao = $req->all();

        if ($req->hasFile('imagem')) {
            $requisicao['imagem'] = $this->tratarImagem($req, $requisicao);
        }

        Produto::find($id)->update($requisicao);

        $req->session()->flash('mensagem', 'Produto Atualizado com sucesso');

        return redirect()->route('produto.index');
    }

    public function deletar(Request $req, $id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        $req->session()
            ->flash(
                'mensagem',
                "Produto $produto->nome removido com sucesso"
            );

        return redirect()->route('produto.index');
    }

    public function tratarImagem(Request $req, $produto)
    {
        $imagem = $req->file('imagem');
        $num = rand(1111, 9999);
        $dir = 'image/produto/';
        $ext = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_' . $num . '.' . $ext;
        $imagem->move($dir, $nomeImagem);

        return $dir . $nomeImagem;
    }
}