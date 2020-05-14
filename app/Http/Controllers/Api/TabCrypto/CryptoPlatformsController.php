<?php

namespace App\Http\Controllers\Api\TabCrypto;

use App\Http\Classes\ConsumerParameters;
use App\Models\CryptoPlatform;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class CryptoPlatformsController extends Controller
{
    public function list(Request $request) {
        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Remark','Image', 'NumericCode',
            'ImageCategory','Code', 'Name',
            'CurrencyName','CurrencyCode',
            'Country', 'CPlatformName',
            'СPlatformURL', 'CPlatformCode', 'CryptoPlatforms', 'CryptoPlatform',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $CryptoPlatforms = CryptoPlatform::get()->toArray();

        $list = [
            "main_data_models" => [
                "CryptoPlatforms" => $CryptoPlatforms,
            ],
//            "add_data_models" => [
//                "Countries" => $CryptoPlatform,
//            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['CryptoPlatforms']['translation_captions']['caption_translation'],
                "form_code" => "cryptoPlatforms",
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => "CryptoPlatforms",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/cryptoPlatforms/",
                    "form_search_field" => "c_platform_name",
                ],
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_zone_quantity" => 1,
                            "block_model" => "CryptoPlatforms",
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
                                    'key' => 'c_platform_name',
                                    'sortable' => true,
                                    'class' => 'c_platform_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 24%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'c_platform_code',
                                    'sortable' => true,
                                    'class' => 'c_platform_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 24%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => 'c_platform_url',
                                    'sortable' => true,
                                    'class' => 'c_platform_url',
                                    'label' => $getArrayCaptions['СPlatformURL']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 24%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => "c_platform_remark",
                                    'sortable' => true,
                                    'class' => 'c_platform_remark',
                                    'label' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
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
            'ok',
            'apply',
            'back', 'Main',
            'Remark','Image', 'NumericCode',
            'ImageCategory','Code', 'Name',
            'CurrencyName','CurrencyCode',
            'Country', 'CPlatformName', 'SystemDetails',
            'СPlatformURL', 'CPlatformCode', 'CryptoPlatforms', 'CryptoPlatform',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $CryptoPlatforms = CryptoPlatform::where('id', $request->id)->get()->toArray();

        foreach ($methods as $key => $value) {
            if (isset($value) and ($value == "read")) {

                $card = [
                    "main_data_models" => [
                        "CryptoPlatforms" => $CryptoPlatforms,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoPlatform']['translation_captions']['caption_translation'],
                        "form_code" => "CryptoPlatforms",
                        "form_is_dependent" => false,
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoPlatforms",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $CryptoPlatforms[0]['c_platform_name'],
                        "form_type_list" => [
                            "form_card_url" => "banks",
                        ],
                    ],
                    "actions" => [
                        "actions_card" =>
                            [
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
                                    "block_model" => "CryptoPlatforms",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        [
                                            'title' => $getArrayCaptions['CPlatformName']['translation_captions']['caption_translation'],
                                            'model' => 'c_platform_name',
                                            'width' => '70%',
                                            'type' => 'label',
                                            'zone' => '1',
                                            'order' => '1',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['CPlatformCode']['translation_captions']['caption_translation'],
                                            'model' => 'c_platform_code',
                                            'width' => '30%',
                                            'type' => 'label',
                                            'zone' => '1',
                                            'order' => '2',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['СPlatformURL']['translation_captions']['caption_translation'],
                                            'model' => 'c_platform_url',
                                            'width' => '50%',
                                            'type' => 'label',
                                            'zone' => '1',
                                            'order' => '3',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                            'model' => 'c_platform_remark',
                                            'width' => '50%',
                                            'type' => 'label',
                                            'zone' => '1',
                                            'order' => '4'
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
                                    "block_model" => "CryptoPlatforms",
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
                        "CryptoPlatforms" => $CryptoPlatforms,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['CryptoPlatform']['translation_captions']['caption_translation'],
                        "form_code" => "CryptoPlatforms",
                        "form_is_dependent" => false,
                        "form_type" => "card",
                        "form_base_data_model" => "CryptoPlatforms",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $CryptoPlatforms[0]['c_platform_name'],
                        "form_type_list" => [
                            "form_card_url" => "cryptoPlatforms",
                        ],
                    ],
                    "actions" => [
                        "actions_card" =>
                            [
                                ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "admin/cryptoPlatforms/update", "img" => ""],
                                ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "admin/cryptoPlatforms/update", "img" => ""],
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
                                    "block_model" => "CryptoPlatforms",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        [
                                            'title' => $getArrayCaptions['CPlatformName']['translation_captions']['caption_translation'],
                                            'model' => 'c_platform_name',
                                            'width' => '70%',
                                            'type' => 'text',
                                            'zone' => '1',
                                            'order' => '1',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['CPlatformCode']['translation_captions']['caption_translation'],
                                            'model' => 'c_platform_code',
                                            'width' => '30%',
                                            'type' => 'text',
                                            'zone' => '1',
                                            'order' => '2',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['СPlatformURL']['translation_captions']['caption_translation'],
                                            'model' => 'c_platform_url',
                                            'width' => '50%',
                                            'type' => 'text',
                                            'zone' => '1',
                                            'order' => '3',
                                            "validation" => ["required" => true]
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                            'model' => 'c_platform_remark',
                                            'width' => '50%',
                                            'type' => 'text',
                                            'zone' => '1',
                                            'order' => '4'
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
                                    "block_model" => "CryptoPlatforms",
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
        $model=$request->CryptoPlatforms[0];
        return CryptoPlatform::where('id', $model['id'] )->update([
            'c_platform_name' => $model['c_platform_name'],
            'c_platform_code' => $model['c_platform_code'],
            'c_platform_url' => $model['c_platform_url'],
            'c_platform_remark' => $model['c_platform_remark'],
            'updated_by' => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
