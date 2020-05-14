<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZzContractorInfo extends Model
{
    protected $table = "ZzContractorInfo";

    protected $primaryKey = "id";

    protected $fillable = [
        'info_type_id',
        'country_id',
        'reason_date_change_id',
        'contractor_id',
        'info_kind_id',
        'region_id',
        'representation',
        'city_name',
        'e_mail',
        'url_name',
        'phone_number',
        'phone_number_without_codes',
        'record_date',
//        'suser_name',
//        'modify_date'
    ];
}
