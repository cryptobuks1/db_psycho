<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QTQuestionAnswerList extends Model
{
    protected $table = "QTQuestionAnswerList";

    protected $primaryKey = "id";

    protected $fillable = [
        'qt_question_kind_id',
        'question_answer_value',
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
            'qt_question_kind_id'=>null,
            'question_answer_value'=>null,
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }
}
