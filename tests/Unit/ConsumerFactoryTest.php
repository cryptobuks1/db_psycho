<?php

namespace Tests\Unit;

use App\Models\Consumer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class ConsumerFactoryTest
 * @package Tests\Unit
 * @coversDefaultClass \App\Models\Consumer
 */
class ConsumerFactoryTest extends TestCase
{
    use DatabaseTransactions;

    public function testExample()
    {
        $user = factory(Consumer::class)->create();

        $this->assertNotNull($user);

        $this->actingAs($user);

        $this->assertDatabaseHas("Consumers", [
            "email" => $user->email
        ]);
    }

    public function testNotActivatedUserCannotLogIn()
    {
        $password = "123123";

        $user = factory(Consumer::class)->create([
            "consumer_status_n" => 1,
            "password"          => bcrypt($password)
        ]);

        $this->post("/api/login", [
            "consumer_login" => $user->consumer_login,
            "password"       => $password
        ])->assertExactJson([
            "msg"    => "Пользователь не активирован",
            "status" => "error"
        ]);
    }

    public function testActivatedUserCanLogIn()
    {
        $password = "123123";

        $user = factory(Consumer::class)->create([
            "consumer_status_n" => 3,
            "password"          => bcrypt($password)
        ]);

        $this->post("/api/login", [
            "consumer_login" => $user->consumer_login,
            "password"       => $password
        ])->assertJsonFragment([
            "status" => "success"
        ]);
    }

    /**
     * @covers ::getDisplayName
     */
    public function testGetDisplayNameReturnsFirstAndLastName()
    {
        $user = factory(Consumer::class)->create([
            "consumer_is_system_n" => 0,
            "first_name" => "First",
            "last_name" => "Last"
        ]);

        $this->assertEquals("First Last", $user->getDisplayName());
    }

    /**
     * @covers ::getDisplayName
     */
    public function testGetDisplayNameReturnsConsumerName()
    {
        $user = factory(Consumer::class)->create([
            "consumer_is_system_n" => 1,
            "consumer_name" => "Name"
        ]);

        $this->assertEquals("Name", $user->getDisplayName());
    }

    /**
     * @covers ::getUserPhoto
     */
    public function testGetUserPhotoReturnsNull()
    {
        $user = factory(Consumer::class)->create();

        $this->assertNull($user->getUserPhoto());
    }
}
