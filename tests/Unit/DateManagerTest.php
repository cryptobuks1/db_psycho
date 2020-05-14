<?php

namespace Tests\Unit;

use App\Http\Classes\DateManager;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DateManagerTest extends TestCase
{
    use DatabaseTransactions;
    public function testNowDateFormat()
    {
        $this->assertEquals(
            date('Y-m-d H:i:s', time()),
            \DateManager::now());
    }
}
