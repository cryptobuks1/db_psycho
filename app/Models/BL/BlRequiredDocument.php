<?php

namespace App\Models\BL;

use App\Models\DbAreaFile;
use Illuminate\Database\Eloquent\Model;

class BlRequiredDocument extends Model
{
    protected $table = "BlRequiredDocuments";

    protected $primaryKey = "id";

    protected $fillable = [
        'table_n_doc',
        'row_id_doc',
        'register_key',
        'bl_att_doc_kind_id',
        'db_area_id',
        'uid_1c_code',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function blAttachDocumentKind()
    {
        return $this->hasOne('App\Models\BL\BlAttachDocumentKind', 'id', 'bl_att_doc_kind_id');
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function dbAreaFiles()
    {
        return $this->hasMany(DbAreaFile::class, "bl_att_doc_kind_id", "bl_att_doc_kind_id");
    }
}
