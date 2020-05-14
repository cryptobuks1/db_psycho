<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbTypeModel extends Model
{
    protected $table = "_DbTypeModels";

    protected $primaryKey = "id";

    protected $fillable = [
        'write_n',
        'db_type_id',
        'table_n',
        'object_type_code',
        'object_kind_n',
        'object_key_field',
        'object_owner_table_n',
        'created_by',
        'updated_by',
    ];

    public function models(){
        return $this->hasOne('App\Models\ModelTables', 'table_n', 'table_n');
    }
//    public function models(){
//        return $this->hasOne('App\Models\ModelTables', 'table_code', 'object_type_code');
//    }

    public function modelFields(){
        return $this->hasMany('App\Models\DbTypeModelField', 'db_type_model_id', 'id');
    }

    public function modelLinks(){
        return $this->hasMany('App\Models\ModelLink', 'table_n', 'table_n');
    }
    public function modelLink(){
        return $this->hasMany('App\Models\ModelLink', 'table_n', 'object_owner_table_n');
    }

    public function controllerName(){
        return $this->hasMany('App\Models\Controller', 'controller_table_n', 'table_n');
    }

    public function mainController(){
        return $this->hasOne('App\Models\Controller', 'controller_table_n', 'table_n')
            ->where("main_l", true);
    }

    public function dbTypeModelOwner()
    {
        return $this->hasOne(DbTypeModel::class, "table_n", "object_owner_table_n");
    }

    public function modelLinksLink()
    {
        return $this->hasMany(ModelLink::class, "table_n_link", "table_n");
    }
    public function modelParent()
    {
        return $this->hasOne(ModelTables::class, 'table_n', 'object_owner_table_n');
    }

    public function dbTyp()
    {
        return $this->hasOne(DbTypeModel::class, "table_n", "object_owner_table_n");
    }



}
