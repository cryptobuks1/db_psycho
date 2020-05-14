<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class NotificationsExchange extends Model
{
    protected $table = "NotificationsExchanges";

    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'contractor_contract_id',
        'contractor_contract_code',
        'contractor_id',
        'contractor_code',
        'notification_date',
        'notification_title',
        'notification_text',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
