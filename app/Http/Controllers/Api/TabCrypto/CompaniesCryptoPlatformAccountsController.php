<?php

namespace App\Http\Controllers\Api\TabCrypto;

use App\Http\Classes\ConsumerParameters;
use App\Models\Company;
use App\Models\CryptoAccount;
use App\Models\CryptoExchange;
use App\Models\CryptoPlatform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;


class CompaniesCryptoPlatformAccountsController extends Controller
{
    public function list(Request $request) {

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark','Image', 'Country', 'SystemDetails', 'Actual',
            'CryptoAccounts', 'Code', 'Name', 'CryptoAccount', 'CryptoAccountHolder',
            'ExternalService', 'CryptoExchangeAccounts', 'CryptoAccountLogin', 'CryptoAccountPassword',
            'CryptoAccountName', 'CryptoExchange', 'CryptoExchangeAccount',
            'CExchangeName', 'CExchangeURL', 'HolderCryptoExchangeAccount',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = DB::table('__ModelTables')
            ->where('table_code', 'Company')
            ->value('table_n');

        $service = DB::table('__ModelTables')
            ->where('table_code', 'CryptoPlatform')
            ->value('table_n');

        $CryptoAccount = CryptoAccount::where('table_n', $model)
            ->where('table_n_service', $service)
            ->leftjoin('Companies', 'CryptoAccounts.row_id', '=', 'Companies.id')
            ->leftjoin('_CryptoExchanges', 'CryptoAccounts.row_id_service', '=', '_CryptoExchanges.id')
            ->select('_CryptoExchanges.*',  'Companies.*', 'CryptoAccounts.*')
            ->where('row_id', $request->id)
            ->get()->toArray();
        $Companies = Company::where('id', $request->id)->get()->toArray();
        $CryptoExchanges = CryptoExchange::get()->toArray();

        $list = [
            "main_data_models" => [
                "CryptoAccounts" => $CryptoAccount,
            ],
            "add_data_models" => [
                "Companies" => $Companies,
                "CryptoExchanges" => $CryptoExchanges,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['CryptoExchangeAccounts']['translation_captions']['caption_translation'],
                "form_code" => "cryptoAccounts",
                "form_is_dependent" => true,
                "form_type" => "list",
                "form_base_data_model" => "CryptoAccounts",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/cryptoExchangeAccounts/",
                    "form_search_field" => "c_account_name",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => "CryptoAccounts",
                "dependent_fields" => [
                    "title" =>  $getArrayCaptions['HolderCryptoExchangeAccount']['translation_captions']['caption_translation'],
                    "model" => "row_id",
                    "type"  => "label",
                    "current_value"=>$Companies[0]['company_short_name'],
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
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_zone_quantity" => 1,
                            "block_model" => "CryptoAccounts",
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
                                    'key' => 'c_account_name',
                                    'sortable' => true,
                                    'class' => 'c_account_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 21%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'c_exchange_name',
                                    'sortable' => true,
                                    'class' => 'c_exchange_name',
                                    'label' => $getArrayCaptions['CryptoExchange']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 21%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => "c_exchange_url",
                                    'sortable' => true,
                                    'class' => 'c_exchange_url',
                                    'label' => $getArrayCaptions['CExchangeURL']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 21%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => "actual_l",
                                    'sortable' => true,
                                    'class' => 'actual_l',
                                    'label' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 10%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],
                                [
                                    'key' => "c_account_remark",
                                    'sortable' => true,
                                    'class' => 'c_account_remark',
                                    'label' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 21%',
                                    "zone" => "1",
                                    "order" => "6"
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];
        return response()->json($list);
    }

    public function card(Request $request){

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark','Image', 'Country', 'SystemDetails', 'Actual',
            'CryptoAccounts', 'Code', 'Name', 'CryptoAccount', 'CryptoAccountHolder',
            'ExternalService', 'HolderCryptoExchangeAccount', 'CryptoAccountLogin', 'CryptoAccountPassword',
            'CryptoAccountName', 'CryptoExchange', 'CryptoExchangeAccounts', 'CryptoPlatformAccount',
            'CPlatformName', 'СPlatformURL', 'CryptoPlatform', 'HolderCryptoPlatformAccount',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = DB::table('__ModelTables')
            ->where('table_code', 'Company')
            ->value('table_n');

        $service = DB::table('__ModelTables')
            ->where('table_code', 'CryptoPlatform')
            ->value('table_n');

        $CryptoAccounts = CryptoAccount::where('table_n', $model)
            ->where('table_n_service', $service)
            ->leftjoin('Companies', 'CryptoAccounts.row_id', '=', 'Companies.id')
            ->leftjoin('_CryptoPlatforms', 'CryptoAccounts.row_id_service', '=', '_CryptoPlatforms.id')
            ->select('_CryptoPlatforms.*',  'Companies.*', 'CryptoAccounts.*')
            ->where('CryptoAccounts.id', $request->id)
            ->get()->toArray();
        $cryptoColumnArray=[];
        $CryptoAccount=[];
        foreach ($CryptoAccounts as $cryptoColumn){
            $cryptoColumn['c_platform_name1'] =  $cryptoColumn['c_platform_name']. "-". $cryptoColumn['c_platform_url'];
            $cryptoColumnArray[]= $cryptoColumn;

            $CryptoAccount[]=[
                'id'=> $cryptoColumn['id'],
                'c_account_name'=> $cryptoColumn['c_account_name'],
                'table_n'=> $cryptoColumn['table_n'],
                'row_id'=> $cryptoColumn['row_id'],
                'company_short_name'=> $cryptoColumn['company_short_name'],
                'table_n_service'=> $cryptoColumn['table_n_service'],
                'row_id_service'=> $cryptoColumn['row_id_service'],
                'c_platform_name'=> $cryptoColumn['c_platform_name'],
                'c_platform_name1'=> $cryptoColumn['c_platform_name1'],
                'c_platform_url'=> $cryptoColumn['c_platform_url'],
                'c_account_login'=> $cryptoColumn['c_account_login'],
                'c_account_pass'=> $cryptoColumn['c_account_pass'],
                'c_account_remark'=> $cryptoColumn['c_account_remark'],
                'actual_l'=> $cryptoColumn['actual_l'],
                'deleted_l'=> $cryptoColumn['deleted_l'],
                'created_at'=> $cryptoColumn['created_at'],
                'updated_at'=> $cryptoColumn['updated_at'],
                'created_by'=> $cryptoColumn['created_by'],
                'updated_by'=> $cryptoColumn['updated_by'],
            ];
        }

        $CryptoPlatform = CryptoPlatform::get()->toArray();

        $exchangesColumnArray=[];
        $CryptoPlatforms=[];
        foreach ($CryptoPlatform as $tokenExchange){
            $tokenExchange['c_platform_name1'] =  $tokenExchange['c_platform_name']. "-". $tokenExchange['c_platform_url'];
            $exchangesColumnArray[]= $tokenExchange;

            $CryptoPlatforms[]=[
                'id'=> $tokenExchange['id'],
                'c_platform_name1'=> $tokenExchange['c_platform_name1'],
                'c_platform_name'=> $tokenExchange['c_platform_name'],
                'c_platform_url'=> $tokenExchange['c_platform_url'],
            ];
        }

        $Companies = Company::get()->toArray();

        foreach ($methods as $key=>$value){
            if (isset($value) and ($value == "read") ){
                $card =[
                    "main_data_models" => [
                        "CryptoAccounts" => $CryptoAccount
                    ],
                    "add_data_models" => [
                        "Companies" => $Companies,
                        "CryptoPlatforms" => $CryptoPlatforms,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoPlatformAccount']['translation_captions']['caption_translation'],
                        "form_code" => "cryptoAccounts",
                        "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoAccounts",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $CryptoAccount[0]['c_account_name'],
                        "form_type_list" => [
                            "form_card_url" => "/cryptoExchangeAccounts/",
                            "form_search_field" => "c_account_name",
                        ],
                    ],
                    "dependent" => [
                        "dependent_data_model" => "CryptoAccounts",
                        "dependent_fields" => [
                            "title" =>  $getArrayCaptions['HolderCryptoExchangeAccount']['translation_captions']['caption_translation'],
                            "model" => "row_id",
                            "type" => "label",
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
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
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
                                    "block_model" => "CryptoAccounts",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CryptoAccountName']['translation_captions']['caption_translation'] , 'model' => 'c_account_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CryptoPlatform']['translation_captions']['caption_translation'], 'model' => 'c_platform_name1', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model' => 'c_account_remark', 'type' => 'label', 'width' => '75%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'model' => 'actual_l', 'type' => 'label', 'width' => '25%', "zone" => "1", "order" => "4"],
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
                                    "block_model" => "CryptoAccounts",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CryptoAccountLogin']['translation_captions']['caption_translation'], 'model' => 'c_account_login', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CryptoAccountPassword']['translation_captions']['caption_translation'], 'model' => 'c_account_pass', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
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
            }
            if (isset($value) and  (($value == "update")) ){
                $card =[
                    "main_data_models" => [
                        "CryptoAccounts" => $CryptoAccount
                    ],
                    "add_data_models" => [
                        "Companies" => $Companies,
                        "CryptoPlatforms" => $CryptoPlatforms,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoPlatformAccount']['translation_captions']['caption_translation'],
                        "form_code" => "cryptoAccounts",
                        "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoAccounts",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $CryptoAccount[0]['c_account_name'],
                        "form_type_list" => [
                            "form_card_url" => "/cryptoAccounts/",
                            "form_search_field" => "c_account_name",
                        ],
                    ],
                    "dependent" => [
                        "dependent_data_model" => "CryptoAccounts",
                        "dependent_fields" => [
                            "title" =>  $getArrayCaptions['HolderCryptoExchangeAccount']['translation_captions']['caption_translation'],
                            "model" => "row_id",
                            "type" => "label",
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
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/company/cryptoPlatformAccounts/update", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/company/cryptoPlatformAccounts/update", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "CryptoAccounts",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CryptoAccountName']['translation_captions']['caption_translation'] , 'model' => 'c_account_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        [
                                            'title' => $getArrayCaptions['CryptoPlatform']['translation_captions']['caption_translation'],
                                            'model' => 'row_id_service',
                                            'type' => 'lt-select',
                                            'width' => '100%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "CryptoPlatforms",
                                                "options_field_id" => "id",
                                                "options_field_title" => "c_platform_name1",
                                                "search" =>""
                                            ],
                                            "zone" => "1",
                                            "order" => "2"
                                        ],
                                        ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model' => 'c_account_remark', 'type' => 'text', 'width' => '75%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'model' => 'actual_l', 'type' => 'checkbox', 'width' => '25%', "zone" => "1", "order" => "4"],
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
                                    "block_model" => "CryptoAccounts",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CryptoAccountLogin']['translation_captions']['caption_translation'], 'model' => 'c_account_login', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CryptoAccountPassword']['translation_captions']['caption_translation'], 'model' => 'c_account_pass', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
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
            }
        }
        return response()->json($card);
    }

    public function update(Request $request)
    {
        $model=$request->CryptoAccounts[0];
        return CryptoAccount::where('id', $model['id'] )->update([
            'c_account_name' => $model['c_account_name'],
            'c_account_remark' => $model['c_account_remark'],
            'row_id_service' => $model['row_id_service'],
            'actual_l' => $model['actual_l'],
            'updated_by' => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
