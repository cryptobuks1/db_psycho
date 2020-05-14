<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlLeasingSchedulePaymentsExchange extends Model
{
    protected $table = "blLeasingSchedulePaymentsExchanges";

    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'contractor_contract_id',
        'contractor_contract_code',
        'bl_schedule_article_id',
        'bl_schedule_article_code',
        'bl_leasing_contract_specification_id',
        'bl_leasing_contract_specification_code',
        'bl_leasing_schedule_payment_date',
        'bl_leasing_schedule_payment_plan',
        'bl_leasing_schedule_payment_fact',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
