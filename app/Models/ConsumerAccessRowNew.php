<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumerAccessRowNew extends Model
{
    protected $table = "_ConsumerAccessRowsNew";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'access_role_id',
        'contractor_contract_id',
        'contractor_id',
        'company_id',
        'consumer_id',
        'actual_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
}
