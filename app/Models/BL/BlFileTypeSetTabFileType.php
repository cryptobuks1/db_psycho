<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlFileTypeSetTabFileType extends Model
{
    protected $table = "blFileTypeSetTabFileTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_file_type_set_id',
        'file_type_id',
        'line_n',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function blFileTypeSet()
    {
        return $this->hasOne('App\Models\BL\BlFileTypeSet', 'id', 'bl_file_type_set_id');
    }

    public function typeFile()
    {
        return $this->hasOne('App\Models\FileType', 'id', 'file_type_id');
    }
}
