<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachedDocument extends Model
{
    protected $table = "AttachedDocuments";

    protected $primaryKey = "id";

    protected $fillable = [
        'att_doc_name',
        'att_doc_kind_id',
        'att_doc_type_id',
        'actual_l',
        'table_n',
        'row_id',
        'uid_1c_code',
        'delete_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function attachDocumentFile()
    {
        return $this->hasMany('App\Models\AttachedDocumentFile','att_doc_id', 'id');
    }

    public function attachDocumentKind()
    {
        return $this->belongsTo('App\Models\AttachedDocumentKind', 'att_doc_kind_id', 'id');
    }

    public function attachDocumentType()
    {
        return $this->belongsTo('App\Models\AttachedDocumentType','att_doc_type_id', 'id');
    }
}
