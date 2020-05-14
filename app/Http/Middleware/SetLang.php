<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;


class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Illuminate\Support\Facades\Session::has("lang")) {
            $lang = \Illuminate\Support\Facades\Session::get("lang");
        } elseif($request->hasHeader("lang")) {
            // check browser lang - https://learninglaravel.net/detect-and-change-language-on-the-fly-with-laravel
//            $lang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            $lang = $request->header('lang');

//            if ($lang != 'ru' && $lang != 'ru') {
//                $lang = 'ru';
//            }
        }
        else
            $lang = "ru";

        App::setLocale($lang);

        return  $next($request);
    }
}
