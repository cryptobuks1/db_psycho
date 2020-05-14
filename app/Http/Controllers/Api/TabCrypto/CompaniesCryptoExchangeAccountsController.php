<?php

namespace App\Http\Controllers\Api\TabCrypto;

use App\Http\Classes\ConsumerParameters;
use App\Models\Company;
use App\Models\CryptoAccount;
use App\Models\CryptoExchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;


class CompaniesCryptoExchangeAccountsController extends Controller
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
            ->where('table_code', 'CryptoExchange')
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
            'ExternalService', 'CryptoExchangeAccounts', 'CryptoAccountLogin', 'CryptoAccountPassword',
            'CryptoAccountName', 'CryptoExchange', 'CryptoExchangeAccount',
            'CExchangeName', 'CExchangeURL', 'HolderCryptoExchangeAccount',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'CryptoAccountName'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = DB::table('__ModelTables')
            ->where('table_code', 'Company')
            ->value('table_n');

        $service = DB::table('__ModelTables')
            ->where('table_code', 'CryptoExchange')
            ->value('table_n');

        $CryptoAccount = CryptoAccount::where('table_n', $model)
            ->where('table_n_service', $service)
            ->leftjoin('Companies', 'CryptoAccounts.row_id', '=', 'Companies.id')
            ->leftjoin('_CryptoExchanges', 'CryptoAccounts.row_id_service', '=', '_CryptoExchanges.id')
            ->select('_CryptoExchanges.*',  'Companies.*', 'CryptoAccounts.*')
            ->where('CryptoAccounts.id', $request->id)
            ->get()->toArray();
        $Companies = Company::get()->toArray();
        $CryptoExchanges = CryptoExchange::get()->toArray();

        foreach ($methods as $key=>$value){
            if (isset($value) and ($value == "read") ){
                $card =[
                    "main_data_models" => [
                        "CryptoAccounts" => $CryptoAccount
                    ],
                    "add_data_models" => [
                        "Companies" => $Companies,
                        "CryptoExchanges" => $CryptoExchanges,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoExchangeAccount']['translation_captions']['caption_translation'],
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
                                        ['title' => $getArrayCaptions['CryptoExchange']['translation_captions']['caption_translation'], 'model' => 'c_exchange_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
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
                        "CryptoExchanges" => $CryptoExchanges,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoExchangeAccount']['translation_captions']['caption_translation'],
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
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/company/cryptoExchangeAccounts/update", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/company/cryptoExchangeAccounts/update", "img" => ""],
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
                                            'title' => $getArrayCaptions['CryptoExchange']['translation_captions']['caption_translation'],
                                            'model' => 'row_id_service',
                                            'type' => 'lt-select',
                                            'width' => '100%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "CryptoExchanges",
                                                "options_field_id" => "id",
                                                "options_field_title" => "c_exchange_name",
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
