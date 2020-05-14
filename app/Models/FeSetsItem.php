<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeSetsItem extends Model
{
    protected $table = "__FeSetsItems";

    protected $primaryKey = "id";

    protected $fillable = [
        'fe_item_id',
        'fe_set_id',
        'image_id',
        'action_type_id',
        'fe_css_class_id',
        'fe_set_item_code',
        'fe_set_item_name',
        'line_n',
        'execute_fe_action_l',
        'use_fe_set_item_controller_l',
        'caption_code',
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
