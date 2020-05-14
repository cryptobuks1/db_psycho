<?php

namespace App\Models\BankNet;

use Illuminate\Database\Eloquent\Model;

class BnSignal extends Model
{
    protected $table = "bnSignals";

    protected $primaryKey = "id";

    protected $fillable = [
        "signal_json",
        "status_n",
        "description",
        'created_by',
        'updated_by',
    ];
}
