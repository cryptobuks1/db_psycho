<?php

namespace App\Models;

use App\Models\BL\BlCustomerRequest;
use Illuminate\Database\Eloquent\Model;

class FeRouteObject extends Model
{
    protected $table = "FeRouteObjects";

    protected $primaryKey = "id";

    protected $fillable = [

        "fe_route_id",
        "row_id_fe_route_object",
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
            "fe_route_id" => "",
            "row_id_fe_route_object" => "",
            "completed_l" => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }

    public function feRouteStepObjects(){
        return $this->hasMany('App\Models\FeRouteStepObject', 'fe_route_object_id','id');
    }
    public function feRoutes(){
        return $this->hasOne('App\Models\FeRoute', 'id','fe_route_id');
    }

    public function customerRequest()
    {
        return $this->hasOne(BlCustomerRequest::class, "id", "row_id_fe_route_object");
    }

}
