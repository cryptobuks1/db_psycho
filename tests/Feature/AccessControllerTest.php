<?php

namespace Tests\Feature;

use App\Http\Traits\DefaultSystemParams;
use App\Models\Consumer;
use App\Models\DbArea;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccessControllerTest extends TestCase
{
    use DefaultSystemParams, DatabaseTransactions;

    /**
     * @var string
     */
    public $url = "/access/token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hZG1pbi1wYW5lbC5sb2NcL2FwaVwvbG9naW4iLCJpYXQiOjE1MzI2NzMzNDgsImV4cCI6MTUzMjY3Njk0OCwibmJmIjoxNTMyNjczMzQ4LCJqdGkiOiIzTUg4a3RVRVFNbnlxVXdCIiwic3ViIjoxLCJwcnYiOiJlNjVmNzliZmI5NzA5MzYyOTQ3NDU0NGZhYmI3ZDExZjAwN2E4OTczIn0.N9hf6gicuZoupCDUQI5LSg-yd0ala696daHQKWtGztQ";

    public function testCreatingNewConsumer()
    {
        $db_area = DbArea::query()
            ->find(self::getDefaultDBAreaId());

        $data = [
            "request" => [
                "db_area_code"       => $db_area->db_area_code,
                "request_name"       => "ConsumerCreate",
                "request_parameters" => [
                    "consumer" => [
                        "consumer_login"     => "Ivan",
                        "consumer_email"     => "a.anashkin.lardan@gmail.com",
                        "consumer_name"      => "Ivan",
                        "consumer_password"  => "123123",
                        "consumer_status_n"  => 0,
                        "consumer_type_code" => 0,
                        "first_name"         => "Иван",
                        "last_name"          => "Иванов",
                        "middle_name"        => "Иванович",
                        "male_l"             => 0,
                        "phone_number"       => "+380501234567",
                        "e_mail2"            => "",
                        "url_name"           => "",
                        "birth_date"         => "",
                        "consumer_check"     => "2"
                    ]
                ]
            ]
        ];

        $response = $this->json("POST", $this->url, $data, [
            "token" => $db_area->db_area_token
        ])->assertStatus(200)
            ->getOriginalContent();

        $consumer = Consumer::query()->where("consumer_code", $response["consumer"]["consumer_code"])->first();

        $this->assertNotNull($consumer);

        $this->assertEquals(1, $consumer->consumer_status_n);
    }
}
