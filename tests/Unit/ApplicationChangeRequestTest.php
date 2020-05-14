<?php

namespace Tests\Unit;

use App\Models\DbArea;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;

/**
 * Class ApplicationChangeRequestTest
 * @package Tests\Unit
 * @coversDefaultClass  \App\Http\Classes\ApplicationChangeRequest
 */
class ApplicationChangeRequestTest extends TestCase
{
    /**
     * @covers::dbAreaEmpty
     * @runInSeparateProcess
     */

    public function testDbTypesControllers()
    {
//        $dbTypesControllers = \App\Models\Controller::with('models', 'dbTypeController')
//            ->where('controller_alias', $base_modal)
//            ->get()->toArray();
//
//            $this->assertNull($dbTypesControllers);
    }

    public function testDbAreaRelationsNotNull()
    {
        $dbAreaId = '6';
        $DbAreaRelations = DbArea::with('dBase.serverDb', 'dBase.dbType')
            ->where('id', $dbAreaId)
            ->get()->toArray();
        $this->assertNotNull($DbAreaRelations);
    }

    public function testDbAreaRelationsIsNull()
    {
        $dbAreaId = (int)'';
        $DbAreaRelations = DbArea::with('dBase.serverDb', 'dBase.dbType')
            ->where('id', $dbAreaId)
            ->get()->toArray();

//        var_dump($DbAreaRelations);
        $this->assertEmpty($DbAreaRelations);
    }


    public function testNameControlDbTypesControlDbTypeIdIsNull()
    {
        $nameControllerDbTypesControllers = \App\Models\DbTypeController::with('controllerName.models')
            ->with('controllerName.controllerLink')
            ->with('controllerFields')
            ->where('object_type_code', 'Contractor')
            ->where('db_type_id', null)
            ->get()->toArray();

//        var_dump($nameControllerDbTypesControllers);

        $this->assertNotEmpty($nameControllerDbTypesControllers);
    }

    public function testNameControlDbTypesControlObjectTypeCodeBackspace()
    {
        $nameControllerDbTypesControllers = \App\Models\DbTypeController::with('controllerName.models')
            ->with('controllerName.controllerLink')
            ->with('controllerFields')
            ->where('object_type_code', trim(' Contractor '))
            ->where('db_type_id', null)
            ->get()->toArray();

//        var_dump($nameControllerDbTypesControllers);

        $this->assertNotEmpty($nameControllerDbTypesControllers);
    }


}
