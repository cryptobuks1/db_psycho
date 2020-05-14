<?php


namespace App\Http\Classes\Facades;


use Illuminate\Support\Facades\Facade;

class DateManagerFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "DateManager";
    }

}