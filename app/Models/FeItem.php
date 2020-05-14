<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeItem extends Model
{
    protected $table = "__FeItems";

    protected $primaryKey = "id";

    protected $fillable = [
        'fe_item_code',
        'fe_item_name',
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
