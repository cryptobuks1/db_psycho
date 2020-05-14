<?php


namespace App\Http\Classes;


use Illuminate\Support\Facades\Mail;

class MailManager
{
    /**
     * @param $to
     * @param $mail_class
     * @param mixed ...$mail_class_args
     * @return bool
     */
    public static function sendMail($to, $mail_class, ...$mail_class_args)
    {
        // Do not send the mail when the app is being tested
        if(\App::runningUnitTests())
            return false;

        Mail::to($to)->send(new $mail_class(...$mail_class_args));
    }
}