<?php

namespace App\Models\ONE;

use Illuminate\Database\Eloquent\Model;

class OneAdditionalDetail extends Model
{
    protected $table = "OneAdditionalDetail";

    protected $primaryKey = "id";

    protected $fillable = [
        'one_add_detail_name',
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

    public function extensionOneAdditionalDetails()
    {
        return $this->hasMany('App\Models\ExtensionOneAdditionalDetail', 'one_add_detail_id', 'id');
    }
}
