<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeCssClass extends Model
{
    protected $table = "__FeCssClasses";

    protected $primaryKey = "id";

    protected $fillable = [
        'fe_css_class_code',
        'fe_css_class_name',
        'fe_css_class_comment',
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
