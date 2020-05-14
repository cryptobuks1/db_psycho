<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\ContractorContract;
use App\Models\Company;
use App\Models\Country;
use App\Models\DbArea;
use App\Models\NameReport;
use App\QueueSignal;
use App\Report;
use App\ReportRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class BlReportLeasingContractBalanceController extends Controller
{

    public function list(Request $request)
    {

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Databases',
            'DbTypes', 'DbType', 'DbTypeCode',
            'DbTypeName', 'DbTypeRemark',
            'Code','Name','Remark'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $reports= Report::get()->toarray();

        $list = [

            "main_data_models" => [

                "Report" => $reports,

            ],
            "form_parameters" => [
//                "form_title" => $getArrayCaptions['DbTypes']['translation_captions']['caption_translation'],
                "form_title" => 'List Report',
                "form_code" => "DbTypes",
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => "DbTypes",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [

                    "form_card_url" => "/dbTypes/",
                    "form_search_field" => "db_type_name",
                ],
            ],
            "links" => [

//                ["link_title" => $getArrayCaptions['Databases']['translation_captions']['caption_translation'],
                ["link_title" => 'Create a New Report',
//                    "link_url" => "/externalReport/create",
                    "link_url" => "/reportsLeasingContractBalance/create",
                    "class" => "btn btn-link",
                    "link_type" => "internal",
                    "img" => ""
                ],
            ],
            "tabs" => [

                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
//                    "blocks_quantity" => 0,  //commit Albert Topalu
                    "blocks_quantity" => 1,   //add Albert Topalu 16.11.18
                    "blocks" => [

                        [
                            "block_title" => $getArrayCaptions['DbTypes']['translation_captions']['caption_translation'],
//                            "block_zone_quantity" => 0, //commit Albert Topalu
                            "block_zone_quantity" => 1, //add Albert Topalu
                            "block_model" => "Report",
                            "block_type" => "block_list_base",
                            "block_fields" => [

                                ['key' => 'actions',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "1"  //add Albert Topalu 16.11.18
                                ],


                                ['key' => 'actions',
                                    'sortable' => false,
                                    'class' => 'actions',
//                                    'label' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'label' => 'list_checkbox',
                                    'thStyle' => 'width: 18%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "1" //add Albert Topalu 16.11.18

                                ],

                                [
                                    'key' => 'report_name_ru',
                                    'sortable' => true,
                                    'class' => 'report_name_ru',
//                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'label' => 'Report Type',
                                    'thStyle' => 'width: 10%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "2" //add Albert Topalu 16.11.18


                                ],
                                [
                                    'key' => 'report_format',
                                    'sortable' => true,
                                    'class' => 'report_format',
//                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'label' => 'Format',
                                    'thStyle' => 'width: 10%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "3" //add Albert Topalu 16.11.18


                                ],

                                ['key' => 'report_start_date',
                                    'sortable' => true,
                                    'class' => 'report_start_date',
//                                    'label' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'label' => 'Period',
                                    'thStyle' => 'width: 18%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "4" //add Albert Topalu 16.11.18

                                ],

                                ['key' => 'report_status',
                                    'sortable' => true,
                                    'class' => 'report_status',
//                                    'label' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'label' => 'Status',
                                    'thStyle' => 'width: 18%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "5" //add Albert Topalu 16.11.18
                                ],

                                ['key' => 'button',
                                    'sortable' => false,
                                    'class' => 'button',
//                                    'label' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'label' => 'button',
                                    'thStyle' => 'width: 28%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "6" //add Albert Topalu 16.11.18

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
            'ok', 'apply', 'back', 'CountryRegCountry',
            'AreaDB', 'Individual', 'DB', 'TaxpayerNumber', 'CryptoTokenIdNull',
            'CryptoPlatformAccounts', 'CryptoExchangeAccounts', 'CryptoWallets',
            'ServerDB', 'CodeReasonNumber', 'Actual', 'BankAccounts', 'CryptoAccounts', 'CryptoPlatform',
            'Main', 'CreationDetails', 'Contractor', 'ContractorFullName', 'ContractorShortName', 'RegistryNumber',
            'TaxpayerNumber', 'CodeReasonNumber', 'SocialSecurityNumber', 'CountryName', 'Database', 'EntrepreneurCertificate',
            'EntrepreneurCertificateDate', 'CreationDetails', 'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
            'ReportsLeasingContractBalance',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
//        $contract = ContractorContract::all()->toArray();

        $contract = ContractorContract::select('id', 'contractor_contract_name')->get()->toarray();

        $card = [

            "main_data_models" => [
                "Contractor" => [
                    [
                        'startDate' => "2019.05.01",
                        'endDate' => "2019.05.10",
                    ]
                ]
            ],

            "add_data_models" => [
                "Contract" => $contract
            ],

            "form_parameters" => [
//                "form_title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                "form_title" => 'Report generation',
                "form_code" => "contractors",
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "card",
                "form_base_data_model" => "Contractor",
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => '',
                "form_type_list" => [
                    "form_card_url" => "/contractors_new/",
                    "form_search_field" => "contractor_full_name",
                ],
            ],

            "actions" => [
                "actions_card" => [
//                    ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
//                    ["title" => 'Create a new report', "code" => "save", "class" => "btn btn-green", "link" => "/admin/report/leasing/create", "img" => ""],
                    ["title" => 'Create a new report', "code" => "save", "class" => "btn btn-green", "link" => "/admin/bl/report/leasing/contract/balance/create", "img" => ""],
                    ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                ]
            ],

            "links" => [
                [
                    "link_title" =>  'List Report',
                    "link_img" => "",
                    "link_type" => "internal_push",
                    "link_url" => "/externalReport"  // get link "/externalReport" from table
                ],
            ],

            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "tab_name" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "tab_description" => '',
                    "blocks_quantity" => 1,
//                            "accordion"=>true,
//                            "visible"=>true,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 2,
//                                    "block_zones_separator" => true,
                            "block_model" => "Contractor",
                            "block_type" => "block_card",
                            "block_fields" => [

                                ['title' => 'start date', 'model' => 'startDate', 'type' => 'date', 'width' => '50%', "zone" => "1", "order" => "5", "border_right" => false],
                                ['title' => 'end date', 'model' => 'endDate', 'type' => 'date', 'width' => '50%', "zone" => "1", "order" => "5", "border_right" => false],
                                [
//                                            'title' => $getArrayCaptions['ReportsLeasingContractBalance']['translation_captions']['caption_translation'],
                                    'title' => 'Договор',
                                    'model' => 'contract',
                                    'type' => 'lt-select',
                                    'width' => '50%',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "Contract",
                                        "options_field_id" => "id",
                                        "options_field_title" => "contractor_contract_name",
//                                        "options_field_title" => $contract,
                                        "search" => ""
                                    ],
                                    "zone" => "1",
                                    "order" => "1",
                                    "border_right" => false
                                ],
                            ]
                        ],
                    ]
                ],
            ]
        ];


        return response()->json($card);
    }

    public  function sendRequest(Request $request){
//        $getContent = \GuzzleHttp\json_decode($request->getContent());

        $getContent=  json_decode(json_encode(\GuzzleHttp\json_decode($request->getContent())), true);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
//            'TypeReport' => 'required',  startDate endDate

//            'CompanyReport' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

//        $paramReports = NameReport::where('name_report',$request->TypeReport)->with('paramReports')->get();
        $paramReports = NameReport::where('name_report', 'ОборотноСальдоваяВедомость')->with('paramReports')->get()->toArray();


        $arr =[];
        foreach ($paramReports as $paramReport){
            foreach ($paramReport['param_reports'] as $params){
                $test= $params;
                $arr[$params['name_param']] = $params['pivot']['value'];
            }
        }
        $lng = 'RU';

//        $company = Company::where('id', $request->CompanyReport)->get()->toArraY();

//        if (($request->LanguageReport) == 'RU') {
//            $lng = 'RU';
//        }
//        if (($request->LanguageReport) == 'EN') {
//            $lng = 'EN';
//        }

        if ($lang_loc = Config::get('app.locale') == "en"){
            $nameReportsIdEN = \Illuminate\Support\Facades\DB::table('name_reports')->select('id')->where('name_report', '=',  $request->TypeReport )->value('id');
//            $nameReportCompany = \Illuminate\Support\Facades\DB::table('name_reports')->select('name_report')->where('id', '=',  $nameReportsIdEN )->value('name_report');

        }

        if ($lang_loc = Config::get('app.locale') == "ru"){
            $nameReportsIdEN = \Illuminate\Support\Facades\DB::table('name_reports')->select('id')->where('name_report', '=',  $request->TypeReport )->value('id');
//            $nameReportCompany = \Illuminate\Support\Facades\DB::table('name_reports')->select('name_report')->where('id', '=',  $nameReportsIdEN )->value('name_report');
        }

        $nameReportCompanyEn = \Illuminate\Support\Facades\DB::table('name_reports')->select('en')->where('id', '=',  $nameReportsIdEN )->value('en');
        $nameReportCompanyRu = \Illuminate\Support\Facades\DB::table('name_reports')->select('ru')->where('id', '=',  $nameReportsIdEN )->value('ru');

        $report = new Report();
        $report->user_id = Auth::user()->id;
//        $report->company_id = $company[0]['id'];
        $report->report_name = $request->TypeReport;
//        $report->report_name = $nameReportCompany;          // Insert Albert Topalu 13.09.18
        $report->report_name_en = $nameReportCompanyEn; // Insert Albert Topalu 14.09.18 10:20
        $report->report_name_ru = $nameReportCompanyRu; // Insert Albert Topalu 14.09.18 10:2

        $report->report_lng = $lng;
//        $report->report_organisation = $company[0]['company_full_name'];
        $report->report_format = $request->formatReport;
        $report->report_start_date = $request->StartDateReport;
        $report->report_end_date = $request->EndDateReport;
        $report->report_status = 'is formed';
        $report->save();

        foreach ($arr as $key => $value){
            ReportRequest::create([
                'report_id' => Report ::latest()->first()->id,
                'param' => $key,
                'value' => $value,
            ]);
        }
        $signal = new QueueSignal();
        $signal->model = 'report_id';
        $signal->model_id = Report ::latest()->first()->id;
        $signal->user_id = Auth::user()->id;
        $signal->save();

        $idSignal = QueueSignal ::latest()->first()->id;

        $data = [
            'request' => [
                'request_name' => 'Get1CReportSignal',
                'request_number' => (int) $idSignal,
//                'request_customer' => (int)'1', //id user  commit Albert Topalu 26.09.18 14:34
                'request_customer' => (int) Auth::user()->id, //id user
                'request_parameters' => [
                    'report' => [
                        'report_name' => $request->TypeReport,
//                        'report_language' => 'EN',
                        'report_format' => '',
                        'report_parameters' => $arr
                    ]
                ]

            ]
        ];

        $data['request']['request_parameters']['report']['report_parameters'] = $arr;
        $data['request']['request_parameters']['report']['report_name'] = $request->TypeReport;
//        $data['request']['request_parameters']['report']['report_parameters']['Организация'] = $company[0]['uid_1c_code'];
        $data['request']['request_parameters']['report']['report_parameters']['НачалоПериода'] = $request->StartDateReport;
        $data['request']['request_parameters']['report']['report_parameters']['КонецПериода']  = $request->EndDateReport;
        $data['request']['request_parameters']['report']['report_language'] = $request->LanguageReport;
        $data['request']['request_parameters']['report']['report_format'] = $request->formatReport;

        $company_db_area_id= $company[0]['db_area_id'];

//        $serverDb = DbArea::with('dBase.serverDb')->where('id', $company_db_area_id)->get()->toArray();

        $serverDb = DbArea::with('dBase.serverDb')->where('id', $company_db_area_id)->get()->toArray();

        $serverUrl= $serverDb[0]['d_base']['server_db']['server_url'].'/'.$serverDb[0]['d_base']['db_name'];

        $host = request()->root();
        $host = preg_replace('#^https?://#', '', rtrim($host,'/'));

        $client = new Client();

        $res = $client->request('POST', $serverUrl.'/hs/api_for_wc/signal', [
            'json' => $data,
            'auth' => ['WebCabinet'.$request->LanguageReport, 'WebCabinet'],
            'headers' => [
                'Referer' => "$host",
            ]
        ]);

        $resArray = \GuzzleHttp\json_decode($res->getBody()); ///?????

        return back()->with('alert', trans('messages.reportSend'));

        $resArray = \GuzzleHttp\json_decode($res->getBody());

        if ($resArray->status->status_code == 1) {

            $company = Company::where('id', $request->CompanyReport)->get();

//            Delete  Albert Topalu 14.07.18 18:35

            //            if (($request->LanguageReport) == null) {
            //                $lng = 'EN';
            //            }
            //            if (($request->LanguageReport) == 'RU') {
            //                $lng = 'RU';
            //            }

//         END  Delete  Albert Topalu 14.07.18 18:35

            Report::create([
                'user_id' => Auth::user()->id,
                'company_id' => $company->first()->id,
                'report_name' => $resArray->report->report_name,
                'report_lng' => $lng,
                'report_organisation' => $resArray->report->report_organisation,
                'report_format' => $resArray->report->report_format,
                'report_start_date' => $request->StartDateReport,
                'report_end_date' => $request->EndDateReport,
                'report_file' => $resArray->report->report_file,
            ]);

            return back()->with('alert', trans('messages.reportCreated'));
        }
        elseif ($resArray->status->status_code == 0){

            return back()->with('alert', trans('messages.reportError'));
        }
    }

}
