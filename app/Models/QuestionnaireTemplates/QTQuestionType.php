<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QTQuestionType extends Model
{
    protected $table = "QTQuestionTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'table_n',
        'question_type_name',
        'question_type_code',
        'reference_l',
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
            'table_n'=>null,
            'question_type_name'=>null,
            'question_type_code'=>null,
            'reference_l'=>null,
            'deleted_l'=>null,
            'active_l'=>null,
            'created_by'=>'',
            'updated_by'=>'',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }
    public function model(){
        return $this->hasOne('\App\Models\ModelTables', 'table_n', 'table_n');
    }
}
