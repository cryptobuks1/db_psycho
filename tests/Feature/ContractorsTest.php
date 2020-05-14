<?php

namespace Tests\Feature;

use App\Models\Consumer;
use App\Models\Contractor;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractorsTest extends TestCase
{
    use DatabaseTransactions;

    public function testContractorsListAsUser()
    {
        $this->callApi("/contractor/list", [], $this->getUserAuthHeaders())
            ->assertStatus(200);

        return $this;
    }

    public function testContractorsListAsManager()
    {
        $this->callApi("/contractor/list", [], $this->getManagerAuthHeaders())
            ->assertStatus(200);

        return $this;
    }

    public function testEachContractorCardAsManager()
    {
        $headers = $this->getManagerAuthHeaders();

        $this->actingAs(Consumer::query()->where("consumer_code", "RblManager")->first());

        $objects = Contractor::all();

        foreach($objects as $object)
        {
            $response = $this->callApi("/contractor/card", ["id" => $object->id], $headers);

            $this->assertEquals(200, $response->getStatusCode(),
                "Expected 200, got {$response->getStatusCode()}. Contractor id {$object->id}");

        }

        if($objects->isEmpty())
        {
            $this->assertEmpty($objects);
        }

        return $this;
    }



    public function testEachContractorCardAsUser()
    {
        $headers = $this->getUserAuthHeaders();

        $this->actingAs(Consumer::query()->where("consumer_code", "RblUser")->first());
        //        $this->refreshApplication();

        $objects = Contractor::all();

        foreach($objects as $object)
        {
            $response = $this->callApi("/contractor/card", ["id" => $object->id], $headers);

            $this->assertEquals(200, $response->getStatusCode(),
                "Expected 200, got {$response->getStatusCode()}. Contractor id {$object->id}");

            //            $this->refreshApplication();
        }

        if($objects->isEmpty())
        {
            $this->assertEmpty($objects);
        }

        return $this;
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
