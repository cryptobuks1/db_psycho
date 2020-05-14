<?php

namespace Tests\Feature;

use App\Models\Consumer;
use App\Models\Controller;
use App\Models\SystemParameter;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SystemParametersTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreatingNewParameterFailsOnValidation()
    {
        $system_parameters_controller = Controller::query()
            ->where("controller_code", "SystemParametersController")
            ->first();

        $system_parameter_object = SystemParameter::getNewObject();

        $this->json("POST", "/api/admin/system/parameters/write", [
            "form_parameters"  => [
                "form_base_data_model" => $system_parameters_controller->controller_alias
            ],
            "main_data_models" => [
                $system_parameters_controller->controller_alias => [
                    $system_parameter_object
                ]
            ]
        ], $this->getAdminAuthHeaders())
            ->assertJsonFragment([
                "error" => true
            ])
            ->assertJsonMissing([
                "requery" => true
            ]);
    }


}
