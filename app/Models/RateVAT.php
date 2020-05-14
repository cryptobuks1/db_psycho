<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateVAT extends Model
{
     protected $table='_RateVAT';

     protected $primaryKey = 'id';

     protected $fillable=[
         'rate_VAT_code',
         'rate_VAT_name',
         'deleted_l',
         'created_by',
         'updated_by',
         'created_at',
         'updated_at',
     ];
}
