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
    {{$texts->where('caption_name', "YouHaveCompletedRegistration")->first()->caption_translation}}
</p>
</body>
</html>