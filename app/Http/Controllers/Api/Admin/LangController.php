<?php

namespace App\Http\Controllers\Api\Admin;
use App\Http\Controllers\Api\Controller;
use App\Models\ServerDb;
use App\Texts;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class LangController extends Controller
{
    public function index()
    {
        if (config('app.VueBlade')) {
            $consumer = Auth::user();
            $texts = DB::table('translation_captions')
                ->join('_Languages', 'translation_captions.language_id', '=', '_Languages.id')
                ->join('_captions', 'translation_captions.caption_id', '=', '_captions.id')
                ->where('_Languages.language_code', config('app.locale'))
                ->get();
            $lang = Language::all();
            $lang_loc = Config::get('app.locale');
            return response()->json([
                'lang' => $lang,
                'consumer' => $consumer,
                'texts' => $texts,
                'lang_loc' =>$lang_loc,
            ]);
        }
        else{
            $consumer = Auth::user();
            $texts = DB::table('translation_captions')
                ->join('_Languages', 'translation_captions.language_id', '=', '_Languages.id')
                ->join('_captions', 'translation_captions.caption_id','=','_captions.id')
                ->where('_Languages.language_code', config('app.locale'))
                ->get();
            $lang = Language::all();

            $lang_loc = Config::get('app.locale');

            return view('auth.admin.page.view-lang',
                compact('consumer','texts', 'lang'));
        }
    }

    public function update(Request $request){
        if (config('app.VueBlade')) {
            return Language::where('id', $request->id)->update([
                'language_code' => $request->language_code,
                'language_name' => $request->language_name,
                'language_name_ru' => $request->language_name_ru,
                'language_view' => $request->language_view,
            ]);
        }
        else{
            Language::where('id', $request->idLang)->update([
                'language_code' => $request->langCode,
                'language_name' => $request->LangName,
                'language_name_ru' => $request->LangNameRu,
                'language_view' => $request->LangView,
            ]);
            return back()->with('alert', trans('messages.saved'));
        }
    }
    public function insert(Request $request){
        if (config('app.VueBlade')) {
            return Language::create([
                'language_code' => $request->language_code,
                'language_name' => $request->language_name,
                'language_name_ru' => $request->language_name_ru,
                'language_view' => $request->language_view,
            ]);
        }
        else{
            Language::create([
                'language_code' => $request->langCodeAdd,
                'language_name' => $request->LangNameAdd,
                'language_name_ru' => $request->LangNameRuAdd,
                'language_view' => $request->LangViewAdd,
            ]);
           return back()->with('alert', trans('messages.createLanguage'));
        }
    }

    /////////////////////////for  blade/////////////////////////
    //    public function index()
    //    {
    //        $consumer = Auth::user();
    //        $texts = DB::table('translation_captions')
    //            ->join('languages', 'translation_captions.language_id', '=', 'languages.id')
    //            ->join('_captions', 'translation_captions.caption_id','=','_captions.id')
    //            ->where('languages.language_code', config('app.locale'))
    //            ->get();
    //        $lang = Languages::all();
    //        return view('auth.admin.page.view-lang',
    //           compact('consumer','texts', 'lang'));
    //    }
    //    public function update(Request $request){
    //     Languages::where('id', $request->idLang)->update([
    //            'language_code' => $request->langCode,
    //            'language_name' => $request->LangName,
    //            'language_name_ru' => $request->LangNameRu,
    //            'language_view' => $request->LangView,
    //        ]);
    //        return back()->with('alert', trans('messages.saved'));
    //    }
    //    public function insert(Request $request){
    //       Languages::create([
    //            'language_code' => $request->langCodeAdd,
    //            'language_name' => $request->LangNameAdd,
    //            'language_name_ru' => $request->LangNameRuAdd,
    //            'language_view' => $request->LangViewAdd,
    //        ]);
    //       return back()->with('alert', trans('messages.createLanguage'));
    //    }
    //    public function delete(Request $request){
    //        $delMsg = Languages::where('id', $request->langIddelete)->get()->first();
    //        $delMsg->delete();
    //        return back()->with('alert',trans('messages.remotely'));
    //    }
}
