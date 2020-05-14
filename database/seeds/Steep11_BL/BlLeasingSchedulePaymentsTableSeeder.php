<?php

use Illuminate\Database\Seeder;

class BlLeasingSchedulePaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\BL\BlLeasingSchedulePayments::truncate();


        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 1,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 3,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2021-01-15',
            'bl_leasing_schedule_payment_plan' => 1200.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 2,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 1,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-01-15',
            'bl_leasing_schedule_payment_plan' => 700000.80,
            'bl_leasing_schedule_payment_fact' => 700000.80,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 3,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-02-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 4,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-03-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 5,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-04-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 6,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-05-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 7,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-06-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 8,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-07-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 9,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-08-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 10,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-09-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 11,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-10-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 12,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-11-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 13,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2020-12-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingSchedulePayments::create([
            'id' => 14,
            'contractor_contract_id' => 1,
            'bl_schedule_article_id' => 2,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_schedule_payment_date' => '2021-01-15',
            'bl_leasing_schedule_payment_plan' => 122046.00,
            'bl_leasing_schedule_payment_fact' => 0.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingSchedulePayments_id_seq\"', 500, true)");
        }

    }
}
