<?php
/**
 *
 * @author Albert Topalu
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    protected $table = "__Controllers";

    protected $fillable = [
        'controller_code',
        'controller_name',
        'controller_table_n',
        'controller_table_n_dep',
//        'controller_table_code_dep',
//        'controller_table_code',
//        'controller_type_code',
        'controller_type_id',
        'controller_alias',
        'created_by',
        'updated_by',
    ];

    protected $primaryKey = "id";

//    protected $casts = [
//        'id' => 'integer',
//        'controller_code' => 'string',
//        'controller_name' => 'string',
//        'controller_table_code' => 'string',
//        'controller_table_n' => 'integer',
//        'controller_table_code_dep' => 'string',
//        'controller_table_n_dep' => 'integer',
//        'controller_type_code' => 'string',
//        'controller_type_id' => 'integer',
//        'created_at' => 'datetime',
//        'updated_at' => 'datetime',
//    ];

    protected $hidden = [
        'remember_token',
    ];

    //controller_table_n

    public function models()
    {
        return $this->hasOne('App\Models\ModelTables', 'table_n', 'controller_table_n');
    }

    public function dbTypeController()
    {
        return $this->hasMany('App\Models\DbTypeController', 'controller_id', 'id');
    }

    public function dbTypeModel()
    {
        return $this->hasMany(DbTypeModel::class, 'table_n', 'controller_table_n');
    }

    public function controllerLinks()
    {
        return $this->hasOne('App\Models\ControllerLink', 'controller_id_link', 'id');
    }

//    public function dependentController(){
//
//        return $this->hasOne('App\Models\DependentController', 'controller_id', 'id');
//    }


//    public function controllerLink(){
//        return $this->hasOne('App\Models\ControllerLink', 'controller_id', 'id');
//    }

    public function controllerLink(){
        return $this->hasMany('App\Models\ControllerLink', 'controller_id', 'id');
    }

    public function modelLink(){
        return $this->hasMany(ModelLink::class, 'table_n', 'controller_table_n');
    }

    public function modelLinkParent(){
        return $this->hasOne(ModelLink::class, 'table_n_link', 'controller_table_n');
    }

    public function controllerLinkParent(){
        return $this->hasOne('App\Models\ControllerLink', 'controller_id_link', 'id');
    }

    public static function getNewObject()
    {
        return [
            "id"                  => null,
            "controller_code"        => "",
            "controller_name"   => "",
            "controller_table_n"        => "",
            "controller_table_n_dep" => "",
            "controller_type_id" => "",
            "controller_alias"     => "",
            "created_at"          => "",
            "updated_at"          => "",
            "created_by"          => "",
            "updated_by"          => "",
         ];
    }
}
