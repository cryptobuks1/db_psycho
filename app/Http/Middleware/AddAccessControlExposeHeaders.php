<?php

namespace App\Http\Middleware;

use Closure;

class AddAccessControlExposeHeaders
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
        $response = $next($request);

        $response->header("Access-Control-Expose-Headers", "Authorization");

        return $response;
    }
}
