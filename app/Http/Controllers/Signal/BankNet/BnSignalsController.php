<?php

namespace App\Http\Controllers\Signal\BankNet;

use App\Models\BankNet\BnSignal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BnSignalsController extends Controller
{
    protected function index(Request $request)
    {

        try {
            $reqArray = \GuzzleHttp\json_decode($request->getContent(), true);

            $bn_signal = new BnSignal();
            $bn_signal->signal_json = json_encode($reqArray);
            $bn_signal->status_n = 0;
            $bn_signal->description = 0;
            $bn_signal->save();

            return [
                'status' => [
                    'status_code' => "1",
                    'status_description' => 'received object successfully',
                ]
            ];

        } catch (\Exception $exception) {

            $bn_signal = new BnSignal();
            $bn_signal->signal_json = $request->getContent();
            $bn_signal->status_n = -1;
            $bn_signal->description = $exception->getMessage() ?? "Ошибка";
            $bn_signal->save();

            return response()->json([

                'status' => [
                    'status_code' => "-1",
                    'status_description' => $exception->getMessage() ?? "Ошибка",
                ]
            ], 400);
        }
    }
}
