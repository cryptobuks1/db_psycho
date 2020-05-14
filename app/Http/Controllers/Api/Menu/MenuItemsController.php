<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Http\Controllers\Api\Admin\MenuController;
use App\Models\ConsumerAccessRole;
use App\Models\FeRoute;
use App\Models\Image;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Classes\MenuManager;


class MenuItemsController extends Controller
{
    /**
     * @var array
     */
    private $to_save_models = [];
    private $controller_alias;

    public function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main', 'Name', 'Code', 'LineNumber', 'RoleAccess', 'RoleForbidden', 'MenuItems'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))->get()->first();

        $params = [
            'menutype'       => 'left', 'check_access' => false, 'convert_to_list' => true, 'indentation' => [
                'marker' => '- ', 'indent' => 15,
            ], 'fields_list' => [
                'id', 'menu_item_code', 'access_allowed_role_name', 'access_denied_role_name', 'title', 'line_n',
                'padding'
            ],
        ];

        $ModelTables = (new MenuManager())->buildMenu($params);

        $list = [
            "main_data_models"   => [
                $controller->controller_alias => $ModelTables,
            ], "form_parameters" => [
                "form_title"                    => $getArrayCaptions['MenuItems']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias, "form_is_dependent" => false,
                "form_type"                     => "list", "form_base_data_model" => $controller->controller_alias,
                "form_main_data_model_id_field" => "id", "list_header_break_line" => true, "form_type_list" => [

                    "form_card_url" => "/controller/", "form_search_field" => "menu_item_name",
                ],
            ], "sets"            => $this->getButtonsList([
                'list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar',
                'list_top_right_command_bar'
            ]), "tabs"           => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1, "blocks" => [
                    [
                        "block_zone_quantity" => 1, //add Albert Topalu
                        "block_model"         => $controller->controller_alias, "block_type" => "block_list_base",
                        "block_fields"        => [
                            [
                                'key'   => 'actions', 'type' => 'checkbox', 'sortable' => false,
                                'class' => 'list_checkbox', 'thStyle' => 'width: 5%', "zone" => "1", "order" => "1"
                            ], [
                                'key'     => 'line_n', 'sortable' => false, 'class' => 'line_n',
                                'label'   => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 5%', "zone" => "1", "order" => "2"
                            ], [
                                'key'     => 'title', 'sortable' => false, 'class' => 'title',
                                'label'   => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 30%', "zone" => "1", "order" => "3", 'type' => 'html',
                            ], [
                                'key'     => 'menu_item_code', 'sortable' => false, 'class' => 'menu_item_code',
                                'label'   => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 22%', "zone" => "1", "order" => "4"
                            ], [
                                'key'     => 'access_allowed_role_name', 'sortable' => false,
                                'class'   => 'access_allowed_role_name',
                                'label'   => $getArrayCaptions['RoleAccess']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 19%', "zone" => "1", "order" => "5"
                            ], [
                                'key'     => 'access_denied_role_name', 'sortable' => false,
                                'class'   => 'access_denied_role_name',
                                'label'   => $getArrayCaptions['RoleForbidden']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 19%', "zone" => "1", "order" => "4"
                            ],
                        ]
                    ]
                ]
                ],
            ]
        ];

        return response()->json($list);

    }

    public function tree(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main', 'Name', 'Code', 'LineNumber', 'RoleAccess', 'RoleForbidden', 'MenuItems'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))->get()->first();

        $controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))->value('controller_alias');;

        $params = [
            'menutype'       => 'left', 'check_access' => false, 'convert_to_tree' => true, 'indentation' => [
                'marker' => '- ', 'indent' => 15,
            ], 'fields_list' => [
                'id', 'menu_item_code', 'access_allowed_role_name', 'access_denied_role_name', 'title', 'line_n',
                "updated_at"
            ],
            'children_key' => $controller_alias
        ];

        $ModelTables = (new MenuManager())->buildMenu($params);



        $tree = [
            "main_data_models"     => [
                $controller_alias => $ModelTables,
            ], "form_parameters"   => [
                "form_base_data_model" => $controller_alias, "drag_and_drop" => true
            ],
            "depths_parameters" => [
                [
                    "children_models" => [$controller_alias],
                    "icon"            => '/img/interfacedashboard/folder-2.svg',
                    "use_icon"        => true,
                ], [
                    "children_models" => [$controller_alias],
                    "icon"            => '/img/interfacedashboard/folder.svg',
                    "use_icon"        => true,
                ], [
                    "children_models" => [$controller_alias],
                    "icon"            => '/img/interfacedashboard/file.svg',
                    "use_icon"        => true,
                ], [
                    "children_models" => [$controller_alias],
                    "icon"            => '/img/interfacedashboard/file.svg',
                ], [
                    "children_models" => []
                ]
            ], "fields_parameters" => [
                $controller_alias => [
                    "parameters" => [
                        "card_url"      => "menuItems", "model_title_field" => "title", "card_l" => true,
                        "drag_and_drop" => true,
                        "empty_row" => MenuItem::getNewObject(),
                        "icon"            => '/img/interfacedashboard/folder-2.svg',
                    ], "columns" => [
                        [
                            'key'        => 'title', 'edit' => true,
                            'label'      => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                            'validation' => null, "column_code" => "title"
                        ], [
                            'key'        => 'line_n', 'edit' => true,
                            'label'      => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                            'validation' => null, "column_code" => "line_n"
                        ], [
                            'key'        => 'menu_item_code', 'edit' => true,
                            'label'      => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                            'validation' => null, "column_code" => "menu_item_code"
                        ], [
                            'key'         => 'access_allowed_role_name', 'edit' => false,
                            'column_code' => 'access_allowed_role_name',
                            'label'       => $getArrayCaptions['RoleAccess']['translation_captions']['caption_translation'],
                            'validation'  => null
                        ], [
                            'key'         => 'access_denied_role_name', 'edit' => false,
                            'column_code' => 'access_denied_role_name',
                            'label'       => $getArrayCaptions['RoleForbidden']['translation_captions']['caption_translation'],
                            'validation'  => null
                        ],
                        [
                            'key'         => 'actions', 'edit' => false,
                            'column_code' => 'actions', 'actions_list' => [
                                [
                                    "code" => 'download',
                                    "class" => '',
                                    "link"  => '/admin/action/download',
                                    "img"   => '/img/interfacedashboard/download.svg',
                                    "title" => 'Загрузить',
                                    "type"  => 'button',
                                    "execute_fe_action_l" => false,
                                ],
                                [
                                    "code" => 'delete',
                                    "class" => '',
                                    "link"  => '/admin/action/delete',
                                    "img"   => '/img/interfacedashboard/delete.svg',
                                    "title" => 'Удалить',
                                    "type"  => 'button',
                                    "execute_fe_action_l" => false,
                                ],
                                [
                                    "code" => 'edit',
                                    "class" => '',
                                    "link"  => '',
                                    "img"   => '/img/interfacedashboard/edit.svg',
                                    "title" => 'Редактировать',
                                    "type"  => 'button',
                                    "execute_fe_action_l" => true,
                                ],
                            ]
                        ]
                    ],
                ],
            ], "table_fields"      => [
                [
                    "label"       => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                    "column_code" => "line_n"
                ], [
                    "label"       => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                    "column_code" => "menu_item_code"
                ], [
                    "label"       => $getArrayCaptions['RoleAccess']['translation_captions']['caption_translation'],
                    "column_code" => "access_allowed_role_name"
                ], [
                    "label"       => $getArrayCaptions['RoleForbidden']['translation_captions']['caption_translation'],
                    "column_code" => "access_denied_role_name"
                ],
                [
                    "label"       => "Действия",
                    "column_code" => "actions",
                ]
            ],
            "sets"              => array_merge($this->getButtonsList('list_top_dropdown_actions'), [
                "card_actions" => [
                    [
                        'code' => "ok", 'class' => "btn btn-green", 'link' => "/admin/menu/items/tree/save",
                        'img'  => null, 'title' => "ОК", 'type' => "button", 'execute_fe_action_l' => true,
                    ]
                ]
            ]),
        ];

        return response()->json($tree);
    }

    public function update(Request $request)
    {
        $model = $request->Models[0];

        return MenuItem::where('id', $model['id'])->update([
            'id'                  => $model['id'], 'fe_route_id' => $model['fe_route_id'],
            'image_id'            => $model['image_id'], 'menu_item_parent_id' => $model['menu_item_parent_id'],
            'group_l'             => $model['group_l'], 'menu_item_name' => $model['menu_item_name'],
            'menu_item_code'      => $model['menu_item_code'], 'caption_code' => $model['caption_code'],
            'line_n'              => $model['line_n'], 'deleted_l' => $model['deleted_l'],
            'created_at'          => $model['created_at'], 'updated_at' => $model['updated_at'],
            'created_by'          => (new ConsumerParameters())->consumerCode(),
            'updated_by'          => (new ConsumerParameters())->consumerCode(),
        ]);
    }

    public function card(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main', 'SystemDetails', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'CreationDetails', 'BlockCountryAddNew', 'MenuItemName', 'Code', 'MenuItemParent', 'ImageCategories',
            'LineNumber', 'Group', 'FeRouteName', 'Image', 'MenuItemAccessRoles', 'MenuItem', 'new', 'Caption'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))->get()->first();

        $modelTable_id = $request->id;

        if($modelTable_id == "new")
        {
            //            $nameControllerMethod = [
            //                'controller' => class_basename(Route::current()->controller),
            //                'method'     => 'insert'
            //            ];
            //
            //            $objAccess = (new CheckController($nameControllerMethod));
            //            $access = $objAccess->checkControllerAccessRight();
            //
            //            if($access === false)
            //            {
            //                return abort('403');
            //            }

            $modelTable = MenuItem::getNewObject();

            $countAccessRole = null;

        }
        else
        {
            $modelTable = MenuItem::with([
                'feRoute'               => function($query)
                {
                    $query->select('id', 'caption_code');
                }, 'parent'             => function($query)
                {
                    $query->select('id', 'menu_item_name as menu_item_parent_name');
                }, 'image'              => function($query)
                {
                    $query->select('id', 'image_name', 'image_path');
                }, 'menuItemAccessRole' => function($query)
                {
                    $query->select('id', 'menu_item_id', 'access_role_id')->with([
                                'accessRole' => function($query)
                                {
                                    $query->select('id', 'access_role_name');
                                }
                            ]

                        );
                }
            ])->where('id', $modelTable_id)->get()->first()->toArray();

            $countAccessRole = count($modelTable['menu_item_access_role']);
        }

        $FeRoute = FeRoute::select('id', 'caption_code')->get()->toArray();

        $MenuItem = MenuItem::select('id', 'menu_item_name as menu_item_parent_name')->where('group_l', true)
            //            ->where('fe_route_id', NULL)
            ->get()->toArray();

        $Images = Image::select('id', 'image_name')->where('image_category_id', 3)->get()->toArray();

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller), 'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1, "blocks" => [
                [
                    "block_zone_quantity" => 1, "block_model" => $controller->controller_alias,
                    "block_type"          => "block_card", "block_fields" => [
                    [
                        'title'      => $getArrayCaptions['MenuItemName']['translation_captions']['caption_translation'],
                        'model'      => 'menu_item_name', 'width' => '33%', 'type' => 'text',
                        'model_name' => $controller->controller_alias, 'zone' => '1', 'order' => '2'
                    ], [
                        'title'      => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                        'model'      => 'menu_item_code', 'width' => '33%', 'type' => 'text',
                        'model_name' => $controller->controller_alias, 'zone' => '1', 'order' => '1'
                    ], [
                        'title' => $getArrayCaptions['FeRouteName']['translation_captions']['caption_translation'],
                        'model' => 'fe_route_id', 'model_name' => $controller->controller_alias, 'width' => '33%',
                        'type'  => 'vue-select', 'zone' => '1', 'order' => '4', 'options' => [], "options_data" => [
                            "options_data_model"  => "FeRoute", "options_field_id" => "id",
                            "options_field_title" => "caption_code", "search" => ""
                        ],
                    ], [
                        'title'        => $getArrayCaptions['MenuItemParent']['translation_captions']['caption_translation'],
                        'model'        => 'menu_item_parent_id', 'model_name' => $controller->controller_alias,
                        'width'        => '33%', 'type' => 'vue-select', 'zone' => '1', 'order' => '4', 'options' => [],
                        "options_data" => [
                            "options_data_model"  => "MenuItem", "options_field_id" => "id",
                            "options_field_title" => "menu_item_parent_name", "search" => ""
                        ],
                    ], [
                        'title' => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                        'model' => 'image_id', 'model_name' => $controller->controller_alias, 'width' => '33%',
                        'type'  => 'vue-select', 'zone' => '1', 'order' => '4', 'options' => [], "options_data" => [
                            "options_data_model"  => "Images", "options_field_id" => "id",
                            "options_field_title" => "image_name", "search" => ""
                        ],
                    ], [
                        'title'      => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                        'model'      => 'line_n', 'width' => '33%', 'type' => 'text',
                        'model_name' => $controller->controller_alias, 'zone' => '1', 'order' => '6'
                    ],[
                        'title'      => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                        'model'      => 'caption_code', 'width' => '33%', 'type' => 'text',
                        'model_name' => $controller->controller_alias, 'zone' => '1', 'order' => '7'
                    ], [
                        'title'      => $getArrayCaptions['Group']['translation_captions']['caption_translation'],
                        'model'      => 'group_l', 'width' => '33%', 'type' => 'checkbox',
                        'model_name' => $controller->controller_alias, 'zone' => '1', 'order' => '8'
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
                "blocks_quantity" => 1, "blocks" => [
                    [
                        "block_zone_quantity" => 2, "block_model" => $controller->controller_alias,
                        "block_type"          => "block_card", "block_fields" => [
                        [
                            'title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                            'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"
                        ], [
                            'title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                            'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"
                        ], [
                            'title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                            'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"
                        ], [
                            'title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                            'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"
                        ],
                    ]
                    ]
                ]
            ];
        }

        $res = [
            [ //Итоговый массив рекизитов
              'id'                    => $modelTable['id'], 'menu_item_name' => $modelTable['menu_item_name'],
              'fe_route_id'           => $modelTable['fe_route_id'],
              'caption_code'          => $modelTable['caption_code'],
              'menu_item_code'        => $modelTable['menu_item_code'],
              'menu_item_parent_id'   => $modelTable['menu_item_parent_id'],
              'menu_item_parent_name' => $modelTable['parent']['menu_item_parent_name'] ?? null,
              'image_id'              => $modelTable['image_id'],
              'image_name'            => $modelTable['image']['image_name'] ?? null,
              'group_l'               => $modelTable['group_l'], 'line_n' => $modelTable['line_n'],
              'created_at'            => $modelTable['created_at'], 'created_by' => $modelTable['created_by'],
              'updated_at'            => $modelTable['updated_at'], 'updated_by' => $modelTable['updated_by'],
            ]
        ];

        $menu_item_access_link_title = $getArrayCaptions['MenuItemAccessRoles']['translation_captions']['caption_translation'];
        if($countAccessRole > 0)
            $menu_item_access_link_title .= " ( $countAccessRole )";

        $card = [
            "main_data_models"   => [
                $controller->controller_alias => $res,
            ], "add_data_models" => [
                "FeRoute" => $FeRoute, "MenuItem" => $MenuItem, "Images" => $Images,
            ], "form_parameters" => [
                "form_title"                    => $getArrayCaptions['MenuItem']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias, "form_is_dependent" => false,
                "form_type"                     => "card", "form_base_data_model" => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $res[0]['menu_item_name'],
                "form_type_list"                => [

                    "form_card_url" => "/menu/item/",
                ],
            ], "links"           => [
                [
                    "link_title" => $menu_item_access_link_title, "link_img" => "", "link_type" => "internal_push",
                    "link_url"   => "/menuItemAccessRoles"
                ],
            ], "sets"            => $this->getButtonsList(["card_actions"]), "tabs" => $tabs
        ];

        return response()->json($card);

    }

    public function saveTree(Request $request)
    {
        $this->controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))->value('controller_alias');;

        $main_data_models = $request->get("main_data_models");

        $main_data_model_name = $request["form_parameters"]["form_base_data_model"];

        $main_model = $main_data_models[$main_data_model_name];

        $this->mapModels($main_model);

        DB::beginTransaction();

        foreach($this->to_save_models as $save_model)
        {
            $write_request = new Request([
                "form_parameters"     => [
                    "form_base_data_model" => $main_data_model_name
                ], "main_data_models" => [
                    $main_data_model_name => [$save_model]
                ]
            ]);

            $write_result = $this->write($write_request)->getOriginalContent();

            if($write_result["error"] === true)
            {
                DB::rollBack();

                return response()->json($write_result(), 400);
            }
        }

        DB::commit();

        return $this->tree(new Request());
    }

    /**
     * @param array $models
     * @param array|null $parent_model
     */
    private function mapModels($models, $parent_model = null)
    {
        foreach($models as $model)
        {
            if(isset($model["status"]))
            {
                if(!is_null($parent_model))
                    $model["menu_item_parent_id"] = $parent_model["id"];

                if($model["status"] === 2)
                {
                    $model["caption_code"] = $model["title"];
                    $model["menu_item_name"] = $model["title"];
                }

                array_push($this->to_save_models, $model);
            }

            if(isset($model[$this->controller_alias]) && !empty($model[$this->controller_alias]))
                $this->mapModels($model[$this->controller_alias], $model);

        }

    }
}
