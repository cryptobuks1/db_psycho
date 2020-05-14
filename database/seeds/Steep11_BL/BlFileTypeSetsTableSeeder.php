<?php

use Illuminate\Database\Seeder;

class BlFileTypeSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlFileTypeSet::truncate();

        \App\Models\BL\BlFileTypeSet::create([
            'id'                    => 1,
            'db_area_id'            => 6,
            'bl_file_type_set_name' => "Test",
            'created_by'            => 'seed',
            'updated_by'            => 'seed',
            'created_at'            => '2019-05-10 11:00:00',
            'updated_at'            => '2019-05-10 11:00:00',
        ]);
        \App\Models\BL\BlFileTypeSet::create([
            'id'                    => 2,
            'db_area_id'            => 6,
            'bl_file_type_set_name' => "Test2",
            'created_by'            => 'seed',
            'updated_by'            => 'seed',
            'created_at'            => '2019-05-10 11:00:00',
            'updated_at'            => '2019-05-10 11:00:00',
        ]);
        \App\Models\BL\BlFileTypeSet::create([
            'id'                    => 3,
            'db_area_id'            => 6,
            'bl_file_type_set_name' => "Test3",
            'created_by'            => 'seed',
            'updated_by'            => 'seed',
            'created_at'            => '2019-05-10 11:00:00',
            'updated_at'            => '2019-05-10 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"BlFileTypeSets_id_seq\"', 10, true)");
        }
    }
}
