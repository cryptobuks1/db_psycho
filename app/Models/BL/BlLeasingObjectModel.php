<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlLeasingObjectModel extends Model
{
    //

    protected $table='blLeasingObjectModels';

    protected  $primaryKey = 'id';

    protected $fillable = [
        'db_area_id',
        'uid_1c_code',
        'bl_leasing_object_brand_id',
        'bl_leasing_object_model_name',
        'bl_leasing_object_model_issue_year',
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

    public function brand(){
        return $this->hasOne('App\Models\BL\BlLeasingObjectBrand', 'id', 'bl_leasing_object_brand_id');
    }
}
