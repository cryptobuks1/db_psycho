<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Admin\PageController;
use App\Models\AccessRole;
use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\Consumer;
use App\Models\ConsumerAccessRole;
use App\Report;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;
use JWTFactory;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    private $auth;

    public function __construct(\Tymon\JWTAuth\JWTAuth $auth)
    {
        $this->middleware('auth:api', [
            'except' => ['login']
        ]);

        $this->auth = $auth;

    }

    private function sendResponse(array $response, int $statusCode = 200)
    {
        return response()->json($response, $statusCode);
    }

    public function login(Request $request)
    {
        // Captcha verification, uncomment when needed
        //        if(!$this->checkRecaptcha($request->reCaptchaToken, $request->ip()))
        //        {
        //            return response()->json([
        //                'msg'    => 'Captcha is invalid',
        //                'status' => 'error'
        //            ], 400);
        //        }
        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $consumer = Consumer::query()
            ->where("consumer_login", $request->consumer_login)
            ->get()->first();


        $action_type = ActionType::query()
            ->where("action_type_code", "singIn")
            ->select("id")
            ->get()->first();

        $auth_value = $request->consumer_login;

        if(filter_var($auth_value, FILTER_VALIDATE_EMAIL))
        {
            $log_in_type = "почтой";
            $credentials = [
                "email"    => $auth_value,
                "password" => $request->password
            ];

        }
        else
        {
            $log_in_type = "логином";
            $credentials = [
                "consumer_login" => $auth_value,
                "password"       => $request->password
            ];
        }

        try
        {
            if(!$token = JWTAuth::attempt($credentials))
            {
                $action_log_array = [
                    "controller_id"         => $controller->id ?? null,
                    "row_id"                => null,
                    "consumer_id"           => $consumer->id ?? null,
                    "action_type_id"        => $action_type->id,
                    "action_log_error_l"    => true,
                    "action_log_error_code" => 400,
                    "action_log_message"    => "Авторизация с $log_in_type $auth_value . Ошибка: Неверные учетные данные.",
                    'remote_addr' => request()->server('REMOTE_ADDR'),
                    'http_referer' => request()->server('HTTP_REFERER'),
                    'redirect_url' => request()->server('REDIRECT_URL'),
                    'request_method' => request()->server('REQUEST_METHOD'),
                    'http_user_agent' => request()->server('HTTP_USER_AGENT'),
                ];
                ActionLog::create($action_log_array);
                return response()->json([
                    'msg'    => 'Неверные учетные данные.',
                    'status' => 'error'
                ]);
            }
        } catch(JWTException $e)
        {
            $action_log_array = [
                "controller_id"         => $controller->id ?? null,
                "row_id"                => null,
                "consumer_id"           => $consumer->id ?? null,
                "action_type_id"        => $action_type->id,
                "action_log_error_l"    => true,
                "action_log_error_code" => 400,
                "action_log_message"    => "Авторизация с $log_in_type $auth_value . Ошибка: could_not_create_token",
                'remote_addr' => request()->server('REMOTE_ADDR'),
                'http_referer' => request()->server('HTTP_REFERER'),
                'redirect_url' => request()->server('REDIRECT_URL'),
                'request_method' => request()->server('REQUEST_METHOD'),
                'http_user_agent' => request()->server('HTTP_USER_AGENT'),
            ];
            ActionLog::create($action_log_array);
            return response()->json([
                'msg'    => 'could_not_create_token',
                'status' => 'error'
            ]);
        }
        $action_log_array = [
            "controller_id"         => $controller->id ?? null,
            "row_id"                => null,
            "consumer_id"           => $consumer->id ?? null,
            "action_type_id"        => $action_type->id,
            "action_log_error_l"    => false,
            "action_log_error_code" => null,
            "action_log_message"    => "Удачная попытка входа с $log_in_type $auth_value",
            'remote_addr' => request()->server('REMOTE_ADDR'),
            'http_referer' => request()->server('HTTP_REFERER'),
            'redirect_url' => request()->server('REDIRECT_URL'),
            'request_method' => request()->server('REQUEST_METHOD'),
            'http_user_agent' => request()->server('HTTP_USER_AGENT'),
        ];
        ActionLog::create($action_log_array);

        $user = Auth::getUser();

        $captionName = ['Error403Forbidden'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        if($user["consumer_is_system_n"] != 1 && !$user->hasRoles())
            return response()->json([
                "error" => true,
                "message" => $getArrayCaptions['Error403Forbidden']['translation_captions']['caption_translation']
            ], 400);

        if($user["consumer_status_n"] !== 3)
        {
            Auth::logout();
            return response()->json([
                'msg'    => 'Пользователь не активирован',
                'status' => 'error'
            ]);
        }

        $access_role = ConsumerAccessRole::query()
            ->where([
                "consumer_id" => $user["id"],
                "main_l"      => true
            ])->with([
                "readAccessRoles:id,home_url,home_fe_route_id",
                //                "readAccessRoles.feRoute.feRouteUrlLineN.feUrl",
            ])
            //            ->has("readAccessRoles.feRoute")
            ->select("access_role_id")
            ->get()->first();

        // Добавить новую запись в ConsumerSessionTokens
        $session_tokens_controller = new ConsumerSessionTokensController($this->auth, $token);

        $session_tokens_controller->handleLogin();

        return response()->json([
            'msg'           => '',
            'status'        => 'success',
            'token'         => $token,
            "default_url"   => $access_role ? "/" . $access_role->readAccessRoles->home_url : "/",
            "use_home_page" => self::getParameter("UseHomePage")
            //            "default_url" => $access_role ?  "/" . $access_role->readAccessRoles->feRoute->feRouteUrlLineN->feUrl->fe_url_code : "/"
        ]);

    }

    private function logInByLogin(Request $request)
    {

    }

    private function logInByEmail(Request $request)
    {

    }


    public function me(Request $request)
    {
        JWTAuth::setToken($request->input('token'));
        $user = JWTAuth::toUser();
        return response()->json($user);
    }

    public function captcha()
    {
        return 'test';
        return captcha_src();
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function getRequest1cReport(Request $request)
    {
        JWTAuth::setToken($request->input('token'));

        $user = JWTAuth::toUser();

        $data = \GuzzleHttp\json_decode($user, true);

        //        $report = new Report();
        //        $report->user_id = $data['id'];
        //        $report->company_id = '1';
        //        $report->report_name = 'test';
        //        $report->report_lng = 'testLng';
        //        $report->report_organisation = 'report_organisation';
        //        $report->report_format = 'report_format';
        //        $report->report_file = 'report_file';
        //        $report->save();


        //       $test = $user->id;

        //        $user = \GuzzleHttp\json_decode($user);

        //       $userid = Consumer::all()->where('id', $user->id)->get()->toArray();


        // auth true

        //        $token = auth()->tokenById('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hZG1pbi1wYW5lbC5sb2NcL2FwaVwvbG9naW4iLCJpYXQiOjE1MzI1OTQ4NTEsImV4cCI6MTUzMjU5ODQ1MSwibmJmIjoxNTMyNTk0ODUxLCJqdGkiOiJIbW1LS1BXbW5ZcnZaZWNYIiwic3ViIjoxLCJwcnYiOiJlNjVmNzliZmI5NzA5MzYyOTQ3NDU0NGZhYmI3ZDExZjAwN2E4OTczIn0.UskwMcZWIOChSd7erIMV_YWnUz0kYrfN36ru5ZZ_J-Y');

        //        $data = \GuzzleHttp\json_decode($request->getContent(), true);

        //        $all = Consumer::all()->toArray();


        $status = [
            'status' => [
                'status_code'        => (int)1,
                'status_description' => 'Auth',
            ]
        ];

        return response()->json($status);
        //        return $this->sendResponse($data);
    }

    // Captcha function, uncomment when needed
    //    protected function checkRecaptcha($token, $ip)
    //    {
    //        $response = (new Client)->post('https://www.google.com/recaptcha/api/siteverify', [
    //            'form_params' => [
    //                'secret'   => "6LdaVLQUAAAAAJLdD3DeMKmyAL3E9gslp-25gnCo",
    //                'response' => $token,
    //                'remoteip' => $ip,
    //            ],
    //        ]);
    //        $response = json_decode((string)$response->getBody(), true);
    //        return $response['success'];
    //    }


}
