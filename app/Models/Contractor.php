<?php

namespace App\Models;


use App\Http\Controllers\Api\Admin\ConsumerAccessRowsNewController;
use App\Http\Controllers\Api\BL\BlContractorRequestsController;
use App\Http\Controllers\Api\BL\ClientBlInsurancePolicyContractsController;
use App\Http\Controllers\Api\QuestionnaireTemplates\QTQuestionKindsController;
use App\Http\Controllers\Api\TabCompanyContractor\ContractorsController;
use App\Http\Controllers\Api\TabCompanyContractor\ContractorsInfoController;
use App\Http\Controllers\Api\TabCompanyContractor\MyContractorsController;
use App\Http\Controllers\Api\BL\ClientBlLeasingContractsController;
use App\Http\Controllers\Api\BL\ClientBlLeasingCalculationsController;
use App\Http\Controllers\Api\BL\ClientInvoicesController;
use App\Http\Controllers\Api\BL\ClientPaymentInvoicesController;
use App\Http\Controllers\Api\BL\ClientServiceAcceptanceActsController;
use App\Http\Interfaces\Validatable;
use App\Http\Traits\ConsumerCheck;
use App\Http\Traits\DefaultSystemParams;
use App\Scope\BlContractorRequestContractorsScope;
use App\Scope\ContractorsScope;
use App\Scope\MyContractorsScope;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model implements Validatable
{
    use ConsumerCheck, DefaultSystemParams;
    protected $table = "Contractors";

    protected $primaryKey = "id";

    protected $fillable = [
        'contractor_id',
        'country_id',
        'db_area_id',
        'uid_1c_code',
        'individual_l',
        'identity_document',
        'contractor_full_name',
        'contractor_short_name',
        'taxpayer_number',
        'code_reason_number',
        'register_number',
        'social_security_number',
        'entrepreneur_certificate',
        'entrepreneur_certificate_date',
        'actual_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        if((new static())->isAdmin())
        {
            return;
        }

        if(\App::runningInConsole())
            return;

        $controller = \Route::current()->controller;

        if($controller instanceof MyContractorsController or $controller instanceof ClientBlLeasingContractsController
            or $controller instanceof ClientBlLeasingCalculationsController or $controller instanceof ClientBlInsurancePolicyContractsController
            or $controller instanceof ClientInvoicesController or $controller instanceof ClientPaymentInvoicesController
            or $controller instanceof ClientServiceAcceptanceActsController or $controller instanceof ContractorsInfoController
            or $controller instanceof QTQuestionKindsController)
        {
            static::addGlobalScope(new MyContractorsScope("Contractor"));
        }
    }


    //    public function newQuery($excludeDeleted = true)
    //    {
    //        $db_area_id = self::getDefaultDBAreaId();
    //        if ($this->isAdmin())
    //            return parent::newQuery($excludeDeleted);
    //        else {
    //            $result = ConsumerAccessRowsNewController::getAccessRows("contractor_id", $db_area_id);
    //            if ($result === true)
    //                return parent::newQuery($excludeDeleted)
    //                    ->where("db_area_id", $db_area_id);
    //            else
    //                return parent::newQuery($excludeDeleted)
    //                    ->whereIn("id", $result["ids"])
    //                    ->where("db_area_id", $db_area_id);
    //        }
    //    }

    public static function getNewObject()
    {
        return [
            'id'                            => null,
            'contractor_id'                 => null,
            'country_id'                    => null,
            'country'                       => null,
            'actual_l'                      => false,
            'uid_1c_code'                   => null,
            'server_id'                     => null,
            'server_db'                     => null,
            'db_type_id'                    => null,
            'db_area_id'                    => self::getDefaultDBAreaId(),
            'individual_l'                  => false,
            'identity_document'             => null,
            'contractor_full_name'          => '',
            'contractor_short_name'         => '',
            'taxpayer_number'               => null,
            'code_reason_number'            => null,
            'register_number'               => null,
            'social_security_number'        => null,
            'entrepreneur_certificate'      => null,
            'entrepreneur_certificate_date' => null,
            'created_at'                    => '',
            'created_by'                    => '',
            'updated_at'                    => '',
            'updated_by'                    => '',
        ];
    }

    public function contractorinfo()
    {
        return $this->hasMany('App\Models\ContractorInfo', 'contractor_id', 'id');
    }

    public function country()
    {
        return $this->hasMany('App\Models\Country', 'id', 'country_id')->select(['country_name', 'id']);
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }


    public static function getAttributeCaption($attr)
    {
        return [
                   "contractor_full_name"          => "ClientFullName",
                   "contractor_short_name"         => "ClientShortName",
                   "country_name"                  => "CountryName",
                   "actual_l"                      => "Actual",
                   "register_number"               => "KPP",
                   "taxpayer_number"               => "INN",
                   "code_reason_number"            => "OGRN",
                   "social_security_number"        => "SocialSecurityNumber",
                   "individual_l"                  => "Individual",
                   "entrepreneur_certificate"      => "EntrepreneurCertificate",
                   "entrepreneur_certificate_date" => "EntrepreneurCertificateDate",
               ][$attr] ?? $attr;
    }

    public static function getValidationRules()
    {
        return [
            "db_area_id"                    => "required|integer",
            "country_id"                    => "nullable|integer",
            "individual_l"                  => "nullable|boolean",
            "contractor_full_name"          => "required|string|max:200",
            "contractor_short_name"         => "required|string|max:100",
            "taxpayer_number"               => "nullable|string|max:30",
            "code_reason_number"            => "nullable|string|max:30",
            "register_number"               => "nullable|string|max:30",
            "social_security_number"        => "nullable|string|max:30",
            "entrepreneur_certificate"      => "nullable|string|max:30",
            "deleted_l"                     => "nullable|boolean",
            "entrepreneur_certificate_date" => "nullable|date",
            "actual_l"                      => "nullable|boolean",
        ];
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }


}
