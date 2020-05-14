<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Consumer;
use App\Translation;
use Illuminate\Support\Facades\DB;

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

    public function changePassword_old(Request $request)
    {

        $this->consumer = Auth::user();
        $old_pass = $request->oldPassword;
        $new_pass = $request->newPassword;

        $lang = config('app.locale');


        /*get all translations captions*/
        //        $this->texts = DB::table('translation_captions')
        //            ->join('languages', 'translation_captions.language_id', '=', 'languages.id')
        //            ->join('_captions', 'translation_captions.caption_id', '=', '_captions.id')
        //            ->where('languages.language_code',$lang)
        //            ->get();
        $this->texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();


        /*проверяем совпадает ли старый пароль который ввел пользователь с текущим*/
        if(password_verify($old_pass, $this->consumer->password))
        {

            //*check if old user pass not equals new Password which enter user*/
            if(!password_verify($new_pass, $this->consumer->password))
            {

                $this->consumer->password = bcrypt($new_pass);
                $this->consumer->column_change_password_l = false;
                if($this->consumer->save())
                {

                    $response = [
                        "status"  => 0,
                        "message" => $this->texts->where('caption_name', "passwordChangedSucces")
                            ->first()->caption_translation,
                    ];
                }

            }
            else
            {
                $response = [
                    "status"  => 1,
                    "message" => $this->texts->where('caption_name', "oldNewPassNotMatch")->first()->caption_translation
                ];

            }


        }
        else
        {
            /*if old password not equals*/
            $response = [
                "status"  => 2,
                "message" => $this->texts->where('caption_name', "oldPassNotMatch")->first()->caption_translation
            ];

        }


        return response()->json($response);

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
