<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QTDependentField extends Model
{
    protected $table = "QTDependentFields";

    protected $primaryKey = "id";

    protected $fillable = [
        'qt_sets_questions_list_id',
        'qt_dependent_field_id',
        'qt_dependent_foreign_key',
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

    public static function getNewObject($question_id = null)
    {
        return [
            'id' => null,
            'qt_sets_questions_list_id'=>$question_id,
            'qt_dependent_field_id'=>null,
            'qt_dependent_foreign_key'=>null,
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-08 10:48:02',
            'updated_at' => '2019-11-08 10:48:02',
        ];
    }
}
