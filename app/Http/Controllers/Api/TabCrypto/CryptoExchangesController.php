<?php

namespace App\Http\Controllers\Api\TabCrypto;

use App\Http\Classes\ConsumerParameters;
use App\Models\Country;
use App\Models\CryptoExchange;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class CryptoExchangesController extends Controller
{
    public function list(Request $request) {

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark','Image', 'Country', 'SystemDetails',
            'CryptoExchanges', 'Code', 'Name', 'CryptoExchange', 'CExchangeName',
            'CExchangeCode', 'CExchangeURL', 'LetterCode',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

//        $CryptoExchanges = CryptoExchange::with('country', 'image')->get()->toArray();
//        $Countries = Country::select('id', 'country_name')->get()->toArray();
//        $Images = Image::select('id', 'image_name')->get()->toArray();

        $CryptoExchanges = CryptoExchange::with('country', 'image')->get()->toArray();
        $Countries = Country::select('id', 'country_name')->get()->toArray();
        $Images = Image::select('id', 'image_name')->get()->toArray();

        $exchangeColumnArray=[];
        $ColumnExchange=[];
        foreach ($CryptoExchanges as $exchangeColumn){
            $exchangeColumn['country_name'] =  $exchangeColumn['country']['country_name'];
            $exchangeColumn['image_name'] =  $exchangeColumn['image']['image_name'];
            $exchangeColumn['image_path'] =  $exchangeColumn['image']['image_path'];
            $exchangeColumnArray[]= $exchangeColumn;

            $ColumnExchange[]=[
                'id'=> $exchangeColumn['id'],
                'c_exchange_name'=> $exchangeColumn['c_exchange_name'],
                'c_exchange_code'=> $exchangeColumn['c_exchange_code'],
                'country_id'=> $exchangeColumn['country_id'],
                'image_id'=> $exchangeColumn['image_id'],
                'country_name'=> $exchangeColumn['country_name'],
                'image_name'=> $exchangeColumn['image_name'],
                'image_path'=> $exchangeColumn['image_path'],
                'c_exchange_url'=> $exchangeColumn['c_exchange_url'],
                'c_exchange_remark'=> $exchangeColumn['c_exchange_remark'],
                'created_at'=> $exchangeColumn['created_at'],
                'updated_at'=> $exchangeColumn['updated_at'],
                'created_by'=> $exchangeColumn['created_by'],
                'updated_by'=> $exchangeColumn['updated_by'],
            ];
        }


        $list = [
            "main_data_models" => [
                "CryptoExchanges" => $ColumnExchange,
            ],
//            "add_data_models" => [
//                "Countries" => $Countries,
//                "Images" => $Images,
//            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['CryptoExchanges']['translation_captions']['caption_translation'],
                "form_code" => "cryptoExchanges",
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => "CryptoExchanges",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/cryptoExchanges/",
                    "form_search_field" => "c_exchange_name",
                ],
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_zone_quantity" => 1,
                            "block_model" => "CryptoExchanges",
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
                                    'key' => 'c_exchange_name',
                                    'sortable' => true,
                                    'class' => 'c_exchange_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 24%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'c_exchange_code',
                                    'sortable' => true,
                                    'class' => 'c_exchange_code',
                                    'label' => $getArrayCaptions['LetterCode']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 24%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => "country_name",
                                    'sortable' => true,
                                    'class' => 'country',
                                    'label' => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 24%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => "image_path",
                                    'sortable' => true,
                                    'class' => 'image_path',
                                    'label' => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 22%',
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

    public function card(Request $request){

        $methods = $request->accessMethods;
        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark','Image', 'Country', 'SystemDetails',
            'CryptoExchanges', 'Code', 'Name',
            'CryptoExchange', 'CExchangeName', 'CExchangeCode', 'CExchangeURL',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];
        $getArrayCaptions= $this->getTranslateByKeys($captionName);

        $CryptoExchanges = CryptoExchange::with('country', 'image')->where('id', $request->id)->get()->toArray();
        $Countries = Country::select('id', 'country_name')->get()->toArray();
        $Images = Image::select('id', 'image_name')->get()->toArray();

        $exchangeColumnArray=[];
        $ColumnExchange=[];
        foreach ($CryptoExchanges as $exchangeColumn){
            $exchangeColumn['country_name'] =  $exchangeColumn['country']['country_name'];
            $exchangeColumn['image_name'] =  $exchangeColumn['image']['image_name'];
            $exchangeColumnArray[]= $exchangeColumn;

            $ColumnExchange[]=[
                'id'=> $exchangeColumn['id'],
                'c_exchange_name'=> $exchangeColumn['c_exchange_name'],
                'c_exchange_code'=> $exchangeColumn['c_exchange_code'],
                'country_id'=> $exchangeColumn['country_id'],
                'image_id'=> $exchangeColumn['image_id'],
                'country_name'=> $exchangeColumn['country_name'],
                'image_name'=> $exchangeColumn['image_name'],
                'c_exchange_url'=> $exchangeColumn['c_exchange_url'],
                'c_exchange_remark'=> $exchangeColumn['c_exchange_remark'],
                'created_at'=> $exchangeColumn['created_at'],
                'updated_at'=> $exchangeColumn['updated_at'],
                'created_by'=> $exchangeColumn['created_by'],
                'updated_by'=> $exchangeColumn['updated_by'],
            ];
        }

        foreach ($methods as $key=>$value){
            if (isset($value) and ($value == "read") ){
                $card =[
                    "main_data_models" => [
                        "CryptoExchanges" => $ColumnExchange
                    ],
                    "add_data_models" => [
                        "Images" => $Images,
                        "Countries" => $Countries,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoExchange']['translation_captions']['caption_translation'],
                        "form_code" => "cryptoExchanges",
                        "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoExchanges",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $ColumnExchange[0]['c_exchange_name'],
                        "form_type_list" => [
                            "form_card_url" => "/cryptoExchanges/",
                            "form_search_field" => "c_exchange_name",
                        ],
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
                                    "block_model" => "CryptoExchanges",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CExchangeName']['translation_captions']['caption_translation'] , 'model' => 'c_exchange_name', 'type' => 'label', 'width' => '70%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CExchangeCode']['translation_captions']['caption_translation'], 'model' => 'c_exchange_code', 'type' => 'label', 'width' => '30%', "zone" => "1", "order" => "2"],
                                        [
                                            'title' => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
                                            'model' => 'country_id',
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
                                            "order" => "3"
                                        ],
                                        ['title' => $getArrayCaptions['CExchangeURL']['translation_captions']['caption_translation'], 'model' => 'c_exchange_url', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4"],
                                        [
                                            'title' => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                            'model' => 'image_id',
                                            'type' => 'label',
                                            'width' => '50%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Images",
                                                "options_field_id" => "id",
                                                "options_field_title" => "image_name",
                                                "search" =>""
                                            ],
                                            "zone" => "1",
                                            "order" => "3"
                                        ],
                                        ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model' => 'c_exchange_remark', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
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
                                    "block_model" => "CryptoExchanges",
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
                        "CryptoExchanges" => $ColumnExchange
                    ],
                    "add_data_models" => [
                        "Images" => $Images,
                        "Countries" => $Countries,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoExchange']['translation_captions']['caption_translation'],
                        "form_code" => "cryptoExchanges",
                        "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoExchanges",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $CryptoExchanges[0]['c_exchange_name'],
                        "form_type_list" => [
                            "form_card_url" => "/cryptoExchanges/",
                            "form_search_field" => "c_exchange_name",
                        ],
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/cryptoExchanges/update", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/cryptoExchanges/update", "img" => ""],
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
                                    "block_model" => "CryptoExchanges",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CExchangeName']['translation_captions']['caption_translation'] , 'model' => 'c_exchange_name', 'type' => 'text', 'width' => '70%', "zone" => "1", "order" => "1",
                                            "validation" => ["required" => true]],
                                        ['title' => $getArrayCaptions['CExchangeCode']['translation_captions']['caption_translation'], 'model' => 'c_exchange_code', 'type' => 'text', 'width' => '30%', "zone" => "1", "order" => "2",
                                            "validation" => ["required" => true]],
                                        [
                                            'title' => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
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
                                            'zone' => '1',
                                            'order' => '3'
                                        ],
                                        ['title' => $getArrayCaptions['CExchangeURL']['translation_captions']['caption_translation'], 'model' => 'c_exchange_url', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4",
                                            "validation" => ["required" => true]],
                                        [
                                            'title' => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                            'model' => 'image_id',
                                            'type' => 'lt-select',
                                            'width' => '50%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Images",
                                                "options_field_id" => "id",
                                                "options_field_title" => "image_name",
                                                "search" =>""
                                            ],
                                            "zone" => "1",
                                            "order" => "3"
                                        ],
                                        ['title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'], 'model' => 'c_exchange_remark', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "6"],
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
                                    "block_model" => "CryptoExchanges",
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
        $model=$request->CryptoExchanges[0];
        return CryptoExchange::where('id', $model['id'] )->update([
            'c_exchange_name' => $model['c_exchange_name'],
            'c_exchange_code' => $model['c_exchange_code'],
            'country_id' => $model['country_id'],
            'image_id' => $model['image_id'],
            'c_exchange_url' => $model['c_exchange_url'],
            'c_exchange_remark' => $model['c_exchange_remark'],
            'updated_by' => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
