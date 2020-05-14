<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoExchange extends Model
{
    protected $table = "_CryptoExchanges";

    protected $primaryKey = "id";

    protected $fillable = [
        'c_exchange_name',
        'c_exchange_code',
        'country_id',
        'image_id',
        'c_exchange_url',
        'c_exchange_remark',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];

    public function country(){
        return $this->BelongsTo('App\Models\Country','country_id', 'id');
    }

    public function image(){
        return $this->hasOne('App\Models\Image','id', 'image_id');
    }
}
