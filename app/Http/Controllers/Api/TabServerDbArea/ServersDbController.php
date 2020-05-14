<?php

namespace App\Http\Controllers\Api\TabServerDbArea;

use App\Http\Classes\ConsumerParameters;
use App\Models\Caption;
use App\Captions1;
use App\Models\Company;
use App\Models\Consumer;
use App\Models\Contractor;
use App\Models\Country;
use App\Models\Country1;
use App\Models\DbArea;
use App\Models\InfoType;
use App\Models\NameReport;
use App\Models\NameReportParamReport;
use App\Models\ParamReport;
use App\Models\Region;
use App\Models\ServerDb;
use App\Http\Controllers\Api\Controller;
use App\Texts;
use App\Models\Language;
use App\Translation;
use App\Translation1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Http\Classes\CheckController;

class ServersDbController extends Controller
{

    public function index(Request $request)
    {
        if(config('app.VueBlade'))
        {

            //            $texts = DB::table('_TranslationCaptions')
            //                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
            //                ->where('languages.language_code', config('app.locale'))
            //                ->get();

            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


            $servers = ServerDb::with('servers.db_area')->get();
            $consumer = Auth::user();
            return response()->json([
                'servers'  => $servers,
                'consumer' => $consumer,
                'texts'    => $texts,
            ]);
        }
        else
        {
            //            $texts = DB::table('_TranslationCaptions')
            //                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
            //                ->where('languages.language_code', config('app.locale'))
            //                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

            $servers = ServerDb::with('servers.db_area')->get();
            $consumer = Auth::user();


            return view('auth.admin.home',
                compact('servers', 'test',
                    'consumer', 'report_companys', 'texts'
                ));
        }
    }

    public function card(Request $request)
    {

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Database',
            'DBList', 'DatabaseType',
            'ServerTableServerName', 'ServerTableServerIP',
            'DatabaseServers', 'ServerTableServerIP',
            'ServerTableServerUrl', 'Server', 'CreationDetails', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'CreationInfo',
            'SystemDetails', 'Port', 'SecureConnection'

        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        //        if(strpos($request->id,'new') !== false){
        //            $ServersDB[] = ServerDb::getNewObject();
        //        }
        //        else{
        //            $ServersDB = ServerDb::where('id', $request->id)->get()->toarray();
        //        }

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
            $contRequest = ServerDb::getNewObject();
        }
        else
        {
            $contRequest = ServerDb::where('id', $contReqId)->get()->first()->toArray();
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

            ["tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
             "blocks_quantity" => 1,
             "blocks"          => [
                 [
                     "block_title"         => $getArrayCaptions['DatabaseServers']['translation_captions']['caption_translation'],
                     "block_zone_quantity" => 1,
                     "block_model"         => $mainModel,
                     "block_type"          => "block_card",
                     "block_fields"        => [
                         [
                             'title'      => $getArrayCaptions['ServerTableServerName']['translation_captions']['caption_translation'],
                             'model'      => 'server_name',
                             'model_name' => $mainModel,
                             'width'      => '50%', 'type' => 'text',
                             'order_zone' => '1', 'zone' => '1',
                             'order'      => '3'
                         ],
                         [
                             'title'      => $getArrayCaptions['ServerTableServerIP']['translation_captions']['caption_translation'],
                             'model'      => 'server_ip',
                             'model_name' => $mainModel,
                             'width'      => '50%', 'type' => 'text',
                             'order_zone' => '2', 'zone' => '1',
                             'order'      => '2'
                         ],
                         [
                             'title'      => $getArrayCaptions['ServerTableServerUrl']['translation_captions']['caption_translation'],
                             'model'      => 'server_url',
                             'model_name' => $mainModel,
                             'width'      => '50%', 'type' => 'text',
                             'order_zone' => '3', 'zone' => '1',
                             'order'      => '3'
                         ],

                         [
                             'title'      => $getArrayCaptions['Port']['translation_captions']['caption_translation'],
                             'model'      => 'server_port',
                             'model_name' => $mainModel,
                             'width'      => '50%', 'type' => 'text',
                             'order_zone' => '3', 'zone' => '1',
                             'order'      => '3'
                         ],

                         [
                             'title'        => $getArrayCaptions['SecureConnection']['translation_captions']['caption_translation'],
                             'model'        => 'server_http_code',
                             'model_name' => $mainModel,
                             'width'        => '50%', 'type' => 'vue-select',
                             'options'      => [],
                             "options_data" => [
                                 "options_data_model"  => "Http_codes",
                                 "options_field_id"    => "value",
                                 "options_field_title" => "title",
                                 "search"              => ""
                             ],
                             'order_zone'   => '3', 'zone' => '1',
                             'order'        => '4'
                         ],
                     ]
                 ]
             ]

            ]
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

                        "block_model"  => $mainModel,
                        "block_type"   => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $res = [[ //Итоговый массив рекизитов
                  'id'               => $contRequest['id'],
                  'server_name'      => $contRequest['server_name'],
                  'server_port'      => $contRequest['server_port'],
                  'server_ip'        => $contRequest['server_ip'],
                  'server_url'       => $contRequest['server_url'],
                  'server_http_code' => $contRequest['server_http_code'],
                  'created_at'       => $contRequest['created_at'],
                  'created_by'       => $contRequest['created_by'],
                  'updated_at'       => $contRequest['updated_at'],
                  'updated_by'       => $contRequest['updated_by'],

                ]];

        $http_codes = [
            [
                "title" => "Нет",
                "value" => "null"
            ],
            [
                "title" => "http",
                "value" => "http://"
            ],
            [
                "title" => "https",
                "value" => "https://"
            ],
        ];

        $card = [
            "main_data_models" => [
                $mainModel => $res
            ],

            "add_data_models" => [
                "Http_codes" => $http_codes
            ],

            "sets" => $this->getButtonsList(['card_actions']),

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['Server']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "disable_inputs"                => $formShowParam['read_only'],
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $res[0]['server_name'],
                "form_type_list"                => [
                    "form_list_url" => "/serversDb",

                ],

            ],

            "tabs" => $tabs,


        ];

        return response()->json($card);
    }

    public function list(Request $request)
    {

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Database',
            'DBList', 'DatabaseType',
            'ServerTableServerName', 'ServerTableServerIP',
            'DatabaseServers', 'ServerTableServerIP',
            'ServerTableServerUrl',
            'Port'

        ];
        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $ServersDB = ServerDb::get()->toarray();

        $list = [

            "main_data_models" => [
                $mainModel => $ServersDB
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['DatabaseServers']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "/server",
                    "form_search_field" => "server_name",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "links"            => [

                ["link_title" => $getArrayCaptions['DBList']['translation_captions']['caption_translation'], "link_url" => "/dbs", "class" => "btn btn-link-inline", "link_type" => "internal", "img" => ""],

            ],
            "tabs"             => [

                [

                    "blocks_quantity" => 0,
                    "blocks"          => [

                        [
                            "block_title"         => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 0,
                            "block_model"         => $mainModel,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                /*list fields zone 1*/
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', 'thStyle' => 'width: 6%', "zone" => "1"],
                                ['key'   => 'server_name', 'sortable' => true, 'class' => 'server_name',
                                 "label" => $getArrayCaptions['ServerTableServerName']['translation_captions']['caption_translation'], 'thStyle' => 'width: 24%', "zone" => "1"],

                                ['key'   => 'server_ip', 'sortable' => true, 'class' => 'server_ip',
                                 "label" => $getArrayCaptions['ServerTableServerIP']['translation_captions']['caption_translation'], 'thStyle' => 'width: 24%', "zone" => "1"],

                                ['key'   => 'server_url', 'sortable' => true, 'class' => 'caption_rem',
                                 "label" => $getArrayCaptions['ServerTableServerUrl']['translation_captions']['caption_translation'], 'thStyle' => 'width: 23%', "zone" => "1"],

                                ['key'   => 'server_port', 'sortable' => true, 'class' => 'caption_rem',
                                 "label" => $getArrayCaptions['Port']['translation_captions']['caption_translation'], 'thStyle' => 'width: 23%', "zone" => "1"],
                            ]
                        ]
                    ]


                ]


            ]

        ];


        return response()->json($list);

    }

    public function update(Request $request)
    {


        $model = $request->ServersDB[0];


        if(config('app.VueBlade'))
        {


            /*if good and valid update record*/
            return ServerDb::where('id', $model['id'])->update(
                [
                    'server_name' => $model['server_name'],
                    'server_ip'   => $model['server_ip'],
                    'server_url'  => $model['server_url'],
                    'updated_by'  => (new ConsumerParameters())->consumerCode(),

                ]
            );
        }
        else
        {


            /*if good and valid create record*/
            ServerDb::where('id', $request->idServer)->update(
                [
                    'server_name' => $request->serverName,
                    'server_ip'   => $request->serverIp,
                    'server_url'  => $request->serverUrl,
                    'updated_by'  => (new ConsumerParameters())->consumerCode(),

                ]
            );
            return back()->with('alert', trans('messages.saved'));
        }
    }

    public function insert(Request $request)
    {


        /*result of our validate rules*/
        $validator = $this->applyValidator($request);


        if($validator->fails())
        {

            $response = [

                "status"  => 1,
                "message" => $validator->messages(),
            ];

            return response()->json($response);
        }

        $model = $request->ServersDB[0];

        /*if success all access checks  */
        if(config('app.VueBlade'))
        {
            /*if Vue and data is not valid send a message*/

            /*if not exist and rules is valid add record*/
            return ServerDb::create([
                'server_name' => $model['server_name'],
                'server_ip'   => $model['server_ip'],
                'server_url'  => $model['server_url'],
                'created_by'  => (new ConsumerParameters())->consumerCode(), //add Albert Topalu 13.11.18
            ]);

        }
        else
        {

            /*if good and valid create record*/
            ServerDb::create([
                'server_name' => $request->serverNameAdd,
                'server_ip'   => $request->serverIpAdd,
                'server_url'  => $request->serverUrlAdd,
                'created_by'  => (new ConsumerParameters())->consumerCode(), //add Albert Topalu 13.11.18
            ]);
            return back()->with('alert', trans('messages.createDb'));
        }


    }

    public function applyValidator(Request $request)
    {

        /*if not empty server_url add server_url correct validation*/
        if(!empty($request->server_url))
        {
            $validator = Validator::make($request->ServersDB[0], [
                'server_name' => 'required|unique:_ServersDB',
                'server_ip'   => 'required|ip|max:15|',
                'server_url'  => 'url',
            ]);


        }
        else
        {

            /*validation rules*/
            $validator = Validator::make($request->ServersDB[0], [
                'server_name' => 'required|unique:_ServersDB',
                'server_ip'   => 'required|ip|max:15|',

            ]);


        }

        return $validator;

    }

    //    public function delete(Request $request){
    //
    //        $model = $request->ServersDB[0];
    //        if (config('app.VueBlade')) {
    //            $delMsg = ServerDb::where('id', $model['id'])->with('servers.db_area')->get()->first();
    //            /*y.yurenko*/
    //            if(!is_null($delMsg)){
    //                if (count($delMsg->servers) > 0) {
    //                    return back()->with('alert', trans('messages.deleteFirstDb'));
    //                } elseif (count($delMsg->servers) == 0) {
    //                    return ServerDb::where('id', $model['id'])->delete();
    //                }
    //            }else{
    //
    //                return ServerDb::where('id', $model['id'])->delete(); //y.yurenko
    //
    //            }
    //        }
    //        else{
    //            $delMsg = ServerDb::where('id',$request->id)->with('servers.db_area')->get()->first();
    //            if (count($delMsg->servers) > 0){
    //                return back()->with('alert', trans('messages.deleteFirstDb'));
    //            }
    //            elseif (count($delMsg->servers) == 0) {
    //                return ServerDb::where('id', $request->id)->delete();;
    //                return back()->with('alert',trans('messages.remotely'));
    //            }
    //        }
    //    }

    ///////////////////////////for blade/////////////////////////////////
    ///     public function index(Request $request) {
    //        $texts = DB::table('_TranslationCaptions')
    //            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
    //            ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
    //            ->where('languages.language_code', config('app.locale'))
    //            ->get();
    //        $servers = ServerDb::with('servers.db_area')->get();
    //        $consumer = Auth::user();
    //        return view('auth.admin.home',
    //            compact('servers','test',
    //                'consumer','report_companys','texts'
    //            ));
    //    }
    //    /*---------SERVER----------*/
    //    public function update(Request $request){
    //        ServerDb::where('id',$request->idServer)->update(
    //            [
    //                'server_name' => $request->serverName,
    //                'server_ip' => $request->serverIp,
    //                'server_url' => $request->serverUrl,
    //                'suser_name' => $request->serverSuserName
    //            ]
    //        );
    //        return back()->with('alert', trans('messages.saved'));
    //    }
    //    public function insert(Request $request){
    //         ServerDb::create([
    //            'server_name' => $request->serverNameAdd,
    //            'server_ip' => $request->serverIpAdd,
    //            'server_url' => $request->serverUrlAdd,
    //            'suser_name' => $request->serverSuserNameAdd,
    //        ]);
    //       return back()->with('alert', trans('messages.createDb'));
    //    }
    //    public function delete(Request $request){
    //        $delMsg = ServerDb::where('id',$request['ServerId'])->with('servers.db_area')->get()->first();
    //        if (count($delMsg->servers) > 0){
    //            return back()->with('alert', trans('messages.deleteFirstDb'));
    //        }
    //        elseif (count($delMsg->servers) == 0) {
    //            $delMsg->delete();
    //            return back()->with('alert',trans('messages.remotely'));
    //        }
    //    }
    //    /*---------END SERVER----------*/
    //    public function dbUpdate(Request $request){
    //        \App\Db::where('id',$request->idDb)->update(
    //            [
    //                'db_name' => $request->dbName,
    //                'db_code' => $request->dbCode,
    //                'suser_name' => $request->dbSuserName,
    //            ]
    //        );
    //       return back()->with('alert',trans('messages.saved'));
    //    }
    //    public function dbInsert(Request $request){
    //       \App\Db::create([
    //            'server_id' => $request->ServerIdSelect,
    //            'db_name' => $request->dbNameAdd,
    //            'db_code' => $request->dbCode,
    //            'suser_name' => $request->dbSuserNameAdd,
    //        ]);
    //        return back()->with('alert',trans('messages.createDb'));
    //    }
    //    public function dbDelete(Request $request){
    //         $delMsg = \App\Db::where('id', $request['dbId'])->with('db_area')->get()->first();
    //        if (count($delMsg->db_area) > 0){
    //            return back()->with('alert','Удалите сначало области бызы данных');
    //        }
    //        elseif (count($delMsg->db_area) == '') {
    //            $delMsg->delete();
    //            return back()->with('alert',trans('messages.remotely'));
    //        }
    //    }
}
