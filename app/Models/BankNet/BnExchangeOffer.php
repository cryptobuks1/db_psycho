<?php

namespace App\Models\BankNet;

use Illuminate\Database\Eloquent\Model;

class BnExchangeOffer extends Model
{
    protected $table = "bnExchangeOffers";

    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "bn_exchanger_id",
        "bn_currency_id_input",
        "payment_method_id_input",
        "bn_currency_id_output",
        "payment_method_id_output",
        "irrevocable_exchange_treshold_n",
        "min_exchange_treshold_n",
        "max_exchange_treshold_n",
        "transaction_security_percent_n",
        "calculated_rate_n",
        "status_code",
        "reserve_n",
        "payment_waiting_period_1",
        "payment_waiting_period_2",
        "payment_waiting_period_3",
        "payment_waiting_period_4",
        "telegram_link",
        "created_by",
        "updated_by",
        "created_at"
    ];

    public function bnExchangers()
    {
        return $this->hasMany('App\Models\BankNet\BnExchanger', 'id', 'bn_exchanger_id');
    }

    public function bnCurrenciesInput()
    {
        return $this->hasMany('App\Models\BankNet\BnCurrency', 'id', 'bn_currency_id_input');
    }

    public function bnCurrenciesOutput()
    {
        return $this->hasMany('App\Models\BankNet\BnCurrency', 'id', 'bn_currency_id_output');
    }
}
