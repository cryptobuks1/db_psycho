<?php

namespace App\Models\BankNet;

use Illuminate\Database\Eloquent\Model;

class BnExchangeDirection extends Model
{
    protected $table = "bnExchangeDirections";

    protected $primaryKey = "id";

    protected $fillable = [
        "bn_payment_method_id",
        "bn_payment_method_group_id",
        "bn_currency_id",
        "exchange_direction_code",
        "exchange_direction_name",
        "deleted_l",
        'created_by',
        'updated_by',
    ];

    public static function getNewObject()
    {
        return [
            "id"                        => null,
            "bn_payment_method_id" => null,
            "bn_payment_method_group_id"      => null,
            "bn_currency_id"      => null,
            "exchange_direction_code"      => null,
            "exchange_direction_name"      => null,
            'created_by'                => "",
            'updated_by'                => "",
        ];
    }

    public function paymentMethod()
    {
        return $this->hasOne(BnPaymentMethod::class, "id", "bn_payment_method_id");
    }

    public function paymentMethodGroup()
    {
        return $this->hasOne(BnPaymentMethodGroup::class, "id", "bn_payment_method_group_id");
    }

    public function currency()
    {
        return $this->hasOne(BnCurrency::class, "id", "bn_currency_id");
    }


}
