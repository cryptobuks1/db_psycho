<?php

namespace Tests\Unit;

use App\Http\Middleware\SetLang;
use App\Models\Consumer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class SetLangMiddlewareTest
 * @coversDefaultClass \App\Http\Middleware\SetLang
 * @package Tests\Unit
 */
class SetLangMiddlewareTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @covers ::handle
     */
    public function testMiddlewareWithLangHeader()
    {
        $this->actingAs(Consumer::query()->where("consumer_code", "RblUser")->first());

        $request = new Request();

        $lang = "en";

        $current_lang = null;

        $request->headers->set("lang", $lang);

        $middleware = new SetLang();

        $middleware->handle($request, function($req) use(&$current_lang)
        {
            $current_lang = App::getLocale();
        });

        $this->assertEquals($lang, $current_lang, "SetLang middleware не изменил язык");
    }


    public function testMiddlewareWithoutLangHeader()
    {
        $this->actingAs(Consumer::query()->where("consumer_code", "RblUser")->first());

        $request = new Request();

        $default_lang = "ru";

        $current_lang = null;

        $middleware = new SetLang();

        $middleware->handle($request, function($req) use(&$current_lang)
        {
            $current_lang = App::getLocale();
        });

        $this->assertEquals($default_lang, $current_lang, "SetLang middleware не установил язык по умолчанию");
    }
}
