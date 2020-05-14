<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoWallet extends Model
{
    protected $table = "CryptoWallets";

    protected $primaryKey = "id";

    protected $fillable = [
        'c_wallet_code',
        'c_wallet_name',
        'c_wallet_n',
        'c_wallet_user_n',
        'c_account_id',
        'uid_1c_code',
        'c_wallet_remark',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];
}
