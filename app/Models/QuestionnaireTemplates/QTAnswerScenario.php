<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QTAnswerScenario extends Model
{
    protected $table = "QTAnswerScenarios";

    protected $primaryKey = "id";

    protected $fillable = [
        'qt_question_answer_id',
        'qt_sets_questions_list_id',
        'table_n',
        'row_id',
        'qt_scenario_id',
        'deleted_l',
        'active_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];


    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'qt_question_answer_id' => null,
            'qt_sets_questions_list_id' => null,
            'qt_scenario_id' => null,
            'table_n'=>null,
            'row_id'=>null,
            'deleted_l' => null,
            'active_l' => null,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }

//    public function answers()
//    {
//        return $this->hasMany('\App\Models\QuestionnaireTemplates\QTQuestionAnswerList', 'id', 'qt_question_answer_id');
//    }
}
