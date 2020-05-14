<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequestControllerFieldValue extends Model
{
    protected $table = "ChangeRequestControllerFieldValues";

    protected $primaryKey = "id";

    protected $fillable = [
        'change_request_controller_field_id',
//        'db_type_controller_id',
        'field_value_type_code',
        'created_by',
        'updated_by',
    ];


    protected $hidden = [
        'remember_token',
    ];
}
