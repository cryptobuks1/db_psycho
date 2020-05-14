<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessRightByRole extends Model
{
    protected $table = "_AccessRightByRoles";

    protected $primaryKey = "id";

    protected $fillable = [
        'access_right_id',
        'access_role_id',
        'controller_id',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',
    ];
}
