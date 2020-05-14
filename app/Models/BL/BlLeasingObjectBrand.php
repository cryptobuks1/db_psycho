<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlLeasingObjectBrand extends Model
{
    //

    protected $table='blLeasingObjectBrands';

    protected  $primaryKey = 'id';

    protected $fillable = [
        'db_area_id',
        'uid_1c_code',
        'bl_leasing_object_type_id',
        'bl_leasing_object_brand_name',
        'bl_leasing_object_brand_full_name',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function type(){
        return $this->hasOne('App\Models\BL\BlLeasingObjectType', 'id', 'bl_leasing_object_brand_id');
    }
}
