<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\CalculationParameterAnswerList;
use App\Models\CalculationParameterType;
use App\Models\CalculationTemplateParameterSetting;
use App\Models\Caption;
use App\Models\ExtensionOneAdditionalDetail;
use App\Models\ONE\OneAdditionalDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ExtensionOneAdditionalDetailsController extends Controller
{
    use HasList, HasCard;

    /**
     * @var integer
     */
    private $card_model_id;

    public function list(Request $request){}

    public function setCardCaptions() : self
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back', 'Main',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy','cardCode', 'ExtensionOneAdditionalDetail', 'new',
            'CalculationParameterType', 'Actual', 'Actions', 'Value', 'LeasingSubject',
            'DeleteMark', 'ActiveL'
        ];

        $this->translateCardCaptions();

        return $this;
    }

    public function cardQuery() : self
    {
        $request = request();

        $parentModelTable_id = $request->dependent['id'];

        $modelTable = ExtensionOneAdditionalDetail::where('one_add_detail_id', $parentModelTable_id)->get()->toArray();

        if (count($modelTable) == 0) {
            $modelTable = ExtensionOneAdditionalDetail::getNewObject();
            $modelTable['one_add_detail_id'] = $parentModelTable_id;
            $this->card_model = [$modelTable];
            $this->cardAdditionalQuery($this->card_model);
        }
        else {
            $this->card_model = $modelTable;
            $this->cardAdditionalQuery($this->card_model);
        }

        $this->card_model_id = $this->card_model[0]['id'];

        return $this;
    }

    public function setCardAddDataModels() : self
    {
        $CalculationParameterTypes = CalculationParameterType::select('id', 'calculation_parameter_type_name')->get()->toArray();

        $this->card_add_data_models["CalculationParameterTypes"] = $CalculationParameterTypes;

        return $this;
    }

    public function setCardMainDataModels() : self
    {
        if (!isset($this->card_main_data_models["CalculationParameterAnswerList"]))
            $this->card_main_data_models["CalculationParameterAnswerList"] = CalculationParameterAnswerList::where('extension_one_additional_detail_id', $this->card_model_id)->get()->toArray();

        return $this;
    }

    public function setCardBlockFields() : self
    {
        $this->card_block_fields = [
            [
                "tab_title"       => $this->getTranslatedCardCaption('Main'),
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title' => $this->getTranslatedCardCaption('cardCode'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'one_additional_detail_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone'  => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('CalculationParameterType'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'calculation_parameter_type_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "CalculationParameterTypes",
                                    "options_field_id" => "id",
                                    "options_field_title" => "calculation_parameter_type_name",
                                    "search" => ""
                                ],
                                'zone'  => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Actual'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'actual_l',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'zone'  => '1',
                                'order' => '3'
                            ],
                            [
                                'title' => "Список значений",//$this->getTranslatedCardCaption('Actual'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'answer_list_l',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'perform_action' => true,
                                'action_link' => '/admin/extension/one/additional/detail/fields',
                                'zone'  => '1',
                                'order' => '4'
                            ],
                        ]
                    ],
                ]
            ]
        ];

        if ($this->card_model[0]['answer_list_l'] == true)
        {
            $this->card_block_fields[0]['blocks_quantity']++;

            $emptyListValue = CalculationParameterAnswerList::getNewObject();
            $emptyListValue['extension_one_additional_detail_id'] = $this->card_model_id;

            array_push($this->card_block_fields[0]['blocks'], [
                "block_zone_quantity" => 1,
                "block_model"         => "CalculationParameterAnswerList",
                'list_width'          => '100%',
                "block_type"          => "block_list_base",
                "block_parameters"    => [
                    "prevent_list_click" => true,
                    "edit_values" => true,
                    "edit_mode" => 'inline',
                    "empty_row" => $emptyListValue,
                    "hide_pagination" => true,
                    "hide_search" => true,
                ],
                "block_fields"        => [
//                            [
//                                'key' => 'number',
//                                'edit' => true,
//                                "filter" => true,
//                                "sortable" => true,
//                                'type' => 'label',
//                                'typeVal' => 'number',
//                                'class' => '',
//                                "label" => '№',//$this->getTranslatedCardCaption('Number'),
//                                'thStyle' => 'width: 6%',
//                                "zone" => "1",
//                                "order" => "1"
//                            ],
                    [
                        'key' => 'calculation_parameter_value',
                        'edit' => true,
                        "filter" => true,
                        "sortable" => true,
                        'type' => 'label',
                        'typeVal' => 'string',
                        'class' => '',
                        "label" => $this->getTranslatedCardCaption('Value'),
                        'thStyle' => 'width: 70%',
                        "order" => "1"
                    ],
                    [
                        'key' => 'active_l',
                        'edit' => true,
                        "filter" => true,
                        "sortable" => true,
                        'type' => 'checkbox',
                        'class' => '',
                        "label" => $this->getTranslatedCardCaption('ActiveL'),
                        'thStyle' => 'width: 10%',
                        "order" => "2"
                    ],
                    [
                        'key' => 'deleted_l',
                        'edit' => true,
                        "filter" => true,
                        "sortable" => true,
                        'type' => 'checkbox',
                        'class' => '',
                        "label" => $this->getTranslatedCardCaption('DeleteMark'),
                        'thStyle' => 'width: 10%',
                        "order" => "3"
                    ],
                    [
                        'key' => 'edit_table_actions',
                        'actions' => ['edit','delete'],
                        "label" => $this->getTranslatedCardCaption('Actions'),
                        'thStyle' => 'width: 10%',
                        'order' => '4',
                    ]
                ]
            ]);
        }

        return $this;
    }

//    public function getCardBlockFields() : array
//    {
//        if ($this->card_model[0]['answer_list_l'] == true)
//        {
//            $this->card_block_fields[0]['blocks_quantity']++;
//
//            array_push($this->card_block_fields[0]['blocks'], [
//                "block_zone_quantity" => 1,
//                "block_model"         => "CalculationParameterAnswerList",
//                "block_width"         => "100%",
//                "block_type"          => "block_list_base",
//                "block_parameters"    => [
//                    "prevent_list_click" => true,
//                    "edit_values" => true,
//                    "edit_mode" => 'inline',
//                    "empty_row" => null,
//                    "hide_pagination" => true,
//                    "hide_search" => true,
//                ],
//                "block_fields"        => [
////                            [
////                                'key' => 'number',
////                                'edit' => true,
////                                "filter" => true,
////                                "sortable" => true,
////                                'type' => 'label',
////                                'typeVal' => 'number',
////                                'class' => '',
////                                "label" => '№',//$this->getTranslatedCardCaption('Number'),
////                                'thStyle' => 'width: 6%',
////                                "zone" => "1",
////                                "order" => "1"
////                            ],
//                    [
//                        'key' => 'calculation_parameter_value',
//                        'edit' => true,
//                        "filter" => true,
//                        "sortable" => true,
//                        'type' => 'label',
//                        'typeVal' => 'string',
//                        'class' => '',
//                        "label" => $this->getTranslatedCardCaption('Value'),
//                        'thStyle' => 'width: 90%',
//                        "order" => "1"
//                    ],
//                    [
//                        'key' => 'edit_table_actions',
//                        'actions' => ['edit','delete'],
//                        "label" => $this->getTranslatedCardCaption('Actions'),
//                        'thStyle' => 'width: 10%',
//                        'order' => '2',
//                    ]
//                ]
//            ]);
//        }
//        else
//        {
//            $this->card_block_fields[0]['blocks_quantity']--;
//
//            array_pop($this->card_block_fields[0]['blocks']);
//        }
//
//        return $this->card_block_fields;
//    }

    public function setCardFormTitle() : self
    {
        $this->card_form_title = 'ExtensionOneAdditionalDetail';

        return $this;
    }

    public function getCardSets()
    {
        $sets = $this->getButtonsList($this->getCardSetsList());

        return $sets;
    }

    public function setCardMainDataModelName() : self
    {
        $this->card_main_data_model_name = $this->card_model_id == null ? $this->getTranslatedCardCaption('new') : $this->getTranslatedCardCaption('LeasingSubject');

        return $this;
    }

    public function cardold(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy','cardCode', 'ExtensionOneAdditionalDetail', 'new',
            'CalculationParameterType', 'Actual', 'Actions', 'Value', 'LeasingSubject'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $parentModelTable_id = $request->dependent['id'];

        $parentModel = OneAdditionalDetail::where('id', $parentModelTable_id)->get()->toArray();

        if(count($parentModel) == 0) {
            return abort('403');

        }

        $modelTable = ExtensionOneAdditionalDetail::where('one_add_detail_id', $parentModelTable_id)->get()->toArray();

        if (count($modelTable) == 0) {
            $modelTable = ExtensionOneAdditionalDetail::getNewObject();
            $modelTable['one_add_detail_id'] = $parentModelTable_id;
            $modelTable = [$modelTable];
            $modelTable_id = null;
        }
        else {
            $modelTable_id = $modelTable[0]['id'];
        }

        $CalculationParameterTypes = CalculationParameterType::select('id', 'calculation_parameter_type_name')->get()->toArray();
        $answerListTable = CalculationParameterAnswerList::where('extension_one_additional_detail_id', $modelTable_id)->get()->toArray();
        $newAnswerValue = CalculationParameterAnswerList::getNewObject();
        $newAnswerValue['extension_one_additional_detail_id'] = $modelTable_id;

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];

        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $tabs = [

        ];

        if($formShowParam['show_system_tab'])
        {
            $tabs[] = [
                "tab_title"       => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "3"
                            ],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "4"
                            ],
                        ]
                    ]
                ]
            ];
        }

        $card = [
            "main_data_models" => [
                $controller->controller_alias => $modelTable,
                "CalculationParameterAnswerList" => $answerListTable,
            ],
            "add_data_models" => [
                'CalculationParameterTypes' => $CalculationParameterTypes,
            ],
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['ExtensionOneAdditionalDetail']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'],
                "form_type_list"                => [

                    "form_list_url" => "/be/route",
                ],
            ],
            "sets" => $this->getButtonsList(["card_actions"]),
            "tabs" => $tabs
        ];

        return response()->json($card);
    }

    public function getFields(Request $request){
        $this->card_controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $main_data_models = $request->get("main_data_models");

        $main_model = $main_data_models[$this->card_controller_alias];

        $this->card_model = $main_model;
        $this->card_add_data_models = [];

        // Обновление main_data_models
        $main_data_models[$this->card_controller_alias] = $this->card_model;

        $this->card_main_data_models = $main_data_models;

        $this->card_model_id = $main_model[0]["id"];

        $this->setCardCaptions()
            ->setCardMainDataModels()
            ->setCardAddDataModels()
            ->setCardBlockFields()
            ->setCardSystemTab();

        $data = [
            "tabs" => $this->getCardBlockFields(),
            "main_data_models" => $request->get("main_data_models"),
        ];

        return $data;
    }

}
