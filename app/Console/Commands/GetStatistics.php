<?php
namespace App\Console\Commands;

use App\Http\Controllers\Api;

use App\Models\ActionLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Admin\ActionLogsTotalsController;
use App\Models\ActionLogsTotal;
use Carbon\Carbon;




class GetStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user statistics';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
//    public function handle11()
    {
        $statisticActionLog = ActionLog::query()
            ->where('action_type_id', 26)
            ->where('action_log_error_l', false)
            ->whereDate(DB::raw("Date(created_at)"), "=", date('Y-m-d', strtotime("-1 days")))
            ->groupBy('controller_id', 'action_type_id', 'date')
//            ->union($this->statisticCurrentDay())
            ->get([
                "__ActionLogs.controller_id",
                "__ActionLogs.action_type_id",
                DB::raw("Date(created_at) as date"),
                DB::raw("count(*) as count"),
            ])->first();

        if (!empty($statisticActionLog)) {

            $insertStatisticActionLog[] = [
                'controller_id' => $statisticActionLog['controller_id'],
                'action_type_id' => $statisticActionLog['action_type_id'],
                'count' => $statisticActionLog['count'],
                'date' => $statisticActionLog['date'],
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => (\Carbon\Carbon::now())->toDateTimeString(),
                'updated_at' => (\Carbon\Carbon::now())->toDateTimeString(),
            ];
            ActionLogsTotal::insert($insertStatisticActionLog);
        }

        else {

            $insertStatisticActionLog[] = [
                'controller_id' => 32,
                'action_type_id' => 26,
                'count' => 0,
                'date' => date('Y-m-d', strtotime("-1 days")),
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => (\Carbon\Carbon::now())->toDateTimeString(),
                'updated_at' => (\Carbon\Carbon::now())->toDateTimeString(),
            ];
            ActionLogsTotal::insert($insertStatisticActionLog);
        }

        return $this->info('its works statistics!');
    }
}