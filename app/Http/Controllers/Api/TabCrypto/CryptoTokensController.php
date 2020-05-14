<?php

namespace App\Http\Controllers\Api\TabCrypto;

use App\Http\Classes\ConsumerParameters;
use App\Models\CryptoPlatform;
use App\Models\CryptoToken;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class CryptoTokensController extends Controller
{
    public function list(Request $request) {

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Name', 'Code',
            'Remark','DeletedL', 'Image',
            'CryptoToken','CryptoTokens', 'CryptoPlatform',
            'Symbol','LetterCode', 'Platform',
            'CryptoTokenName', 'CryptoTokenCode',
            'CryptoTokenSymbol', 'SystemDetails',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $CryptoTokens = CryptoToken::with('image', 'platform')->get()->toArray();
        $CryptoPlatform = CryptoPlatform::select('id', 'c_platform_name')->get()->toArray();
        $tokensColumnArray=[];
        $TokenArr=[];
        foreach ($CryptoTokens as $tokenColumn){
            $tokenColumn['c_platform_name'] =  $tokenColumn['platform']['c_platform_name'];
            $tokenColumn['image_name'] =  $tokenColumn['image']['image_name'];
            $tokenColumn['image_path'] =  $tokenColumn['image']['image_path'];
            $tokensColumnArray[]= $tokenColumn;

            $TokenArr[]=[
                'id'=> $tokenColumn['id'],
                'c_token_name'=> $tokenColumn['c_token_name'],
                'c_token_code'=> $tokenColumn['c_token_code'],
                'c_token_symbol'=> $tokenColumn['c_token_symbol'],
                'c_platform_id'=> $tokenColumn['c_platform_id'],
                'c_platform_name'=> $tokenColumn['c_platform_name'],
                'image_id'=> $tokenColumn['image_id'],
                'image_name'=> $tokenColumn['image_name'],
                'image_path'=> $tokenColumn['image_path'],
                'c_token_remark'=> $tokenColumn['c_token_remark'],
                'deleted_l'=> $tokenColumn['deleted_l'],
                'created_at'=> $tokenColumn['created_at'],
                'updated_at'=> $tokenColumn['updated_at'],
                'created_by'=> $tokenColumn['created_by'],
                'updated_by'=> $tokenColumn['updated_by'],
            ];
        }



        $list = [
            "main_data_models" => [
                "CryptoTokens" => $TokenArr,
            ],
            "add_data_models" => [
                "CryptoPlatforms" => $CryptoPlatform,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['CryptoTokens']['translation_captions']['caption_translation'],
                "form_code" => "cryptoTokens",
                "form_is_dependent" => true,
                "form_type" => "list",
                "form_base_data_model" => "CryptoTokens",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/cryptoTokens/",
                    "form_search_field" => "c_token_name",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => "CryptoTokens",
                "dependent_fields" => [
                    "title" =>  $getArrayCaptions['CryptoPlatform']['translation_captions']['caption_translation'],
                    "model" => "c_platform_id",
                    "type"  => "select",
//                    "current_value"=>$CryptoPlatform[0]['c_platform_name'],
                    "options" =>[],
                    "options_data" => [
                        "options_data_model"      => "CryptoPlatforms",
                        "options_field_id"        => "id",
                        "options_field_id_value"  => "",
                        "options_field_title"     => "c_platform_name",
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
                            "block_model" => "CryptoTokens",
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
                                    'key' => 'c_token_name',
                                    'sortable' => true,
                                    'class' => 'c_token_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'c_token_code',
                                    'sortable' => true,
                                    'class' => 'c_token_code',
                                    'label' => $getArrayCaptions['LetterCode']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 14%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => 'c_token_symbol',
                                    'sortable' => true,
                                    'class' => 'c_token_symbol',
                                    'label' => $getArrayCaptions['Symbol']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 10%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
//                                [
//                                    'key' => "c_platform_name",
//                                    'sortable' => true,
//                                    'class' => 'c_platform_name',
//                                    'label' => $getArrayCaptions['CryptoPlatform']['translation_captions']['caption_translation'],
//                                    'thStyle' => 'width: 15%',
//                                    "zone" => "1",
//                                    "order" => "5"
//                                ],
                                [
                                    'key' => "image_path",
                                    'sortable' => true,
                                    'class' => 'image_path',
                                    'label' => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 15%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],
                                [
                                    'key' => "c_token_remark",
                                    'sortable' => true,
                                    'class' => 'c_token_remark',
                                    'label' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%',
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

    public function card(Request $request) {
        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Name', 'Code',
            'Remark','DeletedL', 'Image',
            'CryptoToken','CryptoTokens', 'CryptoPlatform',
            'Symbol','LetterCode',
            'CryptoTokenName', 'CryptoTokenCode',
            'CryptoTokenSymbol', 'SystemDetails',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $CryptoTokens = CryptoToken::with('image', 'platform')->where('id', $request->id)->get()->toArray();
        $CryptoPlatforms = CryptoPlatform::where('id', $request->id)->get()->toArray();
        $Images = Image::get()->toArray();

        $tokensColumnArray=[];
        $TokenArr=[];
        foreach ($CryptoTokens as $tokenColumn){
            $tokenColumn['c_platform_name'] =  $tokenColumn['platform']['c_platform_name'];
            $tokenColumn['image_name'] =  $tokenColumn['image']['image_name'];
            $tokensColumnArray[]= $tokenColumn;

            $TokenArr[]=[
                'id'=> $tokenColumn['id'],
                'c_token_name'=> $tokenColumn['c_token_name'],
                'c_token_code'=> $tokenColumn['c_token_code'],
                'c_token_symbol'=> $tokenColumn['c_token_symbol'],
                'c_platform_id'=> $tokenColumn['c_platform_id'],
                'c_platform_name'=> $tokenColumn['c_platform_name'],
                'image_id'=> $tokenColumn['image_id'],
                'image_name'=> $tokenColumn['image_name'],
                'c_token_remark'=> $tokenColumn['c_token_remark'],
                'deleted_l'=> $tokenColumn['deleted_l'],
                'created_at'=> $tokenColumn['created_at'],
                'updated_at'=> $tokenColumn['updated_at'],
                'created_by'=> $tokenColumn['created_by'],
                'updated_by'=> $tokenColumn['updated_by'],
            ];
        }


        foreach ($methods as $key => $value) {
            if (isset($value) and ($value == "read")) {

                $card = [
                    "main_data_models" => [
                        "CryptoTokens" => $TokenArr,
                    ],
                    "add_data_models" => [
                        "CryptoPlatforms" => $CryptoPlatforms,
                        "Images" => $Images,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoTokens']['translation_captions']['caption_translation'],
                        "form_code" => "cryptoTokens",
                        "form_is_dependent" => false,
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoTokens",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $TokenArr[0]['c_token_name'],
                        "form_type_list" => [
                            "form_card_url" => "cryptoTokens",
                        ],
                    ],
                    "actions" => [
                        "actions_card" =>
                            [
                                //["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "admin/country/update", "img" => ""],
                                // ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "admin/country/update", "img" => ""],
                                ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    //"block_title" => "Block1",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "CryptoTokens",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        [
                                            'title' => $getArrayCaptions['CryptoTokenName']['translation_captions']['caption_translation'],
                                            'model' => 'c_token_name',
                                            'width' => '100%',
                                            'type' => 'label',
                                            'zone' => '1',
                                            'order' => '1'
                                        ],
                                        [
                                            'title' => $getArrayCaptions['CryptoTokenCode']['translation_captions']['caption_translation'],
                                            'model' => 'c_token_code',
                                            'width' => '33%',
                                            'type' => 'label',
                                            'zone' => '1',
                                            'order' => '2'
                                        ],
                                        [
                                            'title' => $getArrayCaptions['CryptoTokenSymbol']['translation_captions']['caption_translation'],
                                            'model' => 'c_token_symbol',
                                            'width' => '33%',
                                            'type' => 'label',
                                            'zone' => '1',
                                            'order' => '3'
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                            'model' => 'image_name',
                                            'type' => 'label',
                                            'width' => '20%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Images",
                                                "options_field_id" => "id",
                                                "options_field_title" => "image_name",
//                                                "search" =>""
                                            ],
                                            'zone' => '1',
                                            'order' => '4'
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                            'model' => 'c_token_remark',
                                            'width' => '100%',
                                            'type' => 'label',
                                            'zone' => '1',
                                            'order' => '5'
                                        ],
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
                                    "block_model" => "CryptoTokens",
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
            if (isset($value) and ($value == "update")) {
                $card = [
                    "main_data_models" => [
                        "CryptoTokens" => $TokenArr,
                    ],
                    "add_data_models" => [
                        "CryptoPlatforms" => $CryptoPlatforms,
                        "Images" => $Images,
                    ],
                    "dependent" => [
                        "dependent_data_model" => "CryptoTokens",
                        "dependent_fields" => [
                            "title" =>  $getArrayCaptions['CryptoPlatform']['translation_captions']['caption_translation'],
                            "model" => "c_platform_id",
                            "type"  => "label",
                            "options" =>[],
                            "options_data" => [
                                "options_data_model"      => "CryptoPlatforms",
                                "options_field_id"        => "id",
                                "options_field_id_value"  => "",
                                "options_field_title"     => "c_platform_name",
                                "search" => ''
                            ],
                        ],
                        "width" => "100%",
                    ],

                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoToken']['translation_captions']['caption_translation'],
                        "form_code" => "cryptoTokens",
                        "form_is_dependent" => true,
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoTokens",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $TokenArr[0]['c_token_name'],
                        "form_type_list" => [
                            "form_card_url" => "cryptoTokens",
                        ],
                    ],
                    "actions" => [
                        "actions_card" =>
                            [
                                ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "admin/cryptoTokens/update", "img" => ""],
                                ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "admin/cryptoTokens/update", "img" => ""],
                                ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_zone_quantity" => 1,
                                    "block_model" => "CryptoTokens",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        [
                                            'title' => $getArrayCaptions['CryptoTokenName']['translation_captions']['caption_translation'],
                                            'model' => 'c_token_name',
                                            'width' => '100%',
                                            'type' => 'text',
                                            'zone' => '1',
                                            'order' => '1',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['CryptoTokenCode']['translation_captions']['caption_translation'],
                                            'model' => 'c_token_code',
                                            'width' => '33%',
                                            'type' => 'text',
                                            'zone' => '1',
                                            'order' => '2',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['CryptoTokenSymbol']['translation_captions']['caption_translation'],
                                            'model' => 'c_token_symbol',
                                            'width' => '33%',
                                            'type' => 'text',
                                            'zone' => '1',
                                            'order' => '3',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                            'model' => 'image_id',
                                            'type' => 'lt-select',
                                            'width' => '33%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Images",
                                                "options_field_id" => "id",
                                                "options_field_title" => "image_name",
                                                "search" =>""
                                            ],
                                            'zone' => '1',
                                            'order' => '4'
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                            'model' => 'c_token_remark',
                                            'width' => '100%',
                                            'type' => 'text',
                                            'zone' => '1',
                                            'order' => '5'
                                        ],
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
                                    "block_model" => "CryptoTokens",
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

    public function update(Request $request)
    {
        $model=$request->CryptoTokens[0];
        return CryptoToken::where('id', $model['id'] )->update([
            'c_token_name' => $model['c_token_name'],
            'c_token_code' => $model['c_token_code'],
            'c_token_symbol' => $model['c_token_symbol'],
            'image_id' => $model['image_id'],
            'c_token_remark' => $model['c_token_remark'],
            'updated_by' => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
