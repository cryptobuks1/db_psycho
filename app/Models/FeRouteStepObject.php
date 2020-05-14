<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeRouteStepObject extends Model
{
    protected $table = "FeRouteStepObjects";

    protected $primaryKey = "id";

    protected $fillable = [

        "fe_route_step_id",
        "fe_route_object_id",
        "row_id_fe_route_step_object",
        "completed_l",
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
            "fe_route_step_id" => "",
            "fe_route_object_id" => "",
            "row_id_fe_route_step_object" => "",
            "completed_l" => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }

    public function feRouteStep(){
        return $this->hasOne('App\Models\FeRouteStep','id', 'fe_route_step_id');
    }

    public function feRouteObject()
    {
        return $this->hasOne(FeRouteObject::class, "id", "fe_route_object_id");
    }
}
