<?php

namespace App\Models\QuestionnaireTemplates;

use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of AccessRoles Model
 *
 * @author Miniar Rakhimkulov
 * 25.11.2019
 */
class QTQuestionKind extends Model
{
    use DefaultSystemParams;

    protected $table = "QTQuestionKinds";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'qt_question_type_id',
        'question_kind_name',
        'question_kind_code',
        'use_answer_list_l',
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
            'qt_question_type_id' => null,
            'question_kind_name' => null,
            'question_kind_code' => null,
            'use_answer_list_l' => false,
            'db_area_id' => self::getDefaultDBAreaId(),
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }

    public function question_type()
    {
        return $this->hasOne('\App\Models\QuestionnaireTemplates\QTQuestionType', 'id', 'qt_question_type_id');
    }

    public function answers()
    {
        return $this->hasMany('\App\Models\QuestionnaireTemplates\QTQuestionAnswerList', 'qt_question_kind_id', 'id');
    }

    public function table()
    {
        return $this->hasOne('\App\Models\QuestionnaireTemplates\QTQuestionTable', 'qt_question_kind_id', 'id');
    }


}
