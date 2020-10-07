<?php

namespace App\Http\Controllers\Site;

use App\Categoria;
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

        $$data['cd_imagem'] = $this->transformImage($req);

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

    public function transformImage(Request $req)
    {
        $image = $req->file('image');

        $extension = $image->guessClientExtension();

        $directory = 'img/products/';

        $hash = Hash::make(\rand(1, 9999999));

        $fileName = 'img_' . $hash . '.' . $extension;

        $image->move($directory, $fileName);

        return $directory . $fileName;
    }

    public function deleteImage($image)
    {
        \unlink($image);
    }
}
