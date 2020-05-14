<?php

namespace App\Http\Controllers\Api\BankNet;

use App\Http\Traits\HasList;
use App\Models\BankNet\BnCurrency;
use App\Models\BankNet\BnExchangeDirection;
use App\Models\BankNet\BnExchangeOffer;
use App\Models\BankNet\BnExchanger;
use App\Models\BankNet\BnPaymentMethod;
use App\Models\BankNet\BnPaymentMethodGroup;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class NetBanksController extends Controller
{
//    use HasList;
    private $res;
    private $status_description;

//$texts = (new \App\Http\Controllers\TabTranslation\TranslationCaptionsController())->translations();

    public function newClient($url)
    {
//        try {
//
//            $client = new Client();
//            $this->res = $client->get('http://195.138.82.202:8083.' . $url);
//
//            $get_api_array = \GuzzleHttp\json_decode($this->res->getBody());
//            $get_api_array = json_decode(json_encode($get_api_array), true);
//
//            return $get_api_array;
//
//        } catch (\Exception $exception) {
//
//            return response()->json([
//                'status' => [
//                    'status_code' => "-1",
//                    'status_description' => $exception->getMessage() ?? "Ошибка",
//                ]
//            ], 408);
//
//        }

        $client = new Client();
        $this->res = $client->get('http://195.138.82.202:8083.' . $url);

        $get_api_array = \GuzzleHttp\json_decode($this->res->getBody());
        $get_api_array = json_decode(json_encode($get_api_array), true);

        return $get_api_array;
    }

    public function paymentMethods()
    {
        $url = '/api/currencies/payment-methods';
        $get_api_payment_methods = $this->newClient($url);

        if ($this->res->getStatusCode() == 200) {

            $get_payment_methods = BnPaymentMethod::all()->toArray();

            $get_payment_methods_db = [];
            foreach ($get_payment_methods as $get_objects_db_key => $get_objects_db_value) {

                $get_payment_methods_db[$get_objects_db_value['payment_method_code']] = $get_objects_db_value;
            }

            foreach ($get_api_payment_methods as $payment_method) {
                if (empty($get_payment_methods_db) or (!array_key_exists($payment_method['paymentMethodCode'], $get_payment_methods_db))) {

                    $payment_methods['payment_method_code'] = $payment_method['paymentMethodCode'];
                    $payment_methods['payment_method_name'] = $payment_method['name'];

                    BnPaymentMethod::create($payment_methods);

                    $status_description = "create payment methods";
                }
            }

            if (!empty($get_payment_methods)) {

                $this->status_description = $this->paymentMethodsUpdate($get_api_payment_methods);
            }


            return [
                'status' => [
                    'status_code' => "1",
                    'status_description' => $this->status_description ?? 'empty api payment methods',
                ]
            ];

        }
    }

    public function paymentMethodsUpdate($get_api_payment_methods)
    {
        $get_payment_methods = BnPaymentMethod::all()->toArray();

        $get_payment_methods_db = [];
        foreach ($get_payment_methods as $get_objects_db_key => $get_objects_db_value) {

            $get_payment_methods_db[$get_objects_db_value['payment_method_code']] = $get_objects_db_value;
        }

        foreach ($get_payment_methods_db as $payment_methods_db) {

            if ((array_key_exists($payment_methods_db['payment_method_code'], $get_api_payment_methods))
                and (($payment_methods_db['payment_method_name']) !== $get_api_payment_methods[$payment_methods_db['payment_method_code']]['name'])) {

                BnPaymentMethod::where('id', $payment_methods_db['id'])->update(
                    [
                        'payment_method_name' => $get_api_payment_methods[$payment_methods_db['payment_method_code']]['name'],
//                        'created_by' => '55',
                    ]);
                $this->status_description = "updated payment methods";
            }
        }

        return $this->status_description ?? 'empty api payment methods';

    }

    public function currenciesFiat()
    {
        $url_fiat_crypt = ['/api/currencies/fiat', '/api/currencies/crypt'];

        foreach ($url_fiat_crypt as $url) {

            $get_api = $this->newClient($url);

            if ($this->res->getStatusCode() == 200) {
                $get_objects_db = BnCurrency::all()->toArray();

                $get_currencies_db = [];
                foreach ($get_objects_db as $get_objects_db_key => $get_objects_db_value) {

                    $get_currencies_db[$get_objects_db_value['currency_code']] = $get_objects_db_value;
                }

                foreach ($get_api as $currencies) {
                    if (empty($get_currencies_db) or (!array_key_exists($currencies['currencyCode'], $get_currencies_db))) {

                        if (isset($currencies['type']) and ($currencies['type'] === "fiat")) {
                            $currency_type_n = 1;
                        } else {
                            $currency_type_n = 2;
                        }


                        $currencies['currency_name'] = $currencies['name'];
                        $currencies['currency_code'] = $currencies['currencyCode'];
                        $currencies['currency_type_n'] = $currency_type_n;
//                        $currencies['currency_symbol'] = 444;


                        BnCurrency::create($currencies);

                        $this->status_description = "create currencies";
                    }
                }

                $this->status_description = $this->currenciesFiatUpdate($get_api);
            }
        }

        $status = [
            'status' => [
                'status_code' => "1",
                'status_description' => $this->status_description ?? 'empty currencies',
            ]
        ];

        return $status;
    }

    public function currenciesFiatUpdate($get_api)
    {

        $get_objects_db = BnCurrency::all()->toArray();

        $get_currencies_db = [];
        foreach ($get_objects_db as $get_objects_db_key => $get_objects_db_value) {

            $get_currencies_db[$get_objects_db_value['currency_code']] = $get_objects_db_value;
        }

        foreach ($get_currencies_db as $get_currencies_db_key => $get_currencies_db_value) {

            if (array_key_exists($get_currencies_db_value['currency_code'], $get_api) and

                ($get_currencies_db_value['currency_name'] !== $get_api[$get_currencies_db_value['currency_code']]['name'])) {

                BnCurrency::where('id', $get_currencies_db_value['id'])->update(
                    [
                        'currency_name' => $get_api[$get_currencies_db_value['currency_code']]['name'],
                    ]);

                $this->status_description = "updated currencies";
            }
        }
        return $this->status_description;
    }

    public function paymentMethodsGroups()
    {
        $url = '/api/currencies/payment-methods-groups';
        $get_api = $this->newClient($url);

        if ($this->res->getStatusCode() == 200) {

            $payment_methods_groups = BnPaymentMethodGroup::get()->toArray();

            $get_payment_methods_groups_db = [];
            foreach ($payment_methods_groups as $methods_groups_key => $methods_groups_value) {

                $get_payment_methods_groups_db[$methods_groups_value['payment_method_group_code']] = $methods_groups_value;
            }


            foreach ($get_api as $payment_method_group_key => $payment_method_group_value) {
                if (empty($get_payment_methods_groups_db) or (!array_key_exists($payment_method_group_key, $get_payment_methods_groups_db))) {

                    $payment_method_group['id'] = (int)$payment_method_group_value['paymentMethodGroupId'];
                    $payment_method_group['payment_method_group_code'] = $payment_method_group_key;
                    $payment_method_group['payment_method_group_name'] = $payment_method_group_value['name'];
                    $payment_method_group['description'] = $payment_method_group_value['description'];
                    $payment_method_group['position'] = (int)$payment_method_group_value['position'];

                    BnPaymentMethodGroup::create($payment_method_group);

                    $this->status_description = "create payment methods groups";
                }
            }

            if (!empty($get_payment_methods_groups_db)) {
                $this->status_description = $this->paymentMethodsGroupsUpdate($get_api);
            }

            return [
                'status' => [
                    'status_code' => "1",
                    'status_description' => $this->status_description ?? 'empty api payment methods groups',
                ]
            ];
        }
    }

    public function paymentMethodsGroupsUpdate($get_api)
    {
        $payment_methods_groups = BnPaymentMethodGroup::get()->toArray();

        $get_payment_methods_groups_db = [];
        foreach ($payment_methods_groups as $methods_groups_key => $methods_groups_value) {

            $get_payment_methods_groups_db[$methods_groups_value['payment_method_group_code']] = $methods_groups_value;
        }

        foreach ($get_payment_methods_groups_db as $payment_methods_groups_db_key => $payment_methods_groups_db_value) {
            if (array_key_exists($payment_methods_groups_db_key, $get_api)) {
                if (($payment_methods_groups_db_value['position'] != $get_api[$payment_methods_groups_db_key]['position']) or
                    ($payment_methods_groups_db_value['description'] != $get_api[$payment_methods_groups_db_key]['description']) or
                    ($payment_methods_groups_db_value['payment_method_group_name'] != $get_api[$payment_methods_groups_db_key]['name'])) {

                    BnPaymentMethodGroup::where('id', $payment_methods_groups_db_value['id'])->update(
                        [
                            'position' => $get_api[$payment_methods_groups_db_key]['position'],
                            'description' => $get_api[$payment_methods_groups_db_key]['description'],
                            'payment_method_group_name' => $get_api[$payment_methods_groups_db_key]['name'],
//                        'created_by' => "22",
                        ]);

                    $this->status_description = "updated payment methods";
                }
            }
        }
        return $this->status_description ?? 'empty api payment methods groups';
    }

    public function exchangers()
    {
        $url = '/api/exchangers';
        $get_api = $this->newClient($url);

        $get_api_bn_exchanger = [];
        foreach ($get_api as $get_api_key => $get_api_value) {

            $get_api_bn_exchanger[$get_api_value['_creator']] = $get_api_value;
        }

        if ($this->res->getStatusCode() == 200) {
            $get_bn_exchanger = BnExchanger::all()->toArray();

            $get_bn_exchanger_db = [];
            foreach ($get_bn_exchanger as $exchanger_key => $exchanger_value) {

                $get_bn_exchanger_db[$exchanger_value['id']] = $exchanger_value;
            }

            foreach ($get_api as $bn_exchanger) {
                if (empty($get_bn_exchanger_db) or (!array_key_exists($bn_exchanger['_creator'], $get_bn_exchanger_db))) {
                    $bn_exchanger['id'] = $bn_exchanger['_creator'];
                    $bn_exchanger['exchanger_rating_n'] = $bn_exchanger['rating'];
                    $bn_exchanger['exchanger_name'] = $bn_exchanger['profile']['exchangername'];

                    BnExchanger::create($bn_exchanger);

                    $this->status_description = "create exchangers";
                }
            }

            if (!empty($get_bn_exchanger)) {
                $this->status_description = $this->exchangersUpdate($get_api_bn_exchanger);
            }
        }

        return [
            'status' => [
                'status_code' => "1",
                'status_description' => $this->status_description ?? 'empty api exchangers',
            ]
        ];

    }

    public function exchangersUpdate($get_api_bn_exchanger)
    {

        $get_bn_exchanger = BnExchanger::all()->toArray();

        $get_bn_exchanger_db = [];
        foreach ($get_bn_exchanger as $exchanger_key => $exchanger_value) {

            $get_bn_exchanger_db[$exchanger_value['id']] = $exchanger_value;
        }
        foreach ($get_bn_exchanger_db as $bn_exchanger) {

            if (array_key_exists($bn_exchanger['id'], $get_api_bn_exchanger)) {

                if (($bn_exchanger['exchanger_rating_n'] != $get_api_bn_exchanger[$bn_exchanger['id']]['rating']) or
                    ($bn_exchanger['exchanger_name'] != $get_api_bn_exchanger[$bn_exchanger['id']]['profile']['exchangername'])

                ) {
                    BnExchanger::where('id', $bn_exchanger['id'])->update(
                        [
                            'exchanger_rating_n' => $get_api_bn_exchanger[$bn_exchanger['id']]['rating'],
                            'exchanger_name' => $get_api_bn_exchanger[$bn_exchanger['id']]['profile']['exchangername'],
                        ]);
                    $this->status_description = "updated exchangers";
                }
            }
        }

        return $this->status_description ?? 'empty api exchangers';
    }

    public function directions()
    {
        $url = '/api/directions';
        $get_api = $this->newClient($url);

        if ($this->res->getStatusCode() == 200) {
            $array_exchange_direction_db = $this->get_exchange_direction_db();

            $get_api_short = [];
            foreach ($get_api as $api_key => $api_value) {
                foreach ($api_value as $item_key => $item_value) {
                    $get_api_short[$item_value['paymentMethodCode'] . $item_value['paymentMethodGroupID'] . $item_value['currencyCode']] = $item_value;
                }
            }

            $get_api_diff = array_diff_key($get_api_short, $array_exchange_direction_db);

            if (!empty($get_api_diff)) {
                foreach ($get_api_diff as $direction) {

                    $bn_payment_method_id = BnPaymentMethod::select('id')->where('payment_method_code', $direction['paymentMethodCode'])->get()->first();
                    $bn_payment_method_group_id = BnPaymentMethodGroup::select('id')->where('payment_method_group_code', $direction['paymentMethodGroupID'])->get()->first();
                    $bn_currency_id = BnCurrency::select('id')->where('currency_code', $direction['currencyCode'])->get()->first();

                    $exchange_direction['bn_payment_method_id'] = $bn_payment_method_id['id'];
                    $exchange_direction['bn_payment_method_group_id'] = $bn_payment_method_group_id['id'];
                    $exchange_direction['bn_currency_id'] = $bn_currency_id['id'];
                    $exchange_direction['exchange_direction_name'] = (string)$direction['exchangeDirectionName'];

                    BnExchangeDirection::create($exchange_direction);

                    $this->status_description = "create exchange directions";
                }
            }


            if (!empty($array_exchange_direction_db)) {

                $this->status_description = $this->directionsUpdate($get_api_short);
            }
        }

        return [
            'status' => [
                'status_code' => "1",
                'status_description' => $this->status_description,
            ]
        ];
    }

    public function get_exchange_direction_db()
    {
        $get_exchange_direction_db = DB::table('bnExchangeDirections')
            ->leftJoin('bnPaymentMethods', 'bnPaymentMethods.id', '=', 'bnExchangeDirections.bn_payment_method_id')
            ->leftJoin('bnPaymentMethodGroups', 'bnPaymentMethodGroups.id', '=', 'bnExchangeDirections.bn_payment_method_group_id')
            ->leftJoin('bnCurrencies', 'bnCurrencies.id', '=', 'bnExchangeDirections.bn_currency_id')
            ->select('bnExchangeDirections.id', 'bnExchangeDirections.bn_payment_method_group_id', 'bnExchangeDirections.exchange_direction_name',
                'bnPaymentMethods.payment_method_code',
                'bnPaymentMethodGroups.payment_method_group_code', 'bnCurrencies.currency_code')
            ->get()->groupBy('bn_payment_method_group_id')
            ->toArray();

        $get_exchange_direction_db = json_decode(json_encode($get_exchange_direction_db), true);

        $array_exchange_direction_db = [];
        foreach ($get_exchange_direction_db as $key => $value) {
            foreach ($value as $value_kye => $item) {
                if ($item['payment_method_code'] === null) {
                    $payment_method_code = "";
                } else {
                    $payment_method_code = $item['payment_method_code'];
                }

                $array_exchange_direction_db[$payment_method_code . $item['payment_method_group_code'] . $item['currency_code']] = [
                    "id" => $item['id'],
                    "paymentMethodCode" => $payment_method_code,
                    "bn_payment_method_group_id" => $item['bn_payment_method_group_id'],
                    "paymentMethodGroupID" => $item['payment_method_group_code'],
                    "currencyCode" => $item['currency_code'],
                    "exchangeDirectionName" => $item['exchange_direction_name'],
                ];
            }
        }
        return $array_exchange_direction_db;
    }

    public function directionsUpdate($get_api_short)
    {
        $direct_update = $this->get_exchange_direction_db();

        foreach ($get_api_short as $api_short) {
            foreach ($direct_update as $direct) {

                if (
                    ($direct['paymentMethodGroupID'] == $api_short['paymentMethodGroupID'])
                    and ($direct['currencyCode'] == $api_short['currencyCode'])
                    and ($direct['paymentMethodCode'] == $api_short['paymentMethodCode'])
                ) {
                    if ($direct['exchangeDirectionName'] != $api_short['exchangeDirectionName']) {


                        BnExchangeDirection::where('id', $direct['id'])
                            ->update(
                                [
//                                'exchange_direction_code' => '22',
                                    'exchange_direction_name' => $api_short['exchangeDirectionName'],
                                ]);

                        $this->status_description = "updated exchange direction";
                    }
                }
            }
        }

        return $this->status_description ?? "empty exchange direction";
    }

    public function services()
    {
        $url = '/api/services';
        $get_api = $this->newClient($url);

        if ($this->res->getStatusCode() == 200) {

            $get_api_services = [];
            foreach ($get_api as $api_key => $api_value) {
                $get_api_services[$api_value['id']] = $api_value;
            }

//            $services_db = BnExchangeOffer::get()->toArray();

            $services_db = BnExchangeOffer::get()->toArray();


            $get_services_db = [];
            foreach ($services_db as $services_db_key => $services_db_value) {
                $get_services_db[$services_db_value['id']] = $services_db_value;
            }

            foreach ($get_api_services as $key => $services) {

                if (!array_key_exists($services['id'], $get_services_db)) {
                    $owner = $services['data']['owner'];
                    $inputCurrency = $services['data']['inputCurrency'];
                    $outputCurrency = $services['data']['outputCurrency'];
                    $paymentMethodFrom = $services['data']['paymentMethodFrom'];
                    $paymentMethodTo = $services['data']['paymentMethodTo'];

                    $getIdServices = $this->getIdServices($owner, $inputCurrency, $outputCurrency, $paymentMethodFrom, $paymentMethodTo);

                    $services1['id'] = $services['id'];
                    $services1['bn_exchanger_id'] = $getIdServices['exchanger_id'];
                    $services1['status_code'] = $services['status'];
                    $services1['created_at'] = date("Y-m-d H:i:s", strtotime($services['data']['dateAdd']));
                    $services1['bn_currency_id_input'] = $getIdServices['input_currency_id'];
                    $services1['bn_currency_id_output'] = $getIdServices['output_currency_id'];
                    $services1['payment_method_id_input'] = $getIdServices['payment_method_from_id'];
                    $services1['payment_method_id_output'] = $getIdServices['payment_method_to_id'];
                    $services1['irrevocable_exchange_treshold_n'] = $services['data']['irrevocableExchangeTreshold'];
                    $services1['min_exchange_treshold_n'] = $services['data']['minExchangeTreshold'];
                    $services1['max_exchange_treshold_n'] = $services['data']['maxExchangeTreshold'];
                    $services1['transaction_security_percent_n'] = $services['data']['transactionSecurityPercent'];
                    $services1['calculated_rate_n'] = $services['data']['rate']['calculatedRate'];
                    $services1['payment_waiting_period_1'] = $services['data']['paymentWaitingPeriod1'];
                    $services1['payment_waiting_period_2'] = $services['data']['paymentWaitingPeriod2'];
                    $services1['payment_waiting_period_3'] = $services['data']['paymentWaitingPeriod3'];
                    $services1['payment_waiting_period_4'] = $services['data']['paymentWaitingPeriod4'];

                    BnExchangeOffer::create($services1);

                    $this->status_description = "create services";
                }
            }

            $this->status_description = $this->servicesUpdate($get_api_services);
        }

        return [
            'status' => [
                'status_code' => "1",
                'status_description' => $this->status_description,
            ]
        ];
    }

    public function getIdServices($owner, $inputCurrency, $outputCurrency, $paymentMethodFrom, $paymentMethodTo)
    {
        $input_output_id = BnCurrency::select('id','currency_code')->where('currency_code', $inputCurrency)
            ->orWhere('currency_code', $outputCurrency)->get()->toArray();

        $exchanger_id = BnExchanger::select('id')->where('id', $owner)->get()->first();

        $payment_methods = BnPaymentMethod::select('id','payment_method_code')
            ->where('payment_method_code', $paymentMethodFrom)
            ->orWhere('payment_method_code', $paymentMethodTo)->get()->toArray();

//        $input_currency_id = BnCurrency::select('id')->where('currency_code', $inputCurrency)
//            ->get()->first();
//
//        $output_currency_id = BnCurrency::select('id')->where('currency_code', $outputCurrency)
//            ->get()->first();

//        $payment_method_from_id = BnPaymentMethod::select('id')
//            ->where('payment_method_code', $paymentMethodFrom)->get()->first();
//
//        $payment_method_to_id = BnPaymentMethod::select('id')
//            ->where('payment_method_code', $paymentMethodTo)->get()->first();

        return [
            "exchanger_id" => $exchanger_id['id'], "input_currency_id" => $input_output_id[0]['id'], "output_currency_id" => $input_output_id[1]['id'] ?? $input_output_id[0]['id'] ?? null
            , "payment_method_from_id" => $payment_methods[0]['id'] ?? null, "payment_method_to_id" => $payment_methods[1]['id'] ?? $payment_methods[0]['id'] ?? null
        ];
    }

    public function servicesUpdate($get_api_services)
    {
        $services_update_db = BnExchangeOffer::get()->toArray();
        $get_services_update_db = [];
        foreach ($services_update_db as $services_db_key => $services_db_value) {
            $get_services_update_db[$services_db_value['id']] = $services_db_value;
        }

        foreach ($get_api_services as $key => $services) {

            if (array_key_exists($services['id'], $get_services_update_db)) {
                $owner = $services['data']['owner'];
                $inputCurrency = $services['data']['inputCurrency'];
                $outputCurrency = $services['data']['outputCurrency'];
                $paymentMethodFrom = $services['data']['paymentMethodFrom'];
                $paymentMethodTo = $services['data']['paymentMethodTo'];

                $getIdServices = $this->getIdServices($owner, $inputCurrency, $outputCurrency, $paymentMethodFrom, $paymentMethodTo);

                BnExchangeOffer::where('id', $services['id'])
                    ->update(
                        [
                            'reserve_n' => '999', //test
                            'bn_exchanger_id' => $getIdServices['exchanger_id'],
                            'status_code' => $services['status'],
                            'created_at' => date("Y-m-d H:i:s", strtotime($services['data']['dateAdd'])),
                            'bn_currency_id_input' => $getIdServices['input_currency_id'],
                            'bn_currency_id_output' => $getIdServices['output_currency_id'],
                            'payment_method_id_input' => $getIdServices['payment_method_from_id'],
                            'payment_method_id_output' => $getIdServices['payment_method_to_id'],
                            'irrevocable_exchange_treshold_n' => $services['data']['irrevocableExchangeTreshold'],
                            'min_exchange_treshold_n' => $services['data']['minExchangeTreshold'],
                            'max_exchange_treshold_n' => $services['data']['maxExchangeTreshold'],
                            'transaction_security_percent_n' => $services['data']['transactionSecurityPercent'],
                            'payment_waiting_period_1' => $services['data']['paymentWaitingPeriod1'],
                            'payment_waiting_period_2' => $services['data']['paymentWaitingPeriod2'],
                            'payment_waiting_period_3' => $services['data']['paymentWaitingPeriod3'],
                            'payment_waiting_period_4' => $services['data']['paymentWaitingPeriod4'],
                        ]);

                $this->status_description = "updated services";

            }
        }

        return $this->status_description ?? "empty services";
    }

    public function getPaymentMethodsGroupsDb()
    {
//        $bn_exchange_direction_db = BnExchangeDirection::get()
        $bn_exchange_direction_db = BnExchangeDirection::join('bnCurrencies', 'bnCurrencies.id', '=', 'bnExchangeDirections.bn_currency_id')
            ->select('bnExchangeDirections.id',
                'bnExchangeDirections.bn_payment_method_id',
                'bnExchangeDirections.bn_payment_method_group_id',
                'bnExchangeDirections.bn_currency_id',
                'bnExchangeDirections.exchange_direction_code',
                'bnExchangeDirections.exchange_direction_name',
                'bnExchangeDirections.created_at',
                'bnCurrencies.id as bnCurrenciesId',
                'bnCurrencies.currency_code'
            )
            ->get()
            ->groupBy('bn_payment_method_group_id')
            ->toArray();

        $groups_exchange_direction = [];
        foreach ($bn_exchange_direction_db as $bn_exchange_direction_db_key => $bn_exchange_direction_db_value) {
            $get_name_method_group = BnPaymentMethodGroup::select('payment_method_group_name', 'position')
                ->where('id', $bn_exchange_direction_db_key)->first()->toArray();
            $exchange_direction = [];
            foreach ($bn_exchange_direction_db_value as $direction_db_value) {

                if ($direction_db_value['bn_payment_method_id'] == null) {
                    $direction = $direction_db_value['exchange_direction_name'] . '  (' . $direction_db_value['currency_code'] . ')';
                } else {
                    $direction = $direction_db_value['exchange_direction_name'];
                }

                $value = [
                    "id" => $direction_db_value['id'],
//                    "title" => $direction_db_value['exchange_direction_name'],
                    "title" => $direction,
                ];
                array_push($exchange_direction, $value);
            }

            $groups_exchange_direction[$get_name_method_group['payment_method_group_name']] = $exchange_direction;
            $groups_exchange_direction[$get_name_method_group['payment_method_group_name']]["order"] = $get_name_method_group['position'];
        }

        $captionName = [
            'Table', 'List','Give_1','Get_1', 'FeedbackForm','FeedbackFormText',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        return  [
            'groups' => [$groups_exchange_direction],
            'translated' => [
              'Table' => $getArrayCaptions['Table']['translation_captions']['caption_translation'],
              'List' => $getArrayCaptions['List']['translation_captions']['caption_translation'],
              'Give_1' => $getArrayCaptions['Give_1']['translation_captions']['caption_translation'],
              'Get_1' => $getArrayCaptions['Get_1']['translation_captions']['caption_translation'],
            ],
        ];

//        return $groups_exchange_direction;еу
     }


}
