<?php

namespace App\Http\Controllers\Api\TabAccess;

use App\Models\Contractor;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\AccessEntity;
use Illuminate\Support\Facades\Auth;

class ControllersController extends Controller
{
    public function show(Request $request)
    {
        return AccessEntity::get()->toarray();
    }

    public function insert(Request $request)
    {

        if (config('app.VueBlade')) {
            return Contractor::create([
                'controller_code' => $request->controller_code,
                'controller_name' => $request->controller_name,
                'controller_type_id' => $request->controller_type_id,
//                'created_by' => 'кукурууку' //Auth::user()->consumer_name, //commit Albert Topalu 30.11.18
                'created_by' => Auth::user()->consumer_name, //insert Albert Topalu 30.11.18
            ]);
        } else {
            Contractor::create([
                'controller_code' => $request->controller_code,
                'controller_name' => $request->controller_name,
                'controller_type_id' => $request->controller_type_id,
                'created_by' =>Auth::user()->consumer_name,
            ]);

        }
    }

    public function update(Request $request)
    {

        return Contractor::where('id', $request->id)->update([
            'controller_code' => $request->controller_code,
            'controller_name' => $request->controller_name,
            'controller_type_id' => $request->controller_type_id,
            'updated_by' => Auth::user()->consumer_name,
        ]);
    }

    /*public function delete(Request $request)
    {

        return Contractor::where('id', $request->id)->delete();

    }*/
}
