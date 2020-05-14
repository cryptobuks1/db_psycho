<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumerAccessRowParameter extends Model
{
    protected $table = "_ConsumerAccessRowParameters";

    protected $primaryKey = "id";

    protected $fillable = [
        'consumer_access_row_id',
        'data_types_id',
        'access_axes_parameter_id',
        'access_row_parameter_value',
        'created_by',
        'updated_by'
    ];
}
