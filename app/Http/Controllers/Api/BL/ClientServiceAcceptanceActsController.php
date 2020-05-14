<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Classes\CheckController;
use App\Models\BL\ContractorContract;
use App\Models\BL\SettlementReconciliationAct;
use App\Models\DbArea;
use App\Models\BL\ServiceAcceptanceAct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class ClientServiceAcceptanceActsController extends ServiceAcceptanceActsController
{
    public function list_query(){
        return parent::list_query()->with('contractorContract',"contractorContract.contractor")->has("contractorContract.contractor");
    }
}
