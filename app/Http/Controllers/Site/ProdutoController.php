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

  public function salvar(Request $req)
  {
    $data = $req->all();

    $product = [];

    if ($req->hasFile('ds_imagem')) {
      $image = $this->transformImage($req, $this->guardar);

      $product['ds_imagem'] = $image;
    }

    if ($data['ds_categoria'] !== null) {
      $categoria = Categoria::create([
        'ds_categoria' => $data['ds_categoria']
      ]);

      $product['cd_categoria'] = $categoria->id;
    } else {
      $product['cd_categoria'] = $data['cd_categoria'];
    }

    if ($data['ds_pais_origem'] !== null) {
      $pais = Pais_origem::create([
        'ds_pais_origem' => $data['ds_pais_origem']
      ]);

      $product['cd_pais_origem'] = $pais->id;
    } else {
      $product['cd_pais_origem'] = $data['cd_pais_origem'];
    }

    $product['ds_produto'] = $data['ds_produto'];
    $product['nome_produto'] = $data['nome_produto'];
    $product['valor_produto'] = $data['valor_produto'];
    $product['ano_produto'] = $data['ano_produto'];
    $product['desconto_produto'] = $data['desconto_produto'];

    $this->classe::create($product);

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
