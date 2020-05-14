<?php

use Illuminate\Database\Seeder;

class BlFileTypeSetTabFileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\BL\BlFileTypeSetTabFileType::truncate();

        \App\Models\BL\BlFileTypeSetTabFileType::create([
            'id'                  => 1,
            'bl_file_type_set_id' => 1,
            'file_type_id'        => 1,
            'created_by'          => 'seed',
            'updated_by'          => 'seed',
            'created_at'          => '2019-05-10 11:00:00',
            'updated_at'          => '2019-05-10 11:00:00',
        ]);
        \App\Models\BL\BlFileTypeSetTabFileType::create([
            'id'                  => 2,
            'bl_file_type_set_id' => 1,
            'file_type_id'        => 4,
            'created_by'          => 'seed',
            'updated_by'          => 'seed',
            'created_at'          => '2019-05-10 11:00:00',
            'updated_at'          => '2019-05-10 11:00:00',
        ]);
        \App\Models\BL\BlFileTypeSetTabFileType::create([
            'id'                  => 3,
            'bl_file_type_set_id' => 1,
            'file_type_id'        => 10,
            'created_by'          => 'seed',
            'updated_by'          => 'seed',
            'created_at'          => '2019-05-10 11:00:00',
            'updated_at'          => '2019-05-10 11:00:00',
        ]);
        \App\Models\BL\BlFileTypeSetTabFileType::create([
            'id'                  => 4,
            'bl_file_type_set_id' => 2,
            'file_type_id'        => 5,
            'created_by'          => 'seed',
            'updated_by'          => 'seed',
            'created_at'          => '2019-05-10 11:00:00',
            'updated_at'          => '2019-05-10 11:00:00',
        ]);
        \App\Models\BL\BlFileTypeSetTabFileType::create([
            'id'                  => 5,
            'bl_file_type_set_id' => 2,
            'file_type_id'        => 6,
            'created_by'          => 'seed',
            'updated_by'          => 'seed',
            'created_at'          => '2019-05-10 11:00:00',
            'updated_at'          => '2019-05-10 11:00:00',
        ]);
        \App\Models\BL\BlFileTypeSetTabFileType::create([
            'id'                  => 6,
            'bl_file_type_set_id' => 2,
            'file_type_id'        => 7,
            'created_by'          => 'seed',
            'updated_by'          => 'seed',
            'created_at'          => '2019-05-10 11:00:00',
            'updated_at'          => '2019-05-10 11:00:00',
        ]);
        \App\Models\BL\BlFileTypeSetTabFileType::create([
            'id'                  => 7,
            'bl_file_type_set_id' => 2,
            'file_type_id'        => 8,
            'created_by'          => 'seed',
            'updated_by'          => 'seed',
            'created_at'          => '2019-05-10 11:00:00',
            'updated_at'          => '2019-05-10 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blFileTypeSetTabFileTypes_id_seq\"', 10, true)");
        }
    }
}
