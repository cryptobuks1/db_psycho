<?php

namespace App\Models;

use App\Http\Controllers\Api\BL\PartnerBlCustomerRequestsController;
use App\Http\Controllers\Api\BL\PartnerBlInsurancePolicyContractsController;
use App\Http\Controllers\Api\BL\PartnerBlLeasingCalculationsController;
use App\Http\Controllers\Api\BL\PartnerBlLeasingContractsController;
use App\Http\Controllers\Api\PartnerRegionsController;
use App\Http\Controllers\Api\Partners\PartnerPartnerRegionsController;
use App\Http\Traits\DefaultSystemParams;
use App\Scope\PartnerRegion\PartnerPartnerRegionScope;
use App\Scope\PartnerRegion\PartnerRegionScope;
use Illuminate\Database\Eloquent\Model;

class PartnerRegion extends Model
{
    use DefaultSystemParams;

    protected $table = "PartnerRegions";

    protected $primaryKey = "id";

    protected $fillable = [
        'partner_id',
        'partner_regions_name',
        'uid_1c_code',
        'deleted_l',
        'actual_l',
        'created_by',
        'updated_by'
    ];

    protected static function boot()
    {
        parent::boot();

        if(\App::runningInConsole())
            return;

        $controller = \Route::current()->controller;

        if($controller instanceof PartnerBlCustomerRequestsController or $controller instanceof PartnerBlLeasingCalculationsController
            or $controller instanceof PartnerBlLeasingContractsController or $controller instanceof PartnerBlInsurancePolicyContractsController
            or $controller instanceof PartnerPartnerRegionsController)
        {
            static::addGlobalScope(new PartnerPartnerRegionScope("PartnerRegion"));
        }
        elseif($controller instanceof PartnerRegionsController)
        {
            static::addGlobalScope(new PartnerRegionScope("PartnerRegion"));
        }

    }

    public static function getNewObject()
    {
        return [
            'id'                   => null,
            'db_area_id'           => self::getDefaultDBAreaId(),
            'partner_id'           => null,
            'partner_regions_name' => null,
            'uid_1c_code'          => null,
            'actual_l'             => true,
            'deleted_l'            => false,
            'created_at'           => '',
            'created_by'           => '',
            'updated_at'           => '2019-11-08 10:48:02',
            'updated_by'           => '2019-11-08 10:48:02',
        ];
    }

    public function partner()
    {
        return $this->hasOne('App\Models\Partner', 'id', 'partner_id')->select(['partner_name', 'id']);
    }

    public function partnerPoint()
    {
        return $this->hasMany('App\Models\PartnerPoint', 'partner_id', 'partner_id')
            ->select(['partner_point_name', 'id']);
    }

    public function partnerPoints()
    {
        return $this->hasMany(PartnerPoint::class, "partner_regions_id", "id");
    }
}
