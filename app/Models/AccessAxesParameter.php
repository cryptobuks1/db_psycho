<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessAxesParameter extends Model
{
    protected $table = "__AccessAxesParameters";
    protected $primaryKey = "id";

    protected $fillable = [
        'access_axis_id',
        'line_n',
        'access_row_parameter_id',
        // todo Удалить после тестирования
        'country_id',
        'region_id',
        // end
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'access_axis_id' => 0,
            'line_n' => null,
            'access_row_parameter_id' => 0,
            'country_id' => null,
            'region_id' => null,
        ];
    }

    public function rowParameters()
    {
        return $this->hasOne(AccessRowParameter::class, "id", "access_row_parameter_id");
    }
    public function country()
    {
        return $this->hasOne(Country::class, "id", "country_id");
    }
    public function region()
    {
        return $this->hasOne(Region::class, "id", "region_id");
    }
}
