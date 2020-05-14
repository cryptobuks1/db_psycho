<?php

namespace App\Http\Controllers\Api\TabSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Classes\ConsumerParameters;
use App\Models\ChangeRequest;

class DbTypeControllersController extends Controller
{
    public function getSettingControllers(Request $request){
        $models = \App\Models\Controller::with('models')
            ->where('id',4)
            ->get()->toArray();

        $controllerField = \App\Models\DbTypeController::with('controllerField.dataType')
//           ->where('id',4)
            ->get()->toArray();

        $DataRequest = new ChangeRequest();
//       $DataRequest->created_by = (new ConsumerParameters())->consumerCode();
        $DataRequest->save();

        return 'request create';
    }
}
