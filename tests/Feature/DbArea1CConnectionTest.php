<?php

namespace Tests\Feature;

use App\Http\Controllers\Api\Controller;
use App\Http\Traits\DefaultSystemParams;
use App\Models\DbArea;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DbArea1CConnectionTest extends TestCase
{
    use DefaultSystemParams, DatabaseTransactions;

    public function testConnection()
    {
        $db_area_id = self::getDefaultDBAreaId();

        $db_area = DbArea::query()
            ->where("id", $db_area_id)
            ->with(["dBase.dbType", "dBase.serverDb"])
            ->get()->first();

        $this->assertNotNull($db_area, "DbArea с айди $db_area_id небыла найдена");

        $controller = new Controller();

        $array_to_send = [
            "request" => [
                "db_area_code" => $db_area->db_area_code,
                "request_name" => "TestConnection"
            ]
        ];

        try
        {
            $result = $controller->sendRequestTo1C($db_area->dBase->serverDb->server_url, $db_area->dBase->db_code,
                "/hs/api_for_wc/signal", $array_to_send, $db_area->db_area_token,
                $db_area->dBase->serverDb->server_port);

            $this->assertEquals(1, $result->status->status_code, $result->status->status_description);
        }
        catch(GuzzleException $e)
        {
            $this->fail("Ошибка соединения с 1С. " . $e->getMessage());
        }
    }
}
