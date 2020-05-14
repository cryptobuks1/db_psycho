<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZzCompanyInfo extends Model
{
    protected $table= 'ZzCompanyInfo';

    protected $primaryKey = "id";

    protected $fillable = [
        'company_id',
        'info_type_id',
        'country_id',
        'reason_date_change_id',
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
//        'modify_date',
    ];

    protected $hidden = [
        'remember_token',
    ];
}
