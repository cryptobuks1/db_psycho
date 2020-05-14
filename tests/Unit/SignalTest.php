<?php

namespace Tests\Unit;

use App\Console\Commands\SendSignal;
use App\Http\Classes\SignalManager;
use App\Http\Controllers\Api\TabCompanyContractor\ContractorsController;
use App\Models\Consumer;
use App\Models\Signal;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function GuzzleHttp\Psr7\build_query;


class SignalTest extends TestCase
{



    /**
     * @runInSeparateProcess
     * @param $id
     * @dataProvider getAllSignalsIsCreatedProvider
     */
//    public function getAllSignalsIsCreatedByNull1()
//    {
//        $getAllSignals = Signal::where('system_status_id', (integer) 1)
//            ->get()
//            ->sortBy('created_at')
//            ->groupBy('db_area_id')
//            ->toArray();
//        $this->assertTrue(true);
//    }
//


    public function testGetAllSignalsIsCreatedByNull($id)
    {

        $signal_id = 1;

//        $consumer_code = 'RblAdminDev';
////        $getConsumer = Consumer::where('consumer_code', $consumer_code)->first()->toArray();
////        $getObject = SignalManager::getSignalData($signal_id);
//
//        $logArray = [
//            'controller_id' => "4",
//            'row_id' => "1",
//            'consumer_id' => "1",
//            'action_log_error_l' => "",
//            'action_log_error_code' => "",
//            'action_log_message' => '',
//            'created_by' => "RblAdminDev",
//            'updated_by' => "RblAdminDev",
//            'count' => 1,
//            'spent_time' => '',
//        ];

//        $this->assertTrue(true);
//        $this->assertEguales($id,   );
    }

    public function getAllSignalsIsCreatedProvider()
    {

        return [
            ['1'],
            ['2']
            ['3']
        ];

    }

//    public function testGetMethod()
//    {
//        $class = new \ReflectionClass('ContractorsController');
//        $method = $class->getMethod('list');
//        $method->setAccessible(true);
//        return $method;
//    }


}


