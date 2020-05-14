<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachedDocumentKind extends Model
{
    protected $table = "AttachedDocumentKinds";

    protected $primaryKey = "id";

    protected $fillable = [
        'att_doc_type_id',
        'att_doc_kind_code',
        'att_doc_kind_name',
        'use_file_titles_l',
        'att_doc_files_quantity',
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

    public function attachDocumentType()
    {
        return $this->BelongsTo('App\Models\AttachedDocumentType','att_doc_type_id', 'id');
    }

    public function attachDocument()
    {
        return $this->BelongsTo('App\Models\AttachedDocument','id', 'att_doc_kind_id');
    }

    public function attachDocumentsFileTitle()
    {
        return $this->BelongsTo('App\Models\AttachedDocumentFileTitle','id', 'att_doc_kind_id');
    }

    public function requiredDocumentKind()
    {
        return $this->BelongsTo('App\Models\RequiredDocumentKind','id', 'att_doc_kind_id');
    }
}
