<?php

namespace App\Http\Controllers\Signal\BankNet;

use App\Models\BankNet\BnDataLog;
use App\Models\BankNet\BnSignal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BnDataLogsController extends Controller
{
    protected function index()
    {
        $get_all_objects_signal = BnSignal::all();

        $signal_json = [];
        foreach ($get_all_objects_signal as $object) {

            if ($object['status_n'] == 0) {
                $object_decode = json_decode($object['signal_json']);

                foreach ($object_decode as $item_key => $item_value) {
                    $item_value = json_decode(json_encode($item_value), true);

                    if ($item_value['objectName'] == "ExchangeDirection") {

                        $signal_json[$object['id']][$item_key] = $item_value;
                        $signal_json[$object['id']][$item_key]['objectID'] = $item_value['object']['paymentMethodCode'] . $item_value['object']['paymentMethodGroupID'] . $item_value['object']['currencyCode'];

                    } else {
                        $signal_json[$object['id']][$item_key] = $item_value;
                    }
                }
            }
        }

        $get_all_objects_data_log = BnDataLog::all();

        $signal_json_data_log = [];
        foreach ($get_all_objects_data_log as $object_data_log) {
            $signal_json_data_log[$object_data_log['objectID']] = json_decode($object_data_log['object_json'], true);
            array_push($signal_json_data_log[$object_data_log['objectID']], $object_data_log['id']);
        }

        if (!empty($signal_json)) {
            foreach ($signal_json as $signal_json_key => $signal_json_value) {
                foreach ($signal_json_value as $signal) {
                    if ((!array_key_exists($signal['objectID'], $signal_json_data_log))) {

                        $bn_data_logs = new BnDataLog;
                        $bn_data_logs->bn_signal_id = $signal_json_key;
                        $bn_data_logs->objectName = $signal['objectName'];
                        $bn_data_logs->objectID = $signal['objectID'];
                        $bn_data_logs->object_json = json_encode($signal['object'], true);
                        $bn_data_logs->status_n = 1;
                        $bn_data_logs->description = 1;
                        $bn_data_logs->save();

                        BnSignal::where('id', $bn_data_logs->bn_signal_id)->update(
                            [
                                'status_n' => 1,
                                'description' => "insert object successfully",
                            ]);
                    } elseif ((array_key_exists($signal['objectID'], $signal_json_data_log))) {

                        BnDataLog::where('id', $signal_json_data_log[$signal['objectID']][0])->update(
                            [
                                'object_json' => json_encode($signal['object'], true),
                                'status_n' => 2,
                                'description' => "updated object successfully",
                            ]);
                    }
                }

                BnSignal::where('id', $signal_json_key)->update(
                    [
                        'status_n' => 1,
                        'description' => "insert object successfully",
                    ]);
            }
        }

        return [
            'status' => [
                'status_code' => "1",
                'status_description' => 'object created/updated successfully',
            ]
        ];
    }
}
