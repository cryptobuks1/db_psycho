<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Models\Partner;
use App\Models\PartnerEmployee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PartnerEmployeesController extends Controller
{
    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Partner', 'Code', 'Name',
            'Consumer', 'Actual', 'DeletedL',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'PartnerEmployees', 'Position', 'Partner'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $dependent_id = $request->dependent['id'] ?? '';

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $query = DB::table('PartnerEmployees')
            ->leftJoin('Partners as partner', 'partner.id', '=', 'PartnerEmployees.partner_id')
            ->select('PartnerEmployees.id', 'partner_employee_name', 'partner_employee_position',
                'PartnerEmployees.actual_l', 'PartnerEmployees.deleted_l', 'partner.partner_name as partner_name');

        if ($dependent_id == '') {
            $dependent_field_type = "select";
            $Partners = DB::table('Partners')->select('id', 'partner_name')->get()->toArray();
            $Partners = json_decode(json_encode($Partners), true);
            $dependent_field_value = "";
            $dependent_field_id_value = sizeof($Partners) == 1 ? $Partners[0]['partner_id'] : '';
            $PartnerEmployees = $query->get()->toArray();
        }
        else {
            $dependent_field_type = "label";
            $Partners = DB::table('Partners')->select('id', 'partner_name')->where('id', $dependent_id)->get()->toArray();
            $Partners = json_decode(json_encode($Partners), true);
            $dependent_field_value = $Partners[0]['partner_name'];
            $dependent_field_id_value = $dependent_id;
            $PartnerEmployees = $query->where('partner_id', $dependent_id)->get()->toArray();
        }

        $PartnerEmployees   = json_decode(json_encode($PartnerEmployees), true);

        $list = [
            "main_data_models"  => [
                $mainModel => $PartnerEmployees,
            ],
            "add_data_models"   => [
                "Partners"    =>  $Partners,
            ],
            "sets"              => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"   => [
                "form_title"                    => $getArrayCaptions['PartnerEmployees']['translation_captions']['caption_translation'],
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
                    "title" => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                    "model" => "partner_id",
                    "type" => $dependent_field_type,
                    "current_value" => $dependent_field_value,
                    "options" => [],
                    "options_data" => [
                        "options_data_model"      => "Partners",
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
                                    'key'       => 'deleted_l', 'type' => 'checkbox',
                                    'sortable'  => false,
                                    'label'     => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                    'class'     => 'list_checkbox',
                                    'thStyle'   => 'width: 11%',
                                    "zone"      => "1",
                                    "order"     => "2"
                                ],
                                [
                                    'key'       => 'actual_l', 'type' => 'checkbox',
                                    'sortable'  => false,
                                    'label'     => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'class'     => 'list_checkbox',
                                    'thStyle'   => 'width: 11%',
                                    "zone"      => "1",
                                    "order"     => "3"
                                ],
                                [
                                    'key'       => 'partner_name',
                                    'sortable'  => true,
                                    'class'     => 'partner_name',
                                    'label'     => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                                    'thStyle'   => 'width: 24%',
                                    "zone"      => "1",
                                    "order"     => "4"
                                ],
                                [
                                    'key'       => 'partner_employee_name',
                                    'sortable'  => true,
                                    'class'     => 'partner_employee_name',
                                    'label'     => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'   => 'width: 24%',
                                    "zone"      => "1",
                                    "order"     => "5"
                                ],
                                [
                                    'key'       => 'partner_employee_position',
                                    'sortable'  => true,
                                    'class'     => 'partner_employee_position',
                                    'label'     => $getArrayCaptions['Position']['translation_captions']['caption_translation'],
                                    'thStyle'   => 'width: 24%',
                                    "zone"      => "1",
                                    "order"     => "6"
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
            'SystemDetails','Partner','Contractors','DeletedL', 'UseRegions','PartnerPoints', 'PartnerRegions',
            'Uid1cCode', 'Actual','ConsumerNameDefault', 'PartnerEmployee', 'Name', 'Position', 'PartnerEmployeeContactPersons', 'new'
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

        $partnerEmployeeContactPersonsCount = 0;

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
            $PartnerEmployees = [PartnerEmployee::getNewObject()];
            $PartnerEmployees[0]['partner_id']      = $request->dependent['id'];
            $PartnerEmployees[0]['partner_name']    = DB::table('Partners')->where('id', $request->dependent['id'])->value('partner_name');
        }
        else {

            $PartnerEmployees = PartnerEmployee::with('partnerEmployeeContactPerson')
                ->leftJoin('Partners', 'Partners.id', '=', 'PartnerEmployees.partner_id')
                ->select('PartnerEmployees.id', 'PartnerEmployees.partner_id', 'PartnerEmployees.partner_employee_name', 'PartnerEmployees.partner_employee_position', 'PartnerEmployees.actual_l',
                    'Partners.partner_name','PartnerEmployees.created_at', 'PartnerEmployees.created_by', 'PartnerEmployees.updated_at', 'PartnerEmployees.updated_by')
                ->where('PartnerEmployees.id', $request->id)
                ->first()->toArray();

            $partnerEmployeeContactPersonsCount = count($PartnerEmployees['partner_employee_contact_person']);
            $PartnerEmployees = [$PartnerEmployees];
        }

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
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'partner_employee_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Position']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'partner_employee_position',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'actual_l',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'zone' => '1',
                                'order' => '3'
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

        $contact_persons_partner_link_title = $getArrayCaptions['PartnerEmployeeContactPersons']['translation_captions']['caption_translation'];
        if ($partnerEmployeeContactPersonsCount > 0)
            $contact_persons_partner_link_title .= " ( $partnerEmployeeContactPersonsCount )";

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),
            "main_data_models"  => [
                $mainModel => $PartnerEmployees,
            ],
            "add_data_models"   => [   ],
            "form_parameters"   => [
                "form_title" => $getArrayCaptions['PartnerEmployee']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => true,
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $PartnerEmployees[0]['partner_employee_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_type_list" => [
                ],
            ],
            "links"             => [
                [
                    "link_title" => $contact_persons_partner_link_title,
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/partnerEmployeeContactPersons"
                ],
            ],
            "dependent"         => [
                "dependent_data_model" => $mainModel,
                "dependent_fields" => [
                    "title" => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                    "model" => "partner_id",
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_data_model"      => $mainModel,
                        "options_field_id"        => "partner_id",
                        "options_field_id_value"  => '',
                        "options_field_title"     => "partner_name"
                    ],
                ],
                "width" => "100%",
            ],
            "tabs"              => $tabs
        ];

        return response()->json($card);
    }
}
