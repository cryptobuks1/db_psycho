<?php

namespace App\Models\BankNet;

use Illuminate\Database\Eloquent\Model;

class BnCurrency extends Model
{
    protected $table = "bnCurrencies";

    protected $primaryKey = "id";

    protected $fillable = [
        "currency_name",
        "currency_code",
        "currency_code_n",
        "currency_type_n",
        "currency_symbol",
        "currency_remark",
        "deleted_l",
        'created_by',
        'updated_by',
    ];

    public static function getNewObject()
    {
        return [
            "id"              => null,
            "currency_name"   => "",
            "currency_code"   => "",
            "currency_code_n" => null,
            "currency_type_n" => null,
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l"       => false,
            'created_by'      => "",
            'updated_by'      => "",
        ];
    }

}
