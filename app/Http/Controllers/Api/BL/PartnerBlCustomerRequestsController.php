<?php

namespace App\Http\Controllers\Api\BL;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerBlCustomerRequestsController extends BlCustomerRequestsController
{
    protected function listAdditionalQuery(Builder $builder)
    {
        $builder->with(["partnerPoint.partnerRegions", "partnerPoint.partner"])
            ->has("partnerPoint.partnerRegions");
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title"         => $this->getTranslatedListCaption('Clients'),
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [
                    ['key'     => 'actions', 'sortable' => false,
                     'class'   => 'list_checkbox',
                     'thStyle' => 'width: 6%',
                     "zone"    => "1",
                     "order"   => "1"
                    ],
                    ['key'   => 'bl_customer_request_date', 'sortable' => true, 'class' => 'created_at',
                     "label" => 'Дата', 'thStyle' => 'width: 10%', 'typeVal' => 'date', 'format' => 'MM-DD-YYYY',],
                    ['key'   => 'bl_customer_request_number', 'sortable' => true,
                     "label" => 'Номер', 'thStyle' => 'width: 21%'],
                    ['key'   => "bl_leasing_object_sum", 'sortable' => true,
                     "label" => 'Сумма', 'thStyle' => 'width: 21%', 'typeVal' => 'number', 'format' => '0,0.00',],
                    ['key'   => "leased_asset", 'sortable' => true,
                     "label" => 'Предмет лизинга', 'thStyle' => 'width: 21%'],
                    ['key'   => "bl_status_name", 'sortable' => true,
                     "label" => 'Статус', 'thStyle' => 'width: 21%'],
                    ['key'   => "['partner_point']['partner_point_name']", 'sortable' => true,
                     "label" => 'partner_point_name', 'thStyle' => 'width: 21%'],
                ]
            ]
        ];

        return $this;
    }
}
