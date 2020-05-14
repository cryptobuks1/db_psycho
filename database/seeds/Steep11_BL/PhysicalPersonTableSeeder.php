<?php

use Illuminate\Database\Seeder;

class PhysicalPersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PhysicalPerson::truncate();

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\PhysicalPerson::create([
            'id' => 1,
            'db_area_id' => 1,
            "physical_person_name"=>'Петр Иванов',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"PhysicalPersons_id_seq\"', 10, true)");
        }
    }
}
