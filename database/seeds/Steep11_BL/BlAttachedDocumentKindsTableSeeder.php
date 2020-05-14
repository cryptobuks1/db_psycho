<?php

use Illuminate\Database\Seeder;

class BlAttachedDocumentKindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlAttachedDocumentKind::truncate();

        \App\Models\BL\BlAttachedDocumentKind::create([
            'id'                    => 1,
            'bl_att_doc_kind_name'  => "Анкета клиента",
            'bl_att_doc_file_size'  => 3072,
            'bl_att_doc_periodic_l' => false,
            'bl_file_type_set_id'   => 1,
            'db_area_id'            => 6,
            'deleted_l'           => false,
            'uid_1c_code'            => '32683968-2c4f-11e8-80f8-005056986dc1',
            'created_by'            => 'seeds',
            'updated_by'            => 'seeds',

        ]);

        \App\Models\BL\BlAttachedDocumentKind::create([
            'id'                   => 2,
            'bl_att_doc_kind_name' => "Паспорт (1-3 стр.)",
            'bl_att_doc_file_size' => 1024,
            'bl_att_doc_periodic_l' => false,
            'bl_file_type_set_id'  => 2,
            'db_area_id'           => 6,
            'deleted_l'           => false,
            'uid_1c_code'            => '63f03e1b-3ebf-11ea-a042-708bcda427ce',
            'created_by'           => 'seeds',
            'updated_by'           => 'seeds',

        ]);

        \App\Models\BL\BlAttachedDocumentKind::create([
            'id'                   => 3,
            'bl_att_doc_kind_name' => "Другие документы",
            'bl_att_doc_file_size'  => null,
            'bl_att_doc_periodic_l' => false,
            'db_area_id'           => 6,
            'deleted_l'           => false,
            'created_by'           => 'seeds',
            'updated_by'           => 'seeds',

        ]);

        \App\Models\BL\BlAttachedDocumentKind::create([
            'id'                   => 4,
            'bl_att_doc_kind_name' => "Ксерокопия паспорта индивидуального предпринимателя",
            'bl_att_doc_file_size' => null,
            'bl_att_doc_periodic_l' => false,
            'bl_file_type_set_id'  => null,
            'db_area_id'           => 6,
            'deleted_l'           => false,
            'uid_1c_code'            => 'bda03a74-d8ea-11e7-9324-00155d140c02',
            'created_by'           => 'seeds',
            'updated_by'           => 'seeds',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"BlAttachedDocumentKinds_id_seq\"', 10, true)");
        }
    }
}
