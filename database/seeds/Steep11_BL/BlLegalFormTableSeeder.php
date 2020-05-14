<?php

use Illuminate\Database\Seeder;

class BlLegalFormTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlLegalForm::truncate();

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\BL\BlLegalForm::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'АО',
            'bl_legal_form_full_name' => 'Акционерное общество',
            'uid_1c_code' => '80fff921-1c77-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 2,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'Государственная компания',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986580-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 3,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'ГУП',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986581-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 4,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'ЗАО',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986582-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 5,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'Иностранное предприятие',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986583-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 6,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'ИП',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986584-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 7,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'КФХ',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986585-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 8,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'МУП',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986586-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 9,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'ОАО',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986587-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 10,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'ООО',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986588-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 11,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'ПАО',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a4986589-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 12,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'Производственный кооператив',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a498658a-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 13,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'СПАО',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => '3cef7bd6-3e39-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 14,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'ФГУП',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a498658b-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLegalForm::create([
            'id' => 15,
            'db_area_id' => 6,
            'bl_legal_form_name' => 'Физическое лицо',
            'bl_legal_form_full_name' => '',
            'uid_1c_code' => 'a498658c-e724-11e7-9e01-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLegalForms_id_seq\"', 20, true)");

        }
    }
}
