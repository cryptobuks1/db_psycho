<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachedDocumentFile extends Model
{
    protected $table = "AttachedDocumentFiles";

    protected $primaryKey = "id";

    protected $fillable = [
        'att_doc_file_name',
        'file_type_id',
        'att_doc_file_size',
        'att_doc_id',
        'att_doc_file_title_id',
        'att_doc_file',
        'att_doc_file_link',
        'att_doc_file_description',
        'deleted_l',
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
        return $this->hasMany('App\Models\AttachedDocument','id', 'att_doc_id');
    }

    public function attachDocumentFileTitle()
    {
        return $this->hasMany('App\Models\AttachedDocumentFileTitle','id', 'att_doc_file_title_id');
    }

    public function typeFile()
    {
        return $this->hasMany('App\Models\FileType','id', 'file_type_id');
    }


}
