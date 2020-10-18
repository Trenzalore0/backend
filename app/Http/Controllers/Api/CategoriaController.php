<?php

namespace App\Http\Controllers\Api;

use App\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProdutoController;

class CategoriaController extends Controller
{
    public function listaCategoria()
    {
        return response()->json(Categoria::all());
    }

    public function listarItemCategoria(Request $req)
    {
    }
}
