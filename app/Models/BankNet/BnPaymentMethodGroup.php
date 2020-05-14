<?php

namespace App\Models\BankNet;

use Illuminate\Database\Eloquent\Model;

class BnPaymentMethodGroup extends Model
{
    protected $table = "bnPaymentMethodGroups";

    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "payment_method_group_code",
        "payment_method_group_name",
        "position",
        "description",
        'created_by',
        'updated_by',
    ];

    public static function getNewObject()
    {
        return [
            "id"                        => null,
            "payment_method_group_code" => "",
            "payment_method_group_name" => "",
            "position"      => null,
            "description"      => null,
            'created_by'                => "",
            'updated_by'                => "",
        ];
    }
}
