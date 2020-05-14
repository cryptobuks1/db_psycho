<?php

namespace App\Mail;

use App\Models\Consumer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConsumerRegistered1C extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $consumer, $password;
    /**
     * @var string
     */
    public $token;

    /**
     * ConsumerRegistered1C constructor.
     * @param Consumer $consumer
     * @param $password
     * @param string $token
     */
    public function __construct(Consumer $consumer, $password, string $token)
    {
        $this->consumer = $consumer;
        $this->password = $password;
        $this->subject = "Регистрация нового пользователя";
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $type_verify = (int)app('typeVerify');
        if($type_verify == 0) {
            return $this->view('auth.emails.confirm1CVerify');
        }
        if($type_verify == 1) {
            return $this->view('auth.emails.confirm1C');
        }
    }
}
