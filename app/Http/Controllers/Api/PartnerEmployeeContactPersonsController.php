<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Models\ContactPerson;
use App\Models\PartnerEmployee;
use App\Models\PartnerEmployeeContactPerson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PartnerEmployeeContactPersonsController extends Controller
{
    public function list(Request $request)
    {
        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'PartnerEmployee', 'PartnerEmployeeContactPersons', 'ContactPerson'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $dependent_id = $request->dependent['id'] ?? '';

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $query = DB::table('PartnerEmployeeContactPersons')
            ->leftJoin('ContactPersons as contactPerson', 'contactPerson.id', '=', 'PartnerEmployeeContactPersons.contact_person_id')
            ->leftJoin('PartnerEmployees as partnerEmployee', 'partnerEmployee.id', '=', 'PartnerEmployeeContactPersons.partner_employee_id')
            ->select('PartnerEmployeeContactPersons.id', 'contactPerson.contact_person_name as contact_person_name', 'partnerEmployee.partner_employee_name as partner_employee_name');

        if ($dependent_id == '') {
            $dependent_field_type = "select";
            $PartnerEmployees = DB::table('PartnerEmployees')->select('id', 'partner_employee_name')->get()->toArray();
            $PartnerEmployees = json_decode(json_encode($PartnerEmployees), true);
            $dependent_field_value = "";
            $dependent_field_id_value = sizeof($PartnerEmployees) == 1 ? $PartnerEmployees[0]['partner_employee_id'] : '';
            $PartnerEmployeeContactPersons = $query->get()->toArray();
        }
        else {
            $dependent_field_type = "label";
            $PartnerEmployees = DB::table('PartnerEmployees')->select('id', 'partner_employee_name')->where('id', $dependent_id)->get()->toArray();
            $PartnerEmployees = json_decode(json_encode($PartnerEmployees), true);
            $dependent_field_value = $PartnerEmployees[0]['partner_employee_name'];
            $dependent_field_id_value = $dependent_id;
            $PartnerEmployeeContactPersons = $query->where('partner_employee_id', $dependent_id)->get()->toArray();
        }

        $PartnerEmployeeContactPersons   = json_decode(json_encode($PartnerEmployeeContactPersons), true);

        $list = [
            "main_data_models"  => [
                $mainModel => $PartnerEmployeeContactPersons,
            ],
            "add_data_models"   => [
                "PartnerEmployees"    =>  $PartnerEmployees,
            ],
            "sets"              => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"   => [
                "form_title"                    => $getArrayCaptions['PartnerEmployeeContactPersons']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line"        => true,
                "form_type_list"                => [
                    "form_card_url"     => "PartnerEmployee",
                    "form_search_field" => "id",
                ],
            ],
            "dependent"         => [
                "dependent_data_model"  =>  $mainModel,
                "dependent_fields"      => [
                    "title" => $getArrayCaptions['PartnerEmployee']['translation_captions']['caption_translation'],
                    "model" => "partner_employee_id",
                    "type" => $dependent_field_type,
                    "current_value" => $dependent_field_value,
                    "options" => [],
                    "options_data" => [
                        "options_data_model"      => "PartnerEmployees",
                        "options_field_id"        => "id",
                        "options_field_id_value"  => $dependent_field_id_value,
                        "options_field_title"     => 'partner_name',
                        "search" => ''
                    ],
                ],
                "width" => "100%",
            ],
            "tabs"              => [
                [
                    "tab_title"         => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity"   => 1,
                    "blocks"            => [
                        [
                            // "block_title" => 'blockDbAreas',
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                [
                                    'key'       => 'actions', 'type' => 'checkbox',
                                    'sortable'  => false,
                                    'class'     => 'list_checkbox',
                                    'thStyle'   => 'width: 6%',
                                    "zone"      => "1",
                                    "order"     => "1"
                                ],
                                [
                                    'key'       => 'contact_person_name',
                                    'sortable'  => true,
                                    'class'     => 'contact_person_name',
                                    'label'     => $getArrayCaptions['ContactPerson']['translation_captions']['caption_translation'],
                                    'thStyle'   => 'width: 94%',
                                    "zone"      => "1",
                                    "order"     => "2"
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
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'SystemDetails', 'PartnerEmployee', 'PartnerEmployeeContactPerson', 'ContactPerson', 'new'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        if (strpos($request->id, 'new') !== false) {
            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if ($access === false) {
                return abort('403');
            }
            $PartnerEmployeeContactPerson = [PartnerEmployeeContactPerson::getNewObject()];
            $PartnerEmployeeContactPerson[0]['partner_employee_id']      = $request->dependent['id'];
            $PartnerEmployeeContactPerson[0]['partner_employee_name']    = DB::table('PartnerEmployees')->where('id', $request->dependent['id'])->value('partner_employee_name');
        }
        else {

            $PartnerEmployeeContactPerson = PartnerEmployeeContactPerson::leftJoin('PartnerEmployees', 'PartnerEmployees.id', '=', 'PartnerEmployeeContactPersons.partner_employee_id')
                ->leftJoin('ContactPersons', 'ContactPersons.id', '=', 'PartnerEmployeeContactPersons.contact_person_id')
                ->select('partner_employee_name', 'contact_person_name', 'partner_employee_id', 'contact_person_id',
                    'PartnerEmployeeContactPersons.id',
                    'PartnerEmployeeContactPersons.created_at', 'PartnerEmployeeContactPersons.created_by', 'PartnerEmployeeContactPersons.updated_at', 'PartnerEmployeeContactPersons.updated_by')
                ->where('PartnerEmployeeContactPersons.id', $request->id)
                ->get()->toarray();

            $PartnerEmployeeContactPerson = json_decode(json_encode($PartnerEmployeeContactPerson), true);
        }

        $ContactPersons = ContactPerson::select('id as contact_person_id', 'contact_person_name')->get()->toArray();

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
                                'title' => $getArrayCaptions['ContactPerson']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'contact_person_id',
                                'width' => '100%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '1',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "ContactPersons",
                                    "options_field_id" => "contact_person_id",
                                    "options_field_title" => "contact_person_name",
                                    "options_field_id_value" => "",
                                    "search" => ""
                                ],
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

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),
            "main_data_models"  => [
                $mainModel => $PartnerEmployeeContactPerson,
            ],
            "add_data_models"   => [
                "ContactPersons" => $ContactPersons
            ],
            "form_parameters"   => [
                "form_title" => $getArrayCaptions['PartnerEmployeeContactPerson']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => true,
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $PartnerEmployeeContactPerson[0]['partner_employee_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_type_list" => [
                ],
            ],
            "dependent"         => [
                "dependent_data_model" => $mainModel,
                "dependent_fields" => [
                    "title" => $getArrayCaptions['PartnerEmployee']['translation_captions']['caption_translation'],
                    "model" => "partner_employee_id",
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_data_model"      => $mainModel,
                        "options_field_id"        => "partner_employee_id",
                        "options_field_id_value"  => '',
                        "options_field_title"     => "partner_employee_name"
                    ],
                ],
                "width" => "100%",
            ],
            "tabs"              => $tabs
        ];

        return response()->json($card);
    }
}
