<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Models\ContactPerson;
use App\Models\ContactPersonInfo;
use App\Models\Country;
use App\Models\InfoKind;
use App\Models\InfoType;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ContactPersonInfoController extends Controller
{
    public function list(Request $request)
    {
        $captionName = ['InfoKind', 'InfoType', 'Representation', 'Value', 'ContactPersonsInfo',
                        'ContactPerson'];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $dependent = $request->get("dependent");

        $contact_person = ContactPerson::query()
            ->with(["contactPersonInfo.country:id,country_name", "contactPersonInfo.infoType:id,info_type_name",
                    "contactPersonInfo.region:id,region_name", "contactPersonInfo.infoKind:id,info_kind_name"])
            ->find($dependent["id"], ["id", "contact_person_name"]);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->first();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $contact_person->contactPersonInfo
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['ContactPersonsInfo']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_sort_by"                  => 'id',
                "form_sort_desc"                => true,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/contact_person_info_new/",
                    "form_search_field" => "contact_person_name",
                ],
            ],
            "dependent"        => [
                "dependent_data_model" => "ContractorInfo",
                "dependent_fields"     => [
                    "title"         => $getArrayCaptions['ContactPerson']['translation_captions']['caption_translation'],
                    "type"          => "label",
                    "current_value" => $contact_person->contact_person_name,

                ],
                "width"                => "100%",
            ],
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['ContactPersonsInfo']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_title"         => $getArrayCaptions['ContactPersonsInfo']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                ['key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
                                 'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"
                                ],
                                ['key'   => '["info_kind"]["info_kind_name"]', 'sortable' => true, 'class' => 'contractor_short_name',
                                 "label" => $getArrayCaptions['InfoKind']['translation_captions']['caption_translation'], 'thStyle' => 'width: 40%', "zone" => "1", "order" => "2"],
                                ['key'   => 'representation', 'sortable' => true, 'class' => 'contractor_short_name',
                                 "label" => $getArrayCaptions['Value']['translation_captions']['caption_translation'], 'thStyle' => 'width: 40%', "zone" => "1", "order" => "3"],

                            ]
                        ]
                    ]
                ]
            ]
        ];

        return response()->json($list);
    }

    public function card(Request $request)
    {
        $person_info_id = $request->id;

        $captionName = [
            'ok', 'apply', 'back', 'Main', 'Country', 'InfoType', 'InfoKind', 'Value', 'Url',
            'BlockCountryReg', 'CountryRegCountry', 'Region', 'City', 'contactInfo', 'cardEmail',
            'Phone', 'cardURL',
            'UpdatedAt', 'UpdatedBy', 'CreatedAt', 'CreatedBy', 'SystemDetails', 'ContactPerson'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        if($person_info_id == "new")
        {
            $person_info = ContactPersonInfo::getNewObject();

            $person_info["contact_person_id"] = $request["dependent"]["id"];
        }
        else
        {
            $person_info = ContactPersonInfo::query()->find($person_info_id, ["*"])
                ->toArray();
        }

        $person = ContactPerson::query()->find($request["dependent"]["id"], ["id", "contact_person_name"]);

        $person_info["contact_person_name"] = $person->contact_person_name;

        $info_types = InfoType::query()->select('id', 'info_type_name')->get();
        $info_kinds = InfoKind::query()->select('id', 'info_kind_name')->get();
        $countries = Country::query()->select('id', 'country_name')->get();
        $regions = Region::query()->select('id', 'region_name')->get();

        $controller_code = class_basename(Route::current()->controller);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", $controller_code)
            ->first();

        $nameControllerMethod = [
            'controller'  => $controller_code,
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

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
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['Url']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias,
                             'model' => '', 'width' => '100%', 'type' => 'title', "zone" => "1", "order" => "1"],

                            [
                                'title'        => $getArrayCaptions['InfoType']['translation_captions']['caption_translation'],
                                'model_name'   => $controller->controller_alias, 'model' => 'info_type_id',
                                'type'         => 'vue-select',
                                'width'        => '100%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "InfoType",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "info_type_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1",
                                "order"        => "2",
                                "border_right" => false
                            ],

                            [
                                'title'        => $getArrayCaptions['InfoKind']['translation_captions']['caption_translation'],
                                'model_name'   => $controller->controller_alias, 'model' => 'info_kind_id',
                                'type'         => 'vue-select',
                                'width'        => '100%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "InfoKind",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "info_kind_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1",
                                "order"        => "3",
                                "border_right" => false
                            ],

                            ['title' => $getArrayCaptions['Value']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias,
                             'model' => 'representation', 'width' => '100%', 'type' => 'text', "zone" => "1", "order" => "4"],


                            ['title' => $getArrayCaptions['BlockCountryReg']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias,
                             'model' => '', 'width' => '50%', 'type' => 'title', "zone" => "2", "order" => "1"],

                            ['title' => $getArrayCaptions['contactInfo']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias,
                             'model' => '', 'width' => '50%', 'type' => 'title', "zone" => "2", "order" => "5"],

                            [
                                'title'        => $getArrayCaptions['CountryRegCountry']['translation_captions']['caption_translation'],
                                'model_name'   => $controller->controller_alias, 'model' => 'country_id',
                                'type'         => 'vue-select',
                                'width'        => '50%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "Countries",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "country_name",
                                    "search"              => ""
                                ],
                                "zone"         => "2",
                                "order"        => "2",
                                "border_right" => false
                            ],

                            ['title' => $getArrayCaptions['cardEmail']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias,
                             'model' => 'e_mail', 'width' => '50%', 'type' => 'text', "zone" => "2", "order" => "6"],

                            [
                                'title'        => $getArrayCaptions['Region']['translation_captions']['caption_translation'],
                                'model_name'   => $controller->controller_alias, 'model' => 'region_id',
                                'type'         => 'vue-select',
                                'width'        => '50%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "Regions",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "region_name",
                                    "search"              => ""
                                ],
                                "zone"         => "2",
                                "order"        => "3",
                                "border_right" => false
                            ],

                            ['title' => $getArrayCaptions['Phone']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias,
                             'model' => 'phone_number', 'width' => '50%', 'type' => 'text', "zone" => "2", "order" => "7"],

                            ['title' => $getArrayCaptions['City']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias,
                             'model' => 'city_name', 'width' => '50%', 'type' => 'text', "zone" => "2", "order" => "4"],

                            ['title' => $getArrayCaptions['cardURL']['translation_captions']['caption_translation'], 'model_name' => $controller->controller_alias,
                             'model' => 'url_name', 'width' => '50%', 'type' => 'text', "zone" => "2", "order" => "8"],

                        ]
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

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
                $controller->controller_alias => [$person_info]
            ],

            "add_data_models" => [
                "InfoType"  => $info_types,
                "InfoKind"  => $info_kinds,
                "Countries" => $countries,
                "Regions" => $regions,
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['ContactPerson']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "disable_inputs"                => $formShowParam['read_only'],
                "form_is_dependent"             => true,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "use_grid_layout"               => false,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $person_info['representation'],
                "form_type_list"                => [
                    "form_card_url"     => "/contact_person_info_new/",
                    "form_search_field" => "contact_person_name",
                ],
            ],

            "dependent" => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     => [
                    "title"        => $getArrayCaptions['ContactPerson']['translation_captions']['caption_translation'],
                    "model"        => "contact_person_id",
                    "type"         => "label",
                    "options"      => [],
                    "options_data" => [
                        "options_data_model"     => $controller->controller_alias,
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "contact_person_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ],

            "tabs" => $tabs
        ];

        return response()->json($card);
    }
}
