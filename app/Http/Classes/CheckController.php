<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29.05.19
 * Time: 14:06
 */

namespace App\Http\Classes;

use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\Caption;
use App\Models\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class CheckController
{
    protected $nameControllerMethod;

    public function __construct(array $nameControllerMethod)
    {
        $this->nameControllerMethod = $nameControllerMethod;
    }

    public function checkControllerAccessRight()
    {
        $consumer = Auth::user();
        $params = $this->nameControllerMethod;

        $controller = Controller::where('controller_code', $params['controller'])->first();
        $method = ActionType::where('action_type_code', $params['method'])->first();


        if ($params['controller'] == "MenuController") {
            $controllerMenu = true;
        } else {
            $controllerMenu = false;
        }

        $requestId = request()->id ?? null;
        if (request()->id == 'new') {
            $requestId = null;
        }


        if (isset($consumer->consumer_is_system_n) and ($consumer->consumer_is_system_n === 1)) {

            if ($controllerMenu == false) {
                $log = new ActionLog();
                $log->controller_id = $controller->id ?? null;
                $log->consumer_id = $consumer->id;
                $log->row_id = $requestId;
                $log->action_type_id = $method['id'];
                $log->action_log_error_l = (boolean)false;
                $log->action_log_error_code = null;
                $log->action_log_message = 'access granted';
                $log->created_by = $consumer['consumer_code'];
                $log->updated_by = $consumer['consumer_code'];
                $log->remote_addr = request()->server('REMOTE_ADDR');
                $log->http_referer = request()->server('HTTP_REFERER');
                $log->redirect_url = request()->server('REDIRECT_URL');
                $log->request_method = request()->server('REQUEST_METHOD');
                $log->http_user_agent = request()->server('HTTP_USER_AGENT');
                $log->save();
            }
            return true;
        }
        //+++ ЗубановИА Добавил исключение на метод download из контроллера Controller там будет внутреняя проверка на доступ в самом методе
        if (($this->nameControllerMethod['method'] === "download")
            or ($this->nameControllerMethod['controller'] === "Controller")
            or ($this->nameControllerMethod['method'] === "switchLanguage")) {
            return true;
        }

        // Исключение для получения списка полей при верификации
//        if (($this->nameControllerMethod['method'] === "getVerificationInputs") or ($this->nameControllerMethod['controller'] === "ConsumersController")) {
//            return true;
//        }
//        if (($this->nameControllerMethod['method'] === "confirmChangePassword") or ($this->nameControllerMethod['controller'] === "RegisterController")) {
//            return true;
//        }
        //+++ ЗубановИА Добавил исключение на метод download

//        if ( ($this->nameControllerMethod['method'] === "index") or ($this->nameControllerMethod['controller'] === "MenuController")) {
//            return true;
//        }


        elseif (isset($consumer->consumer_is_system_n) and ($consumer->consumer_is_system_n === 2) or ($consumer->consumer_is_system_n === 0)) {

            if (($this->nameControllerMethod['method'] === "index") or ($this->nameControllerMethod['controller'] === "FeRoutesController")) {
                return true;
            }

            if (isset($params['controllerAlias']) and !empty($params['controllerAlias'])) {
                $AccessControllerMethods = DB::table('_AccessRightByRoles')
                    ->join('_AccessRoles', '_AccessRoles.id', '=', '_AccessRightByRoles.access_role_id')
                    ->join('__Controllers', '__Controllers.id', '=', '_AccessRightByRoles.controller_id')
                    ->join('__ActionTypes', '__ActionTypes.access_right_id', '=', '_AccessRightByRoles.access_right_id')
                    ->join('_ConsumerAccessRoles', '_ConsumerAccessRoles.access_role_id', '=', '_AccessRoles.id')
                    ->join('Consumers', 'Consumers.id', '=', '_ConsumerAccessRoles.consumer_id')
                    ->select('__ActionTypes.action_type_code')
                    ->where('_ConsumerAccessRoles.consumer_id', Auth::user()->id)
                    ->where('__Controllers.controller_alias', '=', trim($params['controllerAlias']) )
                    ->where('__ActionTypes.action_type_code', '=', trim($params['method']))
                    ->groupBy('action_type_code')
                    ->get()->toArray();

                if (isset($AccessControllerMethods) and !empty($AccessControllerMethods)) {
                    if ($controllerMenu == false) {
                        $log = new ActionLog();
                        $log->controller_id = $controller->id;
                        $log->consumer_id = $consumer->id;
                        $log->row_id = $requestId;
                        $log->action_type_id = $method['id'];
                        $log->action_log_error_l = (boolean)false;
                        $log->action_log_error_code = null;
                        $log->action_log_message = 'access granted';
                        $log->created_by = $consumer['consumer_code'];
                        $log->updated_by = $consumer['consumer_code'];
                        $log->remote_addr = request()->server('REMOTE_ADDR');
                        $log->http_referer = request()->server('HTTP_REFERER');
                        $log->redirect_url = request()->server('REDIRECT_URL');
                        $log->request_method = request()->server('REQUEST_METHOD');
                        $log->http_user_agent = request()->server('HTTP_USER_AGENT');
                        $log->save();
                    }

                    return true;
                } elseif (isset($AccessControllerMethods) and empty($AccessControllerMethods)) {
                    return false;
                }
            } elseif (!isset($params['controllerAlias']) and empty($params['controllerAlias'])) {

                $AccessControllerMethods = DB::table('_AccessRightByRoles')
                    ->join('_AccessRoles', '_AccessRoles.id', '=', '_AccessRightByRoles.access_role_id')
                    ->join('__Controllers', '__Controllers.id', '=', '_AccessRightByRoles.controller_id')
                    ->join('__ActionTypes', '__ActionTypes.access_right_id', '=', '_AccessRightByRoles.access_right_id')
                    ->join('_ConsumerAccessRoles', '_ConsumerAccessRoles.access_role_id', '=', '_AccessRoles.id')
                    ->join('Consumers', 'Consumers.id', '=', '_ConsumerAccessRoles.consumer_id')
                    ->select('__ActionTypes.action_type_code')
                    ->where('_ConsumerAccessRoles.consumer_id', '=', Auth::user()->id)
                    ->where('__Controllers.controller_code', '=', trim($params['controller']))
                    ->where('__ActionTypes.action_type_code', '=', trim($params['method']) )
                    ->groupBy('action_type_code')
                    ->get()->toArray();


                if (isset($AccessControllerMethods) and !empty($AccessControllerMethods)) {

                    if ($controllerMenu == false) {
                        $log = new ActionLog();
                        $log->controller_id = $controller->id;
                        $log->consumer_id = $consumer->id;
                        $log->row_id = $requestId;
                        $log->action_type_id = $method['id'];
                        $log->action_log_error_l = (boolean)false;
                        $log->action_log_error_code = null;
                        $log->action_log_message = 'access granted';
                        $log->created_by = $consumer['consumer_code'];
                        $log->updated_by = $consumer['consumer_code'];
                        $log->remote_addr = request()->server('REMOTE_ADDR');
                        $log->http_referer = request()->server('HTTP_REFERER');
                        $log->redirect_url = request()->server('REDIRECT_URL');
                        $log->request_method = request()->server('REQUEST_METHOD');
                        $log->http_user_agent = request()->server('HTTP_USER_AGENT');
                        $log->save();
                    }
                    return true;
                } elseif (isset($AccessControllerMethods) and empty($AccessControllerMethods)) {

                    if ($controllerMenu == false) {
                        $log = new ActionLog();
                        $log->controller_id = $controller->id;
                        $log->consumer_id = $consumer->id;
                        $log->row_id = $requestId;
                        $log->action_type_id = $method['id'];
                        $log->action_log_error_l = (boolean)true;
                        $log->action_log_error_code = (int)403;
                        $log->action_log_message = 'access denied';
                        $log->created_by = $consumer['consumer_code'];
                        $log->updated_by = $consumer['consumer_code'];
                        $log->remote_addr = request()->server('REMOTE_ADDR');
                        $log->http_referer = request()->server('HTTP_REFERER');
                        $log->redirect_url = request()->server('REDIRECT_URL');
                        $log->request_method = request()->server('REQUEST_METHOD');
                        $log->http_user_agent = request()->server('HTTP_USER_AGENT');
                        $log->save();
                    }

                    return abort('403', $this->getForbiddenErrorMessage());
                }
            }
        } else {
            $log = new ActionLog();
            $log->controller_id = $controller->id;
            $log->consumer_id = $consumer->id;
            $log->row_id = $requestId;
            $log->action_type_id = $method['id'];
            $log->action_log_error_l = (boolean)true;
            $log->action_log_error_code = (int)403;
            $log->action_log_message = 'access denied';
            $log->created_by = $consumer['consumer_code'];
            $log->updated_by = $consumer['consumer_code'];
            $log->remote_addr = request()->server('REMOTE_ADDR');
            $log->http_referer = request()->server('HTTP_REFERER');
            $log->redirect_url = request()->server('REDIRECT_URL');
            $log->request_method = request()->server('REQUEST_METHOD');
            $log->http_user_agent = request()->server('HTTP_USER_AGENT');
            $log->save();

            return abort('403', $this->getForbiddenErrorMessage());
        }
    }

    public function getShowFormParameters()
    {

//        $tt=$this->nameControllerMethod;

        if (Auth::user()->consumer_is_system_n === 1) {
            $formShowParam = [
                'read_only' => false,
                'show_system_tab' => true
            ];
        } elseif (Auth::user()->consumer_is_system_n != 1) {

            $AccessControllerMethods = DB::table('__AccessRights')
                ->join('_AccessRightByRoles', '_AccessRightByRoles.access_right_id', '=', '__AccessRights.id')
                ->join('__Controllers', '__Controllers.id', '=', 'controller_id')
                ->join('_ConsumerAccessRoles', '_ConsumerAccessRoles.access_role_id', '=', '_AccessRightByRoles.access_role_id')
                ->where('__AccessRights.access_right_code', '=', trim($this->nameControllerMethod['accessRight']) )
                ->where('_ConsumerAccessRoles.consumer_id', '=', Auth::user()->id)
                ->where('__Controllers.controller_code', '=', trim($this->nameControllerMethod['controller']))
                ->get()->toArray();

            if (isset($AccessControllerMethods) and !empty($AccessControllerMethods)) {
                $formShowParam = [
                    'read_only' => false,
                    'show_system_tab' => false
                ];
            } elseif (empty($AccessControllerMethods)) {
                $formShowParam = [
                    'read_only' => true,
                    'show_system_tab' => false
                ];
            }
        }

        return $formShowParam;

    }

    public function serverParams(\Request $request)
    {
        $serverParams = $request->server(); //params
        return $serverParams;

    }

    protected function getForbiddenErrorMessage()
    {
        $caption = Caption::query()
            ->where("__Captions.caption_name", "Error403Forbidden")
            ->with("translationCaptions")
            ->first()->toArray();

        return $caption['translation_captions']['caption_translation'];
    }


}