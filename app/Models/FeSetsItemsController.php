<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeSetsItemsController extends Model
{
    protected $table = "__FeSetsItemsControllers";

    protected $primaryKey = "id";

    protected $fillable = [
        'controller_id',
        'fe_set_item_id',
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
