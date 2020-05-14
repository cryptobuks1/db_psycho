<?php

namespace App\Http\Controllers\Api\TabSystem;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\Currency;
use App\Models\ModelTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;


class ModelsController extends Controller
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
            'ModelTables', 'Regions',
            'Name', 'NumericCode',
            'CountryCode2Short',
            'CountryCode3Short'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = ModelTables::query()
            ->select('id', 'table_n', 'table_code', 'table_name')
            ->orderBy('table_name')
            ->get();


        $list = [

            "main_data_models" => [

                $controller->controller_alias => $ModelTables,

            ],
            "form_parameters"  => [
//                "form_title"                    => $getArrayCaptions['ModelTables']['translation_captions']['caption_translation'],
                "form_title"                    => 'ModelTables',
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "/model/",
                    "form_search_field" => "table_name",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
//            "links"            => [
//
//                ["link_title" => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
//                    "link_url"   => "/regions",
//                    "class"      => "link btn btn-link",
//                    "link_type"  => "internal",
//                    "img"        => ""
//                ],
//            ],
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
                                [
                                    'key'      => 'table_n',
                                    'sortable' => true,
                                    'class'    => 'table_n',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 31%',
                                    "zone"     => "1",
                                    "order"    => "2"


                                ],
                                [
                                    'key'      => 'table_code',
                                    'sortable' => true,
                                    'class'    => 'table_code',
                                    'label'    => $getArrayCaptions['NumericCode']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "3"


                                ],

                                [
                                    'key'      => 'table_name',
                                    'sortable' => true,
                                    'class'    => 'table_name',
                                    'label'    => $getArrayCaptions['CountryCode2Short']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "4"

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
            'CountryName', 'SystemDetails',
            'CountryFullName', 'CountryCodeFull',
            'CountryCode2Full', 'CountryCode3Full',
            'CreatedAt', 'Regions',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'CreationDetails', 'BlockCountryAddNew'


        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if($modelTable_id == "new")
            $modelTable = ModelTables::getNewObject();
        else
            $modelTable = ModelTables::query()
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
//                                'title' => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                                'title' => 'table_n',
                                'model_name'=>$controller->controller_alias,'model' => 'table_n', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryFullName']['translation_captions']['caption_translation'],
                                'title' => 'table_code',
                                'model_name'=>$controller->controller_alias,'model' => 'table_code', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCodeFull']['translation_captions']['caption_translation'],
                                'title' => 'table_name',
                                'model_name'=>$controller->controller_alias,'model' => 'table_name', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '3'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCode2Full']['translation_captions']['caption_translation'],
                                'title' => 'table_output_template',
                                'model_name'=>$controller->controller_alias,'model' => 'table_output_template', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '4'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCode3Full']['translation_captions']['caption_translation'],
                                'title' => 'table_folder',
                                'model_name'=>$controller->controller_alias,'model' => 'table_folder', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '5'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCode3Full']['translation_captions']['caption_translation'],
                                'title' => 'use_db_area_l',
                                'model_name'=>$controller->controller_alias,'model' => 'use_db_area_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '6'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCode3Full']['translation_captions']['caption_translation'],
                                'title' => 'use_stored_file_l',
                                'model_name'=>$controller->controller_alias,'model' => 'use_stored_file_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '7'
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
                                'model_name'=>$controller->controller_alias,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "2"
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
                "form_title"                    => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['BlockCountryAddNew']['translation_captions']['caption_translation'] : $modelTable->country_name,
                "form_type_list"                => [

                    "form_card_url" => "/model/",
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

        return ModelTables::where('id', $model['id'])->update([
            'id'              => $model['id'],
            'table_n'         => $model['table_n'],
            'table_code'      => $model['table_code'],
            'table_name'      => $model['table_name'],
            'use_db_area_l'   => $model['use_db_area_l'],
            'use_stored_file_l' => $model['use_stored_file_l'],
            'table_output_template' => $model['table_output_template'],
            'created_at'      => $model['created_at'],
            'updated_at'      => $model['updated_at'],
            'created_by'      => (new ConsumerParameters())->consumerCode(),
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
            'table_folder'    => $model['table_folder'],
        ]);
    }

}
