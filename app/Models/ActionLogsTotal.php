<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLogsTotal extends Model
{
    protected $table = "__ActionLogsTotal";

    protected $primaryKey = "id";
    protected $hidden = [
        'remember_token',
    ];

    protected $fillable = [
        'action_log_total_id',
        'action_type_id',
        'controller_id',
        'count',
        'date',
        'created_by',
        'updated_by',
    ];


}
