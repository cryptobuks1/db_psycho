<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumerAccessRow extends Model
{
    protected $table = "_ConsumerAccessRows";

    protected $primaryKey = "id";

    protected $fillable = [
        'access_axis_id',
        'db_area_id',
        'access_role_id',
        'consumer_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function consumer(){
        return $this->hasOne('App\Models\Consumer', 'id', 'consumer_id');
    }
    public function dbarea(){
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }
    public function accessRole(){
        return $this->hasOne(AccessRole::class, 'id', 'access_role_id');
    }
}
