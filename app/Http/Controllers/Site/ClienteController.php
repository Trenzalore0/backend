<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = Cliente::class;
        $this->tipo = 'cliente';
    }

    public function index(Request $req)
    {
        $dados = $this->classe::paginate(5);

        $tipo = $this->tipo;

        $mensagem = $req->session()->get('mensagem');

        return view("site.index", compact('dados', 'tipo', 'mensagem'));
    }
}
