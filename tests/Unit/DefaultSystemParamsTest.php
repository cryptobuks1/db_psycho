<?php

namespace Tests\Unit;

use App\Http\Traits\DefaultSystemParams;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DefaultSystemParamsTest extends TestCase
{
    use DefaultSystemParams, DatabaseTransactions;

    public function testDefaultDbAreaIdIsNotNull()
    {
        $this->assertNotNull(self::getDefaultDBAreaId());
    }

    public function testDefaultCompanyIdNotNull()
    {
        $this->assertNotNull(self::getDefaultCompanyId());
    }

    public function testDefaultStorageTypeSystemNotNull()
    {
        $this->assertNotNull(self::getStorageTypeSystem());
    }
}
