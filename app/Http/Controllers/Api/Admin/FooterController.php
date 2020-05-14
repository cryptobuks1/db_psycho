<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FooterController extends Controller
{
    public function index(Request $request)
    {
        //Footer 13.09.18 Alex Yaroshchuk
        if (config('app.VueBlade')) {
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->select('caption_name', 'caption_translation')
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


            $footer = [
                'menu' =>[
                    [
                        'caption' => $texts->where('caption_name', "Blog")->first()->caption_translation,
                        'url' => '/blog'
                    ],
                    [
                        'caption' => $texts->where('caption_name', "Support")->first()->caption_translation,
                        'url' => '/support'
                    ],
                    [
                        'caption' => $texts->where('caption_name', "TermsAndConditions")->first()->caption_translation,
                        'url' => '/terms'
                    ],
                    [
                        'caption' => $texts->where('caption_name', "Privacy")->first()->caption_translation,
                        'url' => '/privacy'
                    ]
                ],
                'copyright'=> [
                    'caption' => 'DIGITAL AGENCY 2018 | LardanSoft'
                ]
            ];
            return response()->json([
                'texts' => $texts,
                'footer' => $footer,
            ]);
        }
    }
}
