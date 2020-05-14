<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Admin\ActionLogsTotalsController;
use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\BL\BlInsurancePolicyContract;
use App\Models\BL\BlLeasingContract;
use App\Models\BL\BlLeasingSchedulePayments;
use Carbon\Carbon;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePanelController extends Controller
{
    public function index(Request $request, ActionLogsTotalsController $action_logs_total_controller)
    {
        $captionName = ['LeasingContracts', 'Number', 'PaymentStatus', 'PaymentBalance', 'Contracts',
            'InsuranceContracts', 'Contract', 'LeasingSubject', 'ReportTableStatusReport', 'InsuranceContract',
            'Amount', 'PaymentsUnderLeaseContracts', 'PaymentsUnderLeaseContract', 'Paid',
            'Overdue', 'ToPay', 'ExchangeStatistics', 'today', 'thisweek', 'thismonth', 'Favorites',
            'AttendanceStatistics', 'NumberOfUsers', 'Object'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $leasing_contracts =BlLeasingContract ::with([
        'blstatuses', 'contractorContract', 'contractorContract.specifications',
        'contractorContract.specifications.leasingObjects',
        'contractorContract.specifications.leasingObjects.brand',
        'contractorContract.specifications.leasingObjects.model',
        'calculation.blstatus'
    ])->has('contractorContract')->has('calculation')
        ->whereHas('calculation.blstatus', function($query){
            $query->where("bl_status_name", "Расчет утвержден");
        })->get()->toArray();
        $insurance_contracts = BlInsurancePolicyContract::all(['d11_leasing_contract_name', 'd3_leasing_object', 'd2_leasing_contract_status']);

        $grouped_payment_plan = BlLeasingSchedulePayments::where('contractor_contract_id', 1)
            ->select(DB::raw('sum(bl_leasing_schedule_payment_plan) as total_plan, sum(bl_leasing_schedule_payment_fact) as total_fact'))->get()->toArray();

        $payments = BlLeasingSchedulePayments::where('contractor_contract_id', 1)->get()->toArray();

        $finished_payments = 0;
        $late_payments = 0;
        $future_payments = 0;

        foreach ($payments as $payment) {
            if (Carbon::parse($payment['bl_leasing_schedule_payment_date']) > Carbon::now()) {
                $future_payments += $payment['bl_leasing_schedule_payment_plan'];
            } else {
                if ($payment['bl_leasing_schedule_payment_plan'] > $payment['bl_leasing_schedule_payment_fact']) {
                    $late_payments += $payment['bl_leasing_schedule_payment_plan'];
                } else $finished_payments += $payment['bl_leasing_schedule_payment_plan'];
            }
        }

        $action_logs_total_controller->statisticFinish();

        return response()->json([
            "panel_items" => [
                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['Contracts']['translation_captions']['caption_translation'],
                        "type" => 'PanelList',
                        "column" => 1
                    ],
                    "items" => $leasing_contracts,
                    "fields" => [
                        ['key' => "contractor_contract_name", "label" => $getArrayCaptions['Number']['translation_captions']['caption_translation']],
                        ['key' => "d2_leasing_contract_status", 'label' => $getArrayCaptions['PaymentStatus']['translation_captions']['caption_translation']],
                        ['key' => "d8_payment_balance", 'label' => $getArrayCaptions['PaymentBalance']['translation_captions']['caption_translation']],
                    ]
                ],
                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['InsuranceContracts']['translation_captions']['caption_translation'],
                        "type" => 'PanelList',
                        "column" => 2
                    ],
                    "items" => $insurance_contracts,
                    "fields" => [
                        ['key' => "d11_leasing_contract_name", "label" => $getArrayCaptions['Contract']['translation_captions']['caption_translation']],
                        ['key' => "d3_leasing_object", 'label' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation']],
                        ['key' => "d2_leasing_contract_status", 'label' => $getArrayCaptions['ReportTableStatusReport']['translation_captions']['caption_translation']],
                    ]

                ],
                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['PaymentsUnderLeaseContracts']['translation_captions']['caption_translation'],
                        "type" => 'VueChart',
                        "chart_type" => 'Doughnut',
                        "column" => 2
                    ],
                    "items" => [
                        "labels" => [$getArrayCaptions['Paid']['translation_captions']['caption_translation'],
                                    $getArrayCaptions['Overdue']['translation_captions']['caption_translation'],
                                    $getArrayCaptions['ToPay']['translation_captions']['caption_translation']],
                        "datasets" => [
                            [
                                'label' => 'Data One',
                                'backgroundColor' => ['#ff5630', '#0065ff', '#ffab00', '#36b37e', '#00b8d9', '#6554c0'],
                                'data' => [$finished_payments, $late_payments, $future_payments]]
                        ]
                    ],

                ],
                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['InsuranceContract']['translation_captions']['caption_translation'],
                        "type" => "ItemSelection",
                        "column" => 1,
                        "filter_box_layout" => 'select',
                        "nested_component_type" => 'Zone',
                        "label_field" => 'd11_leasing_contract_name'
                    ],
                    "items" => $insurance_contracts,
                    "fields" => [
                        ['key' => "d11_leasing_contract_name", "label" => $getArrayCaptions['Contract']['translation_captions']['caption_translation']],
                        ['key' => "d3_leasing_object", 'label' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation']],
                        ['key' => "d2_leasing_contract_status", 'label' => $getArrayCaptions['ReportTableStatusReport']['translation_captions']['caption_translation']],
                    ]
                ],
                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['PaymentsUnderLeaseContract']['translation_captions']['caption_translation'],
                        "type" => "ItemSelection",
                        "column" => 1,
                        "filter_box_layout" => 'select',
                        "nested_component_type" => 'VueChart',
                        "chart_type" => 'Doughnut',
                        "label_field" => 'contract_name'
                    ],
                    "items" => [
                        ['contract_name' => '0000001 от 15.01.2020',
                            "labels" => [$getArrayCaptions['Paid']['translation_captions']['caption_translation'],
                                $getArrayCaptions['Overdue']['translation_captions']['caption_translation'],
                                $getArrayCaptions['ToPay']['translation_captions']['caption_translation']],
                            "datasets" => [
                                [
                                    'label' => 'Data One',
                                    'backgroundColor' => ['#36b37e', '#00b8d9', '#6554c0'],
                                    'data' => [$finished_payments, $late_payments, $future_payments]]
                            ]
                        ],
                        [
                            'contract_name' => '0000002 от 15.01.2020',
                            "labels" => [$getArrayCaptions['Paid']['translation_captions']['caption_translation'],
                                $getArrayCaptions['Overdue']['translation_captions']['caption_translation'],
                                $getArrayCaptions['ToPay']['translation_captions']['caption_translation']],
                            "datasets" => [
                                [
                                    'label' => 'Data One',
                                    'backgroundColor' => ['#36b37e', '#00b8d9', '#6554c0'],
                                    'data' => [$finished_payments + 100000, $late_payments - 2000000, $future_payments]]
                            ]
                        ],

                    ],
                    "fields" => [
                        ['key' => "d11_leasing_contract_name", "label" => $getArrayCaptions['Contract']['translation_captions']['caption_translation']],
                        ['key' => "d3_leasing_object", 'label' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation']],
                        ['key' => "d2_leasing_contract_status", 'label' => $getArrayCaptions['ReportTableStatusReport']['translation_captions']['caption_translation']],
                    ]
                ],

                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['ExchangeStatistics']['translation_captions']['caption_translation'],
                        "type" => "ItemSelection",
                        "filter_box_layout" => 'select',
                        "column" => 1,
                        "nested_component_type" => 'PanelList',
                        "filter_parameters" => [
                            ['title' => $getArrayCaptions['today']['translation_captions']['caption_translation'], "select_by" => 'today'],
                            ['title' => $getArrayCaptions['thisweek']['translation_captions']['caption_translation'], "select_by" => 'week'],
                            ['title' => $getArrayCaptions['thismonth']['translation_captions']['caption_translation'], "select_by" => 'month'],
                        ],
                        "label_field" => 'title'
                    ],
                    "items" => $this->getTopObjects(),
                    "fields" => [
                        ['key' => "name", "label" => $getArrayCaptions['Object']['translation_captions']['caption_translation']],
                        ['key' => "count", 'label' => $getArrayCaptions['Amount']['translation_captions']['caption_translation']],
                    ]
                ],

                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['Favorites']['translation_captions']['caption_translation'],
                        "type" => "Bookmarks",
                        "column" => 2,
                    ],
                    "items" => (new BookmarksController())->index(new Request(['consumer_id' => Auth::user()->id])),
                    "fields" => [
                        ['key' => "bookmark_representation", "label" => "Название"],

                    ]
                ],
                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['ExchangeStatistics']['translation_captions']['caption_translation'],
                        "type" => "ItemSelection",
                        "filter_box_layout" => 'tabs',
                        "column" => 2,
                        "nested_component_type" => 'PanelList',
                        "filter_parameters" => [
                            ['title' => $getArrayCaptions['today']['translation_captions']['caption_translation'], "select_by" => 'today'],
                            ['title' => $getArrayCaptions['thisweek']['translation_captions']['caption_translation'], "select_by" => 'week'],
                            ['title' => $getArrayCaptions['thismonth']['translation_captions']['caption_translation'], "select_by" => 'month'],
                        ],
                        "label_field" => 'title'
                    ],
                    "items" => $this->getTopObjects(),
                    "fields" => [
                        ['key' => "name", "label" => $getArrayCaptions['Object']['translation_captions']['caption_translation']],
                        ['key' => "count", 'label' => $getArrayCaptions['Amount']['translation_captions']['caption_translation']],
                    ]
                ],
                [
                    "form_parameters" => [
                        "item_heading" => $getArrayCaptions['AttendanceStatistics']['translation_captions']['caption_translation'],
                        "type" => 'VueChart',
                        "chart_type" => 'Bar',
                        "column" => 2
                    ],
                    "items" => [
                        "labels" => $action_logs_total_controller->getLabels(),
                        "datasets" => [
                            [
                                "label"=>$getArrayCaptions['NumberOfUsers']['translation_captions']['caption_translation'],
                                'backgroundColor' => '#00b8d9',
                                "data" => $action_logs_total_controller->getData()]
                        ]
                    ],

                ],
            ]
        ]);
    }

    // Статистика обмена, которые чаще всего обмениваются
    public function getTopObjects()
    {
        $action_types = ActionType::query()
            ->whereIn("action_type_code", ["ExchangeIn", "ExchangeOut"])
            ->pluck("id")
            ->toArray();

        $current_lang = \Lang::locale();

        $top_today = ActionLog::query()
            ->whereIn("__ActionLogs.action_type_id", $action_types)
            ->whereDate("__ActionLogs.created_at", now())
            ->join("__Controllers as controllers", "controllers.id", "=", "__ActionLogs.controller_id")
            ->leftJoin("_Languages", function (JoinClause $join) use ($current_lang) {
                $join->where("_Languages.language_code", "=", $current_lang);
            })
            ->leftJoin("__Captions", function (JoinClause $join) {
                $join->on("__Captions.caption_name", "=", "controllers.caption_code");
            })
            ->leftJoin("_TranslationCaptions as translation", function (JoinClause $join) {
                $join->on("translation.caption_id", "=", "__Captions.id")
                    ->on("translation.language_id", "=", "_Languages.id");
            })
            ->groupBy(["__ActionLogs.controller_id", "translation.caption_translation", "controllers.caption_code"])
            ->select(DB::raw(("count(*) as count")), DB::raw("(CASE 
                    WHEN translation.caption_translation is null 
                    THEN controllers.caption_code
                    ELSE translation.caption_translation END) as name"),
                DB::raw("'today' as select_name"))
            ->limit(5)
            ->orderBy("count", "desc")
            ->get()->toArray();

        $top_week = ActionLog::query()
            ->whereIn("__ActionLogs.action_type_id", $action_types)
            ->whereBetween("__ActionLogs.created_at", [now()->subWeek(), now()])
            ->join("__Controllers as controllers", "controllers.id", "=", "__ActionLogs.controller_id")
            ->leftJoin("_Languages", function (JoinClause $join) use ($current_lang) {
                $join->where("_Languages.language_code", "=", $current_lang);
            })
            ->leftJoin("__Captions", function (JoinClause $join) {
                $join->on("__Captions.caption_name", "=", "controllers.caption_code");
            })
            ->leftJoin("_TranslationCaptions as translation", function (JoinClause $join) {
                $join->on("translation.caption_id", "=", "__Captions.id")
                    ->on("translation.language_id", "=", "_Languages.id");
            })
            ->groupBy(["__ActionLogs.controller_id", "translation.caption_translation", "controllers.caption_code"])
            ->select(DB::raw(("count(*) count")), DB::raw("(CASE 
                    WHEN translation.caption_translation is null 
                    THEN controllers.caption_code
                    ELSE translation.caption_translation END) as name"),
                DB::raw("'week' as select_name"))
            ->limit(5)
            ->orderBy("count", "desc")
            ->get()->toArray();

        $top_month = ActionLog::query()
            ->whereIn("__ActionLogs.action_type_id", $action_types)
            ->whereBetween("__ActionLogs.created_at", [now()->subMonth(), now()])
            ->join("__Controllers as controllers", "controllers.id", "=", "__ActionLogs.controller_id")
            ->leftJoin("_Languages", function (JoinClause $join) use ($current_lang) {
                $join->where("_Languages.language_code", "=", $current_lang);
            })
            ->leftJoin("__Captions", function (JoinClause $join) {
                $join->on("__Captions.caption_name", "=", "controllers.caption_code");
            })
            ->leftJoin("_TranslationCaptions as translation", function (JoinClause $join) {
                $join->on("translation.caption_id", "=", "__Captions.id")
                    ->on("translation.language_id", "=", "_Languages.id");
            })
            ->groupBy(["__ActionLogs.controller_id", "translation.caption_translation", "controllers.caption_code"])
            ->select(DB::raw(("count(*) count")), DB::raw("(CASE 
                    WHEN translation.caption_translation is null 
                    THEN controllers.caption_code
                    ELSE translation.caption_translation END) as name"),
                DB::raw("'month' as select_name"))
            ->limit(5)
            ->orderBy("count", "desc")
            ->get()->toArray();

        return array_merge($top_today, $top_week, $top_month);
    }
}
