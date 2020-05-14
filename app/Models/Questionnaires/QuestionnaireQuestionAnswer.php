<?php

namespace App\Models\Questionnaires;

use App\Models\QuestionnaireTemplates\QTSetsQuestionsList;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireQuestionAnswer extends Model
{
    protected $table = "QuestionnaireQuestionAnswers";

    protected $primaryKey = "id";

    protected $fillable = [
        'qt_sets_questions_list_id',
        'questionnaire_id',
        'question_answer_value',
        "deleted_l",
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function tablesAnswers()
    {
        return $this->hasMany(QuestionnaireQuestionAnswersTable::class, "questionnaire_question_answer_id", "id");
    }

    public function answers()
    {
        return $this->hasMany(QTSetsQuestionsList::class, "id", "qt_sets_questions_list_id");
    }
}
