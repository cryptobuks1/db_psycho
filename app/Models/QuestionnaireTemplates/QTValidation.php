<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of AccessRoles Model
 *
 * @author Miniar Rakhimkulov
 * 30.12.2019
 */
class QTValidation extends Model
{

    protected $table = "QTValidations";

    protected $primaryKey = "id";

    protected $fillable = [
        'validation_name',
        'validation_code',
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
            'validation_name' => null,
            'validation_code' => null,
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2020-01-01 09:00:00',
            'updated_at' => '2020-01-01 09:00:00',
        ];
    }

    public function qt_validation_rules()
    {
        return $this->hasMany('App\Models\QuestionnaireTemplates\QTValidationRule', 'qt_validation_id', 'id');
    }
}
