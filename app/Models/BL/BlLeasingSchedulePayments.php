<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlLeasingSchedulePayments extends Model
{
    protected $table = 'blLeasingSchedulePayments';

    protected $primaryKey = 'id';

    protected $fillable = [
        "contractor_contract_id",
        "bl_schedule_article_id",
        "bl_leasing_contract_specification_id",
        "bl_leasing_schedule_payment_date",
        "bl_leasing_schedule_payment_plan",
        "bl_leasing_schedule_payment_fact",
        "created_by",
        "updated_by",
        "created_at",
        "updated_at",

    ];

    protected $hidden = [
        'remember_token',
    ];

    public function scheduleArticle(){
        return $this->hasOne('App\Models\BL\BlScheduleArticle','id','bl_schedule_article_id');
    }
}
