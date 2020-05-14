<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppendedFile extends Model
{
    protected $table = "AppendedFiles";

    protected $primaryKey = "id";

    protected $fillable = [
        'app_file_name',
        'file_type_id',
        'table_n',
        'row_id',
        'app_file_bd',
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
}
