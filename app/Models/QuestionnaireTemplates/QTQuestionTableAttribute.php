<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QTQuestionTableAttribute extends Model
{
    protected $table = "QTQuestionTableAttributes";

    protected $primaryKey = "id";

    protected $fillable = [
        'qt_question_table_id',
        'qt_question_kind_id',
        'line_n',
        'question_name',
        'question_code',
        'question_width',
        'question_required_l',
        'caption_code',
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
            'qt_question_table_id' => null,
            'question_kind_id' => null,
            'line_n' => null,
            'question_name' => null,
            'question_code' => null,
            'question_width' => null,
            'question_required_l' => null,
            'caption_code' => null,
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }

    public function question_kind()
    {

        return $this->hasOne(
            '\App\Models\QuestionnaireTemplates\QTQuestionKind','id','qt_question_kind_id');    }
}
