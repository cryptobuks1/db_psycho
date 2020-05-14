<?php

namespace App\Mail;

use App\Models\Consumer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ChangeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
            return $this->view('auth.emails.changeEmail');
        }
        if((int)app('ExtVerificationTypeSystem') == 1) {
            return $this->view('auth.emails.changeEmailWithoutVerify');
        }
    }
}
