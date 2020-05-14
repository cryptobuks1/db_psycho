<?php

namespace App\Models\QuestionnaireTemplates;

use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Model;

class QTQuestionTable extends Model
{
    use DefaultSystemParams;

    protected $table = "QTQuestionTables";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'qt_question_kind_id',
        'default_lines_quantity',
        'allow_appending',
        'view_table_in_set_l',
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
            'db_area_id' => self::getDefaultDBAreaId(),
            'qt_question_kind_id' => null,
            'default_lines_quantity' => null,
            'allow_appending' => null,
            'view_table_in_set_l' => null,
            'deleted_l' => null,
            'active_l' => null,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }

    public function attributes()
    {
        return $this->hasMany('\App\Models\QuestionnaireTemplates\QTQuestionTableAttribute', 'qt_question_table_id', 'id');
    }
}
