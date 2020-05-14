<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeRoute extends Model
{
    protected $table = "FeRoutes";

    protected $primaryKey = "id";

    protected $fillable = [
        'fe_component_id',
        'be_route_id',
        'caption_code',
        'fe_route_code',
        'fe_route_name',
        'parent_id',
        'has_children',
        'use_steps_l',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            "id" => null,
            "fe_component_id" => "",
            "be_route_id" => "",
            "caption_code" => "",
            "fe_route_code" => "",
            "fe_route_name" => "",
            "parent_id" => "",
            "has_children" => "",
            "use_steps_l" => "",
            "actual_l" => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }

    public function feComponent(){
        return $this->hasOne('App\Models\FeComponent','id','fe_component_id');
    }

    public function beRoute(){
        return $this->hasOne('App\Models\BeRoute', 'id', 'be_route_id');
    }

    public function feRouteUrl(){
        return $this->hasMany('App\Models\FeRouteUrl','fe_route_id','id');
    }

    public function feRouteSteps(){
        return $this->hasMany('App\Models\FeRouteStep','fe_route_id', 'id');
    }
}

