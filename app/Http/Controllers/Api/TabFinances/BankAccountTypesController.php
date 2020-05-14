<?php

namespace App\Http\Controllers\Api\TabFinances;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\BankAccountType;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class BankAccountTypesController extends Controller
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
            'Remark', 'SystemDetails',
            'BankAccountType', 'BankAccountTypes', 'Name', 'Code',
            'BankAccountTypeName', 'BankAccountTypeCode',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $BankAccountTypes = BankAccountType::all()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $BankAccountTypes,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['BankAccountTypes']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/bankAccountTypes/",
                    "form_search_field" => "bank_account_type_name",
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
                                    'key'     => 'bank_account_type_name', 'sortable' => true, 'class' => 'bank_account_type_name',
                                    'label'   => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 32%', "zone" => "1", "order" => "2"
                                ],
                                [
                                    'key'     => 'bank_account_type_code', 'sortable' => true, 'class' => 'bank_account_type_code',
                                    'label'   => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 31%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => 'bank_account_type_remark', 'sortable' => true, 'class' => 'bank_account_type_remark',
                                    'label'   => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 31%', "zone" => "1", "order" => "4"
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
            'BankAccountType', 'BankAccountTypes', 'Name', 'Code',
            'BankAccountTypeName', 'BankAccountTypeCode',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $bank_account_type_id = $request->id;

        if($bank_account_type_id == "new")
            $bank_account_type = BankAccountType::getNewObject();
        else
            $bank_account_type = BankAccountType::query()
                ->where('id', $bank_account_type_id)->get()->first()->toArray();

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
                                'title' => $getArrayCaptions['BankAccountTypeName']['translation_captions']['caption_translation'],
                                'model' => 'bank_account_type_name', 'width' => '60%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['BankAccountTypeCode']['translation_captions']['caption_translation'],
                                'model' => 'bank_account_type_code', 'width' => '40%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                'model' => 'bank_account_type_remark', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '4'
                            ],
                        ]
                    ]
                ]
            ],
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
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
        }


        $card = [
            "main_data_models" => [
                $controller->controller_alias => [$bank_account_type],
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['BankAccountType']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $bank_account_type['bank_account_type_name'],
                "form_type_list"                => [
                    "form_card_url" => "banks",
                ],
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "tabs"             => $tabs
        ];
        return response()->json($card);
    }

    public function update(Request $request)
    {
        $model = $request->BankAccountTypes[0];
        return BankAccountType::where('id', $model['id'])->update([
            'bank_account_type_name'   => $model['bank_account_type_name'],
            'bank_account_type_code'   => $model['bank_account_type_code'],
            'bank_account_type_remark' => $model['bank_account_type_remark'],
            'updated_by'               => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
