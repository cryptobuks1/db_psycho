<?php

namespace Tests\Feature;

use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\BL\BlContractorRequest;
use App\Models\Consumer;
use App\Models\Controller;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BLContractorRequestsListCardTest extends TestCase
{
    use DatabaseTransactions;

    public function testBLContractorRequestsListAsUser()
    {
        $this->callApi("/bl/contractor/requests/list", [], $this->getUserAuthHeaders())
            ->assertStatus(200);

        return $this;
    }

    public function testBLContractorRequestsListAsManager()
    {
        $this->callApi("/bl/contractor/requests/list", [], $this->getManagerAuthHeaders())
            ->assertStatus(200);

        return $this;
    }

    public function testEachBLContractorRequestCardAsManager()
    {
        $headers = $this->getManagerAuthHeaders();

        $this->actingAs(Consumer::query()->where("consumer_code", "RblManager")->first());

        $objects = BlContractorRequest::all();

        foreach($objects as $object)
        {
            $response = $this->callApi("/bl/contractor/requests/card", ["id" => $object->id], $headers);

            $this->assertEquals(200, $response->getStatusCode(),
                "Expected 200, got {$response->getStatusCode()}. ContractorRequest id {$object->id}");

        }

        if($objects->isEmpty())
        {
            $this->assertEmpty($objects);
        }

        return $this;
    }


    public function testEachBLContractorRequestCardAsUser()
    {
        $headers = $this->getUserAuthHeaders();

        $this->actingAs(Consumer::query()->where("consumer_code", "RblUser")->first());
        //        $this->refreshApplication();

        $objects = BlContractorRequest::all();

        foreach($objects as $object)
        {
            $response = $this->callApi("/bl/contractor/requests/card", ["id" => $object->id], $headers);

            $this->assertEquals(200, $response->getStatusCode(),
                "Expected 200, got {$response->getStatusCode()}. ContractorRequest id {$object->id}");

            //            $this->refreshApplication();
        }

        if($objects->isEmpty())
        {
            $this->assertEmpty($objects);
        }

        return $this;
    }

    public function testBlContractorRequestGetsDeleted()
    {
        $request = BlContractorRequest::query()->create([]);

        $this->json("POST", "/api/admin/action/delete", [
            "items"      => $request->getAttributeValue("id"),
            "main_model" => "BlContractorRequests"
        ], $this->getManagerAuthHeaders());

        $this->assertNull(BlContractorRequest::query()->find($request->getAttributeValue("id")));
    }

    public function testActionLogIsCreatedAfterDeletingBlContractorRequest()
    {
        $controller = Controller::query()
            ->where("controller_code", "BlContractorRequestsController")
            ->with("models")
            ->first();

        $request = BlContractorRequest::query()->create([]);

        $this->json("POST", "/api/admin/action/delete", [
            "items"      => $request->getAttributeValue("id"),
            "main_model" => "BlContractorRequests"
        ], $this->getManagerAuthHeaders());

        $action_type_id = ActionType::query()
            ->where("action_type_code", "delete")
            ->select("id")->first();

        $action_log = ActionLog::query()
            ->where([
                "controller_id" => $controller->getAttributeValue("id"),
                "action_type_id" => $action_type_id->getAttributeValue("id"),
                "row_id" => $request->getAttributeValue("id")
            ])
            ->first();

        $this->assertNotNull($action_log);
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
