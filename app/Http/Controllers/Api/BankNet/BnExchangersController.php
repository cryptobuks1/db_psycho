<?php

namespace App\Http\Controllers\Api\BankNet;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BankNet\BnExchanger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BnExchangersController extends Controller
{
    use HasList, HasCard;

    protected function listQuery()
    {
        $this->list_model = BnExchanger::query()->select(["id", "exchanger_name", "exchanger_rating_n"]);

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get()->toArray();

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            "Name",
            "Rating",
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
                        'key'      => 'exchanger_name',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("Name"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "2"
                    ],
                    [
                        'key'      => 'exchanger_rating_n',
                        'sortable' => true,
                        'class'    => 'contractor_short_name',
                        "label"    => $this->getTranslatedListCaption("Rating"),
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

        $exchanger_id = $request->id;
        $this->setIsNewObject($exchanger_id === "new");

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

            $this->card_model = [BnExchanger::getNewObject()];
        }
        else
        {
            $this->card_model = BnExchanger::query()->where('id', $exchanger_id);


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
            'Rating',
            'Exchanger',
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
                        "block_title"         => $this->getTranslatedCardCaption("Currency"),
                        "block_zone_quantity" => 2,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            [
                                'title'        => $this->getTranslatedCardCaption("Name"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'exchanger_name',
                                'type'         => 'text',
                                'width'        => '50%',
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false,
                            ],
                            [
                                'title'        => $this->getTranslatedCardCaption("Rating"),
                                'model_name'   => $this->card_controller_alias,
                                'model'        => 'exchanger_rating_n',
                                'type'         => 'text',
                                'width'        => '50%',
                                "zone"         => "1",
                                "order"        => "2",
                                "border_right" => false,
                            ],
//                            [
//                                'title'        => "kyc_sent_l",
//                                'model_name'   => $this->card_controller_alias,
//                                'model'        => 'kyc_sent_l',
//                                'type'         => 'checkbox',
//                                'width'        => '25%',
//                                "zone"         => "1",
//                                "order"        => "3",
//                                "border_right" => false,
//                            ],
//                            [
//                                'title'        => "anketa_sent_l",
//                                'model_name'   => $this->card_controller_alias,
//                                'model'        => 'anketa_sent_l',
//                                'type'         => 'checkbox',
//                                'width'        => '25%',
//                                "zone"         => "1",
//                                "order"        => "4",
//                                "border_right" => false,
//                            ],
//                            [
//                                'title'        => "profile_accepted_l",
//                                'model_name'   => $this->card_controller_alias,
//                                'model'        => 'profile_accepted_l',
//                                'type'         => 'checkbox',
//                                'width'        => '25%',
//                                "zone"         => "1",
//                                "order"        => "5",
//                                "border_right" => false,
//                            ],
//                            [
//                                'title'        => "confirmed_l",
//                                'model_name'   => $this->card_controller_alias,
//                                'model'        => 'confirmed_l',
//                                'type'         => 'checkbox',
//                                'width'        => '25%',
//                                "zone"         => "1",
//                                "order"        => "6",
//                                "border_right" => false,
//                            ],

                        ]
                    ],

                ]
            ],
        ];

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = "Exchanger";

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]["exchanger_name"];

        return $this;
    }


}
