<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportRequest extends Model
{
    protected $table = "report_requests";

    protected $primaryKey = "id";

    protected $fillable = [
        'report_id',
        'param',
        'value',
    ];

    protected $hidden = [
        'remember_token',
    ];
}
