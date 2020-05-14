<?php


namespace App\Http\Classes\Facades;


use Illuminate\Support\Facades\Facade;

class OneCFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "oneC";
    }

}