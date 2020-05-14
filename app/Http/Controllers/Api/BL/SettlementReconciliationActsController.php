<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Classes\CheckController;
use App\Models\BL\ContractorContract;
use App\Models\Contractor;
use App\Models\DbArea;
use App\Models\BL\SettlementReconciliationAct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class SettlementReconciliationActsController extends Controller
{
    public function list(Request $request)
    {
        //        return $request->headers;
        $acts = SettlementReconciliationAct::query()
            ->where("actual_l", true)
            ->with("contractorContract", "contractorContract.contractor:id,contractor_short_name")
            ->has("contractorContract")
            ->get();

        $contracts = ContractorContract::all();

        //        return "tesT";


        $captionName = ["Number", "Date", "Contract", "Contractor", "AcceptanceActs", "LeasingPaymentAccounts", "ReconciliationRecords",
                        "PeriodFrom", "PeriodBy", "PrintedForm"];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $main_model = \App\Models\Controller::where('controller_code', class_basename(Route::current()->controller))->value('controller_alias');

        $res = [];

        if($acts)
        {
            foreach($acts as $act)
            {
                $res[] = [
                    "id"                       => $act->id,
                    "doc_date"                 => date("d-m-Y", strtotime($act->doc_date)),
                    "doc_number"               => $act->doc_number,
                    "contractor_contract_id"   => $act->contractorContract->id,
                    "contractor_contract_name" => $act->contractorContract->contractor_contract_name,
                    "contractor_name"          => $act->contractorContract->contractor->contractor_short_name ?? null,
                    "start_date"               => date("d-m-Y", strtotime($act->start_date)),
                    "end_date"                 => date("d-m-Y", strtotime($act->end_date))
                ];
            }
        }

        $list = [
            "main_data_models" => [
                $main_model => $res
            ],
            "add_data_models"  => [
                "ContractorContracts" => $contracts
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['ReconciliationRecords']['translation_captions']['caption_translation'],
                "form_code"                     => $main_model,
                "form_is_dependent"             => true, // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "form_base_data_model"          => $main_model,
                "prevent_list_click"            => true,
                "list_header_break_line"        => true,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => $main_model,
                    "form_search_field" => "id",
                ],
            ],
            "dependent"        => [
                "dependent_data_model" => $main_model,
                "dependent_fields"     => [
                    "title"         => $getArrayCaptions['Contract']['translation_captions']['caption_translation'],
                    "model"         => "contractor_contract_id",
                    "type"          => "select",
                    "current_value" => "",
                    "options"       => [],
                    "options_data"  => [
                        "options_data_model"     => "ContractorContracts",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "contractor_contract_name",
                        "search"                 => ""
                    ]
                ],
                "width"                => "100%"
            ],
            "sets"             => $this->getButtonsList(["list_top_left_command_bar", "list_top_dropdown_actions",
                                                         "list_top_right_command_bar", "list_bottom", "list_top"]),
            "actions"          => [
                "actions_list" => [
                    'downloadFile' => [
                        'route' => '/admin/acts/download',
                    ]
                ],
            ],
            "tabs"             => [
                [
                    "tab_title"       => "Tab title",
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_title"         => "Block title",
                            "block_zone_quantity" => 1,
                            "block_model"         => $main_model,
                            "block_type"          => "block_list_base",
                            "block_actions"       => [
                                "fillRequest" => true,
                            ],
                            "block_fields"        => [
                                ['key'     => 'actions', 'sortable' => false,
                                 'class'   => 'list_checkbox',
                                 'thStyle' => 'width: 6%',
                                 "zone"    => "1",
                                 "order"   => "1"
                                ],
                                ['key'   => "doc_number", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 10%', 'options_data' => ['search' => ''],
                                 "label" => $getArrayCaptions['Number']['translation_captions']['caption_translation'], "filter" => true],
                                ['key'   => "doc_date", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 10%', 'options_data' => ['search' => ''],
                                 "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'], "filter" => true],
                                ['key'   => "start_date", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                                 'label' => $getArrayCaptions['PeriodFrom']['translation_captions']['caption_translation'], "filter" => true],
                                ['key'   => "end_date", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                                 'label' => $getArrayCaptions['PeriodBy']['translation_captions']['caption_translation'], "filter" => true],
                                ['key'   => "contractor_contract_name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%',
                                 "label" => $getArrayCaptions['Contract']['translation_captions']['caption_translation'], "filter" => true],
                                ['key'   => "contractor_name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%',
                                 "label" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'], "filter" => true],
                                ['key'   => "list_actions", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 8%',
                                 "label" => $getArrayCaptions['PrintedForm']['translation_captions']['caption_translation'], "filter" => true],
                            ]
                        ],
                    ]
                ]
            ]
        ];

        return response()->json($list);
    }

    public function requestCard(Request $request)
    {
        $captionName = ["DocumentKind", "Cancel", "Contract", "Contractor", "Sum", "OverEntirePeriod",
                        "ReconciliationRecords", "new",
                        "RequestAcceptanceActs", "RequestForMutualActs", "RequestLeasingPaymentsAccounts",
                        "Period", "By", "From", "RequestParameters", "ReceiveDocuments", "EnterPeriod"];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

//        $nameControllerMethod = [
//            'controller' => class_basename(Route::current()->controller),
//            // TODO ask about insert
//            'method'     => 'insert'
//        ];
//
//        $objAccess = (new CheckController($nameControllerMethod));
//        $access = $objAccess->checkControllerAccessRight();
//
//        if($access === false)
//        {
//            return abort('403');
//        }

        $contract = ContractorContract::where("id", $request->owner_id)->with("contractor")->get()->first();

        $main_model = \App\Models\Controller::where('controller_code', class_basename(Route::current()->controller))->value('controller_alias');


        $tabs = [
            [
                "tab_title"        => "Tab title",
                "tab_name"         => false,
                "tab_description"  => '',
                "hide_tab_as_link" => true,
                "blocks_quantity"  => 1,
                "blocks"           => [
                    [
                        "block_title"         => $getArrayCaptions['RequestForMutualActs']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 2,
                        "block_model"         => $main_model,
                        "block_type"          => "block_card",
                        "block_fields"        => [


                            ['title' => $getArrayCaptions['Period']['translation_captions']['caption_translation'], 'width' => '100%',
                             'model' => '', 'type' => 'title', "zone" => "1", "order" => "1", "border_right" => false],
                            ['title' => $getArrayCaptions["EnterPeriod"]['translation_captions']['caption_translation'], 'model' => 'date',
                             'type'  => 'double-date', 'width' => '50%', "zone" => "1", "order" => "2", "border_right" => false],
                            ['title' => $getArrayCaptions["OverEntirePeriod"]['translation_captions']['caption_translation'], 'model' => 'entire_period',
                             'type'  => 'checkbox', 'width' => '30%', "zone" => "1", "order" => "4", "border_right" => false],
                            ['title' => $getArrayCaptions['RequestParameters']['translation_captions']['caption_translation'], 'width' => '100%',
                             'model' => '', 'type' => 'title', "zone" => "1", "order" => "5", "border_right" => false],
                            ['title' => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'], 'width' => '100%',
                             'model' => 'contractor_name', 'type' => 'label', "zone" => "1", "order" => "5", "border_right" => false],
                            ['title' => $getArrayCaptions['Contract']['translation_captions']['caption_translation'], 'width' => '100%',
                             'model' => 'contract', 'type' => 'label', "zone" => "1", "order" => "6", "border_right" => false],
                            ['title' => $getArrayCaptions['DocumentKind']['translation_captions']['caption_translation'], 'width' => '100%',
                             'model' => 'document_kind', 'type' => 'label', "zone" => "1", "order" => "6", "border_right" => false],
                        ]
                    ],
                ]
            ],
        ];


        $res = [[
                  "date"                   => [
                      'from' => Carbon::now()->startOfMonth()->toDateString(),
                      'to'   => date("Y-m-d")
                  ],
                  "entire_period"          => false,
                  "contractor_name"        => $contract->contractor->contractor_short_name,
                  "contract"               => $contract->contractor_contract_name,
                  "contractor_contract_id" => $contract->id,
                  "document_kind"          => $getArrayCaptions['ReconciliationRecords']['translation_captions']['caption_translation']

                ]];


        $card = [
            "sets" => $this->getButtonsList(['request_card_actions']),

            "main_data_models" => [
                //                $mainModel => $ColumnContractor
                $main_model => $res
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_code"                     => $main_model,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $main_model,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $getArrayCaptions['RequestForMutualActs']['translation_captions']['caption_translation'],
            ],

            "tabs" => $tabs
        ];

        return response()->json($card);
    }

    public function getDocuments(Request $request)
    {
        $form_base_data_model = $request["form_parameters"]["form_base_data_model"];

        $main_data_model = $request["main_data_models"][$form_base_data_model][0];

        $db_area_id = self::getParameter("DefaultDbAreaIDForGettingDocuments");

        $db_area = DbArea::query()
            ->where("id", $db_area_id)
            ->with(["dBase.dbType", "dBase.serverDb"])
            ->get()->first();
        if(is_null($main_data_model["contractor_contract_id"]))
            return response()->json([
                "error" => true,
                "message" => "Выберите договор"
            ], 400);
        $contractor_contract = ContractorContract::query()
            ->where("id", $main_data_model["contractor_contract_id"])
            ->with("contractor")
            ->get()->first();

        $db_area = DbArea::query()->where("id", $contractor_contract->db_area_id)
            ->get()->first();


        if($main_data_model["entire_period"] == false)
        {
            $from = date("Y-m-d", strtotime($main_data_model["date"]["from"]));

            $to = date("Y-m-d", strtotime($main_data_model["date"]["to"]));
        }
        else
        {
            $from = $contractor_contract->contractor_contract_date ?? date("Y-m-d");

            $to = date("Y-m-d");
        }


        // Reset all acts than belong to current $contractor_contract
        // actual_l to false
        SettlementReconciliationAct::query()
            ->where("contractor_contract_id", $contractor_contract->id)
            ->whereBetween("doc_date", [$from, $to])
            ->update([
                "actual_l" => false
            ]);

        $array_to_send = [
            "request" => [
                "db_area_code"       => $db_area->db_area_code,
                "request_name"       => "RequestForPrintDocs",
                "request_parameters" => [
                    "document_type"           => "settlement_reconciliation_acts",
                    "contractor_uid"          => $contractor_contract->contractor->uid_1c_code,
                    "contractor_contract_uid" => $contractor_contract->uid_1c_code,
                    "date_from"               => $from,
                    "date_to"                 => $to
                ]
            ]
        ];


        $result = \OneC::sendRequest($db_area,"/hs/api/print_docs", $array_to_send)
            ->getResultArray();

        if($result->status->status_code == 1)
        {
            return response()->json([
                "error"   => false,
                "message" => "Запрос отправлен в обработку"
            ]);
        }
        elseif($result->status->status_code == 0)
        {
            return response()->json([
                "error"   => true,
                "message" => "Ошибка при отправке запроса"
            ], 400);
        }

    }
}
