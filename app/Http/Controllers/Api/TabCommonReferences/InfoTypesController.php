<?php

namespace App\Http\Controllers\Api\TabCommonReferences;

use App\Models\Caption;
use App\Models\Consumer;
use App\Models\InfoKind;
use App\Models\InfoType;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Contractor;
use App\Http\Controllers\Api\Controller;
use App\Texts;
use App\Models\Language;
use App\ConsumerInfo;
use App\Models\DbArea;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InfoTypesController extends Controller
{
    public function update(Request $request){
        if (config('app.VueBlade')) {
            return InfoType::where('id', $request->id)->update([
                'info_type_name' => $request->info_type_name,
                'uid_1c_code' => $request->uid_1c_code,
                'info_type_code' => $request->info_type_code,
//                'suser_name' => $request->suser_name
            ]);
        }
        else {
            InfoType::create([
            'info_type_name' => $request->AddInfoTypeName,
            'uid_1c_code' => $request->AddUid1cCode,
            'info_type_code' => $request->AddInfoTypeCode,
//            'suser_name' => $request->AddTypeSuserName
        ]);
        return back()->with('alert', trans('messages.createType'));
        }
    }
    public function insert(Request $request){
        if (config('app.VueBlade')) {
            return InfoType::create([
                'info_type_name' => $request->info_type_name,
                'uid_1c_code' => $request->uid_1c_code,
                'info_type_code' => $request->info_type_code,
//                'suser_name' => $request->suser_name
            ]);
        }
        else{
            InfoType::create([
            'info_type_name' => $request->AddInfoTypeName,
            'uid_1c_code' => $request->AddUid1cCode,
            'info_type_code' => $request->AddInfoTypeCode,
//            'suser_name' => $request->AddTypeSuserName
        ]);

       return back()->with('alert', trans('messages.createType'));
        }
    }
    public function delete(Request $request){
        if (config('app.VueBlade')) {
            $delMsg = InfoType::where('id', $request->id)->get()->first();
            return $delMsg->delete();
        }
        else{
            $delMsg = InfoType::where('id',$request['TypeDeleteId'])->get()->first();
            $delMsg->delete();
            return back()->with('alert',trans('messages.remotely'));
        }
    }
    ///////////////////////////////for blade////////////////////////////////////////
//    public function update(Request $request){
//        InfoType::where('id',$request->InfoTypeID)->update([
//            'info_type_name' => $request->InfoTypeName,
//            'uid_1c_code' => $request->TypeUid1cCode,
//            'info_type_code' => $request->InfoTypeCode,
//            'suser_name' => $request->TypeSuserName
//        ]);
//
//        return back()->with('alert', trans('messages.saved'));
//    }
//
//    public function insert(Request $request){
//        InfoType::create([
//            'info_type_name' => $request->AddInfoTypeName,
//            'uid_1c_code' => $request->AddUid1cCode,
//            'info_type_code' => $request->AddInfoTypeCode,
//            'suser_name' => $request->AddTypeSuserName
//        ]);
//
//       return back()->with('alert', trans('messages.createType'));
//    }
//
//    public function delete(Request $request){
//        $delMsg = InfoType::where('id',$request['TypeDeleteId'])->get()->first();
//        $delMsg->delete();
//       return back()->with('alert',trans('messages.remotely'));
//    }
}
