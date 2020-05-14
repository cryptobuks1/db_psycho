<?php

namespace App\Http\Controllers\Api\FeBeRoutes;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\FeRoute;
use App\Models\FeRouteUrl;
use App\Models\FeUrl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;


class FeRouteUrlsController extends Controller
{
    public function insert(){

    }

    public function update(Request $request)
    {
        $model = $request->Models[0];

        return FeRouteUrl::where('id', $model['id'])->update([
            'id'              => $model['id'],
            'fe_route_id'              => $model['fe_route_id'],
            'fe_url_id'              => $model['fe_url_id'],
            'fe_route_url_parameter'              => $model['fe_route_url_parameter'],
            'line_n'              => $model['line_n'],
            'use_card_l'              => $model['use_card_l'],
            'actual_l'              => $model['actual_l'],
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
            'Name', 'Code', 'ControllerNumber', 'LineNumber', 'FeRoutes', 'FeUrls',
            'DeletedL','Actual','FeUrl','Card','FeRouteUrls','New'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = FeRouteUrl::query()
            ->leftJoin('FeUrls as feUrl', 'feUrl.id', '=', 'FeRouteUrls.fe_url_id')
            ->leftJoin('FeRoutes as feRoute', 'feRoute.id', '=', 'FeRouteUrls.fe_route_id')
            ->select('FeRouteUrls.id','feUrl.fe_url_code',
                'FeRouteUrls.line_n', 'FeRouteUrls.use_card_l', 'FeRouteUrls.deleted_l', 'FeRouteUrls.actual_l', 'feRoute.fe_route_name')
            ->orderBy('id');

        if(!is_null($request["dependent"]))
        {
            $ModelTables->where("FeRouteUrls.fe_route_id", $request["dependent"]["id"]);
        }

        $ModelTables = $ModelTables->get()->toArray();

        $FeRoutes = FeRoute::query()
            ->where('deleted_l', '=', false)
            ->where('actual_l', '=', true)
            ->select('id', 'fe_route_name')
            ->get()->toArray();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $ModelTables,
            ],
            "add_data_models"  => [
                "FeRoutes"    =>  $FeRoutes,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['FeRouteUrls']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                'list_header_break_line'        => true,
                "form_type_list"                => [
                    "form_card_url"     => "/fe/route/url",
                    "form_search_field" => "",
                ],
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
                        "options_field_id_value"  => sizeof($FeRoutes) == 1 ? $FeRoutes['0']['id'] : '',
                        "options_field_title"     => 'fe_route_name',
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
                                    'class'    => 'deleted_l',
                                    'label'    => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "2"
                                ],
                                ['key'      => 'actual_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'actual_l',
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
                                    'key'      => 'fe_url_code',
                                    'sortable' => true,
                                    'class'    => 'fe_url',
                                    'label'    => $getArrayCaptions['FeUrl']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 60%',
                                    "zone"     => "1",
                                    "order"    => "5"
                                ],
                                ['key'      => 'use_card_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'use_card_l',
                                    'label'    => $getArrayCaptions['Card']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "6"
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
            'CreationDetails', 'FeRouteName', 'LineNumber',
            'FeRouteUrls','Actual','UseSteps', 'FeUrlName',
            'FeRouteUrlParameter', 'DeletedL','Card','FeRoute','new'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if ($modelTable_id == "new") {
            $modelTable = FeRouteUrl::getNewObject();
            $modelTable['fe_route_id'] = $request->owner_id;
        } else {
            $modelTable = FeRouteUrl::query()
                ->with([
                    'feUrl' => function ($query) {
                        $query->select('id', 'caption_code');
                    },
                    'feRoute' => function ($query) {
                        $query->select('id', 'fe_route_name');
                    }
                ])
                ->find($modelTable_id);
        }

        //$FeRoute = FeRoute::select('id', 'caption_code')->get()->toArray();
        $FeUrls = FeUrl::select('id', 'caption_code as fe_url_name')->get()->toArray();
        $FeRoute = FeRoute::select('id', 'fe_route_name')
            ->where('id', '=', $modelTable['fe_route_id'])->get()->first();

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
                                'title' => $getArrayCaptions['FeUrlName']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_id',
                                'width' => '100%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '1',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "FeUrls",
                                    "options_field_id" => "id",
                                    "options_field_title" => "fe_url_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['FeRouteUrlParameter']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_route_url_parameter', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'line_n', 'width' => '25%', 'type' => 'text',
                                'zone'  => '1', 'order' => '3'
                            ],
                            [
                                'title' => $getArrayCaptions['Card']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'use_card_l', 'width' => '25%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '4'
                            ],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'actual_l', 'width' => '25%', 'type' => 'checkbox',
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

        $res = [[ //Итоговый массив рекизитов
            'id' => $modelTable['id'],
            'fe_route_id' => $modelTable['fe_route_id'],
            'fe_route_name' => $modelTable['feRoute']['fe_route_name'] ?? null,
            'fe_url_id' => $modelTable['fe_url_id'],
            'fe_url_name' => $modelTable['feUrl']['caption_code'] ?? null,
            'fe_route_url_parameter' => $modelTable['fe_route_url_parameter'],
            'line_n' => $modelTable['line_n'],
            'use_card_l' => $modelTable['use_card_l'],
            'actual_l' => $modelTable['actual_l'],
            'deleted_l' => $modelTable['deleted_l'],
            'created_at' => $modelTable['created_at'] instanceof Carbon ? $modelTable['created_at']->toDateTimeString() : $modelTable['created_at'],
            'updated_at' => $modelTable['updated_at'] instanceof Carbon ? $modelTable['updated_at']->toDateTimeString() : $modelTable['updated_at'],
            'created_by' => (new ConsumerParameters())->consumerCode(),
            'updated_by' => (new ConsumerParameters())->consumerCode(),
        ]];

        $card = [
            "main_data_models" => [
                $controller->controller_alias => $res,
            ],
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['FeRouteUrls']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $modelTable['feRoute']['fe_route_name'],
                "form_type_list"                => [

                    "form_card_url" => "fe/route/url",
                ],
            ],
            "add_data_models"  => [
                "FeUrls"    => $FeUrls,
            ],
            "dependent" => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields" => [
                    "title" => $getArrayCaptions['FeRoute']['translation_captions']['caption_translation'],
                    "model" => "fe_route_id",
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_data_model"      => $controller->controller_alias,
                        "options_field_id"        => "fe_route_id",
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
}
