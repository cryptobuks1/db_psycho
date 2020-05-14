<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachedDocumentFileTitle extends Model
{
    protected $table = "AttachedDocumentFileTitles";

    protected $primaryKey = "id";

    protected $fillable = [
        'att_doc_file_title_name',
        'att_doc_kind_id',
        'uid_1c_code',
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
        return $this->BelongsTo('App\Models\AttachedDocumentFile','id', 'att_doc_file_title_id');
    }

    public function attachDocumentKind()
    {
        return $this->hasMany('App\Models\AttachedDocumentKind','id', 'att_doc_kind_id');
    }
}
