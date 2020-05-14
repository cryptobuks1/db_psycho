<?php

namespace Tests\Feature;

use App\Models\BL\BlCustomerRequest;
use App\Models\BL\BlLeasingCalculation;
use App\Models\Consumer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlLeasingCalculationsListCardTest extends TestCase
{
    use DatabaseTransactions;

    public function testBLLeasingCalculationsListAsUser()
    {
        $this->callApi("/bl/leasing/calc/list", [], $this->getUserAuthHeaders())
            ->assertStatus(200);

        return $this;
    }

    public function testBLLeasingCalculationsListAsManager()
    {
        $this->callApi("/bl/leasing/calc/list", [], $this->getManagerAuthHeaders())
            ->assertStatus(200);

        return $this;
    }

    public function testEachBlLeasingCalculationCardAsManager()
    {
        $headers = $this->getManagerAuthHeaders();

        $this->actingAs(Consumer::query()->where("consumer_code", "RblManager")->first());

        $customerRequestArrayId = BlCustomerRequest::query()->select('id')->get();
        $objects = BlLeasingCalculation::with('blLeasingCalculationsTabAdditionalDetail',
            'blLeasingCalculationsTabAdditionalDetail.oneAddDetail')
            ->join('blCustomerRequestTabLeasingObjects as CustReqTabLeasObj', 'blLeasingCalculations.id', '=',
                'CustReqTabLeasObj.bl_leasing_calculation_main_document_id')
            ->join('blLeasingObjectBrands as LeasObjBrands', 'CustReqTabLeasObj.bl_leasing_object_brand_id', '=',
                'LeasObjBrands.id')
            ->join('blLeasingObjectModels as LeasObjModels', 'CustReqTabLeasObj.bl_leasing_object_model_id', '=',
                'LeasObjModels.id')
            ->whereIn('row_id_base', $customerRequestArrayId ? $customerRequestArrayId->toArray() : [])
            ->where('table_n_base', 81)
            ->select('blLeasingCalculations.*', 'LeasObjModels.bl_leasing_object_model_name',
                'LeasObjBrands.bl_leasing_object_brand_name')->get();

        foreach($objects as $object)
        {
            $response = $this->callApi("/bl/leasing/calc/card", ["id" => $object->id], $headers);

            $this->assertEquals(200, $response->getStatusCode(),
                "Expected 200, got {$response->getStatusCode()}. BlLeasingCalculation id {$object->id}");

            $card = json_decode($response->getContent());

            $form_base_data_model = $card->form_parameters->form_base_data_model;

            $model = $card->main_data_models->$form_base_data_model[0];

            $this->assertNotNull($model->leasing_object_brand_name,
                "leasing_object_brand_name (Марка) is null in BlLeasingCalculation with id {$object->id}");

        }

        if($objects->isEmpty())
        {
            $this->assertEmpty($objects);
        }

        return $this;
    }


    public function testEachBlLeasingCalculationCardAsUser()
    {
        $headers = $this->getUserAuthHeaders();

        $this->actingAs(Consumer::query()->where("consumer_code", "RblUser")->first());
        //        $this->refreshApplication();

        $customerRequestArrayId = BlCustomerRequest::query()->select('id')->get();
        $objects = BlLeasingCalculation::with('blLeasingCalculationsTabAdditionalDetail',
            'blLeasingCalculationsTabAdditionalDetail.oneAddDetail')
            ->join('blCustomerRequestTabLeasingObjects as CustReqTabLeasObj', 'blLeasingCalculations.id', '=',
                'CustReqTabLeasObj.bl_leasing_calculation_main_document_id')
            ->join('blLeasingObjectBrands as LeasObjBrands', 'CustReqTabLeasObj.bl_leasing_object_brand_id', '=',
                'LeasObjBrands.id')
            ->join('blLeasingObjectModels as LeasObjModels', 'CustReqTabLeasObj.bl_leasing_object_model_id', '=',
                'LeasObjModels.id')
            ->whereIn('row_id_base', $customerRequestArrayId ? $customerRequestArrayId->toArray() : [])
            ->where('table_n_base', 81)
            ->select('blLeasingCalculations.*', 'LeasObjModels.bl_leasing_object_model_name',
                'LeasObjBrands.bl_leasing_object_brand_name')->get();

        foreach($objects as $object)
        {
            $response = $this->callApi("/bl/leasing/calc/card", ["id" => $object->id], $headers);

            $this->assertEquals(200, $response->getStatusCode(),
                "Expected 200, got {$response->getStatusCode()}. BlLeasingCalculation id {$object->id}");

            $card = json_decode($response->getContent());

            $form_base_data_model = $card->form_parameters->form_base_data_model;

            $model = $card->main_data_models->$form_base_data_model[0];

            $this->assertNotNull($model->leasing_object_brand_name,
                "leasing_object_brand_name (Марка) is null in BlLeasingCalculation with id {$object->id}");
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
