<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Models\Cliente;
use App\Models\Login;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
  public function sendMail(Request $request)
  {

    $data = $request->all();

    $email = $data['email'];

    $client = Cliente::where('email', '=', $email)->first();

    if (is_null($client)) {
      return response()->json('usuário não encontrado', 200);
    }

    $token = md5($email);

    $client->update(['forgot' => $token]);

    $type = $data['typeReset'];

    $sendMail = new PasswordMail($type, $client, $token);

    try {
      Mail::send($sendMail);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 200);
    }

    return response()->json('email para alteração de senha enviado com sucesso', 202);
  }

  public function alterPassword(Request $request)
  {
    $data = $request->all();

    $typeReset =  $data['typeReset'];

    $newPassword = $data['newPassword'];

    $token = $data['token'];

    $client = Cliente::where('forgot', '=', $token)->first();

    if (\is_null($client)) {
      return response()->json('Cliente não encontrado!', 200);
    }

    $login = Login::find($client['cd_login']);

    if ($typeReset != 'forgot') {
      $oldPassword = $data['oldPassword'];

      if ($oldPassword != $login->senha) {
        return response()->json('senha incorreta', 200);
      }
    }

    $login->update([
      'senha' => $newPassword
    ]);

    $client->update([
      'forgot' => ''
    ]);

    $typeReset = "success";

    $sendMail = new PasswordMail($typeReset, $client, $token);

    try {
      Mail::send($sendMail);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 200);
    }

    return response()->json('senha alterado com sucesso!', 202);
  }
}
