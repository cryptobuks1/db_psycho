<?php

namespace App\Http\Controllers\Api\TabONE;

use App\Http\Classes\CheckController;
use App\Models\ActionType;
use App\Models\ONE\OneAdditionalDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class OneAdditionalDetailsController extends Controller
{
    //+++03.04.2019 Miniyar

    public function insert() {

    }

    public function update() {

    }

    /*public function delete(){

    }*/

    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'OneAddDetailName', 'OneAdditionalDetails', 'DeletedL'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = OneAdditionalDetail::get()->toArray();



        $list = [

            "main_data_models" => [
                $controller->controller_alias => $ModelTables,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['OneAdditionalDetails']['translation_captions']['caption_translation'],
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
                                    'key'      => 'one_add_detail_name',
                                    'label'    => $getArrayCaptions['OneAddDetailName']['translation_captions']['caption_translation'],
                                    'sortable' => true,
                                    'class'    => 'one_add_detail_name',
                                    'thStyle'  => 'width: 80%',
                                    "zone"     => "1",
                                    "order"    => "3"
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
            'CreatedBy', 'UpdatedAt', 'UpdatedBy','OneAddDetailName', 'OneAdditionalDetail', 'new'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;

        if($modelTable_id == "new") {
            $modelTable = OneAdditionalDetail::getNewObject();
        }
        else {
            $modelTable = OneAdditionalDetail::where('id', $modelTable_id)->get()->toArray();
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
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title' => $getArrayCaptions['OneAddDetailName']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'one_add_detail_name', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
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

        $card = [
            "main_data_models" => [

                $controller->controller_alias => $modelTable,

            ],
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['OneAdditionalDetail']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $modelTable[0]['one_add_detail_name'],
                "form_type_list"                => [

                    "form_card_url" => "/be/route",
                ],
            ],
            "links" => [[
                "link_title" => "Настройки параметра",
                "link_img" => "",
                "link_type" => "internal_push",
                "link_url" => "/extensionOneAdditionalDetails"
            ],],
            "sets" => $this->getButtonsList(["card_actions"]),
            "tabs" => $tabs
        ];

        return response()->json($card);
    }

    //---03.04.2019 Miniyar
}
