<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = "BankAccounts";

    protected $primaryKey = "id";

    protected $fillable = [
        'bank_account_n',
        'bank_account_name',
        'bank_id',
        'currency_id',
        'bank_account_type_id',
        'bank_iban',
        'table_n',
        'row_id',
        'bank_account_code',
        'bank_account_remark',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];

    public function bank(){
        return $this->BelongsTo('App\Models\Bank','bank_id', 'id');
    }

    public function bankAccountType(){
        return $this->hasOne('App\Models\BankAccountType','id', 'bank_account_type_id');
    }
    public function currency(){
        return $this->BelongsTo('App\Models\Currency','currency_id', 'id');
    }
}
