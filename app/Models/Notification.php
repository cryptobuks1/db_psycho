<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "Notifications";

    protected $primaryKey = "id";

    protected $fillable = [
        'contractor_contract_id',
        'contractor_id',
        'notification_date',
        'notification_title',
        'notification_text',
        'created_by',
        'updated_by'
    ];

    public function contractor(){
        return $this->hasOne('App\Models\Contractor', 'id', 'contractor_id');
    }
}
