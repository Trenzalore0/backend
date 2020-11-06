<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailPedido extends Mailable
{
    use Queueable, SerializesModels;

    private $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $usuario)
    {
        //
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Cadastro');
        $this->to($this->usuario->email,$this->usuario->nome);
        return $this->markdown('mail.mailPedido', [
            'usuario' => $this->usuario
        ]);
    }
}
