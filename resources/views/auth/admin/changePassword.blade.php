<!DOCTYPE html>
<html lang="en">

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
    <!-- Custom styling plus plugins -->
    <link href="/adminCss/css/custom.css" rel="stylesheet">
    <link href="/adminCss/css/icheck/flat/green.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
    <script src="/adminCss/js/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background:#F7F7F7;">

<div class="login-form">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <a class="hiddenanchor" id="tochangePassword"></a>

        <div id="wrapper">
            <div class="container-img">
                <img class="logo-img" src="/img/token-logo.png" alt="">
            </div>
            <div id="login" class="animate form visible">
                <section class="login_content">
                    <form method="POST" action="{{route('changePassword', ['token' => $token])}}">
                        {{ csrf_field() }}
                        <div class="login-input">
                            <input type="password" name="password1" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div class="login-input">
                            <input type="password" name="password2" class="form-control" placeholder="Confirm password" required="" />
                        </div>
                        @if (session('status'))
                            {{ session('status') }}
                        @endif
                        <div class="create-acc">
                            <button type="submit" class="btn enter-btn">
                                Change
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>

            <div class="reserve-title">
                DIGITAL AGENCY 2018 | LardanSoft
            </div>
        </div>
    <div class="slider">
        <div style="background:url('/img/slide1.png');height:100%;"></div>
        <div style="background:url('/img/slide1.png'); height: 100%;"></div>
        <div style="background:url('/img/slide1.png');height: 100%;"></div>
    </div>

</div>
<script src="/js/login.js"></script>
</body>

</html>
