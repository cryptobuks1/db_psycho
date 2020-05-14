<?php

namespace App\Models;

use App\Http\Controllers\Api\BL\PartnerBlContractorRequestsController;
use App\Http\Controllers\Api\BL\PartnerBlInsurancePolicyContractsController;
use App\Http\Controllers\Api\BL\PartnerBlLeasingCalculationsController;
use App\Http\Controllers\Api\BL\PartnerBlLeasingContractsController;
use App\Http\Controllers\Api\BL\PartnerBlCustomerRequestsController;
use App\Http\Controllers\Api\PartnerRegionsController;
use App\Http\Controllers\Api\Partners\PartnerPartnerRegionsController;
use App\Http\Controllers\Api\Partners\PartnerPartnersController;
use App\Http\Controllers\Api\PartnersController;
use App\Http\Traits\DefaultSystemParams;
use App\Scope\Partner\PartnerPartnerScope;
use App\Scope\Partner\PartnerScope;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use DefaultSystemParams;
    protected $table = "Partners";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'use_regions',
        'contractor_id',
        'partner_name',
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
            or $controller instanceof PartnerBlLeasingContractsController
            or $controller instanceof PartnerBlInsurancePolicyContractsController   or $controller instanceof PartnerBlContractorRequestsController
            or $controller instanceof PartnerPartnerRegionsController)
        {
            static::addGlobalScope(new PartnerPartnerScope("Partner"));
        }
        elseif($controller instanceof PartnerRegionsController
            or $controller instanceof PartnersController
            or $controller instanceof PartnerPartnersController)
        {
            static::addGlobalScope(new PartnerScope("Partner"));
        }
    }

    public static function getNewObject()
    {
        return [
            'id'            => null,
            'db_area_id'    => self::getDefaultDBAreaId(),
            'use_regions'   => false,
            'contractor_id' => null,
            'partner_name'  => null,
            'uid_1c_code'   => null,
            'actual_l'      => true,
            'deleted_l'     => false,
            'created_at'    => '',
            'created_by'    => '',
            'updated_at'    => '2019-11-08 10:48:02',
            'updated_by'    => '2019-11-08 10:48:02',
        ];
    }

    public function contractor()
    {
        return $this->hasMany('App\Models\Contractor', 'id', 'contractor_id')->select(['contractor_short_name', 'id']);
    }

    public function dbArea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id')->select(['db_area_name', 'id']);
    }

    public function partnerEmployee()
    {
        return $this->hasMany('App\Models\PartnerEmployee', 'partner_id', 'id')
            ->select(['db_area_name', 'id', 'partner_id']);
    }

    public function partnerPoint()
    {
        return $this->hasMany('App\Models\PartnerPoint', 'partner_id', 'id')->select(['partner_point_name', 'id']);
    }

    public function partnerRegion()
    {
        return $this->hasMany('App\Models\PartnerRegion', 'partner_id', 'id')->select(['partner_regions_name', 'id']);
    }

    public static function getAttributeCaption($attr)
    {
        return [
                "partner_name"           => "Name",
                "contractor_id"          => "PrimaryContractor",
                "use_regions"             => "UseRegions",
            ][$attr] ?? $attr;
    }

    public static function getValidationRules()
    {
        return [
            'db_area_id'    => "required|integer",
            'use_regions'   => "nullable|boolean",
            'contractor_id'  => "required|integer",
            'partner_name'  => "nullable|string",
            'uid_1c_code'   => "nullable|string|max:36",
            'actual_l'       => "nullable|boolean",
            'deleted_l'     => "nullable|boolean",
        ];
    }
}
