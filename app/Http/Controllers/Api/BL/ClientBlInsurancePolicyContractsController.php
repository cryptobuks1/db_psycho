<?php

namespace App\Http\Controllers\Api\BL;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\BL\BlInsurancePolicyContract;
use App\Models\ModelTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Parent_;

class ClientBlInsurancePolicyContractsController extends BlInsurancePolicyContractsController
{
    public function list_query(){
        return parent::list_query()->with('blInsurancePolicyContractTabLeasingContract',
            'blInsurancePolicyContractTabLeasingContract.contractorContract',
            'blInsurancePolicyContractTabLeasingContract.contractorContract.contractor')
            ->has('blInsurancePolicyContractTabLeasingContract.contractorContract.contractor');
    }
}
