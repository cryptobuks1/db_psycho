<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\ConsumerSessionTokensController;
use Closure;
use Lcobucci\JWT\Token;
use mysql_xdevapi\Exception;
use Tymon\JWTAuth\JWTAuth;

class Authenticate
{
    /**
     * The JWT Authenticator.
     *
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $auth;

    /**
     * Create a new BaseMiddleware instance.
     *
     * @param  \Tymon\JWTAuth\JWTAuth  $auth
     *
     * @return void
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try
        {
           $session_tokens_controller = new ConsumerSessionTokensController($this->auth);

            $token = $session_tokens_controller->handle($request);

//            return response()->json([
//                "message" => $token
//            ]);

            $response = $next($request);

            // Если вернулся токен
            if(gettype($token) === "string" || $token instanceof Token)
                $response->headers->set('Authorization', 'Bearer '.$token);

            return $response;
        }
        catch(\Exception $exception)
        {
            return response()->json([
                "message" => $exception->getMessage()
            ], 401);
        }
    }
}
