<?php

namespace App\Http\Controllers\Api\Admin;
use Input;
use App\Http\Controllers\Api\Controller;
use App\Models\ServerDb;
use App\Texts;
use App\Models\Caption;
use App\Models\Language;
use App\Translation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DirectoryCaptionController extends Controller
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

            $captAll = DB::table('__Captions')
                ->select('id', 'caption_name', 'caption_rem')
                ->get();
            return response()->json([
                'consumer' => $consumer,
                'texts' => $texts,
                'captAll' => $captAll
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

            $captAll= DB::table('__Captions')
                ->select('id', 'caption_name', 'caption_rem')
                ->get();
            return view('auth.admin.page.directory-caption',
                compact('consumer','texts','captAll'));
        }
    }

    public function update(Request $request){
        if (config('app.VueBlade')) {
            return Caption::where('id', $request->id)->update([
                'caption_rem' => $request->caption_rem,
            ]);
        }
        else{
            Caption::where('id', $request->idCapt)->update([
                'caption_rem' => $request->CaptRem,
            ]);
            return back()->with('alert', trans('messages.saved'));
        }
    }

    public function insert(Request $request){
        if (config('app.VueBlade')) {
            if (Caption::where('caption_name', '=', $request->caption_name)->count() > 0) {
                return back()->with('alert', trans('messages.thisCodeAlredyExist'));
            }
            if (Caption::where('caption_name', '=', $request->caption_name)->count() == 0) {
                return Caption::create([
                    'caption_name' => $request->caption_name,
                    'caption_rem' => $request->caption_rem,
                ]);
            }
        }
        else{
            if(Caption::where('caption_name', '=', $request->CaptNameAdd)->count() > 0)
            {
                return back()->with('alert', trans('messages.thisCodeAlredyExist'));
            }
            if(Caption::where('caption_name', '=', $request->CaptNameAdd)->count() == 0)
            {
                Caption::create([
                    'caption_name' => $request->CaptNameAdd,
                    'caption_rem' => $request->CaptRemAdd,
                ]);
            }
        }
    }

     ////////////////////////////////////for blade////////////////////////////////////
    //  public function index()
    //    {
    //        $consumer = Auth::user();
    //        $texts = DB::table('_TranslationCaptions')
    //            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
    //            ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
    //            ->where('languages.language_code', config('app.locale'))
    //            ->get();
    //        $captAll= DB::table('_captions')
    //                ->select('id', 'caption_name', 'caption_rem')
    //                ->get();
    //       return view('auth.admin.page.directory-caption',
    //            compact('consumer','texts','captAll'));
    //    }
    //
    //    public function update(Request $request){
    //        Captions::where('id', $request->idCapt)->update([
    //            'caption_rem' => $request->CaptRem,
    //        ]);
    //        return back()->with('alert', trans('messages.saved'));
    //    }
    //
    //    public function insert(Request $request){
    //        if(Captions::where('caption_name', '=', $request->CaptNameAdd)->count() > 0)
    //        {
    //            return back()->with('alert', trans('messages.thisCodeAlredyExist'));
    //        }
    //        if(Captions::where('caption_name', '=', $request->CaptNameAdd)->count() == 0)
    //        {
    //            Captions::create([
    //                'caption_name' => $request->CaptNameAdd,
    //                'caption_rem' => $request->CaptRemAdd,
    //            ]);
    //        }
    //    }
    //
    //    public function delete(Request $request){
    //        $delMsg = Captions::where('id', $request['CaptIdDel'])->get()->first();
    //        $delMsg->delete();
    //        return back()->with('alert',trans('messages.remotely'));
    //    }
}
