<?php

namespace App\Http\Controllers\Api\TabCrypto;

use App\Http\Classes\ConsumerParameters;
use App\Models\Contractor;
use App\Models\CryptoAccount;
use App\Models\CryptoWallet;
use App\Models\DbArea;
use App\Models\DBase;
use App\Models\ServerDb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;

class ContractorsCryptoPlatformWalletsController extends Controller
{
    public function list(Request $request)
    {

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual', 'Number',
            'CryptoAccounts', 'Code', 'Name', 'Country', 'Image', 'CryptoPlatformAccounts',
            'CryptoAccounts', 'CryptoAccount', 'DbArea', 'Database', 'CryptoPlatform',
            'СPlatformURL', 'HolderCryptoExchangeAccount',
            'Server', 'Uid1cCode', 'CryptoWalletName', 'CryptoWalletNumber',
            'CryptoWallets', 'CryptoWallet', 'HolderCryptoPlatformWallet',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = DB::table('__ModelTables')
            ->where('table_code', 'Contractor')
            ->value('table_n');

        $service = DB::table('__ModelTables')
            ->where('table_code', 'CryptoPlatform')
            ->value('table_n');

        $CryptoWallet = CryptoWallet::leftjoin('CryptoAccounts', 'CryptoAccounts.id', '=', 'CryptoWallets.c_account_id')
            ->where('table_n', $model)
            ->where('table_n_service', $service)
            ->leftjoin('Contractors', 'CryptoAccounts.row_id', '=', 'Contractors.id')
            ->leftjoin('_CryptoPlatforms', 'CryptoAccounts.row_id_service', '=', '_CryptoPlatforms.id')
            ->leftjoin('_DbAreas', '_DbAreas.id', '=', 'Contractors.db_area_id')
            ->leftjoin('_DBases', '_DBases.id', '=', '_DbAreas.db_id')
            ->leftjoin('_ServersDB', '_ServersDB.id', '=', '_DBases.server_id')
            ->select('_ServersDB.*', '_DBases.*', '_DbAreas.*', '_CryptoPlatforms.*', 'Contractors.*', 'CryptoAccounts.*', 'CryptoWallets.*')
            ->where('row_id', $request->id)
            ->get()->toArray();

        $cryptoColumnArray = [];
        $CryptoWallets = [];
        foreach ($CryptoWallet as $cryptoColumn) {
            $cryptoColumn['c_platform_name1'] = $cryptoColumn['c_platform_name'] . "-" . $cryptoColumn['c_platform_url'];
            $cryptoColumnArray[] = $cryptoColumn;
            $CryptoWallets[] = [
                'id' => $cryptoColumn['id'],
                'c_wallet_name' => $cryptoColumn['c_wallet_name'],
                'c_wallet_n' => $cryptoColumn['c_wallet_n'],
                'c_wallet_code' => $cryptoColumn['c_wallet_code'],
                'c_account_id' => $cryptoColumn['c_account_id'],
                'c_account_name' => $cryptoColumn['c_account_name'],
                'table_n' => $cryptoColumn['table_n'],
                'row_id' => $cryptoColumn['row_id'],
                'contractor_short_name' => $cryptoColumn['contractor_short_name'],
                'db_area_id' => $cryptoColumn['db_area_id'],
                'db_area_name' => $cryptoColumn['db_area_name'],
                'db_id' => $cryptoColumn['db_id'],
                'db_name' => $cryptoColumn['db_name'],
                'server_id' => $cryptoColumn['server_id'],
                'server_name' => $cryptoColumn['server_name'],
                'table_n_service' => $cryptoColumn['table_n_service'],
                'row_id_service' => $cryptoColumn['row_id_service'],
                'c_platform_name' => $cryptoColumn['c_platform_name'],
                'c_platform_name1' => $cryptoColumn['c_platform_name1'],
                'c_platform_url' => $cryptoColumn['c_platform_url'],
                'uid_1c_code' => $cryptoColumn['uid_1c_code'],
                'actual_l' => $cryptoColumn['actual_l'],
                'deleted_l' => $cryptoColumn['deleted_l'],
                'created_at' => $cryptoColumn['created_at'],
                'updated_at' => $cryptoColumn['updated_at'],
                'created_by' => $cryptoColumn['created_by'],
                'updated_by' => $cryptoColumn['updated_by'],
            ];
        }


        $Contractors = Contractor::where('id', $request->id)->select('id', 'contractor_short_name')->get()->toArray();
        $DBAreas = DbArea::select('id', 'db_area_name', 'db_id')->get()->toArray();
        $Dbases = DBase::select('id', 'db_name', 'server_id')->get()->toArray();
        $ServersDB = ServerDb::select('id', 'server_name')->get()->toArray();
        $CryptoAccounts = CryptoAccount::select('id', 'c_account_name')->get()->toArray();


        $list = [
            "main_data_models" => [
                "CryptoWallets" => $CryptoWallets,
            ],
            "add_data_models" => [
                "Contractors" => $Contractors,
                "ServersDB" => $ServersDB,
                "DBAreas" => $DBAreas,
                "Dbases" => $Dbases,
                "CryptoAccounts" => $CryptoAccounts,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['CryptoWallets']['translation_captions']['caption_translation'],
                "form_code" => "cryptoWallets",
                "form_is_dependent" => true,
                "form_type" => "list",
                "form_base_data_model" => "CryptoWallets",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/cryptoPlatformWallets/",
                    "form_search_field" => "c_wallet_name",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => "CryptoWallets",
                "dependent_fields" => [
                    "title" => $getArrayCaptions['HolderCryptoPlatformWallet']['translation_captions']['caption_translation'],
                    "model" => "row_id",
                    "type" => "label",
                    "current_value" => $Contractors[0]['contractor_short_name'],
                    "options" => [],
                    "options_data" => [
                        "options_data_model" => "Contractors",
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => "contractor_short_name",
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
                            "block_model" => "CryptoWallets",
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
                                    'key' => 'c_wallet_name',
                                    'sortable' => true,
                                    'class' => 'c_wallet_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 40%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'c_wallet_code',
                                    'sortable' => true,
                                    'class' => 'c_wallet_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 44%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => "actual_l",
                                    'sortable' => true,
                                    'class' => 'actual_l',
                                    'label' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 10%',
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

    public function card(Request $request)
    {

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual', 'Number',
            'CryptoAccounts', 'Code', 'Name', 'Country', 'Image', 'CryptoPlatformAccounts',
            'CryptoAccounts', 'CryptoAccount', 'DbArea', 'Database', 'CryptoPlatform',
            'СPlatformURL', 'CryptoExchangeAccount', 'HolderCryptoExchangeAccount',
            'Server', 'Uid1cCode', 'CryptoWalletName', 'CryptoWalletNumber',
            'CryptoWallets', 'CryptoWallet', 'HolderCryptoPlatformWallet',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        $model = DB::table('__ModelTables')
            ->where('table_code', 'Contractor')
            ->value('table_n');

        $service = DB::table('__ModelTables')
            ->where('table_code', 'CryptoPlatform')
            ->value('table_n');

        $CryptoWallet = CryptoWallet::leftjoin('CryptoAccounts', 'CryptoAccounts.id', '=', 'CryptoWallets.c_account_id')
            ->where('table_n', $model)
            ->where('table_n_service', $service)
            ->leftjoin('Contractors', 'CryptoAccounts.row_id', '=', 'Contractors.id')
            ->leftjoin('_CryptoPlatforms', 'CryptoAccounts.row_id_service', '=', '_CryptoPlatforms.id')
            ->leftjoin('_DbAreas', '_DbAreas.id', '=', 'Contractors.db_area_id')
            ->leftjoin('_DBases', '_DBases.id', '=', '_DbAreas.db_id')
            ->leftjoin('_ServersDB', '_ServersDB.id', '=', '_DBases.server_id')
            ->select('_ServersDB.*', '_DBases.*', '_DbAreas.*', '_CryptoPlatforms.*', 'Contractors.*', 'CryptoAccounts.*', 'CryptoWallets.*')
            ->where('CryptoWallets.id', $request->id)
            ->get()->toArray();
//        dd($CryptoWallet);

        $cryptoColumnArray = [];
        $CryptoWallets = [];
        foreach ($CryptoWallet as $cryptoColumn) {
            $cryptoColumn['c_platform_name1'] = $cryptoColumn['c_platform_name'] . "-" . $cryptoColumn['c_platform_url'];
            $cryptoColumnArray[] = $cryptoColumn;
            if (!$cryptoColumn['db_name']) {
                $CryptoWallets[] = [
                    'id' => $cryptoColumn['id'],
                    'c_wallet_name' => $cryptoColumn['c_wallet_name'],
                    'c_wallet_n' => $cryptoColumn['c_wallet_n'],
                    'c_wallet_code' => $cryptoColumn['c_wallet_code'],
                    'c_account_id' => $cryptoColumn['c_account_id'],
                    'c_account_name' => $cryptoColumn['c_account_name'],
                    'table_n' => $cryptoColumn['table_n'],
                    'row_id' => $cryptoColumn['row_id'],
                    'contractor_short_name' => $cryptoColumn['contractor_short_name'],
                    'db_area_id' => $cryptoColumn['db_area_id'],
                    'db_area_name' => $cryptoColumn['db_area_name'],
                    'db_id' => '',
                    'db_name' => '',
                    'server_id' => '',
                    'server_name' => '',
                    'table_n_service' => $cryptoColumn['table_n_service'],
                    'row_id_service' => $cryptoColumn['row_id_service'],
                    'c_platform_name' => $cryptoColumn['c_platform_name'],
                    'c_platform_name1' => $cryptoColumn['c_platform_name1'],
                    'c_platform_url' => $cryptoColumn['c_platform_url'],
                    'uid_1c_code' => '',
                    'actual_l' => $cryptoColumn['actual_l'],
                    'deleted_l' => $cryptoColumn['deleted_l'],
                    'created_at' => $cryptoColumn['created_at'],
                    'updated_at' => $cryptoColumn['updated_at'],
                    'created_by' => $cryptoColumn['created_by'],
                    'updated_by' => $cryptoColumn['updated_by'],
                ];
            } else {
                $CryptoWallets[] = [
                    'id' => $cryptoColumn['id'],
                    'c_wallet_name' => $cryptoColumn['c_wallet_name'],
                    'c_wallet_n' => $cryptoColumn['c_wallet_n'],
                    'c_wallet_code' => $cryptoColumn['c_wallet_code'],
                    'c_account_id' => $cryptoColumn['c_account_id'],
                    'c_account_name' => $cryptoColumn['c_account_name'],
                    'table_n' => $cryptoColumn['table_n'],
                    'row_id' => $cryptoColumn['row_id'],
                    'contractor_short_name' => $cryptoColumn['contractor_short_name'],
                    'db_area_id' => $cryptoColumn['db_area_id'],
                    'db_area_name' => $cryptoColumn['db_area_name'],
                    'db_id' => $cryptoColumn['db_id'],
                    'db_name' => $cryptoColumn['db_name'],
                    'server_id' => $cryptoColumn['server_id'],
                    'server_name' => $cryptoColumn['server_name'],
                    'table_n_service' => $cryptoColumn['table_n_service'],
                    'row_id_service' => $cryptoColumn['row_id_service'],
                    'c_platform_name' => $cryptoColumn['c_platform_name'],
                    'c_platform_name1' => $cryptoColumn['c_platform_name1'],
                    'c_platform_url' => $cryptoColumn['c_platform_url'],
                    'uid_1c_code' => $cryptoColumn['uid_1c_code'],
                    'actual_l' => $cryptoColumn['actual_l'],
                    'deleted_l' => $cryptoColumn['deleted_l'],
                    'created_at' => $cryptoColumn['created_at'],
                    'updated_at' => $cryptoColumn['updated_at'],
                    'created_by' => $cryptoColumn['created_by'],
                    'updated_by' => $cryptoColumn['updated_by'],
                ];
            }
        }

        $Contractors = Contractor::where('id', $request->id)->select('id', 'contractor_short_name')->get()->toArray();
        $DBAreas = DbArea::select('id', 'db_area_name', 'db_id')->get()->toArray();
        $Dbases = DBase::select('id', 'db_name', 'server_id')->get()->toArray();
        $ServersDB = ServerDb::select('id', 'server_name')->get()->toArray();
        $CryptoAccounts = CryptoAccount::select('id', 'c_account_name')->get()->toArray();


        foreach ($methods as $key => $value) {
            if (isset($value) and ($value == "read")) {
                $card = [
                    "main_data_models" => [
                        "CryptoWallets" => $CryptoWallets,
                    ],
                    "add_data_models" => [
                        "Contractors" => $Contractors,
                        "ServersDB" => $ServersDB,
                        "DBAreas" => $DBAreas,
                        "Dbases" => $Dbases,
                        "CryptoAccounts" => $CryptoAccounts,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoWallet']['translation_captions']['caption_translation'],
                        "form_code" => "cryptoWallets",
                        "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoWallets",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $CryptoWallets[0]['c_account_name'],
                        "form_type_list" => [
                            "form_card_url" => "/cryptoWalletsAccounts/",
                            "form_search_field" => "c_wallet_name",
                        ],
                    ],
                    "dependent" => [
                        "dependent_data_model" => "CryptoWallets",
                        "dependent_fields" => [
                            "title" => $getArrayCaptions['HolderCryptoPlatformWallet']['translation_captions']['caption_translation'],
                            "model" => "row_id",
                            "type" => "label",
                            "options" => [],
                            "options_data" => [
                                "options_data_model" => "Contractors",
                                "options_field_id" => "id",
                                "options_field_id_value" => "",
                                "options_field_title" => "contractor_short_name",
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
                                    "block_model" => "CryptoWallets",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CryptoWalletName']['translation_captions']['caption_translation'], 'model' => 'c_wallet_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CryptoAccount']['translation_captions']['caption_translation'], 'model' => 'c_account_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['CryptoWalletNumber']['translation_captions']['caption_translation'], 'model' => 'c_wallet_n', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['CryptoPlatform']['translation_captions']['caption_translation'], 'model' => 'c_platform_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4"],
                                        ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model' => 'c_wallet_remark', 'type' => 'label', 'width' => '75%', "zone" => "1", "order" => "5"],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'model' => 'actual_l', 'type' => 'label', 'width' => '25%', "zone" => "1", "order" => "6"],
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
                                    "block_model" => "CryptoWallets",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "3"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                                        ['title' => $getArrayCaptions['Uid1cCode']['translation_captions']['caption_translation'], 'model' => 'uid_1c_code', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['Database']['translation_captions']['caption_translation'], 'model' => 'db_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['DbArea']['translation_captions']['caption_translation'], 'model' => 'db_area_name', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                                        ['title' => $getArrayCaptions['Server']['translation_captions']['caption_translation'], 'model' => 'server_name', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "4"],
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
            if (isset($value) and (($value == "update"))) {
                $card = [
                    "main_data_models" => [
                        "CryptoWallets" => $CryptoWallets,
                    ],
                    "add_data_models" => [
                        "Contractors" => $Contractors,
                        "ServersDB" => $ServersDB,
                        "DBAreas" => $DBAreas,
                        "Dbases" => $Dbases,
                        "CryptoAccounts" => $CryptoAccounts,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoWallet']['translation_captions']['caption_translation'],
                        "form_code" => "cryptoWallets",
                        "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoWallets",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $CryptoWallets[0]['c_account_name'],
                        "form_type_list" => [
                            "form_card_url" => "/cryptoWalletsAccounts/",
                            "form_search_field" => "c_wallet_name",
                        ],
                    ],
                    "dependent" => [
                        "dependent_data_model" => "CryptoWallets",
                        "dependent_fields" => [
                            "title" => $getArrayCaptions['HolderCryptoPlatformWallet']['translation_captions']['caption_translation'],
                            "model" => "row_id",
                            "type" => "label",
                            "options" => [],
                            "options_data" => [
                                "options_data_model" => "Contractors",
                                "options_field_id" => "id",
                                "options_field_id_value" => "",
                                "options_field_title" => "contractor_short_name",
                                "search" => ''
                            ],
                        ],
                        "width" => "100%",
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/contractor/cryptoPlatformWallets/update", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/contractor/cryptoPlatformWallets/update", "img" => ""],
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
                                    "block_model" => "CryptoWallets",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CryptoWalletName']['translation_captions']['caption_translation'], 'model' => 'c_wallet_name', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "1",
                                            "validation" => ["required" => true]],
                                        ['title' => $getArrayCaptions['CryptoWalletNumber']['translation_captions']['caption_translation'], 'model' => 'c_wallet_n', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "2",
                                            "validation" => ["required" => true]],
                                        ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model' => 'c_wallet_remark', 'type' => 'text', 'width' => '75%', "zone" => "1", "order" => "3"],
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
                                    "block_model" => "CryptoWallets",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "3"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                                        ['title' => $getArrayCaptions['DbArea']['translation_captions']['caption_translation'], 'model' => 'db_area_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['Uid1cCode']['translation_captions']['caption_translation'], 'model' => 'uid_1c_code', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                                        ['title' => $getArrayCaptions['Database']['translation_captions']['caption_translation'], 'model' => 'db_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['Server']['translation_captions']['caption_translation'], 'model' => 'server_name', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "4"],
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
        $model = $request->CryptoWallets[0];
        return CryptoWallet::where('id', $model['id'])->update([
            'c_wallet_name' => $model['c_wallet_name'],
            'c_wallet_n' => $model['c_wallet_n'],
//            'c_account_id' => $model['c_account_id'],
            'c_wallet_remark' => $model['c_wallet_remark'],
            'actual_l' => $model['actual_l'],
            'updated_by' => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
