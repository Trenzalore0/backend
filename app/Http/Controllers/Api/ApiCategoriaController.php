<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class ApiCategoriaController extends Controller
{
    public function listarCategoria(Request $req)
    {
        $categorias = Categoria::all();
        return response()->json($categorias, 200);
    }

    // public function gerarCategoria(Request $req)
    // {
    //     $categorias = $req->all();

    //     return response()->json(Categoria::create($categorias),201);
    // }
}
