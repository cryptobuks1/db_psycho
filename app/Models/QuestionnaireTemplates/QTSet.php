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
class QTSet extends Model
{

    use DefaultSystemParams;
    protected $table = "QTSets";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'qt_block_id',
        'line_n',
        'question_set_name',
        'question_set_code',
        'question_set_description',
        'question_set_remark',
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
            'id'                       => null,
            'db_area_id'               => self::getDefaultDBAreaId(),
            'question_set_name'        => null,
            'question_set_code'        => null,
            'question_set_description' => null,
            'question_set_remark'      => null,
            'deleted_l'                => false,
            'active_l'                 => true,
            'created_by'               => '',
            'updated_by'               => '',
            'created_at'               => '2019-11-26 12:00:00',
            'updated_at'               => '2019-11-26 12:00:00',
        ];
    }

    public function questions()
    {
        return $this->hasMany('App\Models\QuestionnaireTemplates\QTSetsQuestionsList', 'qt_set_id', 'id');
    }

    public function block()
    {
        return $this->hasOne('App\Models\QuestionnaireTemplates\QTBlock', 'id', 'qt_block_id');
    }

}
