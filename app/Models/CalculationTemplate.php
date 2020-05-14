<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\DefaultSystemParams;

class CalculationTemplate extends Model
{
    use DefaultSystemParams;
    protected $table = "CalculationTemplates";

    protected $primaryKey = "id";

    protected $fillable = [
        'calculation_template_code',
        'calculation_template_name',
        'db_area_id',
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
            'id'                        => null,
            'calculation_template_code' => null,
            'calculation_template_name' => null,
            'actual_l'                  => true,
            'deleted_l'                 => false,
            'db_area_id'                => self::getDefaultDBAreaId(),
            'created_at'                => '',
            'created_by'                => '',
            'updated_at'                => '',
            'updated_by'                => '',
        ];
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function calculationTemplateParameterSettings()
    {
        return $this->hasMany('App\Models\CalculationTemplateParameterSettings', 'calculation_template_id', 'id');
    }

}
