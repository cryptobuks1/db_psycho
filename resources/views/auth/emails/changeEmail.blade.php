<?php
$texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> {{$texts->where('caption_name', "ConfirmNewEmail")->first()->caption_translation}}</title>
</head>
<body>
<p>
    {{$texts->where('caption_name', "LinkFollow")->first()->caption_translation}} <a href="{{url('admin/consumer/changeEmail', $consumer->activityToken->last()->token)}}">{{$texts->where('caption_name', "linkTheLink")->first()->caption_translation}}</a> {{$texts->where('caption_name', "finishChangeEmail")->first()->caption_translation}}!
</p>
</body>
</html>
