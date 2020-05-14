<?php

namespace App\Http\Controllers\Api\TabServerDbArea;

use App\Http\Classes\ConsumerParameters;
use App\Models\Company;
use App\Models\Consumer;
use App\Models\DbArea;
use App\Models\DBase;
use App\Models\DbType;
use App\Models\ServerDb;
use App\Http\Controllers\Api\Controller;
use App\Texts;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Classes\CheckController;
use Illuminate\Support\Facades\Route;


class DBasesController extends Controller
{


    public function index()
    {
        if (config('app.VueBlade')) {
            $consumer = Auth::user();
            $servers = ServerDb::with('servers.db_area')->get();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

            return response()->json([
                'consumer' => $consumer,
                'texts' => $texts,
                'servers' => $servers
            ]);
        } else {
            $consumer = Auth::user();
            $servers = ServerDb::with('servers.db_area')->get();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

            return view('auth.admin.page.index',
                compact('servers',
                    'consumer', 'texts'));
        }
    }


    public function update(Request $request)
    {


        $model = $request->Dbs[0];

        if (config('app.VueBlade')) {

            return DBase::where('id', $model['id'])->update([
                    'db_name' => $model['db_name'],
                    'server_id' => $model['server_id'],
                    'db_code' => $model['db_code'],
                    'db_type_id' => $model['db_type_id'],
                    'db_remark' => $model['db_remark'],
//                    'suser_name' => $request->suser_name,
                    'updated_by' => (new ConsumerParameters())->consumerCode(),
                ]
            );
        } else {
            DBase::where('id', $request->idDb)->update(
                [
                    'db_name' => $request->dbName,
                    'db_code' => $request->dbCode,
//                    'suser_name' => $request->dbSuserName,
                    'updated_by' => (new ConsumerParameters())->consumerCode(),
                ]
            );
        }
    }


    public function insert(Request $request)
    {
        if (config('app.VueBlade')) {
            return DBase::create([
                'server_id' => $request->server_id,
                'db_name' => $request->db_name,
                'db_code' => $request->db_code,
//                'suser_name' => $request->suser_name,
                'created_by' => (new ConsumerParameters())->consumerCode(), //add Albert Topalu 13.11.18
            ]);
        } else {
            DBase::create([
                'server_id' => $request->ServerIdSelect,
                'db_name' => $request->dbNameAdd,
                'db_code' => $request->dbCode,
//                'suser_name' => $request->dbSuserNameAdd,
                'created_by' => (new ConsumerParameters())->consumerCode(), //add Albert Topalu 13.11.18
            ]);
            return back()->with('alert', trans('messages.createDb'));
        }
    }


    /*public function delete(Request $request)
    {
        if (config('app.VueBlade')) {
            $delMsg = DBase::where('id', $request->id)->with('db_area')->get()->first();
            if (count($delMsg->db_area) > 0) {
                return back()->with('alert', 'Удалите сначало области бызы данных');
            } elseif (count($delMsg->db_area) == 0) {
                return $delMsg->delete();
            }
        } else {
            $delMsg = DBase::where('id', $request['dbId'])->with('db_area')->get()->first();
            if (count($delMsg->db_area) > 0) {
                return back()->with('alert', 'Удалите сначало области бызы данных');
            } elseif (count($delMsg->db_area) == 0) {
                $delMsg->delete();
                return back()->with('alert', trans('messages.remotely'));
            }
        }
    }*/

    public function card(Request $request)
    {

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Database',
            'DBList', 'DatabaseCode', 'DatabaseType',
            'ServerTableServerName', 'Description',
            'DatabaseServers', 'DbType', 'DbTypes', 'Remark', 'CreationDetails', 'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',

        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);
//
//        if(strpos($request->id,'new') !== false){
//            $Databases = [DBase::getNewObject()];
//        }else{
//            $Databases = DB::table('_DBases')
//                ->leftJoin('__DbTypes', '_DBases.db_type_id', '=', '__DbTypes.id')
//                ->leftJoin('_ServersDB', '_DBases.server_id', '=', '_ServersDB.id')
//                ->select('_DBases.*', "__DbTypes.db_type_name","_ServersDB.server_name")
//                ->where('_DBases.id',$request->id)
//                ->get()->toArray();
//            $Databases = json_decode(json_encode($Databases), true);
//        }


        $contReqId = $request->id;
        if ($contReqId == "new") {
            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if ($access === false){
                return abort('403');
            }

            $contRequest = DBase::getNewObject();
        } else {
            $contRequest = DBase::with([
                'dbType' => function ($query) {
                    $query->select('id', 'db_type_name');
                },
                'serverDb'=>function($query){
                $query->select('id','server_name');
                }
            ])
                ->where('id', $contReqId)->get()->first()->toArray();
        }

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))->value('controller_alias');

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $tabs = [
            [

                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [

                    [
                        "block_title" => $getArrayCaptions['Database']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 1,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [

                            [
                                'title' => $getArrayCaptions['DatabaseCode']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model' => 'db_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Database']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model' => 'db_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],

                            [

                                'title' => $getArrayCaptions['DbType']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model' => 'db_type_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '3',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "DbTypes",
                                    "options_field_id" => "id",
                                    "options_field_title" => "db_type_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['ServerTableServerName']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model' => 'server_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '4',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Servers",
                                    "options_field_id" => "id",
                                    "options_field_title" => "server_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'width' => '100%',
                                'model_name'=>$mainModel,'model' => 'db_remark',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '5'
                            ],

                        ]


                    ]

                ]
            ],
        ];
        if ($formShowParam['show_system_tab']) {
            $tabSystem = [
                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name'=>$mainModel,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name'=>$mainModel,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name'=>$mainModel,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name'=>$mainModel,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }
        $DbTypes = DbType::select('id', 'db_type_name')->get()->toarray();
        $Servers = ServerDb::select('id', 'server_name')->get()->toarray();

        $res = [[ //Итоговый массив рекизитов
            'id' => $contRequest['id'],
            'db_code' => $contRequest['db_code'],
            'db_name' => $contRequest['db_name'],
            'server_id' => $contRequest['server_id'],
            'server_name'=>$contRequest['server_db']['server_name'] ?? '',
            'db_type_id' => $contRequest['db_type_id'],
            'db_type_name' => $contRequest['db_type']['db_type_name'] ?? '',
            'db_remark' => $contRequest['db_remark'],
            'created_at' => $contRequest['created_at'],
            'created_by' => $contRequest['created_by'],
            'updated_at' => $contRequest['updated_at'],
            'updated_by' => $contRequest['updated_by'],

        ]];


        $card = [

            "main_data_models" => [
//                $mainModel => $Databases,
                $mainModel => $res,
            ],
            "sets" => $this->getButtonsList(['card_actions']),
            "add_data_models" => [
                "DbTypes" => $DbTypes,
                "Servers" => $Servers,
            ],

            "form_parameters" => [
                "form_title" => $getArrayCaptions['Database']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "disable_inputs" => $formShowParam['read_only'],
                "form_type" => "card",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
//                "form_main_data_model_name" => $Databases[0]['db_name']
                "form_main_data_model_name" => $res[0]['db_name']

            ],
            "tabs" => $tabs
        ];

        return response()->json($card);
    }

    /*y.yurenko 12.11.2018*/

    public function list(Request $request)
    {


        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Database',
            'DBList', 'DatabaseCode', 'DatabaseType',
            'ServerTableServerName', 'Description',
            'DatabaseServers', 'DbType', 'CreationDetails', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'CreationInfo',
            'SystemDetails'

        ];


        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        $Databases = DB::table('_DBases')
            ->leftJoin('__DbTypes', '_DBases.db_type_id', '=', '__DbTypes.id')
            ->leftJoin('_ServersDB', '_DBases.server_id', '=', '_ServersDB.id')
            ->select('_DBases.*', "__DbTypes.db_type_name", "_ServersDB.server_name")
            ->get()->toarray();


        $list = [

            "main_data_models" => [

                "Dbs" => $Databases,

            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['DBList']['translation_captions']['caption_translation'],
                "form_code" => "dbs",
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => "Dbs",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [

                    "form_card_url" => "admin/db/card",
                    "form_search_field" => "db_name",
                ],
            ],
            "links" => [

                ["link_title" => $getArrayCaptions['DatabaseServers']['translation_captions']['caption_translation'],
                    "link_url" => "/serversDb",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",
                    "img" => ""
                ],
            ],
            "tabs" => [

                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 0,
                    "blocks" => [

                        [
                            "block_title" => $getArrayCaptions['DBList']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 0,
                            "block_model" => "Dbs",
                            "block_type" => "block_list_base",
                            "block_fields" => [

                                ['key' => 'actions',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                ],
                                [
                                    'key' => 'db_code',
                                    'sortable' => true,
                                    'class' => 'db_code',
                                    "label" => $getArrayCaptions['DatabaseCode']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%',


                                ],
                                [
                                    'key' => 'db_name',
                                    'sortable' => true,
                                    'class' => 'db_name',
                                    "label" => $getArrayCaptions['Database']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%',


                                ],

                                ['key' => 'db_type_name',
                                    'sortable' => true,
                                    'class' => 'db_type_name',
//                                        'label' => $getArrayCaptions['DatabaseType']['translation_captions']['caption_translation'],
                                    'label' => $getArrayCaptions['DbType']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%',


                                ],
                                [
                                    'key' => 'server_name',
                                    'sortable' => true,
                                    'class' => 'server_name',
                                    'label' => $getArrayCaptions['ServerTableServerName']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 25%',


                                ],


                            ]
                        ]
                    ]


                ]


            ]

        ];


        return response()->json($list);


    }



    //////////////////////////////for blade////////////////////////////////
    //     public function index()
    //    {
    //        $consumer = Auth::user();
    //        $servers = ServerDb::with('servers.db_area')->get();
    //
    //        $texts = DB::table('_TranslationCaptions')
    //            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
    //            ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
    //            ->where('languages.language_code', config('app.locale'))
    //            ->get();
    //
    //      return view('auth.admin.page.index',
    //        compact('servers',
    //             'consumer','texts'
    //            ));
    //    }
    //    public function update(Request $request){
    //        DBase::where('id',$request->idDb)->update(
    //            [
    //                'db_name' => $request->dbName,
    //                'db_code' => $request->dbCode,
    //                'suser_name' => $request->dbSuserName,
    //            ]
    //        );
    //        return back()->with('alert',trans('messages.saved'));
    //    }
    //    public function insert(Request $request){
    //        DBase::create([
    //            'server_id' => $request->ServerIdSelect,
    //            'db_name' => $request->dbNameAdd,
    //            'db_code' => $request->dbCode,
    //            'suser_name' => $request->dbSuserNameAdd,
    //        ]);
    //        return back()->with('alert',trans('messages.createDb'));
    //    }
    //    public function delete(Request $request){
    //        $delMsg = DBase::where('id',$request['dbId'])->with('db_area')->get()->first();
    ////        dd($delMsg);
    //        if (count($delMsg->db_area) > 0){
    //            return back()->with('alert','Удалите сначало области бызы данных');
    //        }
    //        elseif (count($delMsg->db_area) == 0) {
    //            $delMsg->delete();
    //            return back()->with('alert',trans('messages.remotely'));
    //        }
    //    }
}
