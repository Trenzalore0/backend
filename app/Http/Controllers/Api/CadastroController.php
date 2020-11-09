<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Contato;
use App\Models\Endereco;
use App\Http\Controllers\Controller;
use App\Mail\newLaravelTips;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;




class CadastroController extends Controller
{

  
  // -------Cadastrar Clientes

  public function createCadastro(Request $req)
  {
    $dadosrecebidos = $req->all();

    $clientelogin = array(
      'login' => $dadosrecebidos['email'],
      'senha' => $dadosrecebidos['senha'],
      'cd_perfil' => 1
    );

    $logincriado = Login::create($clientelogin);

    $cliente = array(
      'nome' => $dadosrecebidos['nome'],
      'cpf' => $dadosrecebidos['cpf'],
      'rg' => $dadosrecebidos['rg'],
      'email' => $dadosrecebidos['email'],
      'data_de_nascimento' => $dadosrecebidos['data_nascimento'],
      'genero' => $dadosrecebidos['genero'],
      'login' => $dadosrecebidos['email'],
      'senha' => $dadosrecebidos['senha'],
      'cd_login' => $logincriado['id']
    );

    $clientecriado = Cliente::create($cliente);

    $usuario = new stdClass();
    $usuario->nome = $clientecriado['nome'];
    $usuario->email = $clientecriado['email'];
    // return new newLaravelTips($usuario);
    Mail::send(new newLaravelTips($usuario));


    $contatoscliente = array(
      array(
        'ds_contato' => $dadosrecebidos['contato'][0]['ds_contato'],
        "cd_cliente" => $clientecriado['id']
      ),
      array(
        'ds_contato' => $dadosrecebidos['contato'][1]['ds_contato'],
        "cd_cliente" => $clientecriado['id']

      )
    );

    $contatoscriados = array();

    foreach ($contatoscliente as $contato) {
      $contatoscriados[] = Contato::create($contato);
    }

    $clienteend = array(
      'rua' => $dadosrecebidos['endereco']['rua'],
      'cep' => $dadosrecebidos['endereco']['cep'],
      'cd_uf' => $dadosrecebidos['endereco']['cd_uf'],
      'numero' => $dadosrecebidos['endereco']['numero'],
      'complemento' => $dadosrecebidos['endereco']['complemento'],
      'referencia' => $dadosrecebidos['endereco']['referencia'],
      'bairro' => $dadosrecebidos['endereco']['bairro'],
      'cd_cliente' => $clientecriado['id']
    );

    $endereco = Endereco::create($clienteend);

    

    return response()->json('Cliente criado com sucesso!', 201);
  }
}
