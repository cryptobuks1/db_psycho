<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InfoBetaRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email, $name, $surname, $social, $company;

    public function __construct($email, $name, $surname, $social, $company)
    {
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->social = $social;
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.emails.infoBetaRegister');
    }
}
