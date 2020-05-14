<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPersonInfo extends Model
{
    protected $table = "ContactPersonInfo";

    protected $primaryKey = "id";

    protected $fillable = [
        'country_id',
        'info_type_id',
        'contact_person_id',
        'region_id',
        'info_kind_id',
        'line_n',
        'representation',
        'city_name',
        'e_mail',
        'url_name',
        'phone_number',
        'phone_number_without_codes',
        'created_by',
        'updated_by'
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'country_id' => null,
            'info_type_id' => null,
            'contact_person_id' => null,
            'region_id' => null,
            'info_kind_id' => null,
            'line_n' => null,
            'representation' => "",
            'city_name' => "",
            'e_mail' => "",
            'url_name' => "",
            'phone_number' => "",
            'phone_number_without_codes' => "",
            'created_by' => "",
            'updated_by' => ""
        ];
    }

    public function country()
    {
        return $this->hasOne(Country::class, "id", "country_id");
    }

    public function infoType()
    {
        return $this->hasOne(InfoType::class, "id", "info_type_id");
    }

    public function contactPerson()
    {
        return $this->hasOne(ContactPerson::class, "id", "contact_person_id");
    }

    public function region()
    {
        return $this->hasOne(Region::class, "id", "region_id");
    }

    public function infoKind()
    {
        return $this->hasOne(InfoKind::class, "id", "info_kind_id");
    }
}
