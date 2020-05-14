<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBase extends Model
{


    //    protected $table = "_DBs";
    protected $table = "_DBases";

    protected $primaryKey = "server_id";

    protected $fillable = [
        'db_id',
        'server_id',
        'db_type_id',
        'db_code',
        'db_remark',
        //'db_description', y.yurenko
        'db_name',
//        'suser_name',
//        'modify_date'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'server_id' => '',
            'db_type_id' => '',
            'db_code' => '',
            'db_remark' => '',
            'db_name' => '',
            'created_at' => '',
            'created_by' => '',
            'updated_at' => '',
            'updated_by' => '',
        ];
    }

    public function db_area(){
         return $this->hasMany('App\Models\DbArea','db_id','id');
    }

    public function serverDb(){
        return $this->hasOne('App\Models\ServerDb', 'id', 'server_id');
    }

    public function serverAccess(){
        return $this->belongsTo('App\Models\ServerDb', 'server_id', 'id');
    }

    public function dbType(){
        return $this->hasOne('App\Models\DbType', 'id', 'db_type_id');
    }

}
