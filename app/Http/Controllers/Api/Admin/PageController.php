<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home(Request $request) {
        if (config('app.VueBlade')) {
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

            $consumer = Auth::user();
            return response()->json([
                'consumer' => $consumer,
                'texts' => $texts,
            ]);
        }
        else{
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

            $consumer = Auth::user();
           return view('auth.admin.home', compact('consumer','texts'));
        }
    }

    ////////////////////////for blade//////////////////////
    //    public function home(Request $request) {
    //        $texts = DB::table('_TranslationCaptions')
    //            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
    //            ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
    //            ->where('languages.language_code', config('app.locale'))
    //            ->get();
    //        $consumer = Auth::user();
    //       return view('auth.admin.home', compact('consumer','texts'));
    //    }

    public function index(Request $request){
        if (config('app.VueBlade')) {
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->select('caption_name', 'caption_translation')
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


            $footer = [
              [
                  'Blog'=> $texts->where('caption_name', "Blog")->first()->caption_translation
              ],
              [
                  'Support'=> $texts->where('caption_name', "Support")->first()->caption_translation
              ],
              [
                  'TermsAndConditions'=> $texts->where('caption_name', "TermsAndConditions")->first()->caption_translation
              ],
              [
                  'Privacy'=> $texts->where('caption_name', "Privacy")->first()->caption_translation
              ]
            ];

            return response()->json([
                'texts' => $texts,
                'text' => $footer,
            ]);


        }
    } //10.09.18 Переводы
}
