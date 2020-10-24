<?php

namespace App\Http\Controllers\Site;

use App\Models\Categoria;
use App\Models\Pais_origem;
use App\Models\Produto;
use Illuminate\Http\Request;


class ProdutoController extends BaseArquivoController
{
  public function __construct()
  {
    $this->classe = Produto::class;
    $this->tipo = 'produto';
    $this->guardar = '/products';
  }

  public function index(Request $req)
  {
    $dados = $this->classe::all();

    $tipo = $this->tipo;

    foreach ($dados as $dado) {
      $dado['ds_imagem'] = url($dado['ds_imagem']);

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

    if(count($paises) == 0) {
      $paises = 'not found';
    }

    $categorias = Categoria::all();

    $rota = '.store';

    return view(
      "site.adicionar",
      compact(
        'tipo',
        'paises',
        'rota',
        'categorias'
      )
    );
  }

  public function editar($id)
  {
    $dados = $this->classe::find($id);

    $tipo = $this->tipo;

    $rota = '.update';

    $paises = Pais_origem::all();

    $categorias = Categoria::all();

    return view(
      "site.adicionar",
      compact(
        'dados',
        'tipo',
        'rota',
        'paises',
        'categorias'
      )
    );
  }

  
}
