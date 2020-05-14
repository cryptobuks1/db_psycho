<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\AccessRole;
use App\Models\MenuItem;
use App\Models\MenuItemAccessRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class MenuItemAccessRolesController extends Controller
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
            'Name', 'Code', 'MenuItemName','UserOfSystem','AccessAllowed'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

//        $ModelTables = MenuItemAccessRole::query()
//            ->with('accessRoleMenuItem', 'accessRole')
//            ->select('id', 'menu_item_id', 'access_role_id', 'menu_item_view_l')
//            ->orderBy('menu_item_id')
//            ->get()->toArray();


        $ModelTables = DB::table('MenuItemAccessRoles')
            ->join('MenuItems', 'MenuItems.id', '=', 'MenuItemAccessRoles.menu_item_id')
            ->join('_AccessRoles', '_AccessRoles.id', '=', 'MenuItemAccessRoles.access_role_id')
//            ->join('','', '=','MenuItemAccessRoles.id')

            ->where('MenuItemAccessRoles.menu_item_id', $request['id'])
            ->select('MenuItemAccessRoles.id','MenuItemAccessRoles.menu_item_id','MenuItemAccessRoles.access_role_id',
                'MenuItems.menu_item_name', 'MenuItemAccessRoles.menu_item_view_l', '_AccessRoles.access_role_name')
            ->get()->toArray();

//        $ModelTables = DB::table('MenuItems')
//            ->join('MenuItemAccessRoles', 'MenuItemAccessRoles.menu_item_id', '=', 'MenuItems.id')
//            ->join('_AccessRoles', '_AccessRoles.id', '=', 'MenuItemAccessRoles.access_role_id')
//
//            ->where('MenuItems.id', $request['id'])
//            ->get()->toArray();

        $ModelTables = json_decode(json_encode( $ModelTables), true);

        $list = [

            "main_data_models" => [

                $controller->controller_alias => $ModelTables,

            ],
            "form_parameters"  => [
//                "form_title"                    => $getArrayCaptions['ModelTables']['translation_captions']['caption_translation'],
                "form_title"                    => 'MenuItem',
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
//                                    'key'      => 'menu_item_id',
                                    'key'      => 'menu_item_name',
                                    'sortable' => true,
                                    'class'    => 'menu_item_id',
                                    'label'    => $getArrayCaptions['MenuItemName']['translation_captions']['caption_translation'],
//                                    'label'    => 'item menu name',
                                    'thStyle'  => 'width: 31%',
                                    "zone"     => "1",
                                    "order"    => "2"


                                ],
                                [
                                    'key'      => 'access_role_name',
                                    'sortable' => true,
                                    'class'    => 'access_role_id',
                                    'label'    => $getArrayCaptions['UserOfSystem']['translation_captions']['caption_translation'],
                                     'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "3"


                                ],

                                [
                                    'key'      => 'menu_item_view_l',
                                    'sortable' => true,
                                    'class'    => 'menu_item_view_l',
                                    'label'    => $getArrayCaptions['AccessAllowed']['translation_captions']['caption_translation'],
//                                    'label'    => 'Доступ разрешен',
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
            'CreationDetails','MenuItemAccessRole','MenuItemName','DeletedL','MenuItemView'


        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if($modelTable_id == "new") {
            $modelTable = MenuItemAccessRole::getNewObject();

            (int) $modelTable['menu_item_id'] = $request['dependent']['id'];

        }
        else {
            $modelTable = MenuItemAccessRole::query()
                ->with([
                    'accessRoleMenuItem' => function ($query) {
                        $query->select('id', 'menu_item_name');
                    },
                    'accessRole' => function ($query) {
                        $query->select('id', 'access_role_name');
                    },
                    'parent'

                ])
                ->where('id', $modelTable_id)->first()->toArray();
        }

        $MenuItem = MenuItem::where('group_l', true)
            ->get()->toArray();

        $AccessRole = AccessRole::select('id', 'access_role_name')
            ->get()->toArray();



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
//                            [
////                                'title' => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
//                                'title' => 'menu_item_name',
//                                'model' => 'menu_item_name', 'width' => '50%', 'type' => 'text',
//                                'zone'  => '1', 'order' => '1'
//                            ],

//                            [
////                                'title' => $getArrayCaptions['ServerTableServerName']['translation_captions']['caption_translation'],
//                                'title' => 'menu_item_id',
//                                'model' => 'menu_item_id',
//                                'width' => '33%',
//                                'type' => 'lt-select',
//                                'zone' => '1',
//                                'order' => '4',
//                                'options' => [],
//                                "options_data" => [
//                                    "options_data_model" => "MenuItem",
//                                    "options_field_id" => "id",
//                                    "options_field_title" => "menu_item_name",
//                                    "search" => ""
//                                ],
//                            ],

//                            [
////                                'title' => $getArrayCaptions['CountryFullName']['translation_captions']['caption_translation'],
//                                'title' => 'access_role_id',
//                                'model' => 'access_role_id', 'width' => '50%', 'type' => 'text',
//                                'zone'  => '1', 'order' => '2'
//                            ],

                            [
                                'title' => $getArrayCaptions['MenuItemAccessRole']['translation_captions']['caption_translation'],
                                 'model_name'=>$controller->controller_alias,'model' => 'access_role_id',
                                'width' => '40%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '1',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "AccessRole",
                                    "options_field_id" => "id",
                                    "options_field_title" => "access_role_name",
                                    "search" => ""
                                ],
                            ],


                            [
                                'title' => $getArrayCaptions['MenuItemView']['translation_captions']['caption_translation'],
//                                'title' => 'menu_item_view_l',
                                'model_name'=>$controller->controller_alias,'model' => 'menu_item_view_l', 'width' => '20%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                 'model_name'=>$controller->controller_alias,'model' => 'deleted_l', 'width' => '25%', 'type' => 'checkbox',
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

        $res = [[ //Итоговый массив рекизитов
            'id' => $modelTable['id'],
            'menu_item_id' => $request['dependent']['id'],
             'menu_item_name' => $modelTable['parent']['menu_item_name'] ?? null ,
             'access_role_name' => $modelTable['access_role']['access_role_name'] ?? null,
            'menu_item_view_l' => $modelTable['menu_item_view_l'],
            'created_at' => $modelTable['created_at'],
            'created_by' => $modelTable['created_by'],
            'updated_at' => $modelTable['updated_at'],
            'updated_by' => $modelTable['updated_by'],
        ]];

        $card = [

            "main_data_models" => [

                $controller->controller_alias =>$res,

            ],

            "add_data_models"  => [
                  "MenuItem"    => $MenuItem,
                  "AccessRole"    => $AccessRole,
            ],

            "form_parameters" => [
//                "form_title"                    => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                "form_title"                    => 'MenuItemAccessRole',
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
//                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['BlockCountryAddNew']['translation_captions']['caption_translation'] : $modelTable->country_name,
                "form_main_data_model_name"     => $modelTable_id == "new" ? "test123" : $modelTable['parent']['menu_item_name'],
                "form_type_list"                => [

                    "form_card_url" => "/menu/item/access/role/",
                ],
            ],

            "dependent" => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields" => [
                    "title" => $getArrayCaptions['MenuItemName']['translation_captions']['caption_translation'],
//                    "title" => 'menu_item_name',
                    "model" => "menu_item_id",
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_data_model" => $controller->controller_alias,
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => "menu_item_name",
                        "search" => ''
                    ],
                ],
                "width" => "100%",
            ],

            "sets" => $this->getButtonsList(["card_actions"]),

            "tabs" => $tabs
        ];

        return response()->json($card);


    }

    public function update(Request $request)
    {
        $model = $request->Models[0];

        return MenuItemAccessRole::where('id', $model['id'])->update([
            'id'              => $model['id'],
            'menu_item_id'         => $model['menu_item_id'],
            'access_role_id'      => $model['access_role_id'],
            'menu_item_view_l'      => $model['menu_item_view_l'],
            'deleted_l'   => $model['deleted_l'],
            'created_at'      => $model['created_at'],
            'updated_at'      => $model['updated_at'],
            'created_by'      => (new ConsumerParameters())->consumerCode(),
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
         ]);
    }
}


