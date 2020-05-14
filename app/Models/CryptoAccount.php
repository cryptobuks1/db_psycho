<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoAccount extends Model
{
    protected $table = "CryptoAccounts";

    protected $primaryKey = "id";

    protected $fillable = [
        'c_account_name',
        'table_n',
        'row_id',
        'table_n_service',
        'row_id_service',
        'c_account_login',
        'c_account_pass',
        'c_account_remark',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];
}
