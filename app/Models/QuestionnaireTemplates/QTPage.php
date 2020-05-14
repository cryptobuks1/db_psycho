<?php

namespace App\Models\QuestionnaireTemplates;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of AccessRoles Model
 *
 * @author Miniar Rakhimkulov
 * 25.11.2019
 */
class QTPage extends Model
{

    protected $table = "QTPages";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'questionnaire_templates_id',
        'line_n',
        'page_name',
        'page_code',
        'page_description',
        'page_remark',
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

    public static function getNewObject($questionnaire_templates_id=null)
    {
        return [
            'id' => null,
            'questionnaire_templates_id' => $questionnaire_templates_id,
            'db_area_id' => 6,
            'line_n' => null,
            'page_name' => null,
            'page_code' => null,
            'page_description' => null,
            'page_remark' => null,
            'header' => null,
            'footer' => null,
            'caption_code' => null,
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-08 10:48:02',
            'updated_at' => '2019-11-08 10:48:02',
        ];
    }

    public function qt_blocks()
    {
        return $this->hasMany('App\Models\QuestionnaireTemplates\QTBlock', 'qt_page_id', 'id');
    }

    public function questionnaire_template()
    {
        return $this->hasOne(QuestionnaireTemplate::class, "id", "questionnaire_templates_id");
    }
}
