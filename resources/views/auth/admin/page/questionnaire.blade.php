<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="/adminCss/css/bootstrap.min.css" rel="stylesheet">
    <link href="/adminCss/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="/adminCss/css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="/adminCss/css/custom.css" rel="stylesheet">
    <link href="/adminCss/css/icheck/flat/green.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
    <script src="/adminCss/js/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="background:#F7F7F7;">
<div class="login-form">
    <div id="wrapper">
        <div class="container-img">
            <img class="logo-img" src="/img/token-logo.png" alt="">
        </div>

        <div class="animate form">
            <h1 class="registerBetah1"> Beta register </h1>
            <p>I already have login and password to access the demo database</p>
            <a href="/login" class="btn enter-btn">Login</a>
            <br><br>
            <p>To obtain login and password for demo database please fill in the form</p>
                <form method="POST" action="{{'/questionnaire/create'}}">
                    {{ csrf_field() }}
                    <p>{{ $name }}</p>
                    <div class="login-input">
                        <input type="text" class="form-control" name="name" placeholder="Name" required="" />
                    </div>
                    <p>{{ $surname }}</p>
                    <div class="login-input">
                        <input type="text" class="form-control" name="surname" placeholder="Surname" required="" />
                    </div>
                    <p>{{ $email }}</p>
                    <div class="login-input">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" />
                    </div>
                    <p>{{ $company }}</p>
                    <div class="login-input">
                        <input type="text" class="form-control" name="company" placeholder="Company" required="" />
                    </div>
                    <p>{{ $social }}</p>
                    <div class="login-input">
                        <input type="text" class="form-control" name="social" placeholder="Telegram, LinkedIn, Messenger or another link" required="" />
                    </div>
                    <div class="login-input">
                        <input name="policy" type="checkbox" id="checkboxAdmin" value="0" required="" />
                        <label for="checkboxAdmin">
                            <span class="form-control"><i class="fa fa-check"></i></span>
                            <p>I agree with <a href="https://static1.squarespace.com/static/5a2c62ec49fc2b5f75eb15d6/t/5b2a4a38f950b7e84b981189/1529498168336/BLOCKNOTE+PRIVACY+POLICY.pdf" target="_blank">privacy policy</a></p>
                        </label>
                    </div>
                    <div class="create-acc">
                        <button type="submit" class="btn enter-btn">
                            Send
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </form>
        </div>
        <div class="reserve-title">
            DIGITAL AGENCY 2018 | LardanSoft
        </div>
    </div>
</div>
<script src="/js/login.js"></script>
</body>

</html>
