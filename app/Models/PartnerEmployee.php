<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerEmployee extends Model
{
    protected $table = "PartnerEmployees";

    protected $primaryKey = "id";

    protected $fillable = [
        'partner_id',
        'partner_employee_name',
        'partner_employee_position',
        'uid_1c_code',
        'deleted_l',
        'actual_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'partner_id' => null,
            'partner_employee_name' => null,
            'partner_employee_position' => null,
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '',
            'created_by' => '',
            'updated_at' => '2019-11-08 10:48:02',
            'updated_by' => '2019-11-08 10:48:02',
        ];
    }

    protected $hidden = [
        'remember_token',
    ];

    public function partner()
    {
        return $this->hasOne('App\Models\Partner', "id", "partner_id")->select(['partner_name', 'id']);
    }

    public function partnerEmployeeContactPerson()
    {
        return $this->hasMany('App\Models\PartnerEmployeeContactPerson', "partner_employee_id", "id")->select(['partner_employee_id', 'contact_person_id', 'id']);
    }
}
