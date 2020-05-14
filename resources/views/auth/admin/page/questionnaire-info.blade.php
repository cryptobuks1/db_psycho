<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="container-img">
        <img class="logo-img" src="/img/token-logo.png" alt="">
    </div>
    <div>
        <p class="main-info">An email has been sent to your mail with a login, password and a link with access to the demo database</p>
        <p>Please follow the <a href="/login">Login</a> page and use username and password from the email</p>
        <a href="/login" class="btn enter-btn">Login</a>
        <p>In case an error occurred while filling out the form and you didn’t receive the confirmation letter, fill in the <a href="/questionnaire">questionnaire</a> again</p>
        <a href="/questionnaire" class="btn enter-btn">Fill in the questionnaire</a>
        <p>Return to the main page</p>
        <a href="http://token.accountant/" target="_blank" class="btn enter-btn">Main page</a>
    </div>
    <div class="reserve-title">
        DIGITAL AGENCY 2018 | LardanSoft
    </div>
    <style>
        div{
            max-width: 700px;
        }
        .container-img{
            margin-bottom: 50px;
            margin-top: 50px;
        }
        .main-info{
            margin-bottom: 60px;
            font-weight: bold;
        }
        body{
            background: #f7f7f7;
            display: flex;
            color: #74879b;
            align-items: center;
            justify-content: center;
            height: 97vh;
            flex-direction: column;
        }
        .btn {
            width: auto;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 0;
            font-weight: normal;
            text-align: center;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            white-space: nowrap;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            margin-bottom: 20px;
        }
        .reserve-title {
            width: 32rem;
            text-align: center;
            margin-bottom: 3.5rem;
            margin-top: auto;
            color: #73879C;
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.471;
        }
    </style>
</body>
</html>