<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = "Pages";

    protected $primaryKey = "id";

    protected $fillable = [

        'page_id',
        'page_code',
        'page_text',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',

    ];


    protected $hidden = [
        'remember_token',
    ];
}
