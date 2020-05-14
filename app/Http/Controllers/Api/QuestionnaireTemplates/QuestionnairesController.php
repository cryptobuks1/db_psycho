<?php

namespace App\Http\Controllers\Api\QuestionnaireTemplates;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\Questionnaires\Questionnaire;
use App\Models\Questionnaires\QuestionnaireQuestionAnswer;
use App\Models\Questionnaires\QuestionnaireQuestionAnswersTable;
use App\Models\QuestionnaireTemplates\QTSetsQuestionsList;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionnairesController extends Controller
{
    use HasList, HasCard;

    protected function listQuery()
    {
        $this->list_model = Questionnaire::query()->with([
            "consumer:id,consumer_name",
            "questionnaireTemplate:id,questionnaire_templates_name"
        ]);

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get()->map(function($element)
        {
            $element->consumer_name = $element->consumer->consumer_name;
            unset($element->consumer);

            $element->questionnaire_template_name = $element->questionnaireTemplate->questionnaire_templates_name;
            unset($element->questionnaireTemplate);

            return $element;
        });

        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "Questionnaires";

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [

            [
                "block_title"         => $this->getTranslatedListCaption("Questionnaires"),
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
                        'key'      => 'consumer_name',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("Consumer"),
                        'thStyle'  => 'width: 40%',
                        "zone"     => "1",
                        "order"    => "2"
                    ],
                    [
                        'key'      => 'questionnaire_template_name',
                        'sortable' => true,
                        'class'    => 'created_at',
                        "label"    => $this->getTranslatedListCaption("QuestionnaireTemplate"),
                        'thStyle'  => 'width: 40%',
                        "zone"     => "1",
                        "order"    => "3"
                    ],
                ]
            ]
        ];

        return $this;
    }

    public function questionnairePreview(Request $request, QuestionnaireTemplatesController $questionnaire_templates_controller)
    {
        $default_questionnaire_template_id = self::getParameter("DefaultQuestionnaireTemplateID");


        $controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $questionnaire_id = $request->id;

        if($questionnaire_id === "new")
        {
            $nameControllerMethod = [
                'controller' => class_basename(\Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }

            $questionnaire = Questionnaire::getNewObject();

            $questionnaire["questionnaire_templates_id"] = $default_questionnaire_template_id;
        }
        else
        {
            $questionnaire = Questionnaire::query()->find($questionnaire_id);

            if(!$questionnaire)
            {
                return abort('403');
            }

            if(!$questionnaire->questionnaire_templates_id)
            {
                $questionnaire->questionnaire_templates_id = $default_questionnaire_template_id;
                $questionnaire->save();
            }


            $answers_list = [];

            $answers = QuestionnaireQuestionAnswer::query()
                ->where("questionnaire_id", $questionnaire_id)
                ->with(["tablesAnswers.attribute", "answers.question_kind.question_type"])
                ->get()
                ->each(function(QuestionnaireQuestionAnswer $answer) use (&$answers_list)
                {
                    if($answer->tablesAnswers->count() > 0)
                    {
                        $grouped_answers = $answer->tablesAnswers->groupBy("line_n");

                        $answers_list[$answer->qt_sets_questions_list_id] = [];


                        foreach($grouped_answers as $line_n => $columns)
                        {
                            $row = ["line_n" => $line_n];

                            $columns->each(function($column) use (&$row, $answer)
                            {
                                $row[$column->attribute->question_code] = $column->question_answers_table_value;
                            });

                            $answers_list[$answer->qt_sets_questions_list_id][] = $row;
                        }
                    }
                    else
                    {
                        $answers_list[$answer->qt_sets_questions_list_id] = is_numeric($answer->question_answer_value) ? (int)$answer->question_answer_value : $answer->question_answer_value;
                    }
                });
        }

        $preview_request = new Request([
            "id" => $questionnaire->questionnaire_templates_id
        ]);

        $preview_data = $questionnaire_templates_controller->preview($preview_request)->getOriginalContent();


        $preview_data["main_data_models"] = [
            $controller_alias => [$questionnaire],
            'Questionnaire'   => [$answers_list ?? null]
        ];

        return $preview_data;
    }

    public function save(Request $request)
    {
        $controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $questionnaire_id = $request->get("main_data_models")["$controller_alias"][0]["id"];

        $questions = $request->get("main_data_models")["Questionnaire"][0];

        $questions_list = QTSetsQuestionsList::query()->with([
            "question_kind.question_type",
            "question_kind.table.attributes"
        ])->whereIn("id", array_filter(array_keys($questions), "is_int"))->get();

        foreach($questions as $question_id => $question_value)
        {
            if(!is_numeric($question_id))
                continue;

            $question = $questions_list->find($question_id);

            if(!$question || $question->id !== $question_id)
                continue;

            if($question->question_kind->question_type->question_type_code === "table")
            {
                $question_answer = QuestionnaireQuestionAnswer::query()
                    ->firstOrCreate([
                        "qt_sets_questions_list_id" => $question_id,
                        "questionnaire_id" => $questionnaire_id
                    ]);


                if(is_null($question_value))
                    continue;

                foreach($question_value as $table_row)
                {
                    if(!isset($table_row["status"]))
                        continue;

                    $line_n = $table_row["line_n"] ?? null;

                    if($table_row["status"] === 3)
                    {
                        QuestionnaireQuestionAnswersTable::query()
                            ->where([
                                "line_n" => $line_n,
                                "questionnaire_question_answer_id" => $question_answer->id
                            ])
                            ->delete();
                    }
                    elseif($table_row["status"] === 2)
                    {
                        foreach($table_row as $row_key => $row_value)
                        {
                            $attribute = $question->question_kind->table->attributes->where("question_code", $row_key)
                                ->first();

                            if(!$attribute)
                                continue;

                            $table_answer = new QuestionnaireQuestionAnswersTable();

                            $table_answer->questionnaire_question_answer_id = $question_answer->id;
                            $table_answer->qt_question_table_attribute_id = $attribute->id;
                            $table_answer->line_n = $line_n;
                            $table_answer->question_answers_table_value = $row_value;

                            $table_answer->save();

                        }
                    }
                    elseif($table_row["status"] === 1)
                    {
                        foreach($table_row as $row_key => $row_value)
                        {
                            $attribute = $question->question_kind->table->attributes->where("question_code", $row_key)
                                ->first();

                            if(!$attribute)
                                continue;

                            $table_answer = QuestionnaireQuestionAnswersTable::query()
                                ->where([
                                    "line_n" => $line_n,
                                    "questionnaire_question_answer_id" => $question_answer->id,
                                    "qt_question_table_attribute_id" => $attribute->id
                                ])
                                ->first();

                            $table_answer->question_answers_table_value = $row_value;

                            $table_answer->save();

                        }
                    }
                }

            }
            else
            {
                $question_answer = QuestionnaireQuestionAnswer::query()
                    ->firstOrCreate([
                        "qt_sets_questions_list_id" => $question_id,
                        "questionnaire_id" => $questionnaire_id
                    ]);

                $question_answer->question_answer_value = $question_value;

                if($question->question_kind->question_type->question_type_code === "date")
                {
                    $question_answer->question_answer_value = Carbon::parse($question_value)->format('Y-m-d');
                }
                if($question->question_kind->question_type->question_type_code === "time")
                {
                    $question_answer->question_answer_value = Carbon::parse($question_value)->toTimeString();
                }
                if($question->question_kind->question_type->question_type_code === "datetime")
                {
                    $question_answer->question_answer_value = Carbon::parse($question_value)->toDateTimeString();
                }
                $question_answer->save();
            }
        }

        return $this->questionnairePreview(new Request(["id" => $questionnaire_id]), new QuestionnaireTemplatesController());
    }

    public function saveTree(Request $request)
    {
        $main_model_name = $request["form_parameters"]["form_base_data_model"];


        try
        {
            return $this->savePages($request["main_data_models"][$main_model_name]);
        }
        catch(\Exception $exception)
        {
            return response()->json([
                "message" => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * @param array $pages
     * @return JsonResponse|array
     * @throws \Exception
     */
    private function savePages($pages)
    {
        $pages_controller_alias = \App\Models\Controller::query()
            ->where("controller_code", "QTPagesController")
            ->value("controller_alias");

        $pages_controller = new QTPagesController();

        foreach($pages as $page)
        {
            if(isset($page["status"]) && ($page["status"] === 1 || $page["status"] === 2))
            {
                $write_request = new Request([
                    "form_parameters"  => [
                        "form_base_data_model" => $pages_controller_alias
                    ],
                    "main_data_models" => [
                        $pages_controller_alias => [$page]
                    ]
                ]);

                $write_result = $pages_controller->write($write_request)->getOriginalContent();

                if(isset($write_result["error"]) && $write_result["error"] === true)
                {
                    throw new \Exception($write_result["message"]);
                }

                if($page["status"] === 2)
                    $page["id"] = $write_result["id"];
            }

            $this->saveBlocks($page["qt_blocks"] ?? [], $page["id"]);
        }

        $questionnaire_templates_controller = new QuestionnaireTemplatesController();

        return $questionnaire_templates_controller->tree(new Request(["id" => $pages[0]["questionnaire_templates_id"] ?? null]));
    }

    /**
     * @param array $blocks
     * @param int $page_id
     * @throws \Exception
     */
    private function saveBlocks($blocks, $page_id)
    {
        $blocks_controller_alias = \App\Models\Controller::query()
            ->where("controller_code", "QTBlocksController")
            ->value("controller_alias");

        $blocks_controller = new QTBlocksController();

        foreach($blocks as $block)
        {
            if(isset($block["status"]) && ($block["status"] === 1 || $block["status"] === 2))
            {
                if($block["status"] === 2)
                    $block["qt_page_id"] = $page_id;

                $write_request = new Request([
                    "form_parameters"  => [
                        "form_base_data_model" => $blocks_controller_alias
                    ],
                    "main_data_models" => [
                        $blocks_controller_alias => [$block]
                    ]
                ]);

                $write_result = $blocks_controller->write($write_request)->getOriginalContent();

                if(isset($write_result["error"]) && $write_result["error"] === true)
                {
                    throw new \Exception($write_result["message"]);
                }

                if($block["status"] === 2)
                    $block["id"] = $write_result["id"];
            }

            $this->saveSets($block["qt_sets"] ?? [], $block["id"]);
        }
    }

    /**
     * @param array $sets
     * @param int $block_id
     * @throws \Exception
     */
    private function saveSets($sets, $block_id)
    {
        $sets_controller_alias = \App\Models\Controller::query()
            ->where("controller_code", "QTSetsController")
            ->value("controller_alias");

        $sets_controller = new QTSetsController();

        foreach($sets as $set)
        {
            if(isset($set["status"]) && ($set["status"] === 1 || $set["status"] === 2))
            {
                if($set["status"] === 2)
                    $set["qt_block_id"] = $block_id;

                $write_request = new Request([
                    "form_parameters"  => [
                        "form_base_data_model" => $sets_controller_alias
                    ],
                    "main_data_models" => [
                        $sets_controller_alias => [$set]
                    ]
                ]);

                $write_result = $sets_controller->write($write_request)->getOriginalContent();

                if(isset($write_result["error"]) && $write_result["error"] === true)
                {
                    throw new \Exception($write_result["message"]);
                }

                if($set["status"] === 2)
                    $set["id"] = $write_result["id"];
            }

            $this->saveQuestions($set["questions"] ?? [], $set["id"]);
        }
    }

    /**
     * @param array $questions
     * @param int $set_id
     * @throws \Exception
     */
    private function saveQuestions($questions, $set_id)
    {
        $questions_controller_alias = \App\Models\Controller::query()
            ->where("controller_code", "QTSetsQuestionsListController")
            ->value("controller_alias");

        $questions_controller = new QTSetsQuestionsListController();

        foreach($questions as $question)
        {
            if(isset($question["status"]) && ($question["status"] === 1 || $question["status"] === 2))
            {
                if($question["status"] === 2)
                    $question["qt_set_id"] = $set_id;

                $write_request = new Request([
                    "form_parameters"  => [
                        "form_base_data_model" => $questions_controller_alias
                    ],
                    "main_data_models" => [
                        $questions_controller_alias => [$question]
                    ]
                ]);

                $write_result = $questions_controller->write($write_request)->getOriginalContent();

                if(isset($write_result["error"]) && $write_result["error"] === true)
                {
                    throw new \Exception($write_result["message"]);
                }
            }
        }
    }

    public function copyQuestionnaire(Request $request)
    {
        $questionnaire_id = $request->get("questionnaire_id");

        $questionnaire = Questionnaire::query()
            ->with("questionnaireQuestionAnswer.tablesAnswers")
            ->find($questionnaire_id);

        if(!$questionnaire)
            return response()->json([
                "message" => "Неверный айди анкеты"
            ], 400);

        try
        {
            \DB::beginTransaction();

            $new_questionnaire = $questionnaire->replicate();

            $new_questionnaire->push();

            foreach($new_questionnaire->questionnaireQuestionAnswer as $answer)
            {
                $new_answer = $answer->replicate();

                $created_answer = $new_questionnaire->questionnaireQuestionAnswer()->create($new_answer->toArray());

                $new_answer->id = $created_answer->id;

                foreach($new_answer->tablesAnswers as $table_answer)
                {
                    $new_table_answer = $table_answer->replicate();

                    $new_answer->tablesAnswers()->create($new_table_answer->toArray());
                }
            }

            \DB::commit();

            return response()->json([
                "message" => "Анкета успешно скопирована"
            ]);
        }
        catch(\Exception $exception)
        {
            \DB::rollBack();

            return response()->json([
                "message" => "Ошибка при копировании анкеты"
            ], 400);
        }
    }
}
