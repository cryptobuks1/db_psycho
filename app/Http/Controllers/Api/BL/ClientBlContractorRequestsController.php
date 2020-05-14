<?php

namespace App\Http\Controllers\Api\BL;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientBlContractorRequestsController extends BlContractorRequestsController
{
    protected function listAdditionalQuery(Builder $builder)
    {
        $builder->with(["contractor"])
            ->has("contractor");
//            ->has("partnerPoint.partner");
    }
}
