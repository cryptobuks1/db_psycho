<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Models\ContactPerson;
use App\Models\Contractor;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class ContactPersonsController extends Controller
{
    public function list(Request $request)
    {
        $captionName = ['Contractor', 'Position', 'Name', 'ContactPersons'];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->first();

        $show_dependent = isset($request["dependent"]);

        $persons = ContactPerson::query()
            ->select(["ContactPersons.id", "ContactPersons.contact_person_name", "ContactPersons.contact_person_position"]);

        if($show_dependent)
        {
            $dependent_controller = \App\Models\Controller::query()
                ->where("controller_alias", $request["dependent"]["controller_alias"])
                ->with("models")
                ->first();

            $persons->where([
                "ContactPersons.row_id_owner" => $request["dependent"]["id"],
                "ContactPersons.table_n_owner" => $dependent_controller->controller_table_n
            ]);

        }

        $persons = $persons->get();

        if($show_dependent)
        {
            $dependent_model = App::make("\App{$dependent_controller->models->table_folder}\\{$dependent_controller->models->table_code}");
            $dependent_object_value = $dependent_model->where("id", $request["dependent"]["id"])
                ->value($dependent_controller->models->table_output_template);
        }

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $persons
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['ContactPersons']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => $show_dependent,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_sort_by"                  => 'id',
                "form_sort_desc"                => true,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/contact_person_new/",
                    "form_search_field" => "contact_person_name",
                ],
            ],
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['ContactPersons']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_title"         => $getArrayCaptions['ContactPersons']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                ['key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
                                 'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"
                                ],
                                ['key'   => 'contact_person_name', 'sortable' => true, 'class' => 'contractor_short_name',
                                 "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'thStyle' => 'width: 40%', "zone" => "1", "order" => "2"],
                                ['key'   => 'contact_person_position', 'sortable' => true, 'class' => 'created_at',
                                 "label" => $getArrayCaptions['Position']['translation_captions']['caption_translation'], 'thStyle' => 'width: 40%', "zone" => "1", "order" => "5"],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        if($show_dependent)
        {
            $list["dependent"] = [
                "dependent_data_model" => "ContractorInfo",
                "dependent_fields"     => [
                    "title"         => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                    "model"         => "contractor_id",
                    "type"          => "label",
                    "current_value" => $dependent_object_value,
                ],
                "width"                => "100%",
            ];
        }

        return response()->json($list);
    }

    public function card(Request $request)
    {
        $captionName = [
            'ok', 'apply', 'back', 'Main', 'contactInfo', 'Contractor', 'Name', 'Position', 'ContactPerson',
            'UpdatedAt', 'UpdatedBy', 'CreatedAt', 'CreatedBy', 'SystemDetails', 'ContactPersonsInfo'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $person_id = $request->id;

        $is_new = $person_id === "new";

        $dependent_isset = isset($request["dependent"]);

        $show_dependent = ($is_new && $dependent_isset) || !$is_new;

        if($is_new)
        {
            $person = ContactPerson::getNewObject();

            // Пока что поставили ContractorsController,
            // потому то на данный момент только он может быть владельцем
            $contractor_controller = \App\Models\Controller::query()
                ->where("controller_code", "ContractorsController")
                ->with("models")
                ->first();

            $person["table_n_owner"] = $contractor_controller->controller_table_n;

            if($dependent_isset)
            {
                $person["row_id_owner"] = $request["dependent"]["id"];

                $contractor = Contractor::query()
                    ->find($request["dependent"]["id"], ["id", $contractor_controller->models->table_output_template]);

                $person["output_template"] = $contractor->{$contractor_controller->models->table_output_template};
            }
            else
            {
                $contractors = Contractor::query()
                    ->select(["id", "contractor_short_name"])
                    ->get();
            }
        }
        else
        {
            $person = ContactPerson::query()
                ->where("ContactPersons.id", $person_id)
                ->withCount("contactPersonInfo")
                ->join("__Controllers as controllers", function(JoinClause $join)
                {
                    // Пока что поставили ContractorsController,
                    // потому то на данный момент только он может быть владельцем
                    $join->where("controllers.controller_code", "=", "ContractorsController");
                })
                ->join("__ModelTables as model_tables", "model_tables.table_n", "=", "controllers.controller_table_n")
                ->leftJoin("Contractors", "Contractors.id", "=", "ContactPersons.row_id_owner")
                ->addSelect(["Contractors.*", "ContactPersons.id", "contact_person_name", "contact_person_position",
                             "ContactPersons.db_area_id", "model_tables.table_output_template", "ContactPersons.updated_by",
                             "ContactPersons.updated_at", "ContactPersons.created_at", "ContactPersons.created_by"])
                ->first()
                ->toArray();

            $person["output_template"] = $person[$person["table_output_template"]];
        }

        $controller_code = class_basename(Route::current()->controller);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", $controller_code)
            ->first();

        $nameControllerMethod = [
            'controller'  => $controller_code,
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $block_fields = [
            ['title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias, 'model' => 'contact_person_name', 'type' => 'text', 'width' => '50%', "grid_column" => "1/8", "zone" => "1", "order" => "1", "border_right" => false,],
            ['title' => $getArrayCaptions['Position']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias, 'model' => 'contact_person_position', 'type' => 'text', 'width' => '50%', "grid_column" => "1/8", "zone" => "1", "order" => "2", "border_right" => false],
        ];

        if($is_new && !$dependent_isset)
        {
            array_push($block_fields,
                [
                    'title' => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                    'model_name'=>$controller->controller_alias, 'model' => 'row_id_owner',
                    'type' => 'vue-select',
                    'width' => '100%',
                    'options' => [],
                    "options_data" => [
                        "options_data_model" => "Contractors",
                        "options_field_id" => "id",
                        "options_field_title" => "contractor_short_name",
                        "search" => ""
                    ],
                    "zone" => "1",
                    "order" => "1",
                    "border_right" => false
                ]
            );
        }

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "title caption",
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => $block_fields
                    ],
                ]
            ]
        ];


        if($formShowParam['show_system_tab'])
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
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', "model_name" => $controller->controller_alias, 'type' => 'label', 'width' => '100%', "grid_column" => "1/8", "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', "model_name" => $controller->controller_alias, 'type' => 'label', 'width' => '100%', "grid_column" => "half/15", "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', "model_name" => $controller->controller_alias, 'type' => 'label', 'width' => '100%', "grid_column" => "1/8", "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', "model_name" => $controller->controller_alias, 'type' => 'label', 'width' => '100%', "grid_column" => "half/15", "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $person_data = [
            "id"                        => $person["id"],
            "contact_person_name"       => $person["contact_person_name"],
            "contact_person_position"   => $person["contact_person_position"],
            "row_id_owner"              => $person["row_id_owner"],
            "table_n_owner"             => $person["table_n_owner"],
            "db_area_id"                => $person["db_area_id"],
            "created_at"                => $person["created_at"],
            "created_by"                => $person["created_by"],
            "updated_at"                => $person["updated_at"],
            "updated_by"                => $person["updated_by"],
            "contact_person_info_count" => $person["contact_person_info_count"] ?? 0,
            "output_template"           => $person["output_template"] ?? ""
        ];

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
                $controller->controller_alias => [$person_data]
            ],


            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['ContactPerson']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "disable_inputs"                => $formShowParam['read_only'],
                "form_is_dependent"             => $show_dependent,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "use_grid_layout"               => false,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $person['contact_person_name'],
                "form_type_list"                => [
                    "form_card_url"     => "/contact_person_new/",
                    "form_search_field" => "contact_person_name",
                ],
            ],

            "tabs" => $tabs
        ];

        if(!$is_new)
        {
            $link_title = $getArrayCaptions["ContactPersonsInfo"]['translation_captions']['caption_translation'];
            $contact_person_info_count = $person["contact_person_info_count"];

            if($contact_person_info_count > 0)
            {
                $link_title .= " ( $contact_person_info_count )";
            }

            $card["links"] = [
                [
                    "link_title" => $link_title,
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/contactPersonInfo"
                ]
            ];
        }

        if($is_new && !$dependent_isset)
        {
            $card["add_data_models"] = [
                "Contractors" => $contractors
            ];
        }

        if($show_dependent)
        {
            $card["add_data_models"] = [
//                $controller->controller_alias => [
//                    "id" => $person["row_id_owner"],
//                    "output_template" => $person["output_template"]
//                ]
            ];
            $card["dependent"] = [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields" => [
                    "title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                    "model" => "row_id_owner",
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_data_model" => $controller->controller_alias,
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => "output_template",
                        "search" => ''
                    ],
                ],
                "width" => "100%",
            ];
        }

        return response()->json($card);
    }
}
