<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Contato;
use App\Models\Endereco;
use App\Http\Controllers\Controller;
use App\Mail\newLaravelTips;
use App\Models\Login;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mockery\Expectation;
use stdClass;

class CadastroController extends Controller
{
  public function createCadastro(Request $req)
  {
    $dadosrecebidos = $req->all();

    $hasEmail = Cliente::where('email', '=', $dadosrecebidos['email'])->get();

    if (count($hasEmail) != 0) {
      return response()->json('email já cadastrado', 200);
    }

    $hasEmail = Login::where('login', '=', $dadosrecebidos['email'])->get();

    if (count($hasEmail) != 0) {
      return response()->json('email já cadastrado', 200);
    }

    $clientelogin = array(
      'login' => $dadosrecebidos['email'],
      'senha' => $dadosrecebidos['senha'],
      'cd_perfil' => 1
    );

    try {
      $logincriado = Login::create($clientelogin);
    } catch (Exception $e) {
      return response()->json($e, 200);
    }

    $cliente = array(
      'nome' => $dadosrecebidos['nome'],
      'cpf' => $dadosrecebidos['cpf'],
      'rg' => $dadosrecebidos['rg'],
      'email' => $dadosrecebidos['email'],
      'data_de_nascimento' => $dadosrecebidos['data_nascimento'],
      'genero' => $dadosrecebidos['genero'],
      'cd_login' => $logincriado->id
    );

    try {
      $clientecriado = Cliente::create($cliente);
    } catch (Exception $e) {
      return response()->json($e, 200);
    }

    $usuario = new stdClass();
    $usuario->nome = $cliente['nome'];
    $usuario->email = $cliente['email'];
    $laravelTips = new newLaravelTips($usuario);
    Mail::send($laravelTips);

    $contatoscliente = array(
      array(
        'ds_contato' => $dadosrecebidos['contato'][0]['ds_contato'],
        "cd_cliente" => $clientecriado->id
      ),
      array(
        'ds_contato' => $dadosrecebidos['contato'][1]['ds_contato'],
        "cd_cliente" => $clientecriado->id
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
      'cd_cliente' => $clientecriado->id
    );

    try {
      Endereco::create($clienteend);
    } catch (Exception $e) {
      return response()->josn($e, 200);
    }

    return response()->json('Cliente criado com sucesso!', 201);
  } 

  public function Login(Request $req)
  {
    $data = $req->all();

    $client = Cliente::where('email', '=', $data['email'])->get();

    if (count($client) == 0) {
      return response()->json('usuario não cadastrado', 404);
    }

    $login = Login::find($client[0]->cd_login);

    if ($data['senha'] == $login->senha) {
      return response()->json($client, 200);
    }

    return response()->json('senha incorreta', 200);
  }
}
