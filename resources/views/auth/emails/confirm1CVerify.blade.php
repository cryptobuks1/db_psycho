<?php
$texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
?>
        <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$texts->where('caption_name', "ActivateNewUserRegistration")->first()->caption_translation}}</title>
</head>
<body>
<div style='font-family: "Arial","sans-serif";font-size: 11pt;'>
    <div class="right" style="text-align:right;">
        <img style="vertical-align: top;margin-right: 50px;" src="{{url('/img/rbl_logo.png')}}" alt="Rbl logo image">
        <span>
            <a style="color: black;font-size: 20px;text-decoration: none;border-bottom: 1px solid black;"
               target="_blank"
               href="{{url('/')}}">Кабинет клиента</a>
        </span>
    </div>
    <br><br><br><br>
    <p style="margin: 0;">
        Уважаемый {{$consumer->first_name . " " . $consumer->middle_name}},
    </p>
    <br>
    <p style="margin: 0;">
        Вы получили это сообщение, так как по Вашему адресу {{$consumer->email}} произведена регистрация нового
        пользователя
        в Кабинете клиента РБ ЛИЗИНГ.
    </p>
    <br>
    <p style="margin: 0;">Указанный e-mail будет являться именем пользователя для доступа в Кабинет.</p>
    <p style="margin: 0;">
        При первом входе система предложит подтвердить Ваши персональные данные и сформировать пароль для доступа к
        Кабинету
        клиента.
    </p>
    <br>
    <p style="margin: 0;">
        Для подтверждения регистрации перейдите по следующей ссылке: <a
                href="{{url('verify?token=' . $token)}}">{{url('verify?token=' . $token)}}</a>

    </p>
    <br>
    <br>
    <p style="margin: 0;">
        С уважением,
    </p>
    <p style="margin: 0;">
        Команда РБ ЛИЗИНГ
    </p>
    <br>
    <div style="font-size: 9pt;">
        <div style="margin-left: -5px;padding:3px 5px;background-color: #dedede;font-size: 9pt;">
            <p style="color: #383838;margin: 0;">
                © ООО «РБ ЛИЗИНГ» • Тел: +7 (495) 580 73 34 • E-mail: <a
                        style="color: inherit;text-decoration: underline;"
                        href="mailto:ru-leasing.info@rosbank.ru">ru-leasing.info@rosbank.ru</a>
            </p>
            <p style="color: #383838;margin: 0;">
                <a style="color: inherit;text-decoration: underline;" target="_blank"
                   href="https://www.rosbank-leasing.ru/">https://www.rosbank-leasing.ru/</a>
            </p>
        </div>
        <br>
        <p style="margin: 0;">Настоящее сообщение и любые приложения к нему (далее - «сообщение») конфиденциальны, предназначены
            исключительно для лиц, которым они адресованы, и могут содержать информацию, распространение которой
            ограничено законом. Получатель сообщения несет персональную ответственность за соблюдение
            конфиденциальности предоставленной информации и за последствия, возникшие по причине компрометации такой
            информации.</p>
        <br>
        <p style="margin: 0;">Электронные сообщения не защищены от изменений. ООО «РБ ЛИЗИНГ» не несет ответственности за сообщение, в
            случае его изменения или фальсификации.</p>
        <br>
        <p style="margin: 0;">Сообщение сгенерировано автоматически.</p>
    </div>
    <br>
    <div style="color: black;height: 2px;width: 100%;display: block;background: black;"></div>
</div>

</body>
</html>
