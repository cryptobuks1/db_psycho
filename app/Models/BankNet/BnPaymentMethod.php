<?php

namespace App\Models\BankNet;

use Illuminate\Database\Eloquent\Model;

class BnPaymentMethod extends Model
{
    protected $table = "bnPaymentMethods";

    protected $primaryKey = "id";

    protected $fillable = [
        "payment_method_code",
        "payment_method_name",
        'created_by',
        'updated_by',
    ];

    public static function getNewObject()
    {
        return [
            "id"                  => null,
            "payment_method_code" => "",
            "payment_method_name" => "",
            'created_by'          => "",
            'updated_by'          => "",
        ];
    }
}
