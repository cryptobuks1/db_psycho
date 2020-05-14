<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequestModelFieldValue extends Model
{
    protected $table = "ChangeRequestModelFieldValues";

    protected $primaryKey = "id";

    protected $fillable = [
        'change_request_model_field_id',
        'db_type_model_id',
        'field_value_type_code',
        'field_value',
        'deleted_l',
        'created_by',
        'updated_by',
    ];
}
