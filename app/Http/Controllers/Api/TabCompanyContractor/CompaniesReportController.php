<?php

namespace App\Http\Controllers\Api\TabCompanyContractor;


use App\Http\Controllers\Api\TabCompanyContractor\CompaniesController;
use App\Models\Company;
use App\Models\ConsumerAccessRow;
use App\Models\DbArea;
use App\Models\DBase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Models\NameReport;
use App\QueueSignal;
use App\Report;
use App\ReportRequest;
use App\RequestNumber;
use App\Texts;
use App\Models\Language;
//use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Excel;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;


class CompaniesReportController extends Controller
{

    public  function index(Request $request){
        if(config('app.VueBlade')) {

            $consumer = Auth::user();
            if (($consumer->IsAdmin) == 1 or ($consumer->IsAdmin) == 2) {
                $report_companys = Company::all();
            } elseif ($consumer->IsAdmin == 3) {
                $report_companys = Company::all()->first();
            }
            // Commit 26.09.18 15:54 Albert Topalu

            //
            ////Add , Albert Topalu 24.09.18 09:43 ,// get  id from table  __AccessTypes where access_type_id = Company
            //            $accessTypeIdCompany = \Illuminate\Support\Facades\DB::table('__AccessTypes')->select('id')->where('access_type_code', '=',  'Company' )->value('id');
            //            //END , Albert Topalu 24.09.18 09:43
            //
            //            $accessCompanyAllConsumer = ConsumerAccessRow::with('accessCompanyAllDbArea','accesstype','companyDbArea.dBase.serverAccess')
            ////                ->where('consumer_id', $consumer->consumer_code) // update Albert Topalu 13.09.18 09:38
            //                ->where('consumer_id', $consumer->id)
            //
            //                //Update code, Albert Topalu 24.09.18 09:43 // get  access_type_id from table  __AccessTypes where access_type_id = Company
            ////                ->where('access_type_id', 1)
            //                ->where('access_type_id', $accessTypeIdCompany)
            //                //END Update code, Albert Topalu 24.09.18 09:43
            //                ->whereNull('company_id')
            //                ->get();
            //
            //            $accessCompanyConsumer = ConsumerAccessRow::with('accessCompany','accesstype','companyDbArea.dBase.serverAccess')
            ////                ->where('consumer_id', $consumer->consumer_code) // update Albert Topalu 13.09.18 09:38
            //                ->where('consumer_id', $consumer->id)
            //                //Update code, Albert Topalu 24.09.18 09:43 get  access_type_id from table  __AccessTypes where access_type_id = Company
            ////                ->where('access_type_id', 1)
            //                ->where('access_type_id', $accessTypeIdCompany)
            //                //END Update code, Albert Topalu 24.09.18 09:43
            //
            //                ->whereNotNull('company_id')
            //                ->get();
            //
            //            $accessCompanyAll = collect([
            //                'CompaniesAll' => $accessCompanyAllConsumer,
            //                'Company' => $accessCompanyConsumer
            //            ]);
            //
            //            $accessCompanyAllArr = [];
            //            foreach ($accessCompanyAll['CompaniesAll'] as $accessCompany) {
            //
            //                foreach ($accessCompany['accessCompanyAllDbArea'] as $companies) {
            //
            //                    $accessCompanyAllArr[] = [$companies->id, $companies->company_full_name];
            //                }
            //            }
            //
            //            foreach ($accessCompanyAll['Company'] as $accessCompany){
            //
            //                foreach ($accessCompany['accessCompany'] as $companies){
            //                    $accessCompanyAllArr[]= [$companies['id'],$companies['company_full_name']];
            //                }
            //            }

            // END Commit 26.09.18 15:54 Albert Topalu
            $report = Company::with('reports')->get()->toArray();



            $report_name = NameReport::all()->toArray();

//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $now = date('o-m-d');
            $startYear = date('o-01-01');
            $date = [
                'startYear' => $startYear,
                'now' =>  $now
            ];
            $lang =  [
                [
                    'caption' => 'EN',
                    'lang' => 'EN',
                ]

                // Commit 26.09.18 15:55 Albert Topalu
                    //  ,
                    //  [
                    //  'caption' => 'RU',
                    //  'lang' => 'RU'
                    //  ]
                //END  Commit 26.09.18 15:55 Albert Topalu
            ];
            $format = [
                [
                    'value' => 'html',
                    'caption' => 'HTML',
                ],
                [
                    'value' => 'pdf',
                    'caption' => 'PDF',
                ],
                [
                    'value' => 'xlsx',
                    'caption' => 'Excel',
                ]
            ];

            //Add 26.09.18 15:55 Albert Topalu
               //Get Access Companies to CompanyController
               $accessCompanyAllArr =(new CompaniesController())->accessedRows();
            //END Add 26.09.18 15:55 Albert Topalu


            return response()->json([
                'texts' => $texts,
                'consumer' => $consumer,
                'report_name' => $report_name,
                'report_companys' => $report_companys,
                'report' => $report,
                'lang' => $lang,
                'format' => $format,
                'date' => $date,
//                'accessCompanyAllArr' => $accessCompanyAllArr,
                'accessCompanyAllArr' => $accessCompanyAllArr['accessCompanyAllArr'],
//                'nameControllerMethod' => $nameControllerMethod,

            ]);
        }
        else {

            $consumer = Auth::user();
            if (($consumer->IsAdmin) == 1 or ($consumer->IsAdmin) == 2) {
                $report_companys = Company::all();
            } elseif ($consumer->IsAdmin == 3) {
                $report_companys = Company::all()->first();
            }

            $consumer = Auth::user();

//Add , Albert Topalu 24.09.18 09:43 ,// get  id from table  __AccessTypes where access_type_id = Company
            $accessTypeIdCompany = \Illuminate\Support\Facades\DB::table('__AccessTypes')->select('id')->where('access_type_code', '=',  'Company' )->value('id');
            //END , Albert Topalu 24.09.18 09:43

            $accessCompanyAllConsumer = ConsumerAccessRow::with('accessCompanyAllDbArea','accesstype','companyDbArea.dBase.serverAccess')
//                ->where('consumer_id', $consumer->consumer_code) // update Albert Topalu 13.09.18 09:38
                ->where('consumer_id', $consumer->id)

                //Update code, Albert Topalu 24.09.18 09:43 // get  access_type_id from table  __AccessTypes where access_type_id = Company
//                ->where('access_type_id', 1)
                ->where('access_type_id', $accessTypeIdCompany)
                //END Update code, Albert Topalu 24.09.18 09:43
                ->whereNull('company_id')
                ->get();

            $accessCompanyConsumer = ConsumerAccessRow::with('accessCompany','accesstype','companyDbArea.dBase.serverAccess')
//                ->where('consumer_id', $consumer->consumer_code) // update Albert Topalu 13.09.18 09:38
                ->where('consumer_id', $consumer->id)
                //Update code, Albert Topalu 24.09.18 09:43 get  access_type_id from table  __AccessTypes where access_type_id = Company
//                ->where('access_type_id', 1)
                ->where('access_type_id', $accessTypeIdCompany)
                //END Update code, Albert Topalu 24.09.18 09:43

                ->whereNotNull('company_id')
                ->get();

            $accessCompanyAll = collect([
                'CompaniesAll' => $accessCompanyAllConsumer,
                'Company' => $accessCompanyConsumer
            ]);


            $accessCompanyAllArr = [];
            foreach ($accessCompanyAll['CompaniesAll'] as $accessCompany) {

                foreach ($accessCompany['accessCompanyAllDbArea'] as $companies) {

                    $accessCompanyAllArr[] = [$companies->id, $companies->company_full_name];
                }
            }

            foreach ($accessCompanyAll['Company'] as $accessCompany){

                foreach ($accessCompany['accessCompany'] as $companies){
                    $accessCompanyAllArr[]= [$companies['id'],$companies['company_full_name']];
                }
            }


            $report = Company::with('reports')->get();
            $report_name = NameReport::all();

            $texts = DB::table('_TranslationCaptions')
                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
                ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
                ->where('languages.language_code', config('app.locale'))
                ->get();

            return view('auth.admin.page.company-report',
                compact('report_name',
                    'report_companys',
                    'report_language', 'report_format',
                    'report', 'consumer', 'texts', 'accessCompanyAllArr'
                ));
        }
    }

    public  function getUpdatedDataById(Request $request){
//        $consumer = Auth::user();

        $data = Report::whereIn('id', $request->toArray()['data'])->get();

        $idToFileData = [];

        foreach ($data as $datum) {
            $idToFileData[$datum->id] = $datum->report_file;
        }

        return response()->json($idToFileData);
    }

    public function getRequest(Request $request){
        $data = json_decode($request->getContent());
        if(false === $data['token']) {
        }
        return response()->json([
            'key' => 'value123'
        ]);
    }

    public  function sendRequest(Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'TypeReport' => 'required',
            'CompanyReport' => 'required',
            'StartDateReport' => 'required',
            'EndDateReport' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $paramReports = NameReport::where('name_report',$request->TypeReport)
            ->with('paramReports')->get();
        $arr =[];
        foreach ($paramReports as $paramReport){

            foreach ($paramReport->paramReports as $params){
                $arr[$params->name_param] = $params->pivot->value;
            }
        }



        $company = Company::where('id', $request->CompanyReport)->get()->toArraY();

//        if (($request->LanguageReport) == null) {
//            $lng = 'EN';
//        }
        if (($request->LanguageReport) == 'RU') {
            $lng = 'RU';
        }
        if (($request->LanguageReport) == 'EN') {
            $lng = 'EN';
        }

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
        $report->company_id = $company[0]['id'];
        $report->report_name = $request->TypeReport;
//        $report->report_name = $nameReportCompany;          // Insert Albert Topalu 13.09.18
        $report->report_name_en = $nameReportCompanyEn; // Insert Albert Topalu 14.09.18 10:20
        $report->report_name_ru = $nameReportCompanyRu; // Insert Albert Topalu 14.09.18 10:2

        $report->report_lng = $lng;
        $report->report_organisation = $company[0]['company_full_name'];
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
        $data['request']['request_parameters']['report']['report_parameters']['Организация'] = $company[0]['uid_1c_code'];
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

    public  function downloadXLSX(Request $request){

        $data = Report::where('id', $request->IdReportXlsx)->first();
        $data= $data->report_file;
        list($data)  = explode(',', $data);
        $data = base64_decode($data);
        $date = Carbon::now()->addDay();
        file_put_contents( (public_path('/reports/xlsx/'.$date.'.xlsx')), $data);

        chmod(public_path('/reports/xlsx/'.$date.'.xlsx'), 0777);

        return response()->download(public_path('/reports/xlsx/'.$date.'.xlsx'))->deleteFileAfterSend(true);

    }

    public  function downloadPDF(Request $request){
        $data = Report::where('id', $request->IdReportPdf)->first();
        $data= $data->report_file;

        list($data)  = explode(',', $data);
        $data = base64_decode($data);
        $date = Carbon::now()->addDay();
        file_put_contents( (public_path('/reports/pdf/'.$date.'.pdf')), $data);

        chmod(public_path('/reports/pdf/'.$date.'.pdf'), 0777);

        return response()->download(public_path('/reports/pdf/'.$date.'.pdf'))->deleteFileAfterSend(true);

    }

    public  function downloadHTML(Request $request){
        $data = Report::where('id', $request->IdReportHtml)->first();
        $data= $data->report_file;

        list($data)  = explode(',', $data);
        $data = base64_decode($data);
        $date = Carbon::now()->addDay();
        file_put_contents( (public_path('/reports/html/'.$date.'.html')), $data);

        chmod(public_path('/reports/html/'.$date.'.html'), 0777);

        return response()->download(public_path('/reports/html/'.$date.'.html'))->deleteFileAfterSend(true);

    }

    public function htmlFileAjax(Request $request){
        $Report = Report::where('id', $request->id)->first();

        return response()->json( base64_decode($Report->report_file));
    }

    public function typeFileAjax(Request $request){
        $Report = Report:: with('reportRequests')->where('id', $request->id)->first();

        $uid_1c_code = Company::where('company_full_name', $Report['report_organisation'])->first();
        $json_encode = \GuzzleHttp\json_encode($Report);
        $array = json_decode($json_encode, true);

        $item = $array['report_requests'];
        $arr=[];
        foreach ($item as $key=>$value){
            $arr[$value['param'] ]= $value['value'];
        }

        $data = [
            'access' => [
                'user' => 'user_name',
                'password' => 'user_password'
            ],
            'request' => [
                'request_name' => 'Get1CReport',
                'request_number' => (int) '1',
                'request_customer' => (int)'1',
                'request_parameters' => [
                    'report' => [
                        'report_name' => '',
                        'report_language' => '',
                        'report_format' => 'html',
                        'report_parameters' => $arr
                    ]
                ]
            ]
        ];

        $data['request']['request_parameters']['report']['report_parameters'] = $arr;

        $data['request']['request_parameters']['report']['report_name'] = $array['report_name'];
        $data['request']['request_parameters']['report']['report_parameters']['Организация'] = $uid_1c_code['uid_1c_code'];
        $data['request']['request_parameters']['report']['report_language'] = $array['report_lng'];
        $data['request']['request_parameters']['report']['report_parameters']['НачалоПериода'] = $array['report_start_date'];

        $data['request']['request_parameters']['report']['report_parameters']['КонецПериода']  = $array['report_end_date'];


//        $client = new Client();
//        $res = $client->request('POST', 'd1c.fngarant.ru/coinhand_dev/hs/api_for_wc/signal', [  // url api otnositelino domena
//            'json' => $data,
//            'auth' => ['WebCabinet'.$request->LanguageReport, 'WebCabinet'],
//            'headers' => [
//                'Referer' => 'www.test.com',
//            ]
//        ]);

        $company = Company::where('id', $request->CompanyReport)->get()->toArraY();
        $company_db_area_id= $company[0]['db_area_id'];
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


        $resArray = \GuzzleHttp\json_decode($res->getBody());

        if ($resArray->status->status_code == 1) {
//            Report::where('id',$request->id)->update(
//                [
//                    'report_file_html_show' =>$resArray->report->report_file
//                ]
//            );
            return response()->json( base64_decode($resArray->report->report_file)  );
        }
//        elseif ($resArray->status->status_code == 0){
//
//            return back()->with('alert', trans('messages.reportError'));
//        }


//        return response()->json($resArray);

    }

    public function test(Request $request){

        return response()->json('answer ok');
    }
}
