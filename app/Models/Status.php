<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Status extends Model
{
    protected $table = "Statuses";

    protected $primaryKey = "id";

    protected $fillable = [
        'status_name',
        'created_by',
        'updated_by'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    protected $hidden = [
        'remember_token',
    ];


    public function applications(){
        return $this->hasMany('App\Models\Application','status_id', 'id');
    }

}
