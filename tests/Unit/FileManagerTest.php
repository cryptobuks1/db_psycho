<?php

namespace Tests\Unit;

use App\Http\Classes\FileManager;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileManagerTest extends TestCase
{
    use DatabaseTransactions;

    public function testExample()
    {
        $this->assertEquals("1 KB", FileManager::convertBytesToString(1024));
    }

    public function testSecondParameterIsOptional()
    {
        $this->assertNotNull(FileManager::convertBytesToString(1024));
    }
}
