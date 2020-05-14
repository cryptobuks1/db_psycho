<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Description of AccessRoles Model
 *
 * @author Юрий Юренко
 * 27.09.2018
 */


class AccessRole extends Model {
  
    protected $table = "_AccessRoles";

    protected $primaryKey = "id";

    protected $fillable = [
        'menu_item_id_left',
        'menu_item_id_top',
        'user_interface_id',
        'access_role_code',
        'access_role_name',
        'home_url',
        'home_fe_route_id',
        'actual_l',
        'created_by',
        'updated_by',
    ];
    
    
    protected $casts = [
        'id' => 'integer',
        'access_role_code' => 'string',
        'access_role_name' => 'string',
        'actual_l' => 'boolean',
        'created_by' => 'string',
        'updated_by' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
    ];
    

    protected $hidden = [
        'remember_token',
    ];

//    public function consumerAccessRoles(){
//        return $this->hasMany('App\ConsumerAccessRole', 'consumer_id', 'id'); //
//    }

    public function AccessEntitiesByRoles(){
        return $this->hasMany('App\Models\AccessEntitiesByRole', 'access_role_id', 'id'); //
    }

    public function feRoute()
    {
        return $this->hasOne(FeRoute::class, "id", "home_fe_route_id");
    }

    public function userInterface()
    {
        return $this->hasOne('App\Models\UserInterface', 'id', 'user_interface_id');
    }
}
