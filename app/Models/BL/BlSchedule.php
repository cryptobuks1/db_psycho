<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlSchedule extends Model
{
    protected $table = "blSchedules";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'bl_leasing_calculation_id',
        'company_id',
        'contractor_id',
        'bl_schedule_type_id',
        'bl_schedule_name',
        'uid_1c_code',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'

    ];


    protected $hidden = [
        'remember_token',
    ];

    public function blLeasingCalculation(){
        return $this->HasOne('App\Models\BL\BlLeasingCalculation', 'id', 'bl_leasing_calculation_id');
    }

    public function blScheduleTabSchedule(){
        return $this->HasMany('App\Models\BL\BlScheduleTabSchedule', 'bl_schedule_id', 'id');
    }

    public function blScheduleTabArticles(){
        return $this->hasMany('App\Models\BL\BlScheduleTabArticle', 'bl_schedule_id','id');
    }
}
