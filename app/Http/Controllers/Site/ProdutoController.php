<?php

namespace App\Http\Controllers\Site;

use App\Categoria;
use App\Imagem;
use App\Pais_origem;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProdutoController extends BaseController
{
  public function __construct()
  {
    $this->classe = Produto::class;
    $this->tipo = 'produto';
  }

  public function index(Request $req)
  {
    $dados = $this->classe::all();

    $tipo = $this->tipo;

    foreach ($dados as $dado) {
      $img = Imagem::find($dado['cd_imagem']);
      $dado['cd_imagem'] = url($img->ds_imagem);

      $cate = Categoria::find($dado['cd_categoria']);
      $dado['cd_categoria'] = $cate->ds_categoria;

      $pais = Pais_origem::find($dado['cd_pais_origem']);
      $dado['cd_pais_origem'] = $pais->ds_pais_origem;
    }

    $mensagem = $req->session()->get('mensagem');

    return view("site.index", compact('dados', 'tipo', 'mensagem'));
  }

  public function adicionar()
  {
    $tipo = $this->tipo;

    $paises = Pais_origem::all();

    $categorias = Categoria::all();

    return view(
      "site.adicionar",
      compact(
        'tipo',
        'paises',
        'categorias'
      )
    );
  }

  public function salvar(Request $req)
  {
    $data = $req->all();

    if ($req->hasFile('cd_imagem')) {
      $image = Imagem::create([
        'ds_imagem' => $this->transformImage($req)
      ]);

      $data['cd_imagem'] = $image->id;
    }
  }


    public function editar($id)
    {
        $dados = $this->classe::find($id);

        $tipo = $this->tipo;

        $editar = true;

        $paises = Pais_origem::all();

        $categorias = Categoria::all();

        return view(
            "site.adicionar",
            compact(
                'dados',
                'tipo',
                'editar',
                'paises',
                'categorias'
            )
        );
    }
}
