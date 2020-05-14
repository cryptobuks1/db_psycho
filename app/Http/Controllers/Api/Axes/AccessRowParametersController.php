<?php

namespace App\Http\Controllers\Api\Axes;

use App\Http\Classes\CheckController;
use App\Models\AccessRowParameter;
use App\Models\ModelTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class AccessRowParametersController extends Controller
{
    public function list(Request $request)
    {
        $captionName = ['Main', 'Name', 'Controller'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->select('controller_alias')
            ->first();

        $parameters = AccessRowParameter::query()
            ->select(["id", "table_n", "table_field_name", "parameter_name"])
            ->with(["model:table_n,table_name"])
            ->get();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $parameters
            ],

            "sets"            => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title"                    => "AccessRowParameters",
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_sort_by"                  => 'created_at',
                "form_sort_desc"                => true,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/access_row_parameter_new/",
                    "form_search_field" => "parameter_name",
                ],
            ],

            "tabs" => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_title"         => "AccessRowParameters",
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                ['key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
                                 'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"],

                                ['key'   => "['model']['table_name']", 'sortable' => true, 'class' => "",
                                 "label" => "Model", 'thStyle' => 'width: 30%', "zone" => "1", "order" => "1"],

                                ['key'   => 'table_field_name', 'sortable' => true, 'class' => '',
                                 "label" => "table_field_name", 'thStyle' => 'width: 30%', "zone" => "1", "order" => "2"],

                                ['key'   => 'parameter_name', 'sortable' => true, 'class' => '',
                                 "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'thStyle' => 'width: 30%', "zone" => "1", "order" => "3"],
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
        $captionName = ['Main', 'Name', 'Controller', 'SystemDetails',
                        'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $parameter_id = $request->id;

        if($parameter_id === "new")
        {
            $nameControllerMethod = [
                'controller' => class_basename(\Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }

            $parameter = AccessRowParameter::getNewObject();
        }
        else
        {
            $parameter = AccessRowParameter::query()
                ->where("id", $parameter_id)
                ->first()->toArray();
        }

        $models = ModelTables::query()
            ->select(["id", "table_name"])
            ->get();

        $controller = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->select('controller_alias')
            ->first();

        $nameControllerMethod = [
            'controller'  => class_basename(\Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_description" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in venenatis sem. Nulla pulvinar,<br> diam quis feugiat fringilla, ligula metus consequat diam, id vulputate magna turpis sit amet feli',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "title",
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title'           => "Model",
                                'model'           => 'table_n',
                                'model_name'      => $controller->controller_alias,
                                'type'            => 'vue-select',
                                'width'           => '100%',
                                "grid_column"     => "4/8",
                                "grid_row"        => '2',
                                "grid_row_tablet" => "1",
                                'options'         => [],
                                "options_data"    => [
                                    "options_data_model"  => "ModelTables",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "table_name",
                                    "search"              => ""
                                ],
                                "zone"            => "1",
                                "order"           => "1",

                                "border_right" => false

                            ],

                            ['title' => "table_field_name", 'model_name' => $controller->controller_alias, 'model' => 'table_field_name',
                             'type'  => 'text', 'width' => '33%', "grid_column" => "8/9", "zone" => "1", "order" => "2", "border_right" => false],

                            ['title' => "parameter_code",
                             'width' => '33%', 'model_name' => $controller->controller_alias, 'model' => 'parameter_code', 'type' => 'text', "grid_column" => "9/12", "zone" => "1", "order" => "3", "border_right" => false],

                            ['title' => "parameter_name",
                             'width' => '33%', 'model_name' => $controller->controller_alias, 'model' => 'parameter_name', 'type' => 'text', "grid_column" => "12/16", "zone" => "1", "order" => "4", "border_right" => false],

                        ]
                    ],
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
                        "block_title"         => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', "model_name" => $controller->controller_alias, 'type' => 'label', 'width' => '100%', "grid_column" => "1/8", "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', "model_name" => $controller->controller_alias, 'type' => 'label', 'width' => '100%', "grid_column" => "half/15", "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', "model_name" => $controller->controller_alias, 'type' => 'label', 'width' => '100%', "grid_column" => "1/8", "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', "model_name" => $controller->controller_alias, 'type' => 'label', 'width' => '100%', "grid_column" => "half/15", "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }
        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
                //                $controller->controller_alias => $ColumnContractor
                $controller->controller_alias => [$parameter]
            ],

            "add_data_models" => [
                //                "DBAreas" => $dbarea,
                "ModelTables" => $models,
            ],

            "form_parameters" => [
                "form_title"                    => "AccessRowParameter",
                "form_code"                     => $controller->controller_alias,
                "disable_inputs"                => $formShowParam['read_only'],
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "use_grid_layout"               => false,
                "form_main_data_model_id_field" => "id",
                //                "form_main_data_model_name" => $ColumnContractor[0]['contractor_short_name'],
                "form_main_data_model_name"     => $parameter['parameter_name'],
                "form_type_list"                => [
                    "form_card_url"     => "/access_row_parameter_new/",
                    "form_search_field" => "parameter_name",
                ],
            ],


            "tabs" => $tabs
        ];

        return response()->json($card);
    }
}
