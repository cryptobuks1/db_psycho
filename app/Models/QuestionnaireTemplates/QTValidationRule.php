<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of AccessRoles Model
 *
 * @author Miniar Rakhimkulov
 * 30.12.2019
 */
class QTValidationRule extends Model
{

    protected $table = "QTValidationRules";

    protected $primaryKey = "id";

    protected $fillable = [
        'qt_validation_id',
        'validation_rule_name',
        'validation_value',
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
            'qt_validation_id' => null,
            'validation_rule_name' => null,
            'validation_value' => null,
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-08 10:48:02',
            'updated_at' => '2019-11-08 10:48:02',
        ];
    }

    public function qt_validations()
    {
        return $this->hasOne('App\Models\QuestionnaireTemplates\QTValidation', 'id', 'qt_validation_id');
    }

    public function qt_question_validation_rules()
    {
        return $this->hasMany('App\Models\QuestionnaireTemplates\QTQuestionValidationRule', 'qt_validation_rule_id', 'id');
    }
}
