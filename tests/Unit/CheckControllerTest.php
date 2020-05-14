<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


/**
 * Class CheckControllerTest
 * @package Tests\Unit
 * @coversDefaultClass \App\Http\Classes\CheckController
 */

class CheckControllerTest extends TestCase
{
    /**
     * @covers::checkControllerAccessRight
     * @return void
     */

    public function testCheckContAccRigIsBackspaceControllerAlias()
    {

        $AccessControllerMethods = DB::table('_AccessRightByRoles')
            ->join('_AccessRoles', '_AccessRoles.id', '=', '_AccessRightByRoles.access_role_id')
            ->join('__Controllers', '__Controllers.id', '=', '_AccessRightByRoles.controller_id')
            ->join('__ActionTypes', '__ActionTypes.access_right_id', '=', '_AccessRightByRoles.access_right_id')
            ->join('_ConsumerAccessRoles', '_ConsumerAccessRoles.access_role_id', '=', '_AccessRoles.id')
            ->join('Consumers', 'Consumers.id', '=', '_ConsumerAccessRoles.consumer_id')
            ->select('__ActionTypes.action_type_code')
//            ->where('_ConsumerAccessRoles.consumer_id', Auth::user()->id)
            ->where('_ConsumerAccessRoles.consumer_id', 8)
//            ->where('__Controllers.controller_alias', '=', $params['controllerAlias'])
            ->where('__Controllers.controller_alias', '=', trim('Contractors ') )
//            ->where('__ActionTypes.action_type_code', '=', $params['method'])
            ->where('__ActionTypes.action_type_code', '=', trim('list'))
            ->groupBy('action_type_code')
            ->get()->toArray();

//        var_dump($AccessControllerMethods);
        $this->assertNotEmpty($AccessControllerMethods);
    }

    public function testCheckContAccRigIsNull()
    {
        $AccessControllerMethods = DB::table('_AccessRightByRoles')
            ->join('_AccessRoles', '_AccessRoles.id', '=', '_AccessRightByRoles.access_role_id')
            ->join('__Controllers', '__Controllers.id', '=', '_AccessRightByRoles.controller_id')
            ->join('__ActionTypes', '__ActionTypes.access_right_id', '=', '_AccessRightByRoles.access_right_id')
            ->join('_ConsumerAccessRoles', '_ConsumerAccessRoles.access_role_id', '=', '_AccessRoles.id')
            ->join('Consumers', 'Consumers.id', '=', '_ConsumerAccessRoles.consumer_id')
            ->select('__ActionTypes.action_type_code')
//            ->where('_ConsumerAccessRoles.consumer_id', Auth::user()->id)
            ->where('_ConsumerAccessRoles.consumer_id', null)
//            ->where('__Controllers.controller_alias', '=', $params['controllerAlias'])
            ->where('__Controllers.controller_alias', '=', trim('Contractors') )
//            ->where('__ActionTypes.action_type_code', '=', $params['method'])
            ->where('__ActionTypes.action_type_code', '=', trim(' list'))
            ->groupBy('action_type_code')
            ->get()->toArray();

//        var_dump($AccessControllerMethods);
        $this->assertEmpty($AccessControllerMethods);
    }
}
