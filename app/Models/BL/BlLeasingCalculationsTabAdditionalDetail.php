<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class BlLeasingCalculationsTabAdditionalDetail extends Model
{
    protected $table = "blLeasingCalculationsTabAdditionalDetails";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_leasing_calculation_id',
        'line_n',
        'one_add_detail_id',
        'one_add_detail_value',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function oneAddDetail(){
        return $this->hasOne('App\Models\ONE\OneAdditionalDetail', 'id', 'one_add_detail_id');
    }
}
