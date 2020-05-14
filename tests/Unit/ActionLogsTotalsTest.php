<?php

namespace Tests\Unit;

use App\Models\ActionLog;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ActionLogsTotalsTest
 * @coversDefaultClass  \App\Http\Controllers\Api\Admin\ActionLogsTotalsController
 * @package Tests\Unit
 */
class ActionLogsTotalsTest extends TestCase
{
    /**
     * @covers ::statisticCurrentDay
     * @runInSeparateProcess
     */

    public function testStatisticCurrentDayDateNull()
    {
        $statisticCurrentDay = DB::table("__ActionLogs")
            ->where('action_type_id', 26)
            ->where('action_log_error_l', false)
            ->whereDate(DB::raw("Date(created_at)"), "=", date('Y-m-d'))
            ->groupBy('controller_id', 'action_type_id', 'date')
            ->select([
                "__ActionLogs.controller_id",
                "__ActionLogs.action_type_id",
                DB::raw("Date(created_at) as date"),
                DB::raw("count(*) as count"),
            ])->first();
        $this->assertNull($statisticCurrentDay);
    }


    public function testStatisticNotNull()
    {
        $statisticActionLog = ActionLog::query()
            ->where('action_type_id', 26)
            ->where('action_log_error_l', false)
            ->whereDate(DB::raw("Date(created_at)"), "=", date('Y-m-d', strtotime("-1 days")))
             ->groupBy('controller_id', 'action_type_id', 'date')
             ->get([
                "__ActionLogs.controller_id",
                "__ActionLogs.action_type_id",
                DB::raw("Date(created_at) as date"),
                DB::raw("count(*) as count"),
             ])->first();

        $this->assertNotNull($statisticActionLog);

    }

}
