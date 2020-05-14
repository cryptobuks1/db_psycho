<?php

namespace App\Models\BL;

use App\Http\Controllers\Api\BL\ClientBlCustomerRequestsController;
use App\Http\Controllers\Api\BL\PartnerBlCustomerRequestsController;
use App\Http\Controllers\Api\JournalDocumentsController;
use App\Http\Traits\ConsumerCheck;
use App\Http\Traits\DefaultSystemParams;
use App\Scope\BlCustomerRequest\ClientBlCustomerRequestScope;
use App\Scope\BlCustomerRequest\PartnerBlCustomerRequestScope;
use Illuminate\Database\Eloquent\Model;

class BlCustomerRequest extends Model
{
    use ConsumerCheck, DefaultSystemParams;
    protected $table = "blCustomerRequests";

    protected $primaryKey = "id";

    protected $fillable = [
        'lessee_contractor_id',
        'bl_status_id',
        'db_area_id',
        'company_id',
        'lessee_bl_legal_form_id',
        'supplier_contractor_id',
        'supplier_bl_legal_form_id',
        'bl_customer_request_number',
        'bl_customer_request_date',
        'lessee_type',
        'lessee_name',
        'lessee_first_name',
        'lessee_middle_name',
        'lessee_person_phone',
        'lessee_position',
        'lessee_email',
        'lessee_inn',
        'lessee_kpp',
        'lessee_ogrn',
        'lessee_legal_address',
        'lessee_actual_address',
        'lessee_phone',
        'supplier_type',
        'supplier_name',
        'supplier_second_name',
        'supplier_first_name',
        'supplier_middle_name',
        'supplier_email',
        'supplier_inn',
        'supplier_kpp',
        'supplier_ogrn',
        'supplier_legal_address',
        'supplier_person_phone',
        'supplier_person_FIO',
        'supplier_phone',
        'supplier_position',
        'uid_1c_code',
        'deleted_l',
        'sent_l',
        'partner_point_id',
        'bl_customer_request_stage',
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

        if(\App::runningInConsole())
            return;

        $controller = \Route::current()->controller;

        if($controller instanceof PartnerBlCustomerRequestsController)
        {
            static::addGlobalScope(new PartnerBlCustomerRequestScope("BlCustomerRequest"));
        }
        elseif($controller instanceof ClientBlCustomerRequestsController)
        {
            static::addGlobalScope(new ClientBlCustomerRequestScope("BlCustomerRequest"));
        }
    }

    public static function getCardUrl()
    {
        $controller = \Route::current()->controller;

        if($controller instanceof JournalDocumentsController)
            return "customerRequests";

        // Стандартное значение
        return "customerRequests";
    }


    public static function getNewObject()
    {
        return [
            'id'                         => null,
            'lessee_contractor_id'       => null,
            'bl_status_id'               => 3,
            'db_area_id'                 => self::getDefaultDBAreaId(),
            'company_id'                 => self::getDefaultCompanyId(),
            'lessee_bl_legal_form_id'    => null,
            'supplier_contractor_id'     => null,
            'supplier_bl_legal_form_id'  => null,
            'bl_customer_request_number' => null,
            'bl_customer_request_date'   => \DateManager::now(),
            'lessee_type'                => 1,
            'lessee_name'                => null,
            'lessee_first_name'          => null,
            'lessee_middle_name'         => null,
            'lessee_person_phone'        => null,
            'lessee_position'            => null,
            'lessee_email'               => null,
            'lessee_inn'                 => null,
            'lessee_kpp'                 => null,
            'lessee_ogrn'                => null,
            'lessee_legal_address'       => null,
            'lessee_actual_address'      => null,
            'lessee_phone'               => null,
            'supplier_type'              => null,
            'supplier_name'              => null,
            'supplier_second_name'       => null,
            'supplier_first_name'        => null,
            'supplier_middle_name'       => null,
            'supplier_email'             => null,
            'supplier_inn'               => null,
            'supplier_kpp'               => null,
            'supplier_ogrn'              => null,
            'supplier_legal_address'     => null,
            'supplier_person_phone'      => null,
            'supplier_person_FIO'        => null,
            'supplier_phone'             => null,
            'supplier_position'          => null,
            'uid_1c_code'                => null,
            'deleted_l'                  => false,
            'sent_l'                     => false,
            'bl_customer_request_stage'  => 1,
            'partner_point_id'           => null,
            'created_by'                 => "",
            'updated_by'                 => "",
            'created_at'                 => "",
            'updated_at'                 => "",
        ];
    }

    public function blCustomerRequestTabLeasingObjects()
    {
        return $this->hasMany('App\Models\BL\BlCustomerRequestTabLeasingObject', 'bl_customer_request_id', 'id');
    }

    public function partnerPoint()
    {
        return $this->hasOne('App\Models\PartnerPoint', 'id', 'partner_point_id');
    }

    public function blStatus()
    {
        return $this->hasOne('App\Models\BL\BlStatus', 'id', 'bl_status_id');
    }

    public function lesseeContractor()
    {
        return $this->hasOne('App\Models\Contractor', 'id', 'lessee_contractor_id');
    }

    public function blLeasingCalculations()
    {
        return $this->hasMany(BlLeasingCalculation::class, "row_id_base", "id")->where("table_n_base", 81);
    }

    public function blLeasingContracts()
    {
        return $this->hasMany(BlLeasingContract::class, "bl_customer_request_id", "id");
    }

}
