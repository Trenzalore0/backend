<?php

namespace App\Http\Controllers\Site;

use App\Models\Imagem;
use Illuminate\Http\Request;

class ImagemController extends BaseArquivoController
{
  public function __construct()
  {
    $this->classe = Imagem::class;
    $this->tipo = 'imagem';
  }

  public function salvar(Request $req)
  {
    $data = $req->all();

    if ($req->hasFile('ds_imagem')) {
      $this->guardar = $data['tipo_imagem'];

      $image = $this->transformImage($req, $this->guardar);
      
      $data['ds_imagem'] = $image;
    }

    $this->classe::create($data);

    $req->session()
      ->flash(
        'mensagem',
        "$req->nome adicionado com sucesso"
      );

    return redirect()->route("$this->tipo.index");
  }

  public function atualizar(Request $req, $id)
  {
    $data = $req->all();

    $img = $this->classe::find($id);

    if ($req->hasFile('ds_imagem')) {
      $this->guardar = $data['tipo_imagem'];

      $this->deleteImage($img['ds_imagem']);

      $image = $this->transformImage($req, $this->guardar);

      $data['ds_imagem'] = $image;
    }

    $img->update($data);

    $req->session()
      ->flash(
        'mensagem',
        "O produto $req->nome foi atualizado com sucesso"
      );

    return redirect()->route("$this->tipo.index");
  }

}
