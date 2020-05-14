<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $table= 'CompanyInfo';

    protected $primaryKey = "id";

    protected $fillable = [
        'company_id',
        'country_id',
        'info_kind_id',
        'region_id',
        'info_type_id',
        'representation',
        'city_name',
        'e_mail',
        'url_name',
        'phone_number',
        'phone_number_without_codes',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function country(){
        return $this->hasOne('App\Models\Country','id', 'country_id');
    }

    public function regions(){
        return $this->hasOne('App\Models\Region', 'id', 'region_id');
    }

    public function companies(){
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }

    public function infokind(){
        return $this->hasOne('App\Models\InfoKind', 'id', 'info_kind_id');
    }

    public function infotype(){
        return $this->hasOne('App\Models\InfoType', 'id', 'info_type_id');
    }
}
