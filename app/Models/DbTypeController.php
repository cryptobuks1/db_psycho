<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbTypeController extends Model
{
    protected $table = "_DbTypeControllers";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_type_id',
        'controller_id',
        'object_type_code',
        'object_kind_n',
        'object_key_field',
        'object_owner_id',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'remember_token',
    ];

//    public function controllerFields(){
//
//        return $this->hasMany('App\Models\DbTypeControllerField', 'controller_id', 'controller_id');
//    }

//    public function controllerFields(){
//
//        return $this->hasMany('App\Models\DbTypeControllerField', 'db_type_controller_id', 'id');
//    }

    public function controllerFields(){
        return $this->hasMany('App\Models\DbTypeControllerField', 'db_type_controller_id', 'id');
    }

//    public function controller(){
//
//        return $this->hasMany('App\Models\DbTypeControllerField', 'controller_id', 'controller_id');
//    }

    public function controller(){
        return $this->hasMany('App\Models\DbTypeController', 'controller_id', 'controller_id')
            ;
//            ->whereNotNull('db_type_id');
    }

    public function controllerNull(){
        return $this->hasMany('App\Models\DbTypeController', 'controller_id', 'controller_id');
    }


    public function controllerSetting(){

        return $this->hasMany('App\Models\DbTypeController', 'controller_id', 'id');
    }

    public function controllerName(){

        return $this->hasMany('App\Models\Controller', 'id', 'controller_id');
    }


    public function models(){

        return $this->hasOne('App\Models\ModelTables', 'table_code', 'object_type_code');
    }

    public function controllerLink(){

        return $this->hasMany('App\Models\ControllerLink', 'controller_id', 'controller_id');
    }

    public function controllerLinksLink()
    {
        return $this->hasMany(ControllerLink::class, "controller_id_link", "controller_id");
    }

    public function dbTypeControllerOwner()
    {
        return $this->hasOne(DbTypeController::class, "controller_id", "object_owner_id");
    }

    public function controllerOwner(){
        return $this->hasMany('App\Models\Controller', 'id', 'object_owner_id');

    }






}
