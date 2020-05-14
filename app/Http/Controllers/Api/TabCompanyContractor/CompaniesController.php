<?php

namespace App\Http\Controllers\Api\TabCompanyContractor;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;
use App\Models\DbArea;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Http\Classes\ConsumerParameters;
use Illuminate\Support\Facades\Route;
use App\Tasks\GetTranslatorsTask;
use App\Models\Contractor;

class CompaniesController extends Controller
{

    //create Alex Yaroshchuk
    public function list(Request $request){
        $currrentLang = Lang::locale();
        $methods = $request->accessMethods;

        $captionName= [
            'ok',
            'apply',
            'back', 'Main', 'Companies','CompanyShortName','CountryName','CreatedAt','Database','Individual',
            'Actual', 'AreaDb'
        ];
        $getArrayCaptions= $this->getTranslateByKeys($captionName);
        $companies = Company::with('country','dbarea.dBase' )->get()->toarray();
        $list =[
            "main_data_models" => [
                "Companies" => $companies
            ],

            "form_parameters" => [
                "form_title" => $getArrayCaptions['Companies']['translation_captions']['caption_translation'],
                "form_code" => "companies",
                "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => "Companies",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/companies_new/",
                    "form_search_field" => "company_full_name",
                ],
            ],

            "dependent" => [
                "dependent_data_model" => "",
                "dependent_fields" => [
                    "title" =>  $getArrayCaptions['Companies']['translation_captions']['caption_translation'],
                    "model" => "",
                    "type"  => "select",
                    "options_data" => [
                        "options_data_model"      => "Companies",
                        "options_field_id"        => "id",
                        "options_field_id_value"  => "",
                        "options_field_title"     => "company_short_name"
                    ],

                    "width" => "100%"
                ]
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['Companies']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => "Companies",
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', 'thStyle'=> 'width: 6%', "zone" => "1", "order" => "1"],
                                ['key' => 'company_short_name', 'sortable' => true, 'class' => 'company_short_name',
                                    "label"=> $getArrayCaptions['CompanyShortName']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 35%', "zone" => "1", "order" => "2"],
                                ['key' => "['country'][0]['country_name']", 'sortable' => true, 'class' => "['country'][0]['country_name']",
                                    "label"=> $getArrayCaptions['CountryName']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 13%', "zone" => "1", "order" => "4"],

                                ['key' => 'created_at', 'sortable' => true, 'class' => 'created_at',
                                    "label"=> $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 17%', "zone" => "1", "order" => "5"],

                                ['key' => "['dbarea']['d_base']['db_name']", 'sortable' => true, 'class' => "['dbarea']['d_base']['db_name']",
                                    "label"=> $getArrayCaptions['Database']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 17%', "zone" => "1", "order" => "3"],

                                ['key' => 'individual_l', 'sortable' => true, 'class' => 'individual_l',
                                    "label"=> $getArrayCaptions['Individual']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 6%', "zone" => "1", "order" => "6"],

                                ['key' => 'actual_l', 'sortable' => true, 'class' => 'actual_l',
                                    "label"=> $getArrayCaptions['Actual']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 6%', "zone" => "1", "order" => "7"],
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return response()->json($list);
    }

    public function card(Request $request){
        $methods = $request->accessMethods;
        $captionName= [
            'ok', 'apply', 'back', 'CompanyFullName', 'CountryRegCountry',
            'AreaDB', 'Companies', 'CompanyShortName', 'CompanyFullName',
            'Individual', 'DB', 'RegistryNumber', 'TaxpayerNumber',
            'EntrepreneurCertificate', 'ServerDB', 'CodeReasonNumber', 'EntrepreneurCertificateDate',
            'SocialSecurityNumber', 'Actual', 'Main','CreationDetails', 'CryptoPlatformAccounts',
            'CryptoAccounts', 'CryptoPlatform', 'CryptoExchangeAccounts',
            'CountryName','Database', 'CreationDetails','CreatedAt','CreatedBy',
            'UpdatedAt','UpdatedBy', 'RegistryNumber', 'BankAccounts'
        ];
        $getArrayCaptions= $this->getTranslateByKeys($captionName);
        $company = Company::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb')
            ->where('id', $request->id)->get()->toArray();
        $companyColumnArray=[];
        $ColumnCompany=[];
        foreach ($company as $companyColumn){

            // Bogdan Yartsun 06.11.2018 12:59  remove ['0']
//            $companyColumn['country_name'] =  $companyColumn['country']['0']['country_name'];
            $companyColumn['country_name'] =  $companyColumn['country']['country_name'];
            // Bogdan Yartsun 06.11.2018 12:59  remove ['0']
            $companyColumn['db_area_code'] =  $companyColumn['dbarea']['db_area_code'];
            $companyColumn['server_name'] =  $companyColumn['dbarea']['d_base']['server_db']['server_name'];
            $companyColumnArray[]= $companyColumn;

            $ColumnCompany[]=[
                'id'=> $companyColumn['id'],
                'actual_l'=> $companyColumn['actual_l'],
                'code_reason_number'=> $companyColumn['code_reason_number'],
                'company_full_name'=> $companyColumn['company_full_name'],
                'company_short_name'=> $companyColumn['company_short_name'],
                'country_id'=> $companyColumn['country_id'],
                'country_name'=> $companyColumn['country_name'],
                'db_area_code'=> $companyColumn['db_area_code'],
                'db_area_id'=> $companyColumn['db_area_id'],
                'server_name'=> $companyColumn['server_name'],
                'entrepreneur_certificate'=> $companyColumn['entrepreneur_certificate'],
                'entrepreneur_certificate_date'=> $companyColumn['entrepreneur_certificate_date'],
                'individual_l'=> $companyColumn['individual_l'],
                'register_number'=> $companyColumn['register_number'],
                'social_security_number'=> $companyColumn['social_security_number'],
                'taxpayer_number'=> $companyColumn['taxpayer_number'],
                'created_at'=> $companyColumn['created_at'],
                'updated_at'=> $companyColumn['updated_at'],
                'created_by'=> $companyColumn['created_by'],
                'updated_by'=> $companyColumn['updated_by'],
            ];
        }
        $countires = Country::select('id','country_name')->get()->toarray();
        $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();
        foreach ($methods as $key=>$value){
            if (isset($value) and ($value == "read") ){
                $card =[
                    "main_data_models" => [
                        "Company" => $ColumnCompany
                    ],
                    "add_data_models" => [
                        "DBAreas" => $dbarea,
                        "Countries" => $countires,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['Companies']['translation_captions']['caption_translation'],
                        "form_code" => "companies",
                        "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "Companies",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $ColumnCompany[0]['company_short_name'],
                        "form_type_list" => [
                            "form_card_url" => "/companies_new/",
                            "form_search_field" => "company_full_name",
                        ],
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/company", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/company", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],
                    "links" =>[
                        [ "link_title" => "Contact Info",
                            "link_img" => "",
                            "link_type" =>"internal_push",
                            "link_url" => "/contactInfo"
                        ],
                        [
                            "link_title" =>  $getArrayCaptions['CryptoExchangeAccounts']['translation_captions']['caption_translation'],
                            "link_img" => "",
                            "link_type" =>"internal_push",
                            "link_url" => "/cryptoExchangeAccounts"
                        ],
                        [
                            "link_title" =>  $getArrayCaptions['CryptoPlatformAccounts']['translation_captions']['caption_translation'],
                            "link_img" => "",
                            "link_type" =>"internal_push",
                            "link_url" => "/cryptoPlatformAccounts"
                        ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Companies']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "Company",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CompanyShortName']['translation_captions']['caption_translation'], 'model' => 'company_full_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        [
                                            'title' => $getArrayCaptions['CountryRegCountry']['translation_captions']['caption_translation'],
                                            'model' => 'country_name',
                                            'type' => 'label',
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
                                            'title' => $getArrayCaptions['AreaDB']['translation_captions']['caption_translation'],
                                            'model' => 'db_area_code',
                                            'type' => 'label',
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
                                        ['title' => $getArrayCaptions['CompanyShortName']['translation_captions']['caption_translation'], 'model' => 'company_short_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "4"],
                                        ['title' => $getArrayCaptions['Individual']['translation_captions']['caption_translation'], 'model' => 'individual_l', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "5"],
                                        ['title' => $getArrayCaptions['DB']['translation_captions']['caption_translation'], 'model' => 'db_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
                                        ['title' => $getArrayCaptions['RegistryNumber']['translation_captions']['caption_translation'], 'model' => 'registry_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "7"],
                                        ['title' => $getArrayCaptions['TaxpayerNumber']['translation_captions']['caption_translation'], 'model' => 'taxpayer_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "8"],

                                    ]
                                ],
                                [
                                    "block_title" => "Block2",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "Company",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['EntrepreneurCertificate']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'label', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['ServerDB']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'server_name', 'type' => 'label', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['CodeReasonNumber']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'code_reason_number', 'type' => 'label', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['EntrepreneurCertificateDate']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'label', "zone" => "1", "order" => "4"],
                                        ['title' => $getArrayCaptions['SocialSecurityNumber']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'social_security_number', 'type' => 'label', "zone" => "1", "order" => "5"],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'actual_l', 'type' => 'label', "zone" => "1", "order" => "6"],
                                    ]
                                ]
                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Company",
                                    "block_type" => "block_card",
                                    "block_fields" => [

                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
            if (isset($value) and  (($value == "update")) ){
                $card =[
                    "main_data_models" => [
                        "Company" => $ColumnCompany
                    ],
                    "add_data_models" => [
                        "DBAreas" => $dbarea,
                        "Countries" => $countires,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['Companies']['translation_captions']['caption_translation'],
                        "form_code" => "companies",
                        "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "Companies",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $ColumnCompany[0]['company_short_name'],
                        "form_type_list" => [
                            "form_card_url" => "/companies_new/",
                            "form_search_field" => "company_full_name",
                        ],
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/company", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/company", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],
                    "links" =>[
                        [
                            "link_title" => "Contact Info",
                            "link_img" => "",
                            "link_type" =>"internal_push",
                            "link_url" => "/contactInfo"
                        ],
                        [
                            "link_title" =>  $getArrayCaptions['BankAccounts']['translation_captions']['caption_translation'],
                            "link_img" => "",
                            "link_type" =>"internal_push",
                            "link_url" => "/bankAccounts"
                        ],
                        [
                            "link_title" =>  $getArrayCaptions['CryptoExchangeAccounts']['translation_captions']['caption_translation'],
                            "link_img" => "",
                            "link_type" =>"internal_push",
                            "link_url" => "/cryptoExchangeAccounts"
                        ],
                        [
                            "link_title" =>  $getArrayCaptions['CryptoPlatformAccounts']['translation_captions']['caption_translation'],
                            "link_img" => "",
                            "link_type" =>"internal_push",
                            "link_url" => "/cryptoPlatformAccounts"
                        ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Company",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CompanyFullName']['translation_captions']['caption_translation'] , 'model' => 'company_full_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CompanyShortName']['translation_captions']['caption_translation'], 'model' => 'company_short_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "2","validation" => ["required" =>true, "min"=>4]],
                                        ['title' => $getArrayCaptions['RegistryNumber']['translation_captions']['caption_translation'], 'model' => 'register_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['TaxpayerNumber']['translation_captions']['caption_translation'], 'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['CodeReasonNumber']['translation_captions']['caption_translation'], 'model' => 'code_reason_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4"],
                                        ['title' => $getArrayCaptions['SocialSecurityNumber']['translation_captions']['caption_translation'], 'model' => 'social_security_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4"],
                                        [
                                            'title' => $getArrayCaptions['CountryRegCountry']['translation_captions']['caption_translation'],
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
                                            "zone" => "2",
                                            "order" => "1"
                                        ],
                                        [
                                            'title' => $getArrayCaptions['AreaDB']['translation_captions']['caption_translation'],
                                            'model' => 'db_area_id',
                                            'type' => 'lt-select',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "DBAreas",
                                                "options_field_id" => "id",
                                                "options_field_title" => "db_area_code",
                                                'search' => ''
                                            ],
                                            "zone" => "2",
                                            'width' => '50%',
                                            "order" => "1"
                                        ],
                                        ['title' => $getArrayCaptions['Individual']['translation_captions']['caption_translation'], 'model' => 'individual_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "2", "order" => "2"],
                                        ['title' => $getArrayCaptions['Database']['translation_captions']['caption_translation'], 'model' => 'db_name', 'type' => 'label', 'width' => '50%', "zone" => "2", "order" => "3"],
                                        ['title' => $getArrayCaptions['EntrepreneurCertificate']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'text', "zone" => "2", "order" => "2"],
                                        ['title' => $getArrayCaptions['ServerDB']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'server_name', 'type' => 'label', "zone" => "2", "order" => "3"],
                                        ['title' => $getArrayCaptions['EntrepreneurCertificateDate']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "zone" => "2", "order" => "4"],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'actual_l', 'type' => 'checkbox', "zone" => "2", "order" => "4"],
                                    ]
                                ],
                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Company",
                                    "block_type" => "block_card",
                                    "block_fields" => [

                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],


                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }
        return response()->json($card);
    }

}
