<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalPerson extends Model
{
    protected $table='PhysicalPersons';

    protected $primaryKey = 'id';

    protected $fillable=[

        'db_area_id',
        'physical_person_name',
        'uid_1c_code',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public  function info(){
        return $this->hasMany('App\Models\PhysicalPersonInfo', 'physical_person_id','id');
    }
}
