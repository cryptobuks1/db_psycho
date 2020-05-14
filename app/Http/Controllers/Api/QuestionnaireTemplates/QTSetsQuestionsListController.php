<?php

namespace App\Http\Controllers\Api\QuestionnaireTemplates;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\ModelTables;
use App\Models\QuestionnaireTemplates\QTAnswerScenario;
use App\Models\QuestionnaireTemplates\QTBlock;
use App\Models\QuestionnaireTemplates\QTDependentField;
use App\Models\QuestionnaireTemplates\QTQuestionAnswerList;
use App\Models\QuestionnaireTemplates\QTQuestionKind;
use App\Models\QuestionnaireTemplates\QTQuestionType;
use App\Models\QuestionnaireTemplates\QTScenario;
use App\Models\QuestionnaireTemplates\QTSet;
use App\Models\QuestionnaireTemplates\QTSetsQuestionsList;
use App\Services\QTSetsQuestionsListService;
use Illuminate\Database\Eloquent\Model;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class QTSetsQuestionsListController extends Controller
{
    use HasList, HasCard;

    /**
     * @var QTQuestionType
     */
    public $question_type;

    /**
     * @var string
     */
    public $question_type_code;

    /**
     * @var Model[]
     */
    private $qt_dependent_fields;

    public function __construct()
    {
    }

    protected function listQuery()
    {
        $this->list_model = QTSetsQuestionsList::query()->with("question_kind", "set:id,question_set_name")->select([
            "id",
            "qt_question_kind_id",
            "line_n",
            "qt_set_id",
            "question_name",
            "deleted_l",
            "active_l"
        ]);

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get()->toArray();

        return $this;
    }

    public function prepareListModelData()
    {
        $models = $this->list_model;

        $this->list_model = [];

        foreach($models as $model)
        {
            $this->list_model[] = [
                "id"                    => $model["id"],
                "qt_question_kind_id"   => $model["qt_question_kind_id"],
                "qt_question_kind_name" => $model["question_kind"]["question_kind_name"],
                "question_name"         => $model["question_name"],
                "question_set_name"     => $model["set"]["question_set_name"] ?? "",
                "deleted_l"             => $model["deleted_l"],
                "active_l"              => $model["active_l"],
            ];
        }

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            'ok',
            'apply',
            'back',
            'Main',
            'Contractors',
            'ContractorShortName',
            'CountryName',
            'CreatedAt',
            'Database',
            'Individual',
            'Actual',
            'KPP',
            'DeleteMark',
            'ActiveL',
            'QuestionnaireQuestions',
            'QuestionKind',
            'QuestionName',
            'QTSet',
        ];

        $this->translateListCaptions();

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title"         => $this->getTranslatedListCaption("QuestionnaireQuestions"),
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [

                    [
                        'key'      => 'actions',
                        'sortable' => false,
                        'class'    => 'list_checkbox',
                        'thStyle'  => 'width: 6%',
                        "zone"     => "1",
                        "order"    => "1"
                    ],

                    [
                        'key'      => 'deleted_l',
                        'type'     => 'checkbox',
                        'sortable' => false,
                        'label'    => $this->getTranslatedListCaption("DeleteMark"),
                        'class'    => 'block_name',
                        'thStyle'  => 'width: 11%',
                        "zone"     => "1",
                        "order"    => "2"
                    ],
                    [
                        'key'      => 'active_l',
                        'type'     => 'checkbox',
                        'sortable' => false,
                        'label'    => $this->getTranslatedListCaption("ActiveL"),
                        'class'    => 'block_name',
                        'thStyle'  => 'width: 11%',
                        "zone"     => "1",
                        "order"    => "3"
                    ],

                    [
                        'key'      => 'qt_question_kind_name',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("QuestionKind"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "2"
                    ],

                    [
                        'key'      => 'question_name',
                        'sortable' => true,
                        'class'    => 'created_at',
                        "typeVal"  => "number",
                        "label"    => $this->getTranslatedListCaption("QuestionName"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "6"
                    ],

                ]
            ]
        ];

        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "QuestionnaireQuestions";

        return $this;
    }

    public function setListAddDataModels()
    {
        $this->list_add_data_models = [
            "QTSets" => QTSet::all(["id", "question_set_name"])
        ];

        return $this;
    }

    public function setListDependent()
    {
        $this->list_dependent = true;

        return $this;
    }

    public function setListDependentBlock()
    {
        $this->list_dependent_block = [
            "dependent_data_model" => $this->list_controller_alias,
            "dependent_fields"     => [
                "title"         => $this->getTranslatedListCaption("QTSet"),
                "type"          => "select",
                "model" => "qt_set_id",
                "options"       => [],
                "options_data"  => [
                    "options_data_model"     => "QTSets",
                    "options_field_id"       => "id",
                    "options_field_id_value" => "",
                    "options_field_title"    => "question_set_name",
                    "search"                 => ''
                ],
            ],
            "width"                => "100%",
        ];

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();
        $sets_questions_id = $request->id;
        $this->setIsNewObject($sets_questions_id === 'new');
        if($sets_questions_id == "new")
        {

            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }
            $this->card_model = QTSetsQuestionsList::getNewObject();
        }
        else
        {
            $this->card_model = QTSetsQuestionsList::with('question_kind', 'set.block.qt_page.questionnaire_template', 'dependent_fields')
                ->where('id', $sets_questions_id)
                ->get()
                ->first()
                ->toArray();
        }

        $this->question_type = QTQuestionKind::query()
            ->join('QTQuestionTypes as t', 't.id', '=', 'QTQuestionKinds.qt_question_type_id')
            ->where('QTQuestionKinds.id', $this->card_model['qt_question_kind_id'])
            ->select('t.*')
            ->first();

        $this->question_type_code = $this->question_type->question_type_code ?? null;

        $this->qt_dependent_fields = $this->card_model["dependent_fields"] ?? [];

        $this->card_model["show_dependent"] = $this->question_type && $this->question_type->reference_l == true && !empty($this->qt_dependent_fields);

        return $this;
    }

    public function prepareCardModelData()
    {
        $this->card_model = [
            [
                'id'                  => $this->card_model['id'],
                'qt_question_kind_id' => $this->card_model['qt_question_kind_id'],
                'question_kind_name'  => $this->card_model['question_kind']['question_kind_name'],
                'qt_set_name'         => $this->card_model['set']['question_set_name'] ?? null,
                'qt_set_id'           => $this->card_model['qt_set_id'],
                'line_n'              => $this->card_model['line_n'],
                'question_name'       => $this->card_model['question_name'],
                'question_code'       => $this->card_model['question_code'],
                'caption_code'        => $this->card_model['caption_code'],
                'show_dependent'        => $this->card_model['show_dependent'],
                'dependent_label'     => $this->isNewObject() ? "" : $this->card_model["set"]["block"]["qt_page"]["questionnaire_template"]["questionnaire_templates_name"] . " → " . $this->card_model["set"]["block"]["qt_page"]["page_name"] . " → " . $this->card_model["set"]["block"]["block_name"] . " → " . $this->card_model["set"]["question_set_name"],


                'created_at' => $this->card_model['created_at'],
                'created_by' => $this->card_model['created_by'],
                'updated_at' => $this->card_model['updated_at'],
                'updated_by' => $this->card_model['updated_by'],
            ]
        ];
        return $this;
    }

    public function setCardMainDataModels()
    {
        $this->card_main_data_models = [
            'QTAnswerScenarios' => QTAnswerScenario::query()->where("qt_sets_questions_list_id", $this->card_model[0]["id"])
                    ->get()
        ];

        if($this->question_type && $this->question_type->reference_l == true)
            $this->card_main_data_models["QTDependentField"] = $this->qt_dependent_fields;

        return $this;
    }

    public function setCardCaptions()
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back',
            'Main',
            'Database',
            'DBList',
            'DatabaseType',
            'ServerTableServerName',
            'ServerTableServerIP',
            'DatabaseServers',
            'ServerTableServerIP',
            'ServerTableServerUrl',
            'Server',
            'CreationDetails',
            'CreatedAt',
            'CreatedBy',
            'UpdatedAt',
            'UpdatedBy',
            'CreationInfo',
            'SystemDetails',
            'Port',
            'SecureConnection',
            'number',
            'QuestionName',
            'QuestionKind',
            'QuestionCode',
            'QuestionSetName',
            'LineNumber',
            'Caption',
            'PossibleAnswer',
            'Model',
            'Element',
            'Scenario',
            'QuestionnaireQuestion',
            'QuestionPosition',

        ];
        $this->translateCardCaptions();
        return $this;
    }

    public function setCardFormTitle()
    {
        $this->card_form_title = "QuestionnaireQuestion";

        return $this;
    }

    public function setCardBlockFields()
    {
        $this->card_block_fields = [
            [
                "tab_title"       => $this->getTranslatedCardCaption('Main'),
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => 'block title',
                        "block_zone_quantity" => 1,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            [
                                'title'      => $this->getTranslatedCardCaption('QuestionName'),
                                'model'      => 'question_name',
                                'model_name' => $this->card_controller_alias,
                                'width'      => '25%',
                                'type'       => 'text',
                                'order_zone' => '3',
                                'zone'       => '1',
                                'order'      => '3'
                            ],

                            [
                                'title'          => $this->getTranslatedCardCaption('QuestionKind'),
                                'model'          => 'qt_question_kind_id',
                                'model_name'     => $this->card_controller_alias,
                                'type'           => 'vue-select',
                                'perform_action' => true,
                                'action_link'    => '/admin/qt/sets/questions/list/fields',
                                'width'          => '25%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "QTQuestionKinds",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "question_kind_name",
                                    "search"              => ""
                                ],
                                "zone"           => "1",
                                "order"          => "3",

                                "border_right" => false

                            ],

                            [
                                'title'      => $this->getTranslatedCardCaption('QuestionCode'),
                                'model'      => 'question_code',
                                'model_name' => $this->card_controller_alias,
                                'width'      => '25%',
                                'type'       => 'text',
                                'zone'       => '1',
                                'order'      => '4'
                            ],
                            [
                                'title'      => $this->getTranslatedCardCaption('QuestionSetName'),
                                'model'      => 'qt_set_name',
                                'model_name' => $this->card_controller_alias,
                                'width'      => '25%',
                                'type'       => 'text',
                                'order_zone' => '2',
                                'zone'       => '1',
                                'order'      => '2'
                            ],
                            [
                                'title'      => $this->getTranslatedCardCaption('LineNumber'),
                                'model'      => 'line_n',
                                'model_name' => $this->card_controller_alias,
                                'width'      => '25%',
                                'type'       => 'text',
                                'order_zone' => '3',
                                'zone'       => '1',
                                'order'      => '3'
                            ],
                            [
                                'title'      => $this->getTranslatedCardCaption('Caption'),
                                'model'      => 'caption_code',
                                'model_name' => $this->card_controller_alias,
                                'width'      => '25%',
                                'type'       => 'text',
                                'order_zone' => '3',
                                'zone'       => '1',
                                'order'      => '3'
                            ],
                            [
                                'title'      => "Зависимый селект",
                                'model'      => 'show_dependent',
                                'model_name' => $this->card_controller_alias,
                                'width'      => '25%',
                                'type'       => 'checkbox',
                                'perform_action' => true,
                                'action_link'    => '/admin/qt/sets/questions/list/fields',
                                'show_condition' => function($current_field)
                                {
                                    if($this->question_type && $this->question_type->reference_l == true)
                                        return true;
                                    else
                                        return false;
                                },
                                'order_zone' => '3',
                                'zone'       => '1',
                                'order'      => '10'
                            ],


                        ]
                    ],
                    [
                        "block_title"         => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model"         => "QTAnswerScenarios",
                        "block_type"          => "block_list_base",
                        'list_width'          => '100%',
                        "show_condition"      => function($current_block)
                        {
                            if(in_array($this->question_type_code, ['radio', 'select']))
                                return true;
                            return false;
                        },
                        "block_parameters"    => [
                            "prevent_list_click" => true,
                            "edit_values"        => true,
                            "edit_mode"          => 'inline',
                            "empty_row"          => [
                                "id"                        => null,
                                "qt_sets_questions_list_id" => $this->card_model[0]['id'],
                                "qt_question_answer_id"     => null,
                                "row_id"                    => null,
                                "qt_scenario_id"            => null,
                            ],
                        ],
                        "show_name"           => false,
                        "block_fields"        => [
                            [
                                'key'          => 'qt_question_answer_id',
                                'edit'         => true,
                                "filter"       => true,
                                "sortable"     => true,
                                'type'         => 'select',
                                "label"        => $this->getTranslatedCardCaption('PossibleAnswer'),
                                'thStyle'      => 'width: 10%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "QTQuestionAnswerList",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "question_answer_value",
                                    "search"              => ""
                                ],
                                "validation"   => ["required" => true]
                            ],
                            [
                                'key'            => 'table_n',
                                'edit'           => true,
                                "filter"         => true,
                                "sortable"       => true,
                                'type'           => 'select',
                                "label"          => $this->getTranslatedCardCaption('Model'),
                                'thStyle'        => 'width: 10%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "Models",
                                    "options_field_id"    => "table_n",
                                    "options_field_title" => "model_name",
                                    "search"              => ""
                                ],
                                "dependent_data" => [
                                    "supreme"           => true,
                                    "supreme_field_key" => "row_id",
                                ],
                                "validation"     => ["required" => true]
                            ],
                            [
                                'key'            => 'row_id',
                                'edit'           => true,
                                "filter"         => true,
                                "sortable"       => true,
                                'type'           => 'select',
                                "label"          => $this->getTranslatedCardCaption('Element'),
                                'thStyle'        => 'width: 10%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "QTSets",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "question_set_name",
                                    "search"              => ""
                                ],
                                "dependent_data" => [
                                    "dependent"             => true,
                                    "change_add_data_model" => true,
                                    "dependent_field"       => 'table_n',

                                ],
                                "validation"     => ["required" => true]
                            ],
                            [
                                'key'          => 'qt_scenario_id',
                                'edit'         => true,
                                "filter"       => true,
                                "sortable"     => true,
                                'type'         => 'select',
                                "label"        => $this->getTranslatedCardCaption('Scenario'),
                                'thStyle'      => 'width: 10%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "QTScenarios",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "scenario_name",
                                    "search"              => ""
                                ],
                                "validation"   => ["required" => true]
                            ],

                        ]
                    ],
                    [
                        "block_title"         => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model"         => "QTDependentField",
                        "block_type"          => "block_list_base",
                        'list_width'          => '100%',
                        "show_condition"      => function($current_block)
                        {
                            if($this->card_model[0]["show_dependent"])
                                return true;
                            return false;
                        },
                        "block_parameters"    => [
                            "prevent_list_click" => true,
                            "edit_values"        => true,
                            "edit_mode"          => 'inline',
                            "empty_row"          =>  QTDependentField::getNewObject($this->card_model[0]["id"])
                        ],
                        "show_name"           => false,
                        "block_fields"        => [
                            [
                                'key'          => 'qt_dependent_field_id',
                                'edit'         => true,
                                "filter"       => true,
                                "sortable"     => true,
                                'type'         => 'select',
                                "label"        => "Зависимый вопрос",
                                'thStyle'      => 'width: 50%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "ReferenceQuestions",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "question_name",
                                    "search"              => ""
                                ],
                                "validation"   => ["required" => true]
                            ],
                            [
                                'key'          => 'qt_dependent_foreign_key',
                                'edit'         => true,
                                "filter"       => true,
                                "sortable"     => true,
                                'type'         => 'text',
                                "label"        => "Связующий ключ",
                                'thStyle'      => 'width: 50%',
                                "validation"   => ["required" => true]
                            ],

                        ]
                    ],
                ]

            ]
        ];
        return $this;
    }

    public function getCardBlockFields()
    {
        return array_values(array_filter(array_map(function($tab)
        {
            $tab["blocks"] = array_values(array_filter(array_map(function($block)
            {
                $block["block_fields"] = array_values(array_filter(array_map(function($block_field)
                {
                    if(!isset($block_field["show_condition"]))
                        return $block_field;

                    return $block_field["show_condition"]($block_field) === true ? $block_field : null;
                }, $block["block_fields"])));

                if(!isset($block["show_condition"]))
                    return $block;

                return $block["show_condition"]($block) === true ? $block : null;
            }, $tab["blocks"])));

            if(!isset($tab["show_condition"]))
                return $tab;

            return $tab["show_condition"]($tab) === true ? $tab : null;
        }, $this->card_block_fields)));
    }

    public function setCardAddDataModels()
    {
        $question_kinds = QTQuestionKind::select('id', 'question_kind_name')->get()->toArray();
        $scenarios = QTScenario::all('id', 'scenario_name');
        $questions = [];

        $current_set = QTSet::select('qt_block_id', 'id')
            ->where('id', $this->card_model[0]['qt_set_id'])
            ->with('questions')
            ->get()
            ->each(function($set) use (&$questions)
            {
                foreach($set->questions as $question)
                {
                    $questions[] = $question;
                }
            })
            ->first()
            ->toArray();
        $sets = QTSet::where('id', '!=', $current_set['id'])
            ->where('qt_block_id', $current_set['qt_block_id'])
            ->with('questions')
            ->get()
            ->each(function($set) use (&$questions)
            {
                foreach($set->questions as $question)
                {
                    $questions[] = $question;
                }
            })
            ->toArray();

        $reference_questions = QTSetsQuestionsList::query()
            ->where("qt_set_id", $this->card_model[0]["qt_set_id"])
            ->where("id", "!=", $this->card_model[0]["id"])
            ->whereHas("question_kind.question_type", function($query)
            {
                $query->where("reference_l", true);
            })
            ->get();


        $models = ModelTables::query()
            ->whereIn("table_code", ["QTSet", "QTSetsQuestionsList"])
            ->get();

        $this->card_add_data_models = [
            'QTQuestionKinds'      => $question_kinds,
            "QTScenarios"          => $scenarios,
            'QTQuestionAnswerList' => QTQuestionAnswerList::where('qt_question_kind_id', $this->card_model[0]['qt_question_kind_id'])
                ->get()
                ->toArray(),
            'QTSets'               => $sets,
            'QTSetsQuestionsList'  => $questions,
            'Models'               => [
                [
                    'model_name'  => 'Set',
                    'id'          => 157,
                    'table_n'     => 157,
                    'model_code'  => 'QTSets',
                    'field_title' => 'question_set_name'
                ],
                [
                    'model_name'  => 'Question',
                    'id'          => 160,
                    'table_n'     =>160,
                    'model_code'  => 'QTSetsQuestionsList',
                    'field_title' => 'question_name'
                ]
            ],
            "ReferenceQuestions" => $reference_questions
            //todo дописать проверку, чтобы выбирать модели из справочник моделей
        ];

        return $this;
    }

    public function setCardMainDataModelName()
    {
        $this->card_main_data_model_name = $this->card_model[0]['question_name'];

        return $this;
    }

    public function setCardDependent(): self
    {
        $this->card_dependent = !$this->isNewObject();

        return $this;
    }

    public function setCardDependentBlock(): self
    {
        if($this->isCardDependent())
        {
            $this->card_dependent_block = [
                "dependent_data_model" => $this->card_controller_alias,
                "dependent_fields"     => [
                    "title"        => $this->getTranslatedCardCaption("QuestionPosition"),
                    "model"        => "qt_set_id",
                    "type"         => "label",
                    "options"      => [],
                    "options_data" => [
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "dependent_label",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ];
        }

        return $this;
    }

    //    public function cardold(Request $request)
    //    {
    //        $captionName = [
    //            'ok',
    //            'apply',
    //            'back', 'Main', 'Database',
    //            'DBList', 'DatabaseType',
    //            'ServerTableServerName', 'ServerTableServerIP',
    //            'DatabaseServers', 'ServerTableServerIP',
    //            'ServerTableServerUrl', 'Server', 'CreationDetails', 'CreatedAt',
    //            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'CreationInfo',
    //            'SystemDetails', 'Port', 'SecureConnection', 'number'
    //
    //        ];
    //
    //        $getArrayCaptions = $this->getTranslateByKeys($captionName);
    //
    //
    ////        $block_id = QTSet::where('qt_block_id',  );
    //
    //
    //        $model = 'App\Models\Controller';
    //
    //        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
    //            ->value('controller_alias');
    //
    //        $nameControllerMethod = [
    //            'controller' => class_basename(Route::current()->controller),
    //            'accessRight' => 'record'
    //        ];
    //
    //        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();
    //
    //        $res = [[ //Итоговый массив рекизитов
    //            'id' => $sets_questions['id'],
    //            'qt_question_kind_id' => $sets_questions['qt_question_kind_id'],
    //            'qt_set_name' => $sets_questions['set']['question_set_name'],
    //            'qt_set_id' => $sets_questions['qt_set_id'],
    //            'line_n' => $sets_questions['line_n'],
    //            'question_name' => $sets_questions['question_name'],
    //            'question_code' => $sets_questions['question_code'],
    //            'caption_code' => $sets_questions['caption_code'],
    //
    //            'created_at' => $sets_questions['created_at'],
    //            'created_by' => $sets_questions['created_by'],
    //            'updated_at' => $sets_questions['updated_at'],
    //            'updated_by' => $sets_questions['updated_by'],
    //
    //        ]];
    //
    //        $tabs = [
    //
    //            ["tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
    //                "blocks_quantity" => 1,
    //                "blocks" => [
    //                    [
    //                        "block_title" => 'block title',
    //                        "block_zone_quantity" => 1,
    //                        "block_model" => $mainModel,
    //                        "block_type" => "block_card",
    //                        "block_fields" => [
    //
    //                            [
    //                                'title' => "Имя вопроса [перевод]",
    //                                'model' => 'question_name',
    //                                'model_name' => $mainModel,
    //                                'width' => '25%', 'type' => 'text',
    //                                'order_zone' => '3', 'zone' => '1',
    //                                'order' => '3'
    //                            ],
    //
    //                            [
    //                                'title' => 'Тип вопроса [перевод]',
    //                                'model' => 'qt_question_kind_id',
    //                                'model_name' => $mainModel,
    //                                'type' => 'vue-select',
    //                                'perform_action' => true,
    //                                'action_link' => '/admin/qt/sets/questions/list/fields',
    //                                'width' => '25%',
    //                                'options' => [],
    //                                "options_data" => [
    //                                    "options_data_model" => "QTQuestionKinds",
    //                                    "options_field_id" => "id",
    //                                    "options_field_title" => "question_kind_name",
    //                                    "search" => ""
    //                                ],
    //                                "zone" => "1",
    //                                "order" => "3",
    //
    //                                "border_right" => false
    //
    //                            ],
    //
    //                            [
    //                                'title' => "Код вопроса [перевод]",
    //                                'model' => 'question_code',
    //                                'model_name' => $mainModel,
    //                                'width' => '25%',
    //                                'type' => 'text',
    //                                'zone' => '1',
    //                                'order' => '4'
    //                            ],
    //                            [
    //                                'title' => 'Имя сета [перевод]',
    //                                'model' => 'qt_set_name',
    //                                'model_name' => $mainModel,
    //                                'width' => '25%', 'type' => 'text',
    //                                'order_zone' => '2', 'zone' => '1',
    //                                'order' => '2'
    //                            ],
    //                            [
    //                                'title' => "Порядок [перевод]",
    //                                'model' => 'line_n',
    //                                'model_name' => $mainModel,
    //                                'width' => '25%', 'type' => 'text',
    //                                'order_zone' => '3', 'zone' => '1',
    //                                'order' => '3'
    //                            ],
    //                            [
    //                                'title' => "Перевод [перевод]",
    //                                'model' => 'caption_code',
    //                                'model_name' => $mainModel,
    //                                'width' => '25%', 'type' => 'text',
    //                                'order_zone' => '3', 'zone' => '1',
    //                                'order' => '3'
    //                            ],
    //
    //
    //                        ]
    //                    ],
    //                    [
    //                        "block_title" => 'Табличная часть',
    //                        "block_zone_quantity" => 1,
    //                        "block_model" => "QTAnswerScenarios",
    //                        "block_type" => "block_list_base",
    //                        'list_width' => '100%',
    //                        "block_parameters" => [
    //                            "prevent_list_click" => true,
    //                            "edit_values" => true,
    //                            "edit_mode" => 'inline',
    //                            "empty_row" => [
    //                                "id" => null,
    //                                "qt_sets_questions_list_id" => $res[0]['id'],
    //                                "qt_question_answer_id" => null,
    //                                "row_id" => null,
    //                                "qt_scenario_id" => null,
    //                            ],
    //                        ],
    //                        "show_name" => false,
    //                        "block_fields" => [
    //                            [
    //                                'key' => 'qt_question_answer_id',
    //                                'edit' => true,
    //                                "filter" => true,
    //                                "sortable" => true,
    //                                'type' => 'select',
    //                                "label" => 'Вариант ответа',
    //                                'thStyle' => 'width: 10%',
    //                                'options' => [],
    //                                "options_data" => [
    //                                    "options_data_model" => "QTQuestionAnswerList",
    //                                    "options_field_id" => "id",
    //                                    "options_field_title" => "question_answer_value",
    //                                    "search" => ""
    //                                ],
    //                                "validation" => ["required" => true]
    //                            ],
    //                            [
    //                                'key' => 'table_n',
    //                                'edit' => true,
    //                                "filter" => true,
    //                                "sortable" => true,
    //                                'type' => 'select',
    //                                "label" => 'Модель',
    //                                'thStyle' => 'width: 10%',
    //                                'options' => [],
    //                                "options_data" => [
    //                                    "options_data_model" => "Models",
    //                                    "options_field_id" => "id",
    //                                    "options_field_title" => "model_name",
    //                                    "search" => ""
    //                                ],
    //                                "dependent_data" => [
    //                                    "supreme" => true,
    //                                    "supreme_field_key" => "row_id",
    //                                ],
    //                                "validation" => ["required" => true]
    //                            ],
    //                            [
    //                                'key' => 'row_id',
    //                                'edit' => true,
    //                                "filter" => true,
    //                                "sortable" => true,
    //                                'type' => 'select',
    //                                "label" => 'Элемент',
    //                                'thStyle' => 'width: 10%',
    //                                'options' => [],
    //                                "options_data" => [
    //                                    "options_data_model" => "QTSets",
    //                                    "options_field_id" => "id",
    //                                    "options_field_title" => "question_set_name",
    //                                    "search" => ""
    //                                ],
    //                                "dependent_data" => [
    //                                    "dependent" => true,
    //                                    "change_add_data_model" => true,
    //                                    "dependent_field" => 'table_n',
    //
    //                                ],
    //                                "validation" => ["required" => true]
    //                            ],
    //                            [
    //                                'key' => 'qt_scenario_id',
    //                                'edit' => true,
    //                                "filter" => true,
    //                                "sortable" => true,
    //                                'type' => 'select',
    //                                "label" => 'Сценарий',
    //                                'thStyle' => 'width: 10%',
    //                                'options' => [],
    //                                "options_data" => [
    //                                    "options_data_model" => "QTScenarios",
    //                                    "options_field_id" => "id",
    //                                    "options_field_title" => "title",
    //                                    "search" => ""
    //                                ],
    //                                "validation" => ["required" => true]
    //                            ],
    //
    //                        ]
    //                    ]
    //                ]
    //
    //            ]
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
    //
    //                        "block_model" => $mainModel,
    //                        "block_type" => "block_card",
    //                        "block_fields" => [
    //                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
    //                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
    //                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
    //                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
    //                        ]
    //                    ]
    //                ]
    //            ];
    //            array_push($tabs, $tabSystem);
    //        }
    //
    //        $res = [[ //Итоговый массив рекизитов
    //            'id' => $sets_questions['id'],
    //            'qt_question_kind_id' => $sets_questions['qt_question_kind_id'],
    //            'qt_set_name' => $sets_questions['set']['question_set_name'],
    //            'qt_set_id' => $sets_questions['qt_set_id'],
    //            'line_n' => $sets_questions['line_n'],
    //            'question_name' => $sets_questions['question_name'],
    //            'question_code' => $sets_questions['question_code'],
    //            'caption_code' => $sets_questions['caption_code'],
    //
    //            'created_at' => $sets_questions['created_at'],
    //            'created_by' => $sets_questions['created_by'],
    //            'updated_at' => $sets_questions['updated_at'],
    //            'updated_by' => $sets_questions['updated_by'],
    //
    //        ]];
    //
    //        $question_kinds = QTQuestionKind::select('id', 'question_kind_name')->get()->toArray();
    //        $scenarios = QTScenario::all('id', 'scenario_name');
    //        $current_set = QTSet::select('qt_block_id', 'id')->where('id', $sets_questions['qt_set_id'])->get()->first()->toArray();
    //        $sets = QTSet::where('id', '!=', $current_set['id'])->where('qt_block_id', $current_set['qt_block_id']
    //        )->get()->toArray();
    //
    //        $card = [
    //            "main_data_models" => [
    //                $mainModel => $res,
    //                'QTAnswerScenarios' => [],
    //            ],
    //
    //            "add_data_models" => [
    //                'QTQuestionKinds' => $question_kinds,
    //                "QTScenarios" => $scenarios,
    //                'QTQuestionAnswerList' => QTQuestionAnswerList::where('qt_question_kind_id', $res[0]['id'])->get()->toArray(),
    //                'QTSets' => $sets,
    //                'QTSetsQuestionsList' => QTSetsQuestionsList::all('id', 'question_name'),
    //                'Models' => [
    //                    ['model_name' => 'Set', 'id' => 1, 'table_n' => 1, 'model_code' => 'QTSets', 'field_title' => 'question_set_name'],
    //                    ['model_name' => 'Question', 'id' => 2, 'table_n' => 2, 'model_code' => 'QTSetsQuestionsList', 'field_title' => 'question_name']
    //                ]
    //            ],
    //
    //            "sets" => $this->getButtonsList(['card_actions']),
    //
    //            "form_parameters" => [
    //                "form_title" => $getArrayCaptions['Server']['translation_captions']['caption_translation'],
    //                "form_code" => $mainModel,
    //                "disable_inputs" => $formShowParam['read_only'],
    //                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
    //                "form_type" => "card",
    //                "form_base_data_model" => $mainModel,
    //                "form_main_data_model_id_field" => "id",
    //                "form_main_data_model_name" => $res[0]['question_name'],
    //                "form_type_list" => [
    //                    "form_list_url" => "/serversDb",
    //
    //                ],
    //
    //            ],
    //
    //            "tabs" => $tabs,
    //
    //
    //        ];
    //
    //        return response()->json($card);
    //    }

    /**
     * @param Request $request
     * @return array
     */
    public function getFields(Request $request)
    {
        $this->card_controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $main_data_models = $request->get("main_data_models");

        $main_model = $main_data_models[$this->card_controller_alias];

        $this->question_type = QTQuestionKind::query()
            ->join('QTQuestionTypes as t', 't.id', '=', 'QTQuestionKinds.qt_question_type_id')
            ->where('QTQuestionKinds.id', $main_model[0]['qt_question_kind_id'])
            ->select('t.*')
            ->first();

        $this->question_type_code = $this->question_type->question_type_code ?? null;

        if($this->question_type && $this->question_type->reference_l == false)
            $main_model[0]["show_dependent"] = false;

        $main_data_models[$this->card_controller_alias] = $main_model;

        $this->card_main_data_models = $main_data_models;
        $this->card_model = $main_model;
        $this->card_add_data_models = [];


        $this->setCardCaptions()->setCardAddDataModels()->setCardBlockFields()->setCardSystemTab();

        $data = [
            "tabs"             => $this->getCardBlockFields(),
            "main_data_models" => $this->card_main_data_models,
        ];

        $this->loadAddDataModels($data);

        return $data;
    }

    public function beforeWriteBe(&$bCancel)
    {
        $main_model = $this->main_data_models[$this->main_model_name];

        // Удаляем все зависимости текущего вопроса если сняли галочку
        if($main_model["show_dependent"] == false)
        {
            QTDependentField::query()
                ->where("qt_sets_questions_list_id", $main_model["id"])
                ->delete();
        }
    }
}
