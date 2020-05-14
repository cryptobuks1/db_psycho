<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlLeasingSchedulePayments;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\BL\BlLeasingContract;
use App\Models\BL\BlLeasingCalculation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Route;
use App\Http\Classes\CheckController;

class BlLeasingContractsController extends Controller
{
    public function list_query() {
        return BlLeasingContract::with([
            'blstatuses', 'contractorContract', 'contractorContract.specifications',
            'contractorContract.specifications.leasingObjects',
            'contractorContract.specifications.leasingObjects.brand',
            'contractorContract.specifications.leasingObjects.model',
            'calculation.blstatus'
        ])->has('contractorContract')->has('calculation')
            ->whereHas('calculation.blstatus', function($query){
                $query->where("bl_status_name", "Расчет утвержден");
            });
    }

    public function list(Request $request)
    {
        $leasContracts = $this->list_query()->get()->toArray();
        $res = [];

        $captionName = ['Contracts', 'Number', 'Date', 'Status', 'LeasingSubject', 'PaymentVAT',
            'PaymentTimeLimit', 'PaymentStatus', 'PaymentNumber', 'PaymentBalance', 'CaseAccident',
            'CaseStealing', 'LosingDocuments', 'LeasingRules'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        foreach ($leasContracts as $leasContract) {
            $leasSubject = $leasContract['contractor_contract']['specifications'][0]['leasing_objects'][0]['brand']['bl_leasing_object_brand_name']
                . ' ' . $leasContract['contractor_contract']['specifications'][0]['leasing_objects'][0]['model']['bl_leasing_object_model_name'];

            //+Payment with VAT into money format
            $payment_VAT_str = str_replace(',', '.', $leasContract['d4_payment_with_VAT']);
            $payment_VAT_str = preg_replace('/\s+/u', '', $payment_VAT_str);
            $payment_VAT_num = number_format(floatval($payment_VAT_str), 2, ".", " ");
            //-

            //+Payment balance into money format
            $payment_bal_str = str_replace(',', '.', $leasContract['d8_payment_balance']);
            $payment_bal_str = preg_replace('/\s+/u', '', $payment_bal_str);
            $payment_bal_num = number_format(floatval($payment_bal_str), 2, ".", " ");
            //-
            $temp = [
                'id' => $leasContract['id'],
                'bl_leasing_contract_date' => $leasContract['contractor_contract']['contractor_contract_date'] ,
                'bl_leasing_contract_number' => $leasContract['contractor_contract']['contractor_contract_number'],
                'bl_leasing_contract_leasing_subject' => $leasSubject,
                'bl_leasing_contract_status' => $leasContract['d2_leasing_contract_status'],
                'bl_leasing_contract_payment_VAT' => $payment_VAT_num,
                'bl_leasing_contract_payment_time_limit' => $leasContract['d5_payment_deadline'],
                'bl_leasing_contract_payment_status' => $leasContract['d6_payment_status'],
                'bl_leasing_contract_payment_number' => $leasContract['d7_payment_number'],
                'bl_leasing_contract_payment_balance' => $payment_bal_num,
            ];
            array_push($res, $temp);
        }

        $list = [
            "main_data_models" => [
                "LeasingContracts" => $res,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['Contracts']['translation_captions']['caption_translation'],
                "form_code" => "BlLeasingContracts",
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "list_header_break_line" => true,
                "form_base_data_model" => "BlLeasingContracts",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "BlLeasingContracts",
                    "form_search_field" => "id",
                ],
            ],
            "links" => [

                ["link_title" => $getArrayCaptions['LeasingRules']['translation_captions']['caption_translation'],
                    "link_url" => "/faq?id=33",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",

                    "img" => ""
                ],
                ["link_title" => $getArrayCaptions['CaseAccident']['translation_captions']['caption_translation'],
                    "link_url" => "/faq?id=5",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",

                    "img" => ""
                ],
                ["link_title" => $getArrayCaptions['CaseStealing']['translation_captions']['caption_translation'],
                    "link_url" => "/faq?id=6",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",

                    "img" => ""
                ],
                ["link_title" => $getArrayCaptions['LosingDocuments']['translation_captions']['caption_translation'],
                    "link_url" => "/faq?id=3",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",

                    "img" => ""
                ],

            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Contracts']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['Contracts']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => "LeasingContracts",
                            "block_type" => "block_list_base",
                            "block_actions" => [
                                "fillRequest" => true,
                            ],
                            "block_fields" => [
                                ['key' => "actions", 'class' => 'list_checkbox', 'thStyle' => 'width: 6%'],
                                ['key' => "bl_leasing_contract_date", 'sortable' => true, 'typeVal' => 'date', 'class' => '', 'thStyle' => 'width: 10%', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'], "filter" => true,'format'  => 'DD-MM-YYYY',],
                                ['key' => 'bl_leasing_contract_number', 'sortable' => true, 'class' => '', 'thStyle' => 'width: 7%',
                                    "label" => $getArrayCaptions['Number']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "bl_leasing_contract_leasing_subject", 'sortable' => true, 'class' => '', 'thStyle' => 'width:15%',
                                    'label' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "bl_leasing_contract_status", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 8%',
                                    'label' => $getArrayCaptions['Status']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "bl_leasing_contract_payment_VAT", 'typeVal' => 'number', 'sortable' => true, 'class' => '', 'thStyle' => 'width: 10%', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['PaymentVAT']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => 'bl_leasing_contract_payment_number', 'sortable' => true, 'class' => '', 'thStyle' => 'width: 8%',
                                    "label" => $getArrayCaptions['PaymentNumber']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "bl_leasing_contract_payment_time_limit",'typeVal' => 'date', 'sortable' => true, 'class' => '', 'thStyle' => 'width: 13%',
                                    'label' => $getArrayCaptions['PaymentTimeLimit']['translation_captions']['caption_translation'], "filter" => true,'format'  => 'DD-MM-YYYY',],
                                ['key' => "bl_leasing_contract_payment_status", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 10%',
                                    'label' => $getArrayCaptions['PaymentStatus']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "bl_leasing_contract_payment_balance",'typeVal' => 'number', 'sortable' => true, 'class' => '', 'thStyle' => 'width: 13%',
                                    'label' => $getArrayCaptions['PaymentBalance']['translation_captions']['caption_translation'], "filter" => true],
                            ]
                        ],
                    ]
                ]
            ]
        ];

        return response()->json($list);
    }

    public function card_query($leasing_contract_id) {
        return BlLeasingContract::with(
            'salePoint',
            'physicalPerson.info',
            'contractorContract.specifications.leasingObjects.brand',
            'contractorContract.specifications.leasingObjects.model',
            'contractorContract.specifications.leasingObjects.dealer',
            'contractorContract.specifications.schedulePayments.scheduleArticle',
            'contractorContract.schedule',
            'calculation.blSchedule.blScheduleTabArticles'// достаем порядок следования статей графика для первой спецификации
        )
            ->where('id', $leasing_contract_id);
    }

    public function card(Request $request)
    {
        // достаем доступы
        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back',
            'CreatedAt',
            'UpdatedAt',
            'CreatedBy',
            'UpdatedBy',
            'SystemDetails',
            'Main',
            'Number',
            'Date',
            'Sum',
            'LeasingSubject',
            'Brand',
            'Model',
            'ProduceYear',
            'Dealer',
            'Insurance',
            'InsuranceOption',
            'Franchise',
            'ContractParameters',
            'LeasingProduct',
            'GetStateSubsidy',
            'VehicleCost',
            'AdvancePaymentPercent',
            'AdvancePaymentSum',
            'LeaseAgreementTerm',
            'LeaseStartDate',
            'RequestFillOut',
            'PaymentSchedule',
            'AdvancePayment',
            'LeasePayment',
            'ContractStatus',
            'PaymentVAT',
            'PaymentTimeLimit',
            'PaymentStatus',
            'PaymentNumber',
            'PaymentBalance',
            'RedemptionPayment',
            'PaymentFact',
            'Manager',
            'FIO',
            'cardEmail',
            'Phone',
            'Office',
            'Contract',
            'ScanDocuments'

        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $table_n = 86; // константа для обращения к лизинговому расчету

        $leasing_contract_id = (int)$request->id; // достаем id  договра из запроса

        // достаем данные по менеджеру, марке, модели, дилеру
        $leasing_contract = $this->card_query($leasing_contract_id)->first()->toArray();

        // достаем параметры договора
        $leasing_params = BlLeasingCalculation::with('blLeasingCalculationsTabAdditionalDetail.oneAddDetail')
            ->where('table_n_base', $table_n)
            ->where('row_id_base', $leasing_contract_id)->get()->toArray()[0];

        //вставляем в модель данные по  менеджеру, марке, модели, дилеру
        $leasing_contract_model = [
            "physical_person_name" => $leasing_contract['physical_person']['physical_person_name'] ?? "",
            "phone_number" => $leasing_contract['physical_person']['info'][0]['phone_number'] ?? "",
            "e_mail" => $leasing_contract['physical_person']['info'][0]['e_mail'] ?? "",
            "bl_sale_point_address" => $leasing_contract['sale_point']['bl_sale_point_address'] ?? "",
            "bl_leasing_object_brand_name" => $leasing_contract['contractor_contract']['specifications'][0]['leasing_objects'][0]['brand']['bl_leasing_object_brand_name'],
            "bl_leasing_object_brand_id" => $leasing_contract['contractor_contract']['specifications'][0]['leasing_objects'][0]['brand']['id'], // выводим на случай, если придется выводить селект

            "bl_leasing_object_model_name" => $leasing_contract['contractor_contract']['specifications'][0]['leasing_objects'][0]['model']['bl_leasing_object_model_name'],
            "bl_leasing_object_model_id" => $leasing_contract['contractor_contract']['specifications'][0]['leasing_objects'][0]['model']['id'], // выводим на случай, если придется выводить селект

            "bl_leasing_object_model_issue_year" => $leasing_contract['contractor_contract']['specifications'][0]['leasing_objects'][0]['model']['bl_leasing_object_model_issue_year'],

            "dealer" => $leasing_contract['contractor_contract']['specifications'][0]['leasing_objects'][0]['dealer']['contractor_full_name'],


        ];

        $contractor_contract_id = $leasing_contract['contractor_contract']['id'];

//        $schedule_rows = $leasing_contract['contractor_contract']['specifications'][0]['schedule_payments'];
        $schedule_rows = $leasing_contract['contractor_contract']['schedule'];


        $orderedArticles = $leasing_contract['calculation']['bl_schedule'][0]['bl_schedule_tab_articles'];


//        dd($orderedArticles);

        $grouped_articles = BlLeasingSchedulePayments::groupBy('bl_schedule_article_id', 'bl_schedule_article_name')
            ->rightJoin('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
            ->select('bl_schedule_article_name', 'bl_schedule_article_id')
            ->get()->toArray();

        $grouped_payment_plan = BlLeasingSchedulePayments::where('contractor_contract_id', $contractor_contract_id)
            ->selectRaw('bl_leasing_schedule_payment_date, bl_schedule_article_name, bl_schedule_article_id  ,sum(bl_leasing_schedule_payment_plan) as sum_plan')
            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
            ->orderBy('bl_leasing_schedule_payment_date', 'asc')
            ->groupBy('bl_leasing_schedule_payment_date', 'bl_schedule_article_id', 'bl_schedule_article_name')->get()->toArray();

        $grouped_payment_fact = BlLeasingSchedulePayments::where('contractor_contract_id', $contractor_contract_id)
            ->selectRaw('bl_leasing_schedule_payment_date ,sum(bl_leasing_schedule_payment_fact) as sum_fact')
            ->orderBy('bl_leasing_schedule_payment_date', 'asc')
            ->groupBy('bl_leasing_schedule_payment_date')->get()->toArray();

//

        $grouped_total_payment_plan =  BlLeasingSchedulePayments::where('contractor_contract_id', $contractor_contract_id)
            ->selectRaw('bl_schedule_article_name, bl_schedule_article_id  ,sum(bl_leasing_schedule_payment_plan) as total_plan')
            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
            ->groupBy('bl_schedule_article_id', 'bl_schedule_article_name')->get()->toArray();

        foreach ($grouped_total_payment_plan as $key=>&$value){
            $value['total_plan']= $this->formatNumbers($value['total_plan']);
        }
        unset($value);
        array_unshift($grouped_total_payment_plan,['bl_schedule_article_name'=>'number', 'total_plan'=>""]);// формируем подвал с суммой платежей
        array_unshift($grouped_total_payment_plan,['bl_schedule_article_name'=>'bl_leasing_schedule_payment_date', 'total_plan'=>"Итого"]);// формируем подвал с суммой платежей
        array_push($grouped_total_payment_plan,['bl_schedule_article_name'=>'sum_fact', 'total_plan'=>""]);// формируем подвал с суммой платежей




        foreach ($grouped_payment_fact as $key => &$value) {
            foreach ($grouped_payment_plan as $plan => $val) {

                if ($value['bl_leasing_schedule_payment_date'] == $val['bl_leasing_schedule_payment_date']) {
                    if (!array_key_exists($val['bl_schedule_article_name'], $value)) {
                        $value[$val['bl_schedule_article_name']] = ["value" =>$this->formatNumbers($val['sum_plan'])];
                    }
                }
            }
            $value['bl_leasing_schedule_payment_date'] = ["value" => $value['bl_leasing_schedule_payment_date']];
            if ($value['sum_fact'] === '0') {
                $value['sum_fact'] = '';
            }
            $value['sum_fact'] = ["value" => $this->formatNumbers($value['sum_fact'])];

        }
        unset($value);

        $number_payment = 0;
        foreach ($grouped_payment_fact as $key => &$value) {
            $total_plan = 0;
            $number_payment = $number_payment + 1;
            $value['number']['value']=$number_payment;
            foreach ($grouped_articles as $article => $art) {

                if (array_key_exists($art['bl_schedule_article_name'], $value) && $art['bl_schedule_article_id'] != null) {
                    $total_plan += (float)$value[$art['bl_schedule_article_name']]['value']; // увеличиваем счетчик плановых платежей по всем статьям за один день
                }

                if (!array_key_exists($art['bl_schedule_article_name'], $value) && $art['bl_schedule_article_id'] != null) {
                    $value[$art['bl_schedule_article_name']] = ['value' => ""];
                }

            }
            $now = Carbon::now();
            $payment_date = Carbon::parse($value['bl_leasing_schedule_payment_date']['value']);
            if ($payment_date < $now) {// если дата платежа меньше текущей даты

                if ($total_plan > $this->formatNumbers($value['sum_fact']['value'])) { // если запланированная сумма больше фактической
                    $value['_rowVariant'] = 'danger'; // платеж просрочен
                } else {
                    $value['_rowVariant'] = 'info';
                }


            }

        }
        unset($value);

        $max_line_n = sizeof($grouped_articles);

        foreach ($grouped_articles as $art => &$val) {
            foreach ($orderedArticles as $key => $value) {
                if ($value['bl_schedule_article_id'] === $val['bl_schedule_article_id']) {
                    $val['line_n'] = $value['line_n'];
                }
                if (!array_key_exists('line_n', $val)) {
                    $val['line_n'] = $max_line_n;
                    $max_line_n++;
                }

            }

        }
        unset($val);

        usort($grouped_articles, function ($item1, $item2) {
            return $item1['line_n'] <=> $item2['line_n'];
        });

        $table_fields = [];

        //Формируем список fields для ТЧ
        array_push($table_fields, [
            'key' => 'number',
            'edit' => true,
            "filter" => true,
            "sortable" => true,
            'type' => 'label',
            'typeVal' => 'number',
            'class' => '',
            "label" => "№",
            'thStyle' => 'width:6%',
            "zone" => "1",
            "order" => "2"
        ]);
        array_push($table_fields, [
            'key' => 'bl_leasing_schedule_payment_date',
            'edit' => true,
            "filter" => true,
            "sortable" => true,
            'type' => 'label',
            'typeVal' => 'date',
            'format'  => 'DD-MM-YYYY',
            'class' => '',
            "label" => "Дата",
            'thStyle' => 'width: 14%',
            "zone" => "1",
            "order" => "2"
        ]);
        foreach ($grouped_articles as $key => $value) {
            if ($value['bl_schedule_article_id'] != null) {
                array_push($table_fields, [
                    'key' => $value['bl_schedule_article_name'],
                    "filter" => true,
                    "sortable" => true,
                    'typeVal' => 'number',
                    'type' => 'label',
                    'format' => '0,0.00',
                    'class' => '',
                    'label' => $value['bl_schedule_article_name'],
                    'thStyle' => 'width: 15%'
                ]);
            }
        }
        array_push($table_fields, [
            'key' => "sum_fact",
            "filter" => true,
            "sortable" => true,
            'type' => 'label',
            'class' => '',
            'label' => "Факт оплата",
            'thStyle' => 'width: 15%',
            'format' => '0,0.00',
            "zone" => "1",
            "order" => "5",
            'typeVal' => 'number',
        ]);

        $schedule = $grouped_payment_fact;
        usort($schedule, function ($item1, $item2) {
            return Carbon::parse($item1['bl_leasing_schedule_payment_date']['value']) <=> Carbon::parse($item2['bl_leasing_schedule_payment_date']['value']);// сортируем платежи по дате
        });


        // вставляем в модель параметры договора
        foreach ($leasing_params['bl_leasing_calculations_tab_additional_detail'] as $key => $value) {
            switch ($value['one_add_detail']['one_add_detail_name']) {
                case 'Процент аванса':
                    $leasing_contract_model['prepaid_percentage'] = $value['one_add_detail_value'];
                    break;
                case 'Сумма аванса':
                    $leasing_contract_model['prepaid_sum'] = $this->formatNumbers($value['one_add_detail_value']);
                    break;
                case 'Дата начала лизинга':
                    $leasing_contract_model['leasing_start_date'] = $value['one_add_detail_value'];
                    break;
                case 'Лизинговый продукт':
                    $leasing_contract_model['leasing_product'] = $value['one_add_detail_value'];
                    break;
                case 'Есть субсидия':
                    $leasing_contract_model['pusrchased_with_state_subsidy'] = $value['one_add_detail_value'];
                    break;
                case 'Срок лизинга':
                    $leasing_contract_model['leasing_contract_term'] = $value['one_add_detail_value'];
                    break;
                case 'Стоимость имущества':
                    $leasing_contract_model['leasing_object_cost'] = $this->formatNumbers($value['one_add_detail_value']);
                    break;
                case 'Есть франшиза':
                    if ($value['one_add_detail_value'] == 'Да'){$leasing_contract_model['insurance_option'] = 'С франшизой';}
                    elseif ($value['one_add_detail_value'] == 'Нет'){$leasing_contract_model['insurance_option'] = 'Без франшизы';}
                    else $leasing_contract_model['insurance_option'] = $value['one_add_detail_value'];
                    break;
                case 'Сумма франшизы':
                    $leasing_contract_model['franchise'] = $this->formatNumbers($value['one_add_detail_value']);
                    break;


            }
        }

// определяем главные модели для карточки
        $controller = 'App\\Models\\Controller';
        $mainModel = $controller::where('controller_code', class_basename(Route::current()->controller))->value('controller_alias');
//

        //определяем доступы
        $nameControllerAccessRight = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];

        $formShowParam = (new CheckController($nameControllerAccessRight))->getShowFormParameters();

        $tabs=[
            [
                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
//                "tab_name" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => '',
                        "block_zone_quantity" => 2,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [

                            ['title' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'], "model_name"=>$mainModel,'model' => '', "grid_column"=>"1 / 8", 'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "1", "border_right" => false],

                            ['title' => $getArrayCaptions['ContractParameters']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                "model_name"=>$mainModel,'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "1"],

                            ['title' => $getArrayCaptions['Brand']['translation_captions']['caption_translation'], "grid_column"=>"1 / 8",
                                "model_name"=>$mainModel,'model' => 'bl_leasing_object_brand_name', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "2"],

                            ['title' => $getArrayCaptions['LeasingProduct']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                "model_name"=>$mainModel,'model' => 'leasing_product', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "2"],

                            ['title' => $getArrayCaptions['Model']['translation_captions']['caption_translation'],"grid_column"=>"1 / 8",
                                "model_name"=>$mainModel,'model' => 'bl_leasing_object_model_name', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "3",],

                            ['title' => $getArrayCaptions['GetStateSubsidy']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                "model_name"=>$mainModel,'model' => 'pusrchased_with_state_subsidy', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "3"],

                            ['title' => $getArrayCaptions['ProduceYear']['translation_captions']['caption_translation'],"grid_column"=>"1 / 8",
                                "model_name"=>$mainModel,'model' => 'bl_leasing_object_model_issue_year', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4"],
                            ['title' => $getArrayCaptions['VehicleCost']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                "model_name"=>$mainModel,'model' => 'leasing_object_cost', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4"],

                            ['title' => $getArrayCaptions['Dealer']['translation_captions']['caption_translation'],"grid_column"=>"1 / 8",
                                "model_name"=>$mainModel,'model' => 'dealer', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "5"],

                            ['title' => $getArrayCaptions['AdvancePaymentPercent']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                "model_name"=>$mainModel,'model' => 'prepaid_percentage', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "5"],


                            ['title' => $getArrayCaptions['Insurance']['translation_captions']['caption_translation'],"grid_column"=>"1 / 8",
                                "model_name"=>$mainModel,'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "6"],

                            ['title' => $getArrayCaptions['AdvancePaymentSum']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                'width' => '50%', "model_name"=>$mainModel,'model' => 'prepaid_sum', 'type' => 'text', "zone" => "1", "order" => "6"],

                            ['title' => $getArrayCaptions['InsuranceOption']['translation_captions']['caption_translation'],"grid_column"=>"1 / 8",
                                'width' => '50%', "model_name"=>$mainModel,'model' => 'insurance_option', 'type' => 'text', "zone" => "1", "order" => "7"],

                            ['title' => $getArrayCaptions['LeaseAgreementTerm']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                'width' => '50%', "model_name"=>$mainModel,'model' => 'leasing_contract_term', 'type' => 'text', "zone" => "1", "order" => "7"],

                            ['title' => $getArrayCaptions['Franchise']['translation_captions']['caption_translation'],"grid_column"=>"1 / 8",
                                'width' => '50%', "model_name"=>$mainModel,'model' => 'franchise', 'type' => 'text', "zone" => "1", "order" => "8"],

                            ['title' => $getArrayCaptions['LeaseStartDate']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                'width' => '50%', "model_name"=>$mainModel,'model' => 'leasing_start_date', 'type' => 'text', "zone" => "1", "order" => "8"],


                            ['title' => $getArrayCaptions['Manager']['translation_captions']['caption_translation'], "model_name"=>$mainModel,'model' => '', "grid_column"=>"1 / 16",
                                'type' => 'title', 'width' => '100%', "zone" => "1", "order" => "9"],

//                            ['title' => '1', "model_name"=>$mainModel,'model' => '', 'hidden' => true,
//                                'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "10"],

                            ['title' => $getArrayCaptions['FIO']['translation_captions']['caption_translation'],"grid_column"=>"1 / 8",
                                'width' => '50%', "model_name"=>$mainModel,'model' => 'physical_person_name', 'type' => 'text', "zone" => "1", "order" => "11"],

                            //todo при моб. версии нужно будет перенести в другую зону
                            ['title' => $getArrayCaptions['Phone']['translation_captions']['caption_translation'],"grid_column"=>"8 / 16",
                                'width' => '50%', "model_name"=>$mainModel,'model' => 'phone_number', 'type' => 'text', "zone" => "1", "order" => "12"],

                            ['title' => $getArrayCaptions['cardEmail']['translation_captions']['caption_translation'],"grid_column"=>"1 / 8",
                                'width' => '50%', "model_name"=>$mainModel,'model' => 'e_mail', 'type' => 'text', "zone" => "1", "order" => "13"],

                            //todo при моб. версии нужно будет перенести в другую зону
                            ['title' => $getArrayCaptions['Office']['translation_captions']['caption_translation'], "grid_column"=>"8 / 16","model_name"=>$mainModel,'model' => 'bl_sale_point_address', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "13"],


                        ]
                    ],

                    [
                        "block_title" => $getArrayCaptions['PaymentSchedule']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 1,
                        "block_model" => "PaymentSchedule",
                        "block_type" => "block_list_base",
                        //специальный обьект для вывода сумм в подвале таблицы
                        "list_footer"=>$grouped_total_payment_plan,
                        "block_parameters"=>[
                            "prevent_list_click" => true,
                            "show_list_legend"=>true,
                            "hide_filter"=>true // todo костыль
                        ],
                        "show_name" => true,
                        "block_fields" => $table_fields

                    ]

                ]
            ],
        ];

        if($formShowParam['show_system_tab']){

        $tabSystem=   [

            "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
            "blocks_quantity" => 1,
            "blocks" => [
                [
                    "block_zone_quantity" => 2,
                    "block_model" => $mainModel,
                    "block_type" => "block_card",
                    "block_fields" => [
                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                            "model_name"=>$mainModel,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                            "grid_column"=>"1/8",
                            "order" => "1"
                        ],

                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                           "model_name"=>$mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                            "grid_column"=>"8/16",
                            "order" => "2"
                        ],

                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                            "model_name"=>$mainModel,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                            "grid_column"=>"1/8",
                            "order" => "1"
                        ],

                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                            "model_name"=>$mainModel,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                            "grid_column"=>"8/16",
                            "order" => "2"
                        ],

                    ]
                ]
            ]


        ];

        array_push($tabs, $tabSystem); // добавляем служебный таб

            $leasing_contract_model['created_at']=$leasing_contract['created_at'];
            $leasing_contract_model['created_by']=$leasing_contract['created_by'];
            $leasing_contract_model['updated_at']=$leasing_contract['updated_at'];
            $leasing_contract_model['updated_by']=$leasing_contract['updated_by'];


    }

        $card = [

            "main_data_models" =>[
                $mainModel => [
                    $leasing_contract_model
                ],
                "PaymentSchedule" => $schedule
            ],

            "form_parameters" => [
                "form_title" => $leasing_contract["d2_leasing_contract_status"] ?? $getArrayCaptions['Contract']['translation_captions']['caption_translation'],
                "form_code" => "leasingContracts",
                "form_is_dependent" => false,
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "use_grid_layout"=>true,
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $leasing_contract['contractor_contract']['contractor_contract_name']


            ],
            "links" => [
                [
                    "link_title" => $getArrayCaptions['ScanDocuments']['translation_captions']['caption_translation'],
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/leasingContractsFiles"
                ],
            ],
            "sets" => $this->getButtonsList(['card_actions']),

            "tabs" => $tabs,


        ];

        return response()->json($card);

    }

    public function insert()
    {

    }

    public function update()
    {

    }

    /*public function delete(){

    }*/

    private function formatNumbers($number){
        $str_value = str_replace(',', '.', $number);
        $str_value = preg_replace('/\s+/u', '', $str_value);
        $num_value = number_format(floatval($str_value), 2, ".", " ");
        return $num_value;
    }
//    private function getUniqueValues($items, $key1, $key2)
//    {
//
//        $res = array_map(function ($item) use ($key1, $key2) {
//            return ($key2 != '') ? $item[$key1][$key2] : $item[$key1];
//        }, $items);
//
//        return array_unique($res);
//    }
//
//    private function getArticleValueByDate($rows, $date, $article_id, $unique_articles_names)
//    {
//
//        foreach ($rows as $key => $value) {
//            if ($value['bl_leasing_schedule_payment_date'] == $date && $value['bl_schedule_article_id'] == $article_id) {
//                return $value;
//            }
//        }
//        return ['schedule_article' => ['bl_schedule_article_name' => $unique_articles_names[$article_id]], 'bl_leasing_schedule_payment_plan' => 0, 'bl_leasing_schedule_payment_fact' => 0];
//    }
}
