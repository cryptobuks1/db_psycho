<?php

namespace App\Http\Controllers\Api\QuestionnaireTemplates;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Models\ModelTables;
use App\Models\QuestionnaireTemplates\QTQuestionKind;
use App\Models\QuestionnaireTemplates\QTQuestionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class QTQuestionTypesController extends Controller
{
    use HasCard;

    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'QTQuestionKinds', 'Code', 'Name',
            'ActiveL', 'DeletedL',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $types = QTQuestionType::all(["id", "question_type_name", "question_type_code"]);

        $list = [
            "main_data_models" => [
                $mainModel => $types,
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
                                    'key' => 'question_type_name',
                                    'sortable' => true,
                                    'class' => 'question_type_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 50%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => 'question_type_code',
                                    'sortable' => true,
                                    'class' => 'question_type_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 50%',
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
            'TableColumns', 'ValidationRules', 'Model', 'Reference',
            'QuestionType', 'new'
        ];

        $this->translateCardCaptions();

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();

        $type_id = $request->get("id");

        $this->setIsNewObject($type_id === "new");

        if ($this->isNewObject()) {
            $nameControllerMethod = [
                'controller' => class_basename(\Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if ($access === false) {
                return abort('403');
            }
            $this->card_model = [QTQuestionType::getNewObject()];

            $this->cardAdditionalQuery($this->card_model);
        } else {
            $this->card_model = QTQuestionType::query()
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
                                'model' => 'question_type_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption("Code"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'question_type_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption("Reference"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'reference_l',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'perform_action' => true,
                                'action_link'    => '/admin/qt/question/type/fields',
                                'zone' => '1',
                                'order' => '3'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption("Model"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'table_n',
                                'width' => '50%',
                                'type' => 'vue-select',
//                                'perform_action' => true,
//                                'action_link' => '/admin/qt/question/kind/fields',
                                "show_condition" => function($current_block)
                                {
                                    if($this->card_model[0]["reference_l"] === true)
                                    {
                                        $this->card_add_data_models = [
                                            "ModelTables" => ModelTables::all(["id", "table_n", "table_code"])
                                        ];

                                        return true;
                                    }
                                    else
                                        return false;
                                },
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "ModelTables",
                                    "options_field_id" => "table_n",
                                    "options_field_title" => "table_code",
                                    "search" => ""
                                ],
                                'zone' => '1',
                                'order' => '4'
                            ],
                        ]
                    ],
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

        $type_id = $main_model[0]["id"];

        $this->setIsNewObject($type_id === "new");

        $this->setCardCaptions()
            ->setCardAddDataModels()
            ->setCardBlockFields()
            ->setCardSystemTab();

        $data = [
            "tabs" => $this->getCardBlockFields(),
            "main_data_models" => $this->card_main_data_models,
            "add_data_models" => $this->getCardAddDataModels()
        ];

        return $data;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = "QuestionType";

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = (!$this->isNewObject())
            ? $this->card_model[0]["question_type_name"]
            : $this->getTranslatedCardCaption("new");

        return $this;
    }
}
