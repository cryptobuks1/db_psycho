<?php

namespace Tests\Feature;

use App\Models\Consumer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use DatabaseTransactions;

    public function testChangePasswordFail()
    {
        $password = "123123";

        $user = factory(Consumer::class)->create([
            "password" => bcrypt($password)
        ]);

        $this->actingAs($user);

        $token = auth()->guard("api")->login($user);

        $this->post("/api/admin/changePassword", [
            "oldPassword"    => $password,
            "newPassword"    => "123123123",
            "repeatPassword" => "123123123123"
        ], [
            "Authorization" => "Bearer $token"
        ])
            ->assertStatus(400)
            ->assertExactJson(["message" => "Пароли не совпадают"]);
    }

    public function testChangePasswordFailOldNewEqual()
    {
        $password = "123123";

        $user = factory(Consumer::class)->create([
            "password" => bcrypt($password)
        ]);

        $this->actingAs($user);

        $token = auth()->guard("api")->login($user);

        $this->post("/api/admin/changePassword", [
            "oldPassword"    => $password,
            "newPassword"    => $password,
            "repeatPassword" => $password
        ], [
            "Authorization" => "Bearer $token"
        ])
            ->assertStatus(400)
            ->assertExactJson(["message" => "Новый пароль не должен совпадать со старым"]);
    }

    public function testChangePasswordSuccessful()
    {
        $password = "123123";

        $user = factory(Consumer::class)->create([
            "password" => bcrypt($password)
        ]);

        $this->actingAs($user);

        $token = auth()->guard("api")->login($user);

        $this->post("/api/admin/changePassword", [
            "oldPassword"    => $password,
            "newPassword"    => "123123123",
            "repeatPassword" => "123123123"
        ], [
            "Authorization" => "Bearer $token"
        ])
            ->assertStatus(200)
            ->assertExactJson(["message" => "Пароль успешно изменен"]);
    }

    public function testChangingPasswordUpdatesPasswordChangedDate()
    {
        $password = "123123";

        $user = factory(Consumer::class)->create([
            "password"              => bcrypt($password),
            "password_changed_date" => null
        ]);

        $this->actingAs($user);

        $token = auth()->guard("api")->login($user);

        $this->post("/api/admin/changePassword", [
            "oldPassword"    => $password,
            "newPassword"    => "123123123",
            "repeatPassword" => "123123123"
        ], [
            "Authorization" => "Bearer $token"
        ])
            ->assertStatus(200);

        $this->assertEquals(\DateManager::now(), Consumer::query()->find($user->id)->getAttribute("password_changed_date"), "значение в поле password_changed_date не равняется значению из DaterManager::now()");


    }
}
