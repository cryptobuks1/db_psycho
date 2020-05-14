<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemOperation extends Model
{
    protected $table = "SystemOperations";
    protected $primaryKey = "id";

    protected $fillable = ['sys_oper_code', 'sys_oper_name', 'sys_oper_rem', 'caption_code', 'caption_id'];

    public function consumerActivityToken()
    {
        return $this->hasMany('App\Models\ConsumerActivityToken', 'action_id', 'id');
    }
}
