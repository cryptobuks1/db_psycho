<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeSet extends Model
{
    protected $table = "__FeSets";

    protected $primaryKey = "id";

    protected $fillable = [
        'fe_set_code',
        'fe_set_name',
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
