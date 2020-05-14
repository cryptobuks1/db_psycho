<?php

namespace App\Models\BL;

use Illuminate\Database\Eloquent\Model;

class PaymentInvoice extends Model
{
    protected $table = "PaymentInvoices";

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
        "doc_sum",
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
