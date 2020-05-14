<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlLeasingObjectType extends Model
{
    protected $table='blLeasingObjectTypes';

    protected  $primaryKey = 'id';

    protected $fillable = [
        'db_area_id',
        'uid_1c_code',
        'bl_leasing_object_type_name',
        'bl_leasing_object_type_name_en',
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
