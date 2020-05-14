<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = "MenuItems";

    protected $primaryKey = "id";

    protected $fillable = [
        'fe_route_id',
        'image_id',
        'menu_item_parent_id',
        'group_l',
        'menu_item_name',
        'menu_item_code',
        'caption_code',
        'line_n',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public static function getNewObject()
    {
        return [
            "id" => null,
            "fe_route_id" => "",
            "image_id" => "",
            "menu_item_parent_id" => 1,
            "group_l" => "",
            "menu_item_name" => "",
            "menu_item_code" => "",
            "caption_code" => "",
            "line_n" => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }
    protected $hidden = [
        'remember_token',
    ];

    public function feRoute()
    {
        return $this->hasOne('App\Models\FeRoute', 'id', 'fe_route_id');
    }

    public function menuItemAccessRole()
    {
        return $this->hasMany('App\Models\MenuItemAccessRole', 'menu_item_id', 'id');
    }



    public function image()
    {
        return $this->hasOne('App\Models\Image', 'id', 'image_id');
    }

//    public function item(){
//
//        return $this->hasMany('App\Models\MenuItem',  'id','menu_item_parent_id');
//
//    }
    public function accessRole()
    {
        return $this->belongsTo('App\Models\AccessRole',  'id');
    }

    public function parentItem()
    {
        return $this->hasMany('App\Models\MenuItem', 'menu_item_parent_id', 'id')
//            ->with('menuItemAccessRole','accessRole');
            ->with('menuItemAccessRole');
    }

    public function imgMenu()
    {
        return $this->hasOne('App\Models\Image',  'id', 'image_id');
    }


    public function parent()
    {
        return $this->hasOne('App\Models\MenuItem', 'id', 'menu_item_parent_id');
    }







}