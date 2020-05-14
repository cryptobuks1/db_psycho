<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlStatus extends Model
{

    protected $table = 'blStatuses';

    protected $primaryKey = 'id';

    protected $fillable = [

        'bl_status_name',
        'db_area_id',
        'uid_1c_code',
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
