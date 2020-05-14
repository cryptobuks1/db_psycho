<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Models\Caption;
use App\Models\FeRoute;
use App\Models\Help;
use App\Models\MenuItem;
use App\Models\Partner;
use App\Models\UserInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class CalculationParameterTypesController extends Controller
{
    public function list(Request $request){}

    public function card(Request $request){}
}
