<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlLeasingSchedulePayments;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\BL\BlLeasingContract;
use App\Models\BL\BlLeasingCalculation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Route;
use App\Http\Classes\CheckController;

class ClientBlLeasingContractsController extends BlLeasingContractsController
{
    public function list_query()
    {
        return parent::list_query()->with('contractorContract','contractorContract.contractor')
            ->has('contractorContract.contractor');
    }

    public function card_query($leasing_contract_id)
    {
        return parent::card_query($leasing_contract_id)->with('contractorContract','contractorContract.contractor')
            ->has('contractorContract.contractor');
    }
}
