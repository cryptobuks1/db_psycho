<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Classes\CheckController;
use App\Http\Middleware\CheckAccess;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BL\BlCustomerRequest;
use App\Models\BL\BlCustomerRequestTabLeasingObject;
use App\Models\BL\BlLeasingCalculation;
use App\Models\BL\BlLeasingCalculationsTabAdditionalDetail;
use App\Models\BL\BlLeasingObjectGroup;
use App\Models\BL\BlScheduleArticle;
use App\Models\BL\BlScheduleTabArticle;
use App\Models\BL\BlSchedule;
use App\Models\BL\BlScheduleTabSchedule;
use App\Models\CalculationParameterAnswerList;
use App\Models\CalculationTemplate;
use App\Models\CalculationTemplateParameterSetting;
use App\Models\Contractor;
use App\Models\DbAreaFile;
use App\Models\FileType;
use App\Models\ModelTables;
use App\Models\ONE\OneAdditionalDetail;
use App\Models\StoredFile;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Psr7\copy_to_string;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Stmt\ElseIf_;
use Symfony\Component\HttpFoundation\Tests\JsonSerializableObject;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

class BlLeasingCalculationsController extends Controller
{
    use HasList, HasCard;

    /* Переменные */

    /**
     * @var bool
     */
    public $isset_dependent;

    /**
     * @var \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    private $customer_request;

    /**
     * @var integer
     */
    private $card_model_id;

    /**
     * @var array
     */
    private $schedule_articles;

    /**
     * @var array
     */
    private $add_detail_add_models;

    /**
     * @var array
     */
    private $add_detail_main_models;

    /**
     * @var array
     */
    private $add_detail_block_fields;


    /* Методы получения Списка */
    protected function listQuery()
    {
        $request = request();
        if (isset($request["dependent"])) {
            $this->isset_dependent = true;

            $customer_requests_ids = [$request["dependent"]["id"]];

            $this->customer_request = BlCustomerRequest::query()->find($request["dependent"]["id"], ["id", "bl_customer_request_number"]);
        } else {
            $this->isset_dependent = false;
            $customer_requests_ids = BlCustomerRequest::query()->select('id')->get();

            if ($customer_requests_ids)
                $customer_requests_ids = $customer_requests_ids->toArray();
        }


        $this->list_model = BlLeasingCalculation::with('blLeasingCalculationsTabAdditionalDetail',
            'blLeasingCalculationsTabAdditionalDetail.oneAddDetail')
            ->join('blCustomerRequestTabLeasingObjects as CustReqTabLeasObj', function ($query) {
                return $query->whereColumn('CustReqTabLeasObj.bl_customer_request_id', '=', 'blLeasingCalculations.row_id_base')
                    ->whereColumn('CustReqTabLeasObj.bl_leasing_object_group_id', '=', 'blLeasingCalculations.bl_leasing_object_group_id')
                    ->where(function ($query) {
                        return $query->where('CustReqTabLeasObj.bl_leasing_calculation_main_document_id', null)
                            ->orWhereColumn('CustReqTabLeasObj.bl_leasing_calculation_main_document_id', '=', 'blLeasingCalculations.id');
                    });
            })
            ->join('blLeasingObjectBrands as LeasObjBrands', 'CustReqTabLeasObj.bl_leasing_object_brand_id', '=',
                'LeasObjBrands.id')
            ->join('blLeasingObjectModels as LeasObjModels', 'CustReqTabLeasObj.bl_leasing_object_model_id', '=',
                'LeasObjModels.id')
            ->whereIn('row_id_base', $customer_requests_ids ? $customer_requests_ids : [])
            ->where('table_n_base', 81)
            ->groupBy("blLeasingCalculations.id", "LeasObjModels.bl_leasing_object_model_name",
                "LeasObjBrands.bl_leasing_object_brand_name")
            ->select('blLeasingCalculations.*', 'LeasObjModels.bl_leasing_object_model_name',
                'LeasObjBrands.bl_leasing_object_brand_name');

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get()->toArray();

        return $this;
    }

    public function prepareListModelData()
    {
        $items = $this->list_model;

        $this->list_model = [];

        foreach ($items as $item) {
            $sum = 0;
            foreach ($item['bl_leasing_calculations_tab_additional_detail'] as $tabAdditionalDet) {
                if ($tabAdditionalDet['one_add_detail']['one_add_detail_name'] == "Стоимость имущества") {
                    $str_value = str_replace(',', '.', $tabAdditionalDet['one_add_detail_value']);
                    $str_value = preg_replace('/\s+/u', '', $str_value);
                    $num_value = number_format(floatval($str_value), 2, ".", " ");
                    $sum = $num_value;
                    break;
                }
            }

            $leasingSubjectObj = "-";
            //if ($table == "App\Models\BL\BlCustomerRequest ") {
            $leasingSubjectObj = $item['bl_leasing_object_brand_name'] . " " . $item['bl_leasing_object_model_name'];

            //}


            $this->list_model[] = [
                'number' => $item['bl_leasing_calculation_number'],
                'date' => $item['bl_leasing_calculation_date'],
                'leasingSubject' => $leasingSubjectObj,
                'sum' => $sum,
                "id" => $item['id']
            ];
        }

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = ['Number', 'Date', 'Sum', 'LeasingSubject', 'EditingAttachedDocuments', 'PreliminaryOffers',
            'GetCommercialOffer', 'GeneralLeasingIssues', 'RequestNew', 'CustomerRequest', 'NewCustomerRequest', 'PrintedForm'];

        $this->translateListCaptions();

        return $this;
    }

    public function setListBlockFields()
    {
        $this->actions = [
            "actions_list" => [
                'downloadFile'     => [
                    'route' => '/admin/acts/download',
                ],
                'preview_att_file' => [
                    'route' => '/admin/acts/download',
                    'code'  => 'preview_att_file',
                ],
            ]
        ];
        $this->list_block_fields = [
            [
                "block_title" => $this->getTranslatedListCaption("PreliminaryOffers"),
                "block_zone_quantity" => 1,
                "block_model" => $this->list_controller_alias,
                "block_type" => "block_list_base",
                "block_actions" => [
                    "fillRequest" => true,
                ],
                "block_fields" => [
                    ['key' => "actions", 'class' => 'list_checkbox', 'thStyle' => 'width: 10%'],
                    ['key' => "date", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%', 'options_data' => ['search' => ''],
                        "label" => $this->getTranslatedListCaption("Date"), 'typeVal' => 'date', "filter" => true, 'format' => 'DD-MM-YYYY',],
                    ['key' => 'number', 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%',
                        "label" => $this->getTranslatedListCaption("Number"), "filter" => true],
                    ['key' => "sum", 'sortable' => true, 'class' => '', 'thStyle' => 'width:20%', 'format' => '0,0.00',
                        'label' => $this->getTranslatedListCaption("Sum"), 'typeVal' => 'number', "filter" => true],
                    ['key' => "leasingSubject", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 34%',
                        'label' => $this->getTranslatedListCaption("LeasingSubject"), "filter" => true],
                    ['key' => "list_actions", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 12%',
                        'label' => $this->getTranslatedListCaption("PrintedForm"), "filter" => true],
                ]
            ],
        ];

        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "PreliminaryOffers";

        return $this;
    }

    public function setListLinks()
    {
        $this->list_links = [

            ["link_title" => $this->getTranslatedListCaption("RequestNew"),
                "link_url" => "/contractorRequests/new",
                "class" => "btn btn-link-inline",
                "link_type" => "internal",
                "img" => ""
            ],
            ["link_title" => $this->getTranslatedListCaption("GeneralLeasingIssues"),
                "link_url" => "/faq?id=9",
                "class" => "btn btn-link-inline",
                "link_type" => "internal",

                "img" => ""
            ],
            ["link_title" => $this->getTranslatedListCaption("GetCommercialOffer"),
                "link_url" => "/faq?id=32",
                "class" => "btn btn-link-inline",
                "link_type" => "internal",

                "img" => ""
            ],

        ];

        return $this;
    }

    public function setListDependent()
    {
        $this->list_dependent = $this->isset_dependent;

        return $this;
    }

    public function setListDependentBlock()
    {
        if ($this->list_dependent) {
            $this->list_dependent_block = [
                "dependent_data_model" => $this->list_controller_alias,
                "dependent_fields" => [
                    "title" => $this->getTranslatedListCaption("CustomerRequest"),
                    "model" => "row_id_base",
                    "type" => "label",
                    "current_value" => $this->customer_request->bl_customer_request_number ?? $this->getTranslatedListCaption("NewCustomerRequest"),
                    "options" => [],
                    "options_data" => [
                        "options_data_model" => $this->list_controller_alias,
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => "bl_customer_request_number",
                        "search" => ''
                    ],
                ],
                "width" => "100%",
            ];
        } else
            $this->list_dependent_block = [];

        return $this;
    }

    public function list_query($customerRequestArrayId)
    {
        return BlLeasingCalculation::with('blLeasingCalculationsTabAdditionalDetail',
            'blLeasingCalculationsTabAdditionalDetail.oneAddDetail')
            ->join('blCustomerRequestTabLeasingObjects as CustReqTabLeasObj', function ($query) {
                return $query->whereColumn('CustReqTabLeasObj.bl_customer_request_id', '=', 'blLeasingCalculations.row_id_base')
                    ->whereColumn('CustReqTabLeasObj.bl_leasing_object_group_id', '=', 'blLeasingCalculations.bl_leasing_object_group_id')
                    ->where(function ($query) {
                        return $query->where('CustReqTabLeasObj.bl_leasing_calculation_main_document_id', null)
                            ->orWhereColumn('CustReqTabLeasObj.bl_leasing_calculation_main_document_id', '=', 'blLeasingCalculations.id');
                    });
            })
            ->join('blLeasingObjectBrands as LeasObjBrands', 'CustReqTabLeasObj.bl_leasing_object_brand_id', '=',
                'LeasObjBrands.id')
            ->join('blLeasingObjectModels as LeasObjModels', 'CustReqTabLeasObj.bl_leasing_object_model_id', '=',
                'LeasObjModels.id')
            ->whereIn('row_id_base', $customerRequestArrayId ? $customerRequestArrayId->toArray() : [])
            ->where('table_n_base', 81)
            ->groupBy("blLeasingCalculations.id", "LeasObjModels.bl_leasing_object_model_name", "LeasObjBrands.bl_leasing_object_brand_name")
            ->select('blLeasingCalculations.*', 'LeasObjModels.bl_leasing_object_model_name',
                'LeasObjBrands.bl_leasing_object_brand_name');
    }

    public function listold(Request $request)
    {
        $customerRequestArrayId = BlCustomerRequest::query()->select('id')->get();
        $leasingCalc = $this->list_query($customerRequestArrayId)->get()->toArray();

        $captionName = ['Number', 'Date', 'Sum', 'LeasingSubject', 'EditingAttachedDocuments', 'PreliminaryOffers',
            'GetCommercialOffer', 'GeneralLeasingIssues', 'RequestNew'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $arr = [];

        foreach ($leasingCalc as $key => $value) {
            $tLeasCalc = [];
            //$table = 'App\Models\BL\\' . ModelTables::where('table_n', $value['table_n_base'])->pluck('table_code')->first();

            $sum = 0;
            foreach ($value['bl_leasing_calculations_tab_additional_detail'] as $tabAdditionalDet) {
                if ($tabAdditionalDet['one_add_detail']['one_add_detail_name'] == "Стоимость имущества") {
                    $str_value = str_replace(',', '.', $tabAdditionalDet['one_add_detail_value']);
                    $str_value = preg_replace('/\s+/u', '', $str_value);
                    $num_value = number_format(floatval($str_value), 2, ".", " ");
                    $sum = $num_value;
                    break;
                }
            }

            $leasingSubjectObj = "-";
            //if ($table == "App\Models\BL\BlCustomerRequest ") {
            $leasingSubjectObj = $value['bl_leasing_object_brand_name'] . " " . $value['bl_leasing_object_model_name'];

            //}

            $arr[] = [
                'number' => $value['bl_leasing_calculation_number'],
                'date' => $value['bl_leasing_calculation_date'],
                'leasingSubject' => $leasingSubjectObj,
                'sum' => $sum,
                "id" => $value['id']
            ];
        }

        $list = [
            "main_data_models" => [
                $mainModel => $arr,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['PreliminaryOffers']['translation_captions']['caption_translation'],
                "form_code" => "leasingCalculations",
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/contractors_new/",
                    "form_search_field" => "",
                ],
            ],
            "sets" => $this->getButtonsList(["list_top_left_command_bar", "list_top_dropdown_actions",
                "list_top_right_command_bar", "list_bottom", "list_top"]),
            "links" => [

                ["link_title" => $getArrayCaptions['RequestNew']['translation_captions']['caption_translation'],
                    "link_url" => "/contractorRequests/new",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",
                    "img" => ""
                ],
                ["link_title" => $getArrayCaptions['GeneralLeasingIssues']['translation_captions']['caption_translation'],
                    "link_url" => "/faq?id=9",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",

                    "img" => ""
                ],
                ["link_title" => $getArrayCaptions['GetCommercialOffer']['translation_captions']['caption_translation'],
                    "link_url" => "/faq?id=32",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",

                    "img" => ""
                ],

            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['PreliminaryOffers']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['PreliminaryOffers']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_actions" => [
                                "fillRequest" => true,
                            ],
                            "block_fields" => [
                                ['key' => "actions", 'class' => 'list_checkbox', 'thStyle' => 'width: 10%'],
                                ['key' => "date", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'], 'typeVal' => 'date', "filter" => true, 'format' => 'DD-MM-YYYY',],
                                ['key' => 'number', 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%',
                                    "label" => $getArrayCaptions['Number']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "sum", 'sortable' => true, 'class' => '', 'thStyle' => 'width:20%', 'format' => '0,0.00',
                                    'label' => $getArrayCaptions['Sum']['translation_captions']['caption_translation'], 'typeVal' => 'number', "filter" => true],
                                ['key' => "leasingSubject", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 34%',
                                    'label' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'], "filter" => true],
                            ]
                        ],
                    ]
                ]
            ]
        ];

        return response()->json($list);
    }


    /* Методы получения Карточки */
    public function card_query($leasingCalculationId, $customerRequestArrayId)
    {
        return BlLeasingCalculation::with(['blLeasingCalculationsTabAdditionalDetail' => function ($query) {
            $query->leftJoin('OneAdditionalDetail as oneAD', 'oneAD.id', '=', 'one_add_detail_id')
                ->orderBy('line_n')->select('blLeasingCalculationsTabAdditionalDetails.*', 'oneAD.one_add_detail_name');
        },
            'blLeasingCalculationsTabAdditionalDetail.oneAddDetail'])
            ->whereIn('row_id_base', $customerRequestArrayId ? $customerRequestArrayId->toArray() : [])
            ->where("id", $leasingCalculationId)
            ->select('id', 'bl_leasing_object_group_id', 'row_id_base', 'table_n_base', 'bl_leasing_calculation_number', 'bl_leasing_calculation_date',
                'created_at', 'created_by', 'updated_at', 'updated_by', 'db_area_id', 'calculating_l', 'item_line_code', 'stored_file_id', 'calculation_template_id');
    }

//    public function card(Request $request)
//    {
//        $leasingCalcId = $request->id;
//        $customerRequestArrayId = BlCustomerRequest::query()->select('id')->get();
//        $leasingCalc = $this->card_query($leasingCalcId, $customerRequestArrayId)->get();
//
//        if ($leasingCalc->count() > 0)
//            $leasingCalc = $leasingCalc->first()->toArray();
//        else
//            return response()->json([], 403);
//
//        $captionName = ['PreliminaryOffers', 'PreliminaryOffer', 'Number', 'Date', 'LeasingSubject', 'Brand',
//            'Model', 'ProduceYear', 'Dealer', 'Insurance', 'InsuranceOption',
//            'Franchise', 'ContractParameters', 'LeasingProduct', 'GetStateSubsidy',
//            'VehicleCost', 'AdvancePaymentPercent', 'AdvancePaymentSum',
//            'LeaseAgreementTerm', 'LeaseStartDate', 'RequestFillOut', 'PaymentSchedule',
//            'AdvancePayment', 'LeasePayment', 'ok', 'apply', 'back', 'CreatedAt',
//            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemDetails', 'Since', 'View'];
//        $getArrayCaptions = $this->getTranslateByKeys($captionName);
//
//        $model = 'App\Models\Controller';
//        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))->value('controller_alias');
//
//        //+Получение прав доступа
//
//        $nameControllerMethod = [
//            'controller' => class_basename(Route::current()->controller),
//            'accessRight' => 'record'
//        ];
//
//        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();
//
//        //-Получение прав доступа
//
//        //+Получаем поля в заголовке Предмет лизинга
//
//        $leasingObject = BlCustomerRequestTabLeasingObject::with('blCustomerRequests', 'blLeasingObjectBrands', 'blLeasingObjectModels')
//            ->where([
//                'bl_leasing_object_group_id' => $leasingCalc['bl_leasing_object_group_id'],
//                'bl_leasing_calculation_main_document_id' => $leasingCalc['id'],
//                'bl_customer_request_id' => $leasingCalc['row_id_base']
//            ])
//            ->orWhere(function ($query) use ($leasingCalc) {
//                $query->where([
//                    'bl_leasing_object_group_id' => $leasingCalc['bl_leasing_object_group_id'],
//                    'bl_leasing_calculation_main_document_id' => null,
//                    'bl_customer_request_id' => $leasingCalc['row_id_base']
//                ]);
//            })
//            ->orderBy("bl_leasing_calculation_main_document_id", "asc")
//            ->get()->toArray()[0];
//
//        $leasingObjBrandName = $leasingObject['bl_leasing_object_brands']['bl_leasing_object_brand_name'];
//        $leasingObjModelName = $leasingObject['bl_leasing_object_models']['bl_leasing_object_model_name'];
//        $leasingObjModelYearIssueYear = $leasingObject['bl_leasing_object_models']['bl_leasing_object_model_issue_year'];
//        //$LeasingObjDealer               = Contractor::where("id", $leasingObject['bl_customer_requests']['supplier_contractor_id'])
//        //    ->pluck('contractor_short_name')->first();
//        $LeasingObjDealer = $leasingObject['supplier_name'];
//
//        //---22.04.2019 Miniyar
//
//        //-
//
//        //+Получаем поля в заголовках Страхование и Пар-ры договора из OneAdditionalDetails
//        $addDetails = [
//            'InsuranceOption' => '--',
//            'Franchise' => '--',
//            'LeasingProduct' => '--',
//            'GetStateSubsidy' => '--',
//            'VehicleCost' => '--',
//            'AdvancePaymentPercent' => '--',
//            'AdvancePaymentSum' => '--',
//            'LeaseAgreementTerm' => '--',
//            'LeaseStartDate' => '--',
//        ];
//        foreach ($leasingCalc['bl_leasing_calculations_tab_additional_detail'] as $tabAdditionalDet) {
//            switch ($tabAdditionalDet['one_add_detail']['one_add_detail_name']) {
//                case "Есть франшиза":
//                    {
//                        if ($tabAdditionalDet['one_add_detail_value'] == "Нет") {
//                            $addDetails['InsuranceOption'] = "Без франшизы";
//                        } elseif ($tabAdditionalDet['one_add_detail_value'] == "Да") {
//                            $addDetails['InsuranceOption'] = "С франшизой";
//                        } else {
//                            $addDetails['InsuranceOption'] = "";
//                        }
//                        continue;
//                    }
//                case "Сумма франшизы":
//                    {
//                        $addDetails['Franchise'] = $tabAdditionalDet['one_add_detail_value'];
//                        continue;
//                    }
//                case "Лизинговый продукт":
//                    {
//                        $addDetails['LeasingProduct'] = $tabAdditionalDet['one_add_detail_value'];
//                        continue;
//                    }
//                case "Есть субсидия":
//                    {
//                        $addDetails['GetStateSubsidy'] = $tabAdditionalDet['one_add_detail_value'];
//                        continue;
//                    }
//                case "Стоимость имущества":
//                    {
//                        $str_value = str_replace(',', '.', $tabAdditionalDet['one_add_detail_value']);
//                        $str_value = preg_replace('/\s+/u', '', $str_value);
//                        $num_value = number_format(floatval($str_value), 2, ".", " ");
//                        $addDetails['VehicleCost'] = $num_value;
//                        continue;
//                    }
//                case "Процент аванса":
//                    {
//                        $str_value = str_replace(',', '.', $tabAdditionalDet['one_add_detail_value']);
//                        $str_value = preg_replace('/\s+/u', '', $str_value);
//                        $num_value = number_format(floatval($str_value), 2, ".", " ");
//                        $addDetails['AdvancePaymentPercent'] = $num_value;
//                        continue;
//                    }
//                case "Сумма аванса":
//                    {
//                        $str_value = str_replace(',', '.', $tabAdditionalDet['one_add_detail_value']);
//                        $str_value = preg_replace('/\s+/u', '', $str_value);
//                        $num_value = number_format(floatval($str_value), 2, ".", " ");
//                        $addDetails['AdvancePaymentSum'] = $num_value;
//                        continue;
//                    }
//                case "Срок лизинга":
//                    {
//                        $addDetails['LeaseAgreementTerm'] = $tabAdditionalDet['one_add_detail_value'];
//                        continue;
//                    }
//                case "Дата начала лизинга":
//                    {
//                        $addDetails['LeaseStartDate'] = $tabAdditionalDet['one_add_detail_value'];
//                        continue;
//                    }
//            }
//
//        }
//        //-
//
//        $arr = [[ //Итоговый массив рекизитов
//            'id' => $leasingCalc['id'],
//            'leasing_object_brand_name' => $leasingObjBrandName,
//            'leasing_object_model_name' => $leasingObjModelName,
//            'leasing_object_model_issue_year' => $leasingObjModelYearIssueYear,
//            'leasing_object_dealer' => $LeasingObjDealer,
//            'created_at' => $leasingCalc['created_at'],
//            'updated_at' => $leasingCalc['updated_at'],
//            'updated_by' => $leasingCalc['updated_by'],
//            'created_by' => $leasingCalc['created_by'],
//        ]];
//
//        $arr[0] = array_merge($arr[0], $addDetails);
//
////        $AdvancePayment	= 1;
////        $LeasePayment = 2;
////
////        $schedules = BlScheduleTabSchedule::whereExists(function ($query) use ($leasingCalc){
////            $query->from('blSchedules')->where('blSchedules.bl_leasing_calculation_id', $leasingCalc['id'])->get()->first();
////        })->whereIn('bl_schedule_article_id', array($AdvancePayment, $LeasePayment))->orderBy('line_n', 'asc')->get()->toArray();
////
////        $rows_n_dates =  [];
////
////        $paymentSchedule = [];
////
////        foreach ($schedules as $schedRow){
////            $rows_n_dates [] = [
////                'row_n' => $schedRow['schedule_row_n'],
////                'row_date' => $schedRow['schedule_row_date']
////            ];
////        }
////
////        $rows_n_dates = array_unique($rows_n_dates, SORT_REGULAR);
////
////        foreach ($rows_n_dates as $row_n_date){
////            $rows = Arr::where($schedules, function($value, $key) use ($row_n_date) {
////                return $value['schedule_row_n'] == $row_n_date['row_n'];
////            });
////
////            $payments = [];
////
////            $payments = Arr::add($payments, 'row_n', array('value' => $row_n_date['row_n']));
////            $payments = Arr::add($payments, 'row_date', array('value' => $row_n_date['row_date']));
////
////            foreach ($rows as $row){
////                if ($row['bl_schedule_article_id'] == $AdvancePayment){
////                    $payments = Arr::add($payments, 'advance_payment', array('value' => $row['schedule_row_value']));
////                }
////                elseif ($row['bl_schedule_article_id'] == $LeasePayment){
////                    $payments = Arr::add($payments, 'lease_payment', array('value' => $row['schedule_row_value']));
////                }
////            }
////            array_push($paymentSchedule, $payments);
////
////        }
//
//        //+Получаем график платежей
//
//        $bl_schedule = BlSchedule::where('bl_leasing_calculation_id', $leasingCalc['id'])->select('id')->get()->first();
//
//        $bl_schedule_id = null;
//        if ($bl_schedule != null) $bl_schedule_id = $bl_schedule["id"];
//
//        $scheduleArticles = BlScheduleTabArticle::where('bl_schedule_id', $bl_schedule_id)
//            ->select('bl_schedule_article_id as id', 'bl_schedule_article_name as name', 'line_n')
//            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
//            ->orderBy('line_n')
//            ->get()->toArray();
//
//        $scheduleRows = BlScheduleTabSchedule::where('bl_schedule_id', $bl_schedule_id)
//            ->selectRaw('schedule_row_date, schedule_row_n, bl_schedule_article_id, bl_schedule_article_name, schedule_row_value as value')
//            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
//            ->groupBy('bl_schedule_article_name', 'schedule_row_n', 'bl_schedule_article_id', 'schedule_row_date', 'schedule_row_value')
//            ->orderBy('schedule_row_date', 'asc')
//            ->get()->toArray();
//
//        $grouped_total_payment_plan = BlScheduleTabSchedule::where('bl_schedule_id', $bl_schedule_id)
//            ->selectRaw('bl_schedule_article_name, bl_schedule_article_id  ,sum(schedule_row_value) as total_plan')
////            ->selectRaw('bl_schedule_article_name, bl_schedule_article_id  ,sum(CAST(schedule_row_value as DECIMAL(15,2))) as total_plan')
////            ->selectRaw('bl_schedule_article_name, bl_schedule_article_id  ,sum(schedule_row_value::float) as total_plan')
//            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
//            ->groupBy('bl_schedule_article_id', 'bl_schedule_article_name')->get()->toArray();
//
//        foreach ($grouped_total_payment_plan as $key => &$value) {
//            $value['total_plan'] = $this->formatNumbers($value['total_plan']);
//        }
//        unset($value);
//        array_unshift($grouped_total_payment_plan, ['bl_schedule_article_name' => 'number', 'total_plan' => ""]);// формируем подвал с суммой платежей
//        array_unshift($grouped_total_payment_plan, ['bl_schedule_article_name' => 'date', 'total_plan' => "Итого"]);// формируем подвал с суммой платежей
////        array_push($grouped_total_payment_plan,['bl_schedule_article_name'=>'sum_fact', 'total_plan'=>""]);// формируем подвал с суммой платежей
////        unset($grouped_total_payment_plan[5]);
//
//        $scheduleRows = collect($scheduleRows);
//        $scheduleRows = $scheduleRows->groupBy('schedule_row_date')->toArray();
//
//        $paymentSchedule = [];
//
//        foreach ($scheduleRows as $key => $vals) {
//            $temp = [
//                'date' => ['value' => $key],
//                'number' => ['value' => $vals[0]['schedule_row_n']],
//            ];
//
//            foreach ($scheduleArticles as $Article) {
//                $temp = Arr::add($temp, $Article['name'], ['value' => '']);
//            }
//
//            foreach ($vals as $val) {
//                if (array_key_exists($val['bl_schedule_article_name'], $temp)) {
//                    if ($val['value'] != null) {
//                        $str_value = str_replace(',', '.', $val['value']);
//                        $str_value = preg_replace('/\s+/u', '', $str_value);
//                        $num_value = number_format(floatval($str_value), 2, ".", " ");
//                    } else $num_value = '';
//                    $temp [$val['bl_schedule_article_name']]['value'] = $num_value;
//                }
//            }
//            array_push($paymentSchedule, $temp);
//        }
//
//        //-Получаем график платежей
//
//        //+Формируем список fields для ТЧ
//
//        $table_fields = [];
//
//        array_push($table_fields, [
//            'key' => 'number',
//            'edit' => true,
//            "filter" => true,
//            "sortable" => true,
//            'type' => 'label',
//            'typeVal' => 'number',
//            'class' => '',
//            "label" => '№',//$getArrayCaptions['Number']['translation_captions']['caption_translation'],
//            'thStyle' => 'width: 6%',
//            "zone" => "1",
//            "order" => "2"
//        ]);
//
//        array_push($table_fields, [
//            'key' => 'date',
//            'edit' => true,
//            "filter" => true,
//            "sortable" => true,
//            'type' => 'label',
//            'typeVal' => 'date',
//            'format' => 'DD-MM-YYYY',
//            'class' => '',
//            "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'],
//            'thStyle' => 'width: 14%',
//            "zone" => "1",
//            "order" => "2"
//        ]);
//
//        foreach ($scheduleArticles as $key => $value) {
//            if ($value['id'] != null) {
//                array_push($table_fields, [
//                    'key' => $value['name'],
//                    "filter" => true,
//                    "sortable" => true,
//                    'type' => 'label',
//                    'typeVal' => 'number',
//                    'format' => '0,0.00',
//                    'class' => '',
//                    'label' => $value['name'],
//                    'thStyle' => 'width: 15%'
//                ]);
//            }
//        }
//
//        //-Формируем список fields для ТЧ
//
//        $card = [
//            "main_data_models" => [
//                $mainModel => $arr,
//                "PaymentSchedule" => $paymentSchedule
//            ],
//
//            "form_parameters" => [
//                "form_title" => $getArrayCaptions['View']['translation_captions']['caption_translation'],
//                "form_code" => "leasing_calculation",
//                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
//                "form_type" => "card",
//                "disable_inputs" => $formShowParam['read_only'],
//                "form_base_data_model" => $mainModel,
//                'zone_quantity' => 2,
//                "form_main_data_model_id_field" => "id",
//                "form_main_data_model_name" => $getArrayCaptions['PreliminaryOffer']['translation_captions']['caption_translation'] . " №" . (string)$leasingCalc['bl_leasing_calculation_number'] .
//                    ' ' . $getArrayCaptions['Since']['translation_captions']['caption_translation'] . ' ' . Carbon::parse($leasingCalc['bl_leasing_calculation_date'])->format('d-m-Y'),
//                "form_type_list" => [
//                    "form_card_url" => "/contractors_new/",
//                    "form_search_field" => "contractor_full_name",
//                ],
//            ],
//
//            "sets" => $this->getButtonsList('card_actions'),
//
//            "tabs" => [
//                [
//                    "tab_title" => "Главная",
//                    //"tab_name" => "Главная",
//                    "tab_description" => 'Данный расчёт не является публичной офертой и не обязывает ни одну из сторон к заключению сделки. <br> Данный расчёт является предварительным и может отличаться от конечных условий в договоре лизинга.',
//                    "visible" => true,
//                    "blocks_quantity" => 2,
//                    "blocks" => [
//                        [
//                            "block_title" => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'],
//                            "block_zone_quantity" => 1,
//                            "block_model" => $mainModel,
//                            "block_type" => "block_card",
//                            "block_fields" => [
//                                ['title' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "1", "border_right" => false],
//                                ['title' => $getArrayCaptions['ContractParameters']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "7", "border_right" => false],
//                                ['title' => $getArrayCaptions['Brand']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'leasing_object_brand_name', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "3", "border_right" => false],
//                                ['title' => $getArrayCaptions['LeasingProduct']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'LeasingProduct', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "8", "border_right" => false],
//                                ['title' => $getArrayCaptions['Model']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'leasing_object_model_name', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "2", "border_right" => false],
//                                ['title' => $getArrayCaptions['GetStateSubsidy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'GetStateSubsidy', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "9", "border_right" => false],
//                                ['title' => $getArrayCaptions['ProduceYear']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'leasing_object_model_issue_year', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4", "border_right" => false],
//                                ['title' => $getArrayCaptions['VehicleCost']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'VehicleCost', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "10", "border_right" => false],
//                                ['title' => $getArrayCaptions['Dealer']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'leasing_object_dealer', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "5", "border_right" => false],
//                                ['title' => $getArrayCaptions['AdvancePaymentPercent']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'AdvancePaymentPercent', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "11", "border_right" => false],
//                                ['title' => $getArrayCaptions['Insurance']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "14", "border_right" => false],
//                                ['title' => $getArrayCaptions['AdvancePaymentSum']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'AdvancePaymentSum', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "10", "border_right" => false],
//                                ['title' => $getArrayCaptions['InsuranceOption']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'InsuranceOption', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "15", "border_right" => false],
//                                ['title' => $getArrayCaptions['LeaseAgreementTerm']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'LeaseAgreementTerm', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "12", "border_right" => false],
//                                ['title' => $getArrayCaptions['Franchise']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'Franchise', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "16", "border_right" => false],
//                                ['title' => $getArrayCaptions['LeaseStartDate']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'LeaseStartDate', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "13", "border_right" => false],
//                                [
//                                    'title' => "Скачать печатную форму",
//                                    'model' => 'id',
//                                    "model_name" => $mainModel,
//                                    'action' => 'download_att_file',
//                                    'link' => "/admin/action/file/download",
//                                    'type' => 'button',
//                                    'width' => '50%',
//                                    "zone" => "1",
//                                    "order" => "17",
//                                ],
//                                [
//                                    'title' => "Предпросмотр печатной формы",
//                                    'model' => 'id',
//                                    "model_name" => $mainModel,
//                                    'action' => 'preview_att_file',
//                                    'link' => "/admin/action/file/download",
//                                    'type' => 'button',
//                                    'width' => '50%',
//                                    "zone" => "1",
//                                    "order" => "17",
//                                ]
////                                ['title' => $getArrayCaptions['ContractParameters']['translation_captions']['caption_translation'],     'model' => '', 'type' => 'title', 'width' => '100%', "zone" => "2", "order" => "1", "border_right" => false],
////                                ['title' => $getArrayCaptions['LeasingProduct']['translation_captions']['caption_translation'],         'model' => 'ContractParameters', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "2", "border_right" => false],
////                                ['title' => $getArrayCaptions['GetStateSubsidy']['translation_captions']['caption_translation'],        'model' => 'LeasingProduct', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "3", "border_right" => false],
////                                ['title' => $getArrayCaptions['VehicleCost']['translation_captions']['caption_translation'],            'model' => 'GetStateSubsidy', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "4", "border_right" => false],
////                                ['title' => $getArrayCaptions['AdvancePaymentPercent']['translation_captions']['caption_translation'],  'model' => 'VehicleCost', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "5", "border_right" => false],
////                                ['title' => $getArrayCaptions['AdvancePaymentSum']['translation_captions']['caption_translation'],      'model' => 'AdvancePaymentPercent', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "6", "border_right" => false],
////                                ['title' => $getArrayCaptions['LeaseAgreementTerm']['translation_captions']['caption_translation'],     'model' => 'AdvancePaymentSum', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "7", "border_right" => false],
////                                ['title' => $getArrayCaptions['LeaseStartDate']['translation_captions']['caption_translation'],         'model' => 'LeaseAgreementTerm', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "8", "border_right" => false],
//                            ]
//                        ],
//                        [//Пока вручную
//                            "block_title" => $getArrayCaptions['PaymentSchedule']['translation_captions']['caption_translation'],
//                            "block_zone_quantity" => 1,
//                            "block_model" => "PaymentSchedule",
//                            //специальный обьект для вывода сумм в подвале таблицы
//                            "list_footer" => $grouped_total_payment_plan,
//                            "block_type" => "block_list_base",
//                            "block_parameters" => [
//                                "prevent_list_click" => true,
//                                "hide_search" => true,
//                                "hide_pagination" => true,
//                            ],
//                            "show_name" => true,
//                            "block_fields" => $table_fields
////                                [
////                                ['key' => 'row_n', 'edit' => true, "filter" => true, "sortable" => true, 'type' => 'label', 'class' => '',
////                                    "label" => $getArrayCaptions['Number']['translation_captions']['caption_translation'], 'thStyle' => 'width: 17%', "zone" => "1", "order" => "2"],
////                                ['key' => "row_date", "filter" => true, "sortable" => true, 'class' => '', 'type' => 'label', 'options_data' => ['search' => ''],
////                                    "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'], 'thStyle' => 'width: 16%', "zone" => "1", "order" => "3"],
////                                ['key' => "advance_payment", "filter" => true, "sortable" => true, 'type' => 'label', 'class' => '',
////                                    'label' => $getArrayCaptions['AdvancePayment']['translation_captions']['caption_translation'], 'thStyle' => 'width: 33%', "zone" => "1", "order" => "4"],
////                                ['key' => "lease_payment", "filter" => true, "sortable" => true, 'type' => 'label', 'class' => '',
////                                    'label' => $getArrayCaptions['LeasePayment']['translation_captions']['caption_translation'], 'thStyle' => 'width: 33%', "zone" => "1", "order" => "5"]
////                            ]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//
//        if ($formShowParam['show_system_tab']) {
//
//            $systemTab = [
//
//                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
//                "blocks_quantity" => 1,
//                "blocks" => [
//                    [
//                        //
//                        //"block_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
//                        "block_zone_quantity" => 2,
//                        "block_model" => $mainModel,
//                        "block_type" => "block_card",
//                        "block_fields" => [
//                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
//                                'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
//                                "order" => "1"
//                            ],
//
//                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
//                                'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
//                                "order" => "2"
//                            ],
//
//                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
//                                'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
//                                "order" => "1"
//                            ],
//
//                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
//                                'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
//                                "order" => "2"
//                            ],
//                        ]
//                    ]
//                ]
//            ];
//
//            array_push($card['tabs'], $systemTab);
//        }
//
//        return response()->json($card);
//
//    }

    public function cardDev(Request $request)
    {
        $leasingCalcId = $request->id;
        $customerRequestArrayId = BlCustomerRequest::query()->select('id')->get();
        if ($leasingCalcId == 'new') {
            if ($request->dependent['id'] == null) {
                return abort(403, 'Создание КП доступно только из Обращения клиента');
            }
            $leasingCalc = BlLeasingCalculation::getNewObject();
            $leasingCalc['bl_leasing_object_group_id'] = null;
            $leasingCalc['row_id_base'] = $request->dependent['id'];
            $leasingCalc['table_n_base'] = 81;

            $oneAddDetailModel = [];
            $oneAddDetails = OneAdditionalDetail::select('id', 'one_add_detail_name')->get()->toArray();

            $line_n = 1;
            foreach ($oneAddDetails as $oneDetail) {
                $temp = [
                    'id' => null,
                    'bl_leasing_calculation_id' => null,
                    'one_add_detail_id' => $oneDetail['id'],
                    'one_add_detail_value' => '',
                    'one_add_detail_name' => $oneDetail['one_add_detail_name'],
                    'line_n' => $line_n,
                    'status' => 2,
                ];


                array_push($oneAddDetailModel, $temp);

                ++$line_n;
            }
        } else {
            $leasingCalc = $this->card_query($leasingCalcId, $customerRequestArrayId)->get();

            if ($leasingCalc->count() > 0)
                $leasingCalc = $leasingCalc->first()->toArray();
            else
                return response()->json([], 403);

            /* Модель доп. параметров */
            $oneAddDetailModel = $leasingCalc['bl_leasing_calculations_tab_additional_detail'] ?? [];
        }

        //+Получение переводов

        $captionName = ['PreliminaryOffers', 'PreliminaryOffer', 'Number', 'Date', 'LeasingSubject', 'Brand', 'kind',
            'Model', 'ProduceYear', 'Dealer', 'Insurance', 'InsuranceOption',
            'Franchise', 'ContractParameters', 'LeasingProduct', 'GetStateSubsidy',
            'VehicleCost', 'AdvancePaymentPercent', 'AdvancePaymentSum',
            'LeaseAgreementTerm', 'LeaseStartDate', 'RequestFillOut', 'PaymentSchedule',
            'AdvancePayment', 'LeasePayment', 'ok', 'apply', 'back', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemDetails', 'Since', 'View',
            'VehicleCost', 'Amount', 'Sum', 'LeasingSubjects', 'Group', 'CalculationParameters', 'CalculationTemplate', 'GetPaymentScheduleText', 'CalculationTabDescription'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        //-Получение переводов

        //+Получение названия модели

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))->value('controller_alias');

        //-Получение названия модели

        //+Получение прав доступа

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];

        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        //-Получение прав доступа

        /* Модель преметов лизинга */
        $leasingObjectsQuery = BlCustomerRequestTabLeasingObject::where(function ($query) use ($leasingCalc) {
            return $query->orWhere('bl_leasing_calculation_main_document_id', null)->orWhere('bl_leasing_calculation_main_document_id', $leasingCalc['id']);
        })
            ->where('bl_customer_request_id', $leasingCalc['row_id_base'])
            ->leftJoin('blLeasingObjectBrands as brands', 'brands.id', '=', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_brand_id')
            ->leftJoin('blLeasingObjectModels as models', 'models.id', '=', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_model_id')
            ->leftJoin('blLeasingObjectTypes as types', 'types.id', '=', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_type_id')
            ->orderBy("bl_leasing_calculation_main_document_id", "asc")
            ->select('blCustomerRequestTabLeasingObjects.id', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_brand_id', 'blCustomerRequestTabLeasingObjects.item_line_code',
                'blCustomerRequestTabLeasingObjects.bl_leasing_object_model_id', 'bl_leasing_object_group_id', 'bl_leasing_object_brand_name', 'bl_leasing_object_sum',
                'bl_leasing_object_model_name', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_type_id', 'bl_leasing_object_type_name', 'bl_leasing_object_quantity',
                DB::raw("CONCAT(bl_leasing_object_brand_name, ' ', bl_leasing_object_model_name) as bl_leasing_object_name"));

        $leasingObjects = $leasingObjectsQuery->get()->toArray();
        if ($leasingCalc['bl_leasing_object_group_id'] != null) {
            $leasingObject = $leasingObjectsQuery->where('bl_leasing_object_group_id', $leasingCalc['bl_leasing_object_group_id'])->get()->toArray();

        } else {
            $leasingObject = [$leasingObjects[0]];
            $leasingCalc['bl_leasing_object_group_id'] = $leasingObject[0]['bl_leasing_object_group_id'];

        }

        /* Модель шаблонов расчетов */
        $calculationTemplates = CalculationTemplate::where([
                'actual_l' => true,
                'deleted_l'=> false,
                'db_area_id' => $leasingCalc['db_area_id']
            ])->select('id', 'calculation_template_name')->get()->toArray();

        //+Получаем поля в заголовке Предмет лизинга

        $arr = [$leasingCalc];

        $calc_template_id = $leasingCalc['calculation_template_id'];

        //+Получаем поля OneAdditionalDetails текущего Шаблона Расчета

        $addDetails = CalculationTemplateParameterSetting::with(['extensionOneAdditionalDetail.calculationParameterAnswerList' => function($query){
            $query->where([
                "deleted_l" => false,
                "active_l" => true,
            ])->select('extension_one_additional_detail_id', 'calculation_parameter_value');
        }])
            ->where('calculation_template_id', $calc_template_id)
            ->where('CalculationTemplateParameterSettings.db_area_id', $leasingCalc['db_area_id'])
            ->where('CalculationTemplateParameterSettings.actual_l', true)
            ->leftJoin('ExtensionOneAdditionalDetails as ExtOneAD', 'ExtOneAD.id', '=', 'CalculationTemplateParameterSettings.extension_one_additional_detail_id')
            ->leftJoin('OneAdditionalDetail as OneAD', 'OneAD.id', '=', 'ExtOneAD.one_add_detail_id')
            ->leftJoin('CalculationParameterTypes as CalcParType', 'CalcParType.id', '=', 'ExtOneAD.calculation_parameter_type_id')
            ->leftJoin('blLeasingCalculationsTabAdditionalDetails as LeasCalcAD', function ($join) use ($leasingCalc) {
                $join->on('LeasCalcAD.one_add_detail_id', '=', 'OneAD.id')
                    ->where('LeasCalcAD.bl_leasing_calculation_id', $leasingCalc['id']);
            })
            ->select('CalculationTemplateParameterSettings.*', 'LeasCalcAD.one_add_detail_value', 'OneAD.one_add_detail_name', 'CalcParType.calculation_parameter_type_code', 'answer_list_l')
            ->orderBy('CalculationTemplateParameterSettings.id')->get()->toArray();

        $number = 8;
        $additional_detail_block_fields = [
            [
                'title' => $getArrayCaptions['CalculationParameters']['translation_captions']['caption_translation'],
                'model_name' => $mainModel,
                'model' => '',
                'type' => 'title',
                'width' => '100%',
                "zone" => "1",
                "order" => "100",
                "border_right" => false
            ],
        ];
        $add_detail_models = [];
        $add_detail_add_models = [];
        foreach ($addDetails as $detail) {
            $param_name = 'additional_detail_' . (string)$number;
            $field_value_name = 'one_add_detail_value_' . (string)$number;

            //Переименуем поле значения для того, чтобы они не повторялись на форме
            $detail = array_add($detail, $field_value_name, $detail['one_add_detail_value']);

            $field = [
                'model_name' => $param_name,
                'model' => $field_value_name,
                'title' => $detail['one_add_detail_name'],
                'type' => 'text',
                'width' => '50%',
                "validation" => [
                    'required' => $detail['required_l'],
                ],
                "zone" => "1",
                "order" => (string)($number + 100),
                "border_right" => false
            ];

            //Ручные условия для некоторых полей
            if ($detail['one_add_detail_name'] == 'Стоимость имущества' && empty($detail[$field_value_name])) {
                $detail[$field_value_name] = $leasingObject[0]['bl_leasing_object_sum'];

            }

            //Обработка типов
            switch ($detail['calculation_parameter_type_code']){
                case 'Integer':
                    $field['validation'] = array_add($field['validation'], 'integer', true);
                    $detail[$field_value_name] = !empty($detail[$field_value_name]) ? (string)round(floatval($detail[$field_value_name])) : null;
                    break;
                case 'IntegerWithSpaces':
                    $field['validation'] = array_add($field['validation'], 'integer_with_spaces', true);
                    break;
                case 'Date':
                    $field['type'] = 'date';
                    break;
                case 'Boolean':
                    $field['type'] = 'checkbox';
                    $detail[$field_value_name] = !empty($detail[$field_value_name]) ? (boolean)($detail[$field_value_name]) : null;
                    break;
//                case 'Time':
//                    break;
//                case 'DateTime':
//                    break;
//                case 'Float':
//                    break;
//                case 'FloatWithSpaces':
//                    break;
//                case 'String':
//                    break;
            }

            //Добавляем соответствующие надстройки на параметры
            if ($detail['number_more'] != null) {
                $field['validation'] = array_add($field['validation'], 'min_value', $detail['number_more']);
            }
            if ($detail['number_less'] != null) {
                $field['validation'] = array_add($field['validation'], 'max_value', $detail['number_less']);
            }
            if ($detail['edit_l'] == false) {
                $field['type'] = 'label';
            }
            if ($detail['answer_list_l'] == true) {
                $field['type'] = 'vue-select';
                $field['options'] = [];
                $field["options_data"] = [
                    "options_data_model" => $param_name . "_for_select",
                    "options_field_id" => "key",
                    "options_field_title" => "value",
                    "search" => ""
                ];
                $field['validation'] = array_add($field['validation'], 'required', true);

                $answerValues = [];

                foreach ($detail['extension_one_additional_detail']['calculation_parameter_answer_list'] as $answer){
                    array_push($answerValues, [
                        "key" => $answer['calculation_parameter_value'],
                        "value" => $answer['calculation_parameter_value']
                    ]);
                }

                $add_detail_add_models = array_add($add_detail_add_models, $param_name . "_for_select", $answerValues);

            }
            if (empty($detail[$field_value_name]) && isset($detail['default_value'])){
                $detail[$field_value_name] = $detail['default_value'];
            }

            $add_detail_models = array_add($add_detail_models, $param_name, [$detail]);
            array_push($additional_detail_block_fields, $field);

            ++$number;
        }

        //-

        //+Получаем график платежей

        $bl_schedule = BlSchedule::where('bl_leasing_calculation_id', $leasingCalc['id'])->get()->first();

        $bl_schedule_id = null;
        if ($bl_schedule != null) $bl_schedule_id = $bl_schedule["id"];

        $scheduleArticles = BlScheduleTabArticle::where('bl_schedule_id', $bl_schedule_id)
            ->select('bl_schedule_article_id as id', 'bl_schedule_article_name as name', 'line_n')
            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
            ->orderBy('line_n')
            ->get()->toArray();

        $scheduleRows = BlScheduleTabSchedule::where('bl_schedule_id', $bl_schedule_id)
            ->selectRaw('schedule_row_date, schedule_row_n, bl_schedule_article_id, bl_schedule_article_name, schedule_row_value as value')
            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
            ->groupBy('bl_schedule_article_name', 'schedule_row_n', 'bl_schedule_article_id', 'schedule_row_date', 'schedule_row_value')
            ->orderBy('schedule_row_date', 'asc')
            ->get()->toArray();

        $grouped_total_payment_plan = BlScheduleTabSchedule::where('bl_schedule_id', $bl_schedule_id)
            ->selectRaw('bl_schedule_article_name, bl_schedule_article_id  ,sum(schedule_row_value) as total_plan')
            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
            ->groupBy('bl_schedule_article_id', 'bl_schedule_article_name')->get()->toArray();

        foreach ($grouped_total_payment_plan as $key => &$value) {
            $value['total_plan'] = $this->formatNumbers($value['total_plan']);
        }
        unset($value);
        array_unshift($grouped_total_payment_plan, ['bl_schedule_article_name' => 'number', 'total_plan' => ""]);// формируем подвал с суммой платежей
        array_unshift($grouped_total_payment_plan, ['bl_schedule_article_name' => 'date', 'total_plan' => "Итого"]);// формируем подвал с суммой платежей

        $scheduleRows = collect($scheduleRows);
        $scheduleRows = $scheduleRows->groupBy('schedule_row_date')->toArray();

        $paymentSchedule = [];

        foreach ($scheduleRows as $key => $vals) {
            $temp = [
                'date' => ['value' => $key],
                'number' => ['value' => $vals[0]['schedule_row_n']],
            ];

            foreach ($scheduleArticles as $Article) {
                $temp = Arr::add($temp, $Article['name'], ['value' => '']);
            }

            foreach ($vals as $val) {
                if (array_key_exists($val['bl_schedule_article_name'], $temp)) {
                    $str_value = str_replace(',', '.', $val['value']);
                    $str_value = preg_replace('/\s+/u', '', $str_value);
                    $num_value = number_format(floatval($str_value), 2, ".", " ");
                    $temp [$val['bl_schedule_article_name']]['value'] = $num_value;
                }
            }
            array_push($paymentSchedule, $temp);
        }

        //-Получаем график платежей

        //+Формируем список fields для ТЧ

        $table_fields = [];

        array_push($table_fields, [
            'key' => 'number',
            'edit' => true,
            "filter" => true,
            "sortable" => true,
            'type' => 'label',
            'typeVal' => 'number',
            'class' => '',
            "label" => '№',//$getArrayCaptions['Number']['translation_captions']['caption_translation'],
            'thStyle' => 'width: 6%',
            "zone" => "1",
            "order" => "2"
        ]);

        array_push($table_fields, [
            'key' => 'date',
            'edit' => true,
            "filter" => true,
            "sortable" => true,
            'type' => 'label',
            'typeVal' => 'date',
            'format' => 'DD-MM-YYYY',
            'class' => '',
            "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'],
            'thStyle' => 'width: 14%',
            "zone" => "1",
            "order" => "2"
        ]);

        foreach ($scheduleArticles as $key => $value) {
            if ($value['id'] != null) {
                array_push($table_fields, [
                    'key' => $value['name'],
                    "filter" => true,
                    "sortable" => true,
                    'type' => 'label',
                    'typeVal' => 'number',
                    'format' => '0,0.00',
                    'class' => '',
                    'label' => $value['name'],
                    'thStyle' => 'width: 15%'
                ]);
            }
        }

        //-Формируем список fields для ТЧ

        //+Формируем список полей для тч доп. реквизитов и тч Предметов лизинга

//        $leasing_subject_table_fields = [
//            [
//                'key' => 'line_n',
//                'edit' => true,
//                "filter" => true,
//                "sortable" => true,
//                'type' => 'label',
//                'typeVal' => 'string',
//                'class' => '',
//                "label" => '№',
//                'thStyle' => 'width: 6%',
//                "zone" => "1",
//                "order" => "1"
//            ],
//            [
//                'key' => 'bl_leasing_object_brand_name',
//                'edit' => true,
//                "filter" => true,
//                "sortable" => true,
//                'type' => 'label',
//                'typeVal' => 'string',
//                'class' => '',
//                "label" => $getArrayCaptions['Brand']['translation_captions']['caption_translation'],
//                'thStyle' => 'width: 20%',
//                "zone" => "1",
//                "order" => "2"
//            ],
//            [
//                'key' => 'bl_leasing_object_model_name',
//                'edit' => true,
//                "filter" => true,
//                "sortable" => false,
//                'type' => 'label',
//                'typeVal' => 'string',
//                'class' => '',
//                "label" => $getArrayCaptions['Model']['translation_captions']['caption_translation'],
//                'thStyle' => 'width: 20%',
//                "zone" => "1",
//                "order" => "3"
//            ],
//            [
//                'key' => 'bl_leasing_object_model_issue_year',
//                'edit' => true,
//                "filter" => true,
//                "sortable" => true,
//                'type' => 'label',
//                'typeVal' => 'string',
//                'class' => '',
//                "label" => $getArrayCaptions['ProduceYear']['translation_captions']['caption_translation'],
//                'thStyle' => 'width: 20%',
//                "zone" => "1",
//                "order" => "4"
//            ],
//            [
//                'key' => 'supplier_name',
//                'edit' => true,
//                "filter" => true,
//                "sortable" => false,
//                'type' => 'label',
//                'typeVal' => 'string',
//                'class' => '',
//                "label" => $getArrayCaptions['Dealer']['translation_captions']['caption_translation'],
//                'thStyle' => 'width: 20%',
//                "zone" => "1",
//                "order" => "5"
//            ],
//            [
//                'key' => 'bl_leasing_object_sum',
//                'edit' => true,
//                "filter" => true,
//                "sortable" => false,
//                'type' => 'label',
//                'typeVal' => 'string',
//                'class' => '',
//                "label" => $getArrayCaptions['VehicleCost']['translation_captions']['caption_translation'],
//                'thStyle' => 'width: 20%',
//                "zone" => "1",
//                "order" => "6"
//            ],
//            [
//                'key' => 'bl_leasing_object_quantity',
//                'edit' => false,
//                "filter" => true,
//                "sortable" => true,
//                'type' => 'label',
//                'typeVal' => 'string',
//                'class' => '',
//                "label" => $getArrayCaptions['Amount']['translation_captions']['caption_translation'],
//                'thStyle' => 'width: 20%',
//                "zone" => "1",
//                "order" => "7"
//            ],
//            [
//                'key' => 'bl_leasing_object_sum',
//                'edit' => false,
//                "filter" => true,
//                "sortable" => false,
//                'type' => 'label',
//                'typeVal' => 'string',
//                'class' => '',
//                "label" => $getArrayCaptions['Sum']['translation_captions']['caption_translation'],
//                'thStyle' => 'width: 20%',
//                "zone" => "1",
//                "order" => "8"
//            ],
//        ];

        $one_add_table_fields = [
            [
                'key' => 'line_n',
                'edit' => false,
                "filter" => true,
                "sortable" => true,
                'type' => 'label',
                'typeVal' => 'number',
                'class' => '',
                "label" => '№',//$getArrayCaptions['Number']['translation_captions']['caption_translation'],
                'thStyle' => 'width: 6%',
                "zone" => "1",
                "order" => "1"
            ],
            [
                'key' => 'one_add_detail_name',
                'edit' => false,
                "filter" => true,
                "sortable" => true,
                'type' => 'label',
                'typeVal' => 'string',
                'class' => '',
                "label" => 'Parameter name',
                'thStyle' => 'width: 20%',
                "zone" => "1",
                "order" => "2"
            ],
            [
                'key' => 'one_add_detail_value',
                'edit' => true,
                "filter" => true,
                "sortable" => false,
                'type' => 'label',
                'typeVal' => 'string',
                'class' => '',
                "label" => 'value',
                'thStyle' => 'width: 20%',
                "zone" => "1",
                "order" => "3"
            ]
        ];

        //-Формируем список полей для тч доп. реквизитов и тч Предметов лизинга


        $card = [
            "main_data_models" => [
                $mainModel => $arr,
                "PaymentSchedule" => $paymentSchedule,
                "BlLeasingCalculationsTabAdditionalDetails" => $oneAddDetailModel,
                "BlCustomerRequestTabLeasingObjects" => $leasingObject,
                "BlSchedule" => $bl_schedule != null ? [$bl_schedule->toArray()] : null,
            ],

            "add_data_models" => [
                "BlCustomerRequestTabLeasingObjectsForSelect" => $leasingObjects,
                "CalculationTemplates" => $calculationTemplates,
            ],

            "form_parameters" => [
                "form_title" => $getArrayCaptions['View']['translation_captions']['caption_translation'],
                "form_code" => "leasing_calculation",
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'] || $leasingCalc['calculating_l'] || ($bl_schedule != null ? $bl_schedule['calculating_l'] : false),
                "form_base_data_model" => $mainModel,
                'zone_quantity' => 2,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $getArrayCaptions['PreliminaryOffer']['translation_captions']['caption_translation'] . " №" . (string)$leasingCalc['bl_leasing_calculation_number'] .
                    ' ' . $getArrayCaptions['Since']['translation_captions']['caption_translation'] . ' ' . Carbon::parse($leasingCalc['bl_leasing_calculation_date'])->format('d-m-Y'),
                "form_type_list" => [
                    "form_card_url" => "/contractors_new/",
                    "form_search_field" => "contractor_full_name",
                ],
            ],

            "sets" => $this->getButtonsList('card_actions'),

            "tabs" => [
                [
                    "tab_title" => "Главная",
                    "tab_description" => $getArrayCaptions['CalculationTabDescription']['translation_captions']['caption_translation'],
                    "visible" => true,
                    "blocks_quantity" => 2,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_card",
                            "block_fields" => array_merge(
                                array_merge([
                                    ['title' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'],
                                        'model_name' => $mainModel,
                                        'model' => '',
                                        'type' => 'title',
                                        'width' => '100%',
                                        "zone" => "1",
                                        "order" => "1",
                                        "border_right" => false
                                    ],
                                    [
                                        'title' => $getArrayCaptions['CalculationTemplate']['translation_captions']['caption_translation'],
                                        'model' => 'calculation_template_id',
                                        'model_name' => $mainModel,
                                        'width' => '100%',
                                        'perform_action' => true,
                                        'action_link' => '/admin/bl/leasing/calc/fields',
                                        'type' => 'vue-select',
                                        'zone' => '1',
                                        'order' => '2',
                                        'options' => [],
                                        "options_data" => [
                                            "options_data_model" => "CalculationTemplates",
                                            "options_field_id" => "id",
                                            "options_field_title" => "calculation_template_name",
                                            "search" => ""
                                        ],
                                    ],
                                    [
                                        'title' => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'],
                                        'model' => 'bl_leasing_object_group_id',
                                        'model_name' => $mainModel,
                                        'width' => '100%',
                                        'perform_action' => true,
                                        'action_link' => '/admin/bl/leasing/calc/update/leas/subject',
                                        'type' => 'vue-select',
                                        'zone' => '1',
                                        'order' => '3',
                                        'options' => [],
                                        "options_data" => [
                                            "options_data_model" => "BlCustomerRequestTabLeasingObjectsForSelect",
                                            "options_field_id" => "bl_leasing_object_group_id",
                                            "options_field_title" => "bl_leasing_object_name",
                                            "search" => ""
                                        ],
                                    ],
                                    [
                                        'title' => $getArrayCaptions['kind']['translation_captions']['caption_translation'],
                                        'model_name' => 'BlCustomerRequestTabLeasingObjects',
                                        'model' => 'bl_leasing_object_type_name',
                                        'type' => 'label',
                                        'width' => '50%',
                                        "zone" => "1",
                                        "order" => "4",
                                        "border_right" => false
                                    ],
                                    [
                                        'title' => $getArrayCaptions['Brand']['translation_captions']['caption_translation'],
                                        'model_name' => 'BlCustomerRequestTabLeasingObjects',
                                        'model' => 'bl_leasing_object_brand_name',
                                        'type' => 'label',
                                        'width' => '50%',
                                        "zone" => "1",
                                        "order" => "5",
                                        "border_right" => false
                                    ],
                                    [
                                        'title' => $getArrayCaptions['Model']['translation_captions']['caption_translation'],
                                        'model_name' => 'BlCustomerRequestTabLeasingObjects',
                                        'model' => 'bl_leasing_object_model_name',
                                        'type' => 'label',
                                        'width' => '50%',
                                        'edit' => false,
                                        "zone" => "1",
                                        "order" => "6",
                                        "border_right" => false
                                    ],
                                    [
                                        'title' => $getArrayCaptions['Amount']['translation_captions']['caption_translation'],
                                        'model_name' => 'BlCustomerRequestTabLeasingObjects',
                                        'model' => 'bl_leasing_object_quantity',
                                        'type' => 'label',
                                        'width' => '50%',
                                        'edit' => false,
                                        "zone" => "1",
                                        "order" => "7",
                                        "border_right" => false
                                    ],
                                ], $leasingCalc['calculation_template_id'] == null ? [] : $additional_detail_block_fields),
                                $leasingCalc['stored_file_id'] == null ? [] : [
                                [
                                    'title' => "Скачать печатную форму",
                                    'model' => 'id',
                                    "model_name" => $mainModel,
                                    'action' => 'download_att_file',
                                    'link' => "/admin/action/file/download",
                                    'type' => 'button',
                                    'width' => '50%',
                                    "zone" => "1",
                                    "order" => "17",
                                ],
                                [
                                    'title' => "Предпросмотр печатной формы",
                                    'model' => 'id',
                                    "model_name" => $mainModel,
                                    'action' => 'preview_att_file',
                                    'link' => "/admin/action/file/download",
                                    'type' => 'button',
                                    'width' => '50%',
                                    "zone" => "1",
                                    "order" => "17",
                                ]])
                        ],
                        ($bl_schedule == null && $leasingCalc['calculating_l'] == false ?
                            [
                                "block_title" => $getArrayCaptions['PaymentSchedule']['translation_captions']['caption_translation'],
                                "block_zone_quantity" => 1,
                                "block_model" => $mainModel,

                                /* +++ Если Компонент Info +++ */
                                "block_type" => "block_info",
                                "info_data" => [
//                                    "image_path" => "/img/interfacedashboard/finished.png",
                                    "fe_url_header_top" => null,
                                    "fe_url_header_bottom" => null,
                                    "fe_url_info" => $getArrayCaptions['GetPaymentScheduleText']['translation_captions']['caption_translation'],
                                    "fe_url_footer_top" => null,
                                    "fe_url_footer_bottom" => null,

                                ],
                                "block_fields"=>[]
                                /* --- Если Компонент Info --- */

                                /* +++ Если Компонент Card +++ */
//                                "block_type" => "block_card",
//                                "block_fields" => [
//                                    [
//                                        'title' => 'Для получения графика платежей заполните параметры и нажмите кнопку "Применить"',
//                                        'model_name' => $mainModel,
//                                        'model' => '',
//                                        'width' => '100%',
//                                        'type' => 'title',
//                                        "zone" => "2",
//                                        "order" => "1",
//                                        "border_right" => false
//                                    ],
//                                ]
                                /* --- Если Компонент Card --- */
                            ] :
                            [
                                "block_title" => $getArrayCaptions['PaymentSchedule']['translation_captions']['caption_translation'],
                                "block_zone_quantity" => 1,
                                "block_model" => "PaymentSchedule",
                                "list_footer" => $grouped_total_payment_plan,
                                "block_type" => "block_list_base",
                                "block_parameters" => [
                                    "prevent_list_click" => true,
                                    "busy" => ($bl_schedule != null ? $bl_schedule['calculating_l'] : $leasingCalc['calculating_l']),
                                ],
                                "show_name" => true,
                                "block_fields" => $table_fields
                            ]),
                    ]
                ],
                [
                    "tab_title" => $getArrayCaptions['CalculationParameters']['translation_captions']['caption_translation'],
//                    "tab_description" => 'Данный расчёт не является публичной офертой и не обязывает ни одну из сторон к заключению сделки. <br> Данный расчёт является предварительным и может отличаться от конечных условий в договоре лизинга.',
                    "visible" => true,
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => 'Test',
                            "block_zone_quantity" => 1,
                            "block_model" => "BlLeasingCalculationsTabAdditionalDetails",
                            "block_type" => "block_list_base",
                            "block_parameters" => [
                                "prevent_list_click" => true,
                                "edit_values" => false,
                                "edit_mode" => 'inline',
                            ],
                            "show_name" => true,
                            "block_fields" => $one_add_table_fields
                        ],
                    ]
                ],
//                [
//                    "tab_title" => $getArrayCaptions['LeasingSubjects']['translation_captions']['caption_translation'],
//                    "visible" => true,
//                    "blocks_quantity" => 2,
//                    "blocks" => [
//                        [
//                            "block_title" => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'],
//                            "block_zone_quantity" => 1,
//                            "block_model" => $mainModel,
//                            "block_type" => "block_card",
//                            "block_fields" => [
//                                [
//                                    'title' => $getArrayCaptions['Group']['translation_captions']['caption_translation'],
//                                    'model' => 'bl_leasing_object_group_id',
//                                    'model_name' => $mainModel,
//                                    'width' => '50%',
//                                    'type' => 'vue-select',
//                                    'zone' => '1',
//                                    'order' => '1',
//                                    'options' => [],
//                                    "options_data" => [
//                                        "options_data_model" => "LeasingObjectGroups",
//                                        "options_field_id" => "id",
//                                        "options_field_title" => "bl_leasing_object_group_name",
//                                        "search" => ""
//                                    ],
//                                ],
//                            ]
//                        ],
//                        [
//                            "block_title" => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'],
//                            "block_zone_quantity" => 1,
//                            "block_model" => "BlCustomerRequestTabLeasingObjects",
//                            "block_type" => "block_list_base",
//                            "list_width" =>"100%",
//                            "block_parameters"=>[
//                                "prevent_list_click" => true,
//                                "edit_values" => false,
////                                "edit_mode" => 'inline',
//                            ],
//                            "show_name" => true,
//                            "block_fields" => $leasing_subject_table_fields
//                        ],
//                    ]
//                ],
            ]
        ];

        if ($formShowParam['show_system_tab']) {

            $systemTab = [

                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        //
                        //"block_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 2,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "2"
                            ],
                        ]
                    ]
                ]
            ];

            array_push($card['tabs'], $systemTab);
        }

        if ($leasingCalc['calculating_l'] || ($bl_schedule != null ? $bl_schedule['calculating_l'] : false)) {
            $card['form_parameters'] = array_add($card['form_parameters'], "requery_interval", 10000);
        }

        $card['main_data_models'] = array_merge($card['main_data_models'], $add_detail_models);
        $card['add_data_models'] = array_merge($card['add_data_models'], $add_detail_add_models);

        return response()->json($card);

    }

    public function setCardCaptions(): self{
        $this->card_captions = ['PreliminaryOffers', 'PreliminaryOffer', 'Number', 'Date', 'LeasingSubject', 'Brand', 'kind',
            'Model', 'ProduceYear', 'Dealer', 'Insurance', 'InsuranceOption',
            'Franchise', 'ContractParameters', 'LeasingProduct', 'GetStateSubsidy',
            'VehicleCost', 'AdvancePaymentPercent', 'AdvancePaymentSum',
            'LeaseAgreementTerm', 'LeaseStartDate', 'RequestFillOut', 'PaymentSchedule',
            'AdvancePayment', 'LeasePayment', 'ok', 'apply', 'back', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemDetails', 'Since', 'View',
            'VehicleCost', 'Amount', 'Sum', 'LeasingSubjects', 'Group', 'CalculationParameters', 'CalculationTemplate', 'CalculationTabDescription'];

        $this->translateCardCaptions();

        return $this;
    }

    protected function cardQuery(){
        $request = request();

        $this->card_model_id = $request->id;
        $customerRequestArrayId = BlCustomerRequest::query()->select('id')->get();

        $this->setIsNewObject($this->card_model_id === "new");

        if ($this->isNewObject()){
            $nameControllerMethod = [
                'controller' => class_basename(\Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if ($access === false) {
                return abort('403');
            }

            if ($request->dependent['id'] == null) {
                return abort(403, 'Создание КП доступно только из Обращения клиента');
            }

            $leasingCalc = BlLeasingCalculation::getNewObject();
            $leasingCalc['bl_leasing_object_group_id'] = null;
            $leasingCalc['row_id_base'] = $request->dependent['id'];
            $leasingCalc['table_n_base'] = 81;

            $this->card_model = [$leasingCalc];
            $this->card_model_id = $leasingCalc['id'];

            $this->cardAdditionalQuery($this->card_model);

        } else {
            $this->card_model = BlLeasingCalculation::whereIn('row_id_base', $customerRequestArrayId ? $customerRequestArrayId->toArray() : [])
                ->where("id", $this->card_model_id)
                ->select('id', 'bl_leasing_object_group_id', 'row_id_base', 'table_n_base', 'bl_leasing_calculation_number', 'bl_leasing_calculation_date',
                    'created_at', 'created_by', 'updated_at', 'updated_by', 'db_area_id', 'calculating_l', 'item_line_code', 'stored_file_id', 'calculation_template_id');

            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->get();
            if ($this->card_model->count() > 0)
                $this->card_model = [$this->card_model->first()->toArray()];
            else
                return abort('403');
        }

        $this->setLeasingSubject();

        return $this;
    }

    public function setCardAddDataModels(): self{
        $temp_id = $this->card_model_id;
        $this->card_add_data_models['BlCustomerRequestTabLeasingObjectsForSelect'] = BlCustomerRequestTabLeasingObject::where(function ($query) use ($temp_id) {
            return $query->orWhere('bl_leasing_calculation_main_document_id', null)->orWhere('bl_leasing_calculation_main_document_id', $temp_id);
        })
            ->where('bl_customer_request_id', $this->card_model[0]['row_id_base'])
            ->leftJoin('blLeasingObjectBrands as brands', 'brands.id', '=', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_brand_id')
            ->leftJoin('blLeasingObjectModels as models', 'models.id', '=', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_model_id')
            ->orderBy("bl_leasing_calculation_main_document_id", "asc")
            ->select('blCustomerRequestTabLeasingObjects.id', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_brand_id',
                'blCustomerRequestTabLeasingObjects.bl_leasing_object_model_id', 'bl_leasing_object_group_id',
               DB::raw("CONCAT(bl_leasing_object_brand_name, ' ', bl_leasing_object_model_name) as bl_leasing_object_name"))->get()->toArray();

        $this->card_add_data_models['CalculationTemplates'] = CalculationTemplate::where([
            'db_area_id' => $this->card_model[0]['db_area_id'],
            'actual_l' => true,
            'deleted_l' => false,
        ])->select('id', 'calculation_template_name')->get()->toArray();

        $this->card_add_data_models = array_merge($this->card_add_data_models, $this->add_detail_add_models);

        return $this;
    }

    public function setCardMainDataModels(): self{

        // Проверка на тот случай, если идет перезапрос полей карточки и поля табличной части были переданы с фронта
        if (!isset($this->card_main_data_models["BlSchedule"])){
            $schedule = BlSchedule::where('bl_leasing_calculation_id', $this->card_model_id)
                ->select('id', 'db_area_id', 'calculating_l', 'updated_at')->get();
            if ($schedule->count() != 0)
                $this->card_main_data_models["BlSchedule"] = [$schedule->first()->toArray()];
            else
                $this->card_main_data_models["BlSchedule"] = null;

        }

        // Проверка на тот случай, если идет перезапрос полей карточки и поля табличной части были переданы с фронта
        if (!isset($this->card_main_data_models["PaymentSchedule"])) {
            $bl_schedule_id = $this->card_main_data_models["BlSchedule"][0]['id'];

            $scheduleArticles = BlScheduleTabArticle::where('bl_schedule_id', $bl_schedule_id)
                ->select('bl_schedule_article_id as id', 'bl_schedule_article_name as name', 'line_n')
                ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
                ->orderBy('line_n')
                ->get()->toArray();

            $scheduleRows = BlScheduleTabSchedule::where('bl_schedule_id', $bl_schedule_id)
                ->selectRaw('schedule_row_date, schedule_row_n, bl_schedule_article_id, bl_schedule_article_name, schedule_row_value as value')
                ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
                ->groupBy('bl_schedule_article_name', 'schedule_row_n', 'bl_schedule_article_id', 'schedule_row_date', 'schedule_row_value')
                ->orderBy('schedule_row_date', 'asc')
                ->get()->toArray();

            $scheduleRows = collect($scheduleRows);
            $scheduleRows = $scheduleRows->groupBy('schedule_row_date')->toArray();

            $paymentSchedule = [];

            foreach ($scheduleRows as $key => $vals) {
                $temp = [
                    'date' => ['value' => $key],
                    'number' => ['value' => $vals[0]['schedule_row_n']],
                ];

                foreach ($scheduleArticles as $Article) {
                    $temp = Arr::add($temp, $Article['name'], ['value' => '']);
                }

                foreach ($vals as $val) {
                    if (array_key_exists($val['bl_schedule_article_name'], $temp)) {
                        $str_value = str_replace(',', '.', $val['value']);
                        $str_value = preg_replace('/\s+/u', '', $str_value);
                        $num_value = number_format(floatval($str_value), 2, ".", " ");
                        $temp [$val['bl_schedule_article_name']]['value'] = $num_value;
                    }
                }
                array_push($paymentSchedule, $temp);
            }

            $this->card_main_data_models["PaymentSchedule"] = $paymentSchedule;
        }

        // Проверка на тот случай, если идет перезапрос полей карточки и поля табличной части были переданы с фронта
        if (!isset($this->card_main_data_models["BlLeasingCalculationsTabAdditionalDetails"])){
            if ($this->isNewObject()){
                $oneAddDetailModel = [];
                $oneAddDetails = OneAdditionalDetail::select('OneAdditionalDetail.id', 'OneAdditionalDetail.one_add_detail_name', 'ExtOneAD.one_additional_detail_code')
                    ->join('ExtensionOneAdditionalDetails as ExtOneAD', 'ExtOneAD.one_add_detail_id', '=', 'OneAdditionalDetail.id')
                    ->get()->toArray();

                $line_n = 1;
                foreach ($oneAddDetails as $oneDetail) {
                    $temp = [
                        'id'                            => null,
                        'bl_leasing_calculation_id'     => null,
                        'one_add_detail_id'             => $oneDetail['id'],
                        'one_add_detail_value'          => '',
                        'one_add_detail_name'           => $oneDetail['one_add_detail_name'],
                        'one_additional_detail_code'    => $oneDetail['one_additional_detail_code'],
                        'line_n'                        => $line_n,
                        'status'                        => 2,
                    ];

                    array_push($oneAddDetailModel, $temp);
                    ++$line_n;
                }

            } else {
                $oneAddDetailModel = BlLeasingCalculationsTabAdditionalDetail::where('bl_leasing_calculation_id', $this->card_model[0]['id'])
                    ->join('OneAdditionalDetail as OneAD', 'OneAD.id', '=', 'blLeasingCalculationsTabAdditionalDetails.one_add_detail_id')
                    ->join('ExtensionOneAdditionalDetails as ExtOneAD', 'ExtOneAD.one_add_detail_id', '=', 'OneAD.id')
                    ->select('blLeasingCalculationsTabAdditionalDetails.id', 'blLeasingCalculationsTabAdditionalDetails.bl_leasing_calculation_id',
                        'blLeasingCalculationsTabAdditionalDetails.one_add_detail_id', 'blLeasingCalculationsTabAdditionalDetails.one_add_detail_value',
                        'blLeasingCalculationsTabAdditionalDetails.line_n', 'blLeasingCalculationsTabAdditionalDetails.updated_at',
                        'OneAD.one_add_detail_name', 'ExtOneAD.one_additional_detail_code')
                    ->get()->toArray();

            }

            $this->card_main_data_models["BlLeasingCalculationsTabAdditionalDetails"] = $oneAddDetailModel;
        }

        $this->setOneAddDetailParameters();
        $this->card_main_data_models = array_merge($this->card_main_data_models, $this->add_detail_main_models);

        // Проверка на тот случай, если идет перезапрос полей карточки и поля табличной части были переданы с фронта
        if (is_null($this->card_main_data_models))
            $this->card_main_data_models = [];

        return $this;
    }

    public function setCardBlockFields(): self{
        $payment_schedule_block = $this->getPaymentScheduleBlock();
        $leasing_subject_block_fields = $this->getLeasingSubjectBlockFields();

        $this->card_block_fields = [
            [
                "tab_title" => "Главная",
                "tab_description" => $this->getTranslatedCardCaption("CalculationTabDescription"),
                "visible" => true,
                "blocks_quantity" => 2,
                "blocks" => [
                    [
                        "block_title" => $this->getTranslatedCardCaption('LeasingSubject'),
                        "block_zone_quantity" => 1,
                        "block_model" => $this->card_controller_alias,
                        "block_type" => "block_card",
                        "block_fields" => $leasing_subject_block_fields,
                    ],
                    $payment_schedule_block
                ]
            ],
            [
                "tab_title" => $this->getTranslatedCardCaption('CalculationParameters'),
                "visible" => true,
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => 'Test',
                        "block_zone_quantity" => 1,
                        "block_model" => "BlLeasingCalculationsTabAdditionalDetails",
                        "block_type" => "block_list_base",
                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => false,
                            "edit_mode" => 'inline',
                        ],
                        "show_name" => true,
                        "block_fields" => [
                            [
                                'key' => 'line_n',
                                'edit' => false,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'label',
                                'typeVal' => 'number',
                                'class' => '',
                                "label" => '№',//$getArrayCaptions['Number']['translation_captions']['caption_translation'],
                                'thStyle' => 'width: 6%',
                                "zone" => "1",
                                "order" => "1"
                            ],
                            [
                                'key' => 'one_add_detail_name',
                                'edit' => false,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'label',
                                'typeVal' => 'string',
                                'class' => '',
                                "label" => 'Parameter name',
                                'thStyle' => 'width: 20%',
                                "zone" => "1",
                                "order" => "2"
                            ],
                            [
                                'key' => 'one_add_detail_value',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => false,
                                'type' => 'label',
                                'typeVal' => 'string',
                                'class' => '',
                                "label" => 'value',
                                'thStyle' => 'width: 20%',
                                "zone" => "1",
                                "order" => "3"
                            ]
                        ],
                    ],
                ]
            ],
        ];

        return $this;
    }

    public function setCardFormTitle(): self{
        $this->card_form_title = "View";

        return $this;
    }

    public function setCardMainDataModelName(): self{
        if ($this->card_show_form_parameters["read_only"] == false) {
            $this->card_show_form_parameters["read_only"] = $this->blockInputsAndRequery();
        }

        $this->card_main_data_model_name = $this->getTranslatedCardCaption('PreliminaryOffer') . " №" . (string)$this->card_model[0]['bl_leasing_calculation_number'] .
            ' ' . $this->getTranslatedCardCaption('Since') . ' ' . Carbon::parse($this->card_model[0]['bl_leasing_calculation_date'])->format('d-m-Y');

        return $this;
    }

    public function setRequeryInterval(): self
    {
        $this->requery_interval = $this->blockInputsAndRequery() ? 10000 : null;

        return $this;
    }


    /* События изменения полей */
    public function getFields(Request $request)
    {
        $this->card_controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $this->card_main_data_models = $request->get("main_data_models");

        $this->card_model = $this->card_main_data_models[$this->card_controller_alias];

        $this->card_model_id = $this->card_model[0]["id"];

        $this->card_add_data_models = [];

        $this->setIsNewObject($this->card_model_id === "new");

        $this->setCardCaptions()
            ->setCardMainDataModels()
            ->setCardAddDataModels()
            ->setCardBlockFields()
            ->setCardSystemTab();

        if (array_key_exists('add_detail_' . 'LeasingSubjectCost', $this->card_main_data_models)) {
            $model_name = 'add_detail_' . 'LeasingSubjectCost';
            $field_name = 'LeasingSubjectCost' . '_value';
            $this->card_main_data_models[$model_name][0][$field_name] = number_format($this->card_model[0]['bl_leasing_object_sum'], 0, '.', ' ');
        }

        return [
            'main_data_models' => $this->card_main_data_models,
            'add_data_models' => $this->card_add_data_models,
            'tabs' => $this->card_block_fields];

    }

    public function updateLeasSubject(Request $request)
    {
        $this->card_controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $main_data_models = $request->main_data_models;
        $this->card_model = $main_data_models[$this->card_controller_alias];
        $this->card_model_id = $this->card_model[0]['id'];

        $this->setLeasingSubject();

        $main_data_models[$this->card_controller_alias] = $this->card_model;

        if (array_key_exists('add_detail_' . 'LeasingSubjectCost', $main_data_models)) {
            $model_name = 'add_detail_' . 'LeasingSubjectCost';
            $field_name = 'LeasingSubjectCost' . '_value';
            $main_data_models[$model_name][0][$field_name] = number_format($this->card_model[0]['bl_leasing_object_sum'], 0, '.', ' ');
        }

        return ['main_data_models' => $main_data_models];

    }


    /* Вспомагательные функции */
    private function formatNumbers($number)
    {
        $str_value = str_replace(',', '.', $number);
        $str_value = preg_replace('/\s+/u', '', $str_value);
        $num_value = number_format(floatval($str_value), 2, ".", " ");
        return $num_value;
    }

    protected function setOneAddDetailParameters(){
        //+Получаем поля OneAdditionalDetails текущего Шаблона Расчета

        $temp_id = $this->card_model_id;

        $addDetails = CalculationTemplateParameterSetting::with(['extensionOneAdditionalDetail.calculationParameterAnswerList' => function($query){
            $query->where([
                "deleted_l" => false,
                "active_l" => true,
            ])->select('extension_one_additional_detail_id', 'calculation_parameter_value');
        }])
            ->where('calculation_template_id', $this->card_model[0]['calculation_template_id'])
            ->where('CalculationTemplateParameterSettings.db_area_id', $this->card_model[0]['db_area_id'])
            ->where('CalculationTemplateParameterSettings.actual_l', true)
            ->leftJoin('ExtensionOneAdditionalDetails as ExtOneAD', 'ExtOneAD.id', '=', 'CalculationTemplateParameterSettings.extension_one_additional_detail_id')
            ->leftJoin('OneAdditionalDetail as OneAD', 'OneAD.id', '=', 'ExtOneAD.one_add_detail_id')
            ->leftJoin('CalculationParameterTypes as CalcParType', 'CalcParType.id', '=', 'ExtOneAD.calculation_parameter_type_id')
            ->leftJoin('blLeasingCalculationsTabAdditionalDetails as LeasCalcAD', function ($join) use ($temp_id) {
                $join->on('LeasCalcAD.one_add_detail_id', '=', 'OneAD.id')
                    ->where('LeasCalcAD.bl_leasing_calculation_id', $temp_id);
            })
            ->select('CalculationTemplateParameterSettings.*', 'LeasCalcAD.one_add_detail_value', 'OneAD.one_add_detail_name', 'CalcParType.calculation_parameter_type_code', 'answer_list_l', 'ExtOneAD.one_additional_detail_code')
            ->orderBy('CalculationTemplateParameterSettings.line_n')->get()->toArray();

        $number = 1;
        $prefix = 'add_detail_';
        $this->add_detail_block_fields = [];
        $this->add_detail_main_models = [];
        $this->add_detail_add_models = [];
        foreach ($addDetails as $detail) {
            $param_model_name = $prefix . $detail['one_additional_detail_code'];
            $field_value_name = $detail['one_additional_detail_code'] . '_value';
            $set_default = isset($detail['default_value']) && (empty($detail['one_add_detail_value']) || $detail['edit_l'] == false);

            $field = [
                'model_name' => $param_model_name,
                'model' => $field_value_name,
                'title' => $detail['one_add_detail_name'],
                'type' => 'text',
                'width' => '50%',
                "validation" => [
                    'required' => $detail['required_l'],
                ],
                "zone" => "1",
                "order" => (string)($number + 100),
                "border_right" => false
            ];

            $detail_model = [
                $field_value_name => $detail['one_add_detail_value'],
                'calculation_parameter_type_code' => $detail['calculation_parameter_type_code'],
            ];

            //Ручные условия для некоторых полей
            if ($detail['one_add_detail_name'] == 'Стоимость имущества' && empty($detail_model[$field_value_name])) {
                $detail_model[$field_value_name] = $this->card_model[0]['bl_leasing_object_sum'];

            }

            //Обработка типов
            switch ($detail['calculation_parameter_type_code']){
                case 'Integer':
                    $field['validation'] = array_add($field['validation'], 'integer', true);
                    $detail_model[$field_value_name] = !empty($detail_model[$field_value_name]) ? (string)round(floatval($detail_model[$field_value_name])) : null;
                    break;
                case 'IntegerWithSpaces':
                    $field['validation'] = array_add($field['validation'], 'integer_with_spaces', true);
                    break;
                case 'Date':
                    $field['type'] = 'date';
                    break;
                case 'Boolean':
                    $field['type'] = 'checkbox';
                    $detail_model[$field_value_name] = !empty($detail_model[$field_value_name]) ? (boolean)($detail_model[$field_value_name]) : null;
                    break;
//                case 'Time':
//                    break;
//                case 'DateTime':
//                    break;
//                case 'Float':
//                    break;
//                case 'FloatWithSpaces':
//                    break;
//                case 'String':
//                    break;
            }

            //Добавляем соответствующие надстройки на параметры
            if ($detail['number_more'] != null) {
                $field['validation'] = array_add($field['validation'], 'min_value', $detail['number_more']);
            }
            if ($detail['number_less'] != null) {
                $field['validation'] = array_add($field['validation'], 'max_value', $detail['number_less']);
            }
            if ($detail['answer_list_l'] == true) {
                $field['type'] = 'vue-select';
                $field['options'] = [];
                $field["options_data"] = [
                    "options_data_model" => $param_model_name . "_select",
                    "options_field_id" => "key",
                    "options_field_title" => "value",
                    "search" => ""
                ];
                $field['validation'] = array_add($field['validation'], 'required', true);

                $answerValues = [];

                foreach ($detail['extension_one_additional_detail']['calculation_parameter_answer_list'] as $answer){
                    array_push($answerValues, [
                        "key" => $answer['calculation_parameter_value'],
                        "value" => $answer['calculation_parameter_value']
                    ]);
                }

                $this->add_detail_add_models[$param_model_name . "_select"] = $answerValues;

            }
            if ($detail['edit_l'] == false) {
                $field['type'] = 'label';
            }
            if ($set_default){
                $detail_model[$field_value_name] = $detail['default_value'];

            }

            if (!array_key_exists($param_model_name, $this->card_main_data_models) || $set_default)
                $this->add_detail_main_models[$param_model_name] = [$detail_model];
            array_push($this->add_detail_block_fields, $field);

            ++$number;
        }

        //-
    }

    protected function setLeasingSubject(){
        $temp_id = $this->card_model_id;
        $leasingObjectsQuery = BlCustomerRequestTabLeasingObject::where(function ($query) use ($temp_id) {
            return $query->orWhere('bl_leasing_calculation_main_document_id', null)->orWhere('bl_leasing_calculation_main_document_id', $temp_id);
        })
            ->where('bl_customer_request_id', $this->card_model[0]['row_id_base'])
            ->leftJoin('blLeasingObjectBrands as brands', 'brands.id', '=', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_brand_id')
            ->leftJoin('blLeasingObjectModels as models', 'models.id', '=', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_model_id')
            ->leftJoin('blLeasingObjectTypes as types', 'types.id', '=', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_type_id')
            ->orderBy("bl_leasing_calculation_main_document_id", "asc")
            ->select('blCustomerRequestTabLeasingObjects.id', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_brand_id', 'blCustomerRequestTabLeasingObjects.bl_leasing_object_model_id',
                'bl_leasing_object_group_id', 'bl_leasing_object_brand_name', 'bl_leasing_object_sum', 'bl_leasing_object_model_name',
                'blCustomerRequestTabLeasingObjects.bl_leasing_object_type_id', 'bl_leasing_object_type_name', 'bl_leasing_object_quantity', 'item_line_code');

        $leasingObjects = $leasingObjectsQuery->get()->toArray();

        if ($this->card_model[0]['bl_leasing_object_group_id'] != null){
            $leasingObject = $leasingObjectsQuery->where('bl_leasing_object_group_id', $this->card_model[0]['bl_leasing_object_group_id'])->first()->toArray();

        } else {
            $leasingObject = $leasingObjects[0];

        }

        $this->card_model[0]['bl_leasing_object_group_id']      = $leasingObject['bl_leasing_object_group_id'];
        $this->card_model[0]['bl_leasing_object_type_name']     = $leasingObject['bl_leasing_object_type_name'];
        $this->card_model[0]['bl_leasing_object_brand_name']    = $leasingObject['bl_leasing_object_brand_name'];
        $this->card_model[0]['bl_leasing_object_model_name']    = $leasingObject['bl_leasing_object_model_name'];
        $this->card_model[0]['bl_leasing_object_quantity']      = $leasingObject['bl_leasing_object_quantity'];
        $this->card_model[0]['bl_leasing_object_sum']           = $leasingObject['bl_leasing_object_sum'];
        $this->card_model[0]['item_line_code']                  = $leasingObject['item_line_code'];

        return $this;

    }

    protected function blockInputsAndRequery(){
        $request = request();
        $requery = isset($request->requery) ? $request->requery : false;
        return $this->card_model[0]['calculating_l'] || ($this->card_main_data_models['BlSchedule'] != null ? $this->card_main_data_models['BlSchedule'][0]['calculating_l'] : $requery);

    }

    protected function getPaymentScheduleBlock(){
        $request = request();
        $requery = isset($request->requery) ? $request->requery : false;

        /* Если Расчета нет и мы не ждем его с 1С тогда выводим компонент Инфо */
        if ($this->card_main_data_models["BlSchedule"] == null && $this->card_model[0]['calculating_l'] == false && $requery == false){
            return [
                "block_title" => $this->getTranslatedCardCaption('PaymentSchedule'),
                "block_zone_quantity" => 1,
                "block_model" => $this->card_controller_alias,
                "block_type" => "block_info",
                "info_data" => [
//                                    "image_path" => "/img/interfacedashboard/finished.png",
                    "fe_url_header_top" => null,
                    "fe_url_header_bottom" => null,
                    "fe_url_info" => "<h1>Для получения графика платежей заполните параметры <br> и нажмите кнопку \"Применить\"<h1>",
                    "fe_url_footer_top" => null,
                    "fe_url_footer_bottom" => null,

                ],
                "block_fields"=>[]
            ];

        }


        /* Формируем подвал с суммой платежей */
        $grouped_total_payment_plan = BlScheduleTabSchedule::where('bl_schedule_id', $this->card_main_data_models["BlSchedule"][0]['id'] ?? null)
            ->selectRaw('bl_schedule_article_name, bl_schedule_article_id  ,sum(schedule_row_value) as total_plan')
            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
            ->groupBy('bl_schedule_article_id', 'bl_schedule_article_name')->get()->toArray();

        foreach ($grouped_total_payment_plan as $key => &$value) {
            $value['total_plan'] = $this->formatNumbers($value['total_plan']);
        }
        unset($value);
        array_unshift($grouped_total_payment_plan, ['bl_schedule_article_name' => 'number', 'total_plan' => ""]);
        array_unshift($grouped_total_payment_plan, ['bl_schedule_article_name' => 'date', 'total_plan' => "Итого"]);

        /*  Формируем список полей для графика платежей */
        $table_fields = [];

        array_push($table_fields, [
            'key' => 'number',
            'edit' => true,
            "filter" => true,
            "sortable" => true,
            'type' => 'label',
            'typeVal' => 'number',
            'class' => '',
            "label" => '№',//$getArrayCaptions['Number']['translation_captions']['caption_translation'],
            'thStyle' => 'width: 6%',
            "zone" => "1",
            "order" => "2"
        ]);
        array_push($table_fields, [
            'key' => 'date',
            'edit' => true,
            "filter" => true,
            "sortable" => true,
            'type' => 'label',
            'typeVal' => 'date',
            'format' => 'DD-MM-YYYY',
            'class' => '',
            "label" => $this->getTranslatedCardCaption('Date'),
            'thStyle' => 'width: 14%',
            "zone" => "1",
            "order" => "2"
        ]);

        $scheduleArticles = BlScheduleTabArticle::where('bl_schedule_id', $this->card_main_data_models["BlSchedule"][0]['id'])
            ->select('bl_schedule_article_id as id', 'bl_schedule_article_name as name', 'line_n')
            ->join('blScheduleArticles', 'bl_schedule_article_id', '=', 'blScheduleArticles.id')
            ->orderBy('line_n')
            ->get()->toArray();
        foreach ($scheduleArticles as $key => $value) {
            if ($value['id'] != null) {
                array_push($table_fields, [
                    'key' => $value['name'],
                    "filter" => true,
                    "sortable" => true,
                    'type' => 'label',
                    'typeVal' => 'number',
                    'format' => '0,0.00',
                    'class' => '',
                    'label' => $value['name'],
                    'thStyle' => 'width: 15%'
                ]);
            }
        }

        /* Если Расчета есть тогда позвращаем его модель */
        return [
            "block_title" => $this->getTranslatedCardCaption('PaymentSchedule'),
            "block_zone_quantity" => 1,
            "block_model" => "PaymentSchedule",
            "list_footer" => $grouped_total_payment_plan,
            "block_type" => "block_list_base",
            "block_parameters" => [
                "prevent_list_click" => true,
                /* Устанавливаем флаг для прелоадера */
                "busy" => ($this->blockInputsAndRequery()),
            ],
            "show_name" => true,
            "block_fields" => $table_fields
        ];

    }

    protected function getLeasingSubjectBlockFields(){
        $fields = [
            [
            'title' => $this->getTranslatedCardCaption('LeasingSubject'),
            'model_name' => $this->card_controller_alias,
            'model' => '',
            'type' => 'title',
            'width' => '100%',
            "zone" => "1",
            "order" => "1",
            "border_right" => false
        ],
            [
                'title' => $this->getTranslatedCardCaption('CalculationTemplate'),
                'model' => 'calculation_template_id',
                'model_name' => $this->card_controller_alias,
                'width' => '100%',
                'perform_action' => true,
                'action_link' => '/admin/bl/leasing/calc/fields',
                'type' => 'vue-select',
                'zone' => '1',
                'order' => '2',
                'options' => [],
                "options_data" => [
                    "options_data_model" => "CalculationTemplates",
                    "options_field_id" => "id",
                    "options_field_title" => "calculation_template_name",
                    "search" => ""
                ],
            ],
            [
                'title' => $this->getTranslatedCardCaption('LeasingSubject'),
                'model' => 'bl_leasing_object_group_id',
                'model_name' => $this->card_controller_alias,
                'width' => '100%',
                'perform_action' => true,
                'action_link' => '/admin/bl/leasing/calc/update/leas/subject',
                'type' => 'vue-select',
                'zone' => '1',
                'order' => '3',
                'options' => [],
                "options_data" => [
                    "options_data_model" => "BlCustomerRequestTabLeasingObjectsForSelect",
                    "options_field_id" => "bl_leasing_object_group_id",
                    "options_field_title" => "bl_leasing_object_name",
                    "search" => ""
                ],
            ],
            [
                'title' => $this->getTranslatedCardCaption('kind'),
                'model_name' => $this->card_controller_alias,
                'model' => 'bl_leasing_object_type_name',
                'type' => 'label',
                'width' => '50%',
                "zone" => "1",
                "order" => "4",
                "border_right" => false
            ],
            [
                'title' => $this->getTranslatedCardCaption('Brand'),
                'model_name' => $this->card_controller_alias,
                'model' => 'bl_leasing_object_brand_name',
                'type' => 'label',
                'width' => '50%',
                "zone" => "1",
                "order" => "5",
                "border_right" => false
            ],
            [
                'title' => $this->getTranslatedCardCaption('Model'),
                'model_name' => $this->card_controller_alias,
                'model' => 'bl_leasing_object_model_name',
                'type' => 'label',
                'width' => '50%',
                'edit' => false,
                "zone" => "1",
                "order" => "6",
                "border_right" => false
            ],
            [
                'title' => $this->getTranslatedCardCaption('Amount'),
                'model_name' => $this->card_controller_alias,
                'model' => 'bl_leasing_object_quantity',
                'type' => 'label',
                'width' => '50%',
                'edit' => false,
                "zone" => "1",
                "order" => "7",
                "border_right" => false
            ],
        ];

        if (!empty($this->add_detail_block_fields)){
            array_push($fields, [
                'title' => $this->getTranslatedCardCaption('CalculationParameters'),
                'model_name' => $this->card_controller_alias,
                'model' => '',
                'type' => 'title',
                'width' => '100%',
                "zone" => "1",
                "order" => "8",
                "border_right" => false
            ]);
            $fields = array_merge($fields, $this->add_detail_block_fields);

        }

        if ($this->card_model[0]['stored_file_id'] != null){
            $fields = array_merge($fields, [
                [
                    'title' => "Скачать печатную форму",
                    'model' => 'id',
                    "model_name" => $this->card_controller_alias,
                    'action' => 'download_att_file',
                    'link' => "/admin/action/file/download",
                    'type' => 'button',
                    'width' => '50%',
                    "zone" => "1",
                    "order" => "17",
                ],
                [
                    'title' => "Предпросмотр печатной формы",
                    'model' => 'id',
                    "model_name" => $this->card_controller_alias,
                    'action' => 'preview_att_file',
                    'link' => "/admin/action/file/download",
                    'type' => 'button',
                    'width' => '50%',
                    "zone" => "1",
                    "order" => "17",
                ]
            ]);

        }

        return $fields;
    }


    /* События объекта */
    public function insert()
    {

    }

    public function update()
    {

    }

    public function beforeWriteBe(&$bCancel)
    {
        /* Записываем данные Доп реквизитов с моделей карточки в модель списка */
        $this->main_data_models['BlLeasingCalculationsTabAdditionalDetails'] = array_map(function($addDet) {
            if (!array_key_exists('add_detail_'.$addDet['one_additional_detail_code'], $this->main_data_models)) {
                return $addDet;
            }

            $model_name = 'add_detail_'.$addDet['one_additional_detail_code'];
            $field_name = $addDet['one_additional_detail_code'] . '_value';

            if ($addDet['one_add_detail_value'] == $this->main_data_models[$model_name][0][$field_name]) {
                return $addDet;
            }

            //Конвертация значения для различных типов
            switch ($this->main_data_models[$model_name][0]['calculation_parameter_type_code']){
                case 'Date':
                    $addDet['one_add_detail_value'] = date('Y-m-d', strtotime($this->main_data_models[$model_name][0][$field_name]));
                    break;
                case 'DateTime':
                    $addDet['one_add_detail_value'] = date('Y-m-d h:i:s', strtotime($this->main_data_models[$model_name][0][$field_name]));
                    break;
                case 'Time':
                    $addDet['one_add_detail_value'] = date('h:i:s', strtotime($this->main_data_models[$model_name][0][$field_name]));
                    break;
                default:
                    $addDet['one_add_detail_value'] = $this->main_data_models[$model_name][0][$field_name];
                    break;

            }

            if (!array_key_exists('status', $addDet))
                $addDet['status'] = 1;


            return $addDet;


        }, $this->main_data_models['BlLeasingCalculationsTabAdditionalDetails']);

        /* Изменяем параметры расчета для отправки в 1С */
        $this->main_data_models['BlLeasingCalculations']['calculating_l'] = true;

        /* Изменяем параметры графика для отправки в 1С */
        if ($this->main_data_models['BlSchedule'] != null) {

            $this->main_data_models['BlSchedule'][0]['calculating_l'] = true;

            try {
                DB::beginTransaction();

                $bl_schedules_controller = new BlSchedulesController();
                $bl_schedules_controller_alias = \App\Models\Controller::query()
                    ->where("controller_code", "BlSchedulesController")
                    ->value("controller_alias");

                $bl_schedules_request = new Request([
                    "form_parameters" => [
                        "form_base_data_model" => $bl_schedules_controller_alias
                    ],
                    "main_data_models" => [
                        $bl_schedules_controller_alias => $this->main_data_models['BlSchedule']
                    ]
                ]);

                $write_result = $bl_schedules_controller->write($bl_schedules_request)
                    ->getOriginalContent();

                if (isset($write_result["error"]) && $write_result["error"] === true) {
                    throw new \Exception("Ошибка изменения статуса графика");
                }

//                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                $bCancel = true;

                return [
                    "message" => $exception->getMessage()
                ];
            }
        }

    }

    public function afterWriteBe(&$bCancel, $request){
        if($this->main_data_models['BlSchedule'] == null) {
            return;

        }

        /* Закрываем транзакцию вызванную при отправке на запись Графика Платежей в beforeWriteBe */
        DB::commit();

    }

    public function onWriteError($request)
    {
        /* Отменяем транзакцию вызванную при отправке на запись Графика Платежей в beforeWriteBe */
        DB::rollBack();

    }

}
