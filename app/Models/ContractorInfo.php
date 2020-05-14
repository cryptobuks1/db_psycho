<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractorInfo extends Model
{
    protected $table = "ContractorInfo";

    protected $primaryKey = "id";

    protected $fillable = [
        'info_kind_id',
        'line_n',
        'contractor_id',
        'region_id',
        'info_type_id',
        'country_id',
        'representation',
        'city_name',
        'email',
        'url_name',
        'phone_number',
        'phone_number_without_codes',
        'actual_l',
        'modify_date',
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
    public function contractors(){
        return $this->hasOne('App\Models\Contractor', 'id', 'contractor_id');
    }

    public function infokind(){
        return $this->hasMany('App\Models\InfoKind', 'id', 'info_kind_id');
    }

    public function infotype(){
        return $this->hasMany('App\Models\InfoType', 'id', 'info_type_id');
    }

    public static function getNewObject()
    {
        return [
            'id' => null,
            'info_kind_id' => null,
            'country' => null,
            'contractors' => null,
            'contractorId' => null,
            'info_type_name' => null,
            'info_kind_name' => null,
            'infotype' => null,
            'infokind' => null,
            'contractor_short_name' => null,
            'contractor_id' => null,
            'region_id' => null,
            'info_type_id' => null,
            'country_id' => null,
            'line_n' => null,
            'representation' => null,
            'city_name' => null,
            'email' => null,
            'url_name' => null,
            'phone_number' => null,
            'phone_number_without_codes' => null,
            'actual_l' => false,
            'created_at' => '',
            'created_by' => '',
            'updated_at' => '',
            'updated_by' => '',
        ];
    }
}
