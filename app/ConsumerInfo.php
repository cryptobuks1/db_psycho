<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumerInfo extends Model
{
    protected $table= 'consumer_info';

    protected $primaryKey = "id";

    protected $fillable = [
        'contractor_id',
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

    public function contractors(){
        return $this->hasOne('App\Models\Contractor', 'id', 'contractor_id');
    }

    public function infokind(){
        return $this->hasOne('App\Models\InfoKind', 'id', 'info_kind_id');
    }

    public function infotype(){
        return $this->hasOne('App\Models\InfoType', 'id', 'info_type_id');
    }
}
