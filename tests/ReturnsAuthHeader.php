<?php

namespace Tests;

use App\Models\Consumer;

trait ReturnsAuthHeader
{
    /**
     * @return array
     */
    protected function getUserAuthHeaders()
    {
        $token = auth()->guard('api')
            ->login(Consumer::query()->where("consumer_code", "RblUser")->first());

        return ["Authorization" => "Bearer $token"];
    }

    /**
     * @return array
     */
    protected function getManagerAuthHeaders()
    {
        $token = auth()->guard('api')
            ->login(Consumer::query()->where("consumer_code", "RblManager")->first());

        return ["Authorization" => "Bearer $token"];
    }

    /**
     * @return array
     */
    protected function getAdminAuthHeaders()
    {
        $token = auth()->guard('api')
            ->login(Consumer::query()->where("consumer_code", "RblAdmin")->first());

        return ["Authorization" => "Bearer $token"];
    }

}