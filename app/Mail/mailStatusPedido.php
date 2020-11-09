<?php

namespace App\Mail;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Status_pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailStatusPedido extends Mailable
{
  use Queueable, SerializesModels;

  private $usuario, $pedido, $status;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(
    Cliente $usuario,
    Pedido $pedido,
    Status_pedido $status
  ) {
    //
    $this->usuario = $usuario;
    $this->pedido = $pedido;
    $this->status = $status;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $this->subject("Pedido #{$this->pedido->id}");
    $this->to($this->usuario->email, $this->usuario->nome);

    $usuario = $this->usuario;
    $pedido = $this->pedido;
    $status = $this->status;

    return $this->markdown('mail.mailStatusPedido', compact(
      'usuario',
      'pedido',
      'status'
    ));
  }
}
