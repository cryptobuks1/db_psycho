<?php

use Illuminate\Database\Seeder;

class BlContractorRequestTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlContractorRequestType::truncate();

//        \App\Models\BL\BlContractorRequestType::create([
//            //'id' => 1,
//            'db_area_id' => 6,
//            'bl_contractor_request_type_name' => 'Страхование',
//            'uid_1c_code' => '',
//            'actual_l' => 1,
//            'deleted_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-13 12:30:00',
//            'updated_at' => '2019-06-13 12:30:00',
//        ]);
//
//        /**/
//        \App\Models\BL\BlContractorRequestType::create([
//            //'id' => 2,
//            'db_area_id' => 6,
//            'bl_contractor_request_type_name' => 'Бухгалтерия',
//            'uid_1c_code' => '',
//            'actual_l' => 1,
//            'deleted_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-13 12:30:00',
//            'updated_at' => '2019-06-13 12:30:00',
//        ]);
//
//        /**/
//        \App\Models\BL\BlContractorRequestType::create([
//            //'id' => 3,
//            'db_area_id' => 6,
//            'bl_contractor_request_type_name' => 'Новое финансирование',
//            'uid_1c_code' => '',
//            'actual_l' => 1,
//            'deleted_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-13 12:30:00',
//            'updated_at' => '2019-06-13 12:30:00',
//        ]);
//
//        /**/
//        \App\Models\BL\BlContractorRequestType::create([
//            //'id' => 4,
//            'db_area_id' => 6,
//            'bl_contractor_request_type_name' => 'Прочее',
//            'uid_1c_code' => '',
//            'actual_l' => 1,
//            'deleted_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-13 12:30:00',
//            'updated_at' => '2019-06-13 12:30:00',
//        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Новое коммерческое предложение',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Изменение реквизитов',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Договор лизинга. Выкуп по окончании срока лизинга/досрочный выкуп',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Договор лизинга. Предоставление оригиналов ПТС/ПСМ',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Договор лизинга. Предоставление ключа',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Договор лизинга. Разрешение на субаренду',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Договор лизинга. Разрешение на изменение конструкции ТС',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Договор лизинга. Разрешение на выезд за границу',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Договор лизинга. Расчет пеней/штрафов',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Договор лизинга. Иные запросы',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Бухгалтерия. Справка о задолженности',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Бухгалтерия. Счета на оплату платежей',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Бухгалтерия. Счета-фактуры, акты оказания услуг',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Бухгалтерия. Запросы аудиторов',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Страхование. Страховой случай',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Страхование. Оформление договора страхования (новый /пролонгация)',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Страхование. Смена страховой компании при пролонгации договора страхования',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Страхование. Согласование условий договора страхования  ',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Страхование. Подтверждение страховки',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlContractorRequestType::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_contractor_request_type_name' => 'Страхование. Иные запросы',
            'uid_1c_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

//        if(config("database.default") == "pgsql"){
//
//            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blContractorRequestTypes_id_seq\"', 10, true)");
//        }
    }
}
