<?php


namespace App\Http\Controllers\Api\Partners;


use App\Http\Controllers\Api\PartnerRegionsController;

class PartnerPartnerRegionsController extends PartnerRegionsController
{
    public function setCardSystemTab()
    {
        // Не выводим system tab
        return $this;
    }
}