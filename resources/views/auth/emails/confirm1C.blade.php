<?php
    $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{$texts->where('caption_name', "ActivateNewUserRegistration")->first()->caption_translation}}</title>
    </head>
    <body>
        <h1>{{$texts->where('caption_name', "RegistrationThankFor")->first()->caption_translation}}, {{$consumer->consumer_name}}!</h1>
        <p>
            {{$texts->where('caption_name', "YourEmail")->first()->caption_translation}} - {{$consumer->email}}<br>
            {{$texts->where('caption_name', "YourLogin")->first()->caption_translation}} - {{$consumer->consumer_login}}<br>
            {{$texts->where('caption_name', "YourPassword")->first()->caption_translation}} - {{$password}}<br>
            {{$texts->where('caption_name', "YouCanLoginByEmailOrLogin")->first()->caption_translation}}<br>
        </p>
    </body>
</html>