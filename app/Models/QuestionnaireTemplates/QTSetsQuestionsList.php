<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QTSetsQuestionsList extends Model
{
    protected $table = "QTSetsQuestionsList";

    protected $primaryKey = "id";

    protected $fillable = [
        'qt_question_kind_id',
        'qt_set_id',
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
            'qt_question_kind_id' => null,
            'qt_set_id' => null,
            'line_n' => null,
            'question_name' => null,
            'question_code' => null,
            'question_width' => null,
            'question_required_l' => null,
            'caption_code' => null,
            'deleted_l' => null,
            'active_l' => null,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }

    public function question_kind()
    {
        return $this->hasOne('\App\Models\QuestionnaireTemplates\QTQuestionKind', 'id', 'qt_question_kind_id');
    }
    public function set()
    {
        return $this->hasOne('\App\Models\QuestionnaireTemplates\QTSet', 'id', 'qt_set_id');
    }
    public function scenarios(){
        return $this->hasMany('\App\Models\QuestionnaireTemplates\QTAnswerScenario','qt_sets_questions_list_id','id');
    }
    public function validations()
    {
        return $this->hasManyThrough(
            '\App\Models\QuestionnaireTemplates\QTQuestionValidationRule',
            '\App\Models\QuestionnaireTemplates\QTQuestionKind',
            'id', // Foreign key on users table...
            'qt_question_kind_id', // Foreign key on posts table...
            'qt_question_kind_id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }

    public function dependent_fields()
    {
        return $this->hasMany(QTDependentField::class, "qt_sets_questions_list_id", "id");
    }

    public function owner_question()
    {
        return $this->hasOne(QTDependentField::class, "qt_dependent_field_id", "id");
    }

    public function dependent_question()
    {
        return $this->hasOne(QTDependentField::class, "qt_sets_questions_list_id", "id");
    }

}
