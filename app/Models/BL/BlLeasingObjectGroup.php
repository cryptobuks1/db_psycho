<?php

namespace App\Models\BL;

use App\Http\Traits\DefaultSystemParams;
use Closure;
use Illuminate\Database\Eloquent\Model;

class BlLeasingObjectGroup extends Model
{
    use DefaultSystemParams;
    protected $table = "blLeasingObjectGroups";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'bl_leasing_object_group_name',
        'bl_customer_request_id',
        'uid_1c_code',
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
            "bl_leasing_object_group_name" => "",
            "db_area_id" => self::getDefaultDBAreaId(),
            'created_by' => "",
            'updated_by' => "",
            'created_at' => "",
            'updated_at' => "",
        ];
    }

    public function blCustomerRequestTabLeasingObjects(){
        return $this->hasMany('App\Models\BL\blCustomerRequestTabLeasingObject','bl_leasing_object_group_id','id');
    }

    public function dbarea(){
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }
}
