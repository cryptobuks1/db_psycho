<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbArea extends Model
{
//    protected $table = "_DB_Areas";
    protected $table = "_DbAreas";

    protected $primaryKey = "id";

    protected $fillable = [

        'db_id',
        'consumer_id',
        'db_area_code',
        'db_area_name',
        'db_area_token',
        'db_area_pass',
        'db_partition_1',
        'db_partition_2',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',

    ];

    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'db_id' => null,
            'consumer_id' => '',
            'db_area_code' => '',
            'db_area_name' => '',
            'db_area_token' => null,
            'db_area_pass' => '',
            'db_partition_1' => null,
            'db_partition_2' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '',
            'created_by' => '',
            'updated_at' => '',
            'updated_by' => '',
        ];
    }

    public function consumerAccess()
    {
        return $this->hasOne('App\Models\ConsumerAccessRow', 'id', 'consumer_id');
    }

    public function dBase()
    {
        return $this->belongsTo('App\Models\DBase', 'db_id', 'id');
    }

    public function consumer()
    {
        return $this->hasOne("App\Models\Consumer", 'id', 'consumer_id');
    }
//
//    public function serverDb(){
//        return $this->belongsTo('App\ServerDb', 'server_id', 'id');
//    }


}
