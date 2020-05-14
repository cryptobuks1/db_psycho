<?php

namespace App\Http\Controllers\Auth;

use App\Models\Consumer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;


//created Alex Yaroshchuk


class ChangeLoginController extends Controller
{

    /*
     Функция изменения email, проверяет на валиаацию, проверят какой тип верификации выбран и
     в зависимости от этого возвращает  вызов метода создания зписи в таблице токенов и соотвествуюший статус
    */
    public function changeEmail(Request $request){
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        $consumer = Auth::user();
        $this->validate($request, [
            'newEmail' => 'required|email|min:3|max:100|unique:Consumers,email',
        ]);
        //осоздаем запись в таблице токенов
        $consActivityToken = (new RegisterController())->createSendToken($request, $consumer);
        //отправляем письмо и меняем email в зависимоти от параметров
        if(app('ExtVerificationTypeSystem') == 0) {
            $status = $texts->where('caption_name', "MailRegistration")->first()->caption_translation;
        }
        if(app('ExtVerificationTypeSystem') == 1) {
            $consumer->email = $request['newEmail'];
            $consumer->save();
            $status =  $texts->where('caption_name', "YouAreRegistered")->first()->caption_translation;
        }
        if(app('ExtVerificationTypeSystem') == 2) {
            $consumer->email = $request['newEmail'];
            $consumer->save();
            $status = $texts->where('caption_name', "EmailChangedSuccess")->first()->caption_translation;
        }
        return response()->json([
           'status' => $status,
        ]);
    }
     /*
        Функция ввызывает метод verify из котроллера регистрации и возвращает соотвестующий статус
     */

    public function confirmEmail($token){
        $texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();
        $consActivityToken = (new RegisterController())->verify($token);

        if($consActivityToken){
            $status = $texts->where('caption_name', "VerificationEmailComplete")->first()->caption_translation;
        }
        else{
            $status =  $texts->where('caption_name', "YouAreRegistered")->first()->caption_translation;
        }
        return redirect('/login')->with('status', $status);
    }
    /*
        Функция валидирует логин
     */
    public function checkLogin(Request $request){
        $this->validate($request, ['consumer_login' => 'required|string|min:3|max:40|unique:Consumers']);
    }
    /*
        Функция еще раз производит валидацию и меняет логин на соотвествующий
    */
    public function changeLogin(Request $request){
        $this->validate($request, ['consumer_login' => 'required|string|min:3|max:40|unique:Consumers']);
        $consumer = Auth::user();
        $consumer->consumer_login = $request['consumer_login'];
        $consumer->save();
    }
}
