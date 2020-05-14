<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\ChangeRequest::truncate();
//        \App\Models\ChangeRequestController::truncate();
//        \App\Models\ChangeRequestControllerField::truncate();
//        \App\Models\ChangeRequestControllerFieldValue::truncate();
//        \App\Models\BL\BlLeasingSchedulePayments::truncate();
//        \App\Models\BL\BlLeasingSchedulePaymentsExchange::truncate();
        \App\Models\ActionLog::truncate();
//        $this->call(NotificationsTableSeeder::class);
//        $this->call(BlLeasingContractSpecificationTableSeeder::class);
//        $this->call(BlCustomerRequestTabLeasingObjectTableSeeder::class);
//        $this->call(BlLeasingSchedulePaymentsTableSeeder::class);
//        $this->call(BlLeasingSchedulePaymentsTableSeeder::class);
        \App\Models\ActionLogsTotal::truncate();



    }
}
