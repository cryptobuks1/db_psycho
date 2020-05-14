<?php
// created Albert Topalu 03.04.19

namespace App\Models\BL;

use App\Http\Controllers\Api\JournalDocumentsController;
use App\Scope\BlLeasingContract\BlLeasingContractJournalTitleScope;
use Illuminate\Database\Eloquent\Model;

class BlLeasingContract extends Model
{
    protected $table = "blLeasingContracts";

    protected $primaryKey = "id";

    protected $fillable = [
        'physical_person_id',
        'company_id',
        'bl_status_id',
        'db_area_id',
        'contractor_contract_id',
        'contractor_contract_name',
        'bl_sale_point_id',
        'bl_customer_request_id',
        'd2_leasing_contract_status',
        'd4_payment_with_VAT',
        'd5_payment_deadline',
        'd6_payment_status',
        'd7_payment_number',
        'd8_payment_balance',
        'uid_1c_code',
        'deleted_l',
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

        if(\Route::current()->controller instanceof JournalDocumentsController)
            static::addGlobalScope(new BlLeasingContractJournalTitleScope());
    }

    public static function getCardUrl()
    {
        $controller = \Route::current()->controller;

        if($controller instanceof JournalDocumentsController)
            return "leasingContracts";

        // Стандартное значение
        return "leasingContracts";
    }

    public function blstatuses(){
        return $this->hasOne('App\Models\BL\BlStatus', 'id', 'bl_status_id');
    }

    public function contractorContract()
    {
        return $this->hasOne('App\Models\BL\ContractorContract', 'id', 'contractor_contract_id');
    }

    public function blCustomerRequest(){
        return $this->hasOne('App\Models\BL\BlCustomerRequest', 'id', 'bl_customer_request_id');
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function physicalPerson(){
        return $this->hasOne('App\Models\PhysicalPerson', 'id','physical_person_id');
    }
    public function salePoint(){
        return $this->hasOne('App\Models\Bl\BlSalePoint', 'id', 'bl_sale_point_id');
    }

    public function calculation(){
        return $this->hasOne(BlLeasingCalculation::class, 'row_id_base', 'id')->where('table_n_base',86)->orderBy('bl_leasing_calculation_date','desc');
    }

    public function blLeasingContractSpecifications()
    {
        return $this->hasMany(BlLeasingContractSpecification::class, "contractor_contract_id", "contractor_contract_id");
    }

    public function blInsurancePolicyContracts()
    {
        return $this->hasMany(BlInsurancePolicyContractTabLeasingContract::class, "contractor_contract_id", "contractor_contract_id")
            ->join("blInsurancePolicyContracts", "blInsurancePolicyContracts.id", "=", "blInsurancePolicyContractTabLeasingContracts.bl_insurance_policy_contract_id")
            ->groupBy("blInsurancePolicyContracts.id")
            ->select("blInsurancePolicyContracts.*");
    }
}
