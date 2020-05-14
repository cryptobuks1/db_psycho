<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerEmployeeContactPerson extends Model
{
    protected $table = "PartnerEmployeeContactPersons";

    protected $primaryKey = "id";

    protected $fillable = [
        'partner_employee_id',
        'contact_person_id',
        'line_n',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'partner_employee_id' => null,
            'contact_person_id' => null,
            'line_n' => null,
            'created_at' => '',
            'created_by' => '',
            'updated_at' => '2019-11-08 10:48:02',
            'updated_by' => '2019-11-08 10:48:02',
        ];
    }


    protected $hidden = [
        'remember_token',
    ];


    public function partnerEmployee()
    {
        return $this->hasOne(PartnerEmployee::class, "id", "partner_employee_id");
    }


    public function contractPerson()
    {
        return $this->hasOne(ContactPerson::class, "id", "contact_person_id");
    }
}
