<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestNumber extends Model
{
    protected $table = "request_numbers";

    protected $primaryKey = "id";

    protected $fillable = [
        'status',
    ];

    protected $hidden = [
        'remember_token',
    ];
}
