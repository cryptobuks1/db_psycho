<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessType extends Model
{
    protected $table = "__AccessTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'table_n',
        'access_type_code',
        'access_type_name',
        'action_type_remark',
        'use_for_entity_l',
        'use_for_list_l',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'remember_token',
    ];


}
