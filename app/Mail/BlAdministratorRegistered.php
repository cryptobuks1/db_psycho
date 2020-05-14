<?php

namespace App\Mail;

use App\Http\Traits\DefaultSystemParams;
use App\Models\Consumer;
use App\Models\ConsumerAccessRole;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlAdministratorRegistered extends Mailable
{
    use Queueable, SerializesModels, DefaultSystemParams;
    /**
     * @var Consumer
     */
    public $consumer;
    public $token;

    /**
     * Create a new message instance.
     *
     * @param Consumer $consumer
     * @param string $token
     */
    public function __construct(Consumer $consumer, string $token)
    {
        $access_role = ConsumerAccessRole::query()->where([
            "consumer_id" => $consumer->id,
            "main_l"      => true
        ])->first();

        $user_role = self::getParameter("DefaultConsumerAccessRole");

        $mail_title = $access_role->access_role_id == $user_role ? "пользователя" : "менеджера";

        $this->subject = "Регистрация нового $mail_title";

        $this->consumer = $consumer;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.emails.confirm1CVerify');
    }
}
