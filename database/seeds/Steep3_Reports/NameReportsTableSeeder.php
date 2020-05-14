<?php

use Illuminate\Database\Seeder;

class NameReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\NameReport::truncate();

        \App\Models\NameReport::create([
            "name_report" => "ОборотноСальдоваяВедомость",
            "ru" => "Оборотно-сальдовая ведомость",
            "en" => "Trial Balance",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "ЗадолженностьПоставщикам",
            "ru" => "Задолженность поставщикам",
            "en" => "Accounts payables",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "АнализНеоплаченныхСчетовПокупателям",
            "ru" => "Анализ неоплаченных счетов покупателям",
            "en" => "Customers open invoices",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "ОстаткиТоваров",
            "ru" => "Остатки товаров ",
            "en" => "Inventory Balance",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "ДвижениеТоваров",
            "ru" => "Движение товаров",
            "en" => "Inventory",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "АнализДвиженийДенежныхСредств",
            "ru" => "Анализ движений денежных средств",
            "en" => "List of Cash Transactions",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "АнализНеоплаченныхСчетовПоставщиков",
            "ru" => "Анализ неоплаченных счетов поставщиков ",
            "en" => "Analysis unpaid supplier invoices",
        ]);

         \App\Models\NameReport::create([
             "name_report" => "_рарОборотноСальдоваяВедомостьПоЦеннымБумагам",
             "ru" => "Оборотно-сальдовая ведомость по ценным бумагам",
             "en" => "Trial Balance on Digital Assets",
         ]);

        \App\Models\NameReport::create([
            "name_report" => "_рарБухСправкаПереоценкиЦБ",
            "ru" => " Бухгалтерская справка переоценки ЦБ",
            "en" => "Digital Assets Fair Value revaluation",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "ЗадолженностьПокупателей",
            "ru" => "Задолженность покупателей",
            "en" => "Recievebles per contracts",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "_рарФинансовыйРезультат",
            "ru" => "Финансовый результат",
            "en" => "Financial results",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "_рарРегистрДоходовИРасходовПоТорговомуПортфелю",
            "ru" => "Регистр доходов и расходов по торговому портфелю",
            "en" => "The list of sales and purchase of Digital Assets",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "_рарРегистрУчетаДоходовРеализацииЦБ",
            "ru" => "Регистр учета доходов реализации ЦБ ",
            "en" => "Statement on sales of Digital Assets",
        ]);

        \App\Models\NameReport::create([
            "name_report" => "LT_ФинансовыйАнализ",
            "ru" => "Бухгалтерская отчетность",
            "en" => "Financial statements",
        ]);
    }
}
