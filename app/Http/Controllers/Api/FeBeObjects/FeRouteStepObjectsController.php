<?php

namespace App\Http\Controllers\Api\FeBeObjects;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\FeRouteStep;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\FeRouteStepObject;
use App\Models\FeRouteObject;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


class FeRouteStepObjectsController extends Controller
{
    public function insert(){

    }

    public function update(Request $request)
    {
        $fe_route_id = $request->fe_route_id;
        $row_id_fe_route_object = $request->row_id_fe_route_object;
        $completed_l = $request->completed_l;
        return FeRouteObject::where('fe_route_id', $fe_route_id)->
        where('row_id_fe_route_object',$row_id_fe_route_object)->
        update([
            "completed_l"=>$completed_l
        ]);
    }

    public function closeStep(Request $request){

        $methods = $request->accessMethods; //todo проверка на доступы
        $fe_route_step_id = $request->fe_route_step_id;
        $row_id_fe_route_object = $request->row_id_fe_route_object;
        $fe_route_id = $request->fe_route_id;
        $id = FeRouteObject::where(['row_id_fe_route_object' => $row_id_fe_route_object, "fe_route_id" => $fe_route_id])->get()->toArray();
        return  FeRouteStepObject::where('fe_route_step_id',$fe_route_step_id)
            ->where('fe_route_object_id', $id[0]['id'])->update([
            "completed_l"=>1
        ]);
    }

    public function rollbackStep(Request $request){

        $methods = $request->accessMethods; //todo проверка на доступы
        $fe_route_step_ids = $request->fe_route_step_ids;


        foreach ($fe_route_step_ids as $key=>$id)
         FeRouteStepObject::where('fe_route_step_id',$id)->update([
            "completed_l"=>0
        ]);
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
            'FeRouteObjects', 'DeletedL','Name','ControllerAllias',
            'FeRouteStepName','InternalPropertyNumber','Completed', 'FeRouteStep', 'CheckDataModels'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $fe_route_step_objects = FeRouteStepObject::query()
                ->with('feRouteStep', 'feRouteObject', 'feRouteObject.feRoutes',
                    'feRouteStep.beRoute', 'feRouteObject.feRoutes.beRoute', 'feRouteStep.beRoute.controller',
                    'feRouteObject.feRoutes.beRoute.controller', 'feRouteStep.beRoute.controller.models', 'feRouteObject.feRoutes.beRoute.controller.models')
                ->get()->toArray();

        $res = [];

        foreach ($fe_route_step_objects as $object){
            //Получаем наименование модели и поля для представления внутреннего объекта
            $feRouteStepObjectTableName = $object['fe_route_step']['be_route']['controller']['models']['table_name'] ?? '';
            $feRouteStepObjectTemplateName = $object['fe_route_step']['be_route']['controller']['models']['table_output_template'] ?? '';

            $FeRouteStepObject = $getArrayCaptions['CheckDataModels']['translation_captions']['caption_translation'];

            //Если хотя бы одно незаполненно, то в поле выводим ошибку
            if ($feRouteStepObjectTableName != '' && $feRouteStepObjectTemplateName != '') {
                $FeRouteStepObjectAllData = DB::table($feRouteStepObjectTableName)
                    ->where('id', $object['row_id_fe_route_step_object'])
                    ->first();
                if (property_exists($FeRouteStepObjectAllData, $feRouteStepObjectTemplateName)){
                    $FeRouteStepObject = $FeRouteStepObjectAllData->$feRouteStepObjectTemplateName;
                }
            }

            $feRouteObjectTableName = $object['fe_route_object']['fe_routes']['be_route']['controller']['models']['table_name'] ?? '';
            $feRouteObjectTemplateName = $object['fe_route_object']['fe_routes']['be_route']['controller']['models']['table_output_template'] ?? '';

            $FeRouteObject = $getArrayCaptions['CheckDataModels']['translation_captions']['caption_translation'];

            //Если хотя бы одно незаполненно, то в поле выводим ошибку
            if ($feRouteObjectTableName != '' && $feRouteObjectTemplateName != '') {
                $FeRouteObjectAllData = DB::table($feRouteObjectTableName)
                    ->where('id', $object['fe_route_object']['row_id_fe_route_object'])
                    ->first();
                if (property_exists($FeRouteObjectAllData, $feRouteObjectTemplateName)){
                    $FeRouteObject = $FeRouteObjectAllData->$feRouteObjectTemplateName;
                }
            }

            $temp = [
                'id' => $object['id'],
                'deleted_l' => $object['deleted_l'],
                'controller_alias' => $object['fe_route_step']['be_route']['controller']['controller_alias'],
                'fe_route_step_name' => $object['fe_route_step']['fe_route_step_name'],
                'fe_route_step_object' => $FeRouteStepObject,
                'fe_route_object' => $FeRouteObject,
                'completed_l' => $object['completed_l'],
                "fe_route_object_id" => $object['fe_route_object']['row_id_fe_route_object'],
            ];
            array_push($res, $temp);
        }

        $FeRouteObjs = FeRouteObject::query()
            ->with('feRoutes', 'feRoutes.beRoute', 'feRoutes.beRoute.controller', 'feRoutes.beRoute.controller.models')
            ->get()->toArray();

        $FeRouteObjects = [];

        foreach ($FeRouteObjs as $object){
            //Получаем наименование модели и поля для представления внешнего объекта
            $feRouteObjectTableName = $object['fe_routes']['be_route']['controller']['models']['table_name'] ?? '';
            $feRouteObjectTemplateName = $object['fe_routes']['be_route']['controller']['models']['table_output_template'] ?? '';

            //Если хотя бы одно незаполненно, то в поле выводим ошибку
//            if ($feRouteObjectTableName != '' && $feRouteObjectTemplateName != ''){
//                $FeRouteObject = DB::table($feRouteObjectTableName)
//                    ->where('id', '=', $object['row_id_fe_route_object'])
//                    ->pluck($feRouteObjectTemplateName)->first();
//            }

            $FeRouteObject = $getArrayCaptions['CheckDataModels']['translation_captions']['caption_translation'];

            //Если хотя бы одно незаполненно, то в поле выводим ошибку
            if ($feRouteObjectTableName != '' && $feRouteObjectTemplateName != ''){
                $FeRouteObjectAllData = DB::table($feRouteObjectTableName)
                    ->where('id', '=', $object['row_id_fe_route_object'])
                    ->first();
                if (property_exists($FeRouteObjectAllData, $feRouteObjectTemplateName)) {
                    $FeRouteObject = $FeRouteObjectAllData->$feRouteObjectTemplateName;
                    $feRouteObjectDeduceError = false;
                }
            }
            $temp = [
                'id' => $object['id'],
                'fe_route_object' => $FeRouteObject
            ];
            array_push($FeRouteObjects, $temp);
        }

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $res,
            ],
            "add_data_models"  => [
                "FeRouteObjects" => $FeRouteObjects,
            ],
            "form_parameters"  => [
//                "form_title"                    => $getArrayCaptions['ModelTables']['translation_captions']['caption_translation'],
                "form_title"                    => 'FeRouteStepObjects',
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line"        => true,
                "form_type_list"                => [
                    "form_card_url"     => "/fe/route/step",
                    "form_search_field" => "",
                ],
            ],
            "dependent"        => [
                "dependent_data_model" =>  $controller->controller_alias,
                "dependent_fields" => [
                    "title" => $getArrayCaptions['FeRouteObjects']['translation_captions']['caption_translation'],
                    "model" => "fe_route_object_id",
                    "type" => "select",
                    "options" => [],
                    "options_data" => [
                        "options_data_model"      => "FeRouteObjects",
                        "options_field_id"        => "id",
                        "options_field_id_value"  => '',
                        "options_field_title"     => "fe_route_object",
                        "search" => ''
                    ],
                ],
                "width" => "100%",
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
                                    'key'      => 'controller_alias',
                                    'sortable' => true,
                                    'class'    => 'controller_alias',
                                    'label'    => $getArrayCaptions['ControllerAllias']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                                [
                                    'key'      => 'fe_route_step_name',
                                    'sortable' => true,
                                    'class'    => 'fe_route_step_name',
                                    'label'    => $getArrayCaptions['FeRouteStepName']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 19%',
                                    "zone"     => "1",
                                    "order"    => "5"
                                ],
                                [
                                    'key'      => 'fe_route_step_object',
                                    'sortable' => true,
                                    'class'    => 'fe_route_step_object',
                                    'label'    => $getArrayCaptions['InternalPropertyNumber']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 19%',
                                    "zone"     => "1",
                                    "order"    => "6"
                                ],
                                ['key'      => 'completed_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => '',
                                    'label'    => $getArrayCaptions['Completed']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "7"
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];

        return response()->json($list);
    }


    public function list_old(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Name', 'Code', 'ControllerNumber',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = FeRouteStepObject::query()
            ->select('id', 'fe_route_step_id', 'fe_route_object_id')
            ->orderBy('fe_route_step_id')
            ->get();


        $list = [

            "main_data_models" => [

                $controller->controller_alias => $ModelTables,

            ],
            "form_parameters"  => [
//                "form_title"                    => $getArrayCaptions['ModelTables']['translation_captions']['caption_translation'],
                "form_title"                    => 'FeRouteStep',
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "/fe/route/step",
                    "form_search_field" => "fe_route_step_name",
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
                                    'key'      => 'fe_route_step_id',
                                    'sortable' => true,
                                    'class'    => 'fe_route_step_id',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 47%',
                                    "zone"     => "1",
                                    "order"    => "2"
                                ],
                                [
                                    'key'      => 'fe_route_object_id',
                                    'sortable' => true,
                                    'class'    => 'fe_route_object_id',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 47%',
                                    "zone"     => "1",
                                    "order"    => "3"
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
            'CreationDetails', 'Name',
            'FeRouteStepObject', 'FeRouteStepName', 'InternalPropertyNumber', 'ControllerAllias',
            'LinkExternalObject', 'Completed', 'new', 'CheckDataModels','FeRouteObject',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        //Вспомогательные переменные
        $modelTable_id = $request->id;

        $feRouteObjectDeduceError = true;

        $FeRouteStepObjects = '';
        $feRouteStepObjectDeduceLabel = true;

        if($modelTable_id == "new") {
            $modelTable = FeRouteStepObject::getNewObject();
            $modelTable['fe_route_object_id'] = $request->owner_id;
            $OwnerObject = FeRouteObject::query()->with('feRoutes', 'feRoutes.beRoute',
                'feRoutes.beRoute.controller', 'feRoutes.beRoute.controller.models')
                ->where("FeRouteObjects.id", $modelTable['fe_route_object_id'])
                ->first()->toArray();
            $modelTable = array_add($modelTable, 'fe_route_object', $OwnerObject);
        }
        else {
            $modelTable = FeRouteStepObject::query()
                ->with('feRouteStep', 'feRouteObject', 'feRouteObject.feRoutes',
                    'feRouteStep.beRoute', 'feRouteObject.feRoutes.beRoute', 'feRouteStep.beRoute.controller',
                    'feRouteObject.feRoutes.beRoute.controller', 'feRouteStep.beRoute.controller.models', 'feRouteObject.feRoutes.beRoute.controller.models')
                ->where("FeRouteStepObjects.id", $modelTable_id)
                ->get()->toArray();

            $modelTable = $modelTable[0];

            //Получаем наименование модели и поля для представления внутреннего объекта
            $feRouteStepObjectTableName = $modelTable['fe_route_step']['be_route']['controller']['models']['table_name'] ?? '';
            $feRouteStepObjectTemplateName = $modelTable['fe_route_step']['be_route']['controller']['models']['table_output_template'] ?? '';

            $FeRouteStepObjects = $getArrayCaptions['CheckDataModels']['translation_captions']['caption_translation'];

            //Если хотя бы одно незаполненно, то в поле выводим ошибку
            if ($feRouteStepObjectTableName != '' && $feRouteStepObjectTemplateName != '') {
                $FeRouteStepObjectsAllData = DB::table($feRouteStepObjectTableName)
                    ->get()->toArray();
                $FeRouteStepObjects = [];
                if (array_key_exists($feRouteStepObjectTemplateName, $FeRouteStepObjectsAllData[0])) {
                    foreach ($FeRouteStepObjectsAllData as $obj) {
                        $temp = [
                            'id' => $obj->id,
                            'output_object_template' => $obj->$feRouteStepObjectTemplateName,
                        ];
                        array_push($FeRouteStepObjects, $temp);
                    }
                    $feRouteStepObjectDeduceLabel = false;
                }
            }
        }

        //Получаем наименование модели и поля для представления внешнего объекта
        $feRouteObjectTableName = $modelTable['fe_route_object']['fe_routes']['be_route']['controller']['models']['table_name'] ?? '';
        $feRouteObjectTemplateName = $modelTable['fe_route_object']['fe_routes']['be_route']['controller']['models']['table_output_template'] ?? '';

        $FeRouteObject = $getArrayCaptions['CheckDataModels']['translation_captions']['caption_translation'];

        //Если хотя бы одно незаполненно, то в поле выводим ошибку
        if ($feRouteObjectTableName != '' && $feRouteObjectTemplateName != ''){
            $FeRouteObjectAllData = DB::table($feRouteObjectTableName)
                ->where('id', $modelTable['fe_route_object']['row_id_fe_route_object'])
                ->first();
            if (property_exists($FeRouteObjectAllData, $feRouteObjectTemplateName)) {
                $FeRouteObject = $FeRouteObjectAllData->$feRouteObjectTemplateName;
                $feRouteObjectDeduceError = false;
            }
        }

        $FeRouteSteps = FeRouteStep::select('id', 'fe_route_step_name')
            ->where('actual_l', '=', true)
            ->where('deleted_l', '<>', true)
            ->get()->toArray();

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
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title'         => $getArrayCaptions['FeRouteStepName']['translation_captions']['caption_translation'],
                                'model_name'    => $controller->controller_alias,
                                'model'         => "fe_route_step_id",
                                'width'         => '50%',
                                'type'          => 'vue-select',
                                'zone'          => '1',
                                'order'         => '1', 'options' => [],
                                "options_data" => [
                                    "options_data_model" => "FeRouteSteps",
                                    "options_field_id" => "id",
                                    "options_field_title" => "fe_route_step_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['InternalPropertyNumber']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => $feRouteStepObjectDeduceLabel == true ? 'checkDataModels' :"row_id_fe_route_step_object", 'width' => '50%',
                                'type' => $feRouteStepObjectDeduceLabel == true ? 'label' : 'vue-select',
                                'zone'  => '1', 'order' => '2','options' => [],
                                "options_data" => [
                                    "options_data_model" => "FeRouteStepObjects",
                                    "options_field_id" => "id",
                                    "options_field_title" => 'output_object_template',
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['ControllerAllias']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_route_step_object_alias', 'width' => '50%', 'type' => 'label',
                                'zone'  => '1', 'order' => '3'
                            ],
                            [
                                'title' => $getArrayCaptions['LinkExternalObject']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => $feRouteObjectDeduceError == true ? 'checkDataModels' : 'fe_route_object', 'width' => '50%',
                                'type' => 'label',
                                'zone'  => '1', 'order' => '4'
                            ],
                            [
                                'title' => $getArrayCaptions['Completed']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'completed_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '5'
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
            'id'                            => $modelTable['id'],
            'fe_route_step_id'              => $modelTable['fe_route_step_id'],
            'fe_route_step_name'            => $modelTable['fe_route_step']['fe_route_step_name'] ?? '',
            'fe_route_object_id'            => $modelTable['fe_route_object_id'],
            'fe_route_step_object_alias'    => $modelTable['fe_route_step']['be_route']['controller']['controller_alias'] ?? '',
            'row_id_fe_route_step_object'   => $modelTable["row_id_fe_route_step_object"],
            'fe_route_object'               => $FeRouteObject,
            'checkDataModels'               => $getArrayCaptions['CheckDataModels']['translation_captions']['caption_translation'],
            'completed_l'                   => $modelTable['completed_l'],
            'created_at'                    => $modelTable['created_at'],
            'created_by'                    => $modelTable['created_by'],
            'updated_at'                    => $modelTable['updated_at'],
            'updated_by'                    => $modelTable['updated_by']
        ]];

        $card = [
            "main_data_models" => [
                $controller->controller_alias => $res,
            ],
            "add_data_models" => [
                'FeRouteStepObjects' => $FeRouteStepObjects,
                'FeRouteSteps' => $FeRouteSteps,
            ],
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['FeRouteStepObject']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $res[0]['fe_route_step_name'],
                "form_type_list"                => [
                    "form_card_url" => "fe/route/step/object",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_title" => 'Lol',
                "dependent_fields" => [
                    "title" => $getArrayCaptions['FeRouteObject']['translation_captions']['caption_translation'],
                    "model" => "fe_route_object_id",
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_data_model" => 'FeRouteSteps',
                        "options_field_id" => "fe_route_object_id",
                        "options_field_id_value" => "",
                        "options_field_title" => "fe_route_object",
                        "search" => ''
                    ],
                ],
                "width" => "100%",
            ],
            "sets" => $this->getButtonsList(["card_actions"]),
            "tabs" => $tabs
        ];

        return response()->json($card);


    }


    public function card_old(Request $request)
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
            'CreationDetails',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if($modelTable_id == "new")
            $modelTable = FeRouteStepObject::getNewObject();
        else
            $modelTable = FeRouteStepObject::query()
                ->find($modelTable_id);

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
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
//                                'title' => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                                'title' => 'fe_route_step_id',
                                'model' => 'fe_route_step_id', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryFullName']['translation_captions']['caption_translation'],
                                'title' => 'fe_route_object_id',
                                'model' => 'fe_route_object_id', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],

                            [
//                                'title' => $getArrayCaptions['CountryCode2Full']['translation_captions']['caption_translation'],
                                'title' => 'completed_l',
                                'model' => 'completed_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '3'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCode2Full']['translation_captions']['caption_translation'],
                                'title' => 'deleted_l',
                                'model' => 'deleted_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '7'
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
                                'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
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

            "form_parameters" => [
//                "form_title"                    => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                "form_title"                    => 'FeRouteStepObject',
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
//                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['BlockCountryAddNew']['translation_captions']['caption_translation'] : $modelTable->country_name,
                "form_main_data_model_name"     => $modelTable_id == "new" ? "FeRouteStepObject" : $modelTable->country_name,
                "form_type_list"                => [

                    "form_card_url" => "fe/route/step/object",
                ],
            ],

            "sets" => $this->getButtonsList(["card_actions"]),

            "tabs" => $tabs
        ];

        return response()->json($card);


    }
}
