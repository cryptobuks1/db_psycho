<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    protected $redirectTo = '/admin/server';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Функция "showLoginForm" отвечает за отображенижение при авторизации
    public function showLoginForm()
    {
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        return view('auth.admin.login', compact('texts', 'texts'));
    }

    // Функция "login" отвечает за проверка по авторизации
    // Возможны значения состояния пользователя "consumer_status_n":
    // 0 - Создан;
    // 1 - Выслан запрос на подтверждение (E-mail).
    // 2 - Выдан (Выданы данные по телефон)
    // 3 - Активирован;
    // 4 - Заблокирован (Вход в систему);
    // 9 - Деактивирован.
    public function login(\Symfony\Component\HttpFoundation\Request $request){
        try{
            $this->validate($request,[
                'name' => 'required|min:3|max:50',
                'password' => 'required|min:6'
            ]);

//            $remember= $request->has('remember') ? true : false;
            $field = filter_var($request->input('name'), FILTER_VALIDATE_EMAIL)
                ? 'email'
                : 'consumer_login';

            if (Auth::attempt([
                $field => $request->input('name'),
                'password' => $request->input('password'),
                'consumer_status_n' => 3
            ])){

                if (Session::get('VueBlade', Config::get('app.VueBlade')) == "0" ) {

                    return redirect('/admin/server')->with('success', trans('messages.auth.successLogin'));
                }

                if (Session::get('VueBlade', Config::get('app.VueBlade')) == "1" ) {

                    Route::get('/', function () {
//                        $texts = DB::table('translation_captions')
//                            ->join('languages', 'translation_captions.language_id', '=', 'languages.id')
//                            ->join('_captions', 'translation_captions.caption_id','=','_captions.id')
//                            ->where('languages.language_code', config('app.locale'))
//                            ->get();

                        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();

                        $consumer = \Illuminate\Support\Facades\Auth::user();
                        return view('app', compact('consumer','texts'));

                    });

                }
            }
            return back()->with('error', trans('messages.auth.errorLogin'));

        }catch (ValidationException $e){
            Log::error($e->getMessage());
            return back()->with('error', trans('messages.auth.errorLogin'));
        }

    }

    public function username()
    {
        return 'email';
    }


    public function test(Request $request){
        $test = $request;
        return $test;

    }

}
