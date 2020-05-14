<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZzCompany extends Model
{
    protected $table= 'ZzCompanies';

    protected $primaryKey = "id";

    protected $fillable = [
        'company_id',
        'company_full_name',
        'company_short_name',
        'country_id',
        'reason_date_change_id',
        'individual_l',
        'entrepreneur_l',
        'taxpayer_number',
        'register_number',
        'social_security_number',
        'entrepreneur_certificate',
        'entrepreneur_certificate_date',
        'record_date',
//        'suser_name',
//        'modify_date',
    ];

    protected $hidden = [
        'remember_token',
    ];
}


