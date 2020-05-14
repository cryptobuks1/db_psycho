<?php

namespace App\Models\BankNet;

use Illuminate\Database\Eloquent\Model;

class BnExchanger extends Model
{
    protected $table = "bnExchangers";

//    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        "exchanger_name",
        "kyc_sent_l",
        "anketa_sent_l",
        "profile_accepted_l",
        "confirmed_l",
        "exchanger_rating_n",
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            "exchanger_name" => "",
            "kyc_sent_l" => false,
            "anketa_sent_l" => false,
            "profile_accepted_l" => false,
            "confirmed_l" => false,
            "exchanger_rating_n" => null,
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '2019-11-08 10:48:02',
            'updated_at' => '2019-11-08 10:48:02',
        ];
    }
}
