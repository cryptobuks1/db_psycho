<?php

namespace App\Http\Controllers\Api\TabFinances;

use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\BankAccountType;
use App\Models\Company;
use App\Models\Country;
use App\Models\Currency;
use App\Models\DbArea;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;

class BankAccountsController extends Controller
{
    public function listCompany(Request $request) {

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Remark','SystemDetails', 'Actual',
            'BankAccountN','BankAccountName', 'Name',
            'BankAccountHolder','BankAccounts', 'BankAccount',
            'Country', 'Bank', 'Currency', 'Banks',
            'BankAccountTypes', 'AccountNumber', 'BankAccountType', 'Companies',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = DB::table('__ModelTables')
            ->where('table_code', 'Company')
            ->value('table_n');


        $BankAccounts = BankAccount::where('table_n', $model)
            ->where('row_id', 43)
            ->join('Companies', 'BankAccounts.row_id', '=', 'Companies.id')
            ->leftjoin('_Banks', 'BankAccounts.bank_id', '=', '_Banks.id')
            ->leftjoin('BankAccountTypes', 'BankAccounts.bank_account_type_id', '=', 'BankAccountTypes.id')
            ->leftjoin('_Currencies', 'BankAccounts.bank_account_type_id', '=', '_Currencies.id')
            ->get()->toArray();

        $Currencies = Currency::get()->toArray();
        $BankAccountTypes = BankAccountType::get()->toArray();
        $Companies = Company::get()->toArray();
        $Banks = Bank::get()->toArray();

        $list = [
            "main_data_models" => [
                "BankAccounts" => $BankAccounts,
            ],
            "add_data_models" => [
                "Currencies" => $Currencies,
                "BankAccountTypes" => $BankAccountTypes,
                "Companies" => $Companies,
                "Banks" => $Banks,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['BankAccounts']['translation_captions']['caption_translation'],
                "form_code" => "bankAccounts",
                "form_is_dependent" => true,
                "form_type" => "list",
                "form_base_data_model" => "BankAccounts",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/bankAccounts/",
                    "form_search_field" => "bank_account_n",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => "",
                "dependent_fields" => [
                    "title" =>  $getArrayCaptions['BankAccountHolder']['translation_captions']['caption_translation'],
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
            "links" =>[
                [
                    "link_title" => $getArrayCaptions['Banks']['translation_captions']['caption_translation'],
                    "link_url" => "/banks",
                    "class" =>"btn btn-default",
                    "link_img" => "",
                    "link_type" =>"internal",
                ],
                [
                    "link_title" => $getArrayCaptions['BankAccountTypes']['translation_captions']['caption_translation'],
                    "link_img" => "",
                    "link_type" =>"internal",
                    "link_url" => "/bankAccountTypes",
                    "class" =>"btn btn-default",
                ]
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            //"block_title" => "none",
                            "block_zone_quantity" => 1,
                            "block_model" => "BankAccounts",
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
                                    'key' => 'bank_account_name',
                                    'sortable' => true,
                                    'class' => 'bank_account_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'bank_account_n',
                                    'sortable' => true,
                                    'class' => 'bank_account_n',
                                    'label' => $getArrayCaptions['AccountNumber']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => 'bank_name',
                                    'sortable' => true,
                                    'class' => 'bank_name',
                                    'label' => $getArrayCaptions['Bank']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => "currency_name",
                                    'sortable' => true,
                                    'class' => 'currency_name',
                                    'label' => $getArrayCaptions['Currency']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],
                                [
                                    'key' => "bank_account_type_name",
                                    'sortable' => true,
                                    'class' => 'bank_account_type_name',
                                    'label' => $getArrayCaptions['BankAccountType']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];
        return response()->json($list);
    }

    public function cardCompany(Request $request){
        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Remark','SystemDetails', 'Actual',
            'BankAccountN','BankAccountName', 'Name',
            'BankAccountHolder','BankAccounts', 'BankAccount',
            'Country', 'Bank', 'Currency', 'Banks',
            'BankAccountTypes', 'AccountNumber', 'BankAccountType', 'Companies',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $model = DB::table('__ModelTables')
            ->where('table_code', 'Company')
            ->value('table_n');
        $BankAccounts = BankAccount::where('table_n', $model)
            ->where('row_id', 43)
            ->join('Companies', 'BankAccounts.row_id', '=', 'Companies.id')
            ->leftjoin('_Banks', 'BankAccounts.bank_id', '=', '_Banks.id')
            ->leftjoin('BankAccountTypes', 'BankAccounts.bank_account_type_id', '=', 'BankAccountTypes.id')
            ->leftjoin('_Currencies', 'BankAccounts.bank_account_type_id', '=', '_Currencies.id')
            ->where('BankAccounts.id', $request->id)
            ->get()->toArray();
        $Currencies = Currency::get()->toArray();
        $BankAccountTypes = BankAccountType::get()->toArray();
        $Companies = Company::get()->toArray();
        $Banks = Bank::get()->toArray();
        foreach ($methods as $key=>$value) {
            if (isset($value) and ($value == "read") ){
                $card =[
                    "main_data_models" => [
                        "BankAccounts" => $BankAccounts
                    ],
                    "add_data_models" => [
                        "Currencies" => $Currencies,
                        "BankAccountTypes" => $BankAccountTypes,
                        "Companies" => $Companies,
                        "Banks" => $Banks,
                    ],
                    "form_parameters" => [
                        "form_parameters" => [
                            "form_title" => $getArrayCaptions['BankAccounts']['translation_captions']['caption_translation'],
                            "form_code" => "bankAccounts",
                            "form_is_dependent" => true,
                            "form_type" => "card",
                            "form_base_data_model" => "BankAccounts",
                            "form_main_data_model_id_field" => "id",
                            "form_main_data_model_name" => $BankAccounts[0]['bank_account_name'],
                            "form_type_list" => [
                                "form_card_url" => "/bankAccounts/",
                                "form_search_field" => "bank_account_n",
                            ],
                        ],
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/company", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/company", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['BankAccounts']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "BankAccounts",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['BankAccountName']['translation_captions']['caption_translation'], 'model' => 'bank_account_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['BankAccountN']['translation_captions']['caption_translation'], 'model' => 'bank_account_n', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "2"],
                                        [
                                            'title' => $getArrayCaptions['Bank']['translation_captions']['caption_translation'],
                                            'model' => 'bank_name',
                                            'type' => 'label',
                                            'width' => '50%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Banks",
                                                "options_field_id" => "id",
                                                "options_field_title" => "bank_name",
                                                "search" =>""
                                            ],
                                            "zone" => "1",
                                            "order" => "3"
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Currencies']['translation_captions']['caption_translation'],
                                            'model' => 'currency_name',
                                            'type' => 'label',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Currencies",
                                                "options_field_id" => "id",
                                                "options_field_title" => "currency_name",
                                                'search' => ''
                                            ],
                                            "zone" => "1",
                                            'width' => '20%',
                                            "order" => "4"
                                        ],
                                        [
                                            'title' => $getArrayCaptions['BankAccountTypes']['translation_captions']['caption_translation'],
                                            'model' => 'bank_account_type_name',
                                            'type' => 'label',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "BankAccountTypes",
                                                "options_field_id" => "id",
                                                "options_field_title" => "bank_account_type_name",
                                                'search' => ''
                                            ],
                                            "zone" => "1",
                                            'width' => '20%',
                                            "order" => "5"
                                        ],
                                        ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model' => 'bank_account_remark', 'type' => 'label', 'width' => '80%', "zone" => "1", "order" => "6"],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'model' => 'actual_l', 'type' => 'bulevo', 'width' => '20%', "zone" => "1", "order" => "7"],
                                    ]
                                ]
                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "BankAccounts",
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
                        "BankAccounts" => $BankAccounts
                    ],
                    "add_data_models" => [
                        "Currencies" => $Currencies,
                        "BankAccountTypes" => $BankAccountTypes,
                        "Companies" => $Companies,
                        "Banks" => $Banks,
                    ],
                    "form_parameters" => [
                        "form_parameters" => [
                            "form_title" => $getArrayCaptions['BankAccounts']['translation_captions']['caption_translation'],
                            "form_code" => "bankAccounts",
                            "form_is_dependent" => true,
                            "form_type" => "card",
                            "form_base_data_model" => "BankAccounts",
                            "form_main_data_model_id_field" => "id",
                            "form_main_data_model_name" => $BankAccounts[0]['bank_account_name'],
                            "form_type_list" => [
                                "form_card_url" => "/bankAccounts/",
                                "form_search_field" => "bank_account_n",
                            ],
                        ],
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/bankAccounts", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/bankAccounts", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['BankAccounts']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "BankAccounts",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['BankAccountName']['translation_captions']['caption_translation'], 'model' => 'bank_account_name', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "1",
                                            "validation" => ["required" => true]],
                                        ['title' => $getArrayCaptions['BankAccountN']['translation_captions']['caption_translation'], 'model' => 'bank_account_n', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "2",
                                            "validation" => ["required" => true]],
                                        [
                                            'title' => $getArrayCaptions['Bank']['translation_captions']['caption_translation'],
                                            'model' => 'bank_name',
                                            'type' => 'lt-select',
                                            'width' => '50%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Banks",
                                                "options_field_id" => "id",
                                                "options_field_title" => "bank_name",
                                                "search" =>""
                                            ],
                                            "zone" => "1",
                                            "order" => "3"
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Currencies']['translation_captions']['caption_translation'],
                                            'model' => 'currency_name',
                                            'type' => 'lt-select',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Currencies",
                                                "options_field_id" => "id",
                                                "options_field_title" => "currency_name",
                                                'search' => ''
                                            ],
                                            "zone" => "1",
                                            'width' => '20%',
                                            "order" => "4"
                                        ],
                                        [
                                            'title' => $getArrayCaptions['BankAccountTypes']['translation_captions']['caption_translation'],
                                            'model' => 'bank_account_type_name',
                                            'type' => 'lt-select',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "BankAccountTypes",
                                                "options_field_id" => "id",
                                                "options_field_title" => "bank_account_type_name",
                                                'search' => ''
                                            ],
                                            "zone" => "1",
                                            'width' => '20%',
                                            "order" => "5"
                                        ],
                                        ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model' => 'bank_account_remark', 'type' => 'text', 'width' => '80%', "zone" => "1", "order" => "6"],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'model' => 'actual_l', 'type' => 'bulevo', 'width' => '20%', "zone" => "1", "order" => "7"],
                                    ]
                                ]
                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "BankAccounts",
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
