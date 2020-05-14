<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Notification::truncate();


        \App\Models\Notification::create([
            'id' => 1,
            'contractor_contract_id' => 1,
            'contractor_id' => 1,
            'notification_date' => '2019-05-02',
            'notification_title' => 'Уведомление о просрочке по договору лизинга 12345-67-89 Пр.№ 1.0 от 26.11.2015',
            'notification_text' => 'просрочке по договору 12345-67-89',
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        \App\Models\Notification::create([
            'id' => 2,
            'contractor_contract_id' => 2,
            'contractor_id' => 2,
            'notification_date' => '2019-05-10',
            'notification_title' => 'Уведомление о просрочке по договору лизинга 12345-67-89 Пр.№ 1.0 от 26.11.2015',
            'notification_text' => 'просрочке по договору 12345-67-563',
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"Notifications_id_seq\"', 100, true)");
        }
    }
}
