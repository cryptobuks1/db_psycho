<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoToken extends Model
{
    protected $table = "_CryptoTokens";

    protected $primaryKey = "id";

    protected $fillable = [
        'c_token_code',
        'c_token_symbol',
        'c_platform_id',
        'image_id',
        'c_token_remark',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];

    public function platform(){
        return $this->BelongsTo('App\Models\CryptoPlatform','c_platform_id', 'id');
    }

    public function image(){
        return $this->hasOne('App\Models\Image','id', 'image_id');
    }
}
