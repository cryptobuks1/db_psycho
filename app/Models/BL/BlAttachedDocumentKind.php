<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlAttachedDocumentKind extends Model
{
    protected $table = "BlAttachedDocumentKinds";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_att_doc_kind_name',
        'bl_att_doc_file_size',
        'bl_att_doc_periodic_l',
        'bl_file_type_set_id',
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

    public function dbAreaFile()
    {
        return $this->hasMany('App\Models\DbAreaFile', 'bl_att_doc_kind_id', 'id');
    }

    public function dbAreaFiles()
    {
        return $this->hasMany('App\Models\DbAreaFile', 'bl_att_doc_kind_id', 'id');
    }

    public function blReqDocument()
    {
        return $this->hasMany('App\Models\BL\BlRequiredDocument', 'bl_att_doc_kind_id', 'id');
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function fileTypeSet()
    {
        return $this->hasOne(BlFileTypeSet::class, "id", "bl_file_type_set_id");
    }
}
