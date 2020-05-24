<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class ApplicationType extends Model
{
    protected $table = "ApplicationTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'application_type_name',
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
        return $this->hasMany('App\Models\Application','application_type_id', 'id');
    }

}
