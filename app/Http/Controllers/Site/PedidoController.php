<?php

namespace App\Http\Controllers\Site;

use App\Models\Pedido;
use App\Models\Produto;

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

        $rota = '.store';

        return view("site.adicionar", compact('tipo', 'produtos', 'rota'));
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
