<?php

namespace App\Http\Controllers\API;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function listar(Request $req)    
    {        

        return Cliente::paginate($req->per_page);
    }


    public function salvar(Request $req)
    {
        $cliente = $req->all();

        return response()->json(Cliente::create($cliente), 201);
    }

    
    public function buscar($id)
    {
        $cliente = Cliente::find($id);
        
        if (is_null($cliente)) {

            return response()->json('Cliente não encontrado', 404);
        }


        return response()->json($cliente, 200);
    }


    public function atualizar(Request $req, $id)
    {
        $cliente = $req->all();

        $itemcliente = Cliente::find($id);

        if (is_null($itemcliente)) {
            return response()->json(['erro' => 'Cliente não encontrado'], 404);
        }

        return response()->json($itemcliente->update($cliente), 200);

    }
}
