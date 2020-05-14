<?php

use Illuminate\Database\Seeder;

class InfoKindTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\InfoKind::truncate();

        \App\Models\InfoKind::create([
            'id' => 1,
            'info_type_id' => null,
            'info_kind_code' => "СправочникКонтактныеЛица",
            'info_kind_name' => "Контактная информация справочника \"Контактные лица\"",
            'parent_id' => null,
            'multiple_values_l' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 2,
            'info_type_id' => 5,
            'info_kind_code' => "АдресДляИнформированияКонтактныеЛица",
            'info_kind_name' => "Адрес для информирования",
            'parent_id' => 1,
            'multiple_values_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 3,
            'info_type_id' => 4,
            'info_kind_code' => "ТелефонМобильныйКонтактныеЛица",
            'info_kind_name' => "Телефон мобильный",
            'parent_id' => 1,
            'multiple_values_l' => true,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 4,
            'info_type_id' => 4,
            'info_kind_code' => "ТелефонРабочийКонтактныеЛица",
            'info_kind_name' => "Телефон рабочий",
            'parent_id' => 1,
            'multiple_values_l' => true,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 5,
            'info_type_id' => 2,
            'info_kind_code' => "EmailКонтактныеЛица",
            'info_kind_name' => "Email",
            'parent_id' => 1,
            'multiple_values_l' => true,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 6,
            'info_type_id' => 2,
            'info_kind_code' => "АдресОповещенияКонтактныеЛица",
            'info_kind_name' => "E-mail (для рассылок)",
            'parent_id' => 1,
            'multiple_values_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 7,
            'info_type_id' => 6,
            'info_kind_code' => "ДругаяИнформацияКонтактныеЛица",
            'info_kind_name' => "Другое (любая другая контактная информация)",
            'parent_id' => 1,
            'multiple_values_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 8,
            'info_type_id' => null,
            'info_kind_code' => "СправочникКонтрагенты",
            'info_kind_name' => "Контактная информация справочника \"Контрагенты\"",
            'parent_id' => null,
            'multiple_values_l' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 9,
            'info_type_id' => 5,
            'info_kind_code' => "ЮрАдресКонтрагента",
            'info_kind_name' => "Юридический адрес",
            'parent_id' => 8,
            'multiple_values_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 10,
            'info_type_id' => 5,
            'info_kind_code' => "ФактАдресКонтрагента",
            'info_kind_name' => "Фактический адрес",
            'parent_id' => 8,
            'multiple_values_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 11,
            'info_type_id' => 5,
            'info_kind_code' => "ПочтовыйАдресКонтрагента",
            'info_kind_name' => "Почтовый адрес",
            'parent_id' => 8,
            'multiple_values_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 12,
            'info_type_id' => 4,
            'info_kind_code' => "ТелефонКонтрагента",
            'info_kind_name' => "Телефон",
            'parent_id' => 8,
            'multiple_values_l' => true,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 13,
            'info_type_id' => 3,
            'info_kind_code' => "ФаксКонтрагенты",
            'info_kind_name' => "Факс",
            'parent_id' => 8,
            'multiple_values_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 14,
            'info_type_id' => 2,
            'info_kind_code' => "EmailКонтрагенты",
            'info_kind_name' => "Email",
            'parent_id' => 8,
            'multiple_values_l' => true,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

        \App\Models\InfoKind::create([
            'id' => 15,
            'info_type_id' => 6,
            'info_kind_code' => "ДругаяИнформацияКонтрагенты",
            'info_kind_name' => "Другое (любая другая контактная информация)",
            'parent_id' => 8,
            'multiple_values_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 16:20:00',
            'updated_at' => '2020-01-14 16:20:00',
        ]);

//        \App\Models\InfoKind::create([
//            'id' => 3,
//            'info_type_id' => null,
//            'info_kind_code' => "СправочникОрганизации",
//            'info_kind_name' => "Контактная информация справочника \"Организации\"",
//            'parent_id' => null,
//            'multiple_values_l' => null,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 4,
//            'info_type_id' => null,
//            'info_kind_code' => "СправочникОсновныеСредства",
//            'info_kind_name' => "Контактная информация справочника \"Основные средства\"",
//            'parent_id' => null,
//            'multiple_values_l' => null,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 5,
//            'info_type_id' => null,
//            'info_kind_code' => "СправочникПодразделенияОрганизаций",
//            'info_kind_name' => "Контактная информация справочника \"Подразделения организаций\"",
//            'parent_id' => null,
//            'multiple_values_l' => null,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 6,
//            'info_type_id' => null,
//            'info_kind_code' => "СправочникПользователи",
//            'info_kind_name' => "Контактная информация справочника \"Пользователи\"",
//            'parent_id' => null,
//            'multiple_values_l' => null,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 7,
//            'info_type_id' => null,
//            'info_kind_code' => "СправочникТорговыеТочки",
//            'info_kind_name' => "Контактная информация справочника \"Торговые точки\"",
//            'parent_id' => null,
//            'multiple_values_l' => null,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 8,
//            'info_type_id' => null,
//            'info_kind_code' => "СправочникФизическиеЛица",
//            'info_kind_name' => "Контактная информация справочника \"Физические лица\"",
//            'parent_id' => null,
//            'multiple_values_l' => null,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 9,
//            'info_type_id' => null,
//            'info_kind_code' => "ПроспектПочтовыйАдресКонтрагента",
//            'info_kind_name' => "Проспект почтовый адрес",
//            'parent_id' => 2,
//            'multiple_values_l' => false,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 10,
//            'info_type_id' => null,
//            'info_kind_code' => "ПроспектФактАдресКонтрагента",
//            'info_kind_name' => "Проспект фактический адрес",
//            'parent_id' => 2,
//            'multiple_values_l' => false,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 11,
//            'info_type_id' => null,
//            'info_kind_code' => "ПроспектЮрАдресКонтрагента",
//            'info_kind_name' => "Проспект юридический адрес",
//            'parent_id' => 2,
//            'multiple_values_l' => false,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);
//
//        \App\Models\InfoKind::create([
//            'id' => 11,
//            'info_type_id' => null,
//            'info_kind_code' => "ПроспектЮрАдресКонтрагента",
//            'info_kind_name' => "Проспект юридический адрес",
//            'parent_id' => 2,
//            'multiple_values_l' => false,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2020-01-14 16:20:00',
//            'updated_at' => '2020-01-14 16:20:00',
//        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_InfoKinds_id_seq\"', 1000, true)");
        }
    }
}
