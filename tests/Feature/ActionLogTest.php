<?php

namespace Tests\Feature;

use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\BL\BlContractorRequest;
use App\Models\Consumer;
use App\Models\Controller;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActionLogTest extends TestCase
{
    use DatabaseTransactions;

    public function testDeletingALogDoesNotCreatingANewLog()
    {
        $action_log_sample = ActionLog::query()->create([]);

        $controller = Controller::query()
            ->where("controller_code", "ActionLogsController")
            ->with("models")
            ->first();

        $this->json("POST", "/api/admin/action/delete", [
            "items"      => $action_log_sample->getAttributeValue("id"),
            "main_model" => "ActionLogs"
        ], $this->getManagerAuthHeaders());

        $action_type_id = ActionType::query()
            ->where("action_type_code", "delete")
            ->select("id")->first();

        $action_log = ActionLog::query()
            ->where([
                "controller_id" => $controller->getAttributeValue("id"),
                "action_type_id" => $action_type_id->getAttributeValue("id"),
                "row_id" => $action_log_sample->getAttributeValue("id")
            ])
            ->first();

        $this->assertNull($action_log);
    }

}
