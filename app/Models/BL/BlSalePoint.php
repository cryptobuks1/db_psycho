<?php

namespace App\Models\Bl;

use Illuminate\Database\Eloquent\Model;

class BlSalePoint extends Model
{
    protected $table = "blSalePoints";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'bl_sale_point_name',
        'bl_sale_point_address',
        'uid_1c_code',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'

    ];


    protected $hidden = [
        'remember_token',
    ];
}
