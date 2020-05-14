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
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InfoKindsController extends Controller
{
    public function index()
    {
        if (config('app.VueBlade')) {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


            $infokind = InfoKind::all();
            $infotype = InfoType::all();
            return response()->json([
                'consumer' => $consumer,
                'texts' => $texts,
                'infokind' => $infokind,
                'infotype' => $infotype,
            ]);
        }
        else{
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


            $infokind = InfoKind::all();
            $infotype = InfoType::all();
            return view('auth.admin.page.infokind',
                compact('consumer','texts','infokind', 'infotype'));
        }
    }

    public function update(Request $request){
        if (config('app.VueBlade')) {
            return InfoKind::where('id', $request->id)->update([
                'info_type_id' => $request->info_type_id,
                'info_kind_code' => $request->info_kind_code,
                'info_kind_name' => $request->info_kind_name,
                'suser_name' => $request->suser_name
            ]);
        }
        else{
            InfoKind::where('id', $request->KindID)->update([
            'info_type_id' => $request->infoTName,
            'info_kind_code' => $request->infoKCode,
            'info_kind_name' => $request->infoKName,
            'suser_name' => $request->KindSuserName
        ]);
        return back()->with('alert', trans('messages.saved'));
        }
    }

    public function insert(Request $request){
        if (config('app.VueBlade')) {
            return InfoKind::create([
                'info_type_id' => $request->info_type_id,
                'info_kind_code' => $request->info_kind_code,
                'info_kind_name' => $request->info_kind_name,
                'suser_name' => $request->suser_name
            ]);
        }
        else{
            InfoKind::create([
            'info_type_id' => $request->AddInfoTName,
            'info_kind_code' => $request->AddInfoKCode,
            'info_kind_name' => $request->AddInfoKName,
            'suser_name' => $request->AddKindSuserName
        ]);

        return back()->with('alert', trans('messages.createKind'));
        }
    }
    public function delete(Request $request){
        if (config('app.VueBlade')) {
            $delMsg = InfoKind::where('id', $request->id)->get()->first();
            return $delMsg->delete();
        }
        else{
            $delMsg = InfoKind::where('id', $request['KindDeleteId'])->get()->first();
            $delMsg->delete();
            return back()->with('alert',trans('messages.remotely'));
        }
    }

    ////////////////////////////for blade//////////////////////////////////////
//    public function index()
//    {
//        $consumer = Auth::user();
//        $texts = DB::table('_TranslationCaptions')
//            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//            ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
//            ->where('languages.language_code', config('app.locale'))
//            ->get();
//
//        $infokind = InfoKind::all();
//        $infotype = InfoType::all();
//        return view('auth.admin.page.infokind',
//            compact('consumer','texts','infokind', 'infotype'));
//    }
//
//    public function update(Request $request){
//        InfoKind::where('id', $request->KindID)->update([
//            'info_type_id' => $request->infoTName,
//            'info_kind_code' => $request->infoKCode,
//            'info_kind_name' => $request->infoKName,
//            'suser_name' => $request->KindSuserName
//        ]);
//        return back()->with('alert', trans('messages.saved'));
//    }
//
//    public function insert(Request $request){
//
//        InfoKind::create([
//            'info_type_id' => $request->AddInfoTName,
//            'info_kind_code' => $request->AddInfoKCode,
//            'info_kind_name' => $request->AddInfoKName,
//            'suser_name' => $request->AddKindSuserName
//        ]);
//
//        return back()->with('alert', trans('messages.createKind'));
//    }
//
//    public function delete(Request $request){
//        $delMsg = InfoKind::where('id', $request['KindDeleteId'])->get()->first();
//        $delMsg->delete();
//        return back()->with('alert',trans('messages.remotely'));
//    }
}
