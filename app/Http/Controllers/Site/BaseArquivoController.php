<?php

namespace App\Http\Controllers\Site;

use Exception;
use Illuminate\Http\Request;

class BaseArquivoController extends BaseController
{
  protected $guardar;

  public function adicionar()
  {
    $tipo = $this->tipo;

    $rota = '.store';

    return view(
      "site.adicionar",
      compact(
        'tipo',
        'rota'
      )
    );
  }

  public function salvar(Request $req)
  {
    $data = $req->all();

    if ($req->hasFile('ds_imagem')) {
      $image = $this->transformImage($req, $this->guardar);

      $data['ds_imagem'] = $image;
    }

    $this->classe::create($data);

    $req->session()
      ->flash(
        'mensagem',
        "$req->nome adicionado com sucesso"
      );

    $this->PushOrigin();

    return redirect()->route("$this->tipo.index");
  }

  public function editar($id)
  {
    $dados = $this->classe::find($id);

    $tipo = $this->tipo;

    $rota = '.update';

    return view(
      "site.adicionar",
      compact(
        'dados',
        'tipo',
        'rota'
      )
    );
  }

  public function atualizar(Request $req, $id)
  {
    $data = $req->all();

    $img = $this->classe::find($id);

    if ($req->hasFile('ds_imagem')) {
      try {
        $this->deleteImage($img['ds_imagem']);
      } catch (Exception $e) {
      }


      $image = $this->transformImage($req, $this->guardar);

      $data['ds_imagem'] = $image;
    }

    $img->update($data);

    $req->session()
      ->flash(
        'mensagem',
        "O produto $req->nome foi atualizado com sucesso"
      );

    $this->PushOrigin();

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

    $this->PushOrigin();

    return redirect()->route("$this->tipo.index");
  }

  public function transformImage(Request $req, $path)
  {
    $image = $req->file('ds_imagem');

    $extension = $image->guessClientExtension();

    $directory = "img/{$path}/";

    $hash = rand(1, 9999999);

    $fileName = 'img_' . $hash . '.' . $extension;

    $image->move($directory, $fileName);

    return $directory . $fileName;
  }

  public function deleteImage($image)
  {
    unlink($image);
  }

  public function PushOrigin()
  {
    shell_exec('git remote set-url origin https://Trenzalore0:357789gta@github.com/Trenzalore0/backend.git');
    shell_exec('git add .');
    shell_exec('git commit -m "atualizando automaticamente"');
    shell_exec('git push origin master');
  }
}
