<?php

namespace Tests\Unit;

use App\Http\Traits\ConsumerCheck;
use App\Models\Consumer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConsumerCheckTest extends TestCase
{
    use ConsumerCheck;

    public function testIsAdminAsUser()
    {
        $this->actingAs(Consumer::query()->where("consumer_code", "RblUser")->first());

        $this->assertFalse($this->isAdmin(), "ConsumerCheck isAdmin() должно было вернуть false. Пользователь RblUser");
    }

    public function testIsAdminAsManager()
    {
        $this->actingAs(Consumer::query()->where("consumer_code", "RblManager")->first());

        $this->assertFalse($this->isAdmin(), "ConsumerCheck isAdmin() должно было вернуть false. Пользователь RblManager");
    }

    public function testIsAdminAsAdmin()
    {
        $this->actingAs(Consumer::query()->where("consumer_code", "RblAdmin")->first());

        $this->assertTrue($this->isAdmin(), "ConsumerCheck isAdmin() должно было вернуть true. Пользователь RblAdmin");
    }
}
