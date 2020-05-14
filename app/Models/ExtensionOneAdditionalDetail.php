<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\DefaultSystemParams;

class ExtensionOneAdditionalDetail extends Model
{
    use DefaultSystemParams;
    protected $table = "ExtensionOneAdditionalDetails";

    protected $primaryKey = "id";

    protected $fillable = [
        'calculation_parameter_type_id',
        'one_additional_detail_code',
        'one_add_detail_id',
        'db_area_id',
        'answer_list_l',
        'actual_l',
        'deleted_l',
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
            'id'                            => null,
            'calculation_parameter_type_id' => null,
            'one_additional_detail_code'    => null,
            'one_add_detail_id'             => null,
            'answer_list_l'                 => false,
            'actual_l'                      => true,
            'deleted_l'                     => false,
            'db_area_id'                    => self::getDefaultDBAreaId(),
            'created_at'                    => '',
            'created_by'                    => '',
            'updated_at'                    => '',
            'updated_by'                    => '',
        ];
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function calculationParameterType()
    {
        return $this->hasOne('App\Models\CalculationParameterType', 'id', 'calculation_parameter_type_id');
    }

    public function OneAdditionalDetails()
    {
        return $this->hasOne('App\Models\ONE\OneAdditionalDetail', 'id', 'one_add_detail_id');
    }

    public function calculationTemplateParameterSettings()
    {
        return $this->hasMany('App\Models\CalculationTemplateParameterSetting', 'extension_one_additional_detail_id', 'id');
    }

    public function calculationParameterAnswerList()
    {
        return $this->hasMany('App\Models\CalculationParameterAnswerList', 'extension_one_additional_detail_id', 'id');
    }
}
