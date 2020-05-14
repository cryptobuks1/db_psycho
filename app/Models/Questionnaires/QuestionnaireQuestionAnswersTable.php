<?php

namespace App\Models\Questionnaires;

use App\Models\QuestionnaireTemplates\QTQuestionTableAttribute;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireQuestionAnswersTable extends Model
{
    protected $table = "QuestionnaireQuestionAnswersTables";

    protected $primaryKey = "id";

    protected $fillable = [
        "questionnaire_question_answer_id",
        "qt_question_table_attribute_id",
        "line_n",
        "question_answers_table_value",
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function attribute()
    {
        return $this->hasOne(QTQuestionTableAttribute::class, 'id', 'qt_question_table_attribute_id');
    }

}
