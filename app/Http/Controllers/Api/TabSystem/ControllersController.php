<?php

namespace App\Http\Controllers\Api\TabSystem;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;




class ControllersController extends Controller
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
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = \App\Models\Controller::query()
            ->select('id', 'controller_code', 'controller_table_n', 'controller_name')
            ->orderBy('controller_name')
            ->get();


        $list = [

            "main_data_models" => [

                $controller->controller_alias => $ModelTables,

            ],
            "form_parameters"  => [
//                "form_title"                    => $getArrayCaptions['ModelTables']['translation_captions']['caption_translation'],
                "form_title"                    => 'Controllers',
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "/controller/",
                    "form_search_field" => "controller_name",
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
                                    'key'      => 'controller_code',
                                    'sortable' => true,
                                    'class'    => 'controller_code',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 31%',
                                    "zone"     => "1",
                                    "order"    => "2"


                                ],
                                [
                                    'key'      => 'controller_name',
                                    'sortable' => true,
                                    'class'    => 'controller_name',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "3"


                                ],

                                [
                                    'key'      => 'controller_table_n',
                                    'sortable' => true,
                                    'class'    => 'controller_table_n',
                                    'label'    => $getArrayCaptions['ControllerNumber']['translation_captions']['caption_translation'],
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
            'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'CreationDetails', 'BlockCountryAddNew'


        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if($modelTable_id == "new")
            $modelTable = \App\Models\Controller::getNewObject();
        else
            $modelTable = \App\Models\Controller::query()
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
                                'title' => 'controller_code',
                                'model_name'=>$controller->controller_alias, 'model' => 'controller_code', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryFullName']['translation_captions']['caption_translation'],
                                'title' => 'controller_name',
                                'model_name'=>$controller->controller_alias, 'model' => 'controller_name', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCodeFull']['translation_captions']['caption_translation'],
                                'title' => 'controller_table_n',
                                'model_name'=>$controller->controller_alias, 'model' => 'controller_table_n', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '3'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCode2Full']['translation_captions']['caption_translation'],
                                'title' => 'controller_alias',
                                'model_name'=>$controller->controller_alias, 'model' => 'controller_alias', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '4'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCode3Full']['translation_captions']['caption_translation'],
                                'title' => 'controller_table_n_dep',
                                'model_name'=>$controller->controller_alias, 'model' => 'controller_table_n_dep', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '5'
                            ],
                            [
//                                'title' => $getArrayCaptions['CountryCode3Full']['translation_captions']['caption_translation'],
                                'title' => 'controller_type_id',
                                'model_name'=>$controller->controller_alias, 'model' => 'controller_type_id', 'width' => '33%', 'type' => 'text',
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
                                'model_name'=>$controller->controller_alias, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
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
//                "form_title"                    => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                "form_title"                    => 'Controller',
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['BlockCountryAddNew']['translation_captions']['caption_translation'] : $modelTable->country_name,
                "form_type_list"                => [

                    "form_card_url" => "/controller/",
                ],
            ],

            "sets" => $this->getButtonsList(["card_actions"]),

            "tabs" => $tabs
        ];

        return response()->json($card);


    }

    public function update(Request $request)
    {
        $model = $request->Controllers[0];

        return \App\Models\Controller::where('id', $model['id'])->update([
            'id' => $model['id'],
            'controller_code' => $model['controller_code'],
            'controller_name' => $model['controller_name'],
            'controller_table_code' => $model['controller_table_code'],
            'controller_table_n' => $model['controller_table_n'],
            'controller_table_code_dep' => $model['controller_table_code_dep'],
            'controller_table_n_dep' => $model['controller_table_n_dep'],
            'controller_type_code' => $model['controller_type_code'],
            'controller_type_id' => $model['controller_type_id'],
            'created_by' => (new ConsumerParameters())->consumerCode(),
            'updated_by' => (new ConsumerParameters())->consumerCode(),
            'created_at' => $model['created_at'],
            'updated_at' => $model['updated_at'],
        ]);
    }
}
