<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
       $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('diegouriel.martinez15@gmail.com', 'Restablecimiento de contraseña')
        ->subject('Solicitud de restablecimiento de contraseña')->view('email.forgot')->with('url', $this->url);
    }
}
