<?php

namespace App\Http\Controllers\Signal;

use App\Http\Controllers\Api\BankNet\NetBanksController;
use App\Models\BankNet\BnCurrency;
use App\Models\BankNet\BnExchangeDirection;
use App\Models\BankNet\BnExchangeOffer;
use App\Models\BankNet\BnExchanger;
use App\Models\BankNet\BnPaymentMethod;
use App\Models\BankNet\BnPaymentMethodGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiNetBanksController extends Controller
{
    protected function index(Request $request)
    {

//            $rr = app('Illuminate\Http\Response')->getStatusCode();

            $reqArray = \GuzzleHttp\json_decode($request->getContent(), true);

            $exchange_offer_objects = [];
            $exchange_objects = [];
            $payment_method_objects = [];
            $currency_objects = [];
            $payment_methods_groups_objects = [];
            $exchange_direction_objects = [];
            foreach ($reqArray as $object_key => $object_value) {

                switch ($object_value['objectName']) {
                    case "ExchangeOffer" :
                        $exchange_offer_objects[] = $object_key = $object_value;
                        break;
                    case "Exchanger" :
                        $exchange_objects[$object_value['objectID']] = $object_key = $object_value;
                        break;
                    case "PaymentMethod" :
                        $payment_method_objects[$object_value['objectID']] = $object_key = $object_value;
                        break;
                    case "Currency" :
                        $currency_objects[$object_value['objectID']] = $object_key = $object_value;
                        break;
                    case "PaymentMethodsGroups" :
                        $payment_methods_groups_objects[$object_value['objectID']] = $object_key = $object_value;
                        break;
                    case "ExchangeDirection" :
                        $exchange_direction_objects[$object_value['object']['paymentMethodCode'] . $object_value['object']['paymentMethodGroupID'] . $object_value['object']['currencyCode']] = $object_key = $object_value;
                        break;
                }
            }
            if (!empty($exchange_offer_objects)) {
                $exchangerOffer = $this->exchangeOfferApi($exchange_offer_objects);
            }
            if (!empty($exchange_objects)) {
                $exchangerApi = $this->exchangerApi($exchange_objects);
            }
            if (!empty($payment_method_objects)) {
                $paymentMethodApi = $this->paymentMethodApi($payment_method_objects);
            }
            if (!empty($currency_objects)) {
                $currencyApi = $this->currencyApi($currency_objects);
            }
            if (!empty($payment_methods_groups_objects)) {
                $paymentMethodsGroupsApi = $this->paymentMethodsGroupsApi($payment_methods_groups_objects);
            }
            if (!empty($exchange_direction_objects)) {
                $exchangeDirectionApi = $this->exchangeDirectionApi($exchange_direction_objects);
            }




//        $status = [
//            'status' => [
//                'status_code' => "1",
//                'status_description' => $status_description ?? 'empty api payment methods groups',
//            ]
//        ];
//
//        $statusNew = [
//            'status' => [
//                'object_name' => "ExchangeOffer",
//                'status_code' => [
//                    '1' => [
//                        'object_id' => "17",
//                        'status_description' => 'create Exchange Offer',
//                    ],
//
//                    '0' => [
//
//                    ],
//                ],
//                'status_description' => $status_description ?? 'empty api payment methods groups',
//            ]
//        ];
//
//        return $status;
        }

    protected function exchangeOfferApi($exchange_offer_objects)
    {

        $services_db = BnExchangeOffer::get()->toArray();
        $get_services_db = [];
        foreach ($services_db as $services_db_key => $services_db_value) {
            $get_services_db[$services_db_value['id']] = $services_db_value;
        }

        foreach ($exchange_offer_objects as $key => $services) {

            if (!array_key_exists($services['objectID'], $get_services_db)) {
                $owner = $services['object']['owner'];
                $inputCurrency = $services['object']['inputCurrency'];
                $outputCurrency = $services['object']['outputCurrency'];
                $paymentMethodFrom = $services['object']['paymentMethodFrom'];
                $paymentMethodTo = $services['object']['paymentMethodTo'];

                $getIdServices = app()->call('App\Http\Controllers\Api\BankNet\NetBanksController@getIdServices',
                    [$owner, $inputCurrency, $outputCurrency, $paymentMethodFrom, $paymentMethodTo]);

                $services['id'] = $services['objectID'];
                $services['bn_exchanger_id'] = $getIdServices['exchanger_id'];
                $services['status_code'] = $services['object']['status'];
                $services['created_at'] = date("Y-m-d H:i:s", strtotime($services['object']['dateAdd']));
                $services['bn_currency_id_input'] = $getIdServices['input_currency_id'];
                $services['bn_currency_id_output'] = $getIdServices['output_currency_id'];
                $services['payment_method_id_input'] = $getIdServices['payment_method_from_id'];
                $services['payment_method_id_output'] = $getIdServices['payment_method_to_id'];
                $services['irrevocable_exchange_treshold_n'] = $services['object']['irrevocableExchangeTreshold'];
                $services['min_exchange_treshold_n'] = $services['object']['minExchangeTreshold'];
                $services['max_exchange_treshold_n'] = $services['object']['maxExchangeTreshold'];
                $services['transaction_security_percent_n'] = $services['object']['transactionSecurityPercent'];
                $services['calculated_rate_n'] = $services['object']['rate']['calculatedRate'];
                $services['payment_waiting_period_1'] = $services['object']['paymentWaitingPeriod1'];
                $services['payment_waiting_period_2'] = $services['object']['paymentWaitingPeriod2'];
                $services['payment_waiting_period_3'] = $services['object']['paymentWaitingPeriod3'];
                $services['payment_waiting_period_4'] = $services['object']['paymentWaitingPeriod4'];

                BnExchangeOffer::create($services);

                $status_description = "create services";
            }
        }

        //$exchange_offer_objects
        $this->exchangeOfferApiUpdate($exchange_offer_objects);
    }

    protected function exchangeOfferApiUpdate($exchange_offer_objects)
    {
        $services_update_db = BnExchangeOffer::get()->toArray();
        $get_services_update_db = [];
        foreach ($services_update_db as $services_db_key => $services_db_value) {
            $get_services_update_db[$services_db_value['id']] = $services_db_value;
        }

        foreach ($exchange_offer_objects as $key => $services) {

            if (array_key_exists($services['objectID'], $get_services_update_db)) {
                $owner = $services['object']['owner'];
                $inputCurrency = $services['object']['inputCurrency'];
                $outputCurrency = $services['object']['outputCurrency'];
                $paymentMethodFrom = $services['object']['paymentMethodFrom'];
                $paymentMethodTo = $services['object']['paymentMethodTo'];

                $getIdServices = app()->call('App\Http\Controllers\Api\BankNet\NetBanksController@getIdServices',
                    [$owner, $inputCurrency, $outputCurrency, $paymentMethodFrom, $paymentMethodTo]);

                BnExchangeOffer::where('id', $services['objectID'])
                    ->update(
                        [
                            'reserve_n' => '999', //test
                            'bn_exchanger_id' => $getIdServices['exchanger_id'],
                            'status_code' => $services['object']['status'],
                            'created_at' => date("Y-m-d H:i:s", strtotime($services['object']['dateAdd'])),
                            'bn_currency_id_input' => $getIdServices['input_currency_id'],
                            'bn_currency_id_output' => $getIdServices['output_currency_id'],
                            'payment_method_id_input' => $getIdServices['payment_method_from_id'],
                            'payment_method_id_output' => $getIdServices['payment_method_to_id'],
                            'irrevocable_exchange_treshold_n' => $services['object']['irrevocableExchangeTreshold'],
                            'min_exchange_treshold_n' => $services['object']['minExchangeTreshold'],
                            'max_exchange_treshold_n' => $services['object']['maxExchangeTreshold'],
                            'transaction_security_percent_n' => $services['object']['transactionSecurityPercent'],
                            'calculated_rate_n' => $services['object']['rate']['calculatedRate'],
                            'payment_waiting_period_1' => $services['object']['paymentWaitingPeriod1'],
                            'payment_waiting_period_2' => $services['object']['paymentWaitingPeriod2'],
                            'payment_waiting_period_3' => $services['object']['paymentWaitingPeriod3'],
                            'payment_waiting_period_4' => $services['object']['paymentWaitingPeriod4']
                        ]);

            }
        }

        $status_description = "updated services";

    }

    protected function exchangerApi($exchange_objects)
    {
        $get_bn_exchanger = BnExchanger::all()->toArray();

        $get_bn_exchanger_db = [];
        foreach ($get_bn_exchanger as $exchanger_key => $exchanger_value) {

            $get_bn_exchanger_db[$exchanger_value['id']] = $exchanger_value;
        }

        foreach ($exchange_objects as $bn_exchanger) {
            if (empty($get_bn_exchanger_db) or (!array_key_exists($bn_exchanger['objectID'], $get_bn_exchanger_db))) {
                $bn_exchanger['id'] = $bn_exchanger['objectID'];
                $bn_exchanger['exchanger_rating_n'] = $bn_exchanger['object']['rating'];
                $bn_exchanger['exchanger_name'] = $bn_exchanger['object']['profile']['exchangername'];

                BnExchanger::create($bn_exchanger);
            }
        }
        if (!empty($get_bn_exchanger)) {
            $this->exchangerApiUpdate($exchange_objects);
        }
    }

    protected function exchangerApiUpdate($exchange_objects)
    {
        $get_bn_exchanger = BnExchanger::all()->toArray();

        $get_bn_exchanger_db = [];
        foreach ($get_bn_exchanger as $exchanger_key => $exchanger_value) {

            $get_bn_exchanger_db[$exchanger_value['id']] = $exchanger_value;
        }

        foreach ($exchange_objects as $bn_exchanger) {

            if (array_key_exists($bn_exchanger['objectID'], $get_bn_exchanger_db)) {
                BnExchanger::where('id', $bn_exchanger['objectID'])->update(
                    [
                        'exchanger_rating_n' => $exchange_objects[$bn_exchanger['objectID']]['object']['rating'],
                        'exchanger_name' => $bn_exchanger['object']['profile']['exchangername'],
                        'created_by' => '555'
                    ]);
                $status_description = "updated exchangers";
            }
        }
    }

    protected function paymentMethodApi($payment_method_objects)
    {

        $get_payment_methods = BnPaymentMethod::all()->toArray();

        $get_payment_methods_db = [];
        foreach ($get_payment_methods as $get_objects_db_key => $get_objects_db_value) {

            $get_payment_methods_db[$get_objects_db_value['payment_method_code']] = $get_objects_db_value;
        }

        foreach ($payment_method_objects as $payment_method) {
            if (empty($get_payment_methods_db) or (!array_key_exists($payment_method['objectID'], $get_payment_methods_db))) {

                $payment_methods['payment_method_code'] = $payment_method['objectID'];
                $payment_methods['payment_method_name'] = $payment_method['object']['name'];

                BnPaymentMethod::create($payment_methods);
            }
        }

        if (!empty($get_payment_methods)) {

            $this->paymentMethodApiUpdate($payment_method_objects);
        }
    }

    protected function paymentMethodApiUpdate($payment_method_objects)
    {

        $get_payment_methods = BnPaymentMethod::all()->toArray();

        $get_payment_methods_db = [];
        foreach ($get_payment_methods as $get_objects_db_key => $get_objects_db_value) {

            $get_payment_methods_db[$get_objects_db_value['payment_method_code']] = $get_objects_db_value;
        }

        foreach ($get_payment_methods_db as $payment_methods_db) {

            if ((array_key_exists($payment_methods_db['payment_method_code'], $payment_method_objects))
                and (($payment_methods_db['payment_method_name']) !== $payment_method_objects[$payment_methods_db['payment_method_code']]['object']['name'])) {

                BnPaymentMethod::where('id', $payment_methods_db['id'])->update(
                    [
                        'payment_method_name' => $payment_method_objects[$payment_methods_db['payment_method_code']]['object']['name'],
//                        'created_by' => '55',
                    ]);
                $status_description = "updated payment methods";
            }
        }

    }

    protected function currencyApi($currency_objects)
    {

        $get_objects_db = BnCurrency::all()->toArray();

        $get_currencies_db = [];
        foreach ($get_objects_db as $get_objects_db_key => $get_objects_db_value) {

            $get_currencies_db[$get_objects_db_value['currency_code']] = $get_objects_db_value;
        }

        foreach ($currency_objects as $currencies) {
            if (empty($get_currencies_db) or (!array_key_exists($currencies['objectID'], $get_currencies_db))) {

                if (isset($currencies['object']['type']) and ($currencies['object']['type'] === "fiat")) {
                    $currency_type_n = 1;
                } else {
                    $currency_type_n = 2;
                }

                $currencies['currency_name'] = $currencies['object']['name'];
                $currencies['currency_code'] = $currencies['objectID'];
                $currencies['currency_type_n'] = $currency_type_n;
//                        $currencies['currency_symbol'] = 444;


                BnCurrency::create($currencies);

                $status_description = "create currencies";
            }
        }

        $this->currencyApiUpdate($currency_objects);
    }

    protected function currencyApiUpdate($currency_objects)
    {
        $get_objects_db = BnCurrency::all()->toArray();

        $get_currencies_db = [];
        foreach ($get_objects_db as $get_objects_db_key => $get_objects_db_value) {

            $get_currencies_db[$get_objects_db_value['currency_code']] = $get_objects_db_value;
        }

        foreach ($get_currencies_db as $get_currencies_db_key => $get_currencies_db_value) {

            if (array_key_exists($get_currencies_db_value['currency_code'], $currency_objects)) {

                if (($get_currencies_db_value['currency_name'] != $currency_objects[$get_currencies_db_value['currency_code']]['object']['name'])) {

                    BnCurrency::where('id', $get_currencies_db_value['id'])->update(
                        [
                            'currency_name' => $currency_objects[$get_currencies_db_value['currency_code']]['object']['name'],
                            //'currency_code_n' => 22,
                        ]);
                }

                $status_description = "updated currencies";
            }
        }
    }

    protected function paymentMethodsGroupsApi($payment_methods_groups_objects)
    {

        $payment_methods_groups = BnPaymentMethodGroup::get()->toArray();

        $get_payment_methods_groups_db = [];
        foreach ($payment_methods_groups as $methods_groups_key => $methods_groups_value) {

            $get_payment_methods_groups_db[$methods_groups_value['payment_method_group_code']] = $methods_groups_value;
        }


        foreach ($payment_methods_groups_objects as $payment_method_group_key => $payment_method_group_value) {
            if (empty($get_payment_methods_groups_db) or (!array_key_exists($payment_method_group_key, $get_payment_methods_groups_db))) {

                $payment_method_group['id'] = $payment_method_group_value['object']['paymentMethodGroupId'];
                $payment_method_group['payment_method_group_code'] = $payment_method_group_key;
                $payment_method_group['payment_method_group_name'] = $payment_method_group_value['object']['name'];
                $payment_method_group['description'] = $payment_method_group_value['object']['description'];
                $payment_method_group['position'] = $payment_method_group_value['object']['position'];

                BnPaymentMethodGroup::create($payment_method_group);

                $status_description = "create payment methods groups";
            }
        }

        if (!empty($get_payment_methods_groups_db)) {
            $status_description = $this->paymentMethodsGroupsApiUpdate($payment_methods_groups_objects);
        }


//        $status = [
//            'status' => [
//                'status_code' => "1",
//                'status_description' => $status_description ?? 'empty api payment methods groups',
//            ]
//        ];

        return $status_description;
    }

    protected function paymentMethodsGroupsApiUpdate($payment_methods_groups_objects)
    {

        $payment_methods_groups = BnPaymentMethodGroup::get()->toArray();

        $get_payment_methods_groups_db = [];
        foreach ($payment_methods_groups as $methods_groups_key => $methods_groups_value) {

            $get_payment_methods_groups_db[$methods_groups_value['payment_method_group_code']] = $methods_groups_value;
        }

        foreach ($get_payment_methods_groups_db as $payment_methods_groups_db_key => $payment_methods_groups_db_value) {
            if (array_key_exists($payment_methods_groups_db_key, $payment_methods_groups_objects)) {

                if (($payment_methods_groups_db_value['position'] != $payment_methods_groups_objects[$payment_methods_groups_db_value['payment_method_group_code']]['object']['position']) or
                    ($payment_methods_groups_db_value['description'] != $payment_methods_groups_objects[$payment_methods_groups_db_value['payment_method_group_code']]['object']['description']) or
                    ($payment_methods_groups_db_value['payment_method_group_name'] != $payment_methods_groups_objects[$payment_methods_groups_db_value['payment_method_group_code']]['object']['name'])
                ) {

                    BnPaymentMethodGroup::where('id', $payment_methods_groups_db_value['id'])->update([
                        'position' => $payment_methods_groups_objects[$payment_methods_groups_db_value['payment_method_group_code']]['object']['position'],
                        'description' => $payment_methods_groups_objects[$payment_methods_groups_db_value['payment_method_group_code']]['object']['description'],
                        'payment_method_group_name' => $payment_methods_groups_objects[$payment_methods_groups_db_value['payment_method_group_code']]['object']['name'],
//                        'created_by' => "444",
                    ]);

                    $status_description = "Updated successfully payment methods";
                }
            }
        }

        return $status_description;
    }

    protected function exchangeDirectionApi($exchange_direction_objects)
    {

        $array_exchange_direction_db = app()->call('App\Http\Controllers\Api\BankNet\NetBanksController@get_exchange_direction_db');

        $get_api_diff = array_diff_key($exchange_direction_objects, $array_exchange_direction_db);

        if (!empty($get_api_diff)) {
            foreach ($get_api_diff as $direction) {

                $bn_payment_method_id = BnPaymentMethod::select('id')->where('payment_method_code', $direction['object']['paymentMethodCode'])->get()->first();
                if (empty($bn_payment_method_id)) {
                    $bn_payment_method = new BnPaymentMethod();
                    $bn_payment_method->payment_method_code = $direction['object']['paymentMethodCode'];
                    $bn_payment_method->save();
                    $bn_payment_method_id = $bn_payment_method->id;

                    $exchange_direction['bn_payment_method_id'] = $bn_payment_method_id;
                }

                $bn_payment_method_group_id = BnPaymentMethodGroup::select('id')->where('payment_method_group_code', $direction['object']['paymentMethodGroupID'])->get()->first();
                if (empty($bn_payment_method_group_id)) {

                    $last_id = BnPaymentMethodGroup::latest()->first();

                    $bn_payment_method_group = new BnPaymentMethodGroup();
                    $bn_payment_method_group->id = $last_id['id'] + 1;
                    $bn_payment_method_group->payment_method_group_code = $direction['object']['paymentMethodGroupID'];
                    $bn_payment_method_group->save();
                    $bn_payment_method_group_id = $bn_payment_method_group->id;

                    $exchange_direction['bn_payment_method_group_id'] = $bn_payment_method_group_id;

                }

                $bn_currency_id = BnCurrency::select('id')->where('currency_code', $direction['object']['currencyCode'])->get()->first();

                if (empty($bn_currency_id)) {
                    $bn_currency = new BnCurrency();
                    $bn_currency->currency_code = $direction['object']['currencyCode'];
                    $bn_currency->save();
                    $bn_currency_id = $bn_currency->id;

                    $exchange_direction['bn_currency_id'] = $bn_currency_id;
                }

                $exchange_direction['bn_payment_method_id'] = $bn_payment_method_id['id'] ?? $bn_payment_method_id;
                $exchange_direction['bn_payment_method_group_id'] = $bn_payment_method_group_id['id'] ?? $bn_payment_method_group_id;
                $exchange_direction['bn_currency_id'] = $bn_currency_id['id'] ?? $bn_currency_id;
                $exchange_direction['exchange_direction_name'] = (string)$direction['object']['exchangeDirectionName'];

                BnExchangeDirection::create($exchange_direction);
            }
        }

        if (!empty($array_exchange_direction_db)) {

            $this->exchangeDirectionApiUpdate($exchange_direction_objects);
        }
    }

    protected function exchangeDirectionApiUpdate($exchange_direction_objects)
    {

        $direct_update = app()->call('App\Http\Controllers\Api\BankNet\NetBanksController@get_exchange_direction_db');

        foreach ($exchange_direction_objects as $api_short) {
            foreach ($direct_update as $direct) {

                if (
                    ($direct['paymentMethodGroupID'] == $api_short['object']['paymentMethodGroupID'])
                    and ($direct['currencyCode'] == $api_short['object']['currencyCode'])
                    and ($direct['paymentMethodCode'] == $api_short['object']['paymentMethodCode'])
                ) {
                    if ($direct['exchangeDirectionName'] !== $exchange_direction_objects[$direct['paymentMethodCode'] . $direct['paymentMethodGroupID'] . $direct['currencyCode']]['object']['exchangeDirectionName']) {

                        BnExchangeDirection::where('id', $direct['id'])
                            ->update(
                                [
//                                'exchange_direction_code' => '9977',
                                    'exchange_direction_name' => $exchange_direction_objects[$direct['paymentMethodCode'] . $direct['paymentMethodGroupID'] . $direct['currencyCode']]['object']['exchangeDirectionName'],
                                ]);
                    }
                }
            }
        }
    }
}
