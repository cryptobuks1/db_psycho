<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumerSessionToken extends Model
{
    protected $table = "ConsumerSessionTokens";

    protected $primaryKey = "id";

    protected $fillable = [
        'token_old',
        'token_new',
        'last_activity_time',
        'token_generation_time',
    ];

}
