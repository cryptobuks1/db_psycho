<?php
$texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$texts->where('caption_name', "ConfirmNewPassword")->first()->caption_translation}}</title>
</head>
<body>
<p>
    {{$texts->where('caption_name', "LinkFollow")->first()->caption_translation}} <a href="{{url('consumer/changePassword', $consumer->activityToken->last()->token)}}"> {{$texts->where('caption_name', "linkTheLink")->first()->caption_translation}}</a> {{$texts->where('caption_name', "finishChangePassword")->first()->caption_translation}}!
</p>
</body>
</html>