<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumerAccessRow extends Model
{
    protected $table= '_ConsumerAccessRows';

    protected $primaryKey = "id";

    protected $fillable = [
        'access_axis_id',
        'db_area_id',
        'access_role_id',
        'consumer_id',
    ];
}
