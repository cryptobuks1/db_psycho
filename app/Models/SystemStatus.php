<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemStatus extends Model
{

    protected $table = "__SystemStatuses";

    protected $primaryKey = "id";

    protected $fillable = [
        'system_status_code',
        'caption_code',
        'created_by',
        'updated_by',
    ];
    protected $hidden = [
        'remember_token',
    ];
}
