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
    {{$texts->where('caption_name', "LinkFollow")->first()->caption_translation}} <a href="{{url('consumer/verify', $consumer->activityToken->last()->token)}}">{{$texts->where('caption_name', "linkTheLink")->first()->caption_translation}}</a> {{$texts->where('caption_name', "RegistrationComplete")->first()->caption_translation}}!
</p>
</body>
</html>