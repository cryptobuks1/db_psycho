<?php

namespace App\Http\Controllers\Api\BankNet;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class FooterNetBanksController extends Controller
{
    public function index(Request $request)
    {
        $captionName = ['Contacts', 'Sitemap'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        return response()->json([
                'menu' => [
                    [
                        'title' => $getArrayCaptions['Contacts']['translation_captions']['caption_translation'],
                        'link' => '/contacts'
                    ],
        
                    [
                        'title' => $getArrayCaptions['Sitemap']['translation_captions']['caption_translation'],
                        'link' => '/sitemap.xml',
                        'external' => true
                    ]
                ],
                'copyright' => [
                    'caption' => 'DIGITAL AGENCY 2020'
                ]
            ]);
    }

}
