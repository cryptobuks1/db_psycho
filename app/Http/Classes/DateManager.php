<?php


namespace App\Http\Classes;


use Carbon\Carbon;

class DateManager
{
    public function now()
    {
        return Carbon::now()->toDateTimeString();
    }
}