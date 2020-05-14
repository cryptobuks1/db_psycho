<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlLegalForm extends Model
{

    protected $table='blLegalForms';

    protected  $primaryKey = 'id';

    protected $fillable = [

        'bl_legal_form_name',
        'bl_legal_form_full_name',
        'db_area_id',
        'uid_1c_code',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }
}
