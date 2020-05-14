<?php
namespace App\Http\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Albert Topalu
 * Date: 10/29/18
 * Time: 11:21 AM
 */

class ConsumerParameters {

    protected $nameControllerMethod;

//    public function __construct(array $nameControllerMethod) {
//        $this->nameControllerMethod = $nameControllerMethod;
//    }

    public function consumerCode(){
        $consumerCode = Auth::user()->consumer_code;
        return $consumerCode;
    }

//    public function checkControllerAccessRight() {
//        $params = $this->nameControllerMethod;
//
//        if (isset($params['controllerAlias']) and !empty($params['controllerAlias'])) {
//            $AccessControllerMethods = DB::table('_AccessRightByRoles')
//                ->join('_AccessRoles', '_AccessRoles.id', '=', '_AccessRightByRoles.access_role_id')
//                ->join('__Controllers', '__Controllers.id', '=', '_AccessRightByRoles.controller_id')
//                ->join('__ActionTypes', '__ActionTypes.access_right_id', '=', '_AccessRightByRoles.access_right_id')
//                ->join('_ConsumerAccessRoles', '_ConsumerAccessRoles.access_role_id', '=', '_AccessRoles.id')
//                ->join('Consumers', 'Consumers.id', '=', '_ConsumerAccessRoles.consumer_id')
//                ->select('__ActionTypes.action_type_code')
//                ->where('_ConsumerAccessRoles.consumer_id', Auth::user()->id)
//                ->where('__Controllers.controller_alias', '=', $params['controllerAlias'])
//                ->where('__ActionTypes.action_type_code', '=', $params['method'])
//                ->groupBy('action_type_code')
//                ->get()->toArray();
//
//            if (isset($AccessControllerMethods) and !empty($AccessControllerMethods)) {
//                return true;
//            }
//            elseif (isset($AccessControllerMethods) and empty($AccessControllerMethods)) {
//                return false;
//            }
//        }
//
//        elseif (isset($params['controllerAlias']) and empty($params['controllerAlias'])) {
//
//            $AccessControllerMethods = DB::table('_AccessRightByRoles')
//                ->join('_AccessRoles', '_AccessRoles.id', '=', '_AccessRightByRoles.access_role_id')
//                ->join('__Controllers', '__Controllers.id', '=', '_AccessRightByRoles.controller_id')
//                ->join('__ActionTypes', '__ActionTypes.access_right_id', '=', '_AccessRightByRoles.access_right_id')
//                ->join('_ConsumerAccessRoles', '_ConsumerAccessRoles.access_role_id', '=', '_AccessRoles.id')
//                ->join('Consumers', 'Consumers.id', '=', '_ConsumerAccessRoles.consumer_id')
//                ->select('__ActionTypes.action_type_code')
//                ->where('_ConsumerAccessRoles.consumer_id', '=', Auth::user()->id)
//                ->where('__Controllers.controller_code', '=', $params['controller'])
//                ->where('__ActionTypes.action_type_code', '=', $params['method'])
//                ->groupBy('action_type_code')
//                ->get()->toArray();
//
//            if (isset($AccessControllerMethods) and !empty($AccessControllerMethods)) {
//                return true;
//            } elseif (isset($AccessControllerMethods) and empty($AccessControllerMethods)) {
//                return false;
//            }
//        }
//    }


}