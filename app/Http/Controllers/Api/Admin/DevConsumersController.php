<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Models\Consumer;
use App\Texts;
use App\Models\Language;
use App\Translation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DevConsumersController extends Controller
{
    public function index()
    {
        if (config('app.VueBlade')) {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            return response()->json([
                'texts' => $texts,
                'consumer' => $consumer
            ]);
        } else {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            return view('/auth.admin.page.user-profile',
                compact('texts', 'consumer'));
        }
    }

    public function update(Request $request)
    {
        if (config('app.VueBlade')) {
            $model = $request->Consumer[0];
            return Consumer::where('id', $model['id'])->update(


                [
                    'consumer_name' => $model['consumer_name'],
//                    'name' => $request->name,
//                    'consumer_login' => $request->consumer_login,
                    'email2' => $model['email2'],
                    'phone_number' => $model['phone_number'],
                    'url_name' => $model['url_name'],
                    'last_name' => $model['last_name'],
                    'first_name' => $model['first_name'],
                    'middle_name' => $model['middle_name'],
                    'male_l' => $model['male_l'],
                    'birth_date' => $model['birth_date'],
                    'photo' => $model['photo'],
                ]
            );
        } else {
            Consumer::where('id', $request->ConsumerId)->update(
                [
                    'consumer_name' => $request->profileConsumerName,
                    'name' => $request->profileName,
                    'consumer_login' => $request->profileConsumerLogin,
                    'phone_number' => $request->profilePhoneNumber,
                ]
            );
            return back()->with('alert', trans('messages.saved'));
        }
    }


    /*Yuriy Yurenko 21.09.2018
     * JSON array with translated user profile card*/
    public function card(Request $request)
    {
        return $request;
        $photo_block = $request->photo;// показывать ли блок с фотографией

        $this->addTranslations();

        $this->consumer = Auth::user();

        $lang = config('app.locale');
//        $this->texts = DB::table('_TranslationCaptions')
//            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//            ->where('languages.language_code',$lang)
//            ->get();


        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

        $userCard = array(

            "main_data_models" => [


                "Consumer" => [$this->consumer],

            ],
            "form_parameters" => [

                "form_title" => $this->texts->where('caption_name', "userProfileGet")->first()->caption_translation,
                "form_code" => "consumer",
                "form_type" => "card",
                "form_base_data_model" => "Consumer",
                "form_main_data_model_id_field" => "id",
                "photo_block" => $photo_block

            ],
            "actions" => [

                "actions_card" => [
                    ["title" => $this->texts->where('caption_name', "ok")->first()->caption_translation, "code" => "save", "class" => "btn btn-green", "link" => "/api/admin/user/card/dev/update", "img" => ""],
                    ["title" => $this->texts->where('caption_name', "apply")->first()->caption_translation, "code" => "apply", "class" => "btn btn-green", "link" => "/api/admin/user/card/dev/update", "img" => ""],
                    ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                ]


            ],
            "links" => [

                ["link_title" => $this->texts->where('caption_name', "UserProfile")->first()->caption_translation, "link_url" => "/profile", "class" => "btn btn-green", "link_type" => "internal", "img" => ""],
                ["link_title" => 'Что такое справка о доходах ?', "link_url" => "/pages/?id=21", "class" => "btn btn-grey", "link_type" => "internal", "img" => ""],
//                ["link_title" => $this->texts->where('caption_name', "downloadedFiles")->first()->caption_translation, "link_url" => "/addLink", "class" => "btn btn-default", "link_type" => "internal", "img" => ""],
            ],
            "tabs" => [

                [
                    "tab_title" => $this->texts->where('caption_name', "basicInformation")->first()->caption_translation,
                    "blocks" => [
                        [
                            "block_title" => "",
                            "block_zone_quantity" => 2,
                            "block_model" => "Consumer",
                            "block_type" => "block_card",
                            "block_fields" => [

                                ['title' => $this->texts->where('caption_name', "basicInformation")->first()->caption_translation, 'model' => '', 'width' => '100%', 'type' => 'title', 'zone' => '1', 'order' => '1'],
                                ['title' => $this->texts->where('caption_name', "personalInfo")->first()->caption_translation, 'model' => '', 'width' => '50%', 'type' => 'title', 'zone' => '2', 'order' => '1'],
                                ['title' => $this->texts->where('caption_name', "contactInfo")->first()->caption_translation, 'model' => '', 'width' => '50%', 'type' => 'title', 'zone' => '2', 'order' => '1'],

                                /*Логин*/
                                ['title' => $this->texts->where('caption_name', "cardLogin")->first()->caption_translation, 'model' => 'consumer_login', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '1'],
                                /*Email*/
                                ['title' => $this->texts->where('caption_name', "cardEmail")->first()->caption_translation, 'model' => 'email', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '1'],
                                /*Код*/
                                ['title' => $this->texts->where('caption_name', "cardCode")->first()->caption_translation, 'model' => 'consumer_code', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '2'],


                                /*Фамилия*/
                                ['title' => $this->texts->where('caption_name', "cardLastname")->first()->caption_translation, 'model' => 'last_name', 'width' => '50%', 'type' => 'text', 'zone' => '2', 'order' => '1'],
                                /*Email2*/
                                ['title' => $this->texts->where('caption_name', "cardEmail2")->first()->caption_translation, 'model' => 'email2', 'width' => '50%', "border_right" => false, 'type' => 'text', 'zone' => '2', 'order' => '2'],
                                /*Имя*/
                                ['title' => $this->texts->where('caption_name', "profileName")->first()->caption_translation, 'model' => 'first_name', 'width' => '50%', 'type' => 'text', 'zone' => '2', 'order' => '2'],

                                /*Номер*/
                                ['title' => $this->texts->where('caption_name', "profilePhoneNumber")->first()->caption_translation, 'model' => 'phone_number', 'width' => '50%', 'type' => 'text', 'zone' => '2', 'order' => '3'],
                                /*Отчество*/
                                ['title' => $this->texts->where('caption_name', "cardMiddlename")->first()->caption_translation, 'model' => 'middle_name', 'width' => '50%', 'type' => 'text', 'zone' => '2', 'order' => '3'],


                                ['title' => $this->texts->where('caption_name', "cardBirthdate")->first()->caption_translation, 'model' => 'birth_date', 'width' => '50%', 'type' => 'date', 'zone' => '2', 'order' => '5'],

                                ['title' => $this->texts->where('caption_name', "changePassword")->first()->caption_translation, 'model' => '', 'width' => '50%', 'type' => 'button', 'zone' => '1', 'order' => '4', 'action' => 'passwordModal'],
                                /*['title' => 'Изменить логин', 'model' => '', 'width' => '50%', 'type' => 'button', 'zone' => '2', 'order' => '4', 'action' => 'loginModal'], //todo изменить на caption*/

                                /*['title' => "Изменить email", 'model' => '', 'width' => '50%', 'type' => 'button', 'zone' => '2', 'order' => '4',
                                    'modal' => [
                                        'inputs' => [
                                            [
                                                'model' => "email",
                                                'title' => "Старый email",
                                                'type' => "text",
                                                'validation' => 'required|email|min:6',
                                            ],
                                            [
                                                'model' => "newEmail",
                                                'title' => "Новый email",
                                                'type' => "text",
                                                'ref' => "newmail",
                                                'validation' => 'required|min:6|email'
                                            ],
                                        ],
                                        'actions' => [
                                            ["title" => "Ok", "code" => "await.ModalRequest,showtoast,ReturnRes,ModalHideIf", "class" => "btn btn-green", "link" => "ссылка на действие", "img" => ""],
                                            ["title" => "Отмена", "code" => "hideModal", "class" => "btn btn-grey", "link" => "ссылка на действие", "img" => ""],
                                            ["title" => "Сбросить", "code" => "resetModal", "class" => "btn btn-grey", "link" => "ссылка на действие", "img" => ""],
                                        ],
                                        'ipost' => '/admin/consumer/email'
                                    ]
                                ],*/


                                [
                                    // описание кнопои
                                    'title' => "TestModal ",     // Титул для кнопки
                                    'text' => 'testmodal',      // Контент кнопки
                                    'width' => '50%',           // Стандартное описание кнопки ( шинина )
                                    'type' => 'DynamicModal',   // Ключевое значение Динамического модального окна
                                    'zone' => '2',              // Стандартная описание позиции кнопки
                                    'order' => '4',             // Стандартная описание позиции кнопки
                                    'modal' => [                // Описание контента модального окна
                                        'ipost' => '/changePassword', // Адрес запроса на бэк
                                        'inputs' => [           // Описание полей ввода
                                            [
                                                'model' => "oldPassword",   //Стандартное описание модели поля ввода
                                                'title' => "Старый пароль", // Титул для поля ввода
                                                'type' => "password",       // тип поля ввода
                                                'validation' => 'required|min:6|max:20' // Ключевое значение  для валидации данных, согласно док. veevalidate
                                            ],
                                            [
                                                'model' => "newPassword",       //Стандартное описание модели поля ввода
                                                'title' => "Новый пароль",      // Титул для поля ввода
                                                'type' => "password",           // тип поля ввода
                                                'ref' => "newpass",             // Ключевое значение для корректной работы валидации полей
                                                'validation' => 'required|min:6|max:20|confirmed:repeatpass',// Ключевое значение  для валидации данных, согласно док. veevalidate
                                                'returnfield' => 'first_name'   // Клбчевое значение для озврата данных согласно действующей модели (опционально)
                                            ],
                                            [
                                                'model' => "repeatPassword",    //Стандартное описание модели поля ввода
                                                'title' => "Повторить пароль",  // Титул для поля ввода
                                                'type' => "password",           // тип поля ввода
                                                'ref' => "repeatpass",          // Ключевое значение для корректной работы валидации полей
                                                'validation' => 'required|min:6|max:20|'// Ключевое значение  для валидации данных, согласно док. veevalidate
                                            ]
                                        ],
                                        'actions' => [
                                            //Оописание енопок модального окна, кнопки показываются, только если есть их описание
                                            /* Очень важно пониматаь последовательность действий, если сперва обнулить форму а потом вернуть рез-т, то рез-т будет пустым */
                                            [
                                                "title" => "Ok",                             // Контент кнопки
                                                "code" => "await.ModalRequest,showtoast,ReturnRes,ifResetModal,hideModal,",     // Ключевое значение Список функцй, которые кнопки выполняют
                                                "class" => "btn btn-green",                  // Класс кнопок
                                                "img" => ""
                                            ],
                                            [
                                                "title" => "Отмена",                        // Контент кнопки
                                                "code" => "resetModal,focehideModal",       // Ключевое значение Список функцй, которые кнопки выполняют
                                                "class" => "btn btn-grey",                   // Класс кнопок
                                            ],
                                            [
                                                "title" => "Сбросить",                       // Контент кнопки
                                                "code" => "resetModal",                      // Ключевое значение Список функцй, которые кнопки выполняют
                                                "class" => "btn btn-grey",                   // Класс кнопок
                                            ],
                                        ],

                                    ],

//                                    ['title'=>$this->texts->where('caption_name', "cardSex")->first()->caption_translation, 'model'=>'male_l', 'width' =>'50%', 'type'=>'select','zone'=>'2','order'=>'4',
//                                        'options'=>[
//                                            ["name"=>$this->texts->where('caption_name', "sexMale")->first()->caption_translation, "id"=>1],
//                                            ["name"=>$this->texts->where('caption_name', "sexFemale")->first()->caption_translation, "id"=>0],
//                                        ],
//                                    ],
//
                                ],
                                [
                                    'title' => 'ConfirmModal',
                                    'text' => 'Confirm',
                                    'type' => 'ConfirmModal', // Тип модального окна
                                    'zone' => '2', 'width' => '50%', 'order' => '5',
                                    'modal' => [
                                        'visible' => 1,
                                        'confirm' => 'true',
                                        'html' => '<h1> Внимание </h1> <p>Это окно вернет true или false в место вызова</p>',
                                        // По умолчанию кнопки в confirm modal всегда 2, если их не указывать то кнопки будут со свойствами умолчанию
                                        'actionOk' => [
                                            "title" => "Ok",            // Контент кнопки
                                            "code" => "confirmOK",      // Рекомендуемая функция по клику confirmOK - которая возвращает true
                                            "class" => "btn btn-green", // Класс для копки
                                        ],
                                        'actionCancle' => [
                                            'visible' => 1,// Статус кнопки, есл иуказать 0 то кнопки не будет в модалке, ожно указывать только тогда когда надо кнопку отключить
                                            "title" => "Отмена",
                                            "code" => "resetModal,focehideModal",
                                            "class" => "btn btn-grey",
                                        ]

                                    ]
                                ],
                                [
                                    'title' => '', 'text' => 'Сообщение', 'type' => 'ConfirmModal', 'zone' => '2', 'width' => '50%', 'order' => '5',
                                    'modal' => [
                                        'confirm' => 'true',
                                        'html' => '<h1> Пример </h1> <p>Пример confirmModal с одной кнопкой</p>',
                                        'actionOk' => [
                                            'title' => 'ок',
                                            'class' => 'btn btn-green ml-a'
                                        ],
                                        'actionCancle' => [
                                            'visible' => 0
                                        ]

                                    ]
                                ],


                            ]
                        ]
                    ],
                ]
            ]

        );


        // return var_dump("<pre>",$userCard,"</pre>");
        return response()->json($userCard);


    }

    public function addTranslations()
    {
        /*

        insert into _captions (id,caption_name) values (423,'ok');
        insert into _captions (id,caption_name) values (424,'apply');
        insert into _captions (id,caption_name) values (425,'back');
        insert into _captions (id,caption_name) values (426,'downloadedFiles');
        insert into _captions (id,caption_name) values (427,'cardLogin');
        insert into _captions (id,caption_name) values (428,'cardCode');
        insert into _captions (id,caption_name) values (429,'changePassword');
        insert into _captions (id,caption_name) values (4100,'cardEmail');
        insert into _captions (id,caption_name) values (431,'cardEmail2');
        insert into _captions (id,caption_name) values (432,'cardURL');
        insert into _captions (id,caption_name) values (433,'personalInfo');
        insert into _captions (id,caption_name) values (434,'cardLastname');
        insert into _captions (id,caption_name) values (435,'cardMiddlename');
        insert into _captions (id,caption_name) values (436,'cardSex');
        insert into _captions (id,caption_name) values (437,'sexMale');
        insert into _captions (id,caption_name) values (438,'sexFemale');
        insert into _captions (id,caption_name) values (439,'cardBirthdate');
        insert into _captions (id,caption_name) values (440,'contactInfo');

         * Translation::create([
            'caption_id' => 423,
            'caption_translation' =>'ОК',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 423,
            'caption_translation' =>'OK',
            'language_id' => 1,
        ]);



        Translation::create([
            'caption_id' => 424,
            'caption_translation' =>'Применить',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 424,
            'caption_translation' =>'Apply',
            'language_id' => 1,
        ]);




          Translation::create([
            'caption_id' => 425,
            'caption_translation' =>'Назад',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 425,
            'caption_translation' =>'Back',
            'language_id' => 1,
        ]);



          Translation::create([
            'caption_id' => 426,
            'caption_translation' =>'Загруженные файлы',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 426,
            'caption_translation' =>'Downloaded Files',
            'language_id' => 1,
        ]);



          Translation::create([
            'caption_id' => 427,
            'caption_translation' =>'Логин',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 427,
            'caption_translation' =>'Login',
            'language_id' => 1,
        ]);


          Translation::create([
            'caption_id' => 428,
            'caption_translation' =>'Код',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 428,
            'caption_translation' =>'Code',
            'language_id' => 1,
        ]);






          Translation::create([
            'caption_id' => 429,
            'caption_translation' =>'Изменить пароль',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 429,
            'caption_translation' =>'Change password',
            'language_id' => 1,
        ]);


            Translation::create([
            'caption_id' => 430,
            'caption_translation' =>'Е-мейл',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 430,
            'caption_translation' =>'E-mail',
            'language_id' => 1,
        ]);


         Translation::create([
            'caption_id' => 431,
            'caption_translation' =>'Е-мейл 2',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 431,
            'caption_translation' =>'E-mail 2',
            'language_id' => 1,
        ]);

          Translation::create([
            'caption_id' => 432,
            'caption_translation' =>'Сайт',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 432,
            'caption_translation' =>'Site',
            'language_id' => 1,
        ]);


          Translation::create([
            'caption_id' => 433,
            'caption_translation' =>'Персональная информация',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 433,
            'caption_translation' =>'Personal information',
            'language_id' => 1,
        ]);



        Translation::create([
            'caption_id' => 434,
            'caption_translation' =>'Фамилия',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 434,
            'caption_translation' =>'Lastname',
            'language_id' => 1,
        ]);

    Translation::create([
            'caption_id' => 435,
            'caption_translation' =>'Отчество',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 435,
            'caption_translation' =>'Patronymic',
            'language_id' => 1,
        ]);

        Translation::create([
            'caption_id' => 436,
            'caption_translation' =>'Пол',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 436,
            'caption_translation' =>'Sex',
            'language_id' => 1,
        ]);


        Translation::create([
            'caption_id' => 437,
            'caption_translation' =>'Мужской',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 437,
            'caption_translation' =>'Male',
            'language_id' => 1,
        ]);


         Translation::create([
            'caption_id' => 438,
            'caption_translation' =>'Женский',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 438,
            'caption_translation' =>'Female',
            'language_id' => 1,
        ]);



        Translation::create([
            'caption_id' => 439,
            'caption_translation' =>'Дата рождения',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 439,
            'caption_translation' =>'Birth Date',
            'language_id' => 1,
        ]);

         Translation::create([
            'caption_id' => 440,
            'caption_translation' =>'Контактная информация',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 440,
            'caption_translation' =>'Contact Information',
            'language_id' => 1,
        ]);

         */
    }


    public function downloadPDF(Request $request)
    {
        $data = Report::where('id', $request->IdReportPdf)->first();
        $data = $data->report_file;

        list($data) = explode(',', $data);
        $data = base64_decode($data);
        $date = Carbon::now()->addDay();
        file_put_contents((public_path('/reports/pdf/' . $date . '.pdf')), $data);

        chmod(public_path('/reports/pdf/' . $date . '.pdf'), 0777);

        return response()->download(public_path('/reports/pdf/' . $date . '.pdf'))->deleteFileAfterSend(true);

    }

}
//////////////////////////////for blade///////////////////////////////////////
///     public function index(){
//        $consumer = Auth::user();
//        $texts = DB::table('_TranslationCaptions')
//            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//            ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
//            ->where('languages.language_code', config('app.locale'))
//            ->get();
//        return view('/auth.admin.page.user-profile',
//            compact('texts','consumer'));
//    }
//
//
//    public function update(Request $request){
//       Consumer::where('id',$request->ConsumerId)->update(
//            [
//                'consumer_name' => $request->profileConsumerName,
//                'name' => $request->profileName,
//                'consumer_login' => $request->profileConsumerLogin,
//                'phone_number' => $request->profilePhoneNumber,
//            ]
//        );
//        return back()->with('alert', trans('messages.saved'));
//    }

