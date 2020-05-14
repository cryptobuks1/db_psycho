<?php

namespace App\Models;

use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use DefaultSystemParams;

    protected $table = "ContactPersons";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'table_n_owner',
        'row_id_owner',
        'contact_person_name',
        'contact_person_position',
        'uid_1c_code',
        'deleted_l',
        'actual_l',
        'created_by',
        'updated_by'
    ];

    public static function getNewObject()
    {
        return [
            "id"                      => null,
            'contact_person_name'     => "",
            'contact_person_position' => "",
            "db_area_id" => self::getDefaultDBAreaId(),
            "table_n_owner" => null,
            "row_id_owner" => null,
            "updated_at" => "",
            "updated_by" => "",
            "created_at" => "",
            "created_by" => "",
        ];
    }

    public function contactPersonInfo()
    {
        return $this->hasMany(ContactPersonInfo::class, "contact_person_id", "id");
    }

    public function partnerEmployeeContactPerson()
    {
        return $this->hasOne('App\Models\PartnerEmployeeContactPerson', "contact_person_id", "id")->select(['partner_employee_id', 'contact_person_id', 'id']);
    }
}
