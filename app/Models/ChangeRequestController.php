<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequestController extends Model
{
    protected $table = "ChangeRequestControllers";

    protected $primaryKey = "id";

    protected $fillable = [
        'change_request_id',
        'db_type_controller_id',
        'row_id',
        'row_id_dep',
        'main_l',
        'created_by',
        'updated_by',
    ];


    protected $hidden = [
        'remember_token',
    ];


    public function changeRequestControllerField(){
        return $this->hasMany('App\Models\ChangeRequestControllerField','change_request_controller_id','id')
            ->with('dbTypeControllerField'); //get field name in _DbTypeControllerFields
    }

    public function dbTypeController()
    {
        return $this->hasMany('App\Models\DbTypeController', 'id', 'db_type_controller_id');
    }
}
