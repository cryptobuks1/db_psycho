<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachedDocumentType extends Model
{
    protected $table = "AttachedDocumentTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'att_doc_type_name',
        'att_doc_type_code',
        'delete_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function attachDocument()
    {
        return $this->BelongsTo('App\Models\AttachedDocument','id', 'att_doc_type_id');
    }

    public function attachDocumentKind()
    {
        return $this->hasMany('App\Models\AttachedDocumentKind','att_doc_type_id', 'id');
    }

    public function requiredDocumentKind()
    {
        return $this->BelongsTo('App\Models\RequiredDocumentKind','id', 'att_doc_type_id');
    }
}
