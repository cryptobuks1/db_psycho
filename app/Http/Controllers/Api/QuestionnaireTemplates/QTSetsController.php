<?php

namespace App\Http\Controllers\Api\QuestionnaireTemplates;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Models\Caption;
use App\Models\QuestionnaireTemplates\QTBlock;
use App\Models\QuestionnaireTemplates\QTQuestionKind;
use App\Models\QuestionnaireTemplates\QTSet;
use App\Models\QuestionnaireTemplates\QTSetsQuestionsList;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class QTSetsController extends Controller
{
    use HasCard;

    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'QTSets',
            'Description', 'Code', 'Name',
            'Remark', 'ActiveL', 'DeleteMark',
            'Header', 'Footer', 'LineNumber',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
            'QTBlock'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $QTSets = DB::table('QTSets')
            ->join("QTBlocks", "QTBlocks.id", "=", "QTSets.qt_block_id")
            ->select('QTSets.id', 'QTSets.question_set_name', 'QTSets.question_set_code', 'QTSets.active_l', 'QTSets.deleted_l',
                'QTBlocks.block_name')->get()->toArray();

        $QTSets = json_decode(json_encode($QTSets), true);

        $list = [
            "main_data_models" => [
                $mainModel => $QTSets,
            ],
            "add_data_models" => [
                "QTBlocks" => QTBlock::all(["id", "block_name"])
            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['QTSets']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => true,
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line" => true,
                "form_type_list" => [
                    "form_card_url" => "QTSet",
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
                                    'class' => 'block_name',
                                    'thStyle' => 'width: 11%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                [
                                    'key' => 'active_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['ActiveL']['translation_captions']['caption_translation'],
                                    'class' => 'block_name',
                                    'thStyle' => 'width: 11%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                [
                                    'key' => 'question_set_name',
                                    'sortable' => true,
                                    'class' => 'block_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => 'question_set_code',
                                    'sortable' => true,
                                    'class' => 'block_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "5"
                                ]
                            ]
                        ]
                    ],
                ]
            ],
            "dependent" => [
                "dependent_data_model" => $mainModel,
                "dependent_fields"     => [
                    "title"         => $getArrayCaptions['QTBlock']['translation_captions']['caption_translation'],
                    "type"          => "select",
                    "model" => "qt_block_id",
                    "options"       => [],
                    "options_data"  => [
                        "options_data_model"     => "QTBlocks",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "block_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
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
            $this->card_model = [QTSet::getNewObject()];

//            $this->cardAdditionalQuery($this->card_model);
        } else {
            $this->card_model = QTSet::query()
                ->with("block.qt_page.questionnaire_template")
                ->where('id', $request->id);

//            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->get()
                ->map(function($item)
                {
                    $item->dependent_label = $item->block->qt_page->questionnaire_template->questionnaire_templates_name . " → " . $item->block->qt_page->page_name
                                             . " → " . $item->block->block_name;

                    return $item;
                })->toArray();
        }

        return $this;
    }

    public function setCardCaptions()
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back', 'Main',
            'QTSet', "QuestionKind",
            'Description', 'Code', 'Name', 'Caption',
            'Remark', 'ActiveL', 'DeletedL', 'LineNumber',
            'CreatedAt', 'CreatedBy', "QuestionWidth",
            'UpdatedAt', 'UpdatedBy', 'new', 'SystemDetails', 'SetPosition'
        ];

        $this->translateCardCaptions();

        return $this;
    }

    public function setCardMainDataModels()
    {
        $this->card_main_data_models['QTSetsQuestionsList'] = QTSetsQuestionsList::where('qt_set_id', $this->card_model[0]['id'])->get()->toArray();

        return $this;
    }

    public function setCardAddDataModels()
    {
        $qt_question_kinds = QTQuestionKind::all('id', 'question_kind_name', 'question_kind_code')->toArray();
        $this->card_add_data_models = [
            "QTQuestionKinds" => $qt_question_kinds,
        ];
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
                                'model' => 'question_set_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Code'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'question_set_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Description'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'question_set_description',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '3'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Remark'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'question_set_remark',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '4'
                            ], [
                                'title' => $this->getTranslatedCardCaption('LineNumber'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'line_n',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '4'
                            ], [
                                'title' => $this->getTranslatedCardCaption('Caption'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'caption_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '4'
                            ],
                        ]
                    ],
                    [
                        "block_title" => $this->getTranslatedCardCaption("TableColumns"),
                        "block_zone_quantity" => 1,
                        "block_model" => "QTSetsQuestionsList",
                        "block_type" => "block_list_base",
                        'list_width' => '100%',

                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => [
                                'id' => null,
                                'qt_set_id' => $this->card_model[0]['id'],
                                'line_n' => null,
                                'question_name' => null,
                                'question_code' => null,
                                'qt_question_kind_id' => null,
                                'question_required_l' => null,
                                'question_description' => null,
                                'caption_code' => null,
                                'deleted_l' => false,
                                'active_l' => true,
                            ],
                            "hide_pagination" => true,
                            "hide_search" => true
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
                                'thStyle' => 'width:10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'question_name',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Name"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'question_code',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Code"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'qt_question_kind_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => $this->getTranslatedCardCaption("QuestionKind"),
                                'thStyle' => 'width: 10%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "QTQuestionKinds",
                                    "options_field_id" => "id",
                                    "options_field_title" => "question_kind_name",
                                    "search" => ""
                                ]
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
                                'key' => 'question_description',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Description"),
                                'thStyle' => 'width: 10%',
                            ],
                            [
                                'key' => 'caption_code',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Caption"),
                                'thStyle' => 'width: 10%',
                            ],
                        ]
                    ]
                ],
            ]];
        return $this;
    }

    public function setCardMainDataModelName()
    {
        $this->card_main_data_model_name = ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]["question_set_name"];

        return $this;
    }

    public function setCardFormTitle()
    {
        $this->card_form_title = 'QTSet';
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
                    "title"        => $this->getTranslatedCardCaption("SetPosition"),
                    "model"        => "qt_block_id",
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

    public function beforeWriteBe(&$bCancel)
    {
        $questions = $this->main_data_models['QTSetsQuestionsList'] ?? [];

        $question_kind_ids=Arr::pluck($questions,'qt_question_kind_id');

        $table_question_kinds = QTQuestionKind::whereIn('id',$question_kind_ids)->whereHas('question_type', function($query){
           $query->where('question_type_code', 'table');
        })->count();

        if($table_question_kinds===1&& count($questions)>1){
            $bCancel=true;
            return ["message"=>'Табличная часть должна находится в отдельном наборе'];
        }

    }

    public function cardOld(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'QTSet',
            'Description', 'Code', 'Name',
            'Remark', 'ActiveL', 'DeletedL', 'LineNumber',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'new', 'SystemDetails'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        if (strpos($request->id, 'new') !== false) {
            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if ($access === false) {
                return abort('403');
            }
            $QTSet = [QTSet::getNewObject()];
        } else {

            $QTSet = QTSet::where('id', $request->id)->first()->toArray();

            $QTSet = [$QTSet];
        }

        $tabs = [
            [
                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            [
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'question_set_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'question_set_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['Description']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'question_set_description',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '3'
                            ],
                            [
                                'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'question_set_remark',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '4'
                            ],
                        ]
                    ]
                ]
            ],
        ];
        if ($formShowParam['show_system_tab']) {
            $tabSystem = [
                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                            [
                                'title' => $getArrayCaptions['ActiveL']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'active_l',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'zone' => '1',
                                'order' => '5'
                            ],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),
            "main_data_models" => [
                $mainModel => $QTSet,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['QTSet']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $QTSet[0]['question_set_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_type_list" => [
                ],
            ],
            "tabs" => $tabs
        ];

        return response()->json($card);
    }
}
