<?php

namespace App\Http\Controllers\Api\QuestionnaireTemplates;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Models\Caption;
use App\Models\ModelTables;
use App\Models\QuestionnaireTemplates\QTQuestionAnswerList;
use App\Models\QuestionnaireTemplates\QTQuestionKind;
use App\Models\QuestionnaireTemplates\QTQuestionTable;
use App\Models\QuestionnaireTemplates\QTQuestionTableAttribute;
use App\Models\QuestionnaireTemplates\QTQuestionType;
use App\Models\QuestionnaireTemplates\QTQuestionValidationRule;
use App\Models\QuestionnaireTemplates\QTValidationRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class QTQuestionKindsController extends Controller
{
    use HasCard;


    /**
     * @var \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    private $question_type;

    /**
     * @var string
     */
    private $options_data_model;
    /**
     * @var \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    private $model_table;

    /**
     * @var bool
     */
    private $question_type_table;

    /**
     * @var QTQuestionKind
     */
    private $card_model_from_db;

    /**
     * @var int
     */
    private $kind_id;

    /**
     * @var bool
     */
    private $transaction_started;


    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'QTQuestionKinds', 'Code', 'Name',
            'ActiveL', 'DeleteMark',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $QTQuestionKinds = DB::table('QTQuestionKinds')->select('id', 'question_kind_name', 'question_kind_code', 'active_l', 'deleted_l')->get()->toArray();

        $QTQuestionKinds = json_decode(json_encode($QTQuestionKinds), true);

        $list = [
            "main_data_models" => [
                $mainModel => $QTQuestionKinds,
            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['QTQuestionKinds']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line" => true,
                "form_type_list" => [
                    "form_card_url" => "QTQuestionKind",
                    "form_search_field" => "",
                ],
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                [
                                    'key' => 'actions', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                [
                                    'key' => 'deleted_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['DeleteMark']['translation_captions']['caption_translation'],
                                    'class' => 'question_kind_name',
                                    'thStyle' => 'width: 11%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'active_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['ActiveL']['translation_captions']['caption_translation'],
                                    'class' => 'question_kind_name',
                                    'thStyle' => 'width: 11%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => 'question_kind_name',
                                    'sortable' => true,
                                    'class' => 'question_kind_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => 'question_kind_code',
                                    'sortable' => true,
                                    'class' => 'question_kind_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "5"
                                ]
                            ]
                        ]
                    ],
                ]
            ]
        ];

        return response()->json($list);

    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back', 'Main',
            'QTQuestionKind', 'Code', 'Name',
            'ActiveL', 'DeletedL',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'new', 'SystemDetails',
            'QuestionType', 'Caption', 'QuestionAnswersOptions', 'SelectAll',
            'SelectOptionsFromDirectory', 'TabularPart', 'PossibleAnswer',
            'QuestionName', 'QuestionCode', 'QuestionWidth', 'Required',
            'TableColumns', 'ValidationsRules'
        ];

        $this->translateCardCaptions();

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();

        $kind_id = $request->get("id");

        $this->setIsNewObject($kind_id === "new");

        if ($this->isNewObject()) {
            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if ($access === false) {
                return abort('403');
            }
            $this->card_model = [QTQuestionKind::getNewObject()];

            $this->cardAdditionalQuery($this->card_model);
        } else {
            $this->card_model = QTQuestionKind::query()
                ->where('id', $request->id);

            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->get()->toArray();
        }

        return $this;
    }

    public function setCardBlockFields(): self
    {
        $this->card_block_fields = [
            [
                "tab_title" => $this->getTranslatedCardCaption("Main"),
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model" => $this->card_controller_alias,
                        "block_type" => "block_card",
                        "block_fields" => [
                            [
                                'title' => $this->getTranslatedCardCaption("Name"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'question_kind_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption("Code"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'question_kind_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption("Caption"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'caption_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '3'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption("QuestionType"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'qt_question_type_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'perform_action' => true,
                                'action_link' => '/admin/qt/question/kind/fields',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "QTQuestionTypes",
                                    "options_field_id" => "id",
                                    "options_field_title" => "question_type_name",
                                    "search" => ""
                                ],
                                'zone' => '1',
                                'order' => '4'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption("QuestionAnswersOptions"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'use_answer_list_l',
                                'type' => 'radiobuttons',
                                'width' => '100%',
                                "zone" => "1",
                                "order" => "5",
                                "border_right" => false,
                                'perform_action' => true,
                                'action_link' => '/admin/qt/question/kind/fields',
                                "show_condition" => function ($current_field) {
                                    $this->question_type = QTQuestionType::query()
                                        ->find($this->card_model[0]["qt_question_type_id"]);

                                    if (!$this->question_type)
                                        return false;

                                    if ($this->question_type->getAttribute("reference_l") === true) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                },
                                //                                "additional" => [
                                //                                    "title" => "Прочее, указать",
                                //                                    "type" => "text",
                                //                                    "mask" => "XX/XX/X/XX",
                                //                                    "validation" => ["min" => 4]
                                //
                                //                                ],
                                "display" => 'vertical', // horizontal,vertical
                                "options" => [
                                    "view" => "radio", // radio,checkbox
                                    "direction" => "vertical", // horizontal,vertical
                                ],
                                "list" => [
                                    ['name' => $this->getTranslatedCardCaption("SelectAll"), 'title' => $this->getTranslatedCardCaption("SelectAll"), 'value' => false],
                                    ['name' => $this->getTranslatedCardCaption("SelectOptionsFromDirectory"), 'title' => $this->getTranslatedCardCaption("SelectOptionsFromDirectory"), 'value' => true],
                                ]
                            ]
                        ]
                    ],
                    [
                        "block_title" => $this->getTranslatedCardCaption("TabularPart"),
                        "block_zone_quantity" => 1,
                        "block_model" => "QTQuestionAnswerList",
                        "block_type" => "block_list_base",
                        //                        'list_width'          => '100%',
                        "show_condition" => function (&$current_block) {
                            if (!$this->question_type)
                                return false;

                            if (in_array($this->question_type->question_type_code, ['select', 'radio'])) {

                                if (is_null($this->card_model_from_db)) {
                                    $this->card_main_data_models["QTQuestionAnswerList"] = (!$this->isNewObject())
                                        ? $this->getAnswerList()
                                        : QTQuestionAnswerList::getNewObject();
                                } else {
                                    if ($this->card_model[0]["qt_question_type_id"] != $this->card_model_from_db->qt_question_type_id) {
                                        $this->card_main_data_models["QTQuestionAnswerList"] = [];
                                    } else {
                                        $this->card_main_data_models["QTQuestionAnswerList"] = $this->getAnswerList();
                                    }
                                }
                                $current_block["block_parameters"]["empty_row"] = QTQuestionAnswerList::getNewObject();

                                if (!$this->isNewObject())
                                    $current_block["block_parameters"]["empty_row"]["qt_question_kind_id"] = $this->card_model[0]["id"];

                                return true;
                            } else
                                return false;
                        },
                        "block_parameters" => [
                            "prevent_list_click" => true,
                            'hide_search' => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => null,
                            "hide_pagination" => true
                        ],
                        "show_name" => false,
                        "block_fields" => [
                            //                            [
                            //                                'key'          => 'select',
                            //                                'edit'         => true,
                            //                                "filter"       => true,
                            //                                "sortable"     => true,
                            //                                'type'         => 'select',
                            //                                "label"        => 'Вид ПЛ',
                            //                                'thStyle'      => 'width: 10%',
                            //                                'options'      => [],
                            //                                "options_data" => [
                            //                                    "options_data_model"  => "TestTable",
                            //                                    "options_field_id"    => "id",
                            //                                    "options_field_title" => "title",
                            //                                    "search"              => ""
                            //                                ],
                            //                                "validation"   => ["required" => true]
                            //                            ],
                            [
                                'key' => 'question_answer_value',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                'typeVal' => 'text',
                                "label" => $this->getTranslatedCardCaption("PossibleAnswer"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                        ]
                    ],
                    [
                        "block_title" => $this->getTranslatedCardCaption("TabularPart"),
                        "block_zone_quantity" => 1,
                        "block_model" => "QTQuestionAnswerList",
                        "block_type" => "block_list_base",
                        //                        'list_width'          => '100%',
                        "show_condition" => function (&$current_block) {
                            if (!$this->question_type)
                                return false;

                            if ($this->question_type->getAttribute("reference_l") === true && $this->card_model[0]["use_answer_list_l"] === true) {
                                $table_n = $this->question_type->getAttribute("table_n");

                                $model_table = ModelTables::query()
                                    ->where("table_n", $table_n)
                                    ->with("controller")
                                    ->first();

                                $this->model_table = $model_table;

                                $table_code = $model_table->table_code;
                                $table_folder = $model_table->table_folder;

                                $model = \App::make("\App{$table_folder}\\{$table_code}");

                                if (is_null($this->card_model_from_db)) {
                                    $this->card_main_data_models["QTQuestionAnswerList"] = (!$this->isNewObject())
                                        ? $this->getAnswerList()
                                        : QTQuestionAnswerList::getNewObject();
                                } else {
                                    if ($this->card_model[0]["qt_question_type_id"] != $this->card_model_from_db->qt_question_type_id) {
                                        $this->card_main_data_models["QTQuestionAnswerList"] = [];
                                    } else {
                                        $this->card_main_data_models["QTQuestionAnswerList"] = $this->getAnswerList();
                                    }
                                }

                                $this->card_add_data_models[$model_table->controller->controller_alias] = $model::all(["id", $model_table->table_output_template]);


                                $current_block["block_parameters"]["empty_row"] = QTQuestionAnswerList::getNewObject();

                                if (!$this->isNewObject())
                                    $current_block["block_parameters"]["empty_row"]["qt_question_kind_id"] = $this->card_model[0]["id"];

                                $current_block["block_fields"][0]["options_data"]["options_data_model"] = $model_table->controller->controller_alias;
                                $current_block["block_fields"][0]["options_data"]["options_field_title"] = $model_table->table_output_template;

                                return true;
                            } else
                                return false;
                        },
                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => null,
                            "hide_pagination" => true
                        ],
                        "show_name" => false,
                        "block_fields" => [
                            [
                                'key' => 'question_answer_value',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => $this->getTranslatedCardCaption("PossibleAnswer"),
                                'thStyle' => 'width: 10%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => null,
                                    "options_field_id" => "id",
                                    "options_field_title" => null,
                                    "search" => ""
                                ],
                                "validation" => ["required" => true]
                            ],
                        ]
                    ],
                    [
                        "block_zone_quantity" => 1,
                        "block_model" => "QTQuestionTables",
                        "block_type" => "block_card",
                        "show_condition" => function ($current_block) {
                            if (!$this->question_type)
                                return false;

                            if ($this->question_type->question_type_code === "table") {
                                $this->question_type_table = true;
                                $question_table = QTQuestionTable::query()->where([
                                    "qt_question_kind_id" => $this->card_model[0]["id"]
                                ])
                                    ->get();

                                $question_table_new = QTQuestionTable::getNewObject();

                                if (!is_null($this->card_model[0]["id"]))
                                    $question_table_new["qt_question_kind_id"] = $this->card_model[0]["id"];

                                $this->card_main_data_models["QTQuestionTables"] = $question_table->count() > 0 ? $question_table : [$question_table_new];


                                // TODO пока что скрыл таблицу, в будущем убрать return false
                                return false;

                                return true;
                            } else {
                                $this->question_type_table = false;
                                return false;
                            }
                        },
                        "block_fields" => [
                            [
                                'title' => $this->getTranslatedCardCaption("TabularPart"),
                                'model_name' => 'QTQuestionTables',
                                'model' => '',
                                'width' => '100%',
                                'type' => 'title',
                                'zone' => '1',
                                'order' => '20'
                            ],
                            [
                                'title' => "default_lines_quantity",
                                'model_name' => "QTQuestionTables",
                                'model' => 'default_lines_quantity',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '21'
                            ],
                            [
                                'title' => "allow_appending",
                                'model_name' => "QTQuestionTables",
                                'model' => 'allow_appending',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'zone' => '1',
                                'order' => '22'
                            ],
                            [
                                'title' => "view_table_in_set_l",
                                'model_name' => "QTQuestionTables",
                                'model' => 'view_table_in_set_l',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'zone' => '1',
                                'order' => '23'
                            ]
                        ]
                    ],
                    [
                        "block_title" => $this->getTranslatedCardCaption("ValidationsRules"),
                        "block_zone_quantity" => 1,
                        "block_model" => "QTQuestionValidationRules",
                        "block_type" => "block_list_base",
//                        'list_width' => '100%',
                        "show_condition" => function (&$current_block) {
                            if (!$this->question_type)
                                return false;

                            if ($this->question_type->getAttribute("question_type_code") === "text") {
                                $this->card_main_data_models['QTQuestionValidationRules'] = QTQuestionValidationRule::where('qt_question_kind_id', $this->card_model[0]['id'])->get()->toArray();
                                $empty_row = QTQuestionValidationRule::getNewObject();
                                $empty_row['qt_question_kind_id'] = $this->card_model[0]['id'];
                                $current_block['block_parameters']['empty_row'] = $empty_row;
                                return true;
                            } else
                                return false;
                        },
                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => null,
                            "hide_pagination" => true,
                            "hide_search" => true
                        ],
                        "show_name" => false,
                        "block_fields" => [
                            [
                                'key' => 'qt_validation_rule_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => $this->getTranslatedCardCaption("ValidationsRules"),
                                'thStyle' => 'width: 10%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => 'QTValidationRules',
                                    "options_field_id" => "id",
                                    "options_field_title" => 'validation_rule_name',
                                    "search" => ""
                                ],
                                "validation" => ["required" => true]
                            ],
                        ]
                    ],
                ]
            ],
            [
                "tab_title" => $this->getTranslatedCardCaption("TableColumns"),
                "blocks_quantity" => 1,
                "show_condition" => function (&$current_tab) {
                    if ($this->question_type_table) {
                        if ($this->card_main_data_models["QTQuestionTables"][0]["id"] === null) {
                            $this->card_main_data_models['QTQuestionTableAttributes'] = [];
                        } else {
                            $this->card_main_data_models['QTQuestionTableAttributes'] = QTQuestionTableAttribute::query()
                                ->where("qt_question_table_id",
                                    $this->card_main_data_models["QTQuestionTables"][0]["id"])->orderBy('line_n')
                                ->get();

                            $current_tab["blocks"][0]["block_parameters"]["empty_row"]["qt_question_table_id"] = $this->card_main_data_models["QTQuestionTables"][0]["id"];
                        }
                        $this->card_add_data_models['QTQuestionKinds'] = QTQuestionKind::query()->whereHas('question_type', function ($query) {
                            $query->where('question_type_code', '<>', 'table');
                        })->select(["id", "question_kind_name"])->get()->toArray();

                        return true;
                    } else {
                        return false;
                    }
                },
                "blocks" => [
                    [
                        "block_title" => $this->getTranslatedCardCaption("TableColumns"),
                        "block_zone_quantity" => 1,
                        "block_model" => "QTQuestionTableAttributes",
                        "block_type" => "block_list_base",
                        //                        'list_width'          => '100%',

                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => [
                                'id' => null,
                                'qt_question_table_id' => null,
                                'qt_question_kind_id' => null,
                                'line_n' => null,
                                'question_name' => null,
                                'question_code' => null,
                                'question_width' => null,
                                'question_required_l' => false,
                                'caption_code' => null
                            ],
                            "hide_pagination" => true
                        ],
                        "show_name" => false,
                        "block_fields" => [
                            [
                                'key' => 'line_n',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => '№',
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'qt_question_kind_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => $this->getTranslatedCardCaption("QTQuestionKind"),
                                'thStyle' => 'width: 10%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => 'QTQuestionKinds',
                                    "options_field_id" => "id",
                                    "options_field_title" => 'question_kind_name',
                                    "search" => ""
                                ],
                                "validation" => ["required" => true]
                            ],

                            [
                                'key' => 'question_name',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("QuestionName"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'question_code',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("QuestionCode"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'question_width',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("QuestionWidth"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'question_required_l',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Required"),
                                'thStyle' => 'width: 10%',
                            ],
                            [
                                'key' => 'caption_ciode',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Caption"),
                                'thStyle' => 'width: 10%',
                            ],


                        ]
                    ]
                ]
            ],
        ];

        return $this;
    }

    public function getCardBlockFields(): array
    {
        return array_values(array_filter(array_map(function ($tab) {
            $tab["blocks"] = array_values(array_filter(array_map(function ($block) {
                $block["block_fields"] = array_values(array_filter($block["block_fields"], function ($block_field) {
                    if (!isset($block_field["show_condition"]))
                        return true;

                    return $block_field["show_condition"]($block_field) === true;
                }));

                if (!isset($block["show_condition"]))
                    return $block;

                return $block["show_condition"]($block) === true ? $block : null;
            }, $tab["blocks"])));

            if (!isset($tab["show_condition"]))
                return $tab;

            return $tab["show_condition"]($tab) === true ? $tab : null;
        }, $this->card_block_fields)));
    }

    public function setCardAddDataModels(): self
    {
        $question_types = QTQuestionType::all();
        $qt_validation_rules = QTValidationRule::all();

        $this->card_add_data_models = [
            "QTQuestionTypes" => $question_types,
            "QTValidationRules" => $qt_validation_rules
        ];

        return $this;
    }

    //    public function cardold(Request $request)
    //    {
    //        $captionName = [
    //            'ok',
    //            'apply',
    //            'back', 'Main',
    //            'QTQuestionKind', 'Code', 'Name',
    //            'ActiveL', 'DeletedL',
    //            'CreatedAt', 'CreatedBy',
    //            'UpdatedAt', 'UpdatedBy', 'new', 'SystemDetails'
    //        ];
    //
    //        $getArrayCaptions = $this->getTranslateByKeys($captionName);
    //
    //        $model = 'App\Models\Controller';
    //        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
    //            ->value('controller_alias');
    //
    //        $question_types = QTQuestionTypes::all()->toArray();
    //
    //        $nameControllerMethod = [
    //            'controller' => class_basename(Route::current()->controller),
    //            'accessRight' => 'record'
    //        ];
    //        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();
    //
    //        if (strpos($request->id, 'new') !== false) {
    //            $nameControllerMethod = [
    //                'controller' => class_basename(Route::current()->controller),
    //                'method' => 'insert'
    //            ];
    //
    //            $objAccess = (new CheckController($nameControllerMethod));
    //            $access = $objAccess->checkControllerAccessRight();
    //
    //            if ($access === false) {
    //                return abort('403');
    //            }
    //            $QTQuestionKind = [QTQuestionKind::getNewObject()];
    //        } else {
    //
    //            $QTQuestionKind = QTQuestionKind::where('id', $request->id)->first()->toArray();
    //
    //            $QTQuestionKind = [$QTQuestionKind];
    //        }
    //
    //        $tabs = [
    //            [
    //                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
    //                "blocks_quantity" => 1,
    //                "blocks" => [
    //                    [
    //                        "block_zone_quantity" => 1,
    //                        "block_model" => $mainModel,
    //                        "block_type" => "block_card",
    //                        "block_fields" => [
    //                            [
    //                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
    //                                'model_name' => $mainModel,
    //                                'model' => 'question_kind_name',
    //                                'width' => '50%',
    //                                'type' => 'text',
    //                                'zone' => '1',
    //                                'order' => '1'
    //                            ],
    //                            [
    //                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
    //                                'model_name' => $mainModel,
    //                                'model' => 'question_kind_code',
    //                                'width' => '50%',
    //                                'type' => 'text',
    //                                'zone' => '1',
    //                                'order' => '2'
    //                            ],
    //                            [
    //                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
    //                                'model_name' => $mainModel,
    //                                'model' => 'qt_question_type_id',
    //                                'width' => '50%',
    //                                'type' => 'vue-select',
    //                                'options' => [],
    //                                "options_data" => [
    //                                    "options_data_model" => "QTQuestionTypes",
    //                                    "options_field_id" => "id",
    //                                    "options_field_title" => "question_type_name",
    //                                    "search" => ""
    //                                ],
    //                                'zone' => '1',
    //                                'order' => '2'
    //                            ],
    //                        ]
    //                    ]
    //                ]
    //            ],
    //        ];
    //
    //        if ($formShowParam['show_system_tab']) {
    //            $tabSystem = [
    //                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
    //                "tab_name" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
    //                "tab_description" => '',
    //                "blocks_quantity" => 1,
    //                "blocks" => [
    //                    [
    //                        "block_title" => "Block1",
    //                        "block_zone_quantity" => 2,
    //                        "block_model" => $mainModel,
    //                        "block_type" => "block_card",
    //                        "block_fields" => [
    //                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
    //                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
    //                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
    //                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
    //                            [
    //                                'title' => $getArrayCaptions['ActiveL']['translation_captions']['caption_translation'],
    //                                'model_name' => $mainModel,
    //                                'model' => 'active_l',
    //                                'width' => '25%',
    //                                'type' => 'checkbox',
    //                                'zone' => '1',
    //                                'order' => '5'
    //                            ],
    //                        ]
    //                    ]
    //                ]
    //            ];
    //            array_push($tabs, $tabSystem);
    //        }
    //
    //        $card = [
    //            "sets" => $this->getButtonsList(['card_actions']),
    //            "main_data_models" => [
    //                $mainModel => $QTQuestionKind,
    //            ],
    //            "add_data_models" => [
    //                "QTQuestionTypes"=>$question_types
    //            ],
    //            "form_parameters" => [
    //                "form_title" => $getArrayCaptions['QTQuestionKind']['translation_captions']['caption_translation'],
    //                "form_code" => $mainModel,
    //                "form_is_dependent" => false,
    //                "form_type" => "card",
    //                "disable_inputs" => $formShowParam['read_only'],
    //                "form_base_data_model" => $mainModel,
    //                "form_main_data_model_id_field" => "id",
    //                "form_main_data_model_name" => $QTQuestionKind[0]['question_kind_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
    //                "form_type_list" => [
    //                ],
    //            ],
    //            "tabs" => $tabs
    //        ];
    //
    //        return response()->json($card);
    //    }

    public function getFields(Request $request)
    {
        $this->card_controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $main_data_models = $request->get("main_data_models");

        $main_model = $main_data_models[$this->card_controller_alias];

        $this->card_main_data_models = $main_data_models;
        $this->card_model = $main_model;
        $this->card_add_data_models = [];

        $this->card_model_from_db = QTQuestionKind::query()->find($main_model[0]["id"]);

        $kind_id = $main_model[0]["id"];

        $this->setIsNewObject($kind_id === "new");

        $this->setCardCaptions()
            ->setCardAddDataModels()
            ->setCardBlockFields()
            ->setCardSystemTab();

        $data = [
            "tabs" => $this->getCardBlockFields(),
            "main_data_models" => $this->card_main_data_models,
        ];

        $this->loadAddDataModels($data);

        return $data;
    }

    public function onWriteBeT(&$bCancel)
    {
        $main_data_models = $this->main_data_models;

        if (Arr::has($main_data_models, "QTQuestionTables")) {
            $question_tables = $main_data_models["QTQuestionTables"];
            $question_tables[0]["qt_question_kind_id"] = $this->main_model_id;

            $write = new Request([
                "form_parameters" => [
                    "form_base_data_model" => "QTQuestionTables"
                ],
                "main_data_models" => [
                    "QTQuestionTables" => $question_tables,
                    "QTQuestionTableAttributes" => $main_data_models["QTQuestionTableAttributes"],
                ]
            ]);

            $controller = new QTQuestionTablesController();

            $write_result = $controller->write($write)->getData();

            if ($write_result->error === true) {
                $bCancel = true;
                return ["message" => $write_result->message];
            }
        }
    }

    private function getAnswerList()
    {
        return QTQuestionAnswerList::query()
            ->where("qt_question_kind_id", $this->card_model[0]["id"])
            ->get()
            ->map(function ($answer) {
                if (is_numeric($answer->question_answer_value))
                    $answer->question_answer_value = (int)$answer->question_answer_value;

                return $answer;
            });
    }

    public function beforeWriteBe(&$bCancel)
    {
        $this->kind_id = $this->main_data_models[$this->main_model_name]["id"];
        $this->transaction_started = false;

        if (is_null($this->kind_id))
            return;

        $record = QTQuestionKind::query()->find($this->kind_id);

        if ($this->main_data_models[$this->main_model_name]["qt_question_type_id"] == $record->qt_question_type_id)
            return;


        try {
            DB::beginTransaction();

            $this->transaction_started = true;

            QTQuestionAnswerList::query()->where("qt_question_kind_id", $this->kind_id)->delete();
        } catch (\Exception $exception) {
            $bCancel = true;
            DB::rollBack();
            return [
                "message" => $exception->getMessage()
            ];
        }


    }

    public function onWriteError($request)
    {
        if ($this->transaction_started)
            DB::rollBack();
    }

    public function afterWriteBe(&$bCancel, $request)
    {
        if ($this->transaction_started)
            DB::commit();
    }
}
