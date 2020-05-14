<?php

namespace App\Http\Controllers\Auth;

use App\Models\Consumer;
use App\Http\Controllers\Signal\AccessController;
use App\Mail\ChangeEmail;
use App\Models\ConsumerActivityToken;
use App\Mail\ChangePassword;
use Illuminate\Support\Facades\DB;
use App\Mail\ConsumerRegistered;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\URL;
use App\Models\SystemParameter;
use App\Models\SystemParameterValue;
use App\Models\SystemOperation;
use Illuminate\Http\Request;
use Carbon\Carbon;


class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //08.10.2018
    //Create Alex Yaroshchuk
    //For register

    ///Набор переменнных для использования
    protected $failed = 0;
    protected $success = 1;

    //типы статусов пользователей(consumer_status_n)
    protected $create = 0;
    protected $sendRequest = 1;
    protected $issued = 2;
    protected $active = 3;
    protected $block = 4;
    protected $deactivated = 8;

    /*
        Функция создает запись в таблице токенов в зивисимости от того, с какого контроллера к ней пришел запрос
        и обращается к функции отправки письма на почтув в зависимоти от парамаеторв
     */
    public function createSendToken(Request $request, $consumer)
    {
        //используем для определения с какого контроллера пришел запрос
        $url = basename(request()->path());
        //создание записи в таблице токенов
        $changeRequest = ConsumerActivityToken::create([
            'consumer_id' => $consumer->id,
            'email_issue' => $consumer->email,
            'email_new'   => $request['newEmail'],
            'token'       => str_random(20),
            'status_n'    => $this->failed,
            'action_id'   => 0,
            'type_verify' => NULL
        ]);
        $changeRequest->save();
        //в зависимости от того с какого контроллера идет запрос выполняем соотвествуюие действия
        if($url == "register")
        {
            $operation = SystemOperation::where('sys_oper_code', 'Verification')->select('id')->first()->id;
            $changeRequest->action_id = $operation;
            //записываем тип верификации в таблицу токенов
            $changeRequest->type_verify = app('ExtVerificationTypeSystem');
            $changeRequest->save();
            //в зависимости от типа верификации отправляем письмо и меняем статусы
            if(app('ExtVerificationTypeSystem') == 0)
            {
                Mail::to($changeRequest->email_issue)->send(new ConsumerRegistered($consumer));
                $consumer->consumer_status_n = $this->sendRequest;
                $consumer->save();
            }
            if(app('ExtVerificationTypeSystem') == 1)
            {
                Mail::to($changeRequest->email_issue)->send(new ConsumerRegistered($consumer));
                $changeRequest->status_n = $this->success;
                $changeRequest->save();
                $consumer->consumer_status_n = $this->active;
                $consumer->save();
            }
            if(app('ExtVerificationTypeSystem') == 2)
            {
                $changeRequest->status_n = $this->success;
                $changeRequest->save();
                $consumer->consumer_status_n = $this->active;
                $consumer->save();
            }
        }
        if($url == "email")
        {
            //записываем тип операции
            $operation = SystemOperation::where('sys_oper_code', 'EmailChange')->select('id')->first()->id;
            $changeRequest->type_verify = app('ExtVerificationTypeSystem');
            $changeRequest->action_id = $operation;
            $changeRequest->save();
            //в зависимости от типа отправляем сообщение и меняем статусы
            if(app('ExtVerificationTypeSystem') == 0)
            {
                Mail::to($changeRequest->email_new)->send(new ChangeEmail($consumer));
            }
            if(app('ExtVerificationTypeSystem') == 1)
            {
                Mail::to($changeRequest->email_new)->send(new ChangeEmail($consumer));
                $consumer->email = $changeRequest->email_new;
                $consumer->save();
                $changeRequest->status_n = $this->success;
                $changeRequest->save();
            }
            if(app('ExtVerificationTypeSystem') == 2)
            {
                $consumer->email = $changeRequest->email_new;
                $consumer->save();
                $changeRequest->status_n = $this->success;
                $changeRequest->save();
            }
        }
        if($url == "password")
        {
            $operation = SystemOperation::where('sys_oper_code', 'PasswordChange')->select('id')->first()->id;
            Mail::to($changeRequest->email_issue)->send(new ChangePassword($consumer));
            $changeRequest->action_id = $operation;
            $changeRequest->save();
        }
        return $consumer;
    }

    /*
      Функция создает consumer - валидирует введенные данные, проверяет если нужно каптчу
      смотрит на тип верицикации - обращается к функции создания записии в таблцие токенов
      и выводит статус в зависимости от параметров
   */
    public function createConsumer(Request $request)
    {
        //валидация
        $this->validate($request, [
            'consumer_login'        => 'required|string|min:3|max:40|unique:Consumers',
            'email'                 => 'required|email|min:3|max:100|unique:Consumers',
            'password'              => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required_with:password|min:6|max:20',
            'email2'                => 'nullable|email|min:3|max:100|unique:Consumers',
            'phone_number'          => 'nullable|string|min:3|max:40|unique:Consumers',
            'url_name'              => 'nullable|string|min:3|max:40|unique:Consumers',
            'birth_date'            => 'nullable|date',
            'first_name'            => 'nullable|string|min:3|max:40',
            'last_name'             => 'nullable|string|min:3|max:40',
            'middle_name'           => 'nullable|string|min:3|max:40',
            'male_l'                => 'nullable|boolean',
        ]);
        //Смотрим использовать ли каптчу в зависимости от парметра задоного в БД
        if(app('UseCaptcha'))
        {
            $this->validate($request, [
                'captcha' => 'required|captcha',
            ]);
        }
        //Создание consumer
        $consumer = Consumer::create([
            'consumer_login'       => $request['consumer_login'],
            'email'                => $request['email'],
            'password'             => bcrypt($request['password']),
            'consumer_name'        => $request['consumer_login'],
            'email2'               => $request['email2'],
            'phone_number'         => $request['phone_number'],
            'url_name'             => $request['url_name'],
            'birth_date'           => $request['birth_date'],
            'first_name'           => $request['first_name'],
            'last_name'            => $request['last_name'],
            'middle_name'          => $request['middle_name'],
            'male_l'               => $request['male_l'],
            'consumer_status_n'    => $this->create,
            'consumer_is_system_n' => 0,
            'consumer_type_code'   => 0,
        ]);

        $codeString = (int)10000 + $consumer->id;
        $consumer->consumer_code = $codeString;
        $consumer->save();
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        //Создаем запись в таблице токенов
        $consActivityToken = (new RegisterController())->createSendToken($request, $consumer);
        //В зависимоти от параметров выводим соотвествующий статус
        if(app('ExtVerificationTypeSystem') == 0)
        {
            $status = $texts->where('caption_name', "MailRegistration")->first()->caption_translation;
        }
        if(app('ExtVerificationTypeSystem') == 1)
        {
            $status = $texts->where('caption_name', "YouAreRegistered")->first()->caption_translation;
        }
        if(app('ExtVerificationTypeSystem') == 2)
        {
            $status = $texts->where('caption_name', "RegistrationThankFor")->first()->caption_translation;
        }
        return redirect('/login')->with([
            'status' => $status,
        ]);
    }

    /*
      Функция смотрит какой тип имеет данный токен и в зависимости от параметров
      проверяет его актуальность и далее, при условии актуальности токена верифицирует аккаунт откуда пришел токен
   */
    public function verify($token)
    {
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        //выбраем запись по пришедшему токену
        $verify = ConsumerActivityToken::with('systemOperations')->where('token', $token)->first();
        if($verify->systemOperations->sys_oper_code == 'Verification')
        {
            //проверяем актуальность токена при верификации
            $verifyConsumer = ConsumerActivityToken::where('token', $token)->where('status_n', $this->failed)
                ->where('created_at', '>', Carbon::now()->subSeconds(app('RequestTimeOut')))->first();
        }



        if($verify->systemOperations->sys_oper_code == 'EmailChange')
        {
            //проверяем актуальность токена при смене email
            $verifyConsumer = ConsumerActivityToken::where('token', $token)->where('status_n', $this->failed)
                ->where('created_at', '>', Carbon::now()->subSeconds(app('TimeOutChangeEmail')))->first();
        }
        //Если токен активен - то выбираем пользователя
        if(isset($verifyConsumer))
        {
            $consumer = $verifyConsumer->consumer;
            //в зависимости от того, какой статус у пользователя смотрим что за операция
            if($consumer->consumer_status_n == $this->sendRequest || $consumer->consumer_status_n == $this->issued)
            {
                //активируем польззователя, меняем статус на успешно выполненый и выводим статус

                $verifyConsumer->consumer->consumer_status_n = $this->active;
                $verifyConsumer->consumer->save();
                $verifyConsumer->status_n = $this->success;
                $verifyConsumer->save();
                $status = $texts->where('caption_name', "VerificationEmailComplete")->first()->caption_translation;
                return redirect('/login')->with('status', $status);
            }
            if($verifyConsumer->email_new !== NULL && $consumer->consumer_status_n == $this->active)
            {
                //активируем польззователя, меняем статус на усспешно ыыполненый и выводим статус
                $consumer->email = $verifyConsumer->email_new;
                $consumer->save();
                $verifyConsumer->status_n = $this->success;
                $verifyConsumer->save();
                $status = $texts->where('caption_name', "VerificationEmailComplete")->first()->caption_translation;
                return redirect('/login')->with('status', $status);
            }
            else
            {
                $status = $texts->where('caption_name', "VerificationEmailComplete")->first()->caption_translation;
                return redirect('/login')->with('status', $status);
            }
        }
        else
        {
            $status = $texts->where('caption_name', "EmailCanntBeIdentified")->first()->caption_translation;
            return redirect('/login')->with('status', $status);
        }
    }

    /*
      Повторная верификация пользователя производится путем введения его email и отправки повторного письма на почту,
     при условии что его аккаунт имеет статус отправлено, но не подтверждено
      ПОКА не используется
     */
    public function repeatedVerifyUser(Request $request)
    {
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        //смотрим актуальность токена
        $verifyChangeEmail = ConsumerActivityToken::where($request['email'], 'email_issue')
            ->where('created_at', '>', Carbon::now()->subSeconds(app('RequestTimeOut')))->first();
        //выбираем пользователя c таким же email
        $consumer = Consumer::where($request['email'], 'email')->get();
        //проверяем существует ли такой польщзователь
        if($verifyChangeEmail)
        {
            if($consumer->consumer_status_n == $this->active)
            {
                $status = $texts->where('caption_name', "VerificationEmailComplete")->first()->caption_translation;
            }
            else
            {
                if($consumer->consumer_status_n == $this->sendRequest || $consumer->consumer_status_n == $this->issued)
                {
                    ConsumerActivityToken::create([
                        'consumer_id' => $consumer->id,
                        'email_issue' => $consumer->email,
                        'token'       => str_random(20),
                        'status_n'    => $this->failed,
                        'action_id'   => 0
                    ]);
                    Mail::to($consumer->email)->send(new ConsumerRegistered($consumer));
                    $status = $texts->where('caption_name', "MailRegistration")->first()->caption_translation;
                }
                else
                {
                    $status = $texts->where('caption_name', "EmailCanntBeIdentified")->first()->caption_translation;
                }
            }
        }
        else
        {
            $status = $texts->where('caption_name', "EmailCanntBeIdentified")->first()->caption_translation;
        }
        return redirect('/login')->with('status', $status);
    }

    /*
      Функция валидирует введенный email, проверяет на существование такого в системе,
      если существует и время последнего запроса не превышает времени заданого параметром,
      то мы обащается к методу создании записи в таблице токенов
    */
    public function forgotPassword(Request $request)
    {
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        //верификация email
        $this->validate($request, [
            'email' => 'required|email|min:3|max:100',
        ]);
        //Проверяем существования пользователя
        $consumer = Consumer::where('email', $request['email'])->first();
        if($consumer)
        {
            //Проверяем тайм аут прошлого запроса


            $timeRequest = ConsumerActivityToken::with('systemOperations')
                ->where('email_issue', $request['email'])
                ->where('created_at', '>', Carbon::now()->subSeconds(app('PasswordRecovery')))
                ->get();
            //Отправляем письмо если тайм аут разрешает или выводим сообщение что нужно немного подождать
            if(count($timeRequest) == 0)
            {
                $consActivityToken = (new RegisterController())->createSendToken($request, $consumer);
                $status = $texts->where('caption_name', "ResetPasswordMail")->first()->caption_translation;
                return redirect('/login')->with('status', $status);
            }
            else
            {
                $status = $texts->where('caption_name', "WaitLittleLonger")->first()->caption_translation;
                return redirect('/login')->with('status', $status);
            }
        }
        else
        {
            $status = $texts->where('caption_name', "YouAreNotRegistered")->first()->caption_translation;
            return redirect(URL::previous())->with('status', $status);
        }
    }

    /*
      Функция передает переводы на странциу нового пароля
    */
    public function showPassword($token)
    {
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        return view('auth.admin.changePassword',
            compact(['texts', 'token']));
    }

    /*
      Функция подтверждения смены паорля - проверяем актуальность токена в зависимости от парметров системы
      далее проверяем введенные пароли и записываем измененный пароль и выводим соотвествущее собщение
   */
    public function confirmChangePassword($token, Request $request)
    {
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        //Проверяем  актуальность токена в зависимоти от параметров
        $verifyConsumer = ConsumerActivityToken::where('token', $token)->where('status_n', $this->failed)
            ->where('created_at', '>', Carbon::now()->subSeconds(app('RequestTimeOut')))->first();
        //Проверяем введенные пароли и меняем статус в зависимости того, какие пароли были введены
        if(isset($verifyConsumer))
        {
            $pass1 = $request['password1'];
            $pass2 = $request['password2'];
            $consumer = $verifyConsumer->consumer;
            if($pass1 == $pass2)
            {
                $consumer->password = bcrypt($request['password1']);
                $consumer->save();
                $verifyConsumer->status_n = $this->success;
                $verifyConsumer->save();
                $status = $texts->where('caption_name', "passwordChangedSucces")->first()->caption_translation;
                return redirect('/login')->with('status', $status);
            }
            else
            {
                $status = $texts->where('caption_name', "PasswordsArentSame")->first()->caption_translation;
                return redirect(URL::previous())->with('status', $status);
            }
        }
        else
        {
            //is link active in Email
            $status = $texts->where('caption_name', "EmailCanntBeIdentified")->first()->caption_translation;
            return redirect('/login')->with('status', $status);
        }
    }
}
