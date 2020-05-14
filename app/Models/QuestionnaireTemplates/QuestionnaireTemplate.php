<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireTemplate extends Model
{
    protected $table = "QuestionnaireTemplates";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'form_name',
        'message',
        'questionnaire_templates_name',
        'questionnaire_templates_code',
        'description',
        'remark',
        'header',
        'footer',
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
            'db_area_id'=>6,
            'form_name'=>null,
            'message'=>null,
            'questionnaire_templates_name'=>null,
            'questionnaire_templates_code'=>null,
            'description'=>null,
            'remark'=>null,
            'header'=>null,
            'footer'=>null,
            'caption_code'=>null,
            'deleted_l'=>null,
            'active_l'=>null,
            'created_by'=>null,
            'updated_by'=>null,
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }

    public function qt_pages(){
        return $this->hasMany('App\Models\QuestionnaireTemplates\QTPage','questionnaire_templates_id','id');
    }
}
