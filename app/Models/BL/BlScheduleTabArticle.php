<?php

namespace App\Models\Bl;

use Illuminate\Database\Eloquent\Model;

class BlScheduleTabArticle extends Model
{
    //
    protected $table = "blScheduleTabArticles";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_schedule_id',
        'bl_schedule_article_id',
        'line_n',
        'referential_id',
        'calculated_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];
}
