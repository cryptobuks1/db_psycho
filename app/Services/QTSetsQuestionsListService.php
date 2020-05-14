<?php


namespace App\Services;


use App\Http\Controllers\Api\Controller;
use App\Models\Contractor;
use App\Models\QuestionnaireTemplates\QTQuestionAnswerList;
use App\Models\QuestionnaireTemplates\QTQuestionKind;
use App\Models\QuestionnaireTemplates\QTScenario;
use App\Models\QuestionnaireTemplates\QTSet;
use App\Models\QuestionnaireTemplates\QTSetsQuestionsList;

class QTSetsQuestionsListService
{
    /**
     * array
     */
    protected $tabs;

    /**
     * @var array
     */
    protected $main_data_models;

    /**
     * @var array
     */
    protected $main_model;

    /**
     * @var array
     */
    protected $add_data_models = [];

    /**
     * QTSetsQuestionsListService constructor.
     * @param array $main_data_models
     * @param array $main_model
     */
    public function __construct($main_data_models, $main_model)
    {
        $this->main_data_models = $main_data_models;
        $this->main_model = $main_model;

        $this->loadAddDataModels();
    }

    private function loadAddDataModels()
    {
        $question_kinds = QTQuestionKind::all('id', 'question_kind_name');
        $scenarios = QTScenario::all('id', 'scenario_name');
        $qt_question_answer_list = QTQuestionAnswerList::where('qt_question_kind_id', $this->main_model['qt_question_kind_id'])->get()->toArray();
        $current_set = QTSet::select('qt_block_id', 'id')->where('id', $this->main_model['qt_set_id'])->get()->first()->toArray();
        $sets = QTSet::where('id', '!=', $current_set['id'])->where('qt_block_id', $current_set['qt_block_id'])->get()->toArray();
        $this->add_data_models = [
            'QTQuestionKinds' => $question_kinds,
            'QTScenarios' => $scenarios,
            'QTQuestionAnswerList' => $qt_question_answer_list,
            'Models' => [
                ['model_name' => 'Set', 'id' => 1, 'table_n' => 1, 'model_code' => 'QTSets', 'field_title' => 'question_set_name'],
                ['model_name' => 'Question', 'id' => 2, 'table_n' => 2, 'model_code' => 'QTSetsQuestionsList', 'field_title' => 'question_name']
            ],
            'QTSets' => $sets,
            'QTSetsQuestionsList' => QTSetsQuestionsList::all('id', 'question_name'),//todo дописать проверку, чтобы выбирать вопросы только из данного блока
        ];
    }


    public function getCardTabs()
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Database',
            'DBList', 'DatabaseType',
            'ServerTableServerName', 'ServerTableServerIP',
            'DatabaseServers', 'ServerTableServerIP',
            'ServerTableServerUrl', 'Server', 'CreationDetails', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'CreationInfo',
            'SystemDetails', 'Port', 'SecureConnection', 'number'

        ];

        $getArrayCaptions = (new Controller())->getTranslateByKeys($captionName);

        $mainModel = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $this->tabs = [
            0 => [
                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "show_condition" => function ($current_tab) {
                    return count($current_tab["blocks"]) > 0;
                },
                "blocks" => [
                    [
                        "block_title" => 'block title',
                        "block_zone_quantity" => 1,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "show_condition" => function ($current_block) {
                            return count($current_block["block_fields"]) > 0;
                        },
                        "block_fields" => [
                            [
                                'title' => "Имя вопроса [перевод]",
                                'model' => 'question_name',
                                'model_name' => $mainModel,
                                'width' => '25%', 'type' => 'text',
                                'order_zone' => '3', 'zone' => '1',
                                'default_view_l' => true,
                                'order' => '3'
                            ],

                            [
                                'title' => 'Вид вопроса [перевод]',
                                'model' => 'qt_question_kind_id',
                                'model_name' => $mainModel,
                                'type' => 'vue-select',
                                'width' => '25%',
                                'perform_action' => true,
                                'action_link' => '/admin/qt/sets/questions/list/fields',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "QTQuestionKinds",
                                    "options_field_id" => "id",
                                    "options_field_title" => "question_kind_name",
                                    "search" => ""
                                ],
                                "zone" => "1",
                                "order" => "3",

                                'default_view_l' => true,
                                "border_right" => false

                            ],

//                            [
//                                'title'        => 'Contractors',
//                                'model'        => 'test_id',
//                                'model_name'   => $mainModel,
//                                'type'         => 'vue-select',
//                                'width'        => '25%',
//                                'options'      => [],
//                                "options_data" => [
//                                    "options_data_model"  => "Contractors",
//                                    "options_field_id"    => "id",
//                                    "options_field_title" => "contractor_short_name",
//                                    "search"              => ""
//                                ],
//                                "zone"         => "1",
//                                "order"        => "3",
//
//                                'default_view_l' => false,
////                                "show_condition" => function($current_field)
////                                {
////                                    if($this->main_model["qt_question_kind_id"] === 3)
////                                    {
////                                        $this->add_data_models["Contractors"] = Contractor::all(["id", "contractor_short_name"]);
////                                        return true;
////                                    }
////                                },
//                                "border_right"   => false
//
//                            ],

                            [
                                'title' => "Код вопроса [перевод]",
                                'model' => 'question_code',
                                'model_name' => $mainModel,
                                'width' => '25%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '4',
                                'default_view_l' => true,
                            ],
                            [
                                'title' => 'Имя сета [перевод]',
                                'model' => 'qt_set_name',
                                'model_name' => $mainModel,
                                'width' => '25%', 'type' => 'text',
                                'order_zone' => '2', 'zone' => '1',
                                'default_view_l' => true,
                                'order' => '2'
                            ],
                            [
                                'title' => "Порядок [перевод]",
                                'model' => 'line_n',
                                'model_name' => $mainModel,
                                'width' => '25%', 'type' => 'text',
                                'order_zone' => '3', 'zone' => '1',
                                'default_view_l' => true,
                                'order' => '3'
                            ],
                            [
                                'title' => "Перевод [перевод]",
                                'model' => 'caption_code',
                                'model_name' => $mainModel,
                                'width' => '25%', 'type' => 'text',
                                'order_zone' => '3', 'zone' => '1',
                                'default_view_l' => true,
                                'order' => '3'
                            ],


                        ]
                    ],
                    [
                        "block_title" => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model" => "QTAnswerScenarios",
                        "block_type" => "block_list_base",
                        'list_width' => '100%',

                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => [
                                "id" => null,
                                "select" => null,
                                "text" => null
                            ],
                        ],
                        "show_name" => false,
                        "block_fields" => [
                            [
                                'key' => 'qt_question_answer_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => 'Вариант ответа',
                                'thStyle' => 'width: 10%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "QTQuestionAnswerList",
                                    "options_field_id" => "id",
                                    "options_field_title" => "question_answer_value",
                                    "search" => ""
                                ],
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'table_n',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => 'Модель',
                                'thStyle' => 'width: 10%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Models",
                                    "options_field_id" => "id",
                                    "options_field_title" => "model_name",
                                    "search" => ""
                                ],
                                "dependent_data" => [
                                    "supreme" => true,
                                    "supreme_field_key" => "row_id",
                                ],
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'row_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => 'Элемент',
                                'thStyle' => 'width: 10%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "QTSets",
                                    "options_field_id" => "id",
                                    "options_field_title" => "question_set_name",
                                    "search" => ""
                                ],
                                "dependent_data" => [
                                    "dependent" => true,
                                    "change_add_data_model" => true,
                                    "dependent_field" => 'table_n',

                                ],
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'qt_scenario_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => 'Сценарий',
                                'thStyle' => 'width: 10%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "QTScenarios",
                                    "options_field_id" => "id",
                                    "options_field_title" => "scenario_name",
                                    "search" => ""
                                ],
                                "validation" => ["required" => true]
                            ],

                        ]
                    ]
                ]
            ],
            1 => [
                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "show_condition" => function ($current_tab) {
                    //                    return false;
                    return count($current_tab["blocks"]) > 0;
                },
                "blocks" => [
                    [
                        "block_title" => "Block1",
                        "block_zone_quantity" => 2,

                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "show_condition" => function ($current_block) {
                            return count($current_block["block_fields"]) > 0;
                        },
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ]
        ];

        $data = [
            "tabs" => array_values(array_filter(array_map(function ($tab) {
                $tab["blocks"] = array_filter(array_map(function ($block) {
                    $block["block_fields"] = array_values(array_filter($block["block_fields"], function ($block_field) {
                        if (!isset($block_field["show_condition"]))
                            return true;

                        return $block_field["show_condition"]($block_field) === true;
                    }));

                    return $block["show_condition"]($block) === true ? $block : null;
                }, $tab["blocks"]));

                return $tab["show_condition"]($tab) === true ? $tab : null;
            }, $this->tabs)))
        ];

        if (!is_null($this->add_data_models) && !empty($this->add_data_models)) {
            $data["add_data_models"] = $this->add_data_models;
        }
        if (!is_null($this->main_data_models) && !empty($this->main_data_models)) {
            $data["main_data_models"] = $this->main_data_models;
        }


        return $data;
    }

}
