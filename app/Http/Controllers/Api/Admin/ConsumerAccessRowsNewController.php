<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\ConsumerAccessRowNew;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsumerAccessRowsNewController extends Controller
{
    public static function getAccessRows($column, $db_area_id)
    {
        $consumer_id = Auth::user()->id;

        $ids_array = DB::table("_ConsumerAccessRoles as ConsumerAccessRoles")
            ->where("ConsumerAccessRoles.consumer_id", $consumer_id)
            ->join("_ConsumerAccessRowsNew as ConsumerAccessRowsNew", function($join) use ($db_area_id)
            {
                $join->on("ConsumerAccessRowsNew.consumer_id", "=", "ConsumerAccessRoles.consumer_id")
                    ->orOn("ConsumerAccessRowsNew.access_role_id", "=", "ConsumerAccessRoles.access_role_id");
                $join->where("db_area_id", $db_area_id);
            })
            //            ->where("ConsumerAccessRowsNew.$column", "!=", 0)
            //            ->orWhereNull("ConsumerAccessRowsNew.$column")
            ->groupBy("ConsumerAccessRowsNew.$column")
            //            ->select("ConsumerAccessRowsNew.$column")
            ->pluck("ConsumerAccessRowsNew.$column")->toArray();
        //            ->get();

        if(in_array(null, $ids_array, true))
            return true;
        else
            return [
                "ids" => $ids_array,
                "db_area_id" => $db_area_id
            ];
    }
}
