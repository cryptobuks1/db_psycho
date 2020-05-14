<?php

namespace App\Http\Controllers\Api\BankNet;

use App\Http\Traits\HasList;
use App\Models\BankNet\BnExchangeDirection;
use App\Models\BankNet\BnExchangeOffer;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Request;

class BnExchangeOffersController extends Controller
{
    use HasList;
    protected $exchange_offers;
    protected $request;
    protected $test;

    /**
     * @return $this
     */
    public function listQuery()
    {

        $this->request = request();
        // предполагаемы вид передаваемого с фронта JSON, если выбраны оба направление обмена как ввода/Отдаете так и вывода/Получаете
        //{
        //"exchange_direction_id_input": 5,
        //"exchange_direction_id_output": 1
        //}
        // предполагаемы вид передаваемого с фронта JSON, если выбрано только направление обмена ввода/Отдаете
        //{
        //"exchange_direction_id_input": 5
        //}
        // предполагаемы вид передаваемого с фронта JSON, если выбрано только направление обмена вывода/Получаете
        //{
        //"exchange_direction_id_output": 1
        //}
        //
        // Вообщем Ты(Альбер) с Богданом согласуй формат JSON. Я в Вас верю Вы сможите!
        //

        $limit = 20; // лимит выводимых объявлений по умолчанию. Это на тот случай если не выберут направления обмена
        $whereArray = [ // массив условий с ограничениями
            ['status_code', '=', 'active'] // выводим только активные объявления
        ];

//        if(1) // тестировал, можно удалить
        if (isset($this->request['exchange_direction_id_input'])) // не знаю посмотрите какой ключ с фронта будет передавать id направления обмена ввод "Отдаете"
        {
//            $exchangeDirectionInput = BnExchangeDirection::where('id', '=', 5)->get()->first(); // тестировал, получаю направление обмена с id = 5
            $exchangeDirectionInput = BnExchangeDirection::where('id', '=', $this->request['exchange_direction_id_input'])->get()->first();
            if ($exchangeDirectionInput != null) {
                // добавляем в массив условий, условия на валюту ввода и способ/метод ввода взятых из направления обмена ввода "Отдаете"
                array_push($whereArray, ['bn_currency_id_input', '=', $exchangeDirectionInput['bn_currency_id']]);
                array_push($whereArray, ['payment_method_id_input', '=', $exchangeDirectionInput['bn_payment_method_id']]);
                $limit = null; // обнуляем лимит т.к. выбрано направление обмена ввода "Отдаете"
            }
        }
//        if(1) // тестировал, можно удалить
        if (isset($this->request['exchange_direction_id_output'])) // не знаю посмотрите какой ключ с фронта будет передавать id направления обмена вывод "Получаете"
        {
//            $exchangeDirectionOutput = BnExchangeDirection::where('id', '=', 1)->get()->first(); // тестировал, получаю направление обмена с id = 1
            $exchangeDirectionOutput = BnExchangeDirection::where('id', '=', $this->request['exchange_direction_id_output'])->get()->first();
            if ($exchangeDirectionOutput != null) {
                // добавляем в массив условий, условия на валюту вывода и способ/метод вывода взятых из направления обмена вывода "Получаете"
                array_push($whereArray, ['bn_currency_id_output', '=', $exchangeDirectionOutput['bn_currency_id']]);
                array_push($whereArray, ['payment_method_id_output', '=', $exchangeDirectionOutput['bn_payment_method_id']]);
                $limit = null; // обнуляем лимит т.к. выбрано направление обмена вывода "Получаете"
            }
        }

        $exchange_offers = BnExchangeOffer::join('bnExchangers as Exchangers', 'Exchangers.id', '=', 'bnExchangeOffers.bn_exchanger_id') //bnExchangeDirections
        ->join('bnCurrencies as CurrenciesInput', 'CurrenciesInput.id', '=', 'bnExchangeOffers.bn_currency_id_input')
            ->join('bnCurrencies as CurrenciesOutput', 'CurrenciesOutput.id', '=', 'bnExchangeOffers.bn_currency_id_output')
//            ->leftjoin('bnCurrencies as Test', 'Test.id', '=', 'bnExchangeDirections.bn_currency_id')
//            ->leftjoin('bnCurrencies', 'bnCurrencies.id', '=', 'bnExchangeDirections.bn_currency_id')
            ->leftjoin('bnPaymentMethods as PaymentMethodsInput', 'PaymentMethodsInput.id', '=', 'bnExchangeOffers.payment_method_id_input')
            ->leftjoin('bnPaymentMethods as PaymentMethodsOutput', 'PaymentMethodsOutput.id', '=', 'bnExchangeOffers.payment_method_id_output')
            ->select('bnExchangeOffers.id'                                  // Идентификатор объявления
                , 'bnExchangeOffers.status_code'                             // Статус объявления
                , 'bnExchangeOffers.bn_exchanger_id'                         // Идентификатор обменника
                , 'bnExchangeOffers.bn_currency_id_input'                    // Идентификатор валюты ввода
                , 'bnExchangeOffers.payment_method_id_input'                 // Идентификатор способа/метода ввода
                , 'PaymentMethodsInput.payment_method_name as payment_method_name_input'
                , 'bnExchangeOffers.bn_currency_id_output'                   // Идентификатор валюты вывода
                , 'bnExchangeOffers.payment_method_id_output'                // Идентификатор способа/метода вывода
                , 'PaymentMethodsOutput.payment_method_name as payment_method_name_output'
                , 'bnExchangeOffers.min_exchange_treshold_n'                 // Минимальный порог транзакции
                , 'bnExchangeOffers.max_exchange_treshold_n'                 // Максимальный порог транзакции
                , 'bnExchangeOffers.transaction_security_percent_n'          // Процент обеспечения по сделке
                , 'Exchangers.exchanger_name'                                // Наименование обменника
                , 'Exchangers.exchanger_rating_n'                            // Рейтинг обменника
                , 'CurrenciesInput.currency_code as currency_input_code'     // Код валюты ввода
                , 'CurrenciesInput.currency_name as currency_input_name'     // Код валюты ввода
                , 'CurrenciesOutput.currency_code as currency_output_code'   // Код валюты ввывода
                , 'CurrenciesOutput.currency_name as currency_output_name'   // Код валюты ввывода
                , 'bnExchangeOffers.calculated_rate_n'
//                 'Test.id',
//                 'bnExchangeDirections.exchange_direction_name as direction_name'
//                 'bnExchangeDirections.bn_payment_method_group_id',
//                 'bnExchangeDirections.bn_payment_method_id'

                // Курс валюты ввода относительно валюты вывода
                // Расчетное значение валюты ввода для отображения в таблице в формате - пример ' 3 255,5470' или ' 1'
//                ,\DB::raw("(CASE WHEN calculated_rate_n < 1 THEN to_char(1/calculated_rate_n, 'FM999 999 990D0000') ELSE ' 1' END) as currency_input_value")
                , \DB::raw("(CASE WHEN calculated_rate_n < 1 THEN (1/calculated_rate_n) ELSE 1 END) as currency_input_value")
                // Расчетное значение валюты ввывода для отображения в таблице в формате пример ' 3 255,5470' или ' 1'
//                ,\DB::raw("(CASE WHEN calculated_rate_n < 1 THEN ' 1' ELSE to_char(calculated_rate_n, 'FM999 999 990D0000') END) as currency_output_value")
                , \DB::raw("(CASE WHEN calculated_rate_n < 1 THEN 1 ELSE calculated_rate_n END) as currency_output_value")
            );

        $this->exchange_offers = \DB::table(\DB::raw("(" . $exchange_offers->toSql() . ") as exchangeOffers"))
//            ->leftjoin('bnCurrencies', 'bnCurrencies.id', '=', 'bnExchangeDirections.bn_currency_id')
//            ->join('bnExchangeDirections.bn_currency_id', '=', 'bn_currency_id_input')
            ->where($whereArray)                        // массив условий
            ->select('id'                               // Идентификатор объявления
                , 'bn_exchanger_id'                  // Идентификатор обменника
                , 'bn_currency_id_input'             // Идентификатор валюты ввода
                , 'bn_currency_id_output'            // Идентификатор валюты вывода
                , 'exchanger_name'                   // Наименование обменника
                , 'exchanger_rating_n'               // Рейтинг обменника
                , 'currency_input_code'              // Код валюты ввода
                , 'payment_method_name_input'        // Способ/метод ввода
                , 'currency_input_value'             // Расчетное значение курса для валюты ввода
                , 'currency_output_code'             // Код валюты ввывода
                , 'payment_method_name_output'       // Способ/метод вывода
                , 'currency_output_value'            // Расчетное значение курса для валюты вывода
                , 'min_exchange_treshold_n'          // Минимальный порог транзакции
                , 'max_exchange_treshold_n'          // Максимальный порог транзакции
                , 'transaction_security_percent_n'   // Процент обеспечения по сделке
                , 'calculated_rate_n',
                'currency_input_name',
                'currency_output_name'
//                    'direction_name'
            //                    'payment_method_is_crypto'
            // Процент обеспечения по сделке
            // объединим расчитаное значение и валюту ввода, а также минимальный парог и максимальный с использованием кэпшенов
            // для получуния колонки в вида ' 2,4560 RUB (от 10 до 1000)' или ' 2,4560 RUB (from 10 to 1000)'

//                    ,\DB::raw("CONCAT(currency_input_value
//                                , ' '
//                                , currency_input_code
//                                , ' '
//                                , payment_method_name_input
//                                ,' (".$this->getTranslatedListCaption('from')." '
//                                , CASE WHEN MOD(min_exchange_treshold_n::numeric,1) = 0 THEN to_char(min_exchange_treshold_n, 'FM999 999 999 999') ELSE to_char(min_exchange_treshold_n, 'FM999 999 999 990D99999999') END
//                                , ' ".$this->getTranslatedListCaption('to')." '
//                                , CASE WHEN MOD(max_exchange_treshold_n::numeric,1) = 0 THEN to_char(max_exchange_treshold_n, 'FM999 999 999 999') ELSE to_char(max_exchange_treshold_n, 'FM999 999 999 990D99999999') END
//                                , ')') as currency_input")
            // объединим расчитаное значение и валюту вывода для получуния колонки в виде ' 2,4560 RUB'
//                    ,\DB::raw("CONCAT(currency_output_value, ' ', currency_output_code, ' ', payment_method_name_output) as currency_output")
            )->orderBy('exchanger_rating_n', 'desc')->limit($limit)->get()->toArray();

        return $this;
    }

    public function prepareListModelData()
    {
        $models = $this->exchange_offers;

        $this->list_model = [];
        foreach ($models as $model) {

//            if (($model->payment_method_name_input  === null)  ){
//                $currency_input = $model->currency_input_name.'  '. $model->currency_input_code;
//             }else{
//                $currency_input  = $model->currency_input_code;
//             }
//            if (($model->payment_method_name_output  === null)  ){
//                 $currency_output = $model->currency_output_name.'  '. $model->currency_output_code;
//            }else{
//                 $currency_output  = $model->currency_output_code;
//            }

            array_push($this->list_model, [
                'id' => $model->id ?? null,
//                'bn_exchanger_id' => $model->bn_exchanger_id ?? null,
                'exchanger_name' => $model->exchanger_name ?? null,
//                'bn_currency_id_input' => $model->bn_currency_id_input ?? null,
//                'currency_input' => $model->currency_input ?? null,
//                'bn_currency_id_output' => $model->bn_currency_id_output ?? null,
//                'currency_output' => $model->currency_output ?? null,
//                'min_exchange_treshold_n' => $model->min_exchange_treshold_n ?? null,
//                'max_exchange_treshold_n' => $model->max_exchange_treshold_n ?? null,
                'exchanger_rating_n' => $model->exchanger_rating_n ?? null,
                'transaction_security_percent_n' => $model->transaction_security_percent_n ?? null,
                'currency_rate' => $model->calculated_rate_n ?? null,
                'input_currency' => $model->currency_input_code ?? null, ////
//                'input_currency' => $currency_input ?? null, ////
                'output_currency' => $model->currency_output_code ?? null, /////
//                 'output_currency' => $currency_output ?? null, /////
                'currency_input_value' => $model->currency_input_value ?? null,
                'payment_method_name_input' => $model->payment_method_name_input ?? null,
                'currency_output_value' => $model->currency_output_value ?? null,
                'payment_method_name_output' => $model->payment_method_name_output ?? null,
                'min_exchange_treshold' => $model->min_exchange_treshold_n ?? null,
                'max_exchange_treshold' => $model->max_exchange_treshold_n ?? null,
            ]);
        }
        return $this;
    }

    public function setListHeaderBreakLine()
    {
        $this->list_header_break_line = false;

        return $this;
    }

    public function setListBlockFields()
    {
        if ((isset($this->request['exchange_direction_id_input'])) and (isset($this->request['exchange_direction_id_output']))) {
            $calculate_currencies = true;
        } else {
            $calculate_currencies = false;
        }

        $this->list_block_fields = [
            [
                "block_title" => $this->getTranslatedListCaption('Partner'),
                "block_zone_quantity" => 1,
                "block_model" => $this->list_controller_alias,
                "block_type" => "block_list_base",
                "block_parameters" => [
                    "requery_interval" => (int)15000,
                    "calculate_currencies" => $calculate_currencies,
                    "hide_pagination" => true
                ],
                "block_fields" => [

                    // ['key' => 'actions', 'sortable' => false,
                    //     'class' => 'list_checkbox',
                    //     'thStyle' => 'width: 6%',
                    //     "zone" => "1",
                    //     "order" => "1"
                    // ],

//                    ['key' => 'actual_l', 'sortable' => false, 'type' => 'checkbox',
//                        "label" => $this->getTranslatedListCaption('Actual'), 'thStyle' => 'width: 8%', 'zone' => '1', 'order' => '3'
//                    ],

                    [
                        'key' => 'exchanger_name',
                        'sortable' => true,
                        'class' => 'exchanger_name',
                        'label' => $this->getTranslatedListCaption('Exchanger'),
                        'thStyle' => 'width: 20%',
                    ],

                    [
                        'key' => 'currency_input_value',
                        'sortable' => true,
                        'label' => $this->getTranslatedListCaption('Give'),
                        'thStyle' => 'width: 30%',
                        "typeVal" => "number",
                        "format" => "0,0[.]0000",
                    ],

                    [
                        'key' => 'currency_output_value',
                        'sortable' => true,
                        'label' => $this->getTranslatedListCaption('Get'),
                        'thStyle' => 'width: 30%',
                        "typeVal" => "number",
                        "format" => "0,0[.]0000",
                    ],

//                    [
//                        'key' => 'min_exchange_treshold_n',
//                        'sortable' => true,
//                        'class' => 'min_exchange_treshold_n',
////                        'label' => $this->getTranslatedListCaption('AccessRoleCode'),
//                        'label' => 'min_exchange_treshold_n',
//                        'thStyle' => 'width: 20%',
//                        "zone" => "1",
//                        "order" => "3"
//                    ],
//
//                    [
//                        'key' => 'max_exchange_treshold_n',
//                        'sortable' => true,
//                        'class' => 'max_exchange_treshold_n',
////                        'label' => $this->getTranslatedListCaption('max_exchange_treshold_n'),
//                        'label' => 'max_exchange_treshold_n',
//                        'thStyle' => 'width: 20%',
//                        "zone" => "1",
//                        "order" => "3"
//                    ],

                    [
                        'key' => 'exchanger_rating_n',
                        'sortable' => true,
                        'label' => $this->getTranslatedListCaption('Rating'),
                        'thStyle' => 'width: 10%',
                    ],
                    [
                        'key' => 'transaction_security_percent_n',
                        'sortable' => true,
                        'label' => $this->getTranslatedListCaption('TransactionSecurityPercentage'),
                        'thStyle' => 'width: 10%',
                    ]
                ]
            ]
        ];
        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            'ok',
            'apply',
            'back', 'Main',
            'Code', 'Name',
            'Consumer', 'Database', 'Actual', 'Region',
            'PartnerPoints', 'Partner', 'DeleteMark', 'PartnerRegions',
            'Exchanger', 'Give', 'Get', 'Rating', 'from', 'to', 'TransactionSecurityPercentage',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'AccessRoleName', 'AccessRoleCode'

        ];

        $this->translateListCaptions();
        return $this;
    }

    public function setListFormSearchField()
    {
        $this->list_form_search_field = "exchanger_name";
        return $this;
    }

    protected function listAdditionalQuery(Builder $builder)
    {

    }

}



