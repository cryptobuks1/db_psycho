<?php

namespace App\Mail;

use App\Models\Consumer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConsumerRegistered extends Mailable
{

    /**
     * Create Alex Yaroshchuk.
     *
     * @return void
     */

    use Queueable, SerializesModels;


    public $consumer;

    public function __construct(Consumer $consumer)
    {
        $this->consumer = $consumer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if((int)app('ExtVerificationTypeSystem') == 0) {
            return $this->view('auth.emails.confirmVerify');
        }
        if((int)app('ExtVerificationTypeSystem') == 1) {
            return $this->view('auth.emails.confirm');
        }
    }
}
