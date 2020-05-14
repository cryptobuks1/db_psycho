<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessRowParameter extends Model
{
    protected $table = "__AccessRowParameters";

    protected $primaryKey = "id";

    protected $fillable = [
        'table_n',
        'table_field_name',
        'parameter_code',
        'parameter_name',
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
            'id'               => null,
            'controller_id'    => null,
            'table_field_name' => "",
            'parameter_code'   => "",
            'parameter_name'   => "",
            'created_by'       => "",
            'updated_by'       => "",
            'created_at'       => "",
            'updated_at'       => "",
        ];
    }

    public function model()
    {
        return $this->hasOne(ModelTables::class, "table_n", "table_n");
    }
}
