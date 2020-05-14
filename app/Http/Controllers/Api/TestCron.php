<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\ConsumerParameters;
use App\Http\Classes\SignalManager;
use App\Http\Controllers\Api\Admin\ActionLogsTotalsController;
use App\Http\Traits\DefaultSystemParams;
use App\Models\ActionLog;
use App\Models\ActionLogsTotal;
use App\Models\ActionType;
use App\Models\ChangeRequest;
use App\Models\Consumer;
use App\Models\Log;
use App\Models\Signal;
use App\Report;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestCron extends Controller
{

    public $current_time = null;
    public $timer;

    public function cronSendSignal()
    {

        $this->timer = microtime(true);
        $current_time = Carbon::now()->format("Y-m-d H:i:s");


        $getAllSignals = Signal::where('system_status_id', (integer)1)
            ->get()
            ->sortBy('created_at')
            ->groupBy('db_area_id')
            ->toArray();

        /**
         * if table __Signals empty exit
         */
        if (empty($getAllSignals)) {
            exit('no signals');
        }

        if (!empty($getAllSignals)) {

            /**
             *  Сlear Table Log
             */
            $logExpires = self::getParameter('LogExpires');
            ActionLog::where('created_at', '<', Carbon::now()->subDays($logExpires)->toDateTimeString())->delete();
            /**
             * End Сlear Table Log
             */


            foreach ($getAllSignals as $arrayGetAllSignal) {
                foreach ($arrayGetAllSignal as $getAllSignal) {
//                    $signal_id = $getAllSignal[0]['id'];
                    $signal_id = $getAllSignal['id'];

                    $consumer_code = $getAllSignal['created_by'];
                    $getConsumer = Consumer::where('consumer_code', $consumer_code)->first()->toArray();

                    $action_type_id = ActionType::where("action_type_code", "ExchangeOut")
                        ->select("id")->first(); // add new  action_type_code to table __ActionTypes ????!!!!

                    $getObject = SignalManager::getSignalData($signal_id);


                    if ($getAllSignal['system_status_id'] == (int)1) {

                        $serverUrl = $getObject['server_url'] . ':' . $getObject['server_port'] . '/' . $getObject['db_code'];
                        $host = request()->root();
                        $host = preg_replace('#^https?://#', '', rtrim($host, '/'));
                        $client = new Client();

                        try {

                            $this->current_time = $current_time;

                            $res = $client->request('POST', $serverUrl . '/hs/api_for_wc/signal', [
                                'json' => $getObject['data'],
                                'headers' => [
                                    'token' => $getObject['db_area_token'],
//                                'Referer' => "$host",
                                    'Referer' => "127.0.0.1",
                                ],
                            ]);

                            $resArray = \GuzzleHttp\json_decode($res->getBody());
                            $resArray = json_decode(json_encode($resArray), true);

                            $logArray = [
                                'controller_id' => $getObject['controller_id'],
                                'row_id' => $getObject['data']['request']['request_parameters']['objects_to_change'][0]['object_id'],
                                'consumer_id' => $getConsumer['id'],
                                'action_type_id' => $action_type_id["id"],
                                'action_log_error_l' => "",
                                'action_log_error_code' => "",
                                'action_log_message' => $resArray['status']['status_description'],
                                'created_by' => $getConsumer['consumer_code'],
                                'updated_by' => $getConsumer['consumer_code'],
                                'count' => 1,
                                'spent_time' => round(microtime(true) - $this->timer, 3),
                            ];

                            if ($res->getStatusCode() == 408) {


                                $logArray['action_log_error_l'] = (boolean)true;
                                $logArray['action_log_error_code'] = "Error";
                                $logArray['action_log_message'] = "expired timeout";

                                $logArray = ActionLog::create($logArray);

                                break 1;
                            }

                            if ($res->getStatusCode() == 200) {
                                if ($resArray['status']['status_code'] == (int)0) {

                                    Signal::where('id', $signal_id)->update(
                                        [
                                            'signal_error_l' => (boolean)true,
                                            'signal_error_code' => 'Error',
                                            'signal_error_message' => $resArray['status']['status_description'],
                                        ]);

                                    $logArray['action_log_error_l'] = (boolean)true;
                                    $logArray['action_log_error_code'] = "Error";

                                    $logArray = ActionLog::create($logArray);

                                    break 1;
                                } elseif (($resArray['status']['status_code'] == (int)1)) {

                                    Signal::where('id', $signal_id)->update([
                                        'system_status_id' => (int)3,
                                        'signal_error_l' => (boolean)false,
                                        'signal_error_code' => 'Done',
                                        'signal_error_message' => null,
                                    ]);

                                    $logArray['action_log_error_l'] = (boolean)false;
                                    $logArray['action_log_error_code'] = "Done";
//
                                    $logArray = ActionLog::create($logArray);
                                    $logId['id'] = $logArray['id'];
                                } else {
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

                        } catch (\Exception $exception) {
                            $error = [
                                "message" => $exception->getMessage(),
                                "getResponse" => $exception->getResponse()
                            ];

                            if ($error['getResponse'] == null) {
                                $logArray['action_log_error_l'] = (boolean)true;
                                $logArray['action_log_error_code'] = "Error";
                                $logArray['action_log_message'] = $exception->getMessage();

                                $logArray = ActionLog::create($logArray);
                            }

                            break 1;
                        }
                    }
                }
            }
        }

//    return $this->info('its cron works!');
        return 'its cron works!';
    }


    public function cronActionLogsTotal()
    {
        $statisticActionLog = ActionLog::query()
            ->where('action_type_id', 26)
            ->where('action_log_error_l', false)
            ->whereDate(DB::raw("Date(created_at)"), "=", date('Y-m-d', strtotime("-1 days")))
            ->groupBy('controller_id', 'action_type_id', 'date')
//            ->union($this->statisticCurrentDay())
            ->get([
                "__ActionLogs.controller_id",
                "__ActionLogs.action_type_id",
                DB::raw("Date(created_at) as date"),
                DB::raw("count(*) as count"),
            ])->first();

        if (!empty($statisticActionLog)) {

            $insertStatisticActionLog[] = [
                'controller_id' => $statisticActionLog['controller_id'],
                'action_type_id' => $statisticActionLog['action_type_id'],
                'count' => $statisticActionLog['count'],
                'date' => $statisticActionLog['date'],
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => (\Carbon\Carbon::now())->toDateTimeString(),
                'updated_at' => (\Carbon\Carbon::now())->toDateTimeString(),
            ];
            ActionLogsTotal::insert($insertStatisticActionLog);
        }

        else {

            $insertStatisticActionLog[] = [
                'controller_id' => 32,
                'action_type_id' => 26,
                'count' => 0,
                'date' => $statisticActionLog['date'],
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => (\Carbon\Carbon::now())->toDateTimeString(),
                'updated_at' => (\Carbon\Carbon::now())->toDateTimeString(),
            ];
            ActionLogsTotal::insert($insertStatisticActionLog);
        }



//        return $this->info('its works statistics!');
        return "ok";
    }

    public function cron(){

        $ChangeRequestGet = ChangeRequest::with('changeRequestController.changeRequestControllerField.changeRequestControllerFieldValue')
            ->where('id', 1)->get()->toArray();

        return $ChangeRequestGet;
    }

    public function queueTest(){
//        $a = "Ivan";

        $saveTest = new Report();
        $saveTest->user_id = '777';
        $saveTest->save();
//        sleep(2);
//        return $a;
//        return back();

//        sleep(1000);
//        $b = 'sleep';

    }

}
