<?php

namespace App\Http\Controllers\Api\QuestionnaireTemplates;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Models\Caption;
use App\Models\QuestionnaireTemplates\QTBlock;
use App\Models\QuestionnaireTemplates\QTPage;
use App\Models\QuestionnaireTemplates\QuestionnaireTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class QTPagesController extends Controller
{
    use HasCard;

    public function list(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'QTPages',
            'Description', 'Code', 'Name',
            'Remark', 'ActiveL', 'DeleteMark',
            'Header', 'Footer', 'LineNumber',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
            'QuestionnaireTemplate'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $QTPages = DB::table('QTPages')
            ->join("QuestionnaireTemplates", "QuestionnaireTemplates.id", "=", "QTPages.questionnaire_templates_id")
            ->select('QTPages.id', 'QTPages.page_name', 'QTPages.page_code', 'QTPages.active_l', 'QTPages.deleted_l', 'QTPages.line_n', 'QTPages.questionnaire_templates_id',
                "QuestionnaireTemplates.questionnaire_templates_name")->get()->toArray();

        $QTPages = json_decode(json_encode($QTPages), true);

        $list = [
            "main_data_models" => [
                $mainModel => $QTPages,
            ],
            "add_data_models" => [
                "QuestionnaireTemplates" => QuestionnaireTemplate::all(["id", "questionnaire_templates_name"])
            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['QTPages']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => true,
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "list_header_break_line" => true,
                "form_type_list" => [
                    "form_card_url" => "QTPage",
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
                                    'key' => 'line_n',
                                    'sortable' => true,
                                    'class' => 'line_n',
                                    'label' => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],
                                [
                                    'key' => 'page_name',
                                    'sortable' => true,
                                    'class' => 'page_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],
                                [
                                    'key' => 'page_code',
                                    'sortable' => true,
                                    'class' => 'page_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 36%',
                                    "zone" => "1",
                                    "order" => "6"
                                ],
                            ]
                        ]
                    ],
                ]
            ],
            "dependent" => [
                "dependent_data_model" => $mainModel,
                "dependent_fields"     => [
                    "title"         => $getArrayCaptions['QuestionnaireTemplate']['translation_captions']['caption_translation'],
                    "type"          => "select",
                    "model" => "questionnaire_templates_id",
                    "options"       => [],
                    "options_data"  => [
                        "options_data_model"     => "QuestionnaireTemplates",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "questionnaire_templates_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ]
        ];

        return response()->json($list);

    }

    public function setCardCaptions()
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back', 'Main',
            'QTPage',
            'Description', 'Code', 'Name',
            'Remark', 'ActiveL', 'DeletedL',
            'Header', 'Footer', 'LineNumber',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'new', 'SystemDetails',
            'TableColumns', 'QuestionnaireTemplate'
        ];

        $this->translateCardCaptions();

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();

        $page_id = $request->get("id");

        $this->setIsNewObject($page_id === "new");

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
            $this->card_model = [QTPage::getNewObject()];

//            $this->cardAdditionalQuery($this->card_model);
        } else {
            $this->card_model = QTPage::query()
                ->join("QuestionnaireTemplates", "QuestionnaireTemplates.id", "=", "QTPages.questionnaire_templates_id")
                ->where('QTPages.id', $request->id)
                ->select(["QTPages.*", "QuestionnaireTemplates.questionnaire_templates_name"]);

//            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->get()->toArray();
        }

        return $this;
    }

    public function setCardMainDataModels()
    {
        $this->card_main_data_models['QTBlocks'] = QTBlock::where('qt_page_id', $this->card_model[0]['id'])->get()->toArray();

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
                                'model' => 'page_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Code'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'page_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Description'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'page_description',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '3'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Remark'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'page_remark',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '4'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Header'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'header',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '5'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('Footer'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'footer',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '6'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption('LineNumber'),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'line_n',
                                'width' => '25%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '7'
                            ],
                        ]
                    ],
                    [
                        "block_title" => $this->getTranslatedCardCaption("TableColumns"),
                        "block_zone_quantity" => 1,
                        "block_model" => "QTBlocks",
                        "block_type" => "block_list_base",
                        'list_width' => '100%',

                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => [
                                'id' => null,
                                'qt_page_id' => $this->card_model[0]['id'],
                                'db_area_id' => 6,
                                'line_n' => null,
                                'block_name' => null,
                                'block_code' => null,
                                'block_description' => null,
                                'block_remark' => null,
                                'caption_code' => null,
                                'deleted_l' => false,
                                'active_l' => true,
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
                                'thStyle' => 'width:10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'block_name',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Name"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'block_code',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Code"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'block_description',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Description"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'block_remark',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Remark"),
                                'thStyle' => 'width: 10%',
                                "validation" => ["required" => true]
                            ],[
                                'key' => 'caption_code',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Description"),
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

    public function setCardAddDataModels()
    {
        $this->card_add_data_models['QTBlocks'] = [];
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
                    "title"        => $this->getTranslatedCardCaption("QuestionnaireTemplate"),
                    "model"        => "questionnaire_templates_id",
                    "type"         => "label",
                    "options"      => [],
                    "options_data" => [
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "questionnaire_templates_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ];
        }

        return $this;
    }

    public function cardOld(Request $request)
    {
        $captionName = [

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
            $QTPage = [QTPage::getNewObject()];
        } else {

            $QTPage = QTPage::where('id', $request->id)->first()->toArray();

            $QTPage = [$QTPage];
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
                                'model' => 'page_name',
                                'width' => '50 % ',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'page_code',
                                'width' => '50 % ',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['Description']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'page_description',
                                'width' => '50 % ',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '3'
                            ],
                            [
                                'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'page_remark',
                                'width' => '50 % ',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '4'
                            ],
                            [
                                'title' => $getArrayCaptions['Header']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'header',
                                'width' => '50 % ',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '5'
                            ],
                            [
                                'title' => $getArrayCaptions['Footer']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'footer',
                                'width' => '50 % ',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '6'
                            ],
                            [
                                'title' => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'line_n',
                                'width' => '25 % ',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '7'
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
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100 % ', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100 % ', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100 % ', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100 % ', "zone" => "2", "order" => "2"],
                            [
                                'title' => $getArrayCaptions['ActiveL']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'active_l',
                                'width' => '25 % ',
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
                $mainModel => $QTPage,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['QTPage']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $QTPage[0]['page_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_type_list" => [
                ],
            ],
            "tabs" => $tabs
        ];

        return response()->json($card);
    }
}
