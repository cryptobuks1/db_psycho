<?php

namespace App\Http\Controllers\Api\Partners;

use App\Http\Controllers\Api\PartnersController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerPartnersController extends PartnersController
{
    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title" => $this->getTranslatedListCaption('Partner'),
                "block_zone_quantity" => 1,
                "block_model" => $this->list_controller_alias,
                "block_type" => "block_list_base",
                "block_fields" => [

                    ['key' => 'actions', 'sortable' => false,
                        'class' => 'list_checkbox',
                        'thStyle' => 'width: 6%',
                        "zone" => "1",
                        "order" => "1"
                    ],

                    ['key' => 'deleted_l', 'sortable' => false, 'type' => 'checkbox',
                        "label" => $this->getTranslatedListCaption('DeleteMark'), 'thStyle' => 'width: 8%',
                        'zone' => '1', 'order' => '2'
                    ],

                    ['key' => 'actual_l', 'sortable' => false, 'type' => 'checkbox',
                        "label" => $this->getTranslatedListCaption('Actual'), 'thStyle' => 'width: 8%', 'zone' => '1', 'order' => '3'
                    ],

                    ['key' => "contractor_short_name", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Contractors'), 'thStyle' => 'width: 38%', 'zone' => '1', 'order' => '4'
                    ],

                    ['key' => "partner_name", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Partners'), 'thStyle' => 'width: 40%', 'zone' => '1', 'order' => '5'
                    ],
                ]
            ]
        ];

        return $this;
    }
}
