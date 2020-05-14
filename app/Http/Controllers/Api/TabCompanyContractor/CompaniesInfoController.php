<?php

namespace App\Http\Controllers\Api\TabCompanyContractor;

use App\Models\CompanyInfo;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Http\Controllers\Api\Controller;
use App\Models\DbArea;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesInfoController extends Controller
{
    public function index()
    {
        $consumer = Auth::user();
//        $texts = DB::table('_TranslationCaptions')
//            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//            ->where('languages.language_code', config('app.locale'))
//            ->get();
        $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
        $company = Company::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
            'consumerAccess', 'companyinfo', 'companyinfo.infokind',
            'companyinfo.infotype', 'companyinfo.regions', 'companyinfo.regions.country')->get();

        return response()->json([
            'texts' => $texts,
            'consumer' => $consumer,
            'company' => $company,
        ]);
    }

    public function show(Request $request)
    {
        $company = Company::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
            'consumerAccess', 'companyinfo', 'companyinfo.infokind',
            'companyinfo.infotype', 'companyinfo.regions', 'companyinfo.regions.country')
            ->where('id', $request->id)
            ->get();
        $consumer = Auth::user();
//        $texts = DB::table('_TranslationCaptions')
//            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//            ->where('languages.language_code', config('app.locale'))
//            ->get();
        $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
        $country = Country::select('id', 'country_name')->get();
        $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();

        ///TypeCompany - наиболее структурированный из всех, юзай его
        $TypeCompany = DB::table('Companies')
            ->join('CompanyInfo', 'Companies.id', '=', 'CompanyInfo.company_id')
            ->join('_Info_types', 'CompanyInfo.info_type_id', '=', '_Info_types.id')
            ->join('_Info_kinds', 'CompanyInfo.info_kind_id', '=', '_Info_kinds.id')
            ->where('Companies.id', $request->id)
            ->select('_Info_types.id', 'info_type_name', 'info_kind_id', 'info_kind_name', 'CompanyInfo.*')
            ->groupBy('info_type_name', 'CompanyInfo.id')
            ->get();
        $type = DB::table('Companies')
            ->join('CompanyInfo', 'Companies.id', '=', 'CompanyInfo.company_id')
            ->join('_Info_types', 'CompanyInfo.info_type_id', '=', '_Info_types.id')
            ->where('Companies.id', $request->id)
            ->select('_Info_types.id', 'info_type_name')
            ->groupBy('info_type_name', '_Info_types.id')
            ->get();

        $kind = DB::table('Companies')
            ->join('CompanyInfo', 'Companies.id', '=', 'CompanyInfo.company_id')
            ->join('_Info_kinds', 'CompanyInfo.info_kind_id', '=', '_Info_kinds.id')
            ->join('_Info_types', '_Info_kinds.info_type_id', '=', '_Info_types.id')
            ->where('Companies.id', $request->id)
            ->select('info_kind_id', 'info_kind_name', 'info_type_name', '_Info_types.id')
            ->get();

        $allCompanies = Company::select('id', 'company_short_name')->get();//For select 13.09.18 Alex Yaroshchuk

        return response()->json([
            'texts' => $texts,
            'consumer' => $consumer,
            'company' => $company,
            'country' => $country,
            'dbarea' => $dbarea,
            'TypeCompany' => $TypeCompany,
            'type' => $type,
            'kind' => $kind,
            'allCompanies' => $allCompanies,
        ]);
    }

    public function showCard(Request $request){
        $CompanyInfo = DB::table('CompanyInfo')
            ->join('_Info_types', 'CompanyInfo.info_type_id', '=', '_Info_types.id')
            ->join('_Info_kinds', 'CompanyInfo.info_kind_id', '=', '_Info_kinds.id')
            ->join('_Countries', 'CompanyInfo.country_id', '=', '_Countries.id')
            ->where('CompanyInfo.id', $request->id)
            ->select('_Info_types.id', 'info_type_name', 'info_type_code', 'info_kind_id', 'info_kind_name', 'country_id', 'country_name', 'CompanyInfo.*')
            ->first();

//        $texts = DB::table('_TranslationCaptions')
//            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//            ->where('languages.language_code', config('app.locale'))
//            ->get();
        $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


        if($CompanyInfo->info_type_code=="АдресЭлектроннойПочты") {
                    $caption = [
                        [
                            'id' => $CompanyInfo->info_type_id,
                            'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_type_name
                        ],
                        [
                            'id' => $CompanyInfo->info_kind_id,
                            'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_kind_name
                        ],
                        [
                            'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->representation
                        ],
                        [
                            'id' => $CompanyInfo->country_id,
                            'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->country_name
                        ],
                        [
                            'title' => $texts->where('caption_name', "Url")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->url_name
                        ],
                        [
                            'title' => $texts->where('caption_name', "cardEmail")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->e_mail
                        ]
                    ];
                }
        if($CompanyInfo->info_type_code=="Адрес") {
                    $caption = [
                        [
                            'id' => $CompanyInfo->info_type_id,
                            'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_type_name
                        ],
                        [
                            'id' => $CompanyInfo->info_kind_id,
                            'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_kind_name
                        ],
                        [
                            'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                            //todo representation translate
                            'type' => 'label',
                            'value' => $CompanyInfo->representation
                        ],
                        [
                            'id' => $CompanyInfo->country_id,
                            'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->country_name
                        ],
                    ];
                }
        if($CompanyInfo->info_type_code=="Телефон") {
                    $caption = [
                        [
                            'id' => $CompanyInfo->info_type_id,
                            'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_type_name
                        ],
                        [
                            'id' => $CompanyInfo->info_kind_id,
                            'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_kind_name
                        ],
                        [
                            'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                            //todo representation translate
                            'type' => 'label',
                            'value' => $CompanyInfo->representation
                        ],
                        [
                            'id' => $CompanyInfo->country_id,
                            'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->country_name
                        ],
                        [
                            'title' => $texts->where('caption_name', "profilePhoneNumber")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->phone_number
                        ],
                        [
                            'title' => $texts->where('caption_name', "PhoneNumberWithoutCode")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->phone_number_without_codes
                        ]
                    ];
                }
        if($CompanyInfo->info_type_code=="Skype") {
                    $caption = [
                        [
                            'id' => $CompanyInfo->info_type_id,
                            'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_type_name
                        ],
                        [
                            'id' => $CompanyInfo->info_kind_id,
                            'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_kind_name
                        ],
                        [
                            'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->representation
                        ],
                        [
                            'id' => $CompanyInfo->country_id,
                            'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->country_name
                        ],
                    ];
                }
        if($CompanyInfo->info_type_code=="Факс") {
                    $caption = [
                        [
                            'id' => $CompanyInfo->info_type_id,
                            'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_type_name
                        ],
                        [
                            'id' => $CompanyInfo->info_kind_id,
                            'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->info_kind_name
                        ],
                        [
                            'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->representation
                        ],
                        [
                            'id' => $CompanyInfo->country_id,
                            'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                            'type' => 'label',
                            'value' => $CompanyInfo->country_name
                        ],
                    ];
                }

        return response()->json([
            'caption' => $caption
        ]);
    }

    //changed Alex Yaroshchuk
    public function update(Request $request){
        $model=$request->CompanyInfo[0];
        return CompanyInfo::where('id', $request->id)->update([
            'company_id'=> $model['company_id'],
//            'info_kind_id' => $model['info_kind_id'],
//            'info_type_id' => $model['info_type_id'],
//            'country_id' => $model['country_id'],
//            'region_id' => $model['region_id'],
//            'representation' => $model['representation'],
//            'city_name' => $model['city_name'],
//            'e_mail' => $model['e_mail'],
//            'url_name' => $model['url_name'],
//            'phone_number' => $model['phone_number'],
//            'phone_number_without_codes' => $model['phone_number_without_codes'],
//            'actual_l' => $model['actual_l'],
        ]);
    }

    public function insert(Request $request)
    {
        return CompanyInfo::create([
            'info_kind_id' => $request->info_kind_id,
            'info_type_id' => $request->info_type_id,
            'country_id' => $request->country_id,
            'region_id' => $request->region_id,
            'representation' => $request->representation,
            'city_name' => $request->city_name,
            'e_mail' => $request->e_mail,
            'url_name' => $request->url_name,
            'phone_number' => $request->phone_number,
            'phone_number_without_codes' => $request->phone_number_without_codes,
            'actual_l' => $request->actual_l,
        ]);
    }

    public function delete(Request $request){
        $delMsg = CompanyInfo::where('id', $request->id)->get()->first();
        return $delMsg->delete();
    }


    ///created Alex Yaroshchuk 15:50 06.11.18
    public function contactInfoList(Request $request){

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark','Image', 'Country', 'SystemDetails', 'Actual',
            'contactInfo', 'Code', 'Name', 'InfoKind', 'InfoType',
            'Representation', 'Company', 'Country',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $Company = Company::where('id', $request->id)->get()->toArray();


        $companyInfo = CompanyInfo::with('infotype','infokind')
            ->where('company_id', $request->id)
            ->get()->toarray();

        $companyInfoArray=[];
        $ColumnCompanyInfo=[];
        foreach ($companyInfo as $info ){
            $info['info_type'] = $info['infotype']['info_type_name'];
            $info['info_kind'] = $info['infokind']['info_kind_name'];
            $companyInfoArray[]= $info;

            $ColumnCompanyInfo[]=[
                'id'=> $info['id'],
                'info_type'=>$info['info_type'],
                'info_kind'=>$info['info_kind'],
                'representation'=>$info['representation']
            ];
        }
        $list =[
            "main_data_models" => [
                "CompanyInfo" => $ColumnCompanyInfo,
            ],
            "add_data_models" => [
                "Companies" => $Company,
            ],
            "form_parameters" => [
                "form_title" =>  $getArrayCaptions['contactInfo']['translation_captions']['caption_translation'],
                "form_code" => "companyInfo",
                "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => "CompanyInfo",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/contactInfo/",
                    "form_search_field" => "company_full_name",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => "CompanyInfo",
                "dependent_fields" => [
                    "title" =>  $getArrayCaptions['Company']['translation_captions']['caption_translation'],
                    "model" => "company_id",
                    "type"  => "label", //todo: поменял здесь 'select' на 'label'
                    "current_value"=>$Company[0]['company_short_name'],// todo: сюда подставишь, что тебе надо, если тип 'select' - в этом поле нет нужды
                    "options" =>[],
                    "options_data" => [
                        "options_data_model"      => "Companies",
                        "options_field_id"        => "id",
                        "options_field_id_value"  => "",
                        "options_field_title"     => "company_short_name",
                        "search" => ''
                    ],
                ],
                "width" => "100%",
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['contactInfo']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => "Block1",
                            "block_zone_quantity" => 1,
                            "block_model" => "CompanyInfo",
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                [
                                    'key' => 'actions',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                [
                                    'key' => 'info_type',
                                    'sortable' => true,
                                    'class' => 'info_type',
                                    'label' => $getArrayCaptions['InfoType']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 32%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'info_kind',
                                    'sortable' => true,
                                    'class' => 'info_kind',
                                    'label' => $getArrayCaptions['InfoKind']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 31%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => 'representation',
                                    'sortable' => true,
                                    'class' => 'representation',
                                    'label' => $getArrayCaptions['Representation']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 31%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];
        return response()->json($list);
    }

    public function contactInfoCard(Request $request){

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark','Image', 'Country', 'SystemDetails', 'Actual',
            'contactInfo', 'Code', 'Name', 'InfoKind', 'InfoType',
            'Representation', 'Company', 'Country',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        $Companies = Company::all()->toArray();
        $companyInfo = CompanyInfo::with('infotype','infokind','country')
            ->where('id', $request->id)->get()->toarray();

        $companyId = $companyInfo['0']['company_id'];

        $companyShortName = DB::table('Companies')
            ->select('company_short_name')
            ->where('id',  $companyId)
            ->value('company_short_name');

        $companyInfoArray=[];
        $ColumnCompanyInfo=[];
        foreach ($companyInfo as $info ){
            $info['info_type'] = $info['infotype']['info_type_name'];
            $info['info_kind'] = $info['infokind']['info_kind_name'];
            $info['country_name'] = $info['country']['country_name'];
            $companyInfoArray[]= $info;

            $ColumnCompanyInfo[]=[
                'id'=> $info['id'],
                'info_type'=>$info['info_type'],
                'info_kind'=>$info['info_kind'],
                'representation'=>$info['representation'],
                'country_name' => $info['country']['country_name'],
                'company_id' => $info['company_id'],
                'company_short_name' => $companyShortName
            ];
        }

        $contactInfoCard = [
                    "main_data_models" => [
                        "CompanyInfo" => $ColumnCompanyInfo,
                    ],
                    "add_data_models" => [
                        'Companies' => $Companies,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['contactInfo']['translation_captions']['caption_translation'],
                        "form_code" => "companiesInfo",
                        "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "CompanyInfo",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $ColumnCompanyInfo[0]['info_type'],
                        "form_type_list" => [
                            "form_card_url" => "/companies_new_card/",
                            "form_search_field" => "company_full_name",
                        ]
                    ],
                    "dependent" => [
                        "dependent_data_model" => "CompanyInfo",
                        "dependent_fields" => [
                            "title" =>  $getArrayCaptions['Company']['translation_captions']['caption_translation'],
                            "model" => "company_id",
                            "type" => "label",
                            "options" =>[],
                            "options_data" => [
                                "options_data_model" => "Companies",
                                "options_field_id" => "id",
                                "options_field_id_value" => "",
                                "options_field_title" => "company_short_name",
                                "search" => ''
                            ],
                        ],
                        "width" => "100%",
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/companyInfo", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/companyInfo", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" =>  $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "CompanyInfo",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['InfoType']['translation_captions']['caption_translation'] , 'model' => 'info_type', 'type' => 'text', 'width' => '30%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['InfoKind']['translation_captions']['caption_translation'] , 'model' => 'info_kind', 'type' => 'text', 'width' => '30%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['Country']['translation_captions']['caption_translation'] , 'model' => 'country_name', 'type' => 'text', 'width' => '30%', "zone" => "1", "order" => "3"],
                                    ]
                                ],
                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "CompanyInfo",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "3"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
        return response()->json($contactInfoCard);
    }
}
