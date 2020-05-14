<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\DefaultSystemParams;

class CalculationTemplateParameterSetting extends Model
{
    use DefaultSystemParams;
    protected $table = "CalculationTemplateParameterSettings";

    protected $primaryKey = "id";

    protected $fillable = [
        'calculation_template_id',
        'extension_one_additional_detail_id',
        'db_area_id',
        'line_n',
        'number_more',
        'number_less',
        'actual_l',
        'deleted_l',
        'edit_l',
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
            'id'                                 => null,
            'calculation_template_id'            => null,
            'extension_one_additional_detail_id' => null,
            'line_n'                             => null,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => '',
            'actual_l'                           => true,
            'deleted_l'                          => false,
            'required_l'                         => false,
            'edit_l'                             => true,
            'db_area_id'                         => self::getDefaultDBAreaId(),
            'created_at'                         => '',
            'created_by'                         => '',
            'updated_at'                         => '',
            'updated_by'                         => '',
        ];
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function calculationTemplate()
    {
        return $this->hasOne('App\Models\CalculationTemplate', 'id', 'calculation_template_id');
    }

    public function extensionOneAdditionalDetail()
    {
        return $this->hasOne('App\Models\ExtensionOneAdditionalDetail', 'id', 'extension_one_additional_detail_id');
    }
}
