<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class BankNet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bankNet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'BankNet API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $host = request()->root();
//        $host = preg_replace('#^https?://#', '', rtrim($host, '/'));
//        $test = 'http://'.$host.'/api/bank/net/get/currencies/fiat';

        $client = new Client();
//        $response = $client->request('POST', "http://dashboard-api.loc/api/bank/net/get/currencies/fiat");
//        $response = $client->request('POST', "http://dashboard-api.loc/api/bank/net/get/exchangers");



//        $response = $client->request('POST', "http://dashboard-api.loc/api/bank/net/get/payment/methods");
//        $response = $client->request('POST', "http://dashboard-api.loc/api/bank/net/get/currencies/fiat");
//        $response = $client->request('POST', "http://dashboard-api.loc/api/bank/net/get/payment/methods/groups");
//        $response = $client->request('POST', "http://dashboard-api.loc/api/bank/net/get/exchangers");
//        $response = $client->request('POST', "http://dashboard-api.loc/api/bank/net/get/directions");
//        $response = $client->request('POST', "http://dashboard-api.loc/api/bank/net/get/services");

        $response = $client->request('POST', "http://dev.banknet.club/api/bank/net/get/payment/methods");
        $response = $client->request('POST', "http://dev.banknet.club/api/bank/net/get/currencies/fiat");
        $response = $client->request('POST', "http://dev.banknet.club/api/bank/net/get/payment/methods/groups");
        $response = $client->request('POST', "http://dev.banknet.club/api/bank/net/get/exchangers");
        $response = $client->request('POST', "http://dev.banknet.club/api/bank/net/get/directions");
        $response = $client->request('POST', "http://dev.banknet.club/api/bank/net/get/services");

    }
}
