<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoPlatform extends Model
{
    protected $table = "_CryptoPlatforms";

    protected $primaryKey = "id";

    protected $fillable = [
        'c_platform_code',
        'c_platform_name',
        'c_platform_url',
        'c_platform_remark',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];

}
