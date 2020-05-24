<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "users";
    protected $primaryKey = "id";

    protected $fillable = [
        'name', 'second_name', 'middle_name', 'email', 'password', 'login', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'id' => 'integer',
        'role_id' => 'integer',
        'name' => 'string',
        'second_name' => 'string',
        'middle_name' => 'string',
        'email' => 'string',
        'login' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    protected $dates = [
        'created_at' ,
        'updated_at'
    ];

    public function user_role(){
        return $this->hasOne('App\Models\UserRole','id', 'role_id');
    }

    public function Consumer(){
        return $this->hasOne('App\Models\Consumer','user_id', 'id');
    }

    public function stages(){
        return $this->hasMany('App\Models\Stage','teacher_id', 'id');
    }
}
