<?php

namespace Tests\Feature;

use App\Models\Consumer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiCalls extends TestCase
{
    use DatabaseTransactions;
    public function testApiPostWithoutTokenReturnsUnauthorized()
    {
        $this->json("POST", "api/admin/testing/api/post")
            ->assertStatus(401);
    }

    public function testApiPostWithTokenReturnsOk()
    {
        $this->callApi("/testing/api/post", [], $this->getAdminAuthHeaders())
            ->assertStatus(200);
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @param array $headers
     * @return TestResponse
     */
    public function callApi(string $endpoint, array $params = [], array $headers = [])
    {
        return $this->post("/api/admin" . $endpoint, $params, $headers);
    }
}
