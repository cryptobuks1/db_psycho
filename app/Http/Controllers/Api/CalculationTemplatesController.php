<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Models\CalculationTemplate;
use App\Models\CalculationTemplateParameterSetting;
use App\Models\Caption;
use App\Models\ExtensionOneAdditionalDetail;
use App\Models\FeRoute;
use App\Models\Help;
use App\Models\MenuItem;
use App\Models\Partner;
use App\Models\UserInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class CalculationTemplatesController extends Controller
{
    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'CalculationTemplates', 'DeletedL', 'Name', 'Code', 'Actual'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = CalculationTemplate::get()->toArray();

        $list = [

            "main_data_models" => [
                $controller->controller_alias => $ModelTables,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['CalculationTemplates']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line"        => true,
                "form_type_list"                => [
                    "form_card_url"     => "/one/additional/details/",
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
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                [
                                    'key'      => 'actions',
                                    'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 10%',
                                    "zone"     => "1",
                                    "order"    => "1"
                                ],
                                [
                                    'key'      => 'deleted_l',
                                    'type'     => 'checkbox',
                                    'label'    => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                    'sortable' => false,
                                    'class'    => 'deleted_l',
                                    'thStyle'  => 'width: 10%',
                                    "zone"     => "1",
                                    "order"    => "2"
                                ],
                                [
                                    'key'      => 'actual_l',
                                    'type'     => 'checkbox',
                                    'label'    => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'sortable' => false,
                                    'class'    => 'actual_l',
                                    'thStyle'  => 'width: 10%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'calculation_template_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'sortable' => true,
                                    'class'    => 'calculation_template_code',
                                    'thStyle'  => 'width: 35%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                                [
                                    'key'      => 'calculation_template_code',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'sortable' => true,
                                    'class'    => 'calculation_template_name',
                                    'thStyle'  => 'width: 35%',
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
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy','Name', 'Code', 'Actual', 'new',
            'CalculationTemplate', 'ExtensionOneAdditionalDetail', 'LessOrEqual','MoreOrEqual',
            'CalculationTemplateParameterSettings', 'AllowEditing', 'DefaultValue', 'RequiredL', 'Actions'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;

        if($modelTable_id == "new") {
            $modelTable = [CalculationTemplate::getNewObject()];
        }
        else {
            $modelTable = CalculationTemplate::where('id', $modelTable_id)->get()->toArray();
        }

        $CalculationTemplateParameterSettingsModel = CalculationTemplateParameterSetting::where('db_area_id', $modelTable[0]['db_area_id'])
        ->where('calculation_template_id', $modelTable[0]['id'])->get()->toArray();

        $ExtensionOneAdditionalDetailsModel = ExtensionOneAdditionalDetail::where('ExtensionOneAdditionalDetails.db_area_id', $modelTable[0]['db_area_id'])->leftJoin('OneAdditionalDetail as OneAD', 'OneAD.id', '=', 'ExtensionOneAdditionalDetails.one_add_detail_id')
            ->select('ExtensionOneAdditionalDetails.id', 'OneAD.one_add_detail_name')->get()->toArray();

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];

        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $newCalculationTempParSet = CalculationTemplateParameterSetting::getNewObject();
        $newCalculationTempParSet['calculation_template_id'] = $modelTable[0]['id'];

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
                                'model' => 'calculation_template_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone'  => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'calculation_template_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone'  => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'actual_l',
                                'width' => '25%',
                                'type' => 'checkbox',
                                'zone'  => '1',
                                'order' => '3'
                            ],
                        ]
                    ],
                    [
                        "block_title" => $getArrayCaptions['CalculationTemplateParameterSettings']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 1,
                        "block_model" => "CalculationTemplateParameterSettings",
                        "block_type" => "block_list_base",
                        "list_width" =>"100%",
                        "block_parameters"=>[
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => $newCalculationTempParSet,
                            "drag_and_drop" => true,
                            "list_header_break_line" => true,
                            "hide_search"        => true,
                            "hide_pagination"    => true,
                        ],
                        "show_name" => true,
                        "block_fields" => [
                            [
                                'key' => 'line_n',
                                'edit' => false,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'label',
                                'typeVal' => 'integer',
                                "label" => '№',//$getArrayCaptions['Number']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 5%',
                                "zone" => "1",
                                "order" => "1"
                            ],
                            [
                                'key' => 'extension_one_additional_detail_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => false,
                                'type' => 'select',
                                "label" => $getArrayCaptions['ExtensionOneAdditionalDetail']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 26%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "ExtensionOneAdditionalDetails",
                                    "options_field_id" => "id",
                                    "options_field_title" => "one_add_detail_name",
                                    "search" => ""
                                ],
                                "zone" => "1",
                                "order" => "1"
                            ],
                            [
                                'key' => 'number_more',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => false,
                                'type' => 'text',
                                'typeVal' => 'integer',
                                'class' => '',
                                "label" => $getArrayCaptions['MoreOrEqual']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 10%',
                                "zone" => "1",
                                "order" => "2"
                            ],
                            [
                                'key' => 'number_less',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => false,
                                'type' => 'text',
                                'typeVal' => 'integer',
                                'class' => '',
                                "label" => $getArrayCaptions['LessOrEqual']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 10%',
                                "zone" => "1",
                                "order" => "3"
                            ],
                            [
                                'key' => 'default_value',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => false,
                                'type' => 'text',
                                'typeVal' => 'string',
                                'class' => '',
                                "label" => $getArrayCaptions['DefaultValue']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 10%',
                                "zone" => "1",
                                "order" => "3"
                            ],
                            [
                                'key' => 'edit_l',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => false,
                                'type' => 'checkbox',
                                'typeVal' => 'boolean',
                                'class' => '',
                                "label" => $getArrayCaptions['AllowEditing']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 11%',
                                "zone" => "1",
                                "order" => "5"
                            ],
                            [
                                'key' => 'required_l',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => false,
                                'type' => 'checkbox',
                                'typeVal' => 'boolean',
                                'class' => '',
                                "label" => $getArrayCaptions['RequiredL']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 10%',
                                "zone" => "1",
                                "order" => "6"
                            ],
                            [
                                'key' => 'actual_l',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => false,
                                'type' => 'checkbox',
                                'typeVal' => 'boolean',
                                'class' => '',
                                "label" => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 9%',
                                "zone" => "1",
                                "order" => "7"
                            ],
                            [
                                'key' => 'edit_table_actions',
                                'actions' => ['edit','delete'],
                                "label" => $getArrayCaptions['Actions']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 9%',
                                'order' => '8',
                            ]
                        ]
                    ],
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

        $card = [
            "main_data_models" => [
                $controller->controller_alias => $modelTable,
                'CalculationTemplateParameterSettings' => $CalculationTemplateParameterSettingsModel,
            ],
            "add_data_models" => [
                'ExtensionOneAdditionalDetails' => $ExtensionOneAdditionalDetailsModel,
            ],
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['CalculationTemplate']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $modelTable[0]['calculation_template_name'],
                "form_type_list"                => [

                    "form_card_url" => "/be/route",
                ],
            ],
            "sets" => $this->getButtonsList(["card_actions"]),
            "tabs" => $tabs
        ];

        return response()->json($card);
    }
}
