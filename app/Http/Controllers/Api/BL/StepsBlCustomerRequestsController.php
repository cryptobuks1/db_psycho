<?php

namespace App\Http\Controllers\Api\BL;

use Illuminate\Http\Request;

class StepsBlCustomerRequestsController extends BlCustomerRequestsController
{
    protected function listAdditionalQuery($builder)
    {
        $builder->where(function($query)
        {
            $query->whereIn("bl_customer_request_stage", [3, 4, 5]);
        });
    }
}
