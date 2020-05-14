<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class PhysicalPersonInfo extends Model
{
    protected $table='PhysicalPersonInfo';

    protected $primaryKey = 'id';

    protected $fillable=[

        'physical_person_id',
        'line_n',
        'info_type_id',
        'info_kind_id',
        'representation',
        'country_id',
        'region_id',
        'city_name',
        'e_mail',
        'url_name',
        'phone_number',
        'phone_number_without_codes',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
}
