<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\GetStatistics',
        'App\Console\Commands\SendSignal',
        'App\Console\Commands\BankNet'
    ];


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('statistics')->everyMinute();
        $schedule->command('signal')->everyMinute();
        $schedule->command('bankNet')->everyMinute();

        // $schedule->command('inspire')
        //          ->hourly();

//        $schedule->call(function () {
//            DB::table('test_cron')
//                ->where('test', '=', 1)
//                ->delete();
//        })->everyMinute();

//        $schedule->command('sync_with_1c')->everyTenMinutes();

//        $seconds = 2;
//        $schedule->call(function () use ($seconds) {
//
//            $dt = Carbon::now();
//
//            $x=60/$seconds;
//
//            do{
//
//                // do your function here that takes between 3 and 4 seconds
//
//                time_sleep_until($dt->addSeconds($seconds)->timestamp);
//
//            } while($x > 0);
//
//        })->everyMinute();


//        $schedule->call(function () {
//            DB::table('Consumers')
//                ->where('created_at', '<', Carbon::now()->subSeconds(app('RequestTimeOut')))
//                ->where(function ($query) {
//                    $query->orWhere('consumer_status_n', 0)
//                          ->orWhere('consumer_status_n', 1)
//                          ->orWhere('consumer_status_n', 2);
//                })->delete();
//        })->daily();
//
//        $schedule->call(function () {
//            DB::table('test_cron')
//                ->where('created_at', '<', Carbon::now()->subSeconds(app('RequestTimeOut')))
//                ->where(function ($query) {
//                    $query->orWhere('test',  1);
//                })->delete();
//        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
