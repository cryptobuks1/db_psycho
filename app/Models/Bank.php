<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "_Banks";

    protected $primaryKey = "id";

    protected $fillable = [
        'bank_name',
        'bank_name_en',
        'registry_number',
        'bank_swift_code',
        'bank_nation_code',
        'bank_corr_account',
        'code_reason_number',
        'country_id',
        'city_name',
        'city_name_en',
        'bank_remark',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id'                 => null,
            'bank_name'          => null,
            'bank_name_en'       => null,
            'registry_number'    => null,
            'bank_swift_code'    => null,
            'bank_nation_code'   => null,
            'bank_corr_account'  => null,
            'code_reason_number' => null,
            'country_id'         => null,
            'city_name'          => null,
            'city_name_en'       => null,
            'bank_remark'        => null,
            'created_at'         => '',
            'created_by'         => '',
            'updated_at'         => '',
            'updated_by'         => '',
        ];
    }

    public function country()
    {
        return $this->BelongsTo('App\Models\Country', 'country_id', 'id');
    }

}
