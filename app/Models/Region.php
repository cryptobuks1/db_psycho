<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "_Regions";

    protected $primaryKey = "id";

    protected $fillable = [
        'region_id',
        'country_id',
        'region_code',
        'region_code_alpha',
        'region_name',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id'                => null,
            'country_id'        => null,
            'region_code'       => null,
            'region_code_alpha' => null,
            'region_name'       => null,
            'created_at'        => '',
            'created_by'        => '',
            'updated_at'        => '',
            'updated_by'        => '',
        ];
    }

    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }
}
