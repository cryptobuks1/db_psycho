<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeComponent extends Model
{
    protected $table = "FeComponents";

    protected $primaryKey = "id";

    protected $fillable = [
//        'fe_component_id',
        'fe_component_code',
        'fe_component_name',
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
            "id" => null,
            "fe_component_code" => "",
            "fe_component_name" => "",
            "actual_l" => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }
}
