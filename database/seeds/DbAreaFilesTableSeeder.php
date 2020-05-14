<?php

use Illuminate\Database\Seeder;

class DbAreaFilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DbAreaFile::truncate();

        //        \App\Models\DbAreaFile::create([
        //            'id'                 => 1,
        //            'db_area_file_name'  => "nature",
        //            'bl_att_doc_kind_id' => null,
        //            'table_n_owner'      => 13,
        //            'row_id_owner'       => 1,
        //            'table_n_doc'        => 81,
        //            'row_id_doc'         => 1,
        //            'db_area_id'         => 6,
        //            'created_by'         => NULL,
        //            'updated_by'         => NULL,
        //        ]);
        //        \App\Models\DbAreaFile::create([
        //            'id'                 => 2,
        //            'db_area_file_name'  => "nature2",
        //            'bl_att_doc_kind_id' => 2,
        //            'table_n_owner'      => 81,
        //            'row_id_owner'       => 1,
        //            'table_n_doc'        => 81,
        //            'row_id_doc'         => 1,
        //            'db_area_id'         => 6,
        //            'created_by'         => NULL,
        //            'updated_by'         => NULL,
        //        ]);
        //        \App\Models\DbAreaFile::create([
        //            'id'                 => 3,
        //            'db_area_file_name'  => "nature3",
        //            'bl_att_doc_kind_id' => 3,
        //            'table_n_owner'      => 14,
        //            'row_id_owner'       => 1,
        //            'table_n_doc'        => 81,
        //            'row_id_doc'         => 1,
        //            'db_area_id'         => 6,
        //            'created_by'         => NULL,
        //            'updated_by'         => NULL,
        //        ]);
        //        \App\Models\DbAreaFile::create([
        //            'id'                 => 4,
        //            'db_area_file_name'  => "nature1",
        //            'bl_att_doc_kind_id' => 1,
        //            'table_n_owner'      => 13,
        //            'row_id_owner'       => 1,
        //            'table_n_doc'        => 81,
        //            'row_id_doc'         => 1,
        //            'db_area_id'         => 6,
        //            'created_by'         => NULL,
        //            'updated_by'         => NULL,
        //        ]);

        /**/
        \App\Models\DbAreaFile::create([
            'id'                 => 1,
            'file_type_id'       => 185,
            'db_area_id'         => 0,
            'table_n_owner'      => NULL,
            'row_id_owner'       => NULL,
            'stored_file_id'     => 1,
            'bl_att_doc_kind_id' => NULL,
            'table_n_doc'        => 81,
            'row_id_doc'         => NULL,
            'db_area_file_name'  => 'Анкета',
            'uid_1c_code'        => 'rbl_download_profile_file',
            'deleted_l'          => 0,
            'created_by'         => 'seed',
            'updated_by'         => 'seed',
            'created_at'         => '2019-08-01 13:58:00',
            'updated_at'         => '2019-04-01 13:58:00',
        ]);


//        // --------------head  dev
//
//        /**/
//        \App\Models\DbAreaFile::create([
//                'id'                 => 2,
//                'file_type_id'       => 1,
//                'db_area_id'         => 6,
//                'table_n_owner'      => NULL,
//                'row_id_owner'       => NULL,
//            'stored_file_id'     => 4,
//
//            'bl_att_doc_kind_id' => 2,
//            'table_n_doc'        => 86,
//            'row_id_doc'         => 1,
//            'db_area_file_name'  => 'скан-копия',
//            'uid_1c_code'        => 'leasing_file',
//            'deleted_l'          => 0,
//            'created_by'         => 'seed',
//            'updated_by'         => 'seed',
//            'created_at'         => '2019-08-01 13:58:00',
//            'updated_at'         => '2019-04-01 13:58:00',
//        ]);
//
//        // -------------- END head  dev


        // --------------head   feature/demo
        /**/
        \App\Models\DbAreaFile::create([
            'id'                 => 2,
            'file_type_id'       => 1,
            'db_area_id'         => 6,
            'table_n_owner'      => NULL,
            'row_id_owner'       => NULL,

            'stored_file_id'     => 5,
             'bl_att_doc_kind_id' => 2,
            'table_n_doc'        => 86,
            'row_id_doc'         => 1,
            'db_area_file_name'  => 'скан-копия',
            'uid_1c_code'        => 'leasing_file',
            'deleted_l'          => 0,
            'created_by'         => 'seed',
            'updated_by'         => 'seed',
            'created_at'         => '2019-08-01 13:58:00',
            'updated_at'         => '2019-04-01 13:58:00',
        ]);
        // -------------- END head   feature/demo

        if(config("database.default") == "pgsql")
        {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"DbAreaFiles_id_seq\"', 2000, true)");
        }
    }
}
