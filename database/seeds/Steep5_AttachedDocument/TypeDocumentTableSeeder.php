<?php

use Illuminate\Database\Seeder;

class TypeDocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AttachedDocumentType::truncate();

        \App\Models\AttachedDocumentType::create([
            'id' => 1,
            'att_doc_type_name' => 'Документы Физиеских Лиц',
            'att_doc_type_code' => 'ДокументыФизиескихЛиц',
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ]);

        \App\Models\AttachedDocumentType::create([
            'id' => 2,
            'att_doc_type_name' => 'Документы Юридических Лиц',
            'att_doc_type_code' => 'ДокументыЮридическихЛиц',
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ]);

        \App\Models\AttachedDocumentType::create([
            'id' => 3,
            'att_doc_type_name' => 'Договора',
            'att_doc_type_code' => 'Договора',
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ]);

        \App\Models\AttachedDocumentType::create([
            'id' => 4,
            'att_doc_type_name' => 'Прочее',
            'att_doc_type_code' => 'Прочее',
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ]);
    }
}
