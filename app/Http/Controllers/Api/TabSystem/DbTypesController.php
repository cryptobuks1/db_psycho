<?php

namespace App\Http\Controllers\Api\TabSystem;

use App\Http\Classes\ConsumerParameters;
use Illuminate\Http\Request;
use App\Models\DbType;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Validator;
use App\Http\Classes\CheckController;

/**
 * Description of DbTypesController
 *
 * @author Юрий Юренко
 */
class DbTypesController extends Controller
{

    public function insert(Request $request)
    {

        if (config('app.VueBlade')) {

            $model = $request->DbTypes[0];
//            $validator = Validator::make($request->DbTypes[0], [ //commit Albert Topalu 16.11.18
            $validator = \Illuminate\Support\Facades\Validator::make($request->DbTypes[0], [ //add namespace  Albert Topalu 16.11.18
                'db_type_code' => 'required|unique:__DbTypes',
                'db_type_name' => 'required|unique:__DbTypes',
            ]);

            if ($validator->fails()) {

                $response = [

                    "status" => 1,
                    "message" => $validator->messages(),
                ];

                return response()->json($response);
            }

            return DbType::create([

                'db_type_code' => $model['db_type_code'],
                'db_type_name' => $model['db_type_name'],
                'db_type_remark' => $model['db_type_remark'],
                'created_by' => (new ConsumerParameters())->consumerCode(),

            ]);
        } else {
            DbType::create([
                'db_id' => $request->db_id,
                'db_type_code' => $request->db_type_code,
                'db_type_name' => $request->db_type_name,
                'db_type_description' => $request->db_type_description,
                'created_by' => (new ConsumerParameters())->consumerCode(),
            ]);

        }
    }


    public function update(Request $request)
    {

        $validator = \Illuminate\Support\Facades\Validator::make($request->DbTypes[0], [
            'db_type_name' => 'required|unique:__DbTypes',
            'db_type_code' => 'min:3', // add Albert Topalu 16.11.18
            'db_type_remark' => 'min:3', // add Albert Topalu 16.11.18
            'updated_by' => 'integer', // add Albert Topalu 16.11.18
        ]);

        if ($validator->fails()) {

            $response = [
                "status" => 1,
                "message" => $validator->messages(),
            ];

            return response()->json($response);
        }

        $model = $request->DbTypes[0];

//        return DbType::where('id', $request->id)->update([ //commit Albert Topalu 16.11.18

        return DbType::where('id', $model['id'])->update([ //Add Albert Topalu 16.11.18
            'db_type_code' => $model['db_type_code'],
            'db_type_name' => $model['db_type_name'],
            'db_type_remark' => $model['db_type_remark'],
            'updated_by' => (new ConsumerParameters())->consumerCode(),
        ]);
    }


    /*public function delete(Request $request)
    {

        return DbType::where('id', $request->id)->delete();

    }*/

    public function card(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Databases',
            'DbTypes', 'DbType', 'DbTypeCode',
            'DbTypeName', 'DbTypeRemark',
            'CreationDetails', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'CreationInfo',
            'SystemDetails'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

//        if(strpos($request->id,'new') !== false){
//            $DbTypes[] = DbType::getNewObject();
//        }
//        else{
//            $DbTypes = DbType::where('id', $request->id)->get()->toarray();
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



            $contRequest = DbType::getNewObject();
        }
        else {
            $contRequest = DbType::where('id', $contReqId)->get()->first()->toArray();
        }

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code',class_basename(Route::current()->controller))->value('controller_alias');

        $nameControllerMethod=[
            'controller'=> class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $tabs = [
            [

                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [

                    [
                        "block_title" => $getArrayCaptions['DbType']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 1,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [


                            [
                                'title' => $getArrayCaptions['DbTypeCode']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'db_type_code',
                                'width' => '40%',
//                                            'type' => 'input',
                                'type' => 'text', //edit Albert Topalu 16.11.18
                                'zone' => '1',
                                'order' => '1'
                            ],


                            [
                                'title' => $getArrayCaptions['DbTypeName']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'db_type_name',
                                'width' => '60%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],

                            [
                                'title' => $getArrayCaptions['DbTypeRemark']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'db_type_remark',
                                'width' => '100%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],

                        ]


                    ]

                ]
            ],
        ];

        if($formShowParam['show_system_tab']){
            $tabSystem = [
                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
//                                    "block_title" => "Block2", //commit Albert Topalu 16.11.18
                        "block_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 2,
                        "block_model" => "DbTypes",
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "2"
                            ],

                        ]
                    ]
                ]


            ];
            array_push($tabs,$tabSystem);
        }

        $res = [[ //Итоговый массив рекизитов
            'id'                 => $contRequest['id'],
            'db_type_code'       => $contRequest['db_type_code'],
            'db_type_name'       => $contRequest['db_type_name'],
            'db_type_remark'     => $contRequest['db_type_remark'],
            'created_at'                        => $contRequest['created_at'],
            'created_by'                        => $contRequest['created_by'],
            'updated_at'                        => $contRequest['updated_at'],
            'updated_by'                        => $contRequest['updated_by'],

        ]];

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
//                $mainModel => $DbTypes,
                $mainModel => $res,
            ],

            "form_parameters" => [
                "form_title" => $getArrayCaptions['DbType']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "disable_inputs" => $formShowParam['read_only'],
                "form_type" => "card",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
//                "form_main_data_model_name" => $DbTypes[0]['db_type_name'],
                "form_main_data_model_name" => $res[0]['db_type_name'],
                "form_type_list" => [
//                            "form_list_url" => "dbtypes", //commit Albert Topalu 16.11.18
                    "form_card_url" => "/dbTypes/",
                ],
            ],

            "links" => [
                // ["link_title" => $getArrayCaptions['Databases']['translation_captions']['caption_translation'], "link_url" => "/dbs", "class" =>"btn btn-default", "link_type" => "internal", "img" => ""],
            ],

            "tabs" => $tabs
        ];

        return response()->json($card);

    }

    public function list(Request $request)
    {


        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Databases',
            'DbTypes', 'DbType', 'DbTypeCode',
            'DbTypeName', 'DbTypeRemark',
            'Code','Name','Remark'


        ];

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code',class_basename(Route::current()->controller))->value('controller_alias');

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $DbTypes = DbType::get()->all();

        $list = [
            "sets" => $this->getButtonsList(['list_bottom','list_top','list_top_dropdown_actions','list_top_left_command_bar','list_top_right_command_bar']),
            "main_data_models" => [
                $mainModel => $DbTypes,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['DbTypes']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [

                    "form_card_url" => "/dbTypes/",
                    "form_search_field" => "db_type_name",
                ],
            ],
            "links" => [

                ["link_title" => $getArrayCaptions['Databases']['translation_captions']['caption_translation'],
                    "link_url" => "/dbs",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",
                    "img" => ""
                ],
            ],
            "tabs" => [

                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
//                    "blocks_quantity" => 0,  //commit Albert Topalu
                    "blocks_quantity" => 1,   //add Albert Topalu 16.11.18
                    "blocks" => [

                        [
                            "block_title" => $getArrayCaptions['DbTypes']['translation_captions']['caption_translation'],
//                            "block_zone_quantity" => 0, //commit Albert Topalu
                            "block_zone_quantity" => 1, //add Albert Topalu
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_fields" => [

                                ['key' => 'actions',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "1"  //add Albert Topalu 16.11.18
                                ],
                                [
                                    'key' => 'db_type_code',
                                    'sortable' => true,
                                    'class' => 'db_type_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "2" //add Albert Topalu 16.11.18


                                ],
                                [
                                    'key' => 'db_type_name',
                                    'sortable' => true,
                                    'class' => 'db_type_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 37%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "3" //add Albert Topalu 16.11.18


                                ],

                                ['key' => 'db_type_remark',
                                    'sortable' => true,
                                    'class' => 'db_type_remark',
                                    'label' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 37%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "4" //add Albert Topalu 16.11.18

                                ],


                            ]
                        ]
                    ]


                ],



            ]
        ];

        return response()->json($list);
    }

}
