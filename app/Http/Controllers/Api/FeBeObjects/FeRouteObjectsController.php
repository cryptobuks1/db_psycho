<?php

namespace App\Http\Controllers\Api\FeBeObjects;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\BeRoute;
use App\Models\BL\BlCustomerRequest;
use App\Models\FeRoute;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\FeRouteObject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class FeRouteObjectsController extends Controller
{
    public function insert()
    {

    }

    public function update(Request $request)
    {
//        $fe_route_id = $request->fe_route_id;
//        $row_id_fe_route_object = $request->row_id_fe_route_object;
//        $completed_l = $request->completed_l;
//        return FeRouteObject::where('fe_route_id', $fe_route_id)->
//        where('row_id_fe_route_object',$row_id_fe_route_object)->
//        update([
//            "completed_l"=>$completed_l
//        ]);
    }

    public function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Name', 'Code', 'ControllerNumber',
            'DeletedL','FeRoute','ControllerAllias','Completed','FeRouteObjects',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = FeRouteObject::query()
            ->leftJoin('FeRoutes as feRoute', 'feRoute.id', '=', 'FeRouteObjects.fe_route_id')
            ->leftJoin('BeRoutes as beRoute', 'feRoute.be_route_id', '=', 'beRoute.id')
            ->leftJoin('__Controllers as contr', 'beRoute.controller_id', '=', 'contr.id')
            ->select('FeRouteObjects.id', 'feRoute.fe_route_name as fe_route_name', 'contr.controller_alias as controller_alias', 'FeRouteObjects.deleted_l', 'completed_l')
            ->orderBy('fe_route_id')
            ->get();


        $list = [
            "main_data_models" => [
                $controller->controller_alias => $ModelTables,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['FeRouteObjects']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line"        => true,
                "form_type_list"                => [
                    "form_card_url"     => "/fe/route/object",
                    "form_search_field" => "",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
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
                                ['key'      => 'deleted_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => '',
                                    'label'    => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "2"
                                ],
                                [
                                    'key'      => 'fe_route_name',
                                    'sortable' => true,
                                    'class'    => 'fe_route_name',
                                    'label'    => $getArrayCaptions['FeRoute']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 34%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'controller_alias',
                                    'sortable' => true,
                                    'class'    => 'controller_alias',
                                    'label'    => $getArrayCaptions['ControllerAllias']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 34%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                                ['key'      => 'completed_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => '',
                                    'label'    => $getArrayCaptions['Completed']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "5"
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
        if(!$this->isAdmin())
            abort(403);


        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'CreationDetails','FeRoute','OutputObject','ControllerAllias','Completed','FeRouteObject',
            'new', 'CheckDataModels'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $feRouteObjectTableName = '';
        $feRouteObjectTemplateName = '';
        $OutputObjects = $getArrayCaptions['CheckDataModels']['translation_captions']['caption_translation'];
        $feRouteObjectDeduceLabel = true;

        $modelTable_id = $request->id;
        if($modelTable_id == "new")
            $modelTable = FeRouteObject::getNewObject();
        else {
            $modelTable = FeRouteObject::query()
                ->with('feRoutes', 'feRoutes.beRoute', 'feRoutes.beRoute.controller', 'feRoutes.beRoute.controller.models')
                ->find($modelTable_id)->toArray();

            $feRouteObjectTableName = $modelTable['fe_routes']['be_route']['controller']['models']['table_name'] ?? '';
            $feRouteObjectTemplateName = $modelTable['fe_routes']['be_route']['controller']['models']['table_output_template'] ?? '';

            //Если хотя бы одно незаполненно, то в поле выводим ошибку
            if ($feRouteObjectTableName != '' && $feRouteObjectTemplateName != ''){
                $OutputObjectsAllData = DB::table($feRouteObjectTableName)->get()->toArray();
                if (array_key_exists($feRouteObjectTemplateName, $OutputObjectsAllData[0])) {
                    $OutputObjects = [];
                    foreach ($OutputObjectsAllData as $obj) {
                        $temp = [
                            'id' => $obj->id,
                            'output_object_template' => $obj->$feRouteObjectTemplateName,
                        ];
                        array_push($OutputObjects, $temp);
                    }
                    $feRouteObjectDeduceLabel = false;
                }
            }
        }

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $FeRoutes = FeRoute::select('id', 'fe_route_name')
            ->get()->toArray();

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title' => $getArrayCaptions['FeRoute']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_route_id', 'width' => '50%', 'type' => 'vue-select',
                                'zone'  => '1', 'order' => '1','options' => [],
                                "options_data" => [
                                    "options_data_model" => "FeRoutes",
                                    "options_field_id" => "id",
                                    "options_field_title" => "fe_route_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['OutputObject']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => $feRouteObjectDeduceLabel == true ? 'checkDataModels' : 'row_id_fe_route_object', 'width' => '50%',
                                'type' => $feRouteObjectDeduceLabel == true ? 'label' : 'vue-select',
                                'zone'  => '1', 'order' => '2','options' => [],
                                "options_data" => [
                                    "options_data_model" => "OutputObjects",
                                    "options_field_id" => "id",
                                    "options_field_title" => "output_object_template",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['ControllerAllias']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'controller_alias', 'width' => '50%', 'type' => 'label',
                                'zone'  => '1', 'order' => '3'
                            ],
                            [
                                'title' => $getArrayCaptions['Completed']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'completed_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '4'
                            ],
                        ]
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
                                'model_name' => $controller->controller_alias,
                                'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "2"
                            ],
                        ]
                    ]
                ]
            ];
        }

        $res = [[
            'id'                        => $modelTable['id'],
            'fe_route_id'               => $modelTable['fe_route_id'],
            'fe_route_name'             => $modelTable['fe_routes']['fe_route_name'] ?? '',
            'row_id_fe_route_object'    => $modelTable['row_id_fe_route_object'],
            'checkDataModels'           => $getArrayCaptions['CheckDataModels']['translation_captions']['caption_translation'],
            'completed_l'               => $modelTable['completed_l'],
            'controller_alias'          => $modelTable['fe_routes']['be_route']['controller']['controller_alias'] ?? '',
            'created_at'                => $modelTable['created_at'],
            'created_by'                => $modelTable['created_by'],
            'updated_at'                => $modelTable['updated_at'],
            'updated_by'                => $modelTable['updated_by'],
        ]];

        $card = [
            "main_data_models" => [
                $controller->controller_alias   => $res,
            ],
            "add_data_models"  => [
                "FeRoutes"              => $FeRoutes,
                "OutputObjects"         => $OutputObjects,
            ],
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['FeRouteObject']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ?$getArrayCaptions['new']['translation_captions']['caption_translation'] : $modelTable['fe_routes']['fe_route_name'],
                "form_type_list"                => [
                    "form_card_url" => "fe/route/object",
                ],
            ],
            "sets" => $this->getButtonsList(["card_actions"]),
            "tabs" => $tabs
        ];

        return response()->json($card);


    }

 }
