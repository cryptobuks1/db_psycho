<?php

/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 6/5/19
 * Time: 4:48 PM
 */
namespace App\Http\Traits;


use Illuminate\Support\Facades\Auth;

trait ConsumerCheck
{
    public function isAdmin()
    {
        $user = Auth::user();

        // If user is null, then we assume that this function is called by a seeder
        // so in this case we're returning true
        if(!$user)
            return true;

        return $user->consumer_is_system_n == 1;
    }
}