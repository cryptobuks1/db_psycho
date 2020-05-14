<?php

namespace App\Jobs;

use App\Http\Classes\SignalManager;
use App\Http\Traits\DefaultSystemParams;
use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\Consumer;
use App\Models\Signal;
use App\Report;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;


class SendRequestSignal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $signal;

    public function __construct($signal)
    {
        $this->signal = $signal;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public $current_time = null;
    public $timer;

    public function handle(Request $request)  {

//        $saveTest = new Report();
//        $saveTest->user_id = '79';
//         $saveTest->report_name_en =  $this->signal;
//        $saveTest->save();

        $this->timer = microtime(true);
        $current_time = Carbon::now()->format("Y-m-d H:i:s");

        $getAllSignals = Signal::where('system_status_id', (integer) 1)
            ->get()
            ->sortBy('created_at')
            ->groupBy('db_area_id')
            ->toArray();

        /**
         * if table __Signals empty exit
         */
        if (empty($getAllSignals) ){
            exit('no signals');
        }

        if ( !empty($getAllSignals)){

            /**
             *  Сlear Table Log
             */
//            $logExpires =  self::getParameter('LogExpires');
            $logExpires = DefaultSystemParams::getParameter('LogExpires');
            ActionLog::where('created_at',  '<', Carbon::now()->subDays($logExpires)->toDateTimeString())->delete();
            /**
             * End Сlear Table Log
             */


            foreach ($getAllSignals as   $arrayGetAllSignal){
                foreach ($arrayGetAllSignal as $getAllSignal){
//                    $signal_id = $getAllSignal[0]['id'];
                    $signal_id = $getAllSignal['id'];

                    $consumer_code = $getAllSignal['created_by'];
                    $getConsumer = Consumer::where('consumer_code', $consumer_code)->first()->toArray();

                    $action_type_id = ActionType::where("action_type_code", "ExchangeOut")
                        ->select("id")->first(); // add new  action_type_code to table __ActionTypes ????!!!!

                    $getObject = SignalManager::getSignalData($signal_id);


                    if ($getAllSignal['system_status_id'] == (int)1 ){

                        $serverUrl = $getObject['server_url'] .':'. $getObject['server_port'] . '/' . $getObject['db_code'];
                        $host = request()->root();
                        $host = preg_replace('#^https?://#', '', rtrim($host, '/'));
                        $client = new Client();

                        try{

                            $this->current_time = $current_time;
//                            $res = $client->request('POST', $serverUrl . '/hs/api_for_wc/signal', [
//                                'json'    => $getObject['data'],
//                                'headers' => [
//                                    'token' =>$getObject['db_area_token'],
////                                'Referer' => "$host",
//                                    'Referer' => "127.0.0.1",
//                                ],
//                            ]);
//
                            $logArray = [
                                'controller_id' => $getObject['controller_id'],
                                'row_id' => $getObject['data']['request']['request_parameters']['objects_to_change'][0]['object_id'],
                                'consumer_id' => $getConsumer['id'],
                                'action_type_id' => $action_type_id["id"],
                                'action_log_error_l' => "",
                                'action_log_error_code' => "",
                                'created_by' => $getConsumer['consumer_code'],
                                'updated_by' => $getConsumer['consumer_code'],
                                'count' => 1,
                                'spent_time' => round(microtime(true) - $this->timer, 3),
                            ];

                            $res = \OneC::sendRequest($getObject["db_area"], "/hs/api_for_wc/signal", $getObject["data"])->getResult();

                            $resArray = \GuzzleHttp\json_decode($res->getBody());
                            $resArray = json_decode(json_encode($resArray), true);

                            $logArray['action_log_message'] = $resArray['status']['status_description'];


                            if ( $res->getStatusCode() == 408){

                                Signal::where('id', $signal_id)->update(
                                    [
                                        'signal_error_l' => (boolean)true,
                                        'signal_error_code' => 'Error',
                                        'signal_error_message' => "expired timeout",
                                    ]);

                                $logArray['action_log_error_l'] = (boolean)true;
                                $logArray['action_log_error_code'] = "Error";
                                $logArray['action_log_message'] = "expired timeout";
                                $logArray['remote_addr'] = $request->server('REMOTE_ADDR');
                                $logArray['http_referer'] = $request->server('HTTP_REFERER');
                                $logArray['redirect_url'] = $request->server('REDIRECT_URL');
                                $logArray['request_method'] = $request->server('REQUEST_METHOD');
                                $logArray['http_user_agent'] = $request->server('HTTP_USER_AGENT');

                                $logArray = ActionLog::create($logArray);

                                break 1;
                            }

                            if ($res->getStatusCode() == 200){
                                if($resArray['status']['status_code'] ==(int)0){

                                    Signal::where('id', $signal_id)->update(
                                        [
                                            'signal_error_l' => (boolean)true,
                                            'signal_error_code' => 'Error',
                                            'signal_error_message' => $resArray['status']['status_description'],
                                        ]);

                                    $logArray['action_log_error_l'] = (boolean)true;
                                    $logArray['action_log_error_code'] = "Error";
                                    $logArray['remote_addr'] = $request->server('REMOTE_ADDR');
                                    $logArray['http_referer'] = $request->server('HTTP_REFERER');
                                    $logArray['redirect_url'] = $request->server('REDIRECT_URL');
                                    $logArray['request_method'] = $request->server('REQUEST_METHOD');
                                    $logArray['http_user_agent'] = $request->server('HTTP_USER_AGENT');

                                    $logArray = ActionLog::create($logArray);

                                }

                                elseif( ($resArray['status']['status_code'] == (int)1) ){

                                    Signal::where('id', $signal_id)->update([
                                        'system_status_id' => (int)3,
                                        'signal_error_l' => (boolean)false,
                                        'signal_error_code' => 'Done',
                                        'signal_error_message' => null,
                                    ]);

                                    $logArray['action_log_error_l'] = (boolean)false;
                                    $logArray['action_log_error_code'] = "Done";
                                    $logArray['remote_addr'] = $request->server('REMOTE_ADDR');
                                    $logArray['http_referer'] = $request->server('HTTP_REFERER');
                                    $logArray['redirect_url'] = $request->server('REDIRECT_URL');
                                    $logArray['request_method'] = $request->server('REQUEST_METHOD');
                                    $logArray['http_user_agent'] = $request->server('HTTP_USER_AGENT');
//
                                    $logArray = ActionLog::create($logArray);
                                    $logId['id'] = $logArray['id'];
                                }

                                else{
                                    /**
                                     *if !isset  status_code
                                     */
                                    return
                                        [
                                            'status' => [
                                                'status_code' => "0",
                                                'status_description' => [
                                                    'object_type_code' => 'getStatusCode',
                                                    'description' => 'invalid getStatusCode'
                                                ]
                                            ]
                                        ];
                                }
                                continue;
                            }
                            break; // Если статус отличный от 200 и 408 Т.е. какая то лажа с отправкой запроса. Тогда этим break прерываем выполнение обмена.
                        }catch (\Exception $exception){
                            $error=[
                                "message" => $exception->getMessage(),
                                "getResponse" => $exception->getResponse()
                            ];

                            Signal::where('id', $signal_id)->update(
                                [
                                    'signal_error_l' => (boolean)true,
                                    'signal_error_code' => 'Error',
                                    'signal_error_message' => $exception->getMessage(),
                                ]);

                            if ($error['getResponse'] == null ){
                                $logArray['action_log_error_l'] = (boolean)true;
                                $logArray['action_log_error_code'] = "Error";
                                $logArray['action_log_message'] = $exception->getMessage();
                                $logArray['remote_addr'] = $request->server('REMOTE_ADDR');
                                $logArray['http_referer'] = $request->server('HTTP_REFERER');
                                $logArray['redirect_url'] = $request->server('REDIRECT_URL');
                                $logArray['request_method'] = $request->server('REQUEST_METHOD');
                                $logArray['http_user_agent'] = $request->server('HTTP_USER_AGENT');

                                $logArray = ActionLog::create($logArray);
                            }

                            break 1;
                        }
                    }
                }
            }
        }

//        $saveTest = new Report();
//        $saveTest->user_id = '77';
//        $saveTest->save();
    }

}
