<?php

namespace App\Http\Controllers\Api\QuestionnaireTemplates;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Models\QuestionnaireTemplates\QTBlock;
use App\Models\QuestionnaireTemplates\QTPage;
use App\Models\QuestionnaireTemplates\QTQuestionKind;
use App\Models\QuestionnaireTemplates\QTSet;
use App\Models\QuestionnaireTemplates\QTSetsQuestionsList;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionnaireTemplates\QuestionnaireTemplate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class QuestionnaireTemplatesController extends Controller
{
    use HasCard;

    public function tree(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back',
            'Main',
            'QuestionnaireTemplates',
            'Description',
            'Code',
            'Name',
            'Code',
            'Remark',
            'ActiveL',
            'DeletedL',
            'Header',
            'Footer',
            'LineNumber',
            'CreatedAt',
            'CreatedBy',
            'UpdatedAt',
            'UpdatedBy'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $questionnaire_template_id = $request->id;

        $qt_pages = QTPage::with([
            'qt_blocks' => function ($query) {
                return $query->orderBy('line_n');
            },
            'qt_blocks.qt_sets' => function ($query) {
                return $query->orderBy('line_n');
            },
            'qt_blocks.qt_sets.questions' => function ($query) {
                return $query->orderBy('line_n');
            }
        ])->where('questionnaire_templates_id', $questionnaire_template_id)->orderBy('line_n')->get()->toArray();

        $tree = [
            'main_data_models' => ['qt_pages' => $qt_pages],

            "form_parameters" => [
                "form_base_data_model" => "qt_pages",
                "form_title" => $getArrayCaptions['QuestionnaireTemplates']['translation_captions']['caption_translation'],
            ],

            "table_fields" => [
                [
                    "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                    "column_code" => "obj_name"
                ],
                [
                    "label" => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                    "column_code" => "obj_code"
                ],
                //                [
                //                    "label" => "Ссылка на объект",
                //                    "column_code" => "date"
                //                ],
                //                [
                //                    "label" => "field4",
                //                    "column_code" => "number"
                //                ],
            ],

            "depths_parameters" => [
                //                [
                //                    "children_models" => ["qt_pages"]
                //                ],
                [
                    "children_models" => ["qt_blocks"]
                ],
                [
                    "children_models" => ["qt_sets",]
                ],
                [
                    "children_models" => ["questions"]
                ],
                [
                    "children_models" => []
                ]
            ],

            "fields_parameters" => [

                //                "questionnaire_templates" => [
                //                    "parameters" => [
                //                        "card_url" => '\questionnaire_templates',
                //                        "model_title_field" => "questionnaire_templates_name",
                //                        "card_l" => true
                //                    ],
                //                    "columns" => [
                //                        [
                //                            "key" => "form_name",
                //                            "edit" => true,
                //                            "label" => "Form Name",
                //                            "validation" => null,
                //                        ],
                //                        [
                //                            "key" => "questionnaire_templates_name",
                //                            "edit" => true,
                //                            "label" => "Название анкеты",
                //                            "validation" => null,
                //                            "column_code" => "obj_name"
                //                        ],
                //                        [
                //                            "key" => "questionnaire_templates_code",
                //                            "edit" => true,
                //                            "label" => "Код",
                //                            "validation" => null,
                //                            "column_code" => "obj_code"
                //                        ]
                //                    ]
                //                ],

                "qt_pages" => [
                    "parameters" => [
                        "card_url" => '/qtPages',
                        "model_title_field" => "page_name",
                        "card_l" => true,
                        "empty_row" => QTPage::getNewObject($questionnaire_template_id),
                        "allow_adding_children" => true,
                        "allow_editing" => true
                    ],
                    "columns" => [
                        [
                            "key" => "line_n",
                            "edit" => true,
                            "label" => "№",
                            "validation" => [
                                "required" => true
                            ],
                        ],
                        [
                            "key" => "page_name",
                            "edit" => true,
                            "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                            "validation" => [
                                "required" => true
                            ],
                            "column_code" => "obj_name"
                        ],
                        [
                            "key" => "page_code",
                            "edit" => true,
                            "label" => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                            "validation" => [
                                "required" => true
                            ],
                            "column_code" => "obj_code"
                        ]
                    ]
                ],

                "qt_blocks" => [
                    "parameters" => [
                        "card_url" => "/qtBlocks",
                        "model_title_field" => "block_name",
                        "card_l" => true,
                        "empty_row" => QTBlock::getNewObject(),
                        "allow_adding_children" => true,
                        "allow_editing" => true
                    ],
                    "columns" => [
                        [
                            "key" => "line_n",
                            "edit" => true,
                            "label" => "№",
                            "validation" => [
                                "required" => true
                            ],

                        ],
                        [
                            "key" => "block_name",
                            "edit" => true,
                            "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                            "validation" => [
                                "required" => true
                            ],
                            "column_code" => "obj_name"
                        ],
                        [
                            "key" => "block_code",
                            "edit" => true,
                            "label" => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                            "validation" => [
                                "required" => true
                            ],
                            "column_code" => "obj_code"
                        ]
                    ]
                ],

                "qt_sets" => [
                    "parameters" => [
                        "card_url" => '/qtSets',
                        "model_title_field" => "question_set_name",
                        "card_l" => true,
                        "empty_row" => QTSet::getNewObject(),
                        "allow_adding_children" => true,
                        "allow_editing" => true
                    ],
                    "columns" => [
                        [
                            "key" => "line_n",
                            "edit" => true,
                            "label" => "№",
                            "validation" => [
                                "required" => true
                            ],
                        ],
                        [
                            "key" => "question_set_name",
                            "edit" => true,
                            "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                            "validation" => [
                                "required" => true
                            ],
                            "column_code" => "obj_name"
                        ],
                        [
                            "key" => "question_set_code",
                            "edit" => true,
                            "label" => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                            "validation" => [
                                "required" => true
                            ],
                            "column_code" => "obj_code"
                        ]
                    ]
                ],

                "questions" => [
                    "parameters" => [
                        "card_url" => '/questionnaireQuestions',
                        "model_title_field" => "question_name",
                        "card_l" => true,
                        "empty_row" => QTSetsQuestionsList::getNewObject(),
                        "allow_adding_children" => false,
                        "allow_editing" => true
                    ],
                    "columns" => [
                        [
                            "key" => "question_name",
                            "edit" => true,
                            "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                            "validation" => null,
                            "column_code" => "obj_name"
                        ],
                        [
                            "key" => "question_code",
                            "edit" => true,
                            "label" => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                            "validation" => null,
                            "column_code" => "obj_code"
                        ]
                    ]
                ]

            ],

            "sets" => array_merge($this->getButtonsList('list_top_dropdown_actions'), [
                "card_actions" => [
                    [
                        'code' => "ok",
                        'class' => "btn btn-green",
                        'link' => "/admin/qt/questionnaire/tree/save",
                        'img' => null,
                        'title' => "ОК",
                        'type' => "button",
                        'execute_fe_action_l' => true,
                    ]
                ]
            ]),
        ];

        return response()->json($tree);


    }

    public function preview(Request $request)
    {
        $questionnaire_template_id = $request->id;

        $questionnaire_template = QuestionnaireTemplate::query()
            ->select('id', 'form_name', 'message', 'questionnaire_templates_name', 'questionnaire_templates_code', 'description', 'remark', 'header', 'footer', 'caption_code')
            ->with([
                'qt_pages' => function ($query) {
                    $query->select('id', 'questionnaire_templates_id', 'page_name', 'page_code')
                        ->orderBy('line_n', 'ASC');
                },
                'qt_pages.qt_blocks' => function ($query) {
                    $query->select('id', 'qt_page_id', 'block_name', 'block_code')->orderBy('line_n', 'ASC');
                },
                'qt_pages.qt_blocks.qt_sets' => function ($query) {
                    $query->select('id', 'qt_block_id', 'question_set_name', 'question_set_code')
                        ->orderBy('line_n', 'ASC');
                },
                'qt_pages.qt_blocks.qt_sets.questions' => function ($query) {
                    $query->select('QTSetsQuestionsList.id', 'QTQuestionKinds.id as qt_question_kind_id', 'question_kind_code', 'question_description', 'qt_set_id', 'question_name', 'question_code', 'question_width', 'question_required_l', 'QTSetsQuestionsList.caption_code', 'question_type_code', 'reference_l')
                        ->leftJoin('QTQuestionKinds', 'qt_question_kind_id', '=', 'QTQuestionKinds.id')
                        ->leftJoin('QTQuestionTypes', 'QTQuestionKinds.qt_question_type_id', '=', 'QTQuestionTypes.id')
                        ->with([
                            'validations' => function ($query) {
                                $query->select('validation_value', 'validation_code')
                                    ->join('QTValidationRules', 'QTValidationRules.id', '=', 'qt_validation_rule_id')
                                    ->join('QTValidations', 'qt_validation_id', '=', 'QTValidations.id');
                            },
                            "owner_question" => function ($query) {
                                $query->select(DB::raw("true as supreme"), DB::raw('"QTDependentFields".qt_sets_questions_list_id::text as supreme_field_key'),
                                    "QTDependentFields.qt_dependent_field_id");
                            },
                            "dependent_question" => function ($query) {
                                $query->join("QTSetsQuestionsList as main_question", "main_question.id", "=", "QTDependentFields.qt_dependent_field_id")
                                    ->join("QTQuestionKinds as main_question_kind", "main_question_kind.id", "=", "main_question.qt_question_kind_id")
                                    ->select(\DB::raw("true as backward_dependency"), \DB::raw("true as dependent"),
                                        \DB::raw("'id' as dependent_field"), DB::raw("main_question_kind.question_kind_code as dependent_data_model"),
                                        \DB::raw('"QTDependentFields".qt_dependent_foreign_key as dependent_field_id'), DB::raw('"QTDependentFields".qt_dependent_field_id::text as dependent_backward_field'),
                                        "QTDependentFields.qt_sets_questions_list_id");
                            }
                        ])
                        ->orderBy('line_n', 'ASC');
                },
                'qt_pages.qt_blocks.qt_sets.questions.scenarios' => function ($query) {
                    $query->select('QTAnswerScenarios.id', 'qt_sets_questions_list_id', 'row_id', 'qt_scenario_id', 'question_answer_value', 'scenario_name', 'table_code')
                        ->join('QTQuestionAnswerList', 'QTQuestionAnswerList.id', '=', 'qt_question_answer_id')
                        ->join('QTScenarios', 'QTScenarios.id', '=', 'qt_scenario_id')
                        ->join('__ModelTables', '__ModelTables.table_n', '=', 'QTAnswerScenarios.table_n');

                },
                //                'qt_pages.qt_blocks.qt_sets.questions.scenarios.answers'
            ])
            ->where('id', $questionnaire_template_id)
            ->get()
            ->toArray();


        $add_data_models = [];
        $QKinds = QTQuestionKind::has('answers')->select('id', 'question_kind_code')->with('answers')->get()->toArray();
        $referenced_question_kinds = QTQuestionKind::whereHas('question_type', function ($query) {
            $query->where('reference_l', true);
        })->with('question_type.model')->get()->toArray();
        //line_n: 2
        //question_name: "Банк/ филиал Банка, его местонахождение"
        //question_code: "bank_name"
        //question_width: 30
        //question_required_l: false
        $tableAttributes = QTQuestionKind::has('table')->with([
            'table',
            'table.attributes' => function ($query) {
                $query->select('question_type_code', 'qt_question_table_id', 'line_n', 'question_code', 'question_kind_code', 'question_name', 'question_width', 'question_required_l', 'reference_l')
                    ->join('QTQuestionKinds', 'QTQuestionKinds.id', '=', 'qt_question_kind_id')
                    ->join('QTQuestionTypes', 'QTQuestionTypes.id', '=', 'qt_question_type_id');
            }
        ])->get()->toArray();

        foreach ($QKinds as $key => $value) {
            $add_data_models[$value['question_kind_code']] = $value['answers'];
        }
        foreach ($tableAttributes as $key => $value) {
            $add_data_models[$value['question_kind_code']] ['table_attributes'] = $value['table']['attributes'];
            $add_data_models[$value['question_kind_code']]['table_params'] = [
                'default_lines_quantity' => $value['table']['default_lines_quantity'],
                'allow_appending' => $value['table']['allow_appending'],
                'view_table_in_set_l' => $value['table']['view_table_in_set_l']
            ];
        }

        foreach ($referenced_question_kinds as $key => $value) {
            $model = "\\App" . $value['question_type']['model']['table_folder'] . "\\" . $value['question_type']['model']['table_code'];
            $name = $value['question_type']['model']['table_output_template'];
            $add_data_models[$value['question_kind_code']] = $model::all('*', DB::raw("'" . $name . "' as name"));
        }
        return response()->json([
            'questionnaire_template' => $questionnaire_template,
            'add_data_models' => $add_data_models,
            "main_data_models" => [
                "Questionnaire" => [
                    []
                ]
            ]
        ]);
    }


    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back',
            'Main',
            'QuestionnaireTemplates',
            'Description',
            'Code',
            'Name',
            'Remark',
            'ActiveL',
            'DeleteMark',
            'Header',
            'Footer',
            'LineNumber',
            'CreatedAt',
            'CreatedBy',
            'UpdatedAt',
            'UpdatedBy'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $QuestionnaireTemplates = QuestionnaireTemplate::select('id', 'questionnaire_templates_name', 'questionnaire_templates_code', 'active_l', 'deleted_l')
            ->get()
            ->toArray();

        $QuestionnaireTemplates = json_decode(json_encode($QuestionnaireTemplates), true);

        $list = [
            "main_data_models" => [
                $mainModel => $QuestionnaireTemplates,
            ],
            "sets" => $this->getButtonsList([
                'list_bottom',
                'list_top',
                'list_top_dropdown_actions',
                'list_top_left_command_bar',
                'list_top_right_command_bar'
            ]),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['QuestionnaireTemplates']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line" => true,
                "form_type_list" => [
                    "form_card_url" => "",
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
                                    'key' => 'actions',
                                    'type' => 'checkbox',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                [
                                    'key' => 'questionnaire_templates_name',
                                    'sortable' => true,
                                    'class' => 'block_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => 'questionnaire_templates_code',
                                    'sortable' => true,
                                    'class' => 'block_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],
                                [
                                    'key' => 'deleted_l',
                                    'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['DeleteMark']['translation_captions']['caption_translation'],
                                    'class' => 'block_name',
                                    'thStyle' => 'width: 11%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'active_l',
                                    'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['ActiveL']['translation_captions']['caption_translation'],
                                    'class' => 'block_name',
                                    'thStyle' => 'width: 11%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],

                            ]
                        ]
                    ],
                ]
            ]
        ];

        return response()->json($list);

    }

    protected function cardQuery()
    {

        $request = request();

        $set_id = $request->get("id");

        $this->setIsNewObject($set_id === "new");

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
            $this->card_model = [QuestionnaireTemplate::query()->create(QuestionnaireTemplate::getNewObject())];


            //            $this->cardAdditionalQuery($this->card_model);
        } else {
            $this->card_model = QuestionnaireTemplate::query()->where('id', $request->id);

            //            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->get()->toArray();
        }

        return $this;
    }

    public function setCardCaptions()
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back',
            'Main',
            'QTSet',
            "QuestionKind",
            'Description',
            'Code',
            'Name',
            'Caption',
            'Remark',
            'ActiveL',
            'DeletedL',
            'LineNumber',
            'CreatedAt',
            'CreatedBy',
            "Width",
            'UpdatedAt',
            'UpdatedBy',
            'new',
            'SystemDetails',
            'QuestionnaireTemplate',

        ];

        $this->translateCardCaptions();

        return $this;
    }

    public function setCardBlockFields()
    {
        $this->card_block_fields = [
            [
                "tab_title" => $this->getTranslatedCardCaption('Main'),
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model" => $this->card_controller_alias,
                        "block_type" => "block_card",
                        "block_fields" => [
                            [
                                'title' => $this->getTranslatedCardCaption('Name'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'questionnaire_templates_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Code'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'questionnaire_templates_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                        ]
                    ], [
                        "block_zone_quantity" => 1,
                        "block_model" => $this->card_controller_alias,
                        "block_type" => "block_tree",
                        "tree_data" => $this->tree(new Request(['id' => $this->card_model[0]['id']]))->getOriginalContent(),
                        "block_fields" => [

                        ]
                    ],

                ],
            ],
            [
                "tab_title" => "Страницы шаблона анкеты [перевод]",
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => $this->getTranslatedCardCaption("TableColumns"),
                        "block_zone_quantity" => 1,
                        "block_model" => "QTPages",
                        "block_type" => "block_list_base",
                        'list_width' => '100%',

                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => [
                                'id' => null,
                                'questionnaire_templates_id' => $this->card_model[0]['id'],
                                'db_area_id' => self::getDefaultDBAreaId(),
                                'line_n' => null,
                                'page_name' => null,
                                'page_code' => null,
                                'page_description' => null,
                                'page_remark' => null,
                                'header' => null,
                                'footer' => null,
                                'caption_code' => null,
                                'deleted_l' => false,
                                'active_l' => true,
                                'created_by' => '',
                                'updated_by' => '',
                                'created_at' => '2019-11-08 10:48:02',
                                'updated_at' => '2019-11-08 10:48:02',
                            ],
                            "hide_pagination" => true,
                            "hide_search" => true,
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
                                'key' => 'page_name',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Name"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ], [
                                'key' => 'page_code',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Code"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                        ]
                    ]
                ]
            ],
        ];

        return $this;
    }

    public function setCardMainDataModels()
    {
        $this->card_main_data_models['QTPages'] = QTPage::where('questionnaire_templates_id', $this->card_model[0]['id'])->get()->toArray();
        return $this;
    }

    public function setCardFormTitle()
    {
        $this->card_form_title = 'QuestionnaireTemplate';

        return $this;
    }

    public function setCardLinks()
    {
        $this->card_links = [
            [
                "link_title" => "Предпросмотр",
                "link_img" => "",
                "link_type" => "internal_push",
                "link_url" => "/questionnairePreview"
            ]
        ];
        return $this;
    }

    public function copyTemplate(Request $request)
    {
        $template_id = $request->get("template_id");

        $template = QuestionnaireTemplate::query()
            ->with("qt_pages.qt_blocks.qt_sets.questions")
            ->find($template_id);

        if(!$template)
            return response()->json([
                "message" => "Неверный айди шаблона"
            ], 400);

        try
        {
            DB::beginTransaction();

            $new_template = $template->replicate();

            $new_template->push();

            foreach($new_template->qt_pages as $page)
            {
                $new_page = $page->replicate();

                $created_page = $new_template->qt_pages()->create($new_page->toArray());

                $new_page->id = $created_page->id;

                foreach($new_page->qt_blocks as $block)
                {
                    $new_block = $block->replicate();

                    $created_block = $new_page->qt_blocks()->create($new_block->toArray());

                    $new_block->id = $created_block->id;

                    foreach($new_block->qt_sets as $set)
                    {
                        $new_set = $set->replicate();

                        $created_set = $new_block->qt_sets()->create($new_set->toArray());

                        $new_set->id = $created_set->id;

                        foreach($new_set->questions as $question)
                        {
                            $new_question = $question->replicate();

                            $new_set->questions()->create($new_question->toArray());
                        }
                    }
                }
            }

            DB::commit();

            return response()->json([
                "message" => "Шаблон успешно скопирован"
            ]);
        }
        catch(\Exception $exception)
        {
            DB::rollBack();

            return response()->json([
                "message" => "Ошибка при копировании шаблона анкеты"
            ], 400);
        }

    }
}
