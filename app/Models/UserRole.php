<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = "UserRoles";

    protected $primaryKey = "id";

    protected $fillable = [
        'user_role_name',
        'is_admin',
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


    public function users(){
        return $this->hasMany('App\Models\User','role_id', 'id');
    }
}
