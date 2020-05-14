<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class NameController extends Controller
{
    public function nameControllerMethod (Request $request){

//        $nameCurrentMethod = $request->route()->getActionMethod();
//        $nameCurrentController = class_basename(Route::current()->controller);

        return [

//            'method' =>  $request->route()->getActionMethod(),
//            'controller' =>   class_basename(Route::current()->controller),
            Request::route()->controller

        ];


    }
}
