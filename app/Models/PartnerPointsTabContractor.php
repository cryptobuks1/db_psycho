<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerPointsTabContractor extends Model
{
    protected $table = "PartnerPointsTabContractors";

    protected $primaryKey = "id";

    protected $fillable = [
        'partner_point_id',
        'line_n',
        'contractor_id',
        'main_l',
        'created_by',
        'updated_by'
    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'partner_point_id' => 0,
            'line_n' => null,
            'contractor_id' => 0,
            'main_l' => null,
        ];
    }
}
