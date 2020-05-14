<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlScheduleType extends Model
{
    protected $table = 'blScheduleTypes';

    protected $primaryKey = 'id';

    protected $fillable = [

        'bl_schedule_type_name',
        'uid_1c_code',
        'db_area_id',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }
}
