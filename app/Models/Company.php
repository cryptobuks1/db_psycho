<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    protected $table = "Companies";

    protected $primaryKey = "id";

    protected $fillable = [
        'company_id',
        'db_area_id',
        'country_id',
        'uid_1c_code',
        'individual_l',
        'entrepreneur_l',
        'company_full_name',
        'company_short_name',
        'taxpayer_number',
        'code_reason_number',
        'registry_number',
        'social_security_number',
        'entrepreneur_certificate',
        'entrepreneur_certificate_date',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function reports(){
        return $this->hasMany('App\Report','company_id', 'id')
            ->where('user_id', Auth::user()->id)->orderBy('created_at', 'asc');
    }


    public function reportsFirst(){
        return $this->hasOne('App\Report','company_id', 'id');
    }
    public function country(){
        return $this->hasOne('App\Models\Country','id', 'country_id');
    }

    public function dbarea(){
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }


    public function companyinfo(){
        return $this->hasOne('App\Models\CompanyInfo', 'id', 'company_id');
    }
}
