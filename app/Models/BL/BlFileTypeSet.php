<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlFileTypeSet extends Model
{
    protected $table = "BlFileTypeSets";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_file_type_set_name',
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


    public function blFileTypeSetTabFileType()
    {
        return $this->hasMany('App\Models\BL\BlFileTypeSetTabFileType', 'bl_file_type_set_id', 'id');
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

}
