<?php

namespace App\Http\Controllers\Site;

use App\Categoria;
use App\Pais_origem;
use App\Produto;

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
