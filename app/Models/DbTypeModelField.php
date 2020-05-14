<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbTypeModelField extends Model
{
    protected $table = "_DbTypeModelFields";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_type_model_id',
        'table_field_name',
        'field_name',
        'field_alias',
        'field_reference',
        'controller_id',
        'data_type_id',
        'created_by',
        'updated_by',
    ];
}
