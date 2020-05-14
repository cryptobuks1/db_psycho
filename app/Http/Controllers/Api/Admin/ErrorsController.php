<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class ErrorsController extends Controller
{
    public function buildError()
    {
        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

        $errors = [
            '500' => $this->texts->where('caption_name', "Error500Unexpected")->first()->caption_translation,
            '403' => $this->texts->where('caption_name', "Error403Forbidden")->first()->caption_translation,
            '404' => $this->texts->where('caption_name', "Error404PageNotFound")->first()->caption_translation,
            'PageDoesnExist' => $this->texts->where('caption_name', "ErrorPageDoesnExist")->first()->caption_translation,
            'GoHeadOver' => $this->texts->where('caption_name', "ErrorGoHeadOver")->first()->caption_translation,
            'or' => $this->texts->where('caption_name', "or")->first()->caption_translation,
            'ContactUs' => $this->texts->where('caption_name', "ErrorContactUs")->first()->caption_translation,
        ];

        return $errors;
    }
}
