<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    protected $table = "__Signals";

    protected $primaryKey = "id";

    protected $fillable = [
        'change_request_id',
        'db_area_id',
        'system_status_id',
        'request_incoming_n',
        'signal_type_code',
        'signal_error_l',
        'signal_error_code',
        'signal_error_message',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function changeRequest(){
        return $this->hasMany('App\Models\ChangeRequest','id','change_request_id');
    }


    public function request()
    {
        return $this->hasOne(ChangeRequest::class,'id','change_request_id');
    }
}
