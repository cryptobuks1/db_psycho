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
class QTBlock extends Model
{
    use DefaultSystemParams;
    protected $table = "QTBlocks";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'qt_page_id',
        'line_n',
        'block_name',
        'block_code',
        'block_description',
        'block_remark',
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
            'db_area_id' => self::getDefaultDBAreaId(),
            'qt_page_id' => null,
            'line_n' => null,
            'block_name' => null,
            'block_code' => null,
            'block_description' => null,
            'block_remark' => null,
            'caption_code' => null,
            'deleted_l' => false,
            'active_l' => true,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-26 12:00:00',
            'updated_at' => '2019-11-26 12:00:00',
        ];
    }

    public function qt_sets()
    {
        return $this->hasMany('App\Models\QuestionnaireTemplates\QTSet', 'qt_block_id', 'id');
    }

    public function qt_page()
    {
        return $this->hasOne(QTPage::class, "id", "qt_page_id");
    }
}
