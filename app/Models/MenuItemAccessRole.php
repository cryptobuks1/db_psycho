<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItemAccessRole extends Model
{
    protected $table = "MenuItemAccessRoles";

    protected $primaryKey = "id";

    protected $fillable = [
        'menu_item_id',
        'access_role_id',
        'menu_item_view_l',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function menuItem()
    {
        return $this->hasOne('App\Models\MenuItemAccessRole', 'id', 'menu_item_id');
    }

    public static function getNewObject()
    {
        return [
            "id" => null,
            "menu_item_id" => "",
            "access_role_id" => "",
            "menu_item_view_l" => (bool)false,
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }

    public function accessRoleMenu()
    {
        return $this->hasOne('App\Models\AccessRole', 'id', 'access_role_id');
    }

    public function accessRoleMenuItem()
    {
        return $this->hasOne('App\Models\MenuItem', 'id', 'menu_item_id');
    }

    public function accessRole()
    {
        return $this->hasOne('App\Models\AccessRole', 'id', 'access_role_id');
    }

    public function parent()
    {
        return $this->hasOne('App\Models\MenuItem', 'id', 'menu_item_id');
    }

}
