<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlScheduleArticle extends Model
{
    protected $table = "blScheduleArticles";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'bl_schedule_article_name',
        'uid_1c_code',
        'deleted_l',
        'created_by',
        'updated_by',
        'deleted_l',
        'created_by',
        'created_at',
        'updated_at'
    ];


    protected $hidden = [
        'remember_token',
    ];


    public function blScheduleTabArticle(){
        return $this->HasMany('App\Models\BL\BlScheduleTabArticle', 'bl_schedule_article_id', 'id');
    }
}
