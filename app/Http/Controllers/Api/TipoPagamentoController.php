<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo_Pagamento;

class TipoPagamentoController extends Controller
{
    public function listar(Request $req)    
    { 
        $receberDados=Tipo_Pagamento::all();
        if(is_null($receberDados)){
            return response()->json('Tipo de Pagamento não localizado.',404);
        }    

       return response()->json(Tipo_Pagamento::all(),200);
    }
}
