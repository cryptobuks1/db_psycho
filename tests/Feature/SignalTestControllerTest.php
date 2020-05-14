<?php

namespace Tests\Feature;

use App\Http\Traits\DefaultSystemParams;
use App\Models\DbArea;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignalTestControllerTest extends TestCase
{
    use DefaultSystemParams, DatabaseTransactions;

    /**
     * @var string
     */
    public $url = "/signal/token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hZG1pbi1wYW5lbC5sb2NcL2FwaVwvbG9naW4iLCJpYXQiOjE1MzI2NzMzNDgsImV4cCI6MTUzMjY3Njk0OCwibmJmIjoxNTMyNjczMzQ4LCJqdGkiOiIzTUg4a3RVRVFNbnlxVXdCIiwic3ViIjoxLCJwcnYiOiJlNjVmNzliZmI5NzA5MzYyOTQ3NDU0NGZhYmI3ZDExZjAwN2E4OTczIn0.N9hf6gicuZoupCDUQI5LSg-yd0ala696daHQKWtGztQ";


    public function testGetRequestReturnsConnectionSuccessful()
    {
        $this->json("GET", $this->url, [], [])
            ->assertStatus(200)
            ->assertExactJson([
                "status" => [
                    "status_code"        => 1,
                    "status_description" => "Connection successful"
                ]
            ]);
    }

    public function testPostRequestFailsWithoutTokenHeader()
    {
        $db_area = DbArea::query()
            ->find(self::getDefaultDBAreaId());

        $this->json("POST", $this->url, [
            "request" => [
                "db_area_code" => $db_area->db_area_code,
                "request_name" => "CheckConnection"
            ]
        ], [])
            ->assertStatus(200)
            ->assertExactJson([
                "status" => [
                    "status_code"        => 0,
                    "status_description" => "token or db_area_code is not valid"
                ]
            ]);
    }

    public function testPostRequestFailsWithWrongDbAreaCode()
    {
        $db_area = DbArea::query()
            ->find(self::getDefaultDBAreaId());

        $this->json("POST", $this->url, [
            "request" => [
                "db_area_code" => "WRONG_DB_AREA_CODE",
                "request_name" => "CheckConnection"
            ]
        ], [
            "token" => $db_area->db_area_token
        ])
            ->assertStatus(200)
            ->assertExactJson([
                "status" => [
                    "status_code"        => 0,
                    "status_description" => "token or db_area_code is not valid"
                ]
            ]);
    }

    public function testPostRequestReturnsConnectionIsSuccessful()
    {
        $db_area = DbArea::query()
            ->find(self::getDefaultDBAreaId());

        $this->json("POST", $this->url, [
            "request" => [
                "db_area_code" => $db_area->db_area_code,
                "request_name" => "CheckConnection"
            ]
        ], [
            "token" => $db_area->db_area_token
        ])
            ->assertStatus(200)
            ->assertExactJson([
                "status" => [
                    "status_code"        => 1,
                    "status_description" => "Connection successful"
                ]
            ]);
    }
}
