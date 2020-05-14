<?php

namespace App\Http\Controllers\Api\BankNet;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BankNet\BnCurrency;
use App\Models\BankNet\BnExchangeDirection;
use App\Models\BankNet\BnPaymentMethod;
use App\Models\BankNet\BnPaymentMethodGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BnExchangeDirectionsController extends Controller
{
    use HasList, HasCard;

    protected function listQuery()
    {
        $this->list_model = BnExchangeDirection::query()
            ->with(["paymentMethod:id,payment_method_name", "paymentMethodGroup:id,payment_method_group_name",
                "currency:id,currency_code"]);

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get()->toArray();

        return $this;
    }

    public function prepareListModelData()
    {
        $models = $this->list_model;

        $this->list_model = [];

        foreach($models as $model)
        {
            $this->list_model[] = [
                "id" => $model["id"],
                "exchange_direction_code" => $model["exchange_direction_code"],
                "exchange_direction_name" => $model["exchange_direction_name"],
                "payment_method_name" => $model["payment_method"]["payment_method_name"] ?? "",
                "payment_method_group_name" => $model["payment_method_group"]["payment_method_group_name"] ?? "",
                "currency_code" => $model["currency"]["currency_code"] ?? "",
            ];
        }

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            "Name",
            "Code",
            "PaymentMethod",
            "PaymentMethodGroup",
            "Currency",
        ];

        $this->translateListCaptions();

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [

            [
                "block_title"         => "",
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [
                    [
                        'key'      => 'actions',
                        'sortable' => false,
                        'class'    => 'list_checkbox',
                        'thStyle'  => 'width: 6%',
                        "zone"     => "1",
                        "order"    => "1"
                    ],
                    [
                        'key'      => 'exchange_direction_name',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("Name"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "2"
                    ],
                    [
                        'key'      => 'exchange_direction_code',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("Code"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "3"
                    ],
                    [
                        'key'      => 'payment_method_name',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("PaymentMethod"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "3"
                    ],
                    [
                        'key'      => 'payment_method_group_name',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("PaymentMethodGroup"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "3"
                    ],
                    [
                        'key'      => 'currency_code',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("Currency"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "3"
                    ],
                ]
            ]
        ];

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();

        $exchange_direction_id = $request->id;
        $this->setIsNewObject($exchange_direction_id === "new");

        if($this->isNewObject())
        {
            $nameControllerMethod = [
                'controller' => class_basename(\Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();


            if($access === false)
            {
                return abort('403');
            }

            $this->card_model = [BnExchangeDirection::getNewObject()];
        }
        else
        {
            $this->card_model = BnExchangeDirection::query()->where('id', $exchange_direction_id);


            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->get();

            if(!$this->card_model)
                return abort('403');

            $this->card_model = $this->card_model->toArray();
        }

        return $this;
    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'new',
            'Currencies',
            'Currency',
            'Main',
            'SystemDetails',
            'Name',
            'Code',
            "PaymentMethod",
            "PaymentMethodGroup",
            "Currency",
            'ExchangeDirection',
            'CreatedAt',
            'CreatedBy',
            'UpdatedAt',
            'UpdatedBy',
        ];

        $this->translateCardCaptions();

        return $this;
    }

    public function setCardBlockFields(): self
    {
        $this->card_block_fields = [
            [
                "tab_title"       => $this->getTranslatedCardCaption("Main"),
                "tab_name"        => $this->getTranslatedCardCaption("Main"),
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => $this->getTranslatedCardCaption("ExchangeDirection"),
                        "block_zone_quantity" => 2,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            [
                                'title'        => $this->getTranslatedCardCaption("Name"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'exchange_direction_name',
                                'type'         => 'text',
                                'width'        => '50%',
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false,
                            ],
                            [
                                'title'        => $this->getTranslatedCardCaption("Code"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'exchange_direction_code',
                                'type'         => 'text',
                                'width'        => '50%',
                                "zone"         => "1",
                                "order"        => "2",
                                "border_right" => false,
                            ],
                            [
                                'title'        => $this->getTranslatedCardCaption("PaymentMethod"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'bn_payment_method_id',
                                'type'         => 'vue-select',
                                'options'         => [],
                                "options_data"    => [
                                    "options_data_model"  => "BNPaymentMethods",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "payment_method_name",
                                    "search"              => ""
                                ],
                                'width'        => '33%',
                                "zone"         => "1",
                                "order"        => "3",
                                "border_right" => false,
                            ],
                            [
                                'title'        => $this->getTranslatedCardCaption("PaymentMethodGroup"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'bn_payment_method_group_id',
                                'type'         => 'vue-select',
                                'options'         => [],
                                "options_data"    => [
                                    "options_data_model"  => "BNPaymentMethodGroups",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "payment_method_group_name",
                                    "search"              => ""
                                ],
                                'width'        => '33%',
                                "zone"         => "1",
                                "order"        => "4",
                                "border_right" => false,
                            ],
                            [
                                'title'        => $this->getTranslatedCardCaption("Currency"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'bn_currency_id',
                                'type'         => 'vue-select',
                                'options'         => [],
                                "options_data"    => [
                                    "options_data_model"  => "BNCurrencies",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "currency_code",
                                    "search"              => ""
                                ],
                                'width'        => '33%',
                                "zone"         => "1",
                                "order"        => "5",
                                "border_right" => false,
                            ],

                        ]
                    ],

                ]
            ],
        ];

        return $this;
    }

    public function setCardAddDataModels(): self
    {
        $this->card_add_data_models = [
            "BNPaymentMethods" => BnPaymentMethod::all(["id", "payment_method_name"]),
            "BNPaymentMethodGroups" => BnPaymentMethodGroup::all(["id", "payment_method_group_name"]),
            "BNCurrencies" => BnCurrency::all(["id", "currency_code"]),
        ];

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = "ExchangeDirection";

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]["exchange_direction_name"];

        return $this;
    }



}
