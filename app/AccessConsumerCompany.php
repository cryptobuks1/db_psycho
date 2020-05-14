<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessConsumerCompany extends Model
{
    protected $table = "AccessConsumerCompanies";

    protected $primaryKey = "id";

    protected $fillable = [
        'consumer_id',
        'company_id',
        'main_l',
        'actual_l',
//        'suser_name',
//        'modify_date',
    ];

    protected $hidden = [
        'remember_token',
    ];

}
