<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\DefaultSystemParams;

class CalculationParameterType extends Model
{
    use DefaultSystemParams;
    protected $table = "CalculationParameterTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'calculation_parameter_type_code',
        'calculation_parameter_type_name',
        'table_n',
        'reference_l',
        'active_l',
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
            'id'                              => null,
            'calculation_parameter_type_code' => null,
            'calculation_parameter_type_name' => null,
            'table_n'                         => null,
            'active_l'                        => true,
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'db_area_id'                      => self::getDefaultDBAreaId(),
            'created_at'                      => '',
            'created_by'                      => '',
            'updated_at'                      => '',
            'updated_by'                      => '',
        ];
    }

    public function extensionOneAdditionalDetails()
    {
        return $this->hasMany('App\Models\ExtensionOneAdditionalDetails', 'calculation_parameter_type_id', 'id');
    }

}
