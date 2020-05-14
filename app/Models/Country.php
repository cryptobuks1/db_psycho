<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "_Countries";

    protected $primaryKey = "id";

    protected $fillable = [

        'country_name',
        'country_full_name',
        'country_code',
        'country_code_alpha2',
        'country_code_alpha3',
        'own_doc_types_l',
        'deleted_l', /*y.yurenko*/
        'created_by',
        'updated_by',

    ];


    protected $casts = [
        'country_name'        => 'string',
        'country_full_name'   => 'string',
        'country_code'        => 'string',
        'country_code_alpha2' => 'string',
        'country_code_alpha3' => 'string',
        'deleted_l'           => 'integer',
        'created_by'          => 'string',
        'updated_by'          => 'string',
        'created_at'          => 'datetime',
        'updated_at'          => 'datetime',

    ];

    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            "id"                  => null,
            "country_name"        => "",
            "country_full_name"   => "",
            "country_code"        => "",
            "country_code_alpha2" => "",
            "country_code_alpha3" => "",
            "own_doc_types_l"     => "",
            "created_at"          => "",
            "updated_at"          => "",
            "created_by"          => "",
            "updated_by"          => "",
            "deleted_l"           => ""
        ];
    }

    public function regions()
    {
        return $this->hasMany('App\Models\Region', 'country_id', 'id');
    }

    public function contractors()
    {
        return $this->hasOne('App\Models\Contractor', 'country_id', 'id');
    }

    public function bank()
    {
        return $this->hasMany('App\Models\Bank', 'country_id', 'id');
    }

}
