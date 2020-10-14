<?php

namespace App\Http\Controllers\Api;

use App\Endereco;
use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    protected $endereco;

    public function listar(Request $req){

        return $this->endereco::paginate($req->per_page);
    }

    public function salvar(Request $req){
        $endereco = $req->all();

        return response()->json($this->classe::create($endereco), 201);
    }

    public function buscar($id){
        $dados = $this->endereco::find($id);
        if (is_null($dados)) {
            return response()->json('Item não encontrado', 404);
        }
        return response()->json($dados, 200);
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        $item = $this->endereco::find($id);

        if(is_null($item)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        return response()->json($item->update($dados), 200);
    }

    public function deletar($id)
    {
        $item = $this->endereco::find($id);

        if (is_null($item)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        $item->delete();

        return response()->json('Item Removido', 200);
    }


}
