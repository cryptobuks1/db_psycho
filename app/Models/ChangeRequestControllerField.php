<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequestControllerField extends Model
{
    protected $table = "ChangeRequestControllerFields";

    protected $primaryKey = "id";

    protected $fillable = [
        'change_request_controller_id',
        'db_type_controller_field_id',
        'field_reference',
        'line_n',
        'status',
        'comment',
        'created_by',
        'updated_by',
    ];


    protected $hidden = [
        'remember_token',
    ];

    public function changeRequestControllerFieldValue(){
        return $this->hasMany('App\Models\ChangeRequestControllerFieldValue','change_request_controller_field_id','id');
    }

    public function dbTypeControllerField(){
        return $this->hasOne('App\Models\DbTypeControllerField','id','db_type_controller_field_id');
    }
}
