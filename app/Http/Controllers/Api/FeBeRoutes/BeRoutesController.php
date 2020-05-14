<?php

namespace App\Http\Controllers\Api\FeBeRoutes;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\ActionType;
use App\Models\BeRoute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;


class BeRoutesController extends Controller
{
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
            'DeletedL', 'Actual', 'Controller', 'ActionType', 'BeRoutes'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = BeRoute::query()
            ->leftJoin('__Controllers as controller', 'BeRoutes.controller_id', '=', 'controller.id')
            ->leftJoin('__ActionTypes as actionType', 'BeRoutes.action_type_id', '=', 'actionType.id')
            ->select('BeRoutes.id', 'be_route_code', 'be_route_name', 'deleted_l', 'actual_l', 'controller.controller_name', 'actionType.action_type_name')
            ->orderBy('be_route_name')
            ->get()->toArray();


        $list = [

            "main_data_models" => [
                $controller->controller_alias => $ModelTables,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['BeRoutes']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line"        => true,
                "form_type_list"                => [
                    "form_card_url"     => "/be/route/",
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
                                [
                                    'key'      => 'actions',
                                    'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',
                                    "zone"     => "1",
                                    "order"    => "1"
                                ],
                                [
                                    'key'      => 'deleted_l',
                                    'type'     => 'checkbox',
                                    'label'    => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                    'sortable' => false,
                                    'class'    => 'deleted_l',
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "2"
                                ],
                                [
                                    'key'      => 'actual_l',
                                    'type'    => 'checkbox',
                                    'label'    => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'sortable' => false,
                                    'class'    => 'actual_l',
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'controller_name',
                                    'sortable' => true,
                                    'class'    => 'controller_name',
                                    'label'    => $getArrayCaptions['Controller']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 19%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                                [
                                    'key'      => 'action_type_name',
                                    'sortable' => true,
                                    'class'    => 'action_type_name',
                                    'label'    => $getArrayCaptions['ActionType']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 19%',
                                    "zone"     => "1",
                                    "order"    => "5"
                                ],
                                [
                                    'key'      => 'be_route_code',
                                    'sortable' => true,
                                    'class'    => 'be_route_code',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "6"
                                ],
                                [
                                    'key'      => 'be_route_name',
                                    'sortable' => true,
                                    'class'    => 'be_route_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 19%',
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
            'CreatedBy', 'UpdatedAt', 'UpdatedBy','BeRoute',
            'CreationDetails','Code', 'Name','Path','MenuItemParent','Actual','ActionTypes','Controller', 'new'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if($modelTable_id == "new") {
            $modelTable = BeRoute::getNewObject();
        }
        else {
            $modelTable = BeRoute::query()
                ->with([
                    'actionType' => function ($query) {
                        $query->select('id', 'action_type_name');
                    },

                    'controller' => function ($query) {
                        $query->select('id', 'controller_name');
                    },
                ])
                ->find($modelTable_id);
        }

        $ActionTypes = ActionType::select('id', 'action_type_name')
            ->get()->toArray();

        $Controllers = \App\Models\Controller::select('id', 'controller_name')
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
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'be_route_name', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Controller']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'controller_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '3',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Controllers",
                                    "options_field_id" => "id",
                                    "options_field_title" => "controller_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'be_route_code', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['ActionTypes']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'action_type_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '4',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "ActionTypes",
                                    "options_field_id" => "id",
                                    "options_field_title" => "action_type_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['Path']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'be_route_path', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '5'
                            ],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'actual_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '6'
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
                                'model_name' => $controller->controller_alias, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "3"
                            ],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "4"
                            ],
                        ]
                    ]
                ]
            ];
        }

        $res = [[ //Итоговый массив рекизитов
            'id' => $modelTable['id'],
            'controller_id' => $modelTable['controller_id'],
            'controller_name' => $modelTable['controller']['controller_name'] ?? null,
            'action_type_name' => $modelTable['actionType']['action_type_name'] ?? null,
            'action_type_id' => $modelTable['action_type_id'],
            'be_route_code' => $modelTable['be_route_code'],
            'be_route_path' => $modelTable['be_route_path'],
            'be_route_name' => $modelTable['be_route_name'],
            'actual_l' => $modelTable['actual_l'],
            'deleted_l' => $modelTable['deleted_l'],
            'created_at' => $modelTable['created_at'] instanceof Carbon ? $modelTable['created_at']->toDateTimeString() : $modelTable['created_at'],
            'updated_at' => $modelTable['updated_at'] instanceof Carbon ? $modelTable['updated_at']->toDateTimeString() : $modelTable['updated_at'],
            'created_by'      => (new ConsumerParameters())->consumerCode(),
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
        ]];

        $card = [

            "main_data_models" => [

                $controller->controller_alias => $res,

            ],

            "add_data_models"  => [
                "ActionTypes"    => $ActionTypes,
                "Controllers"    => $Controllers,
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['BeRoute']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $modelTable->be_route_code,
                "form_type_list"                => [

                    "form_card_url" => "/be/route",
                ],
            ],

            "sets" => $this->getButtonsList(["card_actions"]),

            "tabs" => $tabs
        ];

        return response()->json($card);
    }

    public function update(Request $request)
    {

        $model = $request->Models[0];

        return BeRoute::where('id', $model['id'])->update([
            'id'              => $model['id'],
            'controller_id'         => $model['controller_id'],
            'action_type_id'      => $model['action_type_id'],
            'be_route_code'      => $model['be_route_code'],
            'be_route_path'   => $model['be_route_path'],
            'be_route_name' => $model['be_route_name'],
            'deleted_l' => $model['deleted_l'],
            'created_at'      => $model['created_at'],
            'updated_at'      => $model['updated_at'],
            'created_by'      => (new ConsumerParameters())->consumerCode(),
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
        ]);
    }

    public function insert(){

    }
}
