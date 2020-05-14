<?php

namespace App\Http\Controllers\Api\FeBeRoutes;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\BeRoute;
use App\Models\FeComponent;
use App\Models\FeRoute;
use App\Models\FeUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\FeRouteStep;
use App\Models\FeRouteStepObject;
use App\Models\FeRouteObject;
use App\Models\BL\BlCustomerRequest;
use App\Models\BL\BlCustomerRequestTabLeasingObject;
use Illuminate\Support\Facades\Route;

class FeRouteStepsController extends Controller
{
    public function insert()
    {

    }

    public function update(Request $request)
    {
        $model = $request->Models[0];

        return FeRouteStep::where('id', $model['id'])->update([
            'id'              => $model['id'],
            'fe_route_id'              => $model['fe_route_id'],
            'fe_component_id'              => $model['fe_component_id'],
            'be_route_id'              => $model['be_route_id'],
            'line_n'              => $model['line_n'],
            'fe_route_step_code'              => $model['fe_route_step_code'],
            'fe_route_step_name'              => $model['fe_route_step_name'],
            'fe_route_step_title'              => $model['fe_route_step_title'],
            'create_fe_route_step_object_l'              => $model['create_fe_route_step_object_l'],
            'deleted_l'              => $model['deleted_l'],
            'created_at'      => $model['created_at'],
            'updated_at'      => $model['updated_at'],
            'created_by'      => (new ConsumerParameters())->consumerCode(),
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
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
            'Name', 'Code', 'ControllerNumber','DeletedL','Actual','BeRoute','LineNumber','FeRouteSteps','FeRoutes'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = FeRouteStep::query()
            ->leftJoin('BeRoutes as beRoute', 'beRoute.id', '=', 'FeRoutesSteps.be_route_id')
            ->leftJoin('FeRoutes as feRoute', 'feRoute.id', '=', 'FeRoutesSteps.fe_route_id')
            ->select('FeRoutesSteps.id', 'fe_route_step_code', 'fe_route_step_name', 'fe_route_step_title', 'line_n', 'FeRoutesSteps.deleted_l', 'FeRoutesSteps.actual_l', 'beRoute.be_route_name', 'feRoute.fe_route_name')
            ->orderBy('fe_route_step_name')
            ->get();

        $FeRoutes = FeRoute::query()
            ->where('deleted_l', '=', false)
            ->where('actual_l', '=', true)
            ->select('id', 'fe_route_name')
            ->get()->toArray();

        $list = [

            "main_data_models" => [
                $controller->controller_alias => $ModelTables,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['FeRouteSteps']['translation_captions']['caption_translation'],
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
            "add_data_models"  => [
                "FeRoutes"    =>  $FeRoutes,
            ],
            "dependent"        => [
                "dependent_data_model"  =>  $controller->controller_alias,
                "dependent_search"      => false,
                "dependent_fields"      => [
                    "title" => $getArrayCaptions['FeRoutes']['translation_captions']['caption_translation'],
                    "model" => "id",
                    "type" => "select",
                    "options" => [],
                    "options_data" => [
                        "options_data_model"      => "FeRoutes",
                        "options_field_id"        => "id",
                        "options_field_id_value"  => /*sizeof($FeRoutes) == 1 ? $FeRoutes['0']['id'] : */'',
                        "options_field_title"     => "fe_route_name",
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
                                ['key'      => 'actual_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => '',
                                    'label'    => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'line_n',
                                    'sortable' => true,
                                    'class'    => 'line_n',
                                    'label'    => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 10%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                                [
                                    'key'      => 'fe_route_step_code',
                                    'sortable' => true,
                                    'class'    => 'fe_route_step_code',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 23%',
                                    "zone"     => "1",
                                    "order"    => "5"
                                ],
                                [
                                    'key'      => 'fe_route_step_name',
                                    'sortable' => true,
                                    'class'    => 'fe_route_step_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 23%',
                                    "zone"     => "1",
                                    "order"    => "6"
                                ],
                                [
                                    'key'      => 'be_route_name',
                                    'sortable' => true,
                                    'class'    => 'be_route_name',
                                    'label'    => $getArrayCaptions['BeRoute']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 22%',
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
            'CreationDetails',
            'Name','Code','FeComponent','FeUrl','BeRoute','LineNumber','CreateCompliance','FeRouteStep', 'Caption','new','FeRoute','Title'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if($modelTable_id == "new") {
            $modelTable = FeRouteStep::getNewObject();
            $modelTable['fe_route_id'] = $request->owner_id;
        }
        else
            $modelTable = FeRouteStep::query()
                ->with([
                    'beRoute' => function($query){
                        return $query->select('id', 'be_route_name')->get()->first();
                    },
                    'feUrl' => function($query){
                        return $query->select('id', 'fe_url_code')->get()->first();
                    },
                    'feComponent' => function($query){
                        return $query->select('id', 'fe_component_name')->get()->first();
                    }
                ])
                ->find($modelTable_id)->toArray();

        $FeRoute = FeRoute::query()
            ->where('id', $modelTable['fe_route_id'])
            ->select('id', 'fe_route_name', 'caption_code', 'updated_at', 'updated_by', 'created_at', 'created_by')->get()->toArray();

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $FeComps    = FeComponent::query()
            ->where('deleted_l', '<>', true)
            ->where('actual_l', '=', true)
            ->select('id', 'fe_component_name')->get()->toArray();
        if (isset($modelTable['fe_component'])) {
            array_push($FeComps, $modelTable['fe_component']);
        }

        $FeUrls     = FeUrl::query()
            ->where('deleted_l', '<>', true)
            ->where('actual_l', '=', true)
            ->select('id', 'fe_url_code')->get()->toArray();
        if (isset($modelTable['fe_url'])) {
            array_push($FeUrls, $modelTable['fe_url']);
        }

        $BeRoutes   = BeRoute::query()
            ->where('deleted_l', '<>', true)
            ->where('actual_l', '=', true)
            ->select('id', 'be_route_name')->get()->toArray();
        if (isset($modelTable['be_route'])) {
            array_push($BeRoutes, $modelTable['be_route']);
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
                        "block_fields"        => [
                            [
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_route_step_name', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_route_step_code', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['FeComponent']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_component_id',
                                'width' => '25%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '3',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "FeComponents",
                                    "options_field_id" => "id",
                                    "options_field_title" => "fe_component_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['FeUrl']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_id',
                                'width' => '25%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '4',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "FeUrls",
                                    "options_field_id" => "id",
                                    "options_field_title" => "fe_url_code",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['BeRoute']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'be_route_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '5',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "BeRoutes",
                                    "options_field_id" => "id",
                                    "options_field_title" => "be_route_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                'model_name' => 'FeRoutes',
                                'model' => 'caption_code', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '6'
                            ],
                            [
                                'title' => $getArrayCaptions['Title']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_route_step_title', 'width' => '25%', 'type' => 'text',
                                'zone'  => '1', 'order' => '7'
                            ],
                            [
                                'title' => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'line_n', 'width' => '25%', 'type' => 'text',
                                'zone'  => '1', 'order' => '8'
                            ],
                            [
                                'title' => $getArrayCaptions['CreateCompliance']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'create_fe_route_step_object_l', 'width' => '100%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '9'
                            ],
                        ]
                    ]
                ]
            ]
        ];

        $res = [[
            'id' => $modelTable['id'],
            'fe_route_step_name'            => $modelTable['fe_route_step_name'],
            'fe_route_step_code'            => $modelTable['fe_route_step_code'],
            'fe_route_step_title'           => $modelTable['fe_route_step_title'],
            'fe_component_id'               => $modelTable['fe_component_id'],
            'fe_url_id'                     => $modelTable['fe_url_id'],
            'be_route_id'                   => $modelTable['be_route_id'],
            'fe_route_id'                   => $modelTable['fe_route_id'],
            'fe_component_name'             => $modelTable['fe_component']['fe_component_name'] ?? '',
            'fe_url_code'                   => $modelTable['fe_url']['fe_url_code'] ?? '',
            'be_route_name'                 => $modelTable['be_route']['be_route_name'] ?? '',
            'fe_route_name'                 => $FeRoute[0]['fe_route_name'] ?? '',
            'line_n'                        => $modelTable['line_n'],
            'create_fe_route_step_object_l' => $modelTable['create_fe_route_step_object_l'],
            'created_by'                    => $modelTable['created_by'],
            'updated_by'                    => $modelTable['updated_by'],
            'created_at'                    => $modelTable['created_at'],
            'updated_at'                    => $modelTable['updated_at'],
        ]];

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
                                'model_name' => $controller->controller_alias,
                                "order" => "1"
                            ],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                'model_name' => $controller->controller_alias,
                                "order" => "2"
                            ],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                'model_name' => $controller->controller_alias,
                                "order" => "3"
                            ],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                'model_name' => $controller->controller_alias,
                                "order" => "4"
                            ],
                        ]
                    ]
                ]
            ];
        }

        $card = [
            "main_data_models" => [
                $controller->controller_alias   => $res,
                "FeRoutes"                      => $FeRoute,
            ],
            "add_data_models"  => [
                "FeComponents"  => $FeComps,
                "FeUrls"        => $FeUrls,
                "BeRoutes"      => $BeRoutes,
            ],
            "form_parameters" => [
                "form_title"                    => "FeRoutes",//$getArrayCaptions['FeRouteStep']['translation_captions']['caption_translation'],
                "form_code"                     => "FeRoutes",//$controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "card",
                "form_base_data_model"          => "FeRoutes",//$controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $modelTable['fe_route_step_title'],
                "form_type_list"                => [
                    "form_card_url" => "fe/url",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => "FeRoutes",//$controller->controller_alias,
                "dependent_fields" => [
                    "title" => $getArrayCaptions['FeRoute']['translation_captions']['caption_translation'],
                    "model" => "fe_route_id",
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_data_model"      => 'FeRoutes',
                        "options_field_id"        => "id",
                        "options_field_id_value"  => '',
                        "options_field_title"     => "fe_route_name"
                    ],
                ],
                "width" => "100%",
            ],
            "sets" => $this->getButtonsList(["card_actions"]),
            "tabs" => $tabs
        ];

        return response()->json($card);


    }

    public function index(Request $request)
    {

        $captionName = [
            'CloseStep', 'SendRequestForReview', 'back', "Further", "Step"
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $row_id_fe_route_object = $request->row_id_fe_route_object;
        $fe_route_id = $request->fe_route_id;
        //+++ ЗубановИА
        $fe_route = FeRoute::with('feRouteUrl.feUrl.controller.models')->where('id',$fe_route_id)->get()->toArray();
        $fe_route_object_models = $fe_route[0]["fe_route_url"][0]["fe_url"]["controller"]["models"] ?? null;
        //+++ ЗубановИА
        $id = 0;

        if($row_id_fe_route_object === 'new')
        {
            $BlCustomerRequest = BlCustomerRequest::create(BlCustomerRequest::getNewObject());
            $row_id_fe_route_object = $BlCustomerRequest['id'];
            $BlCustomerRequestTabLeasingObject = BlCustomerRequestTabLeasingObject::getNewObject();
            $BlCustomerRequestTabLeasingObject['bl_customer_request_id'] = $row_id_fe_route_object;
            BlCustomerRequestTabLeasingObject::create($BlCustomerRequestTabLeasingObject);
            $id = FeRouteObject::insertGetId([
                'fe_route_id'            => $fe_route_id,
                'row_id_fe_route_object' => $row_id_fe_route_object,
                'completed_l'            => 0,
                'deleted_l'              => 0
            ]);
            $steps = FeRouteStep::with('beRoute', 'beRoute.controller', 'beRoute.controller.models')
                ->where('fe_route_id', $fe_route_id)->get()->toArray();
            foreach($steps as $key => $value)
            {
                $row_id_fe_route_step_object = null;
                if($value['create_fe_route_step_object_l'])
                {
//                    $model = 'App\Models\\' . $value['be_route']['controller']['models']['table_code'];
                    $model = "\\App" . $value['be_route']['controller']['models']['table_folder'] . "\\" . $value['be_route']['controller']['models']['table_code'];
                    $row_id_fe_route_step_object = $model::insertGetId([]);
                }
                if($value['line_n'] != 0)
                {
                    FeRouteStepObject::insert([
                        'fe_route_step_id'            => $value['id'],
                        'fe_route_object_id'          => $id,
                        'row_id_fe_route_step_object' => $row_id_fe_route_step_object,
                        'completed_l'                 => '0',
                        'deleted_l'                   => '0',
                    ]);
                }
            }
        };

        $fe_route_object = FeRouteObject::where([['row_id_fe_route_object', $row_id_fe_route_object],['fe_route_id', $fe_route_id]])
            ->get()->toArray();
        if(empty($fe_route_object))
        {
            $id = FeRouteObject::insertGetId([
                'fe_route_id'            => $fe_route_id,
                'row_id_fe_route_object' => $row_id_fe_route_object,
                'completed_l'            => 0,
                'deleted_l'              => 0
            ]);
            $steps = FeRouteStep::with('beRoute', 'beRoute.controller', 'beRoute.controller.models')
                ->where('fe_route_id', $fe_route_id)->get()->toArray();
            foreach($steps as $key => $value)
            {
                $row_id_fe_route_step_object = null;
                //+++ ЗубановИА
                if($fe_route_object_models['table_code']==$value['be_route']['controller']['models']['table_code'])
                {
                    $row_id_fe_route_step_object = $row_id_fe_route_object;
                }
                //--- ЗубановИА
                elseif($value['create_fe_route_step_object_l'])
                {
//                    $model = 'App\Models\\' . $value['be_route']['controller']['models']['table_code'];
                    $model = "\\App" . $value['be_route']['controller']['models']['table_folder'] . "\\" . $value['be_route']['controller']['models']['table_code'];
                    $row_id_fe_route_step_object = $model::insertGetId([]);
                }
                if($value['line_n'] != 0)
                {
                    FeRouteStepObject::insert([
                        'fe_route_step_id'            => $value['id'],
                        'fe_route_object_id'          => $id,
                        'row_id_fe_route_step_object' => $row_id_fe_route_step_object,
                        'completed_l'                 => '0',
                        'deleted_l'                   => '0',
                    ]);
                }
            }
        }
        if($fe_route_object && $fe_route_object[0])
            $id = $fe_route_object[0]['id'];
        $routeObjects = FeRouteObject::with(['feRoutes', 'feRoutes.feRouteSteps', 'feRoutes.feRouteSteps.feRouteStepObject' => function($q) use
        (
            $id
        )
        {
            $q->where('fe_route_object_id', $id);
        }])
            ->where('fe_route_id', $fe_route_id)
            ->where('row_id_fe_route_object', $row_id_fe_route_object)->get()->toArray();


        $object_completed_l = $routeObjects[0]['completed_l'];
        $steps = [];
        $stepsRaw = $routeObjects[0]['fe_routes']['fe_route_steps'];
        //сортируем по line_n
        usort($stepsRaw, function($item1, $item2)
        {
            return $item1['line_n'] <=> $item2['line_n'];
        });
        if($stepsRaw[0]['line_n'] == 0)
        {
            $first_el = array_shift($stepsRaw);
            array_push($stepsRaw, $first_el);
        }
        foreach($stepsRaw as $key => $value)
        {
            $row_id_fe_route_step_object = null;
            $completed_l = 0;

            if($value['fe_route_step_object'])
            {
                $row_id_fe_route_step_object = $value['fe_route_step_object'][0]['row_id_fe_route_step_object'];
                $completed_l = $value['fe_route_step_object'][0]['completed_l'];
            }
            $fe_route_step_id = $value['id'];
            $line_n = $value['line_n'];
            $fe_route_step_code = $value['fe_route_step_code'];
            $fe_route_step_name = $value['fe_route_step_name'];
            $fe_route_step_title = $value['fe_route_step_title'];
            $fe_route_id = $value['fe_route_id'];
            array_push($steps, [
                "fe_route_step_id"            => $fe_route_step_id,
                "row_id_fe_route_step_object" => $row_id_fe_route_step_object,
                "completed_l"                 => $completed_l,
                "line_n"                      => $line_n,
                "fe_route_step_code"          => $fe_route_step_code,
                "fe_route_step_name"          => $fe_route_step_name,
                "fe_route_step_title"         => $fe_route_step_title,
                "fe_route_id"                =>$fe_route_id
            ]);


        }
        $resp = [
            "steps_config"           => [
                "allow_editing"           => true, // разрешить редактирование
                "close_in_order"          => true, //закрытие шагов по порядку
                "multiple_rollback"       => true, //откатывать состояние всех шагов до редактируемого включительно
                "allow_browsing"          => true, // переходить на шаг для заполнения (без закрытия шага)
                "use_modal_confirmation"  => true,
                "allow_editing_completed" => !$object_completed_l
            ],
            "completed_l"            => $object_completed_l,
            "row_id_fe_route_object" => $row_id_fe_route_object,
            "steps"                  => $steps,
            "translations"           => [
                'CloseStep'            => $getArrayCaptions['CloseStep']['translation_captions']['caption_translation'],
                'SendRequestForReview' => $getArrayCaptions['SendRequestForReview']['translation_captions']['caption_translation'],
                'Back'                 => $getArrayCaptions['back']['translation_captions']['caption_translation'],
                "Forward"              => $getArrayCaptions['Further']['translation_captions']['caption_translation'],
                "Step"                 => $getArrayCaptions['Step']['translation_captions']['caption_translation']
            ]
        ];

        return response()->json($resp);
    }
}
