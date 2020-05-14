<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlContractorRequestType extends Model
{
    protected $table = "blContractorRequestTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_contractor_request_type_name',
        'e_mail',
        'db_area_id',
        'actual_l',
        'uid_1c_code',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',

    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'bl_contractor_request_type_name' => null,
            'e_mail' => null,
            'db_area_id' => 7,
            'actual_l' => null,
            'uid_1c_code' => null,
            'deleted_l' => null,
            'created_by' => null,
            'updated_by' => null,
            'created_at' => null,
            'updated_at' => null,
        ];
    }

    protected $hidden = [
        'remember_token',
    ];
}
