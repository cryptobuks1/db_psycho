<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCron extends Model
{
    protected $table = "test_cron";

    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'test',
        'account',
    ];
}
