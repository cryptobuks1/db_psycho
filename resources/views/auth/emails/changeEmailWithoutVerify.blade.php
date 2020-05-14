<?php
$texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$texts->where('caption_name', "ConfirmNewEmail")->first()->caption_translation}}</title>
</head>
<body>
<p>
    {{$texts->where('caption_name', "EmailChangedSuccess")->first()->caption_translation}}
</p>
</body>
</html>