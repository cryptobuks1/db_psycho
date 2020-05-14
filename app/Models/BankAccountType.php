<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccountType extends Model
{
    protected $table = "BankAccountTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'bank_account_type_code',
        'bank_account_type_name',
        'bank_account_type_remark',
        'deleted_l',
        'created_by',
        'updated_by',

    ];

    public static function getNewObject()
    {
        return [
            'id'                       => null,
            'bank_account_type_code'   => null,
            'bank_account_type_name'   => null,
            'bank_account_type_remark' => null,
            'created_at'               => '',
            'created_by'               => '',
            'updated_at'               => '',
            'updated_by'               => '',
        ];
    }


    protected $hidden = [
        'remember_token',
    ];
}
