<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\ActionLog;
use App\Models\ActionLogsTotal;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class ActionLogsTotalsController extends Controller
{

    /**
     * @var array[]
     */
    private $statistics;

    public function statisticCurrentDay()
    {
        $statisticCurrentDay = DB::table("__ActionLogs")
            ->where('action_type_id', 26)
            ->where('action_log_error_l', false)
            ->whereDate(DB::raw("Date(created_at)"), "=", date('Y-m-d'))
            ->groupBy('controller_id', 'action_type_id', 'date')
            ->select([
                "__ActionLogs.controller_id",
                "__ActionLogs.action_type_id",
                DB::raw("Date(created_at) as date"),
                DB::raw("count(*) as count"),
//            ]);
            ])->first();

        $statisticCurrentDay = json_decode(json_encode($statisticCurrentDay), true);
        return $statisticCurrentDay;
    }

    public function statistic()
    {
        if (!$this->isAdmin())
            abort(403);

        $statisticActionLog = ActionLog::query()
            ->where('action_type_id', 26)
            ->where('action_log_error_l', false)
            ->whereDate(DB::raw("Date(created_at)"), "=", date('Y-m-d', strtotime("-1 days")))
//            ->orWhere(DB::raw("Date(created_at)"), "=", date('Y-m-d'))
            ->groupBy('controller_id', 'action_type_id', 'date')
//            ->union($this->statisticCurrentDay())
            ->get([
                "__ActionLogs.controller_id",
                "__ActionLogs.action_type_id",
                DB::raw("Date(created_at) as date"),
                DB::raw("count(*) as count"),
//            ])->toArray();
            ])->first();

        return $statisticActionLog;
    }

    public function statisticFinish(){


        $date = \Carbon\Carbon::today()->subDays(29);
        $statisticFinish = ActionLogsTotal::query()
//            ->groupBy('count',  'date')
            ->where('date', '>=', $date)
            ->select('count', 'date')
            ->orderBy("date", "asc")
            ->get()
            ->toArray();

        array_push($statisticFinish, $this->statisticCurrentDay());

        $labels = Arr::pluck($statisticFinish, 'date');
        $data   = Arr::pluck($statisticFinish, 'count');

        /*get period current day -30 day*/

        $period = \Carbon\CarbonPeriod::create($date, date("Y-m-d"));

        /*END get period current day -30 day*/

        /*change format date Y-m-d */
        $dates = [];
        foreach ($period as $date) {
            $dates[]= $date->format('Y-m-d');
        }
        /*END change format date Y-m-d*/

        $datesDiff = array_diff($dates, $labels);

        $labelsNull = [];
        foreach ($datesDiff as $key=>$value) {
            $labelsNull[] = $value;
            $dataNull[] = (int)0;
            array_unshift($data, '0');
        }

        foreach ($labelsNull as $itemNull=>$valueNull){
            array_unshift($labels, $valueNull);
        }

        $arrayCombine = array_combine($labels, $data);
        ksort($arrayCombine);

        $labelsSort = [];
        $dataSort = [];
        foreach ($arrayCombine as $keyArrayCombine => $valueArrayCombine){
            $labelsSort[] = $keyArrayCombine;
            $dataSort[] = intval($valueArrayCombine);
        }

        $this->statistics = [
            'labels' =>$labelsSort,
            'data' => $dataSort
        ];
    }

    public function getLabels()
    {
        return $this->statistics["labels"];
    }

    public function getData()
    {
        return $this->statistics["data"];
    }






}
