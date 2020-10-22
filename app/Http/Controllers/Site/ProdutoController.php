<?php

namespace App\Http\Controllers\Site;

use App\Models\Categoria;
use App\Models\Imagem;
use App\Models\Pais_origem;
use App\Models\Produto;
use Illuminate\Http\Request;


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

    $this->classe::create($data);

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

  public function deletar(Request $req, $id)
  {
    $dado = $this->classe::find($id);

    $img = Imagem::find($dado['cd_imagem']);

    $this->deleteImage($img->ds_imagem);

    $this->classe::destroy($id);

    Imagem::destroy($img->id);

    $req->session()
      ->flash(
        'mensagem',
        "Dados de $dado->nome excluido com sucesso!"
      );

    return redirect()->route("$this->tipo.index");
  }

  public function transformImage(Request $req)
  {
    $image = $req->file('cd_imagem');

    $extension = $image->guessClientExtension();

    $directory = 'img/products/';

    $hash = rand(1, 9999999);

    $fileName = 'img_' . $hash . '.' . $extension;

    $image->move($directory, $fileName);

    return $directory . $fileName;
  }

  public function deleteImage($image)
  {
    unlink($image);
  }
}
