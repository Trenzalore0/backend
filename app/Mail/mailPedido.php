<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Cliente;
use App\Models\Pedido;

class mailPedido extends Mailable
{
  use Queueable, SerializesModels;

  private $usuario, $pedido;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(Cliente $usuario, Pedido $pedido)
  {
    $this->usuario = $usuario;
    $this->pedido = $pedido;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $this->subject('Pedido realizado com sucesso! :)');
    $this->to($this->usuario->email, $this->usuario->nome);
    $usuario = $this->usuario;
    $pedido = $this->pedido;
    $pedido->valor_total = number_format($pedido->valor_total, 2, ',', '');    
    return $this->markdown('mail.mailPedido', compact(
      'usuario',
      'pedido'
    ));
  }
}
