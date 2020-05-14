<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();

        if($user->consumer_is_system_n == 1)
        {
            $response = $next($request);

            //            $payload = JWTAuth::getPayload();
            //
            //            JWTAuth::blacklist()->addForever($payload);
            //
            //            $payload->getInternal("exp")->setValue(time() + 60);
            //
            //            $new_token = \Tymon\JWTAuth\Facades\JWTAuth::encode($payload);
            //

//            JWTAuth::invalidate(true);

//            $new_token = JWTAuth::fromUser(\Auth::user());

//            JWTAuth::getPayload()->getClaims()->

//            $response->header("token", $new_token);

            return $response;
        }

        return response()->json([
            "error"   => true,
            "message" => "You do not have access"
        ], 400);
    }
}
