<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeRouteStep extends Model
{
    protected $table = "FeRoutesSteps";

    protected $primaryKey = "id";

    protected $fillable = [

        "fe_route_id",
        "fe_component_id",
        "be_route_id",
        "line_n",
        "fe_route_step_code",
        "fe_route_step_name",
        "fe_route_step_title",
        "create_fe_route_step_object_l",
        "actual_l",
        "deleted_l",
        "created_by",
        "updated_by",
        "created_at",
        "updated_at",

    ];

    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            "id" => null,
            "fe_route_id" => "",
            "fe_url_id" => "",
            "fe_component_id" => "",
            "be_route_id" => "",
            "line_n" => "",
            "fe_route_step_code" => "",
            "fe_route_step_name" => "",
            "fe_route_step_title" => "",
            "create_fe_route_step_object_l" => "",
            "actual_l" => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }
    public function beRoute(){
        return $this->hasOne('App\Models\BeRoute','id', 'be_route_id');
    }
    public function feRoute(){
        return $this->hasOne('App\Models\FeRoute','id', 'fe_route_id');
    }
    public function feUrl()
    {
        return $this->hasOne('App\Models\FeUrl', 'id', 'fe_url_id');
    }
    public function feRouteStepObject()
    {
        return $this->hasMany('App\Models\FeRouteStepObject', 'fe_route_step_id', 'id');
    }
    public function feComponent()
    {
        return $this->hasOne('App\Models\FeComponent', 'id', 'fe_component_id');
    }
}
