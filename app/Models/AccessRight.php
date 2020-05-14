<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessRight extends Model
{
    protected $table = "__AccessRights";

    protected $primaryKey = "id";

    protected $fillable = [
        'access_right_code',
        'access_right_name',
        'access_right_remark',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',

    ];
}
