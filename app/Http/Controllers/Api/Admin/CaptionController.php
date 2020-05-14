<?php



/*
 * 18.10.2018
 * Yuriy Yurenko
 * 
 *  controller named NOT the plural CaptionsController 
 * it will be only or blade
 * i create new controller CaptionsController  */
namespace App\Http\Controllers\Api\Admin;
use App\Models\Caption;
use App\Models\TranslationCaption;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Api\Controller;
use App\Models\ServerDb;
use App\Texts;
use App\Models\Language;
use App\Translation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CaptionController extends Controller
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
            $captAll = DB::table('__Captions')
                ->select('id', 'caption_name', 'caption_rem')
                ->get();
            $capt = DB::table('__Captions')
                ->join('_TranslationCaptions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
                ->join('languages', 'languages.id', '=', '_TranslationCaptions.language_id')
                ->select('__Captions.caption_name', '__Captions.caption_rem', '_TranslationCaptions.*', 'languages.language_name')
                ->get();
            return response()->json([
                'consumer' => $consumer,
                'texts' => $texts,
                'lang' => $lang,
                'capt' => $capt,
                'captAll' => $captAll,
            ]);
        } else {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $lang = Language::all();
            $captAll = DB::table('__Captions')
                ->select('id', 'caption_name', 'caption_rem')
                ->get();
            $capt = DB::table('__Captions')
                ->join('_TranslationCaptions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
                ->join('languages', 'languages.id', '=', '_TranslationCaptions.language_id')
                ->select('__Captions.caption_name', '__Captions.caption_rem', '_TranslationCaptions.*', 'languages.language_name')
                ->get();
            return view('auth.admin.page.caption',
                compact('consumer', 'texts', 'lang', 'capt', 'captAll'));
        }
    }

    public function captionModalAjax(Request $request)
    {
        $caption = DB::table('__Captions')
            ->join('_TranslationCaptions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->join('languages', 'languages.id', '=', '_TranslationCaptions.language_id')
            ->select('__Captions.caption_name', '__Captions.caption_rem', '_TranslationCaptions.*', 'languages.language_name')
            ->where('_TranslationCaptions.language_id', $request->id)
            ->get();
        return response()->json($caption);
    }

    public function update(Request $request)
    {
        if (config('app.VueBlade')) {
            return TranslationCaption::where('id', $request->id)->update([
                'caption_translation' => $request->caption_translation,
            ]);
        } else {
            TranslationCaption::where('id', $request->idCapt)->update([
                'caption_translation' => $request->CaptTranslate,
            ]);
            return back()->with('alert', trans('messages.saved'));
        }

    }

    public function insert(Request $request)
    {
        if (config('app.VueBlade')) {
            $caption3 = TranslationCaption::where('caption_id', $request->caption_id)->where('language_id', $request->language_id)->first();
            if (count($caption3)) {
                return back()->with('alert', trans('ERROR - TRANSLATE ALREADY EXIST'));
            }

            if (Caption::where('id', $request->id)->count()) {
                //$caption1 = Caption::where('caption_name',  '=', $request->CaptNameAdd) ->select('id')->get();
                return TranslationCaption::create([
                    'caption_id' => $request->caption_id,
                    'caption_translation' => $request->caption_translation,
                    'language_id' => $request->language_id,
                ]);
            }
        } else {
            $caption3 = TranslationCaption::where('caption_id', $request->CaptNameAdd)->where('language_id', '=', $request->LangAdd)->first();
            if (count($caption3)) {
                return back()->with('alert', trans('ERROR - TRANSLATE ALREADY EXIST'));
            }

            if (Caption::where('id', $request->CaptNameAdd)->count()) {
                return TranslationCaption::create([
                    'caption_id' => $request->CaptNameAdd,
                    'caption_translation' => $request->CaptTranslateAdd,
                    'language_id' => $request->LangAdd,
                ]);
            }
        }

    }


    public function deleteOne(Request $request)
    {
        if (config('app.VueBlade')) {
            $delMsg = TranslationCaption::where('id', $request->id);
            if ($delMsg) {
                return $delMsg->delete();
            }
            return back()->with('alert', trans('messages.remotely'));
        } else {
            $delMsg = TranslationCaption::where('id', $request['CaptDelOne']);
            if ($delMsg) {
                $delMsg->delete();
            }
            return back()->with('alert', trans('messages.remotely'));
        }
    }

}
