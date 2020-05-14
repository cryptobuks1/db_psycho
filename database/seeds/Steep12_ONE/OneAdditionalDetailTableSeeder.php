<?php

use Illuminate\Database\Seeder;

class OneAdditionalDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ONE\OneAdditionalDetail::truncate();

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 1,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Валюта аванса',
            'uid_1c_code' => '0146c951-85e9-11e8-80fd-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 2,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Валюта ДЛ',
            'uid_1c_code' => '0146c952-85e9-11e8-80fd-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 3,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Валюта имущества',
            'uid_1c_code' => '0146c954-85e9-11e8-80fd-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 4,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Валюта финансировния',
            'uid_1c_code' => '0146c953-85e9-11e8-80fd-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 5,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Вариант страхования',
            'uid_1c_code' => 'f3ff948c-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 6,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Госпошлина',
            'uid_1c_code' => 'f3ff948d-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 7,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Дата договора лизинга',
            'uid_1c_code' => 'f3ff949b-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 8,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Дата начала лизинга',
            'uid_1c_code' => 'f3ff9497-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 9,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Дата первого платежа',
            'uid_1c_code' => 'f3ff949a-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 10,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Есть агент',
            'uid_1c_code' => 'f3ff949c-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 11,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Есть расходы на трекер',
            'uid_1c_code' => 'f3ff949f-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 12,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Есть субсидия',
            'uid_1c_code' => 'f3ff948a-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 13,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Есть франшиза',
            'uid_1c_code' => 'f3ff9493-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 14,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Имущество на балансе лизингодателя',
            'uid_1c_code' => 'e6009a0e-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 15,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Итог НДС на аванс',
            'uid_1c_code' => '7a0450e9-0863-11e9-810d-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 16,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Лизинговая ставка',
            'uid_1c_code' => 'e6009a10-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 17,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Лизинговый продукт',
            'uid_1c_code' => 'f3ff9492-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 18,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Процент аванса',
            'uid_1c_code' => 'e6009a17-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 19,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Расходы на регистрацию',
            'uid_1c_code' => 'f3ff9495-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 20,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Срок лизинга',
            'uid_1c_code' => 'e6009a1a-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 21,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Срок поставки по ДКП',
            'uid_1c_code' => 'f3ff9496-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 22,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Ставка агента',
            'uid_1c_code' => 'f3ff9498-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 23,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Ставка кредитования',
            'uid_1c_code' => 'f3ff948b-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 24,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Ставка маржи',
            'uid_1c_code' => 'e6009a1b-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 25,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Ставка НДС поставки',
            'uid_1c_code' => '7a0450ea-0863-11e9-810d-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 26,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Ставка НДС расчета',
            'uid_1c_code' => '7a0450e7-0863-11e9-810d-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 27,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Ставка страхования',
            'uid_1c_code' => 'f3ff949e-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 28,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Ставка удорожания',
            'uid_1c_code' => 'f3ff9499-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 29,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Стоимость имущества',
            'uid_1c_code' => 'e6009a1c-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 30,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Стоимость КАСКО',
            'uid_1c_code' => 'f3ff9491-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 31,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сторона гос регистрации лизингодатель',
            'uid_1c_code' => 'e6009a1d-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 32,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Страховая компания',
            'uid_1c_code' => 'e6009a1e-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 33,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Страховая компания (наименование)',
            'uid_1c_code' => 'f9ef74dd-963e-11e8-80fe-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 34,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Страхует лизингодатель',
            'uid_1c_code' => 'e6009a1f-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 35,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сумма аванса',
            'uid_1c_code' => 'f3ff948e-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 36,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сумма агентского вознаграждения',
            'uid_1c_code' => 'e6009a20-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 37,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сумма договора лизинга',
            'uid_1c_code' => 'e6009a21-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 38,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сумма налога на имущество',
            'uid_1c_code' => 'f3ff949d-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 39,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сумма расходов на трекер',
            'uid_1c_code' => 'f3ff9494-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 40,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сумма субсидии',
            'uid_1c_code' => 'f3ff9490-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 41,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сумма финансирования',
            'uid_1c_code' => 'e6009a23-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 42,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Сумма франшизы',
            'uid_1c_code' => 'f3ff948f-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 43,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Тип платежа',
            'uid_1c_code' => 'e6009a24-d6ae-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 44,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Транспортный налог',
            'uid_1c_code' => 'f3ff94a0-2609-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\ONE\OneAdditionalDetail::create([
            'id' => 45,
            'db_area_id' => 6,
            'one_add_detail_name' => 'Учитывать изменение ставки НДС',
            'uid_1c_code' => '7a0450e8-0863-11e9-810d-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"OneAdditionalDetail_id_seq\"', 2000, true)");
        }
    }
}
