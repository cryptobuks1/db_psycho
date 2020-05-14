<?php

use Illuminate\Database\Seeder;

class StoredFilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StoredFile::truncate();

        /**/
        \App\Models\StoredFile::create([
            'id' => 1,
            'file_type_id' => 185,
            'stored_file_code' => 'xlsm',
            'stored_file_name' => 'Анкета',
            'stored_file_extension' => 'xlsm',
            'stored_file_size' => NULL,
            'stored_file_mime' => 'data:application/vnd.ms-excel.sheet.macroEnabled.12;base64',
            'table_n' => 94,
            'row_id' => NULL,
            'stored_file_storage_type' => 0,
            'stored_file_path' => '/rbl_profile/Анкета.xlsm',
            'stored_file_bd' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-01 16:29:50',
            'updated_at' => '2019-08-01 16:29:50',
        ]);

        /**/
        \App\Models\StoredFile::create([
            'id' => 2,
            'file_type_id' => 2,
            'stored_file_code' => 'pdf',
            'stored_file_name' => 'invoice_example',
            'stored_file_extension' => 'pdf',
            'stored_file_size' => NULL,
            'stored_file_mime' => 'data:application/pdf;base64',
            'table_n' => '139',
            'row_id' => '1',
            'stored_file_storage_type' => '0',
            'stored_file_path' => '/files/Invoices/2019_08/invoice_example.pdf',
            'stored_file_bd' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-07 16:29:50',
            'updated_at' => '2019-08-07 16:29:50',
        ]);

        /**/
        \App\Models\StoredFile::create([
            'id' => 3,
            'file_type_id' => 2,
            'stored_file_code' => 'pdf',
            'stored_file_name' => 'acts_example',
            'stored_file_extension' => 'pdf',
            'stored_file_size' => NULL,
            'stored_file_mime' => 'data:application/pdf;base64',
            'table_n' => '138',
            'row_id' => '1',
            'stored_file_storage_type' => '0',
            'stored_file_path' => '/files/ServiceAcceptanceActs/2019_08/acts_example.pdf',
            'stored_file_bd' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-07 16:29:50',
            'updated_at' => '2019-08-07 16:29:50',
        ]);

        /**/
        \App\Models\StoredFile::create([
            'id' => 4,

            'file_type_id' => 2,
            'stored_file_code' => 'pdf',
            'stored_file_name' => 'invoice_example',
            'stored_file_extension' => 'pdf',
            'stored_file_size' => NULL,
            'stored_file_mime' => 'data:application/pdf;base64',
            'table_n' => '140',
            'row_id' => '1',
            'stored_file_storage_type' => '0',
            'stored_file_path' => '/files/PaymentInvoices/2019_08/invoice_example.pdf',
            'stored_file_bd' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-07 16:29:50',
            'updated_at' => '2019-08-07 16:29:50',
        ]);
        /**/
        \App\Models\StoredFile::create([
            'id' => 5,
            'file_type_id' => 1,
            'stored_file_code' => 'jpg',
            'stored_file_name' => 'скан-копия',
            'stored_file_extension' => 'jpg',
            'stored_file_size' => NULL,
            'stored_file_mime' => 'data:image/jpeg;base64',
            'table_n' => '94',
            'row_id' => '2',
            'stored_file_storage_type' => '0',
            'stored_file_path' => '/files/DbAreaFiles/2019_08/скан-копия.jpg',
            'stored_file_bd' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-07 16:29:50',
            'updated_at' => '2019-08-07 16:29:50',
        ]);


        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"StoredFiles_id_seq\"', 2000, true)");
        }
    }
}
