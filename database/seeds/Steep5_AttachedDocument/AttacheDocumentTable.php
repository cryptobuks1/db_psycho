<?php

use Illuminate\Database\Seeder;

class AttacheDocumentTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AttachedDocument::truncate();
        \App\Models\AttachedDocument::create( [
            'id'=>1,
            'att_doc_name'=>'ПаспортМинияр',
            'att_doc_kind_id'=>1,
            'att_doc_type_id'=>1,
            'actual_l'=>1,
            'deleted_l'=>"0",
            'table_n'=>'2',
            'row_id'=>1,
            'uid_1c_code'=>NULL
        ] );

        \App\Models\AttachedDocument::create( [
            'id'=>2,
            'att_doc_name'=>'ИННМинияр',
            'att_doc_kind_id'=>2,
            'att_doc_type_id'=>1,
            'actual_l'=>1,
            'deleted_l'=>"0",
            'table_n'=>'2',
            'row_id'=>1,
            'uid_1c_code'=>NULL
        ] );

        \App\Models\AttachedDocument::create( [
            'id'=>3,
            'att_doc_name'=>'НовыйДокумент',
            'att_doc_kind_id'=>3,
            'att_doc_type_id'=>1,
            'actual_l'=>1,
            'deleted_l'=>"0",
            'table_n'=>'2',
            'row_id'=>1,
            'uid_1c_code'=>NULL
        ] );

        \App\Models\AttachedDocument::create( [
            'id'=>14,
            'att_doc_name'=>'911 Паспорт ФЛ 000000001',
            'att_doc_kind_id'=>2,
            'att_doc_type_id'=>1,
            'actual_l'=>1,
            'deleted_l'=>"0",
            'table_n'=>'2',
            'row_id'=>1,
            'uid_1c_code'=>'6de3c8d0-e291-11e8-a3bf-005056c00008'
        ] );
    }
}
