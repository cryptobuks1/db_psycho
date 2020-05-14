<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Models\Caption;
use App\Models\FeRoute;
use App\Models\Help;
use App\Models\MenuItem;
use App\Models\Partner;
use App\Models\UserInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class UserInterfacesController extends Controller
{
    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'UserInterfaces', 'MenuItemTop', 'MenuItemLeft', 'Code', 'Name',
            'Help', 'FeRoute', 'Actual', 'Url',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $UserInterfaces = DB::table('__UserInterfaces as main_table')
            ->leftJoin('Help as help',                  'main_table.help_id', '=', 'help.id')
            ->leftJoin('FeRoutes as fe_route',          'main_table.home_fe_route_id', '=', 'fe_route.id')
            ->leftJoin('MenuItems as menu_item_top',    'main_table.menu_item_id_top', '=', 'menu_item_top.id')
            ->leftJoin('MenuItems as menu_item_left',   'main_table.menu_item_id_left', '=', 'menu_item_left.id')
            ->select('main_table.id', 'main_table.user_interface_name', 'main_table.user_interface_code', 'main_table.actual_l', 'main_table.home_url',
                'main_table.help_id', 'help.help_title',
                'main_table.home_fe_route_id', 'fe_route.fe_route_name',
                'main_table.menu_item_id_top', 'menu_item_top.menu_item_name as menu_item_name_top',
                'main_table.menu_item_id_left', 'menu_item_left.menu_item_name as menu_item_name_left')->get()->toarray();

        $UserInterfaces = json_decode(json_encode($UserInterfaces), true);

        $list = [
            "main_data_models" => [
                $mainModel => $UserInterfaces,
            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['UserInterfaces']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line"        => true,
                "form_type_list"                => [
                    "form_card_url" => "UserInterface",
                    "form_search_field" => "",
                ],
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                [
                                    'key' => 'actions', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                [
                                    'key' => 'actual_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 10%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'user_interface_code',
                                    'sortable' => true,
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'class' => 'user_interface_code',
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => 'user_interface_name',
                                    'sortable' => true,
                                    'class' => 'user_interface_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => 'home_url',
                                    'sortable' => true,
                                    'class' => 'home_url',
                                    'label' => $getArrayCaptions['Url']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],
                                [
                                    'key' => 'help_title',
                                    'sortable' => true,
                                    'label' => $getArrayCaptions['Help']['translation_captions']['caption_translation'],
                                    'class' => 'help_title',
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "6"
                                ],
                                [
                                    'key' => 'fe_route_name',
                                    'sortable' => true,
                                    'label' => $getArrayCaptions['FeRoute']['translation_captions']['caption_translation'],
                                    'class' => 'fe_route_name',
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "7"
                                ],
                                [
                                    'key' => 'menu_item_name_top',
                                    'sortable' => true,
                                    'class' => 'menu_item_name_top',
                                    'label' => $getArrayCaptions['MenuItemTop']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "8"
                                ],
                                [
                                    'key' => 'menu_item_name_left',
                                    'sortable' => true,
                                    'class' => 'menu_item_name_left',
                                    'label' => $getArrayCaptions['MenuItemLeft']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "9"
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
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemDetails',
            'UserInterface', 'MenuItemTop', 'MenuItemLeft', 'Code', 'Name', 'Help', 'FeRoute',
            'Actual', 'Url', 'new', 'Caption'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $contReqId = $request->id;

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        if ($contReqId == "new") {
            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if ($access === false) {
                return abort('403');
            }

            $contRequest = UserInterface::getNewObject();

        } else {
            $contRequest = UserInterface::with([
                'help' => function ($query) {
                    $query->select('id', 'help_title');
                },
                'feRoute' => function ($query) {
                    $query->select('id', 'fe_route_name');
                },
                'menuItemLeft' => function ($query) {
                    $query->select('id', 'menu_item_name');
                },
                'menuItemTop' => function ($query) {
                    $query->select('id', 'menu_item_name');
                },
            ])
                ->where('id', $contReqId)->first()->toArray();

        }

        $FeRoute    = FeRoute::select('id', 'fe_route_name')->get()->all();
        $Help       = Help::select('id', 'help_title')->get()->all();
        $Caption    = Caption::select('id', 'caption_name as caption_code')->get()->all();
        $MenuItem   = MenuItem::select('id', 'menu_item_name as menu_item_name_top', 'menu_item_name as menu_item_name_left')->get()->all();

        $tabs = [
            [

                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'user_interface_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'user_interface_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['Help']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'help_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '3',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Help",
                                    "options_field_id" => "id",
                                    "options_field_title" => "help_title",
                                    "options_field_id_value" => "",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['FeRoute']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'home_fe_route_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '4',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "FeRoute",
                                    "options_field_id" => "id",
                                    "options_field_title" => "fe_route_name",
                                    "options_field_id_value" => "",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['MenuItemTop']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'menu_item_id_top',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '5',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "MenuItem",
                                    "options_field_id" => "id",
                                    "options_field_title" => "menu_item_name_top",
                                    "options_field_id_value" => "",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['MenuItemLeft']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'menu_item_id_left',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '6',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "MenuItem",
                                    "options_field_id" => "id",
                                    "options_field_title" => "menu_item_name_left",
                                    "options_field_id_value" => "",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'caption_code',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '7',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Caption",
                                    "options_field_id" => "caption_code",
                                    "options_field_title" => "caption_code",
                                    "options_field_id_value" => "",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['Url']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'home_url',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '8'
                            ],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'actual_l',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'zone' => '1',
                                'order' => '9'
                            ],
                        ]
                    ]
                ]
            ],
        ];
        if ($formShowParam['show_system_tab']) {
            $tabSystem = [
                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $res = [[ //Итоговый массив рекизитов
            'id' => $contRequest['id'],
            'menu_item_id_left' => $contRequest['menu_item_id_left'],
            'menu_item_id_top' => $contRequest['menu_item_id_top'],
            'help_id' => $contRequest['help_id'],
            'home_fe_route_id' => $contRequest['home_fe_route_id'],
            'help_title' => $contRequest['help']['help_title'] ?? "",
            'fe_route_name' => $contRequest['fe_route']['fe_route_name'] ?? "",
            'menu_item_name_top' => $contRequest['menu_item_top']['menu_item_name_top'] ?? "",
            'menu_item_name_left' => $contRequest['menu_item_left']['menu_item_name_left'] ?? "",
            'user_interface_code' => $contRequest['user_interface_code'],
            'user_interface_name' => $contRequest['user_interface_name'],
            'home_url' => $contRequest['home_url'],
            'actual_l' => $contRequest['actual_l'],
            'created_at' => $contRequest['created_at'],
            'created_by' => $contRequest['created_by'],
            'updated_at' => $contRequest['updated_at'],
            'updated_by' => $contRequest['updated_by'],
        ]];

        $card = [
            "sets"              => $this->getButtonsList(['card_actions']),
            "main_data_models"  => [
                $mainModel => $res,
            ],
            "add_data_models"   => [
                "FeRoute" => $FeRoute,
                "Help" => $Help,
                "MenuItem" => $MenuItem,
                "Caption" => $Caption,
            ],
            "form_parameters"   => [
                "form_title" => $getArrayCaptions['UserInterface']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $res[0]['user_interface_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_type_list" => [
                    "form_list_url" => "",
                ],
            ],
            "tabs"              => $tabs
        ];

        return response()->json($card);

    }
}
