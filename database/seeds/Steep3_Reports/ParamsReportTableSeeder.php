<?php

use Illuminate\Database\Seeder;

class ParamsReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\ParamReport::truncate();

        \App\Models\ParamReport::create([
            "name_param" => "Организация",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "НачалоПериода",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "КонецПериода",
        ]);

        \App\Models\ParamReport::create([
             "name_param" => "ВключатьОбособленныеПодразделения",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоСубсчетам",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ВыводитьЗабалансовыеСчета",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "РазмещениеДополнительныхПолей",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательБУ",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательНУ",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательПР",
        ]);

         \App\Models\ParamReport::create([
             "name_param" => "ПоказательВР",
         ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательКонтроль",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательВалютнаяСумма",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "РежимРасшифровки",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ВыводитьНаименованиеСчета",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ВертикальнаяГруппировкаПоСкладам",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательСумма",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательКоличество",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательПоступление",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "ПоказательРасход",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "КотировкаР",
        ]);

        \App\Models\ParamReport::create([
            "name_param" => "МестоХранения",
        ]);
    }
}
