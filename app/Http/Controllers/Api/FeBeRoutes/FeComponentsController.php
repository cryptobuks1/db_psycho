<?php

namespace App\Http\Controllers\Api\FeBeRoutes;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\FeComponent;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;


class FeComponentsController extends Controller
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
            'DeletedL', 'Actual', 'FeComponents'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = FeComponent::query()
            ->select('id', 'fe_component_code', 'fe_component_name', 'deleted_l', 'actual_l')
            ->orderBy('fe_component_name')
            ->get();


        $list = [

            "main_data_models" => [

                $controller->controller_alias => $ModelTables,

            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['FeComponents']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line"        => true,
                "form_type_list"                => [

                    "form_card_url"     => "/fe/component/",
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
                                [
                                    'key'      => 'actions', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',
                                    "zone"     => "1",
                                    "order"    => "1"
                                ],
                                [
                                    'key'      => 'deleted_l',
                                    'sortable' => false,
                                    'class'    => 'deleted_l',
                                    'type'    => 'checkbox',
                                    'label'    => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "2"
                                ],
                                [
                                    'key'      => 'actual_l',
                                    'sortable' => false,
                                    'class'    => 'actual_l',
                                    'type'    => 'checkbox',
                                    'label'    => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'fe_component_code',
                                    'sortable' => true,
                                    'class'    => 'fe_component_code',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 39%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                                [
                                    'key'      => 'fe_component_name',
                                    'sortable' => true,
                                    'class'    => 'fe_component_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 39%',
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
            'CreationDetails','Name', 'FeComponents', 'Actual', 'Code', 'new'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if($modelTable_id == "new")
            $modelTable = FeComponent::getNewObject();
        else
            $modelTable = FeComponent::query()
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
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_component_name', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_component_code', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'actual_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '3'
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

                $controller->controller_alias => [$modelTable],

            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['FeComponents']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $modelTable->fe_component_code,
                "form_type_list"                => [

                    "form_card_url" => "fe/component",
                ],
            ],

            "sets" => $this->getButtonsList(["card_actions"]),

            "tabs" => $tabs
        ];

        return response()->json($card);


    }

    public function insert(){

    }

    public function update(Request $request)
    {
        $model = $request->Models[0];

        return FeComponent::where('id', $model['id'])->update([
            'id'              => $model['id'],
            'fe_component_code'         => $model['fe_component_code'],
            'fe_component_name'      => $model['fe_component_name'],
            'deleted_l'       => $model['deleted_l'],
            'created_at'      => $model['created_at'],
            'updated_at'      => $model['updated_at'],
            'created_by'      => (new ConsumerParameters())->consumerCode(),
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
        ]);
    }

}
