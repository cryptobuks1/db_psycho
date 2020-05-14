<?php

namespace App\Models\BL;

use App\Http\Controllers\Api\JournalDocumentsController;
use App\Scope\BlInsurancePolicyContract\BlInsurancePolicyContractJournalTitleScope;
use Illuminate\Database\Eloquent\Model;

class BlInsurancePolicyContractTabLeasingContract extends Model
{
    protected $table = "blInsurancePolicyContractTabLeasingContracts";

    protected $primaryKey = "id";

    protected $fillable = [
        'contractor_contract_id',
        'contractor_id',
        'line_n',
        'bl_insurance_policy_contract_id',
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

        if(\Route::current()->controller instanceof JournalDocumentsController)
            static::addGlobalScope(new BlInsurancePolicyContractJournalTitleScope());
    }

    public static function getNewObject()
    {
        return [
            'id'                                          => null,
            'contractor_contract_id'                      => null,
            'line_n'                                      => null,
            'contractor_id'                   => null,
            'bl_insurance_policy_contract_id'                  => null,
        ];
    }

    public function contractorContract()
    {
        return $this->hasOne(ContractorContract::class, "id", "contractor_contract_id");
    }
}
