<?php

namespace Tests\Feature;

use App\Models\BL\BlLeasingContract;
use App\Models\Consumer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlLeasingContractsListCardTest extends TestCase
{
    use DatabaseTransactions;

    public function testBLLeasingContractsListAsUser()
    {
        $this->callApi("/bl/leasing/contracts/list", [], $this->getUserAuthHeaders())
            ->assertStatus(200);

        return $this;
    }

    public function testBLLeasingContractsListAsManager()
    {
        $this->callApi("/bl/leasing/contracts/list", [], $this->getManagerAuthHeaders())
            ->assertStatus(200);

        return $this;
    }

    public function testEachBLLeasingContractCardAsManager()
    {
        $headers = $this->getManagerAuthHeaders();

        $this->actingAs(Consumer::query()->where("consumer_code", "RblManager")->first());

        $objects = BlLeasingContract::all();

        foreach($objects as $object)
        {
            $response = $this->callApi("/bl/leasing/contracts/card", ["id" => $object->id], $headers);

            $this->assertEquals(200, $response->getStatusCode(),
                "Expected 200, got {$response->getStatusCode()}. BLLeasingContract id {$object->id}");

            $card = json_decode($response->getContent());

            $form_base_data_model = $card->form_parameters->form_base_data_model;

            $model = $card->main_data_models->$form_base_data_model[0];

            $this->assertNotNull($model->bl_leasing_object_brand_name, "bl_leasing_object_brand_name (Марка) is null in BlLeasingContract with id {$object->id}");

        }

        if($objects->isEmpty())
        {
            $this->assertEmpty($objects);
        }

        return $this;
    }



    public function testEachBLLeasingContractCardAsUser()
    {
        $headers = $this->getUserAuthHeaders();

        $this->actingAs(Consumer::query()->where("consumer_code", "RblUser")->first());
        //        $this->refreshApplication();

        $objects = BlLeasingContract::all();

        foreach($objects as $object)
        {
            $response = $this->callApi("/bl/leasing/contracts/card", ["id" => $object->id], $headers);

            $this->assertEquals(200, $response->getStatusCode(),
                "Expected 200, got {$response->getStatusCode()}. BLLeasingContract id {$object->id}");

            $card = json_decode($response->getContent());

            $form_base_data_model = $card->form_parameters->form_base_data_model;

            $model = $card->main_data_models->$form_base_data_model[0];

            $this->assertNotNull($model->bl_leasing_object_brand_name, "bl_leasing_object_brand_name (Марка) is null in BlLeasingContract with id {$object->id}");
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
