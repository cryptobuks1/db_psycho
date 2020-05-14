<?php

namespace App\Models\BL;

use App\Models\BL\ContractorContract;
use Illuminate\Database\Eloquent\Model;

class SettlementReconciliationAct extends Model
{
    protected $table = "SettlementReconciliationActs";

    protected $primaryKey = "id";

    protected $fillable = [
        "db_area_id",
        "company_id",
        "contractor_id",
        "contractor_contract_id",
        "stored_file_id",
        "uid_1c_code",
        "doc_number",
        "doc_date",
        "start_date",
        "end_date",
        "actual_l",
        "deleted_l",
        "created_by",
        "updated_by",
    ];

    public function contractorContract()
    {
        return $this->hasOne(ContractorContract::class, 'id', 'contractor_contract_id');
    }
}
