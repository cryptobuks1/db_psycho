<?php

use Illuminate\Database\Seeder;

class AttachedDocumentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AttachedDocumentType::truncate();

        \App\Models\AttachedDocumentType::create( [
            'id'=>'2',
            'att_doc_type_code'=>'ДокументыФизическихЛиц',
            'att_doc_type_name'=>'ДокументыФизическихЛиц',
            'delete_l'=>NULL,
        ] );
    }
}
