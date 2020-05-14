<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QTScenario extends Model
{
    protected $table = "QTScenarios";

    protected $primaryKey = "id";

    protected $fillable = [
        'scenario_name',
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
            'scenario_name'=>null,
            'deleted_l' => null,
            'active_l' => null,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }
}
