<?php

namespace App\Http\Controllers\Api\TabFinances;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\Country;
use App\Models\CryptoPlatform;
use App\Models\CryptoToken;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\Currency;
use Illuminate\Support\Facades\Route;

class CurrenciesController extends Controller
{
    public function list(Request $request)
    {

        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Remark', 'Image', 'NumericCode', 'Symbol',
            'ImageCategory', 'Code', 'Name', 'Currency', 'Currencies',
            'CurrencyName', 'CurrencyCode', 'CryptoTokens',
            'Country', 'CurrencySymbol', 'LetterCode',
            'CurrencyCodeN', 'CryptoToken', 'SystemDetails',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        $Currencies = Currency::all()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $res = [];
        foreach($Currencies as $currencyColumn)
        {
            $res[] = [
                'id'              => $currencyColumn['id'],
                'currency_name'   => $currencyColumn['currency_name'],
                'currency_code_n' => $currencyColumn['currency_code_n'],
                'currency_code'   => $currencyColumn['currency_code'],
                'currency_symbol' => $currencyColumn['currency_symbol'],
                'currency_remark' => $currencyColumn['currency_remark'],
                'deleted_l'       => $currencyColumn['deleted_l'],
                'created_at'      => $currencyColumn['created_at'],
                'updated_at'      => $currencyColumn['updated_at'],
                'created_by'      => $currencyColumn['created_by'],
                'updated_by'      => $currencyColumn['updated_by'],
            ];
        }

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $res,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Currencies']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/currency/",
                    "form_search_field" => "currency_name",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                [
                                    'key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"
                                ],
                                [
                                    'key'     => 'currency_name', 'sortable' => true, 'class' => 'currency_name',
                                    'label'   => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%', "zone" => "1", "order" => "2"
                                ],
                                [
                                    'key'     => 'currency_code_n', 'sortable' => true, 'class' => 'currency_code_n',
                                    'label'   => $getArrayCaptions['NumericCode']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => 'currency_code', 'sortable' => true, 'class' => 'currency_code',
                                    'label'   => $getArrayCaptions['LetterCode']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%', "zone" => "1", "order" => "4"
                                ],
                                [
                                    'key'     => "currency_symbol", 'sortable' => true, 'class' => 'currency_symbol',
                                    'label'   => $getArrayCaptions['Symbol']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%', "zone" => "1", "order" => "5"
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
        if(!$this->isAdmin())
            abort(403);
        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Remark', 'Image', 'NumericCode', 'CryptoTokenIdNull',
            'ImageCategory', 'Code', 'Name', 'Currency', 'Currencies',
            'CurrencyName', 'CurrencyCode', 'CryptoTokens', 'CountryIdNull', 'ImageIdNull',
            'Country', 'CurrencySymbol', 'LetterCode',
            'CurrencyCodeN', 'CryptoToken', 'SystemDetails',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $currency_id = $request->id;

        if($currency_id == "new")
            $currency = Currency::getNewObject();
        else
            $currency = Currency::query()->where('id', $currency_id)->get()->first()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();


        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title' => $getArrayCaptions['CurrencyName']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'currency_name', 'width' => '60%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['CurrencySymbol']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'currency_symbol', 'width' => '30%', 'type' => 'text',
                                'zone'  => '1', 'order' => '3'
                            ],
                            [
                                'title' => $getArrayCaptions['CurrencyCodeN']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'currency_code_n', 'width' => '30%', 'type' => 'text',
                                'zone'  => '1', 'order' => '4', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['CurrencyCode']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'currency_code', 'width' => '40%', 'type' => 'text',
                                'zone'  => '1', 'order' => '5', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'currency_remark', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '8'
                            ],
                        ]
                    ]
                ]
            ]
        ];

        if($formShowParam['show_system_tab'])
        {
            $tabs[] = [
                "tab_title"       => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
        }

        $card = [
            "main_data_models" => [
                $controller->controller_alias => [$currency],
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Currency']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => "Model name",
                "form_type_list"                => [
                    "form_card_url" => "currencies",
                ],
            ],
            "tabs"             => $tabs,
            "sets"             => $this->getButtonsList(["card_actions"])
        ];


        return response()->json($card);
    }

    public function update(Request $request)
    {
        $model = $request->Currencies[0];
        return Currency::where('id', $model['id'])->update([
            'currency_name'   => $model['currency_name'],
            'currency_code_n' => $model['currency_code_n'],
            'currency_code'   => $model['currency_code'],
            'currency_symbol' => $model['currency_symbol'],
            'country_id'      => $model['country_id'],
            'c_token_id'      => $model['c_token_id'],
            'image_id'        => $model['image_id'],
            'currency_remark' => $model['currency_remark'],
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
        ]);
    }

}
