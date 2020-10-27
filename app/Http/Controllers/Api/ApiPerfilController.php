<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use Illuminate\Http\Request;

class ApiPerfilController extends Controller
{
    public function buscarTipoPerfil(Request $req, $id)
    {
        $tipoPerfil = Perfil::find($id);
        if(is_null($tipoPerfil))
        {
            return response()->json('Tipo de perfil não encontrado', 404);
        }

        return response()->json($tipoPerfil,200);
    }
}
