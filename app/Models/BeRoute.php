<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeRoute extends Model
{
    protected $table = "BeRoutes";

    protected $primaryKey = "id";

    protected $fillable = [

        "controller_id",
        "action_type_id",
        "be_route_code",
        "be_route_path",
        "be_route_name",
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
            "controller_id" => "",
            "action_type_id" => "",
            "be_route_code" => "",
            "be_route_path" => "",
            "be_route_name" => "",
            "actual_l" => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }

    public function controller(){
        return $this->hasOne('App\Models\Controller','id', 'controller_id');
    }

    public function actionType(){
        return$this->hasOne('App\Models\ActionType', 'id', 'action_type_id');
    }
}
