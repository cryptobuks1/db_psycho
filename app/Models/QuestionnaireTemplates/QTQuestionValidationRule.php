<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of AccessRoles Model
 *
 * @author Miniar Rakhimkulov
 * 30.12.2019
 */
class QTQuestionValidationRule extends Model
{

    protected $table = "QTQuestionValidationRules";

    protected $primaryKey = "id";

    protected $fillable = [
        'qt_validation_rule_id',
        'qt_question_kind_id',
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
            'qt_validation_rule_id' => null,
            'qt_question_kind_id' => null,
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-08 10:48:02',
            'updated_at' => '2019-11-08 10:48:02',
        ];
    }

    public function qt_validation_rule()
    {
        return $this->hasOne('App\Models\QuestionnaireTemplates\QTValidationRule', 'id', 'qt_validation_rule_id');
    }

    public function qt_question_kind()
    {
        return $this->hasOne('App\Models\QuestionnaireTemplates\QTQuestionKind', 'id', 'qt_question_kind_id');
    }
}
