<?php

namespace App\Http\Controllers\Api;
use App\Cliente;
use App\Contato;
use App\Endereco;
use App\Http\Controllers\Controller;
use App\Login;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
   
    
            // -------Cadastrar Clientes

    public function createRegister (Request $req)
    
    {
        $datareceived = $req->all();

        if(is_null($datareceived)) {            
            return response()->json('Dados incompletos', 404);
        }

        $clientslogin = array(
            'login' => $datareceived ['email'],
            'senha' => $datareceived ['senha'],
            'cd_perfil' => 1
        );

        $loginclient = Login::create($clientslogin);

        $clients = array(
            'nome' => $datareceived ['nome'],
            'cpf' => $datareceived ['cpf'],
            'rg' => $datareceived ['rg'],
            'email' => $datareceived ['email'],
            'data_de_nascimento' => $datareceived ['data_nascimento'],
            'genero' => $datareceived ['genero'],
            'login' => $datareceived ['email'],
            'senha' => $datareceived ['senha'],
            'cd_login' => $loginclient['id']
            );

        $clientscreate = Cliente::create($clients);
        
        $contact = array(
            array('ds_contato' => $datareceived ['contato'] [0] ['ds_contato'], 
            "cd_cliente" => $clientscreate ['id'] 
             ), 
             array('ds_contato' => $datareceived ['contato'] [1] ['ds_contato'], 
                "cd_cliente" => $clientscreate ['id']

            ));


       $contactcreate = array();

        foreach($contact as $contact){
           $contactcreate[] = Contato::create($contact);
        }


        $clientsadress = array(
            'rua' => $datareceived['endereco']['rua'],
            'cep' => $datareceived ['endereco']['cep'],
            'cd_uf' => $datareceived['endereco']['cd_uf'],
            'numero' => $datareceived['endereco']['numero'],
            'complemento' => $datareceived ['endereco']['complemento'],
            'referencia' => $datareceived ['endereco']['referencia'],
            'bairro' => $datareceived ['endereco']['bairro'],
            'cd_cliente' => $clientscreate ['id']
        );

        $endereco = Endereco::create($clientsadress);



        return response()->json('Cliente criado com sucesso!', 201);
    

    }

                // -------Editando Clientes Cadastrados


        public function edit (Request $req, $id)
    
         {
              $clients = $req->all();
            
               $itemclient = Cliente::find($id);
            
                if (is_null($itemclient)) {
                      return response()->json(['erro' => 'Cliente não encontrado'], 404);
                }
            
                    return response()->json($itemclient->update($clients), 200);
            
                }


                // -------Validando Login


        public function validateLogin (Request $req)
    
        {
            $login = $req->all();
                
            $clients = Cliente::where('email', '=', $login['email'])->get();

            if(is_null($clients)){
                return response()->json('Email não Cadastrado', 400);
            } 

            if($login['senha'] == $clients['senha'] ){
                return response()->json('Bem vindo!!', 200);
            } else {
                return response()->json('Senha Incorreta', 400);
            }



            
        }               
                         

}
