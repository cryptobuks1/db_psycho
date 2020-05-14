<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "logs";

    protected $primaryKey = "id";

    protected $fillable = [
        'short_description',
        'text',
        'created_by',
        'updated_by',
    ];
}
