<?php

use Illuminate\Database\Seeder;

class AttachedDocumentFileTitleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AttachedDocumentFileTitle::truncate();

        \App\Models\AttachedDocumentFileTitle::create( [

            'att_doc_title_name'=>'Паспорт1-2',
            'att_doc_kind_id'=>1,
            'uid_1c_code'=>NULL,
            'delete_l'=>"0"
        ] );



        \App\Models\AttachedDocumentFileTitle::create( [

            'att_doc_title_name'=>'Паспорт3-4',
            'att_doc_kind_id'=>1,
            'uid_1c_code'=>NULL,
            'delete_l'=>"0"
        ] );



        \App\Models\AttachedDocumentFileTitle::create( [

            'att_doc_title_name'=>'911_Паспорт_ФЛ',
            'att_doc_kind_id'=>1,
            'uid_1c_code'=>"65476403-2f9e-11e9-9444-005458",
            'delete_l'=>"0"
        ] );
    }
}
