<?php

namespace App\Http\Controllers\Api;

use App\Models\Consumer;
use App\Models\ConsumerSessionToken;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lcobucci\JWT\Token;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ConsumerSessionTokensController extends Controller
{
    /**
     * @var Token|string
     */
    private $token;

    /**
     * @var Token|string
     */
    private $refreshed_token;

    /**
     * @var Consumer
     */
    private $user;

    /**
     * @var JWTAuth
     */
    private $auth;

    /**
     * Максимальное время простоя (в минутах)
     * @var int
     */
    private $maximum_idle_time;

    /**
     * Максимальное время на получение нового токена из базы (в секундах)
     * @var int
     */
    private $maximum_receipt_time;

    /**
     * @var false|string
     */
    private $current_date;

    /**
     * ConsumerSessionTokensController constructor.
     * @param \Tymon\JWTAuth\JWTAuth $auth
     * @param string|null $token
     */
    public function __construct(\Tymon\JWTAuth\JWTAuth $auth, $token = null)
    {
        $this->auth = $auth;
        $this->maximum_idle_time = 60;
        $this->maximum_receipt_time = 60;
        $this->user = \Auth::user();
        $this->current_date = date("Y-m-d H:i:s");

        if(is_null($token))
            $this->token = \JWTAuth::getToken();
        else
            $this->token = $token;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Token|string
     * @throws \Exception
     */
    public function handle(Request $request)
    {
        $this->checkForToken($request);

        $consumer_session_token = ConsumerSessionToken::query()->where("token_current", $this->token)
            ->orWhere("token_old", $this->token)->first();

        if(!$consumer_session_token)
            throw new \Exception("Токен не найден");

        if($consumer_session_token->token_old == $this->token)
        {
            $date_diff = (strtotime($this->current_date) - strtotime($consumer_session_token->token_generation_time));

            if($date_diff <= $this->maximum_receipt_time)
            {
                try
                {
                    $payload = $this->auth->setToken($consumer_session_token->token_current)->getPayload();

                    \Auth::setUser(Consumer::query()->find($payload->get("sub")));

                    $this->updateSessionActivityTime($consumer_session_token);

                    return $consumer_session_token->token_current;
                }
                catch(\Exception $exception)
                {
                    throw new \Exception("Токен не действителен");
                }

            }
            else
            {
                throw new \Exception("Токен не действителен");
            }
        }

        try
        {
            $this->auth->parseToken()->authenticate();

            $this->updateSessionActivityTime($consumer_session_token);
        }
        catch(\Exception $exception)
        {
            if($exception instanceof TokenExpiredException)
            {
                try
                {
                    $date_diff = (strtotime($this->current_date) - strtotime($consumer_session_token->last_activity_time)) / 60;

                    if($date_diff <= $this->maximum_idle_time)
                    {
                        // Пытаемся обновить токен
                        $this->updateSession($consumer_session_token);

                        return $this->refreshed_token;
                    }
                    else
                    {
                        // Выдаем ошибку поскольку время простоя больше чем maximum_idle_time
                        throw new \Exception();
                    }


                }
                catch(\Exception $exception)
                {
                    throw new \Exception("Время сессии истекло");
                }
            }
        }

    }

    /**
     * @param ConsumerSessionToken|Model $consumer_session_token
     * @throws \Tymon\JWTAuth\Exceptions\JWTException
     */
    private function updateSession($consumer_session_token)
    {
        $this->refreshed_token = $this->auth->parseToken()->refresh();

        $this->user = JWTAuth::toUser();

        $consumer_session_token->token_old = $this->token;
        $consumer_session_token->token_current = $this->refreshed_token;
        $consumer_session_token->last_activity_time = $this->current_date;
        $consumer_session_token->token_generation_time = $this->current_date;

        $consumer_session_token->save();

    }

    /**
     * @param ConsumerSessionToken|Model $consumer_session_token
     */
    private function updateSessionActivityTime($consumer_session_token)
    {
        $consumer_session_token->last_activity_time = $this->current_date;

        $consumer_session_token->save();
    }


    /**
     * @param Request $request
     * @throws \Exception
     */
    private function checkForToken(Request $request)
    {
        if(!$this->auth->parser()->setRequest($request)->hasToken())
        {
            throw new \Exception("Токен не найден");
        }
    }

    public function handleLogin()
    {

        $this->addNewSession();
    }

    private function addNewSession()
    {
        $consumer_session_token = new ConsumerSessionToken();

        $consumer_session_token->token_current = $this->token;
        $consumer_session_token->last_activity_time = $this->current_date;

        $consumer_session_token->save();
    }
}
