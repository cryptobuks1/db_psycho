<?php

namespace App\Models;

use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Model;

class UserInterface extends Model
{
    protected $table = "__UserInterfaces";

    protected $primaryKey = "id";

    protected $fillable = [
        'menu_item_id_left',
        'menu_item_id_top',
        'help_id',
        'home_fe_route_id',
        'caption_code',
        'user_interface_code',
        'user_interface_name',
        'home_url',
        'actual_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public static function getNewObject()
    {
        return [
            'id'                    => null,
            'menu_item_id_left'     => null,
            'menu_item_id_top'      => null,
            'help_id'               => null,
            'home_fe_route_id'      => null,
            'caption_code'          => '',
            'user_interface_code'   => '',
            'user_interface_name'   => '',
            'home_url'              => null,
            'actual_l'              => true,
            'updated_by'            => '',
            'created_by'            => '',
            'updated_at'            => '',
            'created_at'            => '',
        ];
    }

    protected $hidden = [
        'remember_token',
    ];

    public function help()
    {
        return $this->hasOne('App\Models\Help', 'id', 'help_id');
    }

    public function feRoute()
    {
        return $this->hasOne('App\Models\FeRoute', 'id', 'home_fe_route_id');
    }

    public function menuItemLeft(){
        return $this->hasOne('App\Models\MenuItem', 'id', 'menu_item_id_left');
    }

    public function menuItemTop()
    {
        return $this->hasOne('App\Models\MenuItem', 'id', 'menu_item_id_top');
    }

    public function accessRoles()
    {
        return $this->hasMany('App\Models\AccessRole', 'user_interface_id', 'id');
    }
}
