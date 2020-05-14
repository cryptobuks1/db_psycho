<?php

namespace App\Models;

use App\Http\Interfaces\Validatable;
use Illuminate\Database\Eloquent\Model;

class SystemParameter extends Model implements Validatable{
    protected $table = "SystemParameters";

    protected $fillable = [
        "sys_par_code",
        "sys_par_value",
        "sys_par_name",
        "sys_par_rem",
        "data_type_code",
        "data_type_id",
        "sys_par_use_allow_values_l",
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = "id";

    public static function getNewObject()
    {
        return [
            "id" => null,
            "sys_par_code" => null,
            "sys_par_value" => null,
            "sys_par_name" => null,
            "sys_par_rem" => null,
            "data_type_code" => null,
            "data_type_id" => null,
            "sys_par_use_allow_values_l" => false
        ];
    }

    public function systemParametersAllowableValues()
    {
        return $this->hasMany(SystemParameterValue::class);
    }

    public function dataType()
    {
        return $this->belongsTo('App\Models\DataTypes', 'data_type_id', 'id');
    }

    /**
     * Returns caption for given attribute
     * @param $attr string
     * @return string
     */
    public static function getAttributeCaption($attr)
    {
        return [
                   "sys_par_code"               => "Code",
                   "sys_par_value"              => "Value",
                   "sys_par_name"               => "Name",
                   "sys_par_rem"                => "Remark",
//                   "data_type_code"             => null,
                   "data_type_id"               => "Type",
//                   "sys_par_use_allow_values_l" => null,
               ][$attr] ?? $attr;
    }

    public static function getValidationRules()
    {
        return [
            "sys_par_code"  => "required|max:191",
            "sys_par_value" => "nullable|max:191",
//            "sys_par_value" => "required|max:191",
//            "sys_par_name"  => "required|string|max:191",
//            "sys_par_rem"   => "required",
        ];
    }
}
