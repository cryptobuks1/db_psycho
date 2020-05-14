<?php

namespace App\Http\Controllers\Api\FeBeRoutes;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\FeRoute;
use App\Models\FeRouteUrl;
use App\Models\FeComponent;
use App\Models\BeRoute;
use App\Models\FeUrl;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Route;


class FeRoutesController extends Controller
{
    public function index()
    {
        $routes = [];
        $components = FeRoute::with('feComponent', 'beRoute', 'feRouteUrl', 'feRouteSteps', 'feRouteSteps.feUrl', 'feRouteUrl.feUrl', 'feRouteUrl.feUrl.controller.models')->get()->toArray();
//        array_push($routes, [
//            "path" => '/',
//            "component" => $value['fe_component']['fe_component_code'],
//            "name" => $value['caption_code'],
//            "meta" => [
//                "route" => $value['be_route']['be_route_code'],
//                "id_field" => $id_field,
//                "model" => $model_name,
//                "id_route" => $value['id'],
//
//            ]
//        ]);
        foreach ($components as $key => $value) {
            $path = '';
            $id_field = '';
            $model_name = '';
            $children = [];

            usort($value['fe_route_url'], function ($item1, $item2) {
                return $item1['line_n'] <=> $item2['line_n'];
            });
            foreach ($value['fe_route_url'] as $item => $obj) {
                // строим url
                if (strpos($obj['fe_url']['fe_url_code'], '*') === false) {
                    $path = $path . '/' . $obj['fe_url']['fe_url_code'];
                } else {
                    $path = $path . $obj['fe_url']['fe_url_code'];
                }

                //определяем, нужен ли динамический параметр в роуте
                if ($obj['use_card_l'] == 1) {
                    $path = $path . '/:' . $obj['fe_url']['fe_url_parameter'];
                }

                //проверяем есть ли приоритетный параметр (fe_route_url_parameter)
                if ($obj['fe_route_url_parameter'] == null) {

                    if ($item > 0 && $obj['use_card_l'] == 0) {
                        //если список не первого уровня - берем параметр предыдущего уровня
                        $id_field = $value['fe_route_url'][$item - 1]['fe_url']['fe_url_parameter'];
                    } else if ($obj['use_card_l'] != 0) {
                        $id_field = $obj['fe_url']['fe_url_parameter'];
                    }
                } else {
                    $id_field = $obj['fe_route_url_parameter'];
                }
                //достаем имя модели
                $model_name = $obj['fe_url']['controller']['models']['table_code'];

            }

            $controller_alias = end($value['fe_route_url'])['fe_url']['controller']['controller_alias'];
            $prev_controller_alias = null;
            $prev_id_field = null;
            if (count($value['fe_route_url']) >= 2) {
                // для последовательных роутов достаем предыдущий алиса контроллера для определения зависимостей
                $prev_controller_alias = $value['fe_route_url'][count($value['fe_route_url']) - 2]['fe_url']['controller']['controller_alias'];
                $prev_id_field = $value['fe_route_url'][count($value['fe_route_url']) - 2]['fe_url']['fe_url_parameter'];

            }


            if ($value['use_steps_l'] == 1) {

                usort($value['fe_route_steps'], function ($item1, $item2) {
                    return $item1['line_n'] <=> $item2['line_n'];
                });

                foreach ($value['fe_route_steps'] as $item => $obj) {

                    $step_path = $obj['fe_route_step_code']; // берем путь конкретного шага
                    $step_component = FeComponent::where('id', $obj['fe_component_id'])->value('fe_component_code');
                    $step_route = BeRoute::where('id', $obj['be_route_id'])->value('be_route_code');
                    $step_id_field = $id_field;
                    $fe_url_code = null;
                    if ($obj['fe_url']) {
                        $fe_url_code = $obj['fe_url']['fe_url_code'];
                    }

                    array_push($children, [
                        "path" => $step_path,
                        "component" => $step_component,
                        "meta" => [
                            "route" => $step_route,
                            "id_field" => $step_id_field,
                            'fe_url_code' => $fe_url_code,
                            "save_local_storage_l" => $obj['save_local_storage_l'],
                        ],
                    ]);


                }
//               $controller_alias = end($value['fe_route_url'])['fe_url']['controller']['controller_alias'];
            }

            array_push($routes, [
                "path" => $path,
                "component" => $value['fe_component']['fe_component_code'],
                "name" => $value['caption_code'],
                "children" => $children,
                "meta" => [
                    "route" => $value['be_route']['be_route_code'],
                    "id_field" => $id_field,
                    "model" => $model_name,
                    "controller_alias" => $controller_alias,
                    "prev_controller_alias" => $prev_controller_alias,
                    "save_local_storage_l" => $value['save_local_storage_l'],
                    "prev_id_field" => $prev_id_field,
                    "id_route" => $value['id'],
                    "fe_url_code" => $value['fe_route_url'][count(['fe_route_url']) - 1]['fe_url']['fe_url_code']
                ]
            ]);
        }

        return $routes;

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
            'Name', 'CaptionCode', 'ControllerNumber','Code',
            'UseSteps', 'DeletedL', 'Actual', 'FeComponent', 'FeRoutes'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = FeRoute::query()
            ->leftJoin('FeComponents as component', 'FeRoutes.fe_component_id', '=', 'component.id')
            ->select('FeRoutes.id', 'FeRoutes.use_steps_l', 'FeRoutes.fe_route_code', 'FeRoutes.fe_route_name', 'FeRoutes.deleted_l', 'FeRoutes.actual_l', 'component.fe_component_name as fe_component_name')
            ->orderBy('be_route_id')
            ->get();


        $list = [
            "main_data_models" => [

                $controller->controller_alias => $ModelTables,

            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['FeRoutes']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line"        => true,
                "form_type_list"                => [

                    "form_card_url"     => "/fe/route",
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
                                    'class'    => 'deleted_l',
                                    'label'    => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 10%',
                                    "zone"     => "1",
                                    "order"    => "2"
                                ],
                                ['key'      => 'actual_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'actual_l',
                                    'label'    => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 10%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'fe_route_code',
                                    'sortable' => true,
                                    'class'    => 'fe_route_code',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 26%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                                [
                                    'key'      => 'fe_route_name',
                                    'sortable' => true,
                                    'class'    => 'fe_route_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 26%',
                                    "zone"     => "1",
                                    "order"    => "5"
                                ],
                                [
                                    'key'      => 'fe_component_name',
                                    'sortable' => true,
                                    'class'    => 'fe_component',
                                    'label'    => $getArrayCaptions['FeComponent']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 19%',
                                    "zone"     => "1",
                                    "order"    => "6"
                                ],
                                [
                                    'key'      => 'use_steps_l',
                                    'sortable' => true,
                                    'class'    => 'use_steps_l',
                                    'label'    => $getArrayCaptions['UseSteps']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 10%',
                                    "zone"     => "1",
                                    "order"    => "7"
                                ]
                            ]
                        ]
                    ]
                ]
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
            'CreationDetails','DeletedL', 'FeRouteUrls',
            'Name', 'Code', 'FeComponent', 'BeRoute', 'UseSteps', 'Caption', 'Parent', 'HasChildren', 'Actual', 'new', 'FeRoute'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;

        if($modelTable_id == "new") {
            $modelTable = FeRoute::getNewObject();

            $countFeRouteUrl = null;
        }
        else {
            $modelTable = FeRoute::query()
                ->with(['feRouteUrl' => function($query){
                    return $query->select('id', 'fe_route_id', 'fe_url_id');
                }])
                ->leftJoin('FeComponents as component', 'FeRoutes.fe_component_id', '=', 'component.id')
                ->leftJoin('BeRoutes as beRoute', 'FeRoutes.be_route_id', '=', 'beRoute.id')
                ->leftJoin('FeRoutes as parent', 'FeRoutes.parent_id', '=', 'parent.id')
                ->select('FeRoutes.*', 'component.fe_component_name', 'beRoute.be_route_name', 'parent.fe_route_name as parent_name', 'parent.id as parent_id')
                ->find($modelTable_id);

            $countFeRouteUrl = $modelTable->feRouteUrl->count();
        }


        $FeComponent = FeComponent::select('id', 'fe_component_name')
            ->get()->toArray();

        $BeRoute = BeRoute::select('id', 'be_route_name')
            ->get()->toArray();

        $Parent = FeRoute::select('id', 'fe_route_name as parent_name')->where('id', '<>', $modelTable['id'])
            ->get()->toArray();

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

//        $res = [[
//            'id',
//            'fe_route_name' => $modelTable['fe_route_name'],
//            'fe_route_code' => $modelTable['fe_route_code'],
//            'fe_component_id' => $modelTable['fe_component_id'],
//            'fe_component_name' => $modelTable['fe_component_name'],
//            'be_route_id' => $modelTable['be_route_id'],
//            'be_route_name' => $modelTable['be_route_name'],
//            'parent_id' => $modelTable['parent_id'],
//            'parent_name' => $modelTable['fe_route_name'],
//            'use_steps_l' => $modelTable['use_steps_l'],
//            'caption_code' => $modelTable['caption_code'],
//            'has_children' => $modelTable['has_children'],
//            'actual_l' => $modelTable['actual_l'],
//        ]];

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
                                'model' => 'fe_route_name', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_route_code', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['FeComponent']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_component_id',
                                'width' => '33%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '3',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "FeComponent",
                                    "options_field_id" => "id",
                                    "options_field_title" => "fe_component_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['BeRoute']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'be_route_id',
                                'width' => '33%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '4',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "BeRoute",
                                    "options_field_id" => "id",
                                    "options_field_title" => "be_route_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['UseSteps']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'use_steps_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '5'
                            ],
                            [
                                'title' => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'caption_code', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '6'
                            ],
                            [
                                'title' => $getArrayCaptions['Parent']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'parent_id',
                                'width' => '33%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '7',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Parent",
                                    "options_field_id" => "id",
                                    "options_field_title" => "parent_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['HasChildren']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'has_children', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '8'
                            ],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'actual_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '9'
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

        $res = [[ //Итоговый массив рекизитов
            'id'                    => $modelTable['id'],
            'fe_route_name'         => $modelTable['fe_route_name'],
            'fe_route_code'         => $modelTable['fe_route_code'],
            'fe_component_id'       => $modelTable['fe_component_id'],
            'fe_component_name'     => $modelTable['fe_component_name'] ?? '',
            'be_route_id'           => $modelTable['be_route_id'],
            'be_route_name'         => $modelTable['be_route_name'] ?? '',
            'parent_id'             => $modelTable['parent_id'],
            'parent_name'           => $modelTable['parent_name'] ?? '',
            'use_steps_l'           => $modelTable['use_steps_l'],
            'caption_code'          => $modelTable['caption_code'],
            'has_children'          => $modelTable['has_children'],
            'actual_l'              => $modelTable['actual_l'],
            'created_by'            => $modelTable['created_by'],
            'updated_by'            => $modelTable['updated_by'],
            'created_at'            => $modelTable['created_at'] instanceof Carbon ? $modelTable['created_at']->toDateTimeString() : $modelTable['created_at'],
            'updated_at'            => $modelTable['updated_at'] instanceof Carbon ? $modelTable['updated_at']->toDateTimeString() : $modelTable['updated_at'],
        ]];

        $card = [
            "main_data_models" => [
                $controller->controller_alias => $res,
            ],
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['FeRoute']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] :  $modelTable['fe_route_name'],
                "form_type_list"                => [

                    "form_card_url" => "fe/url",
                ],
            ],
            "links" => [
                [
                     "link_title" =>$getArrayCaptions['FeRouteUrls']['translation_captions']['caption_translation'].' '.'('.  '  '.$countFeRouteUrl.' '. ')',
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/feRouteUrls"
                ],
            ],
            "add_data_models"  => [
                "FeComponent"   => $FeComponent,
                "BeRoute"       => $BeRoute,
                "Parent"        => $Parent,
            ],
            "sets" => $this->getButtonsList(["card_actions"]),
            "tabs" => $tabs
        ];

        return response()->json($card);

    }

    public function update(Request $request)
    {
        $model = $request->Controllers[0];

        return \App\Models\Controller::where('id', $model['id'])->update([
            'id' => $model['id'],
            'fe_component_id' => $model['fe_component_id'],
            'be_route_id' => $model['be_route_id'],
            'caption_code' => $model['caption_code'],
            'parent_id' => $model['parent_id'],
            'has_children' => $model['has_children'],
            'use_steps_l' => $model['use_steps_l'],
            'deleted_l' => $model['deleted_l'],
             'created_by' => (new ConsumerParameters())->consumerCode(),
            'updated_by' => (new ConsumerParameters())->consumerCode(),
            'created_at' => $model['created_at'],
            'updated_at' => $model['updated_at'],
        ]);
    }

    public function getBreadcrumbs(Request $request)
    {

        $fe_route_id = $request->fe_route_id;
        $RouteUrls = FeRouteUrl::with('feUrl', 'feUrl.controller', 'feUrl.controller.models')->where('fe_route_id', $fe_route_id)->orderBy('line_n')->get()->toArray();
        $path = '';
        $breadcrumbs = [];
        $homeCaption = FeUrl::select('caption_code')->where('fe_url_code', null)->get()->toArray()[0]['caption_code'];
        $getCaption = $this->getTranslateByKeys(['Main']);
//        array_push($breadcrumbs, ['to' => '/', 'text' => $getCaption[$homeCaption]['translation_captions']['caption_translation']]); todo Заменить на caption
        array_push($breadcrumbs, ['to' => '/', 'text' => $getCaption['Main']['translation_captions']['caption_translation']]);
        foreach ($RouteUrls as $key => $value) {
            if(strlen($value['fe_url']['fe_url_code']) === 0) return $breadcrumbs;
            $path = $path . '/' . $value['fe_url']['fe_url_code'];
            $caption = $value['fe_url']['caption_code'];
            if (!$caption) {
                return [];
            }
            $getCaption = $this->getTranslateByKeys([$caption]);
            array_push($breadcrumbs, ['to' => $path, 'text' => $getCaption[$caption]['translation_captions']['caption_translation']]);

            if ($value['use_card_l'] == 1) {

                $path = $path . '/' . $request->params[$value['fe_url']['fe_url_parameter']];

                $field_name = $value['fe_url']['controller']['models']['table_output_template'];
                $table = 'App' . $value['fe_url']['controller']['models']['table_folder'] . '\\' . $value['fe_url']['controller']['models']['table_code'];
                if ($request->params[$value['fe_url']['fe_url_parameter']] === 'new') {
                    $dynamic_name = 'Новый'; // todo Заменить на Caption
                } else {
                    $dynamic_name = $table::where('id', $request->params[$value['fe_url']['fe_url_parameter']])->value($field_name);
                }

                array_push($breadcrumbs, ['to' => $path, 'text' => $dynamic_name]);
            }

        }


        return $breadcrumbs;
//
//        $path = '';
//        $id_field = '';
//        $model_name='';
//        usort($value['fe_route_url'], function ($item1, $item2) {
//            return $item1['line_n'] <=> $item2['line_n'];
//        });
//
//        foreach ($value['fe_route_url'] as $item => $obj) {
//
//            // строим url
//            $path = $path.'/' . $obj['fe_url']['fe_url_code'];
//
//            //определяем, нужен ли динамический параметр в роуте
//            if ($obj['use_card_l'] == 1) {
//                $path = $path .'/:'. $obj['fe_url']['fe_url_parameter'];
//            }
//
//            //проверяем есть ли приоритетный параметр (fe_route_url_parameter)
//            if($obj['fe_route_url_parameter']== null){
//
//                if($item > 0 && $obj['use_card_l'] == 0){
//                    //если список не первого уровня - берем параметр предыдущего уровня
//                    $id_field = $value['fe_route_url'][$item - 1]['fe_url']['fe_url_parameter'];
//                }
//                else if($obj['use_card_l'] != 0){
//                    $id_field=$obj['fe_url']['fe_url_parameter'];
//                }
//            }
//
//            else{
//                $id_field=$obj['fe_route_url_parameter'];
//            }
//
//            //достаем имя модели
//            $model_name = $obj['fe_url']['controller']['models']['table_code'];
//
//        }
    }


}
