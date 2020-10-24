<?php

namespace App\Http\Controllers\Site;

use App\Models\Imagem;
use Illuminate\Http\Request;

class ImagemController extends BaseController
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
      $image = $this->transformImage($req);

      $data['ds_imagem'] = $image;
    }

    $data['tipo_imagem'] = 'Banner';

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
      $this->deleteImage($img['ds_imagem']);

      $image = $this->transformImage($req);

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

  public function deletar(Request $req, $id)
  {
    $dado = $this->classe::find($id);

    $this->deleteImage($dado['ds_imagem']);

    $this->classe::destroy($id);

    $req->session()
      ->flash(
        'mensagem',
        "Dados de $dado->nome excluido com sucesso!"
      );

    return redirect()->route("$this->tipo.index");
  }

  public function transformImage(Request $req)
  {
    $image = $req->file('ds_imagem');

    $extension = $image->guessClientExtension();

    $directory = 'img/banners/';

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
