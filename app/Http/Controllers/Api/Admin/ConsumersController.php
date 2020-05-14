<?php

namespace App\Http\Controllers\Api\Admin;


use App\Http\Classes\CheckController;
use App\Http\Classes\StoredFileManager;
use App\Http\Traits\HasList;
use App\Models\Consumer;
use App\Models\ConsumerAccessRole;
use App\Models\Contractor;
use App\Texts;
use App\Models\Language;
use App\Translation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ConsumersController extends Controller
{
    use HasList;

    public function index()
    {
        if(config('app.VueBlade'))
        {
            $consumer = Auth::user();
            //            $texts = DB::table('_TranslationCaptions')
            //                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
            //                ->where('languages.language_code', config('app.locale'))
            //                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            return response()->json([
                'texts'    => $texts,
                'consumer' => $consumer
            ]);
        }
        else
        {
            $consumer = Auth::user();
            //            $texts = DB::table('_TranslationCaptions')
            //                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
            //                ->where('languages.language_code', config('app.locale'))
            //                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            return view('/auth.admin.page.user-profile', compact('texts', 'consumer'));
        }
    }

    public function update(Request $request)
    {

        $toWrite = [
            "main_data_models" => [
                "Consumers" => [$request["Consumer"][0]]
            ],
            "form_parameters"  => [
                "form_base_data_model" => "Consumers",
            ],
        ];

        $req = new Request($toWrite);

        //Записываем запрос контрагента и получаем результат записи
        $writeRes = $this->write($req);

        return $writeRes;
        //        if(config('app.VueBlade'))
        //        {
        //            $model = $request->Consumer[0];
        //            return Consumer::where('id', $model['id'])->update(
        //
        //
        //                [
        //                    'consumer_name' => $model['consumer_name'],
        //                    //                    'name' => $request->name,
        //                    //                    'consumer_login' => $request->consumer_login,
        //                    'email2'        => $model['email2'],
        //                    'phone_number'  => $model['phone_number'],
        //                    'url_name'      => $model['url_name'],
        //                    'last_name'     => $model['last_name'],
        //                    'first_name'    => $model['first_name'],
        //                    'middle_name'   => $model['middle_name'],
        //                    'male_l'        => $model['male_l'],
        //                    'birth_date'    => $model['birth_date'],
        //                    'photo'         => $model['photo'],
        //                ]
        //            );
        //        }
        //        else
        //        {
        //            Consumer::where('id', $request->ConsumerId)->update(
        //                [
        //                    'consumer_name'  => $request->profileConsumerName,
        //                    'name'           => $request->profileName,
        //                    'consumer_login' => $request->profileConsumerLogin,
        //                    'phone_number'   => $request->profilePhoneNumber,
        //                ]
        //            );
        //            return back()->with('alert', trans('messages.saved'));
        //        }
    }


    /*Yuriy Yurenko 21.09.2018
     * JSON array with translated user profile card*/


    public function cardOld(Request $request)
    {
        $photo_block = $request->photo;// показывать ли блок с фотографией

        $this->addTranslations();

        $this->consumer = Auth::user();

        unset($this->consumer->password);

        $photo = StoredFileManager::downloadFile($this->consumer->stored_file_id);

        if(!isset($photo["error"]))
            $this->consumer->photo = $photo["mime"] . "," . $photo["file"];

        $lang = config('app.locale');
        //        $this->texts = DB::table('_TranslationCaptions')
        //            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
        //            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
        //            ->where('languages.language_code',$lang)
        //            ->get();


        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


        $getConsumAccesRole = ConsumerAccessRole::where('consumer_id', Auth::user()->id)->first();

        //        if (($getConsumAccesRole['access_role_id']) == (int)7) {
        //            $birthdate = [];
        //            $email = [];
        //        } else {

        $birthdate = [
            'title' => $this->texts->where('caption_name', "cardBirthdate")->first()->caption_translation,
            'model' => 'birth_date',
            'width' => '100%',
            'type'  => 'date',
            'zone'  => '2',
            'order' => '5'
        ];

        $email = [
            'title' => '',
            'text'  => "Изменить почту",
            'width' => '50%',
            'type'  => 'DynamicModal',
            'zone'  => '1',
            'order' => '4',
            'modal' => [
                'ipost'   => '/admin/consumer/email',
                'inputs'  => [
                    [
                        'model'      => "old_email",
                        'title'      => "Старая почта",
                        'type'       => "text",
                        'validation' => 'required|email'
                    ],
                    [
                        'model'       => "newEmail",
                        'title'       => "Новая почта",
                        'type'        => "text",
                        'ref'         => "newEmail",
                        'validation'  => 'required|email|confirmed:repeat_new_email',
                        'returnfield' => 'first_name'
                    ],
                    [
                        'model'      => "repeat_new_email",
                        'title'      => "Повторить почту",
                        'type'       => "text",
                        'ref'        => "repeat_new_email",
                        'validation' => 'required|email'
                    ]
                ],
                'actions' => [
                    [
                        "title" => "Ok",
                        "code"  => "await.ModalRequest,showtoast,ReturnRes,ifResetModal,hideModal",
                        "class" => "btn btn-green",
                        "img"   => ""
                    ],
                    [
                        "title" => "Отмена",
                        "code"  => "resetModal,focehideModal",
                        "class" => "btn btn-grey",
                    ],
                    [
                        "title" => "Сбросить",
                        "code"  => "resetModal",
                        "class" => "btn btn-grey",
                    ],
                ],
            ],
        ];


        $userCard = array(

            "main_data_models" => [


                "Consumers" => [$this->consumer],

            ],
            "form_parameters"  => [

                "form_title"                    => $this->texts->where('caption_name', "userProfileGet")
                    ->first()->caption_translation,
                "form_code"                     => "consumer",
                "form_type"                     => "card",
                "form_base_data_model"          => "Consumers",
                "form_main_data_model_id_field" => "id",
                "photo_block"                   => $photo_block

            ],
            "actions"          => [

                "actions_card" => [
                    [
                        "title" => $this->texts->where('caption_name', "ok")->first()->caption_translation,
                        "code"  => "save",
                        "class" => "btn btn-green",
                        "link"  => "/admin/user/profile/update",
                        "img"   => ""
                    ],
                    [
                        "title" => $this->texts->where('caption_name', "apply")->first()->caption_translation,
                        "code"  => "apply",
                        "class" => "btn btn-green",
                        "link"  => "/admin/user/profile/update",
                        "img"   => ""
                    ],
                    //                    ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "ссылка на действие", "img" => ""],
                    [
                        "title" => $this->texts->where('caption_name', "back")->first()->caption_translation,
                        "code"  => "back",
                        "class" => "btn btn-grey",
                        "link"  => "",
                        "img"   => ""
                    ],
                ]


            ],
            "sets"             => $this->getButtonsList(["profile_card_actions"]),
            "links"            => [

                //                ["link_title" => $this->texts->where('caption_name', "UserProfile")
                //                    ->first()->caption_translation, "link_url" => "/profile", "class" => "btn btn-green", "link_type" => "internal", "img" => ""],
                //                ["link_title" => $this->texts->where('caption_name', "downloadedFiles")->first()->caption_translation, "link_url" => "/addLink", "class" => "btn btn-default", "link_type" => "internal", "img" => ""],
                [
                    "link_title" => $this->texts->where('caption_name', "Contractor")->first()->caption_translation,
                    "link_url"   => "/clients",
                    "class"      => "btn btn-link-inline",
                    "link_type"  => "internal",
                    "img"        => ""
                ],
            ],
            "tabs"             => [

                [
                    "tab_title" => $this->texts->where('caption_name', "basicInformation")
                        ->first()->caption_translation,
                    "blocks"    => [
                        [
                            "block_title"         => "",
                            "block_zone_quantity" => 2,
                            "block_model"         => "Consumers",
                            "block_type"          => "block_card",
                            "block_fields"        => [

                                [
                                    'title' => $this->texts->where('caption_name', "basicInformation")
                                        ->first()->caption_translation,
                                    'model' => '',
                                    'width' => '50%',
                                    'type'  => 'title',
                                    'zone'  => '1',
                                    'order' => '1'
                                ],
                                [
                                    'title' => $this->texts->where('caption_name', "personalInfo")
                                        ->first()->caption_translation,
                                    'model' => '',
                                    'width' => '100%',
                                    'type'  => 'title',
                                    'zone'  => '2',
                                    'order' => '1'
                                ],
                                //                                ['title' => $this->texts->where('caption_name',
                                //                                    "contactInfo")
                                //                                    ->first()->caption_translation, 'model' => '', 'width' => '50%', 'type' => 'title', 'zone' => '2', 'order' => '1'],

                                /*Email*/
                                [
                                    'title' => $this->texts->where('caption_name', "cardEmail")
                                        ->first()->caption_translation,
                                    'model' => 'email',
                                    'width' => '50%',
                                    'type'  => 'label',
                                    'zone'  => '1',
                                    'order' => '1'
                                ],

                                /*Логин*/
                                //                                ['title'                                    => $this->texts->where('caption_name',
                                //                                    "cardLogin")
                                //                                    ->first()->caption_translation, 'model' => 'consumer_login', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '2'],


                                /*Фамилия*/
                                [
                                    'title'      => $this->texts->where('caption_name', "cardLastname")
                                        ->first()->caption_translation,
                                    'model'      => 'last_name',
                                    'width'      => '100%',
                                    'type'       => 'text',
                                    'zone'       => '2',
                                    'order'      => '2',
                                    'validation' => ['required' => true]
                                ],

                                [
                                    'title'  => "",
                                    'model'  => '""',
                                    'width'  => '50%',
                                    'type'   => 'text',
                                    "hidden" => true,
                                    'zone'   => '1',
                                    'order'  => '2'
                                ],


                                //<<<<<<< HEAD
                                //=======
                                /*Email*/
                                [
                                    'title' => $this->texts->where('caption_name', "cardEmail")
                                        ->first()->caption_translation,
                                    'model' => 'email',
                                    'width' => '50%',
                                    'type'  => 'label',
                                    'zone'  => '1',
                                    'order' => '3'
                                ],
                                //>>>>>>> feature/demo
                                /*Имя*/
                                [
                                    'title'      => $this->texts->where('caption_name', "profileName")
                                        ->first()->caption_translation,
                                    'model'      => 'first_name',
                                    'width'      => '100%',
                                    'type'       => 'text',
                                    'zone'       => '2',
                                    'order'      => '3',
                                    'validation' => ['required' => true]
                                ],
                                /*Код*/
                                //                                ['title' => $this->texts->where('caption_name',
                                //                                    "cardCode")
                                //                                    ->first()->caption_translation, 'model' => 'consumer_code', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '2'],

                                //<<<<<<< HEAD
                                //                                //                                ['title' => "", 'model' => '""', 'width' => '50%', 'type' => 'text', "hidden" => true, 'zone' => '1', 'order' => '2'],
                                //=======
                                //                                ['title' => "", 'model' => '""', 'width' => '50%', 'type' => 'text', "hidden" => true, 'zone' => '1', 'order' => '2'],

                                /*Отчество*/
                                [
                                    'title' => $this->texts->where('caption_name', "cardMiddlename")
                                        ->first()->caption_translation,
                                    'model' => 'middle_name',
                                    'width' => '100%',
                                    'type'  => 'text',
                                    'zone'  => '2',
                                    'order' => '4'
                                ],

                                //>>>>>>> feature/demo

                                //DynamicModal
                                /*Изменить пароль */
                                [
                                    'title' => '',
                                    'text'  => $this->texts->where('caption_name', "changePassword")
                                        ->first()->caption_translation,
                                    'width' => '50%',
                                    'type'  => 'DynamicModal',
                                    'zone'  => '1',
                                    'order' => '5',
                                    'modal' => [
                                        'ipost'   => '/admin/changePassword',
                                        'inputs'  => [
                                            [
                                                'model'      => "oldPassword",
                                                'title'      => "Старый пароль",
                                                'type'       => "password",
                                                'validation' => 'required|min:6|max:20'
                                            ],
                                            [
                                                'model'       => "newPassword",
                                                'title'       => "Новый пароль",
                                                'type'        => "password",
                                                'ref'         => "newpass",
                                                'validation'  => 'required|min:6|max:20|confirmed:repeatpass',
                                                'returnfield' => 'first_name'
                                            ],
                                            [
                                                'model'      => "repeatPassword",
                                                'title'      => "Повторить пароль",
                                                'type'       => "password",
                                                'ref'        => "repeatpass",
                                                'validation' => 'required|min:6|max:20|'
                                            ]
                                        ],
                                        'actions' => [
                                            [
                                                "title" => "Ok",
                                                "code"  => "await.ModalRequest,showtoast,ReturnRes,ifResetModal,hideModal",
                                                "class" => "btn btn-green",
                                                "img"   => ""
                                            ],
                                            [
                                                "title" => "Отмена",
                                                "code"  => "resetModal,focehideModal",
                                                "class" => "btn btn-grey",
                                            ],
                                            [
                                                "title" => "Сбросить",
                                                "code"  => "resetModal",
                                                "class" => "btn btn-grey",
                                            ],
                                        ],
                                    ],
                                ],

                                /*Отчество*/
                                [
                                    'title' => $this->texts->where('caption_name', "cardMiddlename")
                                        ->first()->caption_translation,
                                    'model' => 'middle_name',
                                    'width' => '50%',
                                    'type'  => 'text',
                                    'zone'  => '1',
                                    'order' => '6'
                                ],


                                //                                $birthdate,


                                //                                $email,

                                //                                /*Email2*/
                                //                                ['title' => $this->texts->where('caption_name',
                                //                                    "cardEmail2")
                                //                                    ->first()->caption_translation, 'model' => 'email2', 'width' => '50%', "border_right" => false, 'type' => 'text', 'zone' => '2', 'order' => '2'],


                                /*Номер*/

                                //                                ['title' => $this->texts->where('caption_name',
                                //                                    "profilePhoneNumber")
                                //                                    ->first()->caption_translation, 'model' => 'phone_number', 'width' => '50%', 'type' => 'text', 'zone' => '2', 'order' => '3'],


                                /*Изменить пароль ['title' => $this->texts->where('caption_name', "changePassword")->first()->caption_translation, 'model' => '', 'width' => '50%', 'type' => 'button', 'zone' => '1', 'order' => '4', 'action' => 'passwordModal'],*/
                                /*['title'=>"Изменить email", 'model'=>'', 'width' =>'50%','type'=>'button', 'zone'=>'2','order'=>'4','action'=>'emailModal'], //todo изменить на caption*/
                                /*Изменить логин ['title'=>'Изменить логин', 'model'=>'', 'width' =>'50%','type'=>'button', 'zone'=>'2','order'=>'4','action'=>'loginModal'], //todo изменить на caption*/


                                // /*Изменить email */ [ 'title' => '', 'text' => 'Изменить email', 'width' => '50%', 'type' => 'DynamicModal', 'zone' => '2', 'order' => '4', 'modal' => [ 'ipost' => '/admin/consumer/email', 'inputs' => [ [ 'model' => "newmail", 'title' => "Новый email", 'type' => "text", 'validation' => 'email', 'returnfield' => 'first_name'  ], ], 'actions' => [ [ "title" => "Ok", "code" => "await.ModalRequest,showtoast,ReturnRes,ifResetModal,hideModal,", "class" => "btn btn-green", "img" => ""  ], [ "title" => "Отмена", "code" => "resetModal,focehideModal", "class" => "btn btn-grey", ], [ "title" => "Сбросить", "code" => "resetModal", "class" => "btn btn-grey", ], ], ],]


                                //                                    ['title'=>$this->texts->where('caption_name', "cardSex")->first()->caption_translation, 'model'=>'male_l', 'width' =>'50%', 'type'=>'select','zone'=>'2','order'=>'4',
                                //                                        'options'=>[
                                //                                            ["name"=>$this->texts->where('caption_name', "sexMale")->first()->caption_translation, "id"=>1],
                                //                                            ["name"=>$this->texts->where('caption_name', "sexFemale")->first()->caption_translation, "id"=>0],
                                //                                        ],
                                //                                    ],
                                //
                                //                                ['title'=>$this->texts->where('caption_name', "cardURL")->first()->caption_translation, 'model'=>'url_name', 'width' =>'50%', 'type'=>'text','zone'=>'2','order'=>'4'],
                                // ['title' => "ИНН", 'model' => '', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '1'],
                                //                                ['title' => "КПП", 'model' => '', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '1'],
                                //                                ['title' => "ОГРН", 'model' => '', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '1'],
                                //['title' => "", 'model' => '""', 'width' => '50%', 'type' => 'text', "hidden"=>true, 'zone' => '2', 'order' => '2'],
                                // ['title' => "", 'model' => '""', 'width' => '50%', 'type' => 'text', "hidden"=>true, 'zone' => '2', 'order' => '2'],
                            ]
                        ]
                    ]
                ],
            ]

        );


        // return var_dump("<pre>",$userCard,"</pre>");
        return response()->json($userCard);


    }

    /*Albert 10.10.19*/
    public function card22(Request $request)
    {

        self::getDefaultDBAreaId();
        $captionName = [
            'ok',
            'apply',
            'back',
            'Main',
            'cardBirthdate',
            'userProfileGet',
            'Clients',
            'basicInformation',
            'basicInformation',
            'personalInfo',
            'cardEmail',
            'cardLastname',
            'cardEmail',
            'profileName',
            'cardMiddlename',
            'changePassword',
            'cardMiddlename',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy',
            'UpdatedAt',
            'UpdatedBy'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $contReqId = $request->id;

        if($contReqId == "new")
        {
            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }

            $contRequest = Consumer::getNewObject();
        }
        else
        {
            $photo_block = $request->photo;
            $contRequest = $this->consumer = Auth::user();
            unset($contRequest->password);

            $photo = StoredFileManager::downloadFile($contRequest->stored_file_id);

            if(!isset($photo["error"]))
                $contRequest->photo = $photo["mime"] . "," . $photo["file"];

            if(!$contRequest)
                return abort('403');

            $contRequest = $contRequest->toArray();
        }
        $model = 'App\Models\Controller';

        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_description" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in venenatis sem. Nulla pulvinar,<br> diam quis feugiat fringilla, ligula metus consequat diam, id vulputate magna turpis sit amet feli',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        //                        "block_title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                        "block_title"         => 'Consumer',
                        "block_zone_quantity" => 2,
                        "block_model"         => $mainModel,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            [
                                'title'        => $getArrayCaptions['basicInformation']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel,
                                'model'        => '',
                                'type'         => 'title',
                                'width'        => '50%',
                                "grid_column"  => "zero/half",
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false,
                            ],

                            [
                                'title'        => $getArrayCaptions['personalInfo']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel,
                                'model'        => '',
                                'type'         => 'title',
                                'width'        => '100%',
                                "grid_column"  => "zero/half",
                                "zone"         => "2",
                                "order"        => "1",
                                "border_right" => false,
                            ],

                            [
                                'title'        => $getArrayCaptions['cardEmail']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel,
                                'model'        => 'email',
                                'type'         => 'label',
                                'width'        => '50%',
                                "grid_column"  => "zero/half",
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false,
                            ],

                            [
                                'title'        => $getArrayCaptions['cardLastname']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel,
                                'model'        => 'last_name',
                                'type'         => 'text',
                                "hidden"       => true,
                                'width'        => '50%',
                                "grid_column"  => "zero/half",
                                "zone"         => "1",
                                "order"        => "2",
                                "border_right" => false,
                            ],

                            [
                                'title'        => $getArrayCaptions['profileName']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel,
                                'model'        => 'first_name',
                                'type'         => 'text',
                                'width'        => '100%',
                                "grid_column"  => "zero/half",
                                "zone"         => "2",
                                "order"        => "3",
                                'validation'   => ['required' => true],
                                "border_right" => false,
                            ],

                            [
                                'title'        => $getArrayCaptions['cardMiddlename']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel,
                                'model'        => 'middle_name',
                                'type'         => 'text',
                                'width'        => '100%',
                                "grid_column"  => "zero/half",
                                "zone"         => "2",
                                "order"        => "4",
                                "border_right" => false,
                            ],

                            [
                                'title'        => $getArrayCaptions['changePassword']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel,
                                'model'        => [
                                    'ipost'   => '/admin/changePassword',
                                    'inputs'  => [
                                        [
                                            'model'      => "oldPassword",
                                            'title'      => "Старый пароль",
                                            'type'       => "password",
                                            'validation' => 'required|min:6|max:20'
                                        ],
                                        [
                                            'model'       => "newPassword",
                                            'title'       => "Новый пароль",
                                            'type'        => "password",
                                            'ref'         => "newpass",
                                            'validation'  => 'required|min:6|max:20|confirmed:repeatpass',
                                            'returnfield' => 'first_name'
                                        ],
                                        [
                                            'model'      => "repeatPassword",
                                            'title'      => "Повторить пароль",
                                            'type'       => "password",
                                            'ref'        => "repeatpass",
                                            'validation' => 'required|min:6|max:20|'
                                        ]
                                    ],
                                    'actions' => [
                                        [
                                            "title" => "Ok",
                                            "code"  => "await.ModalRequest,showtoast,ReturnRes,ifResetModal,hideModal",
                                            "class" => "btn btn-green",
                                            "img"   => ""
                                        ],
                                        [
                                            "title" => "Отмена",
                                            "code"  => "resetModal,focehideModal",
                                            "class" => "btn btn-grey",
                                        ],
                                        [
                                            "title" => "Сбросить",
                                            "code"  => "resetModal",
                                            "class" => "btn btn-grey",
                                        ],
                                    ],
                                ],
                                'type'         => 'DynamicModal',
                                'width'        => '50%',
                                "grid_column"  => "zero/half",
                                "zone"         => "1",
                                "order"        => "5",
                                "border_right" => false,
                            ],


                        ]
                    ],
                ]
            ],
        ];


        if($formShowParam['show_system_tab'])
        {
            $tabSystem = [
                "tab_title"       => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $mainModel,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title'       => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model'       => 'created_at',
                                "model_name"  => $mainModel,
                                'type'        => 'label',
                                'width'       => '50%',
                                "grid_column" => "zero/half",
                                "zone"        => "1",
                                "order"       => "1"
                            ],
                            [
                                'title'       => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model'       => 'created_by',
                                "model_name"  => $mainModel,
                                'type'        => 'label',
                                'width'       => '50%',
                                "grid_column" => "half/15",
                                "zone"        => "1",
                                "order"       => "2"
                            ],
                            [
                                'title'       => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model'       => 'updated_at',
                                "model_name"  => $mainModel,
                                'type'        => 'label',
                                'width'       => '50%',
                                "grid_column" => "zero/half",
                                "zone"        => "2",
                                "order"       => "1"
                            ],
                            [
                                'title'       => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model'       => 'updated_by',
                                "model_name"  => $mainModel,
                                'type'        => 'label',
                                'width'       => '50%',
                                "grid_column" => "half/15",
                                "zone"        => "2",
                                "order"       => "2"
                            ],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $res = [
            [ //Итоговый массив рекизитов

              'id'                       => $contRequest['id'],
              'IsAdmin'                  => $contRequest['IsAdmin'],
              'consumer_code'            => $contRequest['consumer_code'],
              'consumer_login'           => $contRequest['consumer_login'],
              //            'password' => $contRequest['password'],
              'consumer_name'            => $contRequest['consumer_name'],
              'consumer_status_n'        => $contRequest['consumer_status_n'],
              'consumer_type_code'       => $contRequest['consumer_type_code'],
              'consumer_is_system_n'     => $contRequest['consumer_is_system_n'],
              'email'                    => $contRequest['email'],
              'email2'                   => $contRequest['email2'],
              'phone_number'             => $contRequest['phone_number'],
              'url_name'                 => $contRequest['url_name'],
              'first_name'               => $contRequest['first_name'],
              'last_name'                => $contRequest['last_name'],
              'middle_name'              => $contRequest['middle_name'],
              'male_l'                   => $contRequest['male_l'],
              'birth_date'               => $contRequest['birth_date'],
              'deleted_l'                => $contRequest['deleted_l'],
              //            'remember_token' => $contRequest['remember_token'],
              'column_change_password_l' => $contRequest['column_change_password_l'],
              'stored_file_id'           => $contRequest['stored_file_id'],
              'agreement_accepted_date'  => $contRequest['agreement_accepted_date'],
              'password_changed_date'    => $contRequest['password_changed_date'],
              'created_at'               => $contRequest['created_at'],
              'created_by'               => $contRequest['created_by'],
              'updated_at'               => $contRequest['updated_at'],
              'updated_by'               => $contRequest['updated_by'],
            ]
        ];


        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
                //                $mainModel => $ColumnContractor
                $mainModel => $res
            ],

            "add_data_models" => [

            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['userProfileGet']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "disable_inputs"                => $formShowParam['read_only'],
                "form_is_dependent"             => false,
                // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $mainModel,
                //                "form_base_data_model" => "Consumers",
                "use_grid_layout"               => true,
                "form_main_data_model_id_field" => "id",
                //                "form_main_data_model_name" => $ColumnContractor[0]['contractor_short_name'],
                //                "form_main_data_model_name" => $res['consumer_name'],
                "photo_block"                   => $photo_block,
                "form_main_data_model_name"     => 'consumer_name',
                "form_type_list"                => [
                    "form_card_url"     => "/consumer_new/",
                    "form_search_field" => "consumer_name",
                ],
            ],

            "links" => [
                [

                ],
            ],

            "tabs" => $tabs
        ];

        return response()->json($card);

        /*------------------------------------*/


        //        $userCard = array(
        //
        //            "main_data_models" => [
        //
        //
        //                "Consumers" => [$this->consumer],
        //
        //            ],
        //            "form_parameters" => [
        //
        //                "form_title" => $this->texts->where('caption_name', "userProfileGet")
        //                    ->first()->caption_translation,
        //                "form_code" => "consumer",
        //                "form_type" => "card",
        //                "form_base_data_model" => "Consumers",
        //                "form_main_data_model_id_field" => "id",
        //                "photo_block" => $photo_block
        //
        //            ],
        //            "actions" => [
        //
        //                "actions_card" => [
        //                    ["title" => $this->texts->where('caption_name', "ok")
        //                        ->first()->caption_translation, "code" => "save", "class" => "btn btn-green", "link" => "/admin/user/profile/update", "img" => ""],
        //                    ["title" => $this->texts->where('caption_name', "apply")
        //                        ->first()->caption_translation, "code" => "apply", "class" => "btn btn-green", "link" => "/admin/user/profile/update", "img" => ""],
        //                    //                    ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "ссылка на действие", "img" => ""],
        //                    ["title" => $this->texts->where('caption_name', "back")
        //                        ->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
        //                ]
        //
        //
        //            ],
        //            "sets" => $this->getButtonsList(["profile_card_actions"]),
        //            "links" => [
        //
        //                //                ["link_title" => $this->texts->where('caption_name', "UserProfile")
        //                //                    ->first()->caption_translation, "link_url" => "/profile", "class" => "btn btn-green", "link_type" => "internal", "img" => ""],
        //                //                ["link_title" => $this->texts->where('caption_name', "downloadedFiles")->first()->caption_translation, "link_url" => "/addLink", "class" => "btn btn-default", "link_type" => "internal", "img" => ""],
        //                ["link_title" => $this->texts->where('caption_name', "Clients")->first()->caption_translation,
        //                    "link_url" => "/clients", "class" => "btn btn-link-inline", "link_type" => "internal", "img" => ""],
        //            ],
        //            "tabs" => [
        //
        //                [
        //                    "tab_title" => $this->texts->where('caption_name', "basicInformation")
        //                        ->first()->caption_translation,
        //                    "blocks" => [
        //                        [
        //                            "block_title" => "",
        //                            "block_zone_quantity" => 2,
        //                            "block_model" => "Consumers",
        //                            "block_type" => "block_card",
        //                            "block_fields" => [
        //
        //                                ['title' => $this->texts->where('caption_name',
        //                                    "basicInformation")
        //                                    ->first()->caption_translation, 'model' => '', 'width' => '50%', 'type' => 'title', 'zone' => '1', 'order' => '1'],
        //                                ['title' => $this->texts->where('caption_name',
        //                                    "personalInfo")
        //                                    ->first()->caption_translation, 'model' => '', 'width' => '100%', 'type' => 'title', 'zone' => '2', 'order' => '1'],
        //                                //                                ['title' => $this->texts->where('caption_name',
        //                                //                                    "contactInfo")
        //                                //                                    ->first()->caption_translation, 'model' => '', 'width' => '50%', 'type' => 'title', 'zone' => '2', 'order' => '1'],
        //
        //                                /*Email*/
        //                                ['title' => $this->texts->where('caption_name',
        //                                    "cardEmail")
        //                                    ->first()->caption_translation, 'model' => 'email', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '1'],
        //
        //                                /*Логин*/
        //                                //                                ['title'                                    => $this->texts->where('caption_name',
        //                                //                                    "cardLogin")
        //                                //                                    ->first()->caption_translation, 'model' => 'consumer_login', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '2'],
        //
        //
        //                                /*Фамилия*/
        //                                ['title' => $this->texts->where('caption_name',
        //                                    "cardLastname")
        //                                    ->first()->caption_translation, 'model' => 'last_name', 'width' => '100%', 'type' => 'text', 'zone' => '2', 'order' => '2', 'validation' => ['required' => true]],
        //
        //                                ['title' => "", 'model' => '""', 'width' => '50%', 'type' => 'text', "hidden" => true, 'zone' => '1', 'order' => '2'],
        //
        //
        ////<<<<<<< HEAD
        ////=======
        //                                /*Email*/
        //                                ['title' => $this->texts->where('caption_name',
        //                                    "cardEmail")
        //                                    ->first()->caption_translation, 'model' => 'email', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '3'],
        ////>>>>>>> feature/demo
        //                                /*Имя*/
        //                                ['title' => $this->texts->where('caption_name',
        //                                    "profileName")
        //                                    ->first()->caption_translation, 'model' => 'first_name', 'width' => '100%', 'type' => 'text', 'zone' => '2', 'order' => '3', 'validation' => ['required' => true]],
        //                                /*Код*/
        //                                //                                ['title' => $this->texts->where('caption_name',
        //                                //                                    "cardCode")
        //                                //                                    ->first()->caption_translation, 'model' => 'consumer_code', 'width' => '50%', 'type' => 'label', 'zone' => '1', 'order' => '2'],
        //
        ////<<<<<<< HEAD
        ////                                //                                ['title' => "", 'model' => '""', 'width' => '50%', 'type' => 'text', "hidden" => true, 'zone' => '1', 'order' => '2'],
        ////=======
        ////                                ['title' => "", 'model' => '""', 'width' => '50%', 'type' => 'text', "hidden" => true, 'zone' => '1', 'order' => '2'],
        //
        //                                /*Отчество*/
        //                                ['title' => $this->texts->where('caption_name',
        //                                    "cardMiddlename")
        //                                    ->first()->caption_translation, 'model' => 'middle_name', 'width' => '100%', 'type' => 'text', 'zone' => '2', 'order' => '4'],
        //
        ////>>>>>>> feature/demo
        //
        //                                //DynamicModal
        //                                /*Изменить пароль */
        //                                [
        //                                    'title' => '', 'text' => $this->texts->where('caption_name',
        //                                    "changePassword")
        //                                    ->first()->caption_translation, 'width' => '50%', 'type' => 'DynamicModal', 'zone' => '1', 'order' => '5', 'modal' =>
        //                                    [
        //                                        'ipost' => '/admin/changePassword',
        //                                        'inputs' =>
        //                                            [
        //                                                ['model' => "oldPassword", 'title' => "Старый пароль", 'type' => "password", 'validation' => 'required|min:6|max:20'],
        //                                                ['model' => "newPassword", 'title' => "Новый пароль", 'type' => "password", 'ref' => "newpass", 'validation' => 'required|min:6|max:20|confirmed:repeatpass', 'returnfield' => 'first_name'],
        //                                                ['model' => "repeatPassword", 'title' => "Повторить пароль", 'type' => "password", 'ref' => "repeatpass", 'validation' => 'required|min:6|max:20|']
        //                                            ],
        //                                        'actions' =>
        //                                            [
        //                                                ["title" => "Ok", "code" => "await.ModalRequest,showtoast,ReturnRes,ifResetModal,hideModal", "class" => "btn btn-green", "img" => ""],
        //                                                ["title" => "Отмена", "code" => "resetModal,focehideModal", "class" => "btn btn-grey",],
        //                                                ["title" => "Сбросить", "code" => "resetModal", "class" => "btn btn-grey",],
        //                                            ],
        //                                    ],
        //                                ],
        //
        //                                /*Отчество*/
        //                                ['title' => $this->texts->where('caption_name',
        //                                    "cardMiddlename")
        //                                    ->first()->caption_translation, 'model' => 'middle_name', 'width' => '50%', 'type' => 'text', 'zone' => '1', 'order' => '6'],
        //
        //                            ]
        //                        ]
        //                    ]
        //                ],
        //            ]
        //
        //        );
        //
        //
        //        // return var_dump("<pre>",$userCard,"</pre>");
        //        return response()->json($userCard);


    }


    public function card(Request $request) // todo  карточку надо переделать под общий json
    {

        $captionName = [
            'ok',
            'apply',
            'back',
            'Main',
            'cardBirthdate',
            'userProfileGet',
            'Contractors',
            'basicInformation',
            'basicInformation',
            'personalInfo',
            'cardEmail',
            'cardLastname',
            'cardEmail',
            'profileName',
            'cardMiddlename',
            'changePassword',
            'cardMiddlename',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy',
            'UpdatedAt',
            'UpdatedBy'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $photo_block = true;// показывать ли блок с фотографией

        $this->consumer = Auth::user();

        unset($this->consumer->password);

        $photo = StoredFileManager::downloadFile($this->consumer->stored_file_id);

        if(!isset($photo["error"]))
            $this->consumer->photo = $photo["mime"] . "," . $photo["file"];

        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

        $userCard = array(

            "main_data_models" => [


                "Consumers" => [$this->consumer],

            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['userProfileGet']['translation_captions']['caption_translation'],
                "form_code"                     => "consumer",
                "form_type"                     => "card",
                "form_base_data_model"          => "Consumers",
                "form_main_data_model_id_field" => "id",
                "photo_block"                   => $photo_block

            ],
            "actions"          => [

                "actions_card" => [
                    [
                        "title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'],
                        "code"  => "save",
                        "class" => "btn btn-green",
                        "link"  => "/admin/user/profile/update",
                        "img"   => ""
                    ],

                    [
                        "title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'],
                        "code"  => "apply",
                        "class" => "btn btn-green",
                        "link"  => "/admin/user/profile/update",
                        "img"   => ""
                    ],
                    [
                        "title" => $getArrayCaptions['back']['translation_captions']['caption_translation'],
                        "code"  => "back",
                        "class" => "btn btn-grey",
                        "link"  => "",
                        "img"   => ""
                    ],
                ]
            ],
            "sets"             => $this->getButtonsList(["profile_card_actions"]),
            "links"            => [
//          ЗубановИА 15042020 закоментировал для профиля под BankNet.
//                [
//                    "link_title" => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
//                    "link_url"   => "/clients",
//                    "class"      => "btn btn-link-inline",
//                    "link_type"  => "internal",
//                    "img"        => ""
//                ],
            ],
            "tabs"             => [

                [
                    "tab_title" => $getArrayCaptions['basicInformation']['translation_captions']['caption_translation'],
                    "blocks"    => [
                        [
                            "block_title"         => "",
                            "block_zone_quantity" => 2,
                            "block_model"         => "Consumers",
                            "block_type"          => "block_card",
                            "block_fields"        => [

                                [
                                    'title'      => $getArrayCaptions['basicInformation']['translation_captions']['caption_translation'],
                                    'model_name' => "Consumers",
                                    'model'      => '',
                                    'width'      => '100%',
                                    'type'       => 'title',
                                    'zone'       => '1',
                                    'order'      => '1'
                                ],
                                [
                                    'title'      => $getArrayCaptions['personalInfo']['translation_captions']['caption_translation'],
                                    'model_name' => "Consumers",
                                    'model'      => '',
                                    'width'      => '100%',
                                    'type'       => 'title',
                                    'zone'       => '2',
                                    'order'      => '1'
                                ],

                                /*Email*/
                                [
                                    'title'      => $getArrayCaptions['cardEmail']['translation_captions']['caption_translation'],
                                    'model_name' => "Consumers",
                                    'model'      => 'email',
                                    'width'      => '100%',
                                    'type'       => 'label',
                                    'zone'       => '1',
                                    'order'      => '1'
                                ],
                                [
                                    'title'      => $this->texts->where('caption_name', "cardLogin")
                                        ->first()->caption_translation,
                                    'model_name' => 'Consumers',
                                    'model'      => 'consumer_login',
                                    'width'      => '100%',
                                    'type'       => 'label',
                                    'zone'       => '1',
                                    'order'      => '2'
                                ],

                                /*Фамилия*/
                                [
                                    'title'      => $getArrayCaptions['cardLastname']['translation_captions']['caption_translation'],
                                    'model_name' => "Consumers",
                                    'model'      => 'last_name',
                                    'width'      => '100%',
                                    'type'       => 'text',
                                    'zone'       => '2',
                                    'order'      => '2',
                                    'validation' => ['required' => true]
                                ],


                                //                                ['title' => "",'model_name'=>"Consumers ,'model' => '""', 'width' => '50%', 'type' => 'text', "hidden" => true, 'zone' => '1', 'order' => '2'],

                                /*Имя*/
                                [
                                    'title'      => $getArrayCaptions['profileName']['translation_captions']['caption_translation'],
                                    'model_name' => "Consumers",
                                    'model'      => 'first_name',
                                    'width'      => '100%',
                                    'type'       => 'text',
                                    'zone'       => '2',
                                    'order'      => '3',
                                    'validation' => ['required' => true]
                                ],

                                /*Отчество*/
                                [
                                    'title'      => $getArrayCaptions['cardMiddlename']['translation_captions']['caption_translation'],
                                    'model_name' => "Consumers",
                                    'model'      => 'middle_name',
                                    'width'      => '100%',
                                    'type'       => 'text',
                                    'zone'       => '2',
                                    'order'      => '4'
                                ],

                                $birthdate = [
                                    'title'      => $this->texts->where('caption_name', "cardBirthdate")
                                        ->first()->caption_translation,
                                    'model_name' => "Consumers",
                                    'model'      => 'birth_date',
                                    'width'      => '50%',
                                    'type'       => 'date',
                                    'zone'       => '2',
                                    'order'      => '5'
                                ],


                                [
                                    'title'      => $this->texts->where('caption_name', "cardCode")
                                        ->first()->caption_translation,
                                    'model_name' => "Consumers",
                                    'model'      => 'consumer_code',
                                    'width'      => '50%',
                                    'type'       => 'label',
                                    'zone'       => '1',
                                    'order'      => '2'
                                ],


                                [
                                    'title'      => $this->texts->where('caption_name', "profilePhoneNumber")
                                        ->first()->caption_translation,
                                    'model_name' => "Consumers",
                                    'model'      => 'phone_number',
                                    'width'      => '50%',
                                    'type'       => 'text',
                                    'zone'       => '2',
                                    'order'      => '3'
                                ],


                                /*Изменить пароль */
                                [
                                    'title'      => $getArrayCaptions['changePassword']['translation_captions']['caption_translation'],
                                    "model_name" => 'Consumers',
                                    'width'      => '50%',
                                    'type'       => 'button',
                                    'zone'       => '1',
                                    'order'      => '5',
                                    "action"     => "show_modal",
                                    'modal'      => [
                                        "modal_title" => "Изменение пароля",
                                        'link'        => '/admin/changePassword',
                                        'fields'      => [
                                            [
                                                'model'      => "oldPassword",
                                                'title'      => "Старый пароль",
                                                'type'       => "password",
                                                'validation' => 'required|min:6|max:20',
                                                'edit'       => true
                                            ],
                                            [
                                                'model'       => "newPassword",
                                                'title'       => "Новый пароль",
                                                'type'        => "password",
                                                'ref'         => "newpass",
                                                'edit'        => true,
                                                'validation'  => 'required|min:6|max:20|confirmed:repeatpass',
                                                'returnfield' => 'first_name'
                                            ],
                                            [
                                                'model'      => "repeatPassword",
                                                'title'      => "Повторить пароль",
                                                'type'       => "password",
                                                'edit'       => true,
                                                'ref'        => "repeatpass",
                                                'validation' => 'required|min:6|max:20|'
                                            ]
                                        ],
                                        'buttons'     => [
                                            [
                                                "title" => "Ok",
                                                "code"  => "await.ModalRequest,showtoast,ReturnRes,ifResetModal,hideModal",
                                                "class" => "btn btn-green",
                                                "img"   => ""
                                            ],
                                            [
                                                "title" => "Отмена",
                                                "code"  => "resetModal,focehideModal",
                                                "class" => "btn btn-grey",
                                            ],
                                            [
                                                "title" => "Сбросить",
                                                "code"  => "resetModal",
                                                "class" => "btn btn-grey",
                                            ],
                                        ],
                                    ],
                                ],

                            ]
                        ]
                    ]
                ],
            ]

        );

        // return var_dump("<pre>",$userCard,"</pre>");
        return response()->json($userCard);
    }

    /*END Albert 10.10.19*/

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

    public function getVerificationInputs(Request $request)
    {
        $type = $request->type;

        $inputs = [];

        $captionName = ["VerifyPage"];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        $consumer = Auth::user();

        $model_array = [];


        if($consumer && is_null($consumer->agreement_accepted_date))
        {

            array_push($inputs, [
                "model_name" => "Consumers",
                "model"      => "last_name",
                "title"      => "Фамилия",
                "type"       => "text",
                'width'      => '100%',
                "zone"       => "1",
                "order"      => "1",
                "validation" => ["required" => true]
            ], [
                "model_name" => "Consumers",
                "model"      => "first_name",
                "title"      => "Имя",
                "type"       => "text",
                'width'      => '100%',
                "zone"       => "1",
                "order"      => "1",
                "validation" => ["required" => true]
            ], [
                "model_name" => "Consumers",
                "model"      => "middle_name",
                "title"      => "Отчество",
                "type"       => "text",
                'width'      => '100%',
                "zone"       => "1",
                "order"      => "1"
            ], [
                "model_name" => "Consumers",
                "model"      => "email",
                "title"      => "Почта",
                "type"       => "label",
                "disabled"   => true,
                'width'      => '100%',
                "zone"       => "1",
                "order"      => "1"
            ]);

            $model_array["first_name"] = $consumer->first_name;
            $model_array["middle_name"] = $consumer->middle_name;
            $model_array["last_name"] = $consumer->last_name;
            $model_array["email"] = $consumer->email;

        }

        if($type == "reset_password" || ($consumer && $consumer->column_change_password_l))
        {
            array_push($inputs, [
                "model_name" => "Consumers",
                "model"      => "new_password",
                "title"      => "Новый пароль",
                "type"       => "password",
                'width'      => '100%',
                "zone"       => "1",
                "order"      => "1",
                "validation" => [
                    "required"  => true,
                    "min"       => 6,
                    "max"       => 20,
                    "confirmed" => "repeatpass"
                ]
            ], [
                "model_name" => "Consumers",
                "model"      => "confirm_password",
                "title"      => "Подтвердите пароль",
                "type"       => "password",
                'width'      => '100%',
                "zone"       => "1",
                "order"      => "1",
                "ref"        => "repeatpass",
                "validation" => [
                    "required" => true,
                    "min"      => 6,
                    "max"      => 20
                ]
            ]);

            $model_array["new_password"] = null;
            $model_array["confirm_password"] = null;

            if(is_null($consumer))
            {
                $save_link = "/consumer/changePassword/confirm";

            }
            else
            {
                $save_link = "/admin/setPassword";
            }
        }


        if($consumer && is_null($consumer->agreement_accepted_date))
        {

            array_push($inputs, [
                "model_name" => "Consumers",
                "model"      => "rbl_rules",
                "title"      => "Даю согласие на обработку моих персональных данных",
                "type"       => "checkbox",
                'width'      => '100%',
                "zone"       => "1",
                "order"      => "1",
                "validation" => ["required" => true]
            ], [
                "model_name" => "Consumers",
                "model"      => "rbl_privacy",
                "title"      => "",
                "type"       => "textarea",
                'width'      => '100%',
                "zone"       => "1",
                "order"      => "1",
                "disabled"   => true
            ]);

            $model_array["rbl_privacy"] = "Настоящим я, свободно, своей волей и в своем интересе, предоставляю ООО «Лардан Софт» (далее – «Оператор») согласие на автоматизированную и неавтоматизированную обработку моих персональных данных, предоставленных мной путем заполнения веб-формы на сайте а также иных, имеющихся у Оператора сведений, с целью использования функционала Сайта и получения обратной связи по продуктам Оператора. Обработка моих персональных данных включает в себя: сбор, систематизацию, накопление, хранение, уточнение (обновление, изменение), использование, передачу (предоставление), в том числе по открытым каналам связи сети Интернет, обезличивание, блокирование, уничтожение.\"+ \"\n\"+\" Согласие действует с его предоставления до его отзыва в письменной форме";

            $save_link = "/admin/setPassword";
        }


        $card = [
            "form_parameters"  => [
                "form_title"           => $getArrayCaptions['VerifyPage']['translation_captions']['caption_translation'],
                "form_code"            => "Consumers",
                "disable_inputs"       => false,
                "form_is_dependent"    => false,
                // {if true -> show field} {if false hidden field)
                "form_type"            => "card",
                "form_base_data_model" => "Consumers",

                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => "form_main_data_model_name",
                "form_type_list"                => [
                    "form_card_url"     => "/contractors_new/",
                    "form_search_field" => "contractor_full_name",
                ],
            ],
            "main_data_models" => [
                "Consumers" => [$model_array]
            ],
            "inputs"           => $inputs,
            "actions"          => [
                [
                    "title" => "Сохранить",
                    "class" => "btn btn-green",
                    "code"  => "save",
                    "link"  => $save_link
                ],
                [
                    "title" => "Отмена",
                    "class" => "btn btn-grey",
                    "code"  => "cancel",
                    "link"  => "/"
                ],
            ]
        ];

        return $card;
    }

    protected function listQuery()
    {
        $this->list_model = Consumer::query()->whereNotIn("consumer_is_system_n", [1]);

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get();

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [

            [
                "block_title"         => "Consumers",
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [

                    [
                        'key'      => 'actions',
                        'sortable' => false,
                        'class'    => 'list_checkbox',
                        'thStyle'  => 'width: 6%',
                        "zone"     => "1",
                        "order"    => "1"
                    ],

                    [
                        'key'      => 'email',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => "email",
                        'thStyle'  => 'width: 40%',
                        "zone"     => "1",
                        "order"    => "2"
                    ],

                    [
                        'key'      => 'consumer_name',
                        'sortable' => true,
                        'class'    => 'created_at',
                        "label"    => "consumer_name",
                        'thStyle'  => 'width: 40%',
                        "zone"     => "1",
                        "order"    => "3"
                    ],
                ]
            ]
        ];

        return $this;
    }

//    public function logInAsUser(Request $request)
//    {
//        $consumer_id = $request->id;
//
//        $consumer = Consumer::query()->find($consumer_id);
//
//        if(!$consumer)
//            return response()->json([
//                "error" => true,
//                "message" => "Пользователь не найден"
//            ], 400);
//
//        $token = \JWTAuth::fromUser($consumer);
//
//        return $token;
//    }

}
