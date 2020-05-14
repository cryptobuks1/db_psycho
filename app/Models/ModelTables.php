<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelTables extends Model
{
    protected $table = "__ModelTables";

    protected $primaryKey = "id";

    protected $fillable = [
        'table_n',
        'table_code',
        'table_output_template',
        'table_name',
        'use_db_area_l',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'remember_token',
    ];


    public function controller()
    {
        return $this->hasOne('App\Models\Controller', 'controller_table_n', 'table_n');
    }

    public static function getNewObject()
    {
        return [
            "id" => null,
            "table_n" => "",
            "table_code" => "",
            "table_output_template" => "",
            "table_name" => "",
            "use_db_area_l" => "",
            "created_by" => "",
            "updated_by" => "",
            "created_at" => "",
            "updated_at" => "",

        ];
    }

    public function dbTypeModel()
    {
        return $this->hasMany('App\Models\DbTypeModel', 'table_n', 'table_n');
    }


}
