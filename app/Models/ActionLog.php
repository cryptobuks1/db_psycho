<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    protected $table = "__ActionLogs";

    protected $primaryKey = "id";

    protected $fillable = [
        'controller_id',
        'row_id',
        'consumer_id',
        'action_type_id',
        'action_log_error_l',
        'action_log_error_code',
        'action_log_message',
        'count',
        'spent_time',
        'spent_time_site',
        'spent_time_1c',
        'spent_time_connection',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'remote_addr',
        'http_referer',
        'redirect_url',
        'request_method',
        'http_user_agent'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            "id"                    => null,
            "controller_code"       => null,
            "consumer_code"         => null,
            "action_type_code"      => null,
            'action_log_error_l'    => null,
            'action_log_error_code' => null,
            'action_log_message'    => null,
            'created_by'            => null,
            'updated_by'            => null,
            'created_at'            => null,
            'updated_at'            => null
        ];
    }

    public function controller()
    {
        return $this->hasOne(Controller::class, "id", "controller_id");
    }

    public function consumer()
    {
        return $this->hasOne(Consumer::class, "id", "consumer_id");
    }

    public function actionType()
    {
        return $this->hasOne(ActionType::class, "id", "action_type_id");
    }

}
