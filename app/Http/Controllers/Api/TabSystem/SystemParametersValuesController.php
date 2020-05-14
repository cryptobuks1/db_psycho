<?php

namespace App\Http\Controllers\Api\TabSystem;

use App\Http\Classes\CheckController;
use App\Models\SystemParameter;
use App\Models\SystemParameterValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class SystemParametersValuesController extends Controller
{
    public function list(Request $request)
    {
        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'SystemDetails', 'Actual',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemParametersValues',
            'Value', 'Code', 'Remark', 'SystemParameters'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        if(isset($request["dependent"]))
        {
            $parameters = SystemParameterValue::query()
                ->where("sys_par_id", $request["dependent"]["id"])
                ->orderBy("id", "asc")
                ->get();
            $system_parameters = SystemParameter::query()
                ->find($request["dependent"]["id"]);
        }
        else
        {
            $parameters = SystemParameterValue::query()->orderBy("id", "asc")->get();
            $system_parameters = SystemParameter::query()
                ->where("sys_par_use_allow_values_l", true)
                ->get();
        }

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $parameters,
            ],
            "add_data_models"  => [
                "SystemParameters" => $system_parameters
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['SystemParametersValues']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/images/",
                    "form_search_field" => "image_name",
                ],
            ],
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                [
                                    'key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"
                                ],
                                [
                                    'key'     => 'sys_par_code', 'sortable' => true, 'class' => 'image_name',
                                    'label'   => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 25%', "zone" => "1", "order" => "2"
                                ],
                                [
                                    'key'     => 'sys_par_allow_val_option', 'sortable' => true, 'class' => 'image_code',
                                    'label'   => $getArrayCaptions['Value']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => 'sys_par_allow_val_rem', 'sortable' => true, 'class' => 'image_code',
                                    'label'   => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%', "zone" => "1", "order" => "3"
                                ],
                            ]
                        ]
                    ]
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
        ];

        if(isset($request["dependent"]))
        {
            $list["dependent"] = [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     => [
                    "title"        => $getArrayCaptions['SystemParameters']['translation_captions']['caption_translation'],
                    "model"        => "sys_par_id",
                    "type"         => "label",
                    "current_value"         => $system_parameters->sys_par_code,
                    "options"      => [],
                    "options_data" => [
                        "options_data_model"     => "SystemParameters",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "sys_par_code",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ];
        }
        else
        {
            $list["dependent"] = [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     => [
                    "title"        => $getArrayCaptions['SystemParameters']['translation_captions']['caption_translation'],
                    "model"        => "sys_par_id",
                    "type"         => "select",
                    "options"      => [],
                    "options_data" => [
                        "options_data_model"     => "SystemParameters",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "sys_par_code",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ];
        }

        return response()->json($list);
    }

    public function card(Request $request)
    {
        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual',
            'CryptoAccounts', 'Code', 'Name', 'CryptoAccount', 'CryptoAccountHolder',
            'Images', 'Image', 'Format', 'Path', 'Category',
            'ImageName', 'ImageCode', 'ImageCategory',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemParametersValue',
            'Value', 'Type', 'Remark'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $system_parameter_value_id = $request->id;

        if($system_parameter_value_id == "new")
        {
            $system_parameter_value = SystemParameterValue::getNewObject();
            $system_parameter = SystemParameter::query()->find($request["dependent"]["id"]);

            $system_parameter_value["sys_par_code"] = $system_parameter->sys_par_code;
            $system_parameter_value["sys_par_id"] = $system_parameter->id;
        }
        else
        {
            $system_parameter_value = SystemParameterValue::query()
                ->find($system_parameter_value_id)->toArray();
        }

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

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
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['Value']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'sys_par_allow_val_option', 'type' => 'text',
                             'width' => '50%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['Type']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'sys_par_type', 'type' => 'text',
                             'width' => '50%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'sys_par_allow_val_rem', 'type' => 'textarea',
                             'width' => '100%', "zone" => "1", "order" => "1"],
                        ],
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
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
        }

        $card = [
            "main_data_models" => [
                $controller->controller_alias => [$system_parameter_value]
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['SystemParametersValue']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $system_parameter_value['sys_par_code'],
                "form_type_list"                => [
                    "form_card_url"     => "/images/",
                    "form_search_field" => "image_name",
                ],
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "tabs"             => $tabs
        ];

        return response()->json($card);

    }
}
