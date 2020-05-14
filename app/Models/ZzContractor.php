<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZzContractor extends Model
{

//    protected $table = "ZzContractor";
    protected $table = "ZzContractors";

    protected $primaryKey = "id";

    protected $fillable = [
        'country_id',
        'reason_date_change_id',
        'contractor_id',
        'individual_l',
        'entrepreneur_l',
        'contractor_full_name',
        'contractor_short_name',
        'taxpayer_number',
        'register_number',
        'social_security_number',
        'entrepreneur_certificate',
        'entrepreneur_certificate_date',
        'first_name',
        'last_name',
        'middle_name',
        'male_l',
        'birth_date',
        'birth_place',
        'record_date',
//        'suser_name',
//        'modify_date',
    ];



}
