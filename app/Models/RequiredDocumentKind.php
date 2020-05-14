<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequiredDocumentKind extends Model
{
    protected $table = "RequiredDocumentKinds";

    protected $primaryKey = "id";

    protected $fillable = [
        'att_doc_kind_id',
        'table_n',
        'row_id',
        'delete_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

//    public function attachedDocumentType()
//    {
//        return $this->hasMany('App\Models\AttachedDocumentType','id', 'att_doc_type_id');
//    }

    public function attachedDocumentKind()
    {
        return $this->hasOne('App\Models\AttachedDocumentKind','id', 'att_doc_kind_id');
    }

    public function dbAreaFiles()
    {
        return $this->hasMany(DbAreaFile::class, "bl_att_doc_kind_id", "att_doc_kind_id");
    }
}
