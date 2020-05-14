<?php

namespace App\Http\Controllers\Api\BL;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\BL\BlInsurancePolicyContract;
use App\Models\ModelTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Parent_;

class PartnerBlInsurancePolicyContractsController extends BlInsurancePolicyContractsController
{
    public function list_query(){
        return parent::list_query()
            ->has('blInsurancePolicyContractTabLeasingContract.contractorContract.leasingContract.blCustomerRequest.partnerPoint.partnerRegions')
            ->has('blInsurancePolicyContractTabLeasingContract.contractorContract.leasingContract.blCustomerRequest.partnerPoint.partner');
    }
}
