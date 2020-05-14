<?php

use Illuminate\Database\Seeder;

class BlRequiredDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\BL\BlRequiredDocument::truncate();

        \App\Models\BL\BlRequiredDocument::create([
            'id'                 => 1,
            'table_n_doc'        => 81,
            'row_id_doc'         => 1,
            'bl_att_doc_kind_id' => 1,
            'db_area_id'         => 6,
            'created_by'         => 'seeds',
            'updated_by'         => 'seeds',
            'register_key'         => 'f32d0811-1b1b-11e9-810d-005056986dc132683968-2c4f-11e8-80f8-005056986dc1',

        ]);

        \App\Models\BL\BlRequiredDocument::create([
            'id'                 => 2,
            'table_n_doc'        => 81,
            'row_id_doc'         => 1,
            'bl_att_doc_kind_id' => 2,
            'db_area_id'         => 6,
            'created_by'         => 'seeds',
            'updated_by'         => 'seeds',
            'register_key'         => 'f32d0811-1b1b-11e9-810d-005056986dc163f03e1b-3ebf-11ea-a042-708bcda427ce',

        ]);

        \App\Models\BL\BlRequiredDocument::create([
            'id'                 => 3,
            'table_n_doc'        => 81,
            'row_id_doc'         => 2,
            'bl_att_doc_kind_id' => 1,
            'db_area_id'         => 6,
            'created_by'         => 'seeds',
            'updated_by'         => 'seeds',
            'register_key'         => '006d40be-3d1c-11ea-9d69-708bcda427ce32683968-2c4f-11e8-80f8-005056986dc1',

        ]);

        \App\Models\BL\BlRequiredDocument::create([
            'id'                 => 4,
            'table_n_doc'        => 81,
            'row_id_doc'         => 2,
            'bl_att_doc_kind_id' => 4,
            'db_area_id'         => 6,
            'created_by'         => 'seeds',
            'updated_by'         => 'seeds',
            'register_key'         => '006d40be-3d1c-11ea-9d69-708bcda427cebda03a74-d8ea-11e7-9324-00155d140c02',

        ]);


        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"BlRequiredDocuments_id_seq\"', 10, true)");
        }
    }
}
