<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoredFile extends Model
{
    protected $table = "StoredFiles";

    protected $primaryKey = "id";

    protected $fillable = [
        'stored_file_name',
        'file_type_id',
        'stored_file_size',
        'table_n',
        'row_id',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function typeFile()
    {
        return $this->hasOne('App\Models\FileType', 'id', 'file_type_id');
    }
}
