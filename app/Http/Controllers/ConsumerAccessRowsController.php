<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Auth;

class ConsumerAccessRowsController extends Controller
{
    /**
     * @param string $model_name
     * @param int|null $db_area_id
     * @return array
     */
    public static function getAccessRows($model_name, $db_area_id = null)
    {
        if(is_null($db_area_id))
            $db_area_id = self::getDefaultDBAreaId();

        $current_controller_code = class_basename(\Route::current()->controller);

        $consumer_access_rows = Consumer::query()
            ->where("Consumers.id", "=", Auth::user()->getAttribute("id"))
            ->join("__Controllers as Controllers",
                function(JoinClause $join) use ($current_controller_code)
                {
                    $join->where("Controllers.controller_code", "=", $current_controller_code);
                })
            ->join("__AccessAxes as AccessAxes", "AccessAxes.id", "=", "Controllers.access_axis_id")
            ->leftJoin("_ConsumerAccessRoles as ConsumerAccessRoles", "ConsumerAccessRoles.consumer_id", "=",
                "Consumers.id")
            ->join("_ConsumerAccessRows as ConsumerAccessRows", function(JoinClause $join) use ($db_area_id)
            {
                $join->on(function($query)
                {
                    $query->on("ConsumerAccessRows.consumer_id", "=", "Consumers.id")
                        ->on("ConsumerAccessRows.access_axis_id", "=", "AccessAxes.id");
                })
                    ->orOn(function($query)
                    {
                        $query->on("ConsumerAccessRows.access_role_id", "=", "ConsumerAccessRoles.access_role_id")
                            ->on("ConsumerAccessRows.access_axis_id", "=", "AccessAxes.id");
                    })
                    ->where("ConsumerAccessRows.db_area_id", "=", $db_area_id);
            })
            ->select(["AccessAxes.id as access_axes_id", "ConsumerAccessRows.id as consumer_access_row_id", "Controllers.controller_table_n"])
            ->groupBy(["ConsumerAccessRows.id", "AccessAxes.id", "Controllers.controller_table_n"])
            ->get();

        $array = [];

        $result = \DB::table("__AccessAxesParameters as AccessAxesParameters")
            ->whereIn("AccessAxesParameters.access_axis_id", $consumer_access_rows->pluck("access_axes_id"))
            ->join("__ModelTables as ModelTables", function(JoinClause $join) use ($model_name)
            {
                $join->where("ModelTables.table_code", "=", $model_name);
            })
            ->join("__AccessRowParameters as AccessRowParameters",
                function(JoinClause $join) use ($consumer_access_rows)
                {
                    $join->on("AccessRowParameters.id", "=", "AccessAxesParameters.access_row_parameter_id")
                        ->on("AccessRowParameters.table_n", "=", "ModelTables.table_n");
                })
            ->leftJoin("_ConsumerAccessRowParameters as ConsumerAccessRowParameters",
                function(JoinClause $join) use ($consumer_access_rows)
                {
                    $join->whereIn("ConsumerAccessRowParameters.consumer_access_row_id",
                        $consumer_access_rows->pluck("consumer_access_row_id"))
                        ->on("ConsumerAccessRowParameters.access_axes_parameter_id", "=", "AccessAxesParameters.id");
                })
            ->select(["AccessRowParameters.table_field_name", "ConsumerAccessRowParameters.id",
                      "ConsumerAccessRowParameters.access_row_parameter_value"])
            ->get()
            ->groupBy("table_field_name");

        foreach($result as $key => $items)
        {
            foreach($items as $item)
            {
                if(is_null($item->id))
                {
                    $array[$key] = [null];

                    break;
                }
                else
                {
                    if(is_null($item->access_row_parameter_value))
                    {
                        if(isset($array[$key]))
                            unset($array[$key]);

                        break;
                    }
                    else
                    {
                        if(!isset($array[$key]))
                            $array[$key] = [];

                        array_push($array[$key], $item->access_row_parameter_value);
                    }

                }
            }
        }

        return $array;
    }
}
