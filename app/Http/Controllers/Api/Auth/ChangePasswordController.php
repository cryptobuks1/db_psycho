<?php


namespace App\Http\Controllers\Api\Auth;

use App\Http\Classes\DateManager;
use App\Http\Controllers\Api\Controller;
use App\Models\ConsumerActivityToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Consumer;
use App\Translation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/*Yuriy Yurenko
20.09.2018 14:55
 *
 * change user password controller
 *  */

class ChangePasswordController extends Controller
{

    //http://broker/changePassword?oldPassword=20182018&newPassword=12345678&XDEBUG_SESSION_START=netbeans-xdebug
    //broker/changePassword?oldPassword=20182018&newPassword=12345678
    /*we have 2 Request parameters oldPassword ,newPassword*/

    /**
     * @var Consumer
     */
    private $consumer;

    public function changePassword(Request $request)
    {

        $this->consumer = Auth::user();
        $model_name = $request->form_parameters['form_base_data_model'];
        $old_pass = $request->main_data_models[$model_name][0]['oldPassword'];
        $new_pass = $request->main_data_models[$model_name][0]['newPassword'];
        $repeat_new_pass = $request->main_data_models[$model_name][0]['repeatPassword'];

        if($new_pass !== $repeat_new_pass)
            return response()->json([
                "message" => "Пароли не совпадают"
            ], 400);

        $lang = config('app.locale');


        /*get all translations captions*/
        //        $this->texts = DB::table('translation_captions')
        //            ->join('languages', 'translation_captions.language_id', '=', 'languages.id')
        //            ->join('_captions', 'translation_captions.caption_id', '=', '_captions.id')
        //            ->where('languages.language_code',$lang)
        //            ->get();
        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


        /*проверяем совпадает ли старый пароль который ввел пользователь с текущим*/
        if(password_verify($old_pass, $this->consumer->password))
        {

            //*check if old user pass not equals new Password which enter user*/
            if(!password_verify($new_pass, $this->consumer->password))
            {

                $this->consumer->password = bcrypt($new_pass);
                $this->consumer->column_change_password_l = false;
                $this->consumer->password_changed_date = \DateManager::now();
                if($this->consumer->save())
                {

                    return response()->json([
                        "message" => $this->texts->where('caption_name', "passwordChangedSucces")
                            ->first()->caption_translation,
                    ]);
                }

            }
            else
            {
                return response()->json([
                    "message" => $this->texts->where('caption_name', "oldNewPassNotMatch")->first()->caption_translation
                ], 400);

            }


        }
        else
        {
            /*if old password not equals*/
            //            return response()->json([
            //                "status"  => 2,
            //                "message" => $this->texts->where('caption_name', "oldPassNotMatch")->first()->caption_translation
            //            ], 400);
            return response()->json([
                "message" => $this->texts->where('caption_name', "oldPassNotMatch")->first()->caption_translation
            ], 400);

        }
    }

    public function setPassword(Request $request)
    {
        $this->consumer = Auth::user();

        $request_token = $request["token_1c"];

        if(!is_null($request_token))
        {
            $token = ConsumerActivityToken::query()
                ->with('systemOperations')
                ->where('token', $request->token_1c)
                ->where('status_n', 0)
                ->where("consumer_id", $this->consumer->id)
                ->where('created_at', '>', Carbon::now()->subSeconds(app('RequestTimeOut')))
                ->get()->first();

            if(!$token)
                return response()->json([
                    "error"   => true,
                    "message" => "Token is invalid"
                ], 400);
        }


        if($this->consumer->column_change_password_l === true)
        {
            $new_pass = $request->has("new_password") ? $request["new_password"] : null;
            $repeat_pass = $request->has("confirm_password") ? $request["confirm_password"] : null;
            if(!is_null($new_pass) && !is_null($repeat_pass))
            {
                $validate = Validator::make([
                    "password"              => $new_pass,
                    "password_confirmation" => $repeat_pass
                ], [
                    "password"              => "required|min:6|confirmed",
                    "password_confirmation" => "required|min:6"
                ]);

                if($validate->fails())
                    return response()->json([
                        "error"   => true,
                        "message" => $validate->messages()->first()
                    ], 400);

                if($this->consumer->column_change_password_l == false)
                    return response()->json([
                        "error"   => true,
                        "message" => "Error",
                        "status"  => 0
                    ], 400);

                $this->consumer->password = bcrypt($new_pass);
                $this->consumer->column_change_password_l = false;
                $this->consumer->password_changed_date = DateManager::now();
            }
        }


//
//        $lang = config('app.locale');
//
//
//        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

        if(is_null($this->consumer->agreement_accepted_date))
        {
            $this->consumer->consumer_status_n = 3;
            $this->consumer->first_name = $request["first_name"];
            $this->consumer->middle_name = $request["middle_name"];
            $this->consumer->last_name = $request["last_name"];
            $this->consumer->phone_number = $request["phone_number"];
            $this->consumer->agreement_accepted_date = DateManager::now();
        }

        if($this->consumer->save())
        {
            if(!is_null($request_token))
            {
                $token->status_n = 1;
                $token->save();
            }

            return response()->json([
                "error"   => false,
                "message" => "Пароль установлен",
                "status"  => 0
            ]);
        }

    }

    public function addTranslations()
    {
        /*

        insert into _captions (id,caption_name) values (420,'passwordChangedSucces');
        insert into _captions (id,caption_name) values (421,'oldNewPassNotMatch');
        insert into _captions (id,caption_name) values (422,'oldPassNotMatch');


        Translation::create([
            'caption_id' => 420,
            'caption_translation' =>'Пароль успешно изменен',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 420,
            'caption_translation' =>'Password succesfully changed',
            'language_id' => 1,
        ]);


        Translation::create([
            'caption_id' => 421,
            'caption_translation' =>'Новый пароль не должен совпадать со старым',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 421,
            'caption_translation' =>'New password should not match with your old password',
            'language_id' => 1,
        ]);



         Translation::create([
            'caption_id' => 422,
            'caption_translation' =>'Старый пароль не совпадает',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 422,
            'caption_translation' =>'Old password not match',
            'language_id' => 1,
        ]);
         *
         *
         */
    }


}
