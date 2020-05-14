<?php

namespace App;

use App\Models\ChangeRequest;
use Illuminate\Database\Eloquent\Model;

class QueueSignal extends Model
{
    protected $table = "queue_signals";

    protected $primaryKey = "id";

    protected $fillable = [
        'change_request_id',
        'status',
        'model',
        'model_id',
        'user_id'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function changeRequest(){
        return $this->hasMany('App\Models\ChangeRequest','id','change_request_id');
    }


    public function request()
    {
        return $this->hasOne(ChangeRequest::class,'id','change_request_id');
    }

}
