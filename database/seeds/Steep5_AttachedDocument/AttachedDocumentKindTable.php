<?php

use Illuminate\Database\Seeder;

class AttachedDocumentKindTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AttachedDocumentKind::truncate();
        \App\Models\AttachedDocumentKind::create( [
            'id'=>1,
            'att_doc_type_id'=>1,
            'att_doc_kind_code'=>'Паспорт',
            'att_doc_kind_name'=>'Паспорт',
            'use_file_titles_l'=>1,
            'att_doc_files_quantity'=>3,
            'db_area_id'=>NULL,
            'uid_1c_code'=>'1cd2da9d-ec00-11e8-b320-005056c00',
            'delete_l'=>"0",
            'created_by'=>NULL,
            'updated_by'=>'1',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\AttachedDocumentKind::create( [
            'id'=>2,
            'att_doc_type_id'=>1,
            'att_doc_kind_code'=>'ИНН',
            'att_doc_kind_name'=>'ИНН',
            'use_file_titles_l'=>1,
            'att_doc_files_quantity'=>1,
            'db_area_id'=>NULL,
            'uid_1c_code'=>'1cd2da9d-ec00-11e8-b320-005056c00008',
            'delete_l'=>"0",
            'created_by'=>NULL,
            'updated_by'=>'1',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\AttachedDocumentKind::create( [
            'id'=>3,
            'att_doc_type_id'=>1,
            'att_doc_kind_code'=>'NewDoc',
            'att_doc_kind_name'=>'NewDoc',
            'use_file_titles_l'=>1,
            'att_doc_files_quantity'=>3,
            'db_area_id'=>NULL,
            'uid_1c_code'=>'1cd2da9d',
            'delete_l'=>"0",
            'created_by'=>NULL,
            'updated_by'=>'1',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\AttachedDocumentKind::create( [
            'id'=>4,
            'att_doc_type_id'=>2,
            'att_doc_kind_code'=>'Doc',
            'att_doc_kind_name'=>'Doc',
            'use_file_titles_l'=>1,
            'att_doc_files_quantity'=>3,
            'db_area_id'=>NULL,
            'uid_1c_code'=>'824ab440-f3c1-11e8-a311-5812',
            'delete_l'=>"0",
            'created_by'=>NULL,
            'updated_by'=>'1',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );
    }
}
