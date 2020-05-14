<?php

namespace App\Http\Controllers\Api\TabSystem;

use App\Http\Classes\CheckController;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\SystemParameter;
use App\Models\SystemParameterValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class SystemParametersController extends Controller
{

    public function __construct()
    {
        $this->model = SystemParameter::class;
    }

    public function list(Request $request)
    {
        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'SystemDetails', 'Actual',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemParameters',
            'Value', 'Code', 'Name'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $parameters = SystemParameter::query()->orderBy("id", "asc")->get();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $parameters,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['SystemParameters']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
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
                                    'key'     => 'sys_par_name', 'sortable' => true, 'class' => 'image_code',
                                    'label'   => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => 'sys_par_value', 'sortable' => true, 'class' => 'image_code',
                                    'label'   => $getArrayCaptions['Value']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%', "zone" => "1", "order" => "3"
                                ],
                            ]
                        ]
                    ]
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
        ];

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
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemParameter',
            'Value', 'Code', 'Name', 'Remark'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $system_parameter_id = $request->id;
        if($request->id == "new")
        {
            $system_parameter = collect(SystemParameter::getNewObject());
            $value_block_field = [
                'title'       => $getArrayCaptions['Value']['translation_captions']['caption_translation'],
                'model_name'=>$controller->controller_alias,
                'model'       => 'sys_par_value', 'type' => 'label', 'width' => '50%',
                "placeholder" => "Доступно для изменения после сохранения",
                "zone"        => "1", "order" => "4"
            ];
            $checkbox_block_fields = [
                'title' => "Только допустимый набор значений",'model_name'=>$controller->controller_alias, 'model' => 'sys_par_use_allow_values_l',
                'type'  => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "3", "border_right" => false];
        }
        else
        {
            $system_parameter = SystemParameter::query()
                ->from("SystemParameters as systemparameters")
                ->where("id", $request->id)
                ->select("systemparameters.*", \DB::raw("systemparameters.sys_par_value as sys_par_allow_val_rem"))
                ->get()->first();

            $checkbox_block_fields = [
                'title' => $system_parameter->sys_par_use_allow_values_l ? "Допустимый набор значений" : "Введите значение",'model_name'=>$controller->controller_alias, 'model' => '',
                'type'  => 'title', 'width' => '50%', "zone" => "1", "order" => "3", "border_right" => false];

            if($system_parameter->sys_par_use_allow_values_l)
                $system_parameter_values = SystemParameterValue::query()
                    ->where("sys_par_id", $system_parameter->id)
                    ->get()->toArray();
            if($system_parameter->sys_par_use_allow_values_l)
            {
                $value_block_field = [
                    'title'        => $getArrayCaptions['Value']['translation_captions']['caption_translation'],
                    'model'        => 'sys_par_value', 'type' => 'lt-select', 'width' => '50%',
                    'model_name'=>$controller->controller_alias,
                    'options'      => [],
                    "options_data" => [
                        "options_data_model"  => "SystemParametersValues",
                        "options_field_id"    => "sys_par_allow_val_option",
                        "options_field_title" => "sys_par_allow_val_rem",
                        "search"              => ""
                    ],
                    "zone"         => "1", "order" => "4"
                ];
            }
            else
            {
                $value_block_field = [
                    'title'      => $getArrayCaptions['Value']['translation_captions']['caption_translation'],
                    'model_name'=>$controller->controller_alias,
                    'model'      => 'sys_par_value', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4",
                    "validation" => ["required" => true]
                ];
            }
        }



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
                            ['title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'sys_par_code', 'type' => 'text',
                             'width' => '50%', "zone" => "1", "order" => "1", "validation" => ["required" => true]],
                            $checkbox_block_fields,
                            ['title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'sys_par_name', 'type' => 'text',
                             'width' => '50%', "zone" => "1", "order" => "2"],
                            $value_block_field,
                            ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'sys_par_rem', 'type' => 'textarea',
                             'width' => '100%', "zone" => "1", "order" => "5", "validation" => ["required" => true]],
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
                $controller->controller_alias => [$system_parameter]
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['SystemParameter']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $system_parameter_id == "new" ? "Создание нового системного параметра" : $system_parameter['sys_par_code'],
                "form_type_list"                => [
                    "form_card_url"     => "/images/",
                    "form_search_field" => "image_name",
                ],
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "tabs"             => $tabs
        ];

        if($system_parameter_id !== "new" && $system_parameter->sys_par_use_allow_values_l)
        {
            $system_parameter_values = SystemParameterValue::query()
                ->where("sys_par_id", $system_parameter->id)
                ->get();

            $card["add_data_models"] = [
                "SystemParametersValues" => $system_parameter_values
            ];
            $card["links"] = [
                [
                    "link_title" => "Значения системного параметра", "link_url" => "/systemParametersValues",
                    "class"      => "btn btn-green", "link_type" => "internal_push", "img" => ""],
            ];
        }

        return response()->json($card);

    }
}
