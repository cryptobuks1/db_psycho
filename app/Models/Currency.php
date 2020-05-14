<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = "_Currencies";

    protected $primaryKey = "id";

    protected $fillable = [
        'currency_name',
        'currency_code',
        'currency_code_n',
        'currency_symbol',
        //        'country_id',
        //        'c_token_id',
        //        'image_id',
        'currency_remark',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id'              => null,
            'currency_name'   => null,
            'currency_code'   => null,
            'currency_code_n' => null,
            'currency_symbol' => null,
            'currency_remark' => null,
            'created_at'      => '',
            'created_by'      => '',
            'updated_at'      => '',
            'updated_by'      => '',
        ];
    }

    public function country()
    {
        return $this->BelongsTo('App\Models\Country', 'country_id', 'id');
    }

    public function token()
    {
        return $this->BelongsTo('App\Models\CryptoToken', 'c_token_id', 'id');
    }

    public function image()
    {
        return $this->BelongsTo('App\Models\Image', 'image_id', 'id');
    }
}
