<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessAxis extends Model
{
    protected $table = "__AccessAxes";

    protected $primaryKey = "id";

    protected $fillable = [
        'access_axis_name',
        'access_axis_code',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];
    public function tabParameters()
    {
        return $this->hasMany(AccessAxesParameter::class, "access_axis_id", "id");
    }
    public static function getNewObject()
    {
        return [
            "id" => null,
            "access_axis_name" => "",
            "access_axis_code" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }
}
