<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeRouteUrl extends Model
{
    protected $table = "FeRouteUrls";

    protected $primaryKey = "id";

    protected $fillable = [

        "fe_route_id",
        "fe_url_id",
        "fe_route_url_parameter",
        "line_n",
        "use_card_l",
        "actual_l",
        "deleted_l",
        "created_by",
        "updated_by",
        "created_at",
        "updated_at"
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
            "fe_route_url_parameter" => "",
            "line_n" => "",
            "use_card_l" => "",
            "actual_l" => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }

    public function feUrl()
    {
        return $this->hasOne('App\Models\FeUrl', 'id', 'fe_url_id');
    }

    public function feRoute()
    {
        return $this->hasOne('App\Models\FeRoute', 'id', 'fe_route_id');
    }

    //fe_route_id




}
