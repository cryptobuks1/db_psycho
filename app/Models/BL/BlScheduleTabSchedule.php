<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlScheduleTabSchedule extends Model
{
    protected $table = "blScheduleTabSchedules";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_schedule_article_id',
        'bl_schedule_id',
        'line_n',
        'schedule_row_n',
        'schedule_row_date',
        'schedule_row_value',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function blSchedule(){
        return $this->HasOne('App\Models\BL\BlSchedule', 'id', 'bl_schedule_id');
    }


    public function blScheduleTabArticle(){
        return $this->HasMany('App\Models\BL\BlScheduleTabArticle', 'bl_schedule_id', 'bl_schedule_id');
    }
}
