<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QTAnswerScenarioObjects extends Model
{
    protected $table = "QTAnswerScenario";

    protected $primaryKey = "id";

    protected $fillable = [

        'qt_answer_scenario_id',
        'table_n',
        'row_id',
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
            'qt_answer_scenario_id'=>null,
            'table_n'=>null,
            'row_id'=>null,
            'deleted_l' => null,
            'active_l' => null,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }
}
