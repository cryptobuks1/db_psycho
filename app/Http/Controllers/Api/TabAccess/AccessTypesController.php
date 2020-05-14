<?php

namespace App\Http\Controllers\Api\TabAccess;

use App\Models\AccessType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccessTypesController extends Controller
{
    public function index(){
        if(config('app.VueBlade')) {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();

            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $access = AccessType::all();
            return response()->json([
                'texts' => $texts,
                'consumer' => $consumer,
                'access' => $access,
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
            $access = AccessType::all();
            return view('/auth.admin.page.typeAccess',
                compact('consumer','texts', 'access'
                ));
        }
    }

    public function show()
    {
        if (config('app.VueBlade')) {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

            $access = AccessType::all();
            return response()->json([
                'texts' => $texts,
                'consumer' => $consumer,
                'access' => $access,
            ]);
        } else {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();

            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

            $access = AccessType::all();
            return view('/auth.admin.page.typeAccessShow',
                compact('consumer', 'texts', 'access'
                ));
        }
    }
    public function update(Request $request){
        if(config('app.VueBlade')) {
            return AccessType::where('id', $request->id)->update(
                [
                    'access_type_name' => $request->NameAdd,
                    'access_type_code' => $request->CodeAdd,
                ]
            );
        }
        else{
            AccessType::where('id', $request->ConsumerId)->update([
                'access_type_name' => $request->NameAdd,
                'access_type_code' => $request->CodeAdd,
            ]
        );
        return back()->with('alert', trans('messages.saved'));
        }
    }

    public function insert(Request $request){
        if(config('app.VueBlade')) {
            return AccessType::create([
                'access_type_name' => $request->access_type_name,
                'access_type_code' => $request->access_type_code
            ]);
        }
        else{
            AccessType::create([
            'access_type_name' => $request->NameAdd,
            'access_type_code' => $request->CodeAdd
        ]);
      return back()->with('alert', trans('messages.createAccessType'));
        }
    }

    /*public function delete(Request $request){
        if(config('app.VueBlade')) {
            $delMsg = AccessType::where('id', $request->id)->get()->first();
            return $delMsg->delete();
        }
        else{
            $delMsg = AccessType::where('id',$request['accContractorDeleteId'])->get()->first();
            $delMsg->delete();
            return back()->with('alert',trans('messages.remotely'));
        }
    }*/
}
