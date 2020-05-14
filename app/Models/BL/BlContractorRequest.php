<?php
//

namespace App\Models\BL;

use App\Http\Controllers\Api\BL\ClientBlContractorRequestsController;
use App\Http\Controllers\Api\BL\ClientBlCustomerRequestsController;
use App\Http\Controllers\Api\BL\PartnerBlContractorRequestsController;
use App\Http\Controllers\Api\BL\PartnerBlCustomerRequestsController;
use App\Scope\BlCustomerRequest\ClientBlCustomerRequestScope;
use App\Scope\BlCustomerRequest\PartnerBlCustomerRequestScope;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\ConsumerCheck;
use App\Http\Traits\DefaultSystemParams;

class BlContractorRequest extends Model
{
    use ConsumerCheck, DefaultSystemParams;

    protected $table = "blContractorRequests";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_contractor_request_title',
        'contractor_id',
        'company_id',
        'bl_status_id',
        'bl_contractor_request_type_id',
        'bl_contractor_request_description',
        'db_area_id',
        'uid_1c_code',
        'sent_l',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();

        if(\App::runningInConsole())
            return;

        $controller = \Route::current()->controller;

        if($controller instanceof PartnerBlContractorRequestsController)
        {
            static::addGlobalScope(new PartnerBlCustomerRequestScope("BlContractorRequest"));
        }
        elseif($controller instanceof ClientBlContractorRequestsController)
        {
            static::addGlobalScope(new ClientBlCustomerRequestScope("BlContractorRequest"));
        }
    }


    public static function getNewObject()
    {
        $bl_status = BlStatus::query()
            ->where([
                "bl_status_name" => "Черновик",
                "db_area_id"     => self::getDefaultDBAreaId()
            ])->select("id")->get()->first();
        return [
            'id'                                => null,
            //            'bl_contractor_request_title' => 'Новый запрос',
            'bl_contractor_request_title'       => '',
            'contractor_id'                     => null,
            'company_id'                        => self::getDefaultCompanyId(),
            'bl_status_id'                      => $bl_status->id,
            'bl_contractor_request_type_id'     => null,
            'bl_contractor_request_description' => '',
            'db_area_id'                        => self::getDefaultDBAreaId(),
            'uid_1c_code'                       => null,
            'sent_l'                            => false,
            'deleted_l'                         => false,
            'created_by'                        => null,
            'updated_by'                        => null,
            'created_at'                        => null,
            'updated_at'                        => null,
        ];
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }

    public function contractor()
    {
        return $this->hasOne('App\Models\Contractor', 'id', 'contractor_id');
    }

    public function blstatus()
    {
        return $this->hasOne('App\Models\BL\BlStatus', 'id', 'bl_status_id');
    }

    public function blcontRequestType()
    {
        return $this->hasOne('App\Models\BL\BlContractorRequestType', 'id', 'bl_contractor_request_type_id');
    }

    public static function getAttributeCaption($attr)
    {
        return [
            "bl_contractor_request_title"           => "Theme",
            "contractor_id"                         => "Contractor",
            "company_id"                            => "Company",
            "bl_status_id"                          => "Status",
            "bl_contractor_request_type_id"         => "QueryType",
            "bl_contractor_request_description"     => "Description",
        ][$attr] ?? $attr;
    }

    public static function getValidationRules()
    {
        return [
            "bl_contractor_request_title"           => "nullable|string|max:100",
            "contractor_id"                         => "required|integer",
            "company_id"                            => "nullable|integer",
            "bl_status_id"                          => "nullable|integer",
            "bl_contractor_request_type_id"         => "required|integer",
            "bl_contractor_request_description"     => "nullable|string|max:200",
            "sent_l"                                => "nullable|boolean",
            "deleted_l"                             => "nullable|boolean",
        ];
    }

    public function partner()
    {
        return $this->hasMany('App\Models\Partner', 'contractor_id', 'contractor_id');
    }
}
