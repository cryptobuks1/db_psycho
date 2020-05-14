<?php

namespace App\Http\Controllers\Api\Admin;
use App\Http\Controllers\Api\Controller;
use App\Models\ServerDb;
use App\Texts;
use App\Models\Language;
use App\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TanslationController extends Controller
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
            $lang = Language::all();

            $translate = DB::table('_TranslationCaptions')
                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
                ->select('languages.language_name', '_TranslationCaptions.*')
                ->get();

            return response()->json([
                'consumer' => $consumer,
                'texts' => $texts,
                'lang' => $lang,
                'translate' => $translate
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

            $lang = Language::all();
            $translate = DB::table('_TranslationCaptions')
                ->join('languages', '_TranslationCaptions.language_id','=','languages.id')
                ->select('languages.language_name', '_TranslationCaptions.*')
                ->get();
            return view('auth.admin.page.translation',
                compact('consumer','texts', 'lang', 'translate'));
        }
    }

    public function update(Request $request){
        if (config('app.VueBlade')) {
            return Translation::where('id', $request->id)->update([
                'caption_translation' => $request->caption_translation,
            ]);
        }
        else{
            Translation::where('id', $request->idLang)->update([
                'caption_translation' => $request->CaptionTranslate,
            ]);
          return back()->with('alert', trans('messages.saved'));
        }
    }

    public function insert(Request $request)
    {
        if (config('app.VueBlade')) {
            return Translation::create([
                'language_id' => $request->language_id,
                'caption_code' => $request->caption_code,
                'caption_translation' => $request->caption_translation,
            ]);
        }
        else{
            Translation::create([
                'language_id' => $request->langNameAdd,
                'caption_code' => $request->CaptionCodeAdd,
                'caption_translation' => $request->CaptionTranslateAdd,
            ]);
           return back()->with('alert', trans('messages.createLanguage'));
        }
    }

    /*public function delete(Request $request){
        if (config('app.VueBlade')) {
            $delMsg = Translation::where('id', $request->id)->get()->first();
            return $delMsg->delete();
        }
        else{
            $delMsg = Translation::where('id', $request['TrIddelete'])->get()->first();
            $delMsg->delete();
            return back()->with('alert',trans('messages.remotely'));
        }
    }*/
    ////////////////////for blade/////////////////////////////
    //     public function index()
    //    {
    //        $consumer = Auth::user();
    //        $texts = DB::table('_TranslationCaptions')
    //            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
    //            ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
    //            ->where('languages.language_code', config('app.locale'))
    //            ->get();
    //        $lang = Languages::all();
    //        $translate = DB::table('_TranslationCaptions')
    //                ->join('languages', '_TranslationCaptions.language_id','=','languages.id')
    //                ->select('languages.language_name', '_TranslationCaptions.*')
    //                ->get();
    //        return view('auth.admin.page.translation',
    //            compact('consumer','texts', 'lang', 'translate'));
    //    }
    //
    //    public function update(Request $request){
    //       Translation::where('id', $request->idLang)->update([
    //            'caption_translation' => $request->CaptionTranslate,
    //        ]);
    //      return back()->with('alert', trans('messages.saved'));
    //    }
    //
    //    public function insert(Request $request){
    //        Translation::create([
    //            'language_id' => $request->langNameAdd,
    //            'caption_code' => $request->CaptionCodeAdd,
    //            'caption_translation' => $request->CaptionTranslateAdd,
    //        ]);
    //       return back()->with('alert', trans('messages.createLanguage'));
    //    }
    //
    //    public function delete(Request $request){
    //        $delMsg = Translation::where('id', $request['TrIddelete'])->get()->first();
    //        $delMsg->delete();
    //        return back()->with('alert',trans('messages.remotely'));
    //    }
}
