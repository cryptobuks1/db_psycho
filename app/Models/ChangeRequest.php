<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    protected $table = "ChangeRequests";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'table_n',
        'row_id',
        'status',
        'comment',
        'created_by',
        'updated_by',
    ];


    protected $hidden = [
        'remember_token',
    ];

    public function changeRequestController(){
        return $this->hasMany('App\Models\ChangeRequestController','change_request_id','id');
    }

    public function changeRequestModel(){
        return $this->hasMany(ChangeRequestModel::class,'change_request_id','id');
    }

    public function dbArea()
    {
        return $this->hasOne(DbArea::class, "id", "db_area_id");
    }




}
