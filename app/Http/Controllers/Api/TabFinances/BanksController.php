<?php

namespace App\Http\Controllers\Api\TabFinances;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\Bank;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class BanksController extends Controller
{
    public function card(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Remark', 'SystemDetails',
            'Banks', 'Bank', 'Name', 'CreationDetails',
            'BankNationCode', 'BankSwiftCode',
            'Country', 'CityNameEn', 'City', 'BankName',
            'BankNameEn', 'CodeReasonNumber', 'RegistryNumber', 'CorrespondentBankAccount',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $bank_id = $request->id;

        if($bank_id == "new")
            $bank = Bank::getNewObject();
        else
            $bank = Bank::query()
                ->where("id", $bank_id)->with("country")->get()->first()->toArray();


        $countires = Country::select('id', 'country_name')->get()->toarray();

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
                                'title' => $getArrayCaptions['BankName']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'bank_name', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['BankNameEn']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'bank_name_en', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title'        => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,
                                'model'        => 'country_id', 'type' => 'vue-select', 'width' => '30%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "Countries",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "country_name",
                                    "search"              => ""
                                ],
                                'zone'         => '1',
                                'order'        => '3'
                            ],
                            [
                                'title' => $getArrayCaptions['BankNationCode']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'bank_nation_code', 'width' => '20%', 'type' => 'text',
                                'zone'  => '1', 'order' => '4', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['RegistryNumber']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'registry_number', 'width' => '25%', 'type' => 'text',
                                'zone'  => '1', 'order' => '5'
                            ],
                            [
                                'title' => $getArrayCaptions['CodeReasonNumber']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'code_reason_number', 'width' => '25%', 'type' => 'text',
                                'zone'  => '1', 'order' => '6'
                            ],
                            [
                                'title' => $getArrayCaptions['City']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'city_name', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '7'
                            ],
                            [
                                'title' => $getArrayCaptions['CorrespondentBankAccount']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'bank_corr_account', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '8', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['CityNameEn']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'city_name_en', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '9'
                            ],
                            [
                                'title' => $getArrayCaptions['BankSwiftCode']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'bank_swift_code', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '10'
                            ],
                            [
                                'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias, 'model' => 'bank_remark', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '11'
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
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
        }


        $card = [
            "main_data_models" => [
                $controller->controller_alias => [$bank],
            ],
            "add_data_models"  => [
                "Countries" => $countires,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Bank']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $bank["bank_name"],
                "form_type_list"                => [
                    "form_card_url" => "banks",
                ],
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "tabs"             => $tabs
        ];

        return response()->json($card);


    }

    public
    function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Remark', 'SystemDetails',
            'Banks', 'Bank', 'Name',
            'BankNationCode', 'BankSwiftCode',
            'Country', 'CityNameEn', 'City', 'BankName',
            'BankNameEn', 'CodeReasonNumber', 'RegistryNumber', 'CorrespondentBankAccount',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        $Banks = Bank::with('country')->get()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();


        $list = [
            "main_data_models" => [
                $controller->controller_alias => $Banks,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Banks']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/banks/",
                    "form_search_field" => "bank_name",
                ],
            ],
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
                                    'key'     => 'bank_name', 'sortable' => true, 'class' => 'bank_name',
                                    'label'   => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%', "zone" => "1", "order" => "2"
                                ],
                                [
                                    'key'     => 'bank_nation_code', 'sortable' => true, 'class' => 'bank_nation_code',
                                    'label'   => $getArrayCaptions['BankNationCode']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 21%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => 'bank_swift_code', 'sortable' => true, 'class' => 'bank_swift_code',
                                    'label'   => $getArrayCaptions['BankSwiftCode']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 17%', "zone" => "1", "order" => "4"
                                ],
                                [
                                    'key'     => "['country']['country_name']", 'sortable' => true, 'class' => 'country_name',
                                    'label'   => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 18%', "zone" => "1", "order" => "5"
                                ],
                                [
                                    'key'     => "city_name", 'sortable' => true, 'class' => 'city_name',
                                    'label'   => $getArrayCaptions['City']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 18%', "zone" => "1", "order" => "5"
                                ],
                            ]
                        ]
                    ]
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
        ];
        return response()->json($list);
    }

    public function update(Request $request)
    {
        $model = $request->Banks[0];
        return Bank::where('id', $model['id'])->update([
            'bank_name'          => $model['bank_name'],
            'bank_name_en'       => $model['bank_name_en'],
            'registry_number'    => $model['registry_number'],
            'bank_swift_code'    => $model['bank_swift_code'],
            'bank_nation_code'   => $model['bank_nation_code'],
            'bank_corr_account'  => $model['bank_corr_account'],
            'code_reason_number' => $model['code_reason_number'],
            'country_id'         => $model['country_id'],
            'city_name'          => $model['city_name'],
            'city_name_en'       => $model['city_name_en'],
            'bank_remark'        => $model['bank_remark'],
            'updated_by'         => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
