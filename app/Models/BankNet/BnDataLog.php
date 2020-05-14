<?php

namespace App\Models\BankNet;

use Illuminate\Database\Eloquent\Model;

class BnDataLog extends Model
{
    protected $table = "bnDataLogs";

    protected $primaryKey = "id";

    protected $fillable = [
        "bn_signal_id",
        "objectName",
        "objectID",
        "object_json",
        "status_n",
        "description",
        'created_by',
        'updated_by',
    ];
}
