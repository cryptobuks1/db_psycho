<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\CompanyInfo;
use App\ConsumerInfo;
use App\Http\Classes\ConsumerParameters;
use App\Models\InfoKind;
use App\Models\InfoType;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Contractor;
use App\Http\Controllers\Api\Controller;
use App\Models\ContractorInfo;
use App\Models\DbArea;
use App\Models\Country;
use App\Models\ZzContractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;


class AccessesController extends Controller
{
    public function consumerCode(){
        $consumerCode = (new ConsumerParameters())->consumerCode();
        return $consumerCode;
    }

    public function index()
    {
        if (config('app.VueBlade')) {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();

            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $contractors = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
                'consumerAccess', 'contractorinfo', 'contractorinfo.infokind',
                'contractorinfo.infotype', 'contractorinfo.regions', 'contractorinfo.regions.country')->get(); //todo 'consumerAccess',
            //            $json = "[{'title':'User Profile','img':'/img/userData.svg','link':'/1','children':[{'title':'User Info','link':'/2'}]},{'title':'Administration','img':'/img/administration.svg','link':'/3','children'':[{'title':'DB','link':''/4''},{'title':'Country and Region','link':''/5''},{'title':'Accesses','link':''/6''},{'title':'Languages','link':''/12'','children':[{'title':'Language Name','link':''/7''},{'title':'Caption List','link':''/8''},{'title':'Caption Code','link':''/9''}]}]},{'title':'Report','link':''/11'','img':''/img/report.svg'','children':[{'title':'Organizations','link':''/10''}]}]'";


            return response()->json([
                'texts' => $texts,
                'consumer' => $consumer,
                'contractors' => $contractors,
            ]);
        } else {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $company = Company::all();

            $contractors = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
                'consumerAccess', 'contractorinfo', 'contractorinfo.infokind',
                'contractorinfo.infotype', 'contractorinfo.regions', 'contractorinfo.regions.country')->get();

            $country = Country::all();
            $dbarea = DbArea::all();
            $infokind = InfoKind::all();
            $infotype = InfoType::all();
            $companyInfo = CompanyInfo::all();
            $contractorInfo = ContractorInfo::with('country', 'contractors', 'infokind', 'infotype')
                ->get();

            return view('/auth.admin.page.accesses',
                compact('consumer', 'texts',
                    'contractors', 'country', 'dbarea', 'company', 'infokind',
                    'infotype', 'companyInfo', 'contractorInfo'
                ));
        }
    }

    public function show(Request $request)
    {
        if (config('app.VueBlade')) {


            //todo вернуть связь consumerAccesses


//            $test = Contractor::with('contractorinfo','contractorinfo.infotype')
//                ->where('id', $request->id)
//                ->get();
//            dd($test);

            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $country = Country::select('id', 'country_name')->get();
            $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();
            $infotype = InfoType::with('infokind')->get();


            ///юзай TypeContractor, т.к. он наиболее струетурированный
            $TypeContractor = DB::table('Contractors')
                ->join('ContractorInfo', 'Contractors.id', '=', 'ContractorInfo.contractor_id')
                ->join('_Info_types', 'ContractorInfo.info_type_id', '=', '_Info_types.id')
                ->join('_Info_kinds', 'ContractorInfo.info_kind_id', '=', '_Info_kinds.id')
                ->where('Contractors.id', $request->id)
                ->select('_Info_types.id', 'info_type_name', 'info_kind_id', 'info_kind_name', 'ContractorInfo.*')
                ->groupBy('info_type_name', 'ContractorInfo.id')
                ->get();

            $type = DB::table('Contractors')
                ->join('ContractorInfo', 'Contractors.id', '=', 'ContractorInfo.contractor_id')
                ->join('_Info_types', 'ContractorInfo.info_type_id', '=', '_Info_types.id')
                ->where('Contractors.id', $request->id)
                ->select('_Info_types.id', 'info_type_name')
                ->groupBy('info_type_name', '_Info_types.id')
                ->get();

            $kind = DB::table('Contractors')
                ->join('ContractorInfo', 'Contractors.id', '=', 'ContractorInfo.contractor_id')
                ->join('_Info_kinds', 'ContractorInfo.info_kind_id', '=', '_Info_kinds.id')
                ->join('_Info_types', '_Info_kinds.info_type_id', '=', '_Info_types.id')
                ->where('Contractors.id', $request->id)
                ->select('info_kind_id', 'info_kind_name', 'info_type_name', '_Info_types.id')
                ->get();

            $contractor = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
                'consumerAccess', 'contractorinfo', 'contractorinfo.infokind',
                'contractorinfo.infotype', 'contractorinfo.regions', 'contractorinfo.regions.country')
                ->where('id', $request->id)
                ->get();

            $caption = [
                [
                    'title' => $texts->where('caption_name', "accContractorFullName")->first()->caption_translation,
                    'model' => 'contractor_full_name',
                    'type' => 'text',
                    'long_i' => true
                ],
                [
                    'title' => $texts->where('caption_name', "accContractorShortName")->first()->caption_translation,
                    'model' => 'contractor_short_name',
                    'type' => 'text',
                    'long_i' => true
                ],
                [
                    'title' => $texts->where('caption_name', "registry_number")->first()->caption_translation,
                    'model' => 'register_number',
                    'type' => 'text'
                ],
                [
                    'title' => $texts->where('caption_name', "taxpayer_number")->first()->caption_translation,
                    'model' => 'taxpayer_number',
                    'type' => 'text'
                ],
                [
                    'title' => $texts->where('caption_name', "code_reason_number")->first()->caption_translation,
                    'model' => 'code_reason_number',
                    'type' => 'text'
                ],
                [
                    'title' => $texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation,
                    'model' => 'entrepreneur_certificate_date',
                    'type' => 'date'
                ],
                [
                    'title' => $texts->where('caption_name', "Actual")->first()->caption_translation,
                    'model' => 'actual_l',
                    'type' => 'checkbox'
                ],
                [
                    'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                    'country' => 'country_id',
                    'type' => 'select',
                    'options' => []
                ],
                [
                    'title' => $texts->where('caption_name', "AreaDB")->first()->caption_translation,
                    'model' => 'db_area_id',
                    'type' => 'select',
                    'options' => []
                ],
//                [
//                    'title' => $texts->where('caption_name', "individual")->first()->caption_translation,
//                    'model' => 'individual_l',
//                    'type' => 'checkbox'
//                ],
                [
                    'title' => $texts->where('caption_name', "DB")->first()->caption_translation,
                    'model' => 'db_name',
                    'type' => 'label'
                ],
                [
                    'title' => $texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation,
                    'model' => 'entrepreneur_certificate',
                    'type' => 'text'
                ],
                [
                    'title' => $texts->where('caption_name', "ServerDB")->first()->caption_translation,
                    'model' => 'server_name',
                    'type' => 'label'
                ],
                [
                    'title' => $texts->where('caption_name', "social_security_number")->first()->caption_translation,
                    'model' => 'social_security_number',
                    'type' => 'text'
                ]
            ];


            return response()->json([
                'texts' => $texts,
                'consumer' => $consumer,
                'contractor' => $contractor,
                'country' => $country,
                'dbarea' => $dbarea,
                'TypeContractor' => $TypeContractor,
                'type' => $type,
                'kind' => $kind,
                'infotype' => $infotype,
                'caption' => $caption
            ]);
        }
    }

    public function update(Request $request)
    {
        $test123 =  $request;

        if (config('app.VueBlade')) {

            $model=$request->Contractor[0];
//            dd( $model);
            return Contractor::where('id',$model['id'] )->update(
                ['country_id' => $model['country_id'],
                    'db_area_id' => $model['db_area_id'],
//                    'uid_1c_code' => $model['uid_1c_code'],
                    'individual_l' => $model['individual_l'],
//                    'identity_document' => $model['identity_document'],
                    'contractor_full_name' => $model['contractor_full_name'],
                    'contractor_short_name' => $model['contractor_short_name'],
                    'taxpayer_number' => $model['taxpayer_number'],
                    'code_reason_number' => $model['code_reason_number'],
                    'social_security_number' => $model['social_security_number'],
                    'register_number' => $model['register_number'],
                    'entrepreneur_certificate' => $model['entrepreneur_certificate'],
                    'entrepreneur_certificate_date' => $model['entrepreneur_certificate_date'],
                    'actual_l' => $model['actual_l'],
                    'updated_by' => $this->consumerCode()
                ]
            );
        } else {
            Contractor::where('id', $request->accContractorId)->update([
                'country_id' => $request->accCountry,
                'db_area_id' => $request->accDBArea,
                'uid_1c_code' => $request->accCompUid1cCode,
                'individual_l' => $request->accindividual_l,
                'identity_document' => $request->accIdentity_document,
                'contractor_full_name' => $request->accContractor_fullname,
                'contractor_short_name' => $request->accContractor_short_name,
                'taxpayer_number' => $request->accTaxpayer_number,
                'code_reason_number' => $request->accCode_reason_number,
                'social_security_number' => $request->accSocial_security_number,
                'register_number' => $request->accRegistry_number,
                'entrepreneur_certificate' => $request->accEntrepreneur_certificate,
                'entrepreneur_certificate_date' => $request->accEntrepreneur_certificate_date,
                'updated_by' => $this->consumerCode()
            ]);
            return back()->with('alert', trans('messages.saved'));
        }
    }

    public function insert(Request $request)
    {
        if (config('app.VueBlade')) {
            $consumerCode = Auth::user()->consumer_code; //Albert Topalu 29.10.18 12:34
            return Contractor::create([
                'country_id' => $request->country_id,
                'db_area_id' => $request->db_area_id,
                'uid_1c_code' => $request->uid_1c_code,
                'individual_l' => $request->individual_l,
                'identity_document' => $request->identity_document,
                'contractor_full_name' => $request->contractor_full_name,
                'contractor_short_name' => $request->contractor_short_name,
                'taxpayer_number' => $request->taxpayer_number,
                'code_reason_number' => $request->code_reason_number,
                'social_security_number' => $request->social_security_number,
                'register_number' => $request->register_number,
                'entrepreneur_certificate' => $request->entrepreneur_certificate,
                'entrepreneur_certificate_date' => $request->entrepreneur_certificate_date,
                'actual_l' => $request->actual_l, //Albert Topalu 29.10.18 12:34
                'created_by' => $consumerCode
            ]);
        } else {
            $consumerCode = Auth::user()->consumer_code; //Albert Topalu 29.10.18 12:34
            Contractor::create([
                'country_id' => $request->accAddCountry,
                'db_area_id' => $request->accAddDBArea,
                'uid_1c_code' => $request->accAddCompUid1cCode,
                'individual_l' => $request->accAddindividual_l,
                'identity_document' => $request->accAddIdentity_document,
                'contractor_full_name' => $request->accAddContractor_fullname,
                'contractor_short_name' => $request->accAddContractor_short_name,
                'taxpayer_number' => $request->accAddTaxpayer_number,
                'code_reason_number' => $request->accAddCode_reason_number,
                'social_security_number' => $request->accAddSocial_security_number,
                'register_number' => $request->accAddRegistry_number,
                'entrepreneur_certificate' => $request->accAddEntrepreneur_certificate,
                'entrepreneur_certificate_date' => $request->accAddEntrepreneur_certificate_date,
                'created_by' => $consumerCode
            ]);
            return back()->with('alert', trans('messages.createContractor'));
        }
    }


    public function consumerModalAjax(Request $request)
    {
        $info = ConsumerInfo::with(['country'])->with(['infokind'])->with(['infotype'])
            ->where('contractor_id', $request->id)
            ->get();
        return response()->json($info);
    }

    public function companyModalAjax(Request $request)
    {
        $info2 = CompanyInfo::with(['country'])->with(['infokind'])->with(['infotype'])
            ->where('company_id', $request->id)
            ->get();
        return response()->json($info2);
    }

    public function buildContractorsCard(Request $request)
    {


        $this->texts = DB::table('_TranslationCaptions')
            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
            ->where('languages.language_code', config('app.locale'))
            ->get();

        $contractor = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb')
            ->where('id', $request->id)
            ->get();
        $countires = Country::get()->toarray();
        $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();
        $contractorsCard = array(

            "main_data_models" => [


                    "Contractors" => $contractor,
//                    "data_model_fields" => $contractor




            ],
            "add_data_models" => [
                'Countries' => $countires,
//                "data_model_name" => "Countries",
//                "data_model_fields" => $countires
                'DBAreas' => $dbarea,

            ],
            "form_parameters" => [

                "form_title" => $this->texts->where('caption_name', "AccContractor")->first()->caption_translation,
                "form_code" => "contractors",
                "form_type" => "card",
                "form_base_data_model" => "Contractors",
                "form_main_data_model_id_field" => "id",

            ],
            "actions" => [

                "actions_card" => [
                    ["title" => "OК", "class" => "btn btn-green", "code" => "save", "link" => "ссылка на действие", "img" => ""],
                    ["title" => "Применить", "class" => "btn btn-green", "code" => "apply", "link" => "ссылка на действие", "img" => ""],
                    ["title" => "Назад", "class" => "btn btn-grey", "code" => "back", "link" => "ссылка на действие", "img" => ""],
                ]


            ],
            "links" => [

                ["link_title" => "Контактная информация", "link_url" => "/contactInfo", "link_type" => "internal", "img" => ""],
            ],
            "tabs" => [

                [
                "tab_title" => "Основная информация",
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => "",
                        "block_zone_quantity" => 2,
                        "block_model" => "Contractors",
                        "block_type" => "block_list_base",
                        "block_fields" => [

                            ['title' => $this->texts->where('caption_name', "accContractorFullName")->first()->caption_translation, 'model' => 'contractor_full_name', 'type' => 'text',  'width' => '50%', "zone" => "1", "order" => "1"],
                            ['title' => $this->texts->where('caption_name', "CountryRegCountry")->first()->caption_translation, 'model' => 'country_id', 'type' => 'select',  'width' => '50%', 'options' => [], "zone" => "2", "order" => "2"],
                            [
                                'title' => $this->texts->where('caption_name', "AreaDB")->first()->caption_translation,
                                'model' => 'db_area_id',
                                'type' => 'select',
                                'width' => '50%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Countries",
                                    "options_field_id" => "id",
                                    "options_field_title" => "country_name"
                                ],
                                "zone" => "2",
                                "order" => "3"
                            ],
                            ['title' => $this->texts->where('caption_name', "accContractorShortName")->first()->caption_translation, 'model' => 'contractor_short_name', 'type' => 'text',  'width' => '50%', "zone" => "1", "order" => "4"],
                            ['title' => $this->texts->where('caption_name', "individual")->first()->caption_translation, 'model' => 'individual_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "2", "order" => "5"],
                            ['title' => $this->texts->where('caption_name', "DB")->first()->caption_translation, 'model' => 'db_name', 'type' => 'label', "zone" => "2", "order" => "6"],
                            ['title' => "registry number", 'model' => 'register_number', 'type' => 'text',  'width' => '50%',"zone" => "1", "order" => "7"],
                            ['title' => $this->texts->where('caption_name', "taxpayer_number")->first()->caption_translation, 'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "8"],
                            ['title' => $this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'model' => 'entrepreneur_certificate', 'type' => 'text', 'width' => '50%', "zone" => "2", "order" => "9"],
                            ['title' => $this->texts->where('caption_name', "ServerDB")->first()->caption_translation, 'model' => 'server_name', 'type' => 'label', 'width' => '50%', "zone" => "2", "order" => "10"],
                            ['title' => $this->texts->where('caption_name', "code_reason_number")->first()->caption_translation, 'model' => 'code_reason_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "11"],
                            ['title' => $this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'model' => 'entrepreneur_certificate', 'width' => '50%', 'type' => 'date', "zone" => "2", "order" => "12"],
                            ['title' => $this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'model' => 'social_security_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "13"],
                            ['title' => $this->texts->where('caption_name', "Actual")->first()->caption_translation, 'model' => 'actual_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "14"],

                        ]
                    ]
                ]
            ],
            ]
        );


        return $contractorsCard;

    }
    
    
    /*тестовая функция по задаче Рустама
    *http://broker/admin/contractor/test
    *возвращает json для построения фронта
    */
    public function test(Request $request)
    {

        $this->texts = DB::table('_TranslationCaptions')
                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
                ->where('languages.language_code', config('app.locale'))
                ->get();   

       

        $contractor = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb')->where('id','32')->get();
        $ZZContractors = ZzContractor::get()->toarray();
        $ZZContractor = ZzContractor::where('id',$request->id)->get()->toarray();
        $countires = Country::select('id','country_name')->get()->toarray();
        $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();
        $contractorsCard = array(

            "main_data_models" => [


                "Contractors" => $contractor,
                "ZZContractors" => $ZZContractors,
                "ZZCOntractor" => $ZZContractor,


            ],


            "add_data_models" => [
                "Countries" => $countires,
                "DBAreas" => $dbarea,
            ],


            "form_parameters" => [

                "form_title" => $this->texts->where('caption_name', "AccContractor")->first()->caption_translation,
                "form_code" => "contractors",
                "form_type" => "card",
                //"form_base_data_model" => "Contractors",
                //"form_main_data_model_id_field" => "id",

            ],



            "dependent" => [

                "form_title" => "Контрагенты",
                "form_code" => "contractors",
            ],

            "actions" => [

                "actions_card" => [
                    ["title" => $this->texts->where('caption_name', "ok")->first()->caption_translation, "code" => "save", "class" => "btn btn-green", "link" => "ссылка на действие", "img" => ""],
                    ["title" => $this->texts->where('caption_name', "apply")->first()->caption_translation, "code" => "apply", "class" => "btn btn-green", "link" => "ссылка на действие", "img" => ""],
                    ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "ссылка на действие", "img" => ""],
                ]
            ],


            "links" => [

                ["link_title" => "Компании", "link_url" => "/companies", "link_type" => "internal", "img" => ""],
            ],


            "tabs" => [

                [
                    "tab_title" => "Контрагенты",
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => "Block1",
                            "block_zone_quantity" => 1,
                            "block_model" => "Contractors",
                            "block_type" => "block_card",
                            "block_fields" => [

                                ['title' => $this->texts->where('caption_name', "accContractorFullName")->first()->caption_translation, 'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],
                                ['title' => $this->texts->where('caption_name', "CountryRegCountry")->first()->caption_translation, 'model' => 'country_id', 'type' => 'select', 'width' => '50%', 'options' => [], "zone" => "1", "order" => "2"],
                                [
                                    'title' => $this->texts->where('caption_name', "AreaDB")->first()->caption_translation,
                                    'model' => 'db_area_id',
                                    'type' => 'select',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "Countries",
                                        "options_field_id" => "id",
                                        "options_field_title" => "country_name"
                                    ],
                                    "zone" => "1",
                                    'width' => '50%',
                                    "order" => "3"
                                ],
                                ['title' => $this->texts->where('caption_name', "accContractorShortName")->first()->caption_translation, 'model' => 'contractor_short_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "4"],
                                ['title' => $this->texts->where('caption_name', "individual")->first()->caption_translation, 'model' => 'individual_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "5"],
                                ['title' => $this->texts->where('caption_name', "DB")->first()->caption_translation, 'model' => 'db_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
                                ['title' => $this->texts->where('caption_name', "registryNumber")->first()->caption_translation, 'model' => 'register_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "7"],
                                ['title' => $this->texts->where('caption_name', "taxpayer_number")->first()->caption_translation, 'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "8"],


                            ]
                        ],


                        [
                            "block_title" => "Block2",
                            "block_zone_quantity" => 1,
                            "block_model" => "Contractors",
                            "block_type" => "block_card",
                            "block_fields" => [


                                ['title' => $this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'width' => '100%', 'model' => 'entrepreneur_certificate', 'type' => 'text', "zone" => "1", "order" => "1"],
                                ['title' => $this->texts->where('caption_name', "ServerDB")->first()->caption_translation, 'width' => '25%', 'model' => 'server_name', 'type' => 'label', "zone" => "1", "order" => "2"],
                                ['title' => $this->texts->where('caption_name', "code_reason_number")->first()->caption_translation, 'width' => '25%', 'model' => 'code_reason_number', 'type' => 'text', "zone" => "1", "order" => "3"],
                                ['title' => $this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'width' => '25%', 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "zone" => "1", "order" => "4"],
                                ['title' => $this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'width' => '25%', 'model' => 'social_security_number', 'type' => 'text', "zone" => "1", "order" => "5"],
                                ['title' => $this->texts->where('caption_name', "Actual")->first()->caption_translation, 'width' => '50%', 'model' => 'actual_l', 'type' => 'checkbox', "zone" => "1", "order" => "6"],

                            ]
                        ]
                    ]
                ],


                [

                    "tab_title" => "ZZ Контрагенты",
                    "blocks_quantity" => 1,
                    "blocks" => [

                        [

                            "block_title" => "List",
                            "block_zone_quantity" => 2,
                            "block_model" => "ZZContractors",
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                /*list fields zone 1*/
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', "zone" => "1"],
                                ['key' => 'contractor_full_name', 'sortable' => true, 'class' => 'contractor_full_name', "zone" => "1"],
                                ['key' => 'created_at', 'sortable' => true, 'class' => 'created_at', "zone" => "1"],
                                ['key' => 'register_number', 'sortable' => true, 'class' => 'register_number', "zone" => "1"],
                                ['key' => 'last_name', 'sortable' => false, 'class' => 'last_name', "zone" => "1"],
                                ['key' => 'first_name', 'sortable' => false, 'class' => 'list_actions-box', "zone" => "1"],
                                /*form fields zone 2*/
                                ['title' => $this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'model' => 'entrepreneur_certificate', 'type' => 'text', "zone" => "2", "order" => "1"],
                                ['title' => $this->texts->where('caption_name', "cardMiddlename")->first()->caption_translation, 'model' => 'middle_name', 'type' => 'text', "zone" => "2", "order" => "3"],
                                ['title' => $this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "zone" => "2", "order" => "4"],
                                ['title' => $this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'model' => 'social_security_number', 'type' => 'text', "zone" => "2", "order" => "5"],

                            ]

                        ]

                    ]


                ]


            ]


        );

        return response()->json($contractorsCard);
    }

    //Add Albert Topalu 07.10.2018 17:50
        // List contractors_new
        //(send Json params form  to FRONT )
        public function list(Request $request){
        $this->texts = DB::table('_TranslationCaptions')
            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
            ->where('languages.language_code', config('app.locale'))
            ->get();

        $contractors = Contractor::get()->toarray();

        $list =[

            "main_data_models" => [
                "Contractors" => $contractors
            ],

            "form_parameters" => [
                "form_title" => "Контрагенты",
                "form_code" => "contractors",
                "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => "Contractors",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/contractors_new/",
                    "form_search_field" => "contractor_full_name",
                ],
            ],

            "dependent" => [
                "dependent_data_model" => "",
                "dependent_fields" => [
                    "title" => "Контрагент",
                    "model" => "",
                    "type"  => "select",
                    "options_data" => [
                        "options_data_model"      => "Contractors",
                        "options_field_id"        => "id",
                        "options_field_id_value"  => "",
                        "options_field_title"     => "contractor_short_name"
                    ],

                    "width" => "100%"
                ]
            ],

            "actions" => [
                "actions_card" => [
                    ["title" => $this->texts->where('caption_name', "ok")->first()->caption_translation, "code" => "save", "class" => "btn btn-green", "link" => "ссылка на действие", "img" => ""],
                    ["title" => $this->texts->where('caption_name', "apply")->first()->caption_translation, "code" => "apply", "class" => "btn btn-green", "link" => "ссылка на действие", "img" => ""],
                    ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "ссылка на действие", "img" => ""],
                ]
            ],

            "tabs" => [
                [
//                        "tab_title" => "Контрагенты",
                    "blocks_quantity" => 1,
                    "blocks" => [

                        [
                            "block_title" => "", //????
                            "block_zone_quantity" => 0,
                            "block_model" => "Contractors",
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                /*list fields zone 1*/
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', "zone" => "1"],
                                ['key' => 'contractor_full_name', 'sortable' => true, 'class' => 'contractor_full_name', "zone" => "1"],
                                ['key' => 'created_at', 'sortable' => true, 'class' => 'created_at', "zone" => "1"],
                                ['key' => 'register_number', 'sortable' => true, 'class' => 'register_number', "zone" => "1"],
                                ['key' => 'last_name', 'sortable' => true, 'class' => 'last_name', "zone" => "1"],
                                // Bogdan Yartsun 10:41 11.10.2018 - Добавление колонки `list_actions` и изменение класса `first_name`
                                ['key' => 'first_name', 'sortable' => true, 'class' => 'first_name', "zone" => "1"],
                                ['key' => 'list_actions', 'sortable' => false, 'class' => 'list_actions-box', "zone" => "1"],

                            ]
                        ]
                    ]
                ]
            ]
        ];
        return response()->json($list);
    }
    //END Add Albert Topalu 07.10.2018 17:50


    //Add Albert Topalu 08.10.2018 13:00
        // Card contractors_new //(send Json params form  to FRONT )
        public function card(Request $request){
//        $texts = DB::table('_TranslationCaptions')
//            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//            ->where('languages.language_code', config('app.locale'))
//            ->get();

            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

        $contractor = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb')->where('id', $request->id)->get()->toArray();


        // Add key=>value to collections contractorColumn Albert Topalu 08.10.2018 17:44

        $contractorColumnArray=[];
        $ColumnContractor=[];
        foreach ($contractor as $contractorColumn){

            $contractorColumn['country_name'] =  $contractorColumn['country']['0']['country_name'];
            $contractorColumn['db_area_code'] =  $contractorColumn['dbarea']['db_area_code'];
            $contractorColumn['server_name'] =  $contractorColumn['dbarea']['d_base']['server_db']['server_name'];
            $contractorColumnArray[]= $contractorColumn;

            $ColumnContractor[]=[
                'id'=> $contractorColumn['id'],
                'actual_l'=> $contractorColumn['actual_l'],
                'code_reason_number'=> $contractorColumn['code_reason_number'],
                'contractor_full_name'=> $contractorColumn['contractor_full_name'],
                'contractor_short_name'=> $contractorColumn['contractor_short_name'],
                'country_id'=> $contractorColumn['country_id'],
                'country_name'=> $contractorColumn['country_name'],
                'db_area_code'=> $contractorColumn['db_area_code'],
                'db_area_id'=> $contractorColumn['db_area_id'],
                'server_name'=> $contractorColumn['server_name'],
                'entrepreneur_certificate'=> $contractorColumn['entrepreneur_certificate'],
                'entrepreneur_certificate_date'=> $contractorColumn['entrepreneur_certificate_date'],
                'individual_l'=> $contractorColumn['individual_l'],
                'register_number'=> $contractorColumn['register_number'],
                'social_security_number'=> $contractorColumn['social_security_number'],
                'taxpayer_number'=> $contractorColumn['taxpayer_number'],
            ];

        }

        //END Add key=>value to collections  contractorColumn Albert Topalu 08.10.2018 17:444

        $countires = Country::select('id','country_name')->get()->toarray();



//        dd($ColumnContractorInfo);

        /*Albert Topalu 08.10.2018 11:56
        END Add key=>value to collections $info */
        $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();
        $card =[

            "main_data_models" => [
                "Contractor" => $ColumnContractor
            ],

            "add_data_models" => [
                "DBAreas" => $dbarea,
                "Countries" => $countires,
            ],

            "form_parameters" => [
                "form_title" => "Контрагент",
                "form_code" => "contractors",
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "card",
                "form_base_data_model" => "Contractors",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/contractors_new/",
                    "form_search_field" => "contractor_full_name",
                ],
            ],

//            "dependent" => [
//                "dependent_data_model" => "",
//                "dependent_fields" => [
//                    "title" => "Контрагент",
//                    "model" => "",
//                    "type"  => "select",
//                    "options_data" => [
//                        "options_data_model"      => "Contractors",
//                        "options_field_id"        => "id",
//                        "options_field_id_value"  => "",
//                        "options_field_title"     => "contractor_short_name"
//                    ]
//                ]
//            ],

            "actions" => [
                "actions_card" => [
                    ["title" => $this->texts->where('caption_name', "ok")->first()->caption_translation, "code" => "save", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
                    ["title" => $this->texts->where('caption_name', "apply")->first()->caption_translation, "code" => "apply", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
                    ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                ]
            ],

            "links" =>[
               [ "link_title" => "Contact Info",
                "link_img" => "",
                "link_type" =>"internal",
                "link_url" => "/contactInfo"
               ]
            ],

            "tabs" => [
                [
                    "tab_title" => "Контрагенты",
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => "Block1",
                            "block_zone_quantity" => 1,
                            "block_model" => "Contractor",
                            "block_type" => "block_card",
                            "block_fields" => [


                                ['title' => $this->texts->where('caption_name', "accContractorFullName")->first()->caption_translation, 'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],

                                [
                                    'title' => $this->texts->where('caption_name', "CountryRegCountry")->first()->caption_translation,
                                    'model' => 'country_id',
                                    'type' => 'lt-select',
                                    'width' => '50%',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "Countries",
                                        "options_field_id" => "id",
                                        "options_field_title" => "country_name",
                                        "search" =>""
                                    ],
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'title' => $this->texts->where('caption_name', "AreaDB")->first()->caption_translation,
                                    'model' => 'db_area_id',
                                    'type' => 'lt-select',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "DBAreas",
                                        "options_field_id" => "id",
                                        "options_field_title" => "db_area_code",
                                        'search' => ''
                                    ],
                                    "zone" => "1",
                                    'width' => '50%',
                                    "order" => "3"
                                ],
                                ['title' => $this->texts->where('caption_name', "accContractorShortName")->first()->caption_translation, 'model' => 'contractor_short_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "4"],
                                ['title' => $this->texts->where('caption_name', "individual")->first()->caption_translation, 'model' => 'individual_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "5"],
                                ['title' => $this->texts->where('caption_name', "DB")->first()->caption_translation, 'model' => 'db_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
                                ['title' => $this->texts->where('caption_name', "registryNumber")->first()->caption_translation, 'model' => 'register_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "7"],
                                ['title' => $this->texts->where('caption_name', "taxpayer_number")->first()->caption_translation, 'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "8"],


                            ]
                        ],


                        [
                            "block_title" => "Block2",
                            "block_zone_quantity" => 1,
                            "block_model" => "Contractor",
                            "block_type" => "block_card",
                            "block_fields" => [


                                ['title' => $this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'text', "zone" => "1", "order" => "1"],
                                ['title' => $this->texts->where('caption_name', "ServerDB")->first()->caption_translation, 'width' => '50%', 'model' => 'server_name', 'type' => 'label', "zone" => "1", "order" => "2"],
                                ['title' => $this->texts->where('caption_name', "code_reason_number")->first()->caption_translation, 'width' => '50%', 'model' => 'code_reason_number', 'type' => 'text', "zone" => "1", "order" => "3"],
                                ['title' => $this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "zone" => "1", "order" => "4"],
                                ['title' => $this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'width' => '50%', 'model' => 'social_security_number', 'type' => 'text', "zone" => "1", "order" => "5"],
                                ['title' => $this->texts->where('caption_name', "Actual")->first()->caption_translation, 'width' => '50%', 'model' => 'actual_l', 'type' => 'checkbox', "zone" => "1", "order" => "6"],

                            ]
                        ]
                    ]
                ]
            ]
        ];

        return response()->json($card);
    }
    //END Add Albert Topalu 08.10.2018 13:00

}
