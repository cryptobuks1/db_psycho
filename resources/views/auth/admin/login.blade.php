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

    {{--<link href="/adminCss/css/bootstrap.min.css" rel="stylesheet">--}}

    {{--<link href="/adminCss/fonts/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link href="/adminCss/css/animate.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    {{--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>--}}

    <!-- Custom styling plus plugins -->
    {{--<link href="/adminCss/css/custom.css" rel="stylesheet">--}}
    {{--<link href="/adminCss/css/icheck/flat/green.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="/css/login.css">
    <script src="/adminCss/js/jquery.min.js"></script>
    {{--<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>--}}

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
    {{--<a class="hiddenanchor" id="toregister"></a>--}}
    {{--<a class="hiddenanchor" id="tologin"></a>--}}
    {{--<a class="hiddenanchor" id="tochangePassword"></a>--}}
    {{--<a class="hiddenanchor" id="tofullregister"></a>--}}


    <div id="wrapper">
        <div class="container-img">
            <img class="logo-img" src="/img/logo-rb.png" alt="">
        </div>

        @if(\Illuminate\Support\Facades\Session::has('error'))

            <div class="alert danger">

                {{ \Illuminate\Support\Facades\Session::get('error') }}

                @php

                    \Illuminate\Support\Facades\Session::forget('error');

                @endphp

            </div>

        @endif
        <div id="login" class=" form " >
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <section class="login_content">
                <form method="POST" action="{{route('admin-logout')}}" autocomplete="off">
                    {{ csrf_field() }}
                    <p>Вход в web-кабинет клиента</p>
                    <div class="login-input">
                       <div class="svg-wrapper">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 21">
                               <path id="Forma_1" data-name="Forma 1" class="cls-1" d="M217,415.27c2.339,0,4.235-2.3,4.235-5.135S220.612,405,217,405s-4.236,2.3-4.236,5.135S214.661,415.27,217,415.27Zm-8,7.841c0-.173,0-0.049,0,0h0Zm16,0.135c0-.047,0-0.328,0,0h0Zm-0.009-.342c-0.079-4.941-.725-6.348-5.671-7.24a3.478,3.478,0,0,1-4.638,0c-4.893.882-5.578,2.269-5.669,7.079a0.989,0.989,0,0,1-.012.368c0,0.086,0,.244,0,0.519,0,0,1.178,2.37,8,2.37s8-2.37,8-2.37c0-.177,0-0.3,0-0.384A2.753,2.753,0,0,1,224.99,422.9Z" transform="translate(-209 -405)"/>
                           </svg>
                       </div>
                        <input type="text" name="name" class="form-control" placeholder="Логин"  />
                    </div>
                    <div class="login-input">
                        <div class="svg-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 20">
                                <path id="Forma_1" data-name="Forma 1" class="cls-1" d="M225.114,479.869a6.443,6.443,0,0,0-10.684,6.548l-7.258,7.264a0.587,0.587,0,0,0-.172.415v3.318a0.586,0.586,0,0,0,.586.586H210.9a0.586,0.586,0,0,0,.414-0.172l0.828-.83a0.583,0.583,0,0,0,.168-0.482l-0.1-.891,1.234-.116a0.587,0.587,0,0,0,.528-0.529l0.116-1.235,0.89,0.1a0.577,0.577,0,0,0,.457-0.144,0.589,0.589,0,0,0,.2-0.438v-1.092H216.7a0.586,0.586,0,0,0,.414-0.172l1.5-1.484a6.339,6.339,0,0,0,6.5-1.527A6.462,6.462,0,0,0,225.114,479.869Zm-1.657,4.147a1.758,1.758,0,1,1,0-2.487A1.759,1.759,0,0,1,223.457,484.016Z" transform="translate(-207 -478)"/>
                            </svg>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Пароль"  />
                    </div>
                    {{--@php--}}
                        {{--$_SESSION['wrong_pword_count']=0;--}}
                            {{--if($error){--}}
                                {{--if($_SESSION['wrong_pword_count']<3){--}}
                                   {{--$_SESSION['wrong_pword_count'] = $_SESSION['wrong_pword_count']+1;--}}
                               {{--}--}}
                           {{--} else {--}}
                               {{--$_SESSION['wrong_pword_count']=0;--}}

                           {{--}--}}
                           {{--if($_SESSION['wrong_pword_count']>=3){--}}
                               {{--echo "Show captcha here";--}}
                           {{--}--}}
                    {{--@endphp--}}
                    @if (session('status'))
                        <div class="alert reset_pass" style = "color:#86d2a1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="reset-enter">
                        <a class="reset_pass" id="to_reset_pass" >
                            @if(isset($texts->where('caption_name', "ForgottenPassword")->first()->caption_translation))

                                {{--$getArrayCaptions['Individual']['translation_captions']['caption_translation']--}}

                                {{$texts->where('caption_name', "ForgottenPassword")->first()->caption_translation}}
                            @endif
                            <span>
                                @if(isset($texts->where('caption_name', "Retrieve")->first()->caption_translation))
                                {{$texts->where('caption_name', "Retrieve")->first()->caption_translation}}
                                @endif
                            </span>
                        </a>
                        <button type="submit" class="btn  enter-btn" >
                            @if(isset($texts->where('caption_name', "Login")->first()->caption_translation))
                            {{$texts->where('caption_name', "Login")->first()->caption_translation}}
                            @endif
                        </button>
                    </div>
                </form>
                {{--@if (session('email'))--}}
                    {{--<form method="POST" action="{{route('repeatedVerify')}}">--}}
                        {{--<button type="submit">Did not receive the message? - {{session('email')}}</button><br>--}}
                    {{--</form>--}}
                {{--@endif--}}
                    <div class="clearfix"></div>
                    <div class="separator">
                        @if(isset($texts->where('caption_name', "RegistrationFirstTimeHere")->first()->caption_translation))
                        <p>{{$texts->where('caption_name', "RegistrationFirstTimeHere")->first()->caption_translation}}</p>
                        @endif

                        <p class="change_link">
                            <a  class="to_register " id="create-acc">
                                @if(isset($texts->where('caption_name', "CreateAccount")->first()->caption_translation))
                                {{$texts->where('caption_name', "CreateAccount")->first()->caption_translation}}
                                @endif
                            </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />

                    </div>
                <!-- form -->
            </section>
            <!-- content -->
        </div>

        <div id="register" class=" form">
            <section class="login_content">
                <form method="POST" action="{{route('register')}}">
                    {{ csrf_field() }}
                    <p>
                        @if(isset($texts->where('caption_name', "CreateAccount")->first()->caption_translation))
                        {{$texts->where('caption_name', "CreateAccount")->first()->caption_translation}}
                        @endif
                    </p>

                    <div class="login-input">
                        <div class="svg-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21">
                                <path id="Forma_1" data-name="Forma 1" class="cls-1" d="M217,415.27c2.339,0,4.235-2.3,4.235-5.135S220.612,405,217,405s-4.236,2.3-4.236,5.135S214.661,415.27,217,415.27Zm-8,7.841c0-.173,0-0.049,0,0h0Zm16,0.135c0-.047,0-0.328,0,0h0Zm-0.009-.342c-0.079-4.941-.725-6.348-5.671-7.24a3.478,3.478,0,0,1-4.638,0c-4.893.882-5.578,2.269-5.669,7.079a0.989,0.989,0,0,1-.012.368c0,0.086,0,.244,0,0.519,0,0,1.178,2.37,8,2.37s8-2.37,8-2.37c0-.177,0-0.3,0-0.384A2.753,2.753,0,0,1,224.99,422.9Z" transform="translate(-209 -405)"/>
                            </svg>
                        </div>
                        <input type="text" class="form-control" name="consumer_login" placeholder="Login" required="" */>
                    </div>
                    <div class="login-input">
                        <div class="svg-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path id="Forma_1" data-name="Forma 1" class="cls-1" d="M225.114,479.869a6.443,6.443,0,0,0-10.684,6.548l-7.258,7.264a0.587,0.587,0,0,0-.172.415v3.318a0.586,0.586,0,0,0,.586.586H210.9a0.586,0.586,0,0,0,.414-0.172l0.828-.83a0.583,0.583,0,0,0,.168-0.482l-0.1-.891,1.234-.116a0.587,0.587,0,0,0,.528-0.529l0.116-1.235,0.89,0.1a0.577,0.577,0,0,0,.457-0.144,0.589,0.589,0,0,0,.2-0.438v-1.092H216.7a0.586,0.586,0,0,0,.414-0.172l1.5-1.484a6.339,6.339,0,0,0,6.5-1.527A6.462,6.462,0,0,0,225.114,479.869Zm-1.657,4.147a1.758,1.758,0,1,1,0-2.487A1.759,1.759,0,0,1,223.457,484.016Z" transform="translate(-207 -478)"/>
                            </svg>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" />
                    </div>
                    <div class="login-input">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    </div>
                    <div class="login-input">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required="" />
                    </div>
                    <div class="login-block hidden">
                        {{--<div class="login-input">--}}
                            {{--<input type="email" class="form-control" name="email2" placeholder="Email2" />--}}
                        {{--</div>--}}
                        <div class="login-input">
                            <input type="text" class="form-control" name="phone_number" placeholder="Phone number"/>
                        </div>
                        {{--<div class="login-input">--}}
                            {{--<input type="text" class="form-control" name="url_name" placeholder="Site" />--}}
                        {{--</div>--}}
                        {{--<div class="login-input">--}}
                            {{--<input placeholder="Birth date" class="form-control" name="birth_date" type="text" onfocus="(this.type='date')" >--}}
                        {{--</div>--}}
                        <div class="login-input">
                            <input type="text" class="form-control" name="first_name" placeholder="First name" />
                        </div>
                        <div class="login-input">
                            <input type="text" class="form-control" name="last_name" placeholder="Last name" />
                        </div>
                        {{--<div class="login-input">--}}
                            {{--<input type="text" class="form-control" name="middle_name" placeholder="Middle name"/>--}}
                        {{--</div>--}}
                        {{--<div class="login-select">--}}
                            {{--<select class="form-control" name = "male_l">--}}
                                {{--<option value="0">Female</option>--}}
                                {{--<option value="1">Male</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}

                        <br>
                    </div>
                    @if(app('UseCaptcha'))
                        <div class="form-group">
                            <label for=""></label>
                            <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img" data-refresh-config="default"><a  id="refresh"><span class="glyphicon glyphicon-refresh"></span></a>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Captcha"  name="captcha"/>
                        </div>
                    @endif
                    <div class="create-acc">
                        <button type="submit" class="btn enter-btn">
                            @if(isset($texts->where('caption_name', "Create")->first()->caption_translation))
                            {{$texts->where('caption_name', "Create")->first()->caption_translation}}
                            @endif
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">
                            @if(isset($texts->where('caption_name', "HaveAccount")->first()->caption_translation))
                            {{$texts->where('caption_name', "HaveAccount")->first()->caption_translation}}
                            @endif
                            <a  class="to_login login_link" id="log-in">
                                @if(isset($texts->where('caption_name', "Login")->first()->caption_translation))
                                {{$texts->where('caption_name', "Login")->first()->caption_translation}}
                                @endif
                            </a>
                        </p>
                        <p class="change_link">
                            <a id="create-acc-full" >
                                @if(isset($texts->where('caption_name', "FullRegistrationForm")->first()->caption_translation))
                                {{$texts->where('caption_name', "FullRegistrationForm")->first()->caption_translation}}
                                @endif
                            </a>
                            <a  class="to_register register-link" style="display: none">
                                @if(isset($texts->where('caption_name', "CreateAccount")->first()->caption_translation))
                                {{$texts->where('caption_name', "CreateAccount")->first()->caption_translation}}
                                @endif
                            </a>
                        </p>
                    </div>
                </form>
                <!-- form -->
            </section>
            <!-- content -->
        </div>

        {{--<div id="fullregister" class="animate form">--}}
            {{--<section class="login_content">--}}
                {{--<form method="POST" action="{{route('register')}}">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<h1> Create an account </h1>--}}
                    {{--<div class="login-input">--}}
                        {{--<div class="svg-wrapper">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21">--}}
                                {{--<path id="Forma_1" data-name="Forma 1" class="cls-1" d="M217,415.27c2.339,0,4.235-2.3,4.235-5.135S220.612,405,217,405s-4.236,2.3-4.236,5.135S214.661,415.27,217,415.27Zm-8,7.841c0-.173,0-0.049,0,0h0Zm16,0.135c0-.047,0-0.328,0,0h0Zm-0.009-.342c-0.079-4.941-.725-6.348-5.671-7.24a3.478,3.478,0,0,1-4.638,0c-4.893.882-5.578,2.269-5.669,7.079a0.989,0.989,0,0,1-.012.368c0,0.086,0,.244,0,0.519,0,0,1.178,2.37,8,2.37s8-2.37,8-2.37c0-.177,0-0.3,0-0.384A2.753,2.753,0,0,1,224.99,422.9Z" transform="translate(-209 -405)"/>--}}
                            {{--</svg>--}}
                        {{--</div>--}}
                        {{--<input type="text" class="form-control" name="consumer_login" placeholder="Login" required="" />--}}
                    {{--</div>--}}
                    {{--<div class="login-input">--}}
                        {{--<div class="svg-wrapper">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">--}}
                                {{--<path id="Forma_1" data-name="Forma 1" class="cls-1" d="M225.114,479.869a6.443,6.443,0,0,0-10.684,6.548l-7.258,7.264a0.587,0.587,0,0,0-.172.415v3.318a0.586,0.586,0,0,0,.586.586H210.9a0.586,0.586,0,0,0,.414-0.172l0.828-.83a0.583,0.583,0,0,0,.168-0.482l-0.1-.891,1.234-.116a0.587,0.587,0,0,0,.528-0.529l0.116-1.235,0.89,0.1a0.577,0.577,0,0,0,.457-0.144,0.589,0.589,0,0,0,.2-0.438v-1.092H216.7a0.586,0.586,0,0,0,.414-0.172l1.5-1.484a6.339,6.339,0,0,0,6.5-1.527A6.462,6.462,0,0,0,225.114,479.869Zm-1.657,4.147a1.758,1.758,0,1,1,0-2.487A1.759,1.759,0,0,1,223.457,484.016Z" transform="translate(-207 -478)"/>--}}
                            {{--</svg>--}}
                        {{--</div>--}}
                        {{--<input type="email" class="form-control" name="email" placeholder="Email" required="" />--}}
                    {{--</div>--}}
                    {{--<div class="login-input">--}}
                        {{--<input type="password" class="form-control" name="password" placeholder="Password" required="" />--}}
                    {{--</div>--}}
                    {{--<div class="login-input">--}}
                        {{--<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required="" />--}}
                    {{--</div>--}}
                    {{--@if(app('UseCaptcha'))--}}
                        {{--<div class="form-group">--}}
                            {{--<label for=""></label>--}}
                            {{--<img src="{{ captcha_src() }}" alt="captcha" class="captcha-img" data-refresh-config="default"><a href="#tofullregister" id="refresh1"><span class="glyphicon glyphicon-refresh"></span></a></p>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input class="form-control" type="text" placeholder="Captcha"  name="captcha2"/>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--<div class="create-acc">--}}
                        {{--<button type="submit" class="btn enter-btn">--}}
                            {{--Create--}}
                        {{--</button>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                    {{--<div class="separator">--}}

                        {{--<p class="change_link"> Already have an account?--}}
                            {{--<a href="#tologin" class="to_register login_link" id="log-in">Login</a>--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</form>--}}
                {{--<!-- form -->--}}
            {{--</section>--}}
            {{--<!-- content -->--}}
        {{--</div>--}}

        <div id="changePassword" class="animate form">
            <section class="login_content">
                <form method="POST" action="{{route('forgotPassword')}}">
                    {{ csrf_field() }}
                    <p>
                        @if(isset($texts->where('caption_name', "EnterYourEmail")->first()->caption_translation))
                        {{$texts->where('caption_name', "EnterYourEmail")->first()->caption_translation}}
                        @endif
                    </p>
                    <div class="login-input">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" />
                    </div>
                    <div class="msg"></div>
                    <div class="create-acc">
                        <button type="submit" class="btn enter-btn">
                            @if(isset($texts->where('caption_name', "Send")->first()->caption_translation))
                            {{$texts->where('caption_name', "Send")->first()->caption_translation}}
                            @endif
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">
                            @if(isset($texts->where('caption_name', "RememberPassword")->first()->caption_translation))
                            {{$texts->where('caption_name', "RememberPassword")->first()->caption_translation}}
                            @endif
                            <a  class=" login_link" id="logIn">
                                @if(isset($texts->where('caption_name', "Login")->first()->caption_translation))
                                {{$texts->where('caption_name', "Login")->first()->caption_translation}}
                                @endif
                            </a>
                        </p>
                    </div>
                </form>
            </section>
        </div>


        <div class="reserve-title">
            © 2018 ООО «РБ ЛИЗИНГ»
        </div>
    </div>
    <div class="slider">

        <div class="slider-content" style="">
            <div class="slider-header">
                <p>
                    <span id="slider-login">Вход</span>
                    <span>|</span>
                    <span id="slider-register">Регистрация</span>


                </p>
            </div>
            <div class="slider-text">
                <p>Росбанк</p>
                <h1>Вместе мы  сильнее</h1>
                <p>Вход в web-кабинет клиента</p>

            </div>
        </div>
        {{--<div style="background:url('/img/slide1.png'); height: 100%;"></div>--}}
        {{--<div style="background:url('/img/slide1.png');height: 100%;"></div>--}}
    </div>

</div>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/2.0.5/velocity.min.js"></script>--}}
<script src="/js/login.js"></script>
<script>
    $('#refresh').on('click',function(){
        var captcha = $('img.captcha-img');
        var config = captcha.data('refresh-config');
        $.ajax({
            method: 'GET',
            url: '/get_captcha/' + config,
        }).done(function (response) {
            captcha.prop('src', response);
        });
    });

    $('#refresh1').on('click',function(){
        var captcha = $('img.captcha-img');
        var config = captcha.data('refresh-config');
        $.ajax({
            method: 'GET',
            url: '/get_captcha/' + config,
        }).done(function (response) {
            captcha.prop('src', response);
        });
    });
</script>
</body>

</html>
