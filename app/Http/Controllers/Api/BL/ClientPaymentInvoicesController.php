<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\ContractorContract;
use App\Models\BL\Invoice;
use App\Models\BL\PaymentInvoice;
use App\Models\DbArea;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class ClientPaymentInvoicesController extends PaymentInvoicesController
{
    public function list_query(){
        return parent::list_query()->with('contractorContract', "contractorContract.contractor")->has("contractorContract.contractor");
    }
}
