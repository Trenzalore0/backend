<?php

namespace App\Http\Controllers\Site;

use App\Pedido;
use App\Produto;

class PedidoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Pedido::class;
        $this->tipo = 'pedido';
    }

    public function adicionar()
    {
        $tipo = $this->tipo;

        $produtos = Produto::all();

        return view("site.adicionar", compact('tipo', 'produtos'));
    }

    public function editar($id)
    {
        $dados = $this->classe::find($id);

        $tipo = $this->tipo;

        $editar = true;

        $produtos = Produto::all();

        return view(
            "site.adicionar",
            compact(
                'dados',
                'tipo',
                'editar',
                'produtos'
            )
        );
    }
}
