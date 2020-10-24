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
      $image = $this->transformImage($req, $this->guardar);

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

}
