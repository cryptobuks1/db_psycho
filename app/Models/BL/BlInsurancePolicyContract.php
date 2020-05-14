<?php

namespace App\Models\BL;

use App\Http\Controllers\Api\JournalDocumentsController;
use App\Scope\BlInsurancePolicyContract\BlInsurancePolicyContractJournalTitleScope;
use Illuminate\Database\Eloquent\Model;

class BlInsurancePolicyContract extends Model
{
    protected $table = "blInsurancePolicyContracts";

    protected $primaryKey = "id";

    protected $fillable = [

        'db_area_id',
        'contractor_id_insurance_company',
        'contractor_contract_id',
        'table_n_insurant',
        'row_id_insurant',
        'bl_insurance_policy_contract_insurance_premium',
        'bl_insurance_policy_contract_franchise_amount',
        'd1_payment_term_next_installment',
        'd2_leasing_contract_status',
        'd3_leasing_object',
        'd11_leasing_contract_name',
        'uid_1c_code',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
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
            static::addGlobalScope(new BlInsurancePolicyContractJournalTitleScope());
    }

    public static function getCardUrl()
    {
        $controller = \Route::current()->controller;

        if($controller instanceof JournalDocumentsController)
            return "insuranceContracts";

        // Стандартное значение
        return "insuranceContracts";
    }

    public function insuranceCompany(){
        return $this->hasOne('App\Models\Contractor','id','contractor_id_insurance_company');
    }
    public function ContractorContract(){
        return $this->hasOne('App\Models\BL\ContractorContract','id','contractor_contract_id');
    }
    public function blInsurancePolicyContractTabLeasingContract()
    {
        return $this->hasMany(BlInsurancePolicyContractTabLeasingContract::class, "bl_insurance_policy_contract_id", "id");
    }
}
