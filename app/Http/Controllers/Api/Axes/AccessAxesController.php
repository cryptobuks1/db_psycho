<?php

namespace App\Http\Controllers\Api\Axes;

use App\Http\Classes\CheckController;
use App\Models\AccessAxesParameter;
use App\Models\AccessRowParameter;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\AccessAxis;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

class AccessAxesController extends Controller
{
    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Name', 'Code'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $accessAxes = AccessAxis::query()
            ->select('id', 'access_axis_name', 'access_axis_code')
            ->get();

        $list = [
            "main_data_models" => [
                'AccessAxes' => $accessAxes
            ],

            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => 'AccessAxes',
                "form_code" => 'AccessAxes',
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => 'AccessAxes',
                "form_sort_by" => 'created_at',
                "form_sort_desc" => true,
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/contractors_new/",
                    "form_search_field" => "contractor_short_name",
                ],
            ],

            "tabs" => [
                [
                    "tab_title" => 'TabTitle',
                    "blocks_quantity" => 1,
                    "blocks" => [

                        [
                            "block_title" => 'AccessAxes',
                            "block_zone_quantity" => 1,
                            "block_model" => "AccessAxes",
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                ['key' => 'actions', 'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],

                                ['key' => 'access_axis_name', 'sortable' => true,
                                    "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'thStyle' => 'width: 50%'],
                                ['key' => 'access_axis_code', 'sortable' => true,
                                    "label" => $getArrayCaptions['Code']['translation_captions']['caption_translation'], 'thStyle' => 'width: 50%'],
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
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'CreationDetails', 'Name', 'FeComponents', 'Actual', 'Code', 'new',
            'AccessAxe'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $modelTable_id = $request->id;

        $newObject = AccessAxesParameter::getNewObject();

        if ($modelTable_id == "new") {
            $listTable = [];
            $modelTable = AccessAxis::getNewObject();

        } else {
            $modelTable = AccessAxis::query()
                ->find($modelTable_id);
            $listTable = AccessAxesParameter::query()->where('access_axis_id', $modelTable_id)->get();
        }
        $newObject['access_axis_id'] = $modelTable['id'];

        $tabs = [
            [
                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model" => 'AccessAxes',
                        "block_type" => "block_card",
                        "block_fields" => [
                            [
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => 'AccessAxes',
                                'model' => 'access_axis_name', 'width' => '100%', 'type' => 'text',
                                'zone' => '1', 'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => 'AccessAxes',
                                'model' => 'access_axis_code', 'width' => '100%', 'type' => 'text',
                                'zone' => '1', 'order' => '2'
                            ]
                        ]
                    ],
                    [//Пока вручную
                        "block_title" => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model" => "AccessAxesParameters",
                        "block_type" => "block_list_base",
                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => $newObject,
                            "drag_and_drop" => true,
                            "hide_pagination" => true,
                            "hide_search" => true,
                        ],
                        "show_name" => false,
                        "block_fields" => [
                            [
                                'key' => 'actions',
                                'edit' => false,
                                "filter" => false,
                                "sortable" => false,
                                'thStyle' => 'width: 10%',
                            ],
                            [
                                'key' => 'line_n',
                                'edit' => false,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'label',
                                'typeVal' => 'number',
                                "label" => 'Порядок',
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],

                            ['key' => 'access_row_parameter_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => 'Параметр',
                                'thStyle' => 'width: 10%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "AccessRowParameters",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "parameter_name",
                                    "search"              => ""
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];

        $nameControllerMethod = [
            'controller'  => class_basename(\Route::current()->controller),
            'accessRight' => 'record'
        ];
        $parameters = (new CheckController($nameControllerMethod))->getShowFormParameters();

        if($parameters['show_system_tab'])
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
                        "block_model"         => 'AccessAxes',
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title'      => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model_name' => 'AccessAxes',
                                'model'      => 'created_at',
                                'type'       => 'label',
                                'width'      => '100%',
                                "zone"       => "1",
                                "order"      => "1"
                            ],
                            [
                                'title'      => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name' => 'AccessAxes',
                                'model'      => 'created_by',
                                'type'       => 'label',
                                'width'      => '100%',
                                "zone"       => "1",
                                "order"      => "2"
                            ],
                            [
                                'title'      => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name' => 'AccessAxes',
                                'model'      => 'updated_at',
                                'type'       => 'label',
                                'width'      => '100%',
                                "zone"       => "2",
                                "order"      => "1"
                            ],
                            [
                                'title'      => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name' => 'AccessAxes',
                                'model'      => 'updated_by',
                                'type'       => 'label',
                                'width'      => '100%',
                                "zone"       => "2",
                                "order"      => "2"
                            ],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $card = [

            "main_data_models" => [

                'AccessAxes' => [$modelTable],
                'AccessAxesParameters' => $listTable,

            ],

            "add_data_models" => [
                "AccessRowParameters" => AccessRowParameter::all(["id", "parameter_name"])
            ],

            "form_parameters" => [
                "form_title" => $getArrayCaptions['AccessAxe']['translation_captions']['caption_translation'],
                "form_code" => 'AccessAxes',
                "form_is_dependent" => false,
                "form_type" => "card",
                "form_sort_by" => 'line_n',
                "form_base_data_model" => 'AccessAxes',
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $modelTable->access_axis_name,
                "form_type_list" => [

                    "form_card_url" => "feСomponent",
                ],
            ],

            "sets" => $this->getButtonsList(["card_actions"]),

            "tabs" => $tabs
        ];

        return response()->json($card);
    }

    public function insert()
    {

    }

    public function update(Request $request)
    {

    }
}
