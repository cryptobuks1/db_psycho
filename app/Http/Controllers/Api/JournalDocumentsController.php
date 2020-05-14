<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\BL\BlCustomerRequest;
use App\Models\BL\BlLeasingCalculation;
use App\Models\BL\BlLeasingContract;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;

class JournalDocumentsController extends Controller
{
    public function tree(Request $request)
    {
        $current_lang = \Lang::locale();

        $bl_customer_requests = BlCustomerRequest::query()
            ->from("blCustomerRequests as bl_customer_requests")
            ->with([
                "blLeasingCalculations.blCustomerRequestTabLeasingObjects",
                "blLeasingContracts"                                                       => function($query)
                {
                    $query->select("blLeasingContracts.*",
                        \DB::raw("'blLeasingContracts' as column_title"));
                },
                "blLeasingContracts.blLeasingContractSpecifications.blLeasingCalculations" => function($query)
                {
                    $query->select("blLeasingCalculations.*",
                        \DB::raw("'blLeasingCalculations' as column_title"));
                },
                "blLeasingContracts.blLeasingContractSpecifications.blLeasingCalculations.blLeasingContractSpecificationTabLeasingObjects",
                "blLeasingContracts.blInsurancePolicyContracts"
            ])
            ->leftJoin("blStatuses", "blStatuses.id", "=", "bl_customer_requests.bl_status_id")
            ->join("_Languages as Languages", function(JoinClause $join) use ($current_lang)
            {
                $join->where("Languages.language_code", "=", $current_lang);
            })
            // Join на caption DocumentBlCustomerRequests
            ->join("__Captions as DocumentBlCustomerRequestsCaption", function(JoinClause $join)
            {
                $join->where("DocumentBlCustomerRequestsCaption.caption_name", "=", "ClientRequest");
            })
            ->join("_TranslationCaptions as document_translation", function(JoinClause $join)
            {
                $join->on("document_translation.caption_id", "=",
                    "DocumentBlCustomerRequestsCaption.id")
                    ->on("document_translation.language_id", "=",
                        "Languages.id");
            })
            // Join на caption ot
            ->join("__Captions as otCaption", function(JoinClause $join)
            {
                $join->where("otCaption.caption_name", "=", "from");
            })
            ->join("_TranslationCaptions as from_translation", function(JoinClause $join)
            {
                $join->on("from_translation.caption_id", "=",
                    "otCaption.id")
                    ->on("from_translation.language_id", "=",
                        "Languages.id");
            })
            ->select(["bl_customer_requests.*", "blStatuses.bl_status_name",
//                      \DB::raw("CONCAT(document_translation.caption_translation, ' №', bl_customer_requests.bl_customer_request_number, ' ', from_translation.caption_translation, ' ', bl_customer_requests.bl_customer_request_date) as title")])
                      \DB::raw("CONCAT(document_translation.caption_translation) as title")])
            ->orderBy('created_at')
            ->get();


        return [
            "form_parameters"   => [
                "form_base_data_model" => "bl_customer_requests",
                "select_in_level" => true,  // Выделение только по 1 уровню
                "select_in_deep"  => false, // Выделение в глубину
                "show_checked"  => true, // Выделение в глубину
            ],
            "main_data_models"  => [
                "bl_customer_requests" => $bl_customer_requests
            ],
            "table_fields"      => [
                [
                    "label"       => "Номер",
                    "column_code" => "number"
                ],
                [
                    "label"       => "Дата",
                    "column_code" => "date"
                ],
                [
                    "label"       => "Статус",
                    "column_code" => "name"
                ],
                [
                    "label"       => "Предмет лизинга",
                    "column_code" => "code"
                ],
            ],
            "depths_parameters" => [
                [
                    "children_models" => ["bl_leasing_calculations", "bl_leasing_contracts"]
                ],
                [
                    "children_models" => ["bl_customer_request_tab_leasing_objects", "bl_leasing_contract_specifications", "bl_insurance_policy_contracts"]
                ],
                [
                    "children_models" => ["bl_leasing_calculations",]
                ],
                [
                    "children_models" => ["bl_leasing_contract_specification_tab_leasing_objects"]
                ],
                [
                    "children_models" => []
                ]
            ],
            "fields_parameters" => [
                "bl_customer_requests"                                  => [
                    "parameters" => [
                        "card_url"          => "createCustomerRequests",
                        "model_title_field" => "title",
                        "card_l"            => true
                    ],
                    "columns"    => [
                        [
                            "key"         => "bl_status_name",
                            "edit"        => true,
                            "label"       => "Статус",
                            "validation"  => null,
                            "column_code" => "name"
                        ],
                        [
                            "key"         => "bl_customer_request_number",
                            "edit"        => true,
                            "label"       => "Номер",
                            "validation"  => null,
                            "column_code" => "number"
                        ],
                        [
                            "key"         => "bl_customer_request_date",
                            "edit"        => true,
                            "label"       => "Дата",
                            "validation"  => null,
                            "column_code" => "date"
                        ]
                    ]
                ],
                "bl_leasing_calculations"                               => [
                    "parameters" => [
                        "card_url"          => BlLeasingCalculation::getCardUrl(),
                        "model_title_field" => "title",
                        "card_l"            => true
                    ],
                    "columns"    => [
                        [
                            "key"         => "bl_leasing_calculation_number",
                            "edit"        => true,
                            "label"       => "Номер",
                            "validation"  => null,
                            "column_code" => "number"
                        ],
                        [
                            "key"         => "bl_leasing_calculation_date",
                            "edit"        => true,
                            "label"       => "Дата",
                            "validation"  => null,
                            "column_code" => "date"
                        ]
                    ]
                ],
                "bl_customer_request_tab_leasing_objects"               => [
                    "parameters" => [
                        "card_url"          => "",
                        "model_title_field" => "title",
                        "card_l"            => false
                    ],
                    "columns"    => [
//                        [
//                            "key"         => "bl_leasing_object_type_name",
//                            "edit"        => true,
//                            "label"       => "Имя",
//                            "validation"  => null,
//                            "column_code" => "name"
//                        ],
//                        [
//                            "key"         => "bl_leasing_object_sum",
//                            "edit"        => true,
//                            "label"       => "Код",
//                            "validation"  => null,
//                            "column_code" => "code"
//                        ]
                    ]
                ],
                "bl_leasing_contracts"                                  => [
                    "parameters" => [
                        "card_url"          => BlLeasingContract::getCardUrl(),
                        "model_title_field" => "title",
                        "card_l"            => true
                    ],
                    "columns"    => [
                        [
                            "key"         => "d2_leasing_contract_status",
                            "edit"        => true,
                            "label"       => "Статус",
                            "validation"  => null,
                            "column_code" => "name"
                        ],
                        [
                            "key"         => "d5_payment_deadline",
                            "edit"        => true,
                            "label"       => "Дата",
                            "validation"  => null,
                            "column_code" => "date"
                        ]
                    ]
                ],
                "bl_insurance_policy_contracts"                         => [
                    "parameters" => [
                        "card_url"          => "",
                        "model_title_field" => "title",
                        "card_l"            => false
                    ],
                    "columns"    => [
                        [
                            "key"         => "d3_leasing_object",
                            "edit"        => true,
                            "label"       => "Имя",
                            "validation"  => null,
                            "column_code" => "code"
                        ],
                        [
                            "key"         => "d1_payment_term_next_installment",
                            "edit"        => true,
                            "label"       => "Дата",
                            "validation"  => null,
                            "column_code" => "date"
                        ]
                    ]
                ],
                "bl_leasing_contract_specifications"                    => [
                    "parameters" => [
                        "card_url"          => "",
                        "model_title_field" => "title",
                        "card_l"            => false
                    ],
                    "columns"    => [
//                        [
//                            "key"         => "contractor_contract_id",
//                            "edit"        => true,
//                            "label"       => "Номер",
//                            "validation"  => null,
//                            "column_code" => "number"
//                        ],
//                        [
//                            "key"         => "db_area_id",
//                            "edit"        => true,
//                            "label"       => "Код",
//                            "validation"  => null,
//                            "column_code" => "code"
//                        ]
                    ]
                ],
                "bl_leasing_contract_specification_tab_leasing_objects" => [
                    "parameters" => [
                        "card_url"          => "",
                        "model_title_field" => "title",
                        "card_l"            => false
                    ],
                    "columns"    => [
//                        [
//                            "key"         => "bl_leasing_contract_specification_id",
//                            "edit"        => true,
//                            "label"       => "Номер",
//                            "validation"  => null,
//                            "column_code" => "number"
//                        ],
//                        [
//                            "key"         => "line_n",
//                            "edit"        => true,
//                            "label"       => "Код",
//                            "validation"  => null,
//                            "column_code" => "code"
//                        ]
                    ]
                ],
            ]
        ];
    }
}
