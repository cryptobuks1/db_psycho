<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemParameterValue extends Model
{
    protected $table = "SystemParametersValues";

    protected $fillable = [
        "sys_par_code",
        "sys_par_id",
        "sys_par_allow_val_option",
        "sys_par_allow_val_rem",
        "sys_par_type",
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = "id";

    public static function getNewObject()
    {
        return [
            'id'                       => null,
            "sys_par_code"             => null,
            "sys_par_id"               => null,
            "sys_par_allow_val_option" => null,
            "sys_par_allow_val_rem"    => null,
            "sys_par_type"             => null,
            'created_at'               => '',
            'created_by'               => '',
            'updated_at'               => '',
            'updated_by'               => '',
        ];
    }


    public function systemParameter()
    {
        return $this->belongsTo('App\Models\SystemParameter', 'sys_par_id', 'id');
    }
}
