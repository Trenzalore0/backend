<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailSac extends Mailable
{
  use Queueable, SerializesModels;

  private $user, $sendTo, $server;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($user, $sendTo, $server)
  {
    $this->user = $user;
    $this->sendTo = $sendTo;
    $this->server = $server;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $this->subject("{$this->user->name} - {$this->user->subject}");
    $this->to($this->sendTo, $this->user->name);
    $user = $this->user;
    if ($this->server) {
      return $this->markdown('mail.mailSacServer', compact('user'));
    } else {
      return $this->markdown('mail.mailSacClient', compact('user'));
    }
  }
}
