<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbTypeControllerField extends Model
{
    protected $table = "_DbTypeControllerFields";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_type_controller_id',
        'table_field_name',
        'field_name',
        'field_alias',
        'field_reference',
        'controller_id',
        'data_type_id',
        'created_by',
        'updated_by',
    ];


    protected $hidden = [
        'remember_token',
    ];

    public function dataType()
    {
        return $this->hasOne('App\Models\DataTypes', 'id', 'data_type_id');
    }

    public function dbTypeController()
    {
        return $this->hasOne(DbTypeController::class, "id", "db_type_controller_id");
    }


}
