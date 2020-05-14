<?php

namespace App\Http\Controllers\Api\BankNet;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BankNet\BnCurrency;
use App\Models\BankNet\BnPaymentMethod;
use App\Models\BankNet\BnPaymentMethodGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BnPaymentMethodGroupsController extends Controller
{
    use HasList, HasCard;

    protected function listQuery()
    {
        $this->list_model = BnPaymentMethodGroup::query();

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get();

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            "Name",
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
                        'key'      => 'payment_method_group_name',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("Name"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "2"
                    ],
                ]
            ]
        ];

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();

        $payment_method_group_id = $request->id;
        $this->setIsNewObject($payment_method_group_id === "new");

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

            $this->card_model = [BnPaymentMethodGroup::getNewObject()];
        }
        else
        {
            $this->card_model = BnPaymentMethodGroup::query()->where('id', $payment_method_group_id);


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
            'PaymentMethodGroup',
            'PaymentMethod',
            'Main',
            'SystemDetails',
            'Name',
            'Description',
            'PositionNumber',
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
                        "block_title"         => $this->getTranslatedCardCaption("PaymentMethodGroup"),
                        "block_zone_quantity" => 2,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            [
                                'title'        => $this->getTranslatedCardCaption("Name"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'payment_method_group_name',
                                'type'         => 'text',
                                'width'        => '50%',
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false,
                            ],
                            [
                                'title'        => $this->getTranslatedCardCaption("PositionNumber"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'position',
                                'type'         => 'text',
                                'width'        => '50%',
                                "zone"         => "1",
                                "order"        => "2",
                                "border_right" => false,
                            ],
                            [
                                'title'        => $this->getTranslatedCardCaption("Description"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'description',
                                'type'         => 'textarea',
                                'width'        => '100%',
                                "zone"         => "1",
                                "order"        => "3",
                                "border_right" => false,
                            ],
                        ]
                    ],

                ]
            ],
        ];

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = "PaymentMethodGroup";

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]["payment_method_group_name"];

        return $this;
    }


}
