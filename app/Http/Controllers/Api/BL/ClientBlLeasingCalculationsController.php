<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Classes\CheckController;
use App\Http\Middleware\CheckAccess;
use App\Models\BL\BlCustomerRequest;
use App\Models\BL\BlCustomerRequestTabLeasingObject;
use App\Models\BL\BlLeasingCalculation;
use App\Models\BL\BlScheduleArticle;
use App\Models\BL\BlScheduleTabArticle;
use App\Models\BL\BlSchedule;
use App\Models\BL\BlScheduleTabSchedule;
use App\Models\Contractor;
use App\Models\DbAreaFile;
use App\Models\FileType;
use App\Models\ModelTables;
use App\Models\StoredFile;
use function GuzzleHttp\Psr7\copy_to_string;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Stmt\ElseIf_;
use Symfony\Component\HttpFoundation\Tests\JsonSerializableObject;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

class ClientBlLeasingCalculationsController extends BlLeasingCalculationsController
{
    public function listAdditionalQuery($builder){
        $builder->with('blCustomerRequest','blCustomerRequest.lesseeContractor')->has('blCustomerRequest.lesseeContractor');
    }

    public function card_query($leasingCalculationId, $customerRequestArrayId){
        return parent::card_query($leasingCalculationId, $customerRequestArrayId)->with('blCustomerRequest','blCustomerRequest.lesseeContractor')->has('blCustomerRequest.lesseeContractor');
    }

}
