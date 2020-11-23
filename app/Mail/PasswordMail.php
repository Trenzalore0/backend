<?php

namespace App\Mail;

use App\Models\Cliente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable
{
  use Queueable, SerializesModels;

  protected $typeReset, $user, $token;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($typeReset, Cliente $user, $token)
  {
    $this->typeReset = $typeReset;
    $this->user = $user;
    $this->token = $token;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {

    $type = $this->typeReset;

    if($type == "success") {
      $this->subject('Senha alterada com sucesso!');
    } else {
      $this->subject('Alteração de Senha!');
    }

    $this->to($this->user->email, $this->user->nome);

    $user = $this->user;

    $token = $this->token;

    $type = $this->typeReset;

    if($type == "success") {
      return $this->markdown('mail.passwordAlter', compact('user'));
    } 

    return $this->markdown('mail.password', compact(
      'user',
      'token',
      'type'
    ));
  }
}
