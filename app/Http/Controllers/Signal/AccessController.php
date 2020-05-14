<?php

namespace App\Http\Controllers\Signal;

use App\Http\Classes\MailManager;
use App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController;
use App\Http\Controllers\Api\AttachedFiles\AttachedFilesController;
use App\Mail\ConsumerRegistered;
use App\Models\AttachedDocument;
use App\Models\AttachedDocumentType;
use App\Models\ConsumerAccessRole;
use App\Models\ConsumerAccessRowNew;
use App\Models\DbTypeController;
use App\Models\CompanyInfo;
use App\Models\Consumer;
use App\Models\ContractorInfo;
use App\Models\ConsumerActivityToken;
use App\Models\SystemOperation;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\ZzCompany;
use App\Models\ZzCompanyInfo;
use App\Models\ZzContractor;
use App\Models\ZzContractorInfo;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Company;

use App\Models\Contractor;
use App\Models\DbArea;
use App\Mail\ConsumerRegistered1C;

class AccessController extends Controller
{
    public function index(Request $request)
    {
        $getToken_1C = $request->header('token');

        $dbAreas = DbArea::where('db_area_token', $getToken_1C)->get()->first();

        if(is_null($dbAreas))
        {
            $status = [
                'status' => [
                    'status_code'        => "0",
                    'status_description' => 'token is not valid',
                ]
            ];

            return response()->json($status);
        }

        if(isset($dbAreas) and !empty($dbAreas))
        {

            $resArray = \GuzzleHttp\json_decode($request->getContent(), true);

            if(isset($resArray) and !empty($resArray))
            {

                if($resArray['request']['request_name'] == 'ConsumerCheck')
                {

                    $db_area_code = $resArray['request']['db_area_code'];

                    $db_area_codeId = \Illuminate\Support\Facades\DB::table('_DbAreas')
                        ->select('id')
                        ->where('db_area_token', '=', $getToken_1C)
                        ->where('db_area_code', '=', $db_area_code)
                        ->value('id');

                    if(is_null($db_area_codeId))
                    {
                        $status = [
                            'status' => [
                                'status_code'        => "0",
                                'status_description' => 'db_area_code is not valid',
                            ]
                        ];

                        return response()->json($status);
                    }

                    if(isset($db_area_codeId) and !empty($db_area_codeId))
                    {


                        $ConsumerChecks = Consumer::where('consumer_code',
                            $resArray['request']['request_parameters']['consumer_code'])
                            ->orWhere('consumer_login', $resArray['request']['request_parameters']['consumer_login'])
                            ->orWhere('email', $resArray['request']['request_parameters']['consumer_email'])
                            ->get()->toArray();


                        $consumerArr = [];
                        foreach($ConsumerChecks as $consumer)
                        {

                            $consumerArr[] = [
                                'consumer_code'  => $consumer['consumer_code'],
                                'consumer_login' => $consumer['consumer_login'],
                                'consumer_email' => $consumer['email'],
                            ];

                            $status = [
                                'status' => [
                                    'status_code'        => "1",
                                    'status_description' => 'successfully',
                                ],

                                'consumers' => $consumerArr
                            ];

                        }

                        return response()->json($status);
                    }

                }
                if($resArray['request']['request_name'] == 'ConsumerRead')
                {

                    $db_area_code = $resArray['request']['db_area_code'];

                    $db_area_codeId = \Illuminate\Support\Facades\DB::table('_DbAreas')
                        ->select('id')
                        ->where('db_area_token', '=', $getToken_1C)
                        ->where('db_area_code', '=', $db_area_code)
                        ->value('id');

                    if(is_null($db_area_codeId))
                    {
                        $status = [
                            'status' => [
                                'status_code'        => "0",
                                'status_description' => 'db_area_code is not valid',
                            ]
                        ];

                        return response()->json($status);
                    }

                    if(isset($db_area_codeId) and !empty($db_area_codeId))
                    {

                        $readAccessConsumers = Consumer::where('consumer_code',
                            $resArray['request']['request_parameters']['consumer_code'])->with('readAccess')->get()
                            ->first();
                        $readAccessRelations = $readAccessConsumers['readAccess']->toArray();

                        //                        $readAccessArrContractor=[];
                        $readAccessArrContractorCompany = [];

                        foreach($readAccessRelations as $readAccess)
                        {

                            if($readAccess['db_area_id'] == $db_area_codeId)
                            {

                                $CompaniesUid_1cCode = \Illuminate\Support\Facades\DB::table('Companies')
                                    ->select('uid_1c_code')
                                    ->where('id', '=', $readAccess['company_id'])
                                    ->value('uid_1c_code');

                                $ContractorsUid_1cCode = \Illuminate\Support\Facades\DB::table('Contractors')
                                    ->select('uid_1c_code')
                                    ->where('id', '=', $readAccess['contractor_id'])
                                    ->value('uid_1c_code');

                                $accessTypeCode = \Illuminate\Support\Facades\DB::table('__AccessTypes')
                                    ->select('id')
                                    ->where('id', '=', $readAccess['access_type_id'])
                                    ->value('id');

                                if($accessTypeCode === 2)
                                {

                                    $accessTypeName = \Illuminate\Support\Facades\DB::table('__AccessTypes')
                                        ->select('access_type_code')
                                        ->where('id', '=', $readAccess['access_type_id'])
                                        ->value('access_type_code');

                                    $readAccessArrContractorCompany[] =
                                        [
                                            'access_type_code'  => $accessTypeName,
                                            'company_uid_1c'    => $CompaniesUid_1cCode,
                                            'contractor_uid_1c' => $ContractorsUid_1cCode,
                                            'read_only_l'       => $readAccess['read_only_l'],

                                        ];
                                }

                                if($accessTypeCode === 1)
                                {
                                    $accessTypeName = \Illuminate\Support\Facades\DB::table('__AccessTypes')
                                        ->select('access_type_code')
                                        ->where('id', '=', $readAccess['access_type_id'])
                                        ->value('access_type_code');

                                    $readAccessArrContractorCompany[] = [
                                        'access_type_code' => $accessTypeName,
                                        'company_uid_1c'   => $CompaniesUid_1cCode,
                                        'read_only_l'      => $readAccess['read_only_l'],

                                    ];
                                }
                            }

                        }

                        $status = [
                            'status' => [
                                'status_code'        => "1",
                                'status_description' => 'successfully',
                            ],

                            'consumer' => [
                                'consumer_code'  => $readAccessConsumers['consumer_code'],
                                'consumer_login' => $readAccessConsumers['consumer_login'],
                                'consumer_name'  => $readAccessConsumers['consumer_name'],
                                'consumer_email' => $readAccessConsumers['email'],
                                'access'         => $readAccessArrContractorCompany
                            ],
                        ];

                        return response()->json($status);

                    }
                    /*Yuriy Yurenko 20.09.2018 11:47*/
                }
                elseif($resArray['request']['request_name'] == 'ConsumerCreate')
                {


                    $db_area_code = $resArray['request']['db_area_code'];

                    $db_area_codeId = \Illuminate\Support\Facades\DB::table('_DbAreas')
                        ->select('id')
                        ->where('db_area_token', '=', $getToken_1C)
                        ->where('db_area_code', '=', $db_area_code)
                        ->value('id');

                    if(is_null($db_area_codeId))
                    {
                        $status = [
                            'status' => [
                                'status_code'        => "0",
                                'status_description' => 'db_area_code is not valid',
                            ]
                        ];

                        return response()->json($status);
                    }


                    if(
                        $resArray['request']['request_parameters']['consumer']['consumer_check'] == 0 ||
                        $resArray['request']['request_parameters']['consumer']['consumer_check'] == '0'
                    )
                    {

                        //only check if user exists and send response
                        $status = $this->checkConsumerExists($resArray);
                        return response()->json($status);

                    }
                    elseif(
                        $resArray['request']['request_parameters']['consumer']['consumer_check'] == "1" ||
                        $resArray['request']['request_parameters']['consumer']['consumer_check'] == 1
                    )
                    {

                        /*checking if iser no exists an create user
                         * where password = login
                         *
                         */
                        $status = $this->checkConsumerExists($resArray);

                        if($status['status']['status_code'] == "1")
                        {
                            //create
                            $status = $this->createConsumer($resArray, false);

                            $temp_consumer = Consumer::find($dbAreas->consumer_id);

                            $this->createConsumerAccessRole($status["consumer"]["consumer_code"], $temp_consumer->consumer_code);

                            return response()->json($status);

                        }
                        else
                        {

                            return response()->json($status);

                        }
                    }
                    elseif(
                        $resArray['request']['request_parameters']['consumer']['consumer_check'] == "2" ||
                        $resArray['request']['request_parameters']['consumer']['consumer_check'] == 2
                    )
                    {

                        $status = $this->checkConsumerExists($resArray);
                        /*checking if iser no exists an create user
                         * where password comes form 1c
                         *
                         */
                        if($status['status']['status_code'] == "1")
                        {

                            $status = $this->createConsumer($resArray, true);

                            $temp_consumer = Consumer::find($dbAreas->consumer_id);

                            $this->createConsumerAccessRole($status["consumer"]["consumer_code"], $temp_consumer->consumer_code);

                            $created_consumer = Consumer::query()
                                ->where("consumer_code", $status["consumer"]["consumer_code"])
                                ->get()->first();

//                            MailManager::sendMail($created_consumer->email, ConsumerRegistered1C::class,
//                                $created_consumer, $resArray['request']['request_parameters']['consumer']['consumer_password']);

                            return response()->json($status);

                        }
                        else
                        {

                            return response()->json($status);

                        }
                    }


                }
                elseif($resArray['request']['request_name'] == 'CompaniesDelete')
                {

                    $db_area_code = $resArray['request']['db_area_code'];

                    $db_area_codeId = \Illuminate\Support\Facades\DB::table('_DbAreas')
                        ->select('id')
                        ->where('db_area_token', '=', $getToken_1C)
                        ->where('db_area_code', '=', $db_area_code)
                        ->value('id');

                    if(is_null($db_area_codeId))
                    {
                        $status = [
                            'status' => [
                                'status_code'        => "0",
                                'status_description' => 'db_area_code is not valid',
                            ]
                        ];

                        return response()->json($status);
                    }

                    $status = $this->dropCompany($resArray);
                    return response()->json($status);

                }
                elseif($resArray['request']['request_name'] == 'ContractorsDelete')
                {

                    $db_area_code = $resArray['request']['db_area_code'];

                    $db_area_codeId = \Illuminate\Support\Facades\DB::table('_DbAreas')
                        ->select('id')
                        ->where('db_area_token', '=', $getToken_1C)
                        ->where('db_area_code', '=', $db_area_code)
                        ->value('id');

                    if(is_null($db_area_codeId))
                    {
                        $status = [
                            'status' => [
                                'status_code'        => "0",
                                'status_description' => 'db_area_code is not valid',
                            ]
                        ];

                        return response()->json($status);
                    }

                    $status = $this->dropContractor($resArray);
                    return response()->json($status);

                }
                //Alex Yaroshchuk
                elseif($resArray['request']['request_name'] == 'RequestForDataChanges')
                {
                    $db_area_code = $resArray['request']['db_area_code'];
                    $db_area_codeId = \Illuminate\Support\Facades\DB::table('_DbAreas')
                        ->select('id')
                        ->where('db_area_token', '=', $getToken_1C)
                        ->where('db_area_code', '=', $db_area_code)
                        ->value('id');

                    if(is_null($db_area_codeId))
                    {
                        $status = [
                            'status' => [
                                'status_code'        => "0",
                                'status_description' => 'db_area_code is not valid',
                            ]
                        ];
                        return response()->json($status);
                    }
                    else
                    {
                        $this->createAttachedDocument($resArray);
                        $status = [
                            'status' => [
                                'status_code'        => (string)1,
                                'status_description' => 'successfully',
                            ]
                        ];
                        return response()->json($status);
                    }
                }
                elseif($resArray['request']['request_name'] == 'AccessConsumerCreateUpdateNew')
                {
                    $db_area_code = $resArray['request']['db_area_code'];
                    $db_area = \Illuminate\Support\Facades\DB::table('_DbAreas')
                        ->select('id')
                        ->where('db_area_token', '=', $getToken_1C)
                        ->where('db_area_code', '=', $db_area_code)
                        ->join("Consumers", "Consumers.id", "=", "_DbAreas.consumer_id")
                        ->select("_DbAreas.id", "consumer_id", "Consumers.consumer_code")
                        ->get()->first();

                    if(is_null($db_area))
                    {
                        $status = [
                            'status' => [
                                'status_code'        => "0",
                                'status_description' => 'db_area_code is not valid',
                            ]
                        ];
                        return response()->json($status);
                    }

                    $consumer_code = $resArray['request']['request_parameters']['consumer_code'];

                    $current_time = Carbon::now()->format("Y-m-d H:i:s");

                    $user = Consumer::where("consumer_code", $consumer_code)
                        ->get(["id"])->first();

                    $items = $resArray["request"]["request_parameters"]["access"];

                    $items_params = [
                        "company"    => [
                            "access_table_column_name" => "company_id",
                            "uid_1c_field_name"        => "company_uid_1c",
                            "table_name"               => "Companies",
                            "fields_to_insert"         => ["company_full_name", "company_short_name"]
                        ],
                        "contractor" => [
                            "access_table_column_name" => "contractor_id",
                            "uid_1c_field_name"        => "contractor_uid_1c",
                            "table_name"               => "Contractors",
                            "fields_to_insert"         => ["contractor_full_name", "contractor_short_name"]
                        ],
                        "contract"   => [
                            "access_table_column_name" => "contractor_contract_id",
                            "uid_1c_field_name"        => "contract_uid_1c",
                            "table_name"               => "ContractorContracts",
                            "fields_to_insert"         => ["contractor_contract_name"]
                        ]
                    ];

                    ConsumerAccessRowNew::where([
                        "db_area_id"  => $db_area->id,
                        "consumer_id" => $user->id
                    ])->delete();

                    foreach($items as $item)
                    {
                        $item_name = array_keys($item)[0];

                        $item = $item[$item_name];

                        $current_item_params = $items_params[$item_name];

                        $item_is_null = $item == "NULL";

                        if(!$item_is_null)
                        {
                            $record = DB::table($current_item_params["table_name"])->where([
                                "db_area_id"  => $db_area->id,
                                "uid_1c_code" => $item[$current_item_params["uid_1c_field_name"]]
                            ])->get(["id"])->first();

                            if(!$record)
                            {
                                $to_insert = [
                                    "db_area_id"  => $db_area->id,
                                    "uid_1c_code" => $item[$current_item_params["uid_1c_field_name"]],
                                    "created_by"  => $db_area->consumer_code,
                                    "updated_by"  => $db_area->consumer_code,
                                    "created_at"  => $current_time,
                                    "updated_at"  => $current_time,
                                ];
                                foreach($current_item_params["fields_to_insert"] as $field)
                                {
                                    $to_insert[$field] = $item[$field];
                                }

                                $record_id = DB::table($current_item_params["table_name"])
                                    ->insertGetId($to_insert);
                            }
                        }

                        ConsumerAccessRowNew::create([
                            "db_area_id"                                     => $db_area->id,
                            "consumer_id"                                    => $user->id,
                            "created_by"                                     => $db_area->consumer_code,
                            "updated_by"                                     => $db_area->consumer_code,
                            "created_at"                                     => $current_time,
                            "updated_at"                                     => $current_time,
                            $current_item_params["access_table_column_name"] => ($item_is_null === false)
                                ? $record
                                    ? $record->id
                                    : $record_id
                                : null
                        ]);

                        //                        break;
                    }


                    $status = [
                        'status' => [
                            'status_code'        => "1",
                            'status_description' => 'successfully',
                        ]
                    ];
                    return response()->json($status);

                }
            }
        }
    }

    public function createConsumerAccessRole($consumer_code, $db_area_consumer_code)
    {
        $consumer = Consumer::query()
            ->where("consumer_code", $consumer_code)
            ->select("id")
            ->get()->first();

        $access_role_id = self::getParameter("DefaultConsumerAccessRole");

        $consumer_access_role = new ConsumerAccessRole();

        $consumer_access_role->access_role_id = $access_role_id;
        $consumer_access_role->consumer_id = $consumer->id;
        $consumer_access_role->main_l = true;

        $consumer_access_role->created_by = $db_area_consumer_code;
        $consumer_access_role->updated_by = $db_area_consumer_code;

        $consumer_access_role->save();
    }

    public function createConsumer($resArray, $isPassword)
    {
        //        *Functin creates a consumer with json we gets from 1c
        //        *
        //       * {
        //            "request": {
        //                "db_area_code": "number1",
        //                  "request_name": "ConsumerCreate",
        //                  "request_parameters": {
        //                    "consumer": {
        //                        "consumer_login": "login",
        //                  "consumer_email": "test@gmail.com",
        //                  "consumer_name": "name",
        //                  "consumer_password": "password",
        //                  "consumer_status_n": "0",
        //                  "consumer_type_code": "0",
        //                  "first_name": "kuku",
        //                  "last_name": "kuku",
        //                  "middle_name": "kukuku",
        //                  "male_l": "1",
        //                  "phone_number": "789465123",
        //                  "e_mail2": "test2@gmail.com",
        //                  "birth_date": "1984-09-11",
        //                  "url_name": "http://google.com",
        //                  "suser_name": "",
        //                  "consumer_check": "2"
        //                  }
        //                  }
        //                  }
        //                  }
        //
        //       */
        $texts = (new TranslationCaptionsController())->translations();
        $consumer = new Consumer();
        $consumer->consumer_login = $resArray['request']['request_parameters']['consumer']['consumer_login'];
        // $consumer->name = $resArray['request']['request_parameters']['consumer']['consumer_name'];
        if($isPassword)
        {
            $password = $resArray['request']['request_parameters']['consumer']['consumer_password'];
        }
        else
        {
            $password = $resArray['request']['request_parameters']['consumer']['consumer_login'];
        }

        $consumer->password = bcrypt($password);
        //$consumer->consumer_pass = bcrypt($password);
        $consumer->consumer_name = $resArray['request']['request_parameters']['consumer']['consumer_name'];
        $consumer->consumer_status_n = $resArray['request']['request_parameters']['consumer']['consumer_status_n'];
        $consumer->consumer_type_code = '0';
        $consumer->consumer_is_system_n = '0';
        $consumer->email = $resArray['request']['request_parameters']['consumer']['consumer_email'];
        $consumer->email2 = $resArray['request']['request_parameters']['consumer']['e_mail2'];
        $consumer->phone_number = $resArray['request']['request_parameters']['consumer']['phone_number'];
        $consumer->url_name = $resArray['request']['request_parameters']['consumer']['url_name'];
        //УЗНАТЬ ЗА ЭТО ПОЛЕ в мой базе его не было
        //$consumer->consumer_type_code = $resArray['request']['request_parameters']['consumer']['consumer_type_code'];
        $consumer->first_name = $resArray['request']['request_parameters']['consumer']['first_name'];
        $consumer->last_name = $resArray['request']['request_parameters']['consumer']['last_name'];
        $consumer->middle_name = $resArray['request']['request_parameters']['consumer']['middle_name'];
        $consumer->male_l = $resArray['request']['request_parameters']['consumer']['male_l'];
        $consumer->deleted_l = false;
        $consumer->column_change_password_l = true;
        $consumer->birth_date = ($resArray['request']['request_parameters']['consumer']['birth_date'] === "") ? null : ($resArray['request']['request_parameters']['consumer']['birth_date']);
        $consumer->agreement_accepted_date = (isset($resArray['request']['request_parameters']['consumer']['agreement_accepted_date']) ? $resArray['request']['request_parameters']['consumer']['agreement_accepted_date'] : null);
        //            $consumer->suser_name = $resArray['request']['request_parameters']['consumer']['suser_name']; //commit Albert Topalu 15.11.18
        $DbAreaRelations = DbArea::with('dBase.serverDb', 'consumer')
            ->where('db_area_code', $resArray['request']['db_area_code'])
            ->get()->toArray();
        $consumer->created_by = $DbAreaRelations[0]['consumer']['consumer_code'];
        $consumer->updated_by = $DbAreaRelations[0]['consumer']['consumer_code'];

        $consumer->save();
        if($consumer->id)
        {
            $codeString = (int)10000 + $consumer->id;
            $code = (string)$codeString;
            $consumer->consumer_code = $code;
            if($consumer->save())
            {
                $status = array(
                    "status"   =>
                        [
                            "status_code"        => "1",
                            "status_description" => "successfully"
                        ],
                    "consumer" => [
                        'consumer_code' => $code
                    ]
                );
            }
        }
        $consActivityToken = (new AccessController())->createSendToken($consumer, $password);
        //В зависимоти от параметров выводим соотвествующий статус
        if(app('typeVerify') == 0)
        {
            $status = array(
                "status"   =>
                    [
                        "status_code"        => "1",
                        'status_description' => $texts->where('caption_name', "MailRegistration")
                            ->first()->caption_translation
                    ],
                "consumer" => [
                    'consumer_code' => $code
                ]
            );
        }

        if(app('typeVerify') == 1)
        {
            $status = array(
                'status'   => [
                    'status_code'        => "1",
                    'status_description' => $texts->where('caption_name', "YouAreRegistered")
                        ->first()->caption_translation
                ],
                "consumer" => [
                    'consumer_code' => $code
                ]
            );
        }
        if(app('typeVerify') == 2)
        {
            $status = array(
                'status'   => [
                    'status_code'        => "1",
                    'status_description' => $texts->where('caption_name', "RegistrationThankFor")
                        ->first()->caption_translation
                ],
                "consumer" => [
                    'consumer_code' => $code
                ]
            );
        }


        return $status;
    }

    public function createSendToken($consumer, $password)
    {
        $failed = 0;
        $success = 1;

        $create = 0;
        $sendRequest = 1;
        $issued = 2;
        $active = 3;
        $block = 4;
        $deactivated = 8;
        $changeRequest = ConsumerActivityToken::create([
            'consumer_id' => $consumer->id,
            'email_issue' => $consumer->email,
            'email_new'   => NULL,
            'token'       => str_random(20),
            'status_n'    => $failed, //0 - статус неуспешной операции
            'action_id'   => 0
        ]);
        $changeRequest->save();
        $operation = SystemOperation::where('sys_oper_code', 'Verification')->select('id')->first()->id;
        $changeRequest->action_id = $operation;
        //записываем тип верификации в таблицу токенов
        $changeRequest->type_verify = app('typeVerify');
        $changeRequest->save();
        //в зависимости от типа верификации отправляем письмо и меняем статусы
        if(app('typeVerify') == 0)
        {
            MailManager::sendMail($consumer->email, ConsumerRegistered1C::class,
                $consumer, $password, $changeRequest->token);
            $consumer->consumer_status_n = $sendRequest;
            $consumer->save();
        }
        if(app('typeVerify') == 1)
        {
            MailManager::sendMail($consumer->email, ConsumerRegistered1C::class,
                $consumer, $password, $changeRequest->token);
            $changeRequest->status_n = $success;
            $changeRequest->save();
            $consumer->consumer_status_n = $active;
            $consumer->save();
        }
        if(app('typeVerify') == 2)
        {
            $changeRequest->status_n = $success;
            $changeRequest->save();
            $consumer->consumer_status_n = $active;
            $consumer->save();
        }
    }

    public function dropCompany($resArray)
    {

        if((bool)$resArray['request']['request_parameters']['uid_1c_code'])
        {

            $dbAreaCodeCompany = \Illuminate\Support\Facades\DB::table('_DbAreas')
                ->select('id')->where('db_area_code', '=', $resArray['request']['db_area_code'])
                ->value('id'); //Insert Albert Topalu 14.09.18 11:49
            $CompaniesId = DB::table('Companies')
                ->where('uid_1c_code', '=', $resArray['request']['request_parameters']['uid_1c_code'])
                ->where('db_area_id', '=', $dbAreaCodeCompany)//Insert Albert Topalu 14.09.18 11:49
                ->get()->first();


            ZzCompanyInfo::where('company_id', '=', $CompaniesId->id)->delete();
            ZzCompany::where('company_id', '=', $CompaniesId->id)->delete();
            CompanyInfo::where('company_id', '=', $CompaniesId->id)->delete();

            $result = Company::where('id', '=', $CompaniesId->id)->delete();

            //            $result = DB::table('Companies')->where('uid_1c_code', '=', $resArray['request']['request_parameters']['uid_1c'])->delete();

            if($result)
            {

                $status = array(
                    "status" =>
                        [
                            "status_code"        => "1",
                            "status_description" => "successfully"
                        ]
                );

            }
            else
            {

                $status = array(
                    "status" =>
                        [
                            "status_code"        => "0",
                            "status_description" => "error"
                        ]
                );

            }
        }
        return $status;

    }

    public function dropContractor($resArray)
    {

        if((bool)$resArray['request']['request_parameters']['uid_1c_code'])
        {
            $dbAreaCodeContractor = \Illuminate\Support\Facades\DB::table('_DbAreas')
                ->select('id')->where('db_area_code', '=', $resArray['request']['db_area_code'])
                ->value('id'); //Insert Albert Topalu 17.09.18 09:27

            $ContractorsId = DB::table('Contractors')
                ->where('uid_1c_code', '=', $resArray['request']['request_parameters']['uid_1c_code'])
                ->where('db_area_id', '=', $dbAreaCodeContractor)//Insert Albert Topalu 14.09.18 11:49
                ->get()->first();

            ZzContractorInfo::where('contractor_id', '=', $ContractorsId->id)->delete();
            ZzContractor::where('contractor_id', '=', $ContractorsId->id)->delete();
            ContractorInfo::where('contractor_id', '=', $ContractorsId->id)->delete();
            $result = Contractor::where('id', '=', $ContractorsId->id)->delete();


            //                        $result = DB::table('Contractors')->where('uid_1c_code', '=', $resArray['request']['request_parameters']['uid_1c'])->delete();

            if($result)
            {

                $status = array(
                    "status" =>
                        [
                            "status_code"        => "1",
                            "status_description" => "successfully"
                        ]
                );

            }
            else
            {

                $status = array(
                    "status" =>
                        [
                            "status_code"        => "0",
                            "status_description" => "error"
                        ]
                );

            }
        }

        return $status;

    }

    public function checkConsumerExists($resArray)
    {

        $ConsumerChecksEmail = Consumer::where('email',
            $resArray['request']['request_parameters']['consumer']['consumer_email'])->get()->toArray();
        $ConsumerChecksLogin = Consumer::where('consumer_login',
            $resArray['request']['request_parameters']['consumer']['consumer_login'])->get()->toArray();


        if(count($ConsumerChecksEmail))
        {

            $status = array(
                "status" =>
                    [
                        "status_code"        => "0",
                        "status_description" => "Consumer with this email already exist"
                    ]
            );

            return $status;
        }

        if(count($ConsumerChecksLogin))
        {


            $status = array(
                "status" =>
                    [
                        "status_code"        => "0",
                        "status_description" => "Consumer with this login already exist"
                    ]
            );

            return $status;


        }

        if(!count($ConsumerChecksLogin) || !count($ConsumerChecksEmail))
        {

            $status = array(
                "status" =>
                    [
                        "status_code"        => "1",
                        "status_description" => "successfully"
                    ]
            );

            return $status;
        }


    }

    public function createAttachedDocument($resArray)
    {
        //Универсальный метод обработки запроса из 1с
        //Получение полей передаваемых в json-е
        $blockFields = $resArray['request']['request_parameters']['object_block_fields'];
        for($i = 0; $i < count($blockFields); $i++)
        {
            if(!$resArray['request']['request_parameters']['object_block_fields'][$i]['field_is_link'])
            {
                $arrFalse[] = $resArray['request']['request_parameters']['object_block_fields'][$i];
            }
            if($resArray['request']['request_parameters']['object_block_fields'][$i]['field_is_link'])
            {
                $arrTrue[] = $resArray['request']['request_parameters']['object_block_fields'][$i];
            }
        }
        foreach($arrFalse as $arr)
        {
            $fieldNameFalse[] = $arr['field_name'];
            $filedValue[] = $arr['field_value'];
        }
        foreach($arrTrue as $arr)
        {
            $fieldNameTrue[] = $arr['field_name'];
            $model = $arr['field_value']['value_table_code'];
            $route = 'App\Models\\' . $model;
            $id[] = $route::where($arr['field_value']['value_table_key'], $arr['field_value']['value'])->value('id');
        }
        $result = array_merge(array_combine($fieldNameTrue, $id), array_combine($fieldNameFalse, $filedValue));
        $owner_name = $resArray['request']['request_parameters']['owner']['owner_name'];
        $route = 'App\Models\\' . $owner_name;
        $id_owner = $route::where($resArray['request']['request_parameters']['owner']['owner_key'],
            $resArray['request']['request_parameters']['owner']['owner_key_value'])->value('id');


        $dataInfo = (new AttachedFilesController())
            ->createDocument1C($resArray, $id_owner, $result);
        $status = [
            'status' => [
                'status_code'        => (string)1,
                'status_description' => 'successfully',
            ]
        ];
        return response()->json($status);
    }
}
