<?php


namespace App\Http\Classes;


use App\Models\DbArea;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;

class OneC
{

    /**
     * @var ResponseInterface|mixed
     */
    protected $result;

    /**
     * @var array
     */
    protected $result_array;

    /**
     * Send request to 1C
     *
     * @param Collection|DbArea $db_area
     * @param string $url
     * @param array $data
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function sendRequest($db_area, $url = "/hs/api_for_wc/signal", $data)
    {
        if(is_null($db_area) || empty($db_area))
            throw new \Exception("db_area is null or empty");

        // Начинаем с http:// || https:// или пустой строчкой
        $server_url = ($db_area->dBase->serverDb->server_http_code !== "null")
            ? $db_area->dBase->serverDb->server_http_code
            : "";

        // Добавляем домен или айпи
        $server_url .= (!is_null($db_area->dBase->serverDb->server_url) && !empty(is_null($db_area->dBase->serverDb->server_url)))
            ? $db_area->dBase->serverDb->server_url
            : $db_area->dBase->serverDb->server_ip;

        // Добавляем порт (если установлен)
        if(!is_null($db_area->dBase->serverDb->server_port))
            $server_url .= ":" . $db_area->dBase->serverDb->server_port;


        $server_url .= '/' . $db_area->dBase->db_code;

        $host = request()->root();
        $host = preg_replace('#^https?://#', '', rtrim($host, '/'));
        $host = $db_area->dBase->serverDb->server_http_code . $host;
        $client = new Client();


        $this->result = $client->request('POST', $server_url . $url, [
            'json'    => $data,
            'headers' => [
                'token'   => $db_area->db_area_token,
                'Referer' => "$host",
            ],
        ]);

        $this->result_array = \GuzzleHttp\json_decode($this->result->getBody());

        return $this;
    }

    /**
     * @return mixed|ResponseInterface
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function getResultArray()
    {
        return $this->result_array;
    }

    public function testConnection()
    {

    }

}