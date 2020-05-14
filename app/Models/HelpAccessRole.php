<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpAccessRole extends Model
{

    protected $table = "HelpAccessRole";

    protected $primaryKey = "id";

    protected $fillable = [

        'help_access_roles_id',
        'help_id',
        'access_role_id',
        'help_view_l',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',


    ];


    protected $hidden = [
        'remember_token',
    ];
}
