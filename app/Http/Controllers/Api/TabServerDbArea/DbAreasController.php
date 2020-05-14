<?php

namespace App\Http\Controllers\Api\TabServerDbArea;

use App\Models\Company;
use App\Models\Consumer;
use App\Models\ServerDb;
use App\Models\DbArea;
use App\Models\DBase;
use App\Http\Controllers\Api\Controller;
use App\Http\Classes\ConsumerParameters;
use App\Texts;
use App\Models\Language;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Classes\CheckController;
use Illuminate\Support\Facades\Route;


class DbAreasController extends Controller
{
    public function update(Request $request)
    {
        if(config('app.VueBlade'))
        {

            $model = $request->DbAreas[0];
            return DbArea::where('id', $model['id'])->update(
                [
                    'db_id'          => $model['db_id'],
                    'consumer_id'    => $model['consumer_id'],
                    'db_area_code'   => $model['db_area_code'],
                    'db_area_name'   => $model['db_area_name'],
                    'db_area_token'  => $model['db_area_token'],
                    //'db_area_pass',
                    'db_partition_1' => $model['db_partition_1'],
                    'db_partition_2' => $model['db_partition_2'],
                    'actual_l'       => $model['actual_l'],
                    'updated_by'     => (new ConsumerParameters())->consumerCode(),
                ]
            );
        }
        else
        {
            DbArea::where('id', $request->idDbArea)->update(
                [


                    'db_id'          => $request->db_id,
                    'consumer_id'    => $request->consumer_id,
                    'db_area_code'   => $request->db_area_code,
                    'db_area_name'   => $request->db_area_name,
                    'db_area_token'  => $request->db_area_token,
                    'db_partition_1' => $request->db_partition_1,
                    'db_partition_2' => $request->db_partition_2,
                    'actual_l'       => $request->actual_l,
                    'updated_by'     => (new ConsumerParameters())->consumerCode(),

                ]
            );
            return back()->with('alert', trans('messages.saved'));
        }
    }

    public function insert(Request $request)
    {
        if(config('app.VueBlade'))
        {
            return DbArea::create([

                'db_id'          => $request->db_id,
                'consumer_id'    => $request->consumer_id,
                'db_area_code'   => $request->db_area_code,
                'db_area_name'   => $request->db_area_name,
                'db_area_token'  => $request->db_area_token,
                'db_partition_1' => $request->db_partition_1,
                'db_partition_2' => $request->db_partition_2,
                'actual_l'       => $request->actual_l,
                'created_by'     => (new ConsumerParameters())->consumerCode(),
                //'suser_name' => $request->suser_name,

            ]);
        }
        else
        {
            DbArea::create([

                'db_id'          => $request->db_id,
                'consumer_id'    => $request->consumer_id,
                'db_area_code'   => $request->db_area_code,
                'db_area_name'   => $request->db_area_name,
                'db_area_token'  => $request->db_area_token,
                'db_partition_1' => $request->db_partition_1,
                'db_partition_2' => $request->db_partition_2,
                'actual_l'       => $request->actual_l,
                //'suser_name' => $request->suser_name,
            ]);
            return back()->with('alert', trans('messages.createDbArea'));
        }
    }

    /*public function delete(Request $request){
        if (config('app.VueBlade')) {
            $delMsg = DbArea::where('id', $request->id)->get()->first();
            return $delMsg->delete();
        }
        else{
            $delMsg = DbArea::where('id',$request['dbAreaDeleteId'])->get()->first();
            $delMsg->delete();
            return back()->with('alert',trans('messages.remotely'));
        }
    }*/

    public function card(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'SystemDetails', 'DbArea', 'blockDbAreas',
            'DbAreaCode', 'DbAreaName', 'DbAreaToken', 'DbPartition1',
            'DbPartition2', 'DbName', 'ConsumerName', 'Actual', 'ConsumerNameDefault'

        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        //        if(strpos($request->id,'new') !== false){
        //            $DbAreas = [DbArea::getNewObject()];
        //        }
        //        else{
        //            $DbAreas = DbArea::select("_DBases.db_name","_DbAreas.*","Consumers.consumer_name")
        //                ->leftjoin('_DBases', '_DbAreas.db_id', '=', '_DBases.id')
        //                ->leftjoin('Consumers', '_DbAreas.consumer_id', '=', 'Consumers.id')
        //                ->where('_DbAreas.id', $request->id)->get()->toarray();
        //
        //            $DbAreas = json_decode(json_encode($DbAreas), true);
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

            $contRequest = DbArea::getNewObject();
        }
        else
        {
            $contRequest = DbArea::with([
                'consumer' => function($query)
                {
                    $query->select('id', 'consumer_code');
                },
                'dBase'    => function($query)
                {
                    $query->select('id', 'db_name');
                }
            ])
                ->where('id', $contReqId)->get()->first()->toArray();
        }


        $Dbases = DBase::get()->all();

        $Consumers = Consumer::select(['id', 'consumer_code'])->get()->toArray();
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
                "blocks_quantity" => 1,
                "blocks"          => [

                    [

                        "block_zone_quantity" => 2,
                        "block_model"         => $mainModel,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title' => $getArrayCaptions['DbAreaName']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model' => 'db_area_name',
                                'width' => '100%',
                                'type'  => 'text',
                                'zone'  => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['DbAreaCode']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model' => 'db_area_code',
                                'width' => '100%',
                                'type'  => 'text',
                                'zone'  => '1',
                                'order' => '2'
                            ],

                            //                            [
                            //                                'title' => $getArrayCaptions['DbPartition1']['translation_captions']['caption_translation'],
                            //                                'model_name'=>$mainModel, 'model' => 'db_partition_1',
                            //                                'width' => '100%',
                            //                                'type' => 'text',
                            //                                'zone' => '1',
                            //                                'order' => '3',
                            //                                'validation' => ["numeric"]
                            //                            ],

                            [
                                'title' => $getArrayCaptions['DbAreaToken']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model' => 'db_area_token',
                                'width' => '100%',
                                'type'  => 'text',
                                'zone'  => '1',
                                'order' => '4'
                            ],
                            //                            [
                            //                                'title' => $getArrayCaptions['ConsumerNameDefault']['translation_captions']['caption_translation'],
                            //                                'model_name'=>$mainModel, 'model' => 'consumer_id',
                            //                                'width' => '100%',
                            //                                'type' => 'lt-select',
                            //                                'zone' => '2',
                            //                                'order' => '1',
                            //                                'options' => [],
                            //                                "options_data" => [
                            //                                    "options_data_model" => "Consumers",
                            //                                    "options_field_id" => "id",
                            //                                    "options_field_title" => "consumer_code",
                            //                                    "options_field_id_value" => "",
                            //                                    "search" => ""
                            //                                ],
                            //                            ],
                            [

                                'title'        => $getArrayCaptions['DbName']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model'        => 'db_id',
                                'width'        => '100%',
                                'type'         => 'vue-select',
                                'zone'         => '2',
                                'order'        => '2',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"     => "Dbases",
                                    "options_field_id"       => "id",
                                    "options_field_title"    => "db_name",
                                    "options_field_id_value" => "",
                                    "search"                 => ""
                                ],
                            ],

                            //                            [
                            //                                'title' => $getArrayCaptions['DbPartition2']['translation_captions']['caption_translation'],
                            //                                'model_name'=>$mainModel, 'model' => 'db_partition_2',
                            //                                'width' => '100%',
                            //                                'type' => 'text',
                            //                                'zone' => '2',
                            //                                'order' => '8',
                            //                                'validation' => ["numeric"]
                            //                            ],


                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],

                                'model_name' => $mainModel,
                                'model' => 'actual_l',
                                'width' => '100%',
                                'type'  => 'checkbox',
                                'zone'  => '2',
                                'order' => '8'
                            ],
                            [
                                'title'  => "Проверить соединение",

                                'model_name' => $mainModel,
                                'model'  => 'id',
                                'action' => 'test_connection',
                                'link'   => "/admin/db/area/connection/test",
                                'type'   => 'button',
                                'width'  => '100%',
                                "zone"   => "1",
                                "order"  => "4",

                            ],
                        ]
                    ]
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
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name'=>$mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name'=>$mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name'=>$mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name'=>$mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                            [
                                'title'        => $getArrayCaptions['ConsumerNameDefault']['translation_captions']['caption_translation'],
                                'model'        => 'consumer_id',
                                'model_name'=> $mainModel,
                                'width'        => '100%',
                                'type'         => 'vue-select',
                                'zone'         => '1',
                                'order'        => '3',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"     => "Consumers",
                                    "options_field_id"       => "id",
                                    "options_field_title"    => "consumer_code",
                                    "options_field_id_value" => "",
                                    "search"                 => ""
                                ],
                            ],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $res = [[ //Итоговый массив рекизитов
                  'id'             => $contRequest['id'],
                  'consumer_id'    => $contRequest['consumer_id'],
                  'consumer_code'  => $contRequest['consumer']['consumer_code'],
                  'db_id'          => $contRequest['db_id'],
                  'db_name'        => $contRequest['d_base']['db_name'],
                  'db_area_code'   => $contRequest['db_area_code'],
                  'db_area_name'   => $contRequest['db_area_name'],
                  'db_area_token'  => $contRequest['db_area_token'],
                  'db_partition_1' => $contRequest['db_partition_1'],
                  'db_partition_2' => $contRequest['db_partition_2'],
                  'actual_l'       => $contRequest['actual_l'],
                  'deleted_l'      => $contRequest['deleted_l'],
                  'created_at'     => $contRequest['created_at'],
                  'created_by'     => $contRequest['created_by'],
                  'updated_at'     => $contRequest['updated_at'],
                  'updated_by'     => $contRequest['updated_by'],

                ]];

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
                //                $mainModel => $DbAreas,
                $mainModel => $res,
            ],
            "add_data_models"  => [
                "Dbases"    => $Dbases,
                "Consumers" => $Consumers,
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['DbArea']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "disable_inputs"                => $formShowParam['read_only'],
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                //                "form_main_data_model_name" => $DbAreas[0]['db_area_name'],
                "form_main_data_model_name"     => $res[0]['db_area_name'],
                "form_type_list"                => [
                    "form_list_url" => "dbareas",

                ],
            ],

            "tabs" => $tabs
        ];

        return response()->json($card);

    }

    public function list(Request $request)
    {

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'DbAreas', 'DatabaseServers', 'DBList',
            'blockDbAreas', 'Code', 'Name',
            'Consumer', 'Database', 'Actual',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',


        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $DbAreas = DB::table('_DbAreas')
            ->leftJoin('_DBases', '_DbAreas.db_id', '=', '_DBases.id')
            //            ->leftJoin('Consumers', '_DbAreas.consumer_id', '=', 'Consumers.id')
            //            ->select('_DbAreas.*', "_DBases.db_name","Consumers.consumer_name")
            ->select('_DbAreas.db_area_name', '_DbAreas.db_area_code', '_DbAreas.actual_l', '_DbAreas.id',
                "_DBases.db_name")
            ->get()->toarray();


        $list = [

            "main_data_models" => [

                $mainModel => $DbAreas,

            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['DbAreas']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "dbAreas",
                    "form_search_field" => "db_area_name",
                ],
            ],

            "links" => [

                [
                    "link_title" => $getArrayCaptions['DatabaseServers']['translation_captions']['caption_translation'],
                    "link_url"   => "/serversDb",
                    "class"      => "btn btn-link-inline",
                    "link_type"  => "internal",
                    "img"        => ""
                ],
                [
                    "link_title" => $getArrayCaptions['DBList']['translation_captions']['caption_translation'],
                    "link_url"   => "/dbs",
                    "class"      => "btn btn-link-inline",
                    "link_type"  => "internal",
                    "img"        => ""
                ],
            ],

            "tabs" => [

                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],

                    "blocks_quantity" => 1,
                    "blocks"          => [

                        [
                            // "block_title" => 'blockDbAreas',
                            "block_zone_quantity" => 1,
                            "block_model"         => $mainModel,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [

                                [
                                    'key'      => 'actions', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',
                                    "zone"     => "1",
                                    "order"    => "1"
                                ],
                                [
                                    'key'      => 'db_area_code',
                                    'sortable' => true,
                                    'class'    => 'db_area_code',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 22%',
                                    "zone"     => "1",
                                    "order"    => "3"


                                ],

                                [
                                    'key'      => 'db_area_name',
                                    'sortable' => true,
                                    'class'    => 'db_area_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 22%',
                                    "zone"     => "1",
                                    "order"    => "4"

                                ],
                                [
                                    'key'      => 'db_name',
                                    'sortable' => true,
                                    'class'    => 'db_name',
                                    'label'    => $getArrayCaptions['Database']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 22%',
                                    "zone"     => "1",
                                    "order"    => "5"

                                ],
                                [
                                    'key'      => 'consumer_code',
                                    'sortable' => true,
                                    'class'    => 'consumer_code',
                                    'label'    => $getArrayCaptions['Consumer']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 22%',
                                    "zone"     => "1",
                                    "order"    => "5"

                                ],
                                [
                                    'key'      => 'actual_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'label'    => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',
                                    "zone"     => "1",
                                    "order"    => "6"
                                ],

                            ]
                        ]
                    ]


                ],


            ]
        ];


        //return var_dump("<pre>",$list,"</pre>");
        return response()->json($list);


    }

    public function testConnection(Request $request)
    {
        $db_area_id = $request->id;

        $db_area = DbArea::query()
            ->where("id", $db_area_id)
            ->with(["dBase.dbType", "dBase.serverDb"])
            ->get()->first();

        $array_to_send = [
            "request" => [
                "db_area_code" => $db_area->db_area_code,
                "request_name" => "TestConnection"
            ]
        ];

        try
        {
//            $result = $this->sendRequestTo1C($db_area->dBase->serverDb->server_url, $db_area->dBase->db_code,
//                "/hs/api_for_wc/signal", $array_to_send, $db_area->db_area_token,
//                $db_area->dBase->serverDb->server_port);

            $result = \OneC::sendRequest($db_area, "/hs/api_for_wc/signal", $array_to_send)
                ->getResultArray();

            if($result->status->status_code == 1)
            {
                return response()->json([
                    "error"   => false,
                    "message" => "Соединение успешно установлено"
                ]);
            }
            elseif($result->status->status_code == 0)
            {
                return response()->json([
                    "error"   => true,
                    "message" => $result->status->status_description
                ], 400);
            }


        }
        catch(GuzzleException $e)
        {
            return response()->json([
                "error"   => true,
                "message" => "Отсутствует соединение с 1С"
            ], 400);
        }
        catch(\Exception $e)
        {
            return response()->json([
                "error" => "true",
                "message" => "Ошибка"
            ], 400);
        }

    }

}
