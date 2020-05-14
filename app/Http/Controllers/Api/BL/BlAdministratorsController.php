<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Classes\MailManager;
use App\Mail\BlAdministratorRegistered;
use App\Mail\ConsumerRegistered1C;
use App\Models\ConsumerActivityToken;
use App\Models\SystemOperation;
use Carbon\Carbon;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\Consumer;
use Route;
use App\Http\Classes\CheckController;
use App\Models\ConsumerAccessRole;

class BlAdministratorsController extends Controller
{

    public function insert()
    {

    }

    public function update()
    {

    }

    public function list(Request $request)
    {
        if(!$this->isAdmin() && !$this->isManager())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Name', 'Code', 'Administrators', 'cardEmail', 'cardEmail2', 'Users'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        if($this->isAdmin() == true)
        {
            $ModelTables = Consumer::query()
                ->select('id', 'consumer_name', 'email', 'email2')
                ->orderBy('consumer_name')
                ->get();
        }

        elseif($this->isManager() == true)
        {
            $ModelTables = Consumer::query()
                ->select('Consumers.id', 'consumer_name', 'email', 'email2')
                ->join("_ConsumerAccessRoles", function(JoinClause $join)
                {
                    $join->on("_ConsumerAccessRoles.consumer_id", "=", "Consumers.id")
                        ->where("_ConsumerAccessRoles.access_role_id", "=",
                            self::getParameter("DefaultManagerAccessRole"))
                        ->where("_ConsumerAccessRoles.main_l", "=", true);
                })
                ->orderBy('consumer_name')
                ->get();
        }
        //


        $list = [

            "main_data_models" => [

                $controller->controller_alias => $ModelTables,

            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Users']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "/administrator/",
                    "form_search_field" => "consumer_name",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            //            "links"            => [
            //
            //                ["link_title" => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
            //                    "link_url"   => "/regions",
            //                    "class"      => "link btn btn-link",
            //                    "link_type"  => "internal",
            //                    "img"        => ""
            //                ],
            //            ],
            "tabs"             => [

                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],

                    "blocks_quantity" => 1,
                    "blocks"          => [

                        [
                            //"block_title" => "none",
                            "block_zone_quantity" => 1, //add Albert Topalu
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [

                                ['key'      => 'actions', 'type'    => 'checkbox',
                                 'sortable' => false,
                                 'class'    => 'list_checkbox',
                                 'thStyle'  => 'width: 6%',
                                 "zone"     => "1",
                                 "order"    => "1"
                                ],
                                [
                                    'key'      => 'consumer_name',
                                    'sortable' => true,
                                    'class'    => 'consumer_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 31%',
                                    "zone"     => "1",
                                    "order"    => "2"


                                ],
                                [
                                    'key'      => 'email',
                                    'sortable' => true,
                                    'class'    => 'email',
                                    'label'    => $getArrayCaptions['cardEmail']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "3"


                                ],

                                [
                                    'key'      => 'email2',
                                    'sortable' => true,
                                    'class'    => 'email2',
                                    'label'    => $getArrayCaptions['cardEmail2']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "4"

                                ],

                            ]
                        ]
                    ]


                ],


            ]
        ];

        return response()->json($list);


    }

    public function card(Request $request)
    {
        if(!$this->isAdmin() && !$this->isManager())
            abort(403);


        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'CreationDetails', 'Administrator',
            'cardEmail2', 'Name', 'sexMale', 'sexFemale', 'cardSex',
            'cardBirthdate', 'cardEmail', 'profileConsumerLogin', 'changePassword', 'profileName', 'cardLastname', 'cardMiddlename', 'DeletedL',
            'View', 'new', 'SendLetter', 'ResendLetter'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $gender = [
            ['male_l' => $getArrayCaptions['sexMale']['translation_captions']['caption_translation'], "id" => 1],
            ['male_l' => $getArrayCaptions['sexFemale']['translation_captions']['caption_translation'], "id" => 0],
        ];

        $modelTable_id = $request->id;
        if($modelTable_id == "new")
        {
            $modelTable = Consumer::getNewObject();
            $field_password = [
                //                                'title' => $getArrayCaptions['CountryCode2Full']['translation_captions']['caption_translation'],
                'title'      => 'password',
                'model'      => 'password', 'width' => '33%', 'type' => 'text',
                'zone'       => '1', 'order' => '5',
                'validation' => ['required' => true, 'min' => 6, 'max' => 20],
            ];
        }
        else
        {
            $modelTable = Consumer::query()->find($modelTable_id);

            $field_password = [];
        }

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();


        $block_fields = [
            [
                'title' => $getArrayCaptions['cardLastname']['translation_captions']['caption_translation'],
                'model_name'=>$controller->controller_alias,'model' => 'last_name', 'width' => '50%', 'type' => 'text',
                'zone'  => '1', 'order' => '3'
            ],
            [
                'title'      => $getArrayCaptions['cardEmail']['translation_captions']['caption_translation'],
                'model'      => 'email',
                'model_name' => $controller->controller_alias,
                'ipost'      => '/api/admin/consumer/email',
                'width'      => '50%', 'type' => 'text',
                'zone'       => '1', 'order' => '2',
                'validation' => ['required' => true]
            ],
            [
                'title' => $getArrayCaptions['profileName']['translation_captions']['caption_translation'],
                'model_name'=>$controller->controller_alias,'model' => 'first_name', 'width' => '50%', 'type' => 'text',
                'zone'  => '1', 'order' => '3'
            ],
            [
                'title'      => $getArrayCaptions['profileConsumerLogin']['translation_captions']['caption_translation'],
                'model'      => 'consumer_login', 'width' => '50%', 'type' => 'text',
                'model_name' => $controller->controller_alias,
                'zone'       => '1', 'order' => '4',
                'validation' => ['required' => true, 'min' => 4]
            ],
            [
                'title' => $getArrayCaptions['cardMiddlename']['translation_captions']['caption_translation'],
                'model_name'=>$controller->controller_alias,'model' => 'middle_name', 'width' => '50%', 'type' => 'text',
                'zone'  => '1', 'order' => '4',
                //                                'validation' => ['required' => false, 'min' => 4]
            ],
            //                            [
            //                                'title' => $getArrayCaptions['cardBirthdate']['translation_captions']['caption_translation'],
            //                                'model_name'=>$controller->controller_alias,model' => 'birth_date', 'width' => '50%', 'type' => 'date',
            //                                'zone' => '1', 'order' => '4'
            //                            ],
            [
                'title' => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                'model_name'=>$controller->controller_alias,'model' => 'deleted_l', 'width' => '20%', 'type' => 'checkbox',
                'zone'  => '1', 'order' => '7'
            ],
            [
                'title' => $getArrayCaptions['changePassword']['translation_captions']['caption_translation'],
                'model_name'=>$controller->controller_alias,'model' => 'column_change_password_l', 'width' => '20%', 'type' => 'checkbox',
                'zone'  => '1', 'order' => '8'
            ]
        ];
        if($modelTable_id !== "new" && ($modelTable->consumer_status_n == 1 || $modelTable->consumer_status_n == 0))
        {
            array_push($block_fields, [
                // TODO caption title
                'title'   => $getArrayCaptions['SendLetter']['translation_captions']['caption_translation'],
                'model'   => 'id',
                'model_name'=>$controller->controller_alias,
                'action'  => 'send_mail',
                'link'    => "/admin/bl/administrators/mail/send",
                'type'    => 'button',
                'tooltip' => $getArrayCaptions['ResendLetter']['translation_captions']['caption_translation'],
                'width'   => '100%',
                "zone"    => "1",
                "order"   => "4",

            ]);
        }


        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => $block_fields
                        //                            [
                        ////                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                        //                                'title' => 'consumer_code',
                        //                                'model_name'=>$controller->controller_alias,model' => 'consumer_code', 'width' => '33%', 'type' => 'text',
                        //                                'zone' => '1', 'order' => '1',
                        //                                'validation' => ['required' => true, 'min' => 4]
                        //                            ],
                        //                            [
                        ////                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                        //                                'title' => 'consumer_name',
                        //                                'model_name'=>$controller->controller_alias,model' => 'consumer_name', 'width' => '33%', 'type' => 'text',
                        //                                'zone' => '1', 'order' => '1',
                        //                                'validation' => ['required' => true, 'min' => 4]
                        //                            ],
                        //                            [
                        //                                'title' => $getArrayCaptions['cardEmail2']['translation_captions']['caption_translation'],
                        //                                'model_name'=>$controller->controller_alias,model' => 'email2', 'width' => '33%', 'type' => 'text',
                        //                                'zone' => '1', 'order' => '3'
                        //                            ],
                        //                            [
                        ////                                'title' => $getArrayCaptions['cardEmail2']['translation_captions']['caption_translation'],
                        //                                'title' => 'phone_number',
                        //                                'model_name'=>$controller->controller_alias,model' => 'phone_number', 'width' => '33%', 'type' => 'text',
                        //                                'zone' => '1', 'order' => '3',
                        //                                'validation' => ['numeric' => true]
                        //                            ],
                        //                            [
                        ////                                'title' => $getArrayCaptions['cardEmail2']['translation_captions']['caption_translation'],
                        //                                'title' => 'url_name',
                        //                                'model_name'=>$controller->controller_alias,model' => 'url_name', 'width' => '33%', 'type' => 'text',
                        //                                'zone' => '1', 'order' => '3'
                        //                            ],
                        //                            [
                        //                                'title' => $getArrayCaptions['cardSex']['translation_captions']['caption_translation'],
                        //                                'model_name'=>$controller->controller_alias,model' => 'id',
                        //                                'type' => 'lt-select',
                        //                                'width' => '33%',
                        //                                'options' => [],
                        //                                "options_data" => [
                        //                                    "options_data_model" => "Gender",
                        //                                    "options_field_id" => "id",
                        //                                    "options_field_title" => "male_l",
                        //                                    "search" => ""
                        //                                ],
                        //                                "zone" => "1",
                        //                                "order" => "3",
                        //                                "border_right" => false
                        //
                        //                            ],
                        ////$field_password ?? null,


                    ]
                ]
            ]
        ];


        if($formShowParam['show_system_tab'])
        {
            $tabs[] = [
                "tab_title"       => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                             'model_name'=>$controller->controller_alias,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                             "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                             'model_name'=>$controller->controller_alias,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                             "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                             'model_name'=>$controller->controller_alias,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                             "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                             'model_name'=>$controller->controller_alias,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                             "order" => "2"
                            ],

                        ]
                    ]
                ]
            ];
        }

        $card = [

            "main_data_models" => [
                $controller->controller_alias => [$modelTable],
            ],

            "add_data_models" => [
                "Gender" => $gender,
            ],

            "form_parameters" => [
                //                "form_title"                    => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                "form_title"                    => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $getArrayCaptions['View']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                //                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['BlockCountryAddNew']['translation_captions']['caption_translation'] : $modelTable->country_name,
                "form_main_data_model_name"     => $modelTable_id == "new" ? "" : $modelTable->consumer_name,
                "form_type_list"                => [

                    "form_card_url" => "/administrators",
                ],
            ],

            "sets" => $this->getButtonsList(["card_actions"]),

            "tabs" => $tabs
        ];


        return response()->json($card);


    }

    public function onWriteBeT(&$bCancel)
    {
        if($this->main_model_existed)
            return false;

        try
        {
            ConsumerAccessRole::query()
                ->create([
                    "access_role_id" => self::getParameter("DefaultManagerAccessRole"),
                    "consumer_id"    => $this->main_model_id,
                    "main_l"         => true
                ]);
        }
        catch(\Exception $exception)
        {
            $bCancel = true;

            return [
                "message" => "Ошибка при создании роли менеджера"
            ];
        }
    }

    public function afterWriteBe(&$bCancel, $request)
    {
        if($this->main_model_existed)
            return false;

        try
        {
            $id = $this->main_model_id;

            $consumer = Consumer::query()->find($id);

            $this->sendMail($consumer);
        }
        catch(\Exception $exception)
        {
            $bCancel = true;

            return [
                "message"       => "Новый менеджер успешно создан. Письмо не отправлено. Повторите попытку позже",
                "admin_message" => "Новый менеджер успешно создан. Письмо не отправлено. Повторите попытку позже. " . $exception->getMessage(),
                "requery"       => true,
                "status"        => 200,
                "template"      => "warning",
                "position"      => "topRight"
            ];
        }
    }

    public function handleSendMail(Request $request)
    {
        $consumer = Consumer::query()
            ->findOrFail($request->id);

        if($consumer->consumer_status_n === 3)
            return response()->json([
                "error"   => true,
                "message" => "Пользователь уже подтвердил свою регистрацию"
            ], 400);

        try
        {
            $this->sendMail($consumer);

            return response()->json([
                "error"   => false,
                "message" => "Письмо успешно отправлено"
            ]);
        }
        catch(\Exception $exception)
        {
            return response()->json([
                "error"   => "true",
                "message" => "Не удалось отправить письмо"
            ], 400);
        }
    }

    public function sendMail($consumer)
    {
        $failed = 0;
        $sendRequest = 1;

        $operation = SystemOperation::where('sys_oper_code', 'Verification')->select('id')->first()->id;

        // Берем последний токен и отправляем его, чтоб не создавать новый токен на каждый запрос
        $token = ConsumerActivityToken::query()->where([
            "consumer_id" => $consumer->id,
            "action_id"   => $operation,
            "status_n"    => $failed
        ])->where('created_at', '>', Carbon::now()->subSeconds(app('RequestTimeOut')))
            ->latest()->first();

        // Если токена нет, то создаем новый
        if(is_null($token))
        {
            $token = ConsumerActivityToken::create([
                'consumer_id' => $consumer->id,
                'email_issue' => $consumer->email,
                'email_new'   => NULL,
                'token'       => str_random(20),
                'status_n'    => $failed, //0 - статус неуспешной операции
                'action_id'   => 0
            ]);

            $token->action_id = $operation;
            //записываем тип верификации в таблицу токенов
            $token->type_verify = 0;
            $token->save();
        }


        MailManager::sendMail($consumer->email, BlAdministratorRegistered::class,
            $consumer, $token->token);

        $consumer->consumer_status_n = $sendRequest;
        $consumer->save();
    }
}
