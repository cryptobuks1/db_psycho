<?php

use Illuminate\Database\Seeder;

class SystemParametersValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SystemParameterValue::truncate();

        \App\Models\SystemParameterValue::create([
            'id' => 1,
            'sys_par_code' => 'TypeExtVerification',
            'sys_par_id' => 1,
            'sys_par_allow_val_option' => 0,
            'sys_par_allow_val_rem' => '0 - верификация по общей схеме. При этом высылается 2 письма. Первое Login и Password, с комментарием, что вам будет выслано письмо с верификацией. Второе - собственно ссылка на верификацию.',
            'sys_par_type'=>'integer'
        ]);

        \App\Models\SystemParameterValue::create([
            'id' => 2,
            'sys_par_code' => 'TypeExtVerification',
            'sys_par_id' => 1,
            'sys_par_allow_val_option' => 1,
            'sys_par_allow_val_rem' => '  1 - без верификации, но с уведомлением по почте. При этом высылается Login и Password, БЕЗ комментария, что вам будет выслано письмо с верификацией',
            'sys_par_type'=>'integer'
        ]);

        \App\Models\SystemParameterValue::create([
            'id' => 3,
            'sys_par_code' => 'TypeExtVerification',
            'sys_par_id' => 1,
            'sys_par_allow_val_option' => 2,
            'sys_par_allow_val_rem' => '  2 - без верификации и без уведомления по почте.',
            'sys_par_type'=>'integer'
        ]);

        \App\Models\SystemParameterValue::create([
            'id' => 4,
            'sys_par_code' => 'CheckInUseCaptcha',
            'sys_par_id' => 3,
            'sys_par_allow_val_option' => 'TRUE',
            'sys_par_allow_val_rem' => 'TRUE - Использовать CAPTCHA при регистрации',
            'sys_par_type'=>'boolean'
        ]);

        \App\Models\SystemParameterValue::create([
            'id' => 5,
            'sys_par_code' => 'CheckInUseCaptcha',
            'sys_par_id' => 3,
            'sys_par_allow_val_option' => 'FALSE',
            'sys_par_allow_val_rem' => 'FALSE - Не использовать CAPTCHA при регистрации',
            'sys_par_type'=>'boolean'
        ]);

        \App\Models\SystemParameterValue::create([
            'id' => 6,
            'sys_par_code' => 'ExtVerificationTypeSystem',
            'sys_par_id' => 8,
            'sys_par_allow_val_option' => '0',
            'sys_par_allow_val_rem' => '0 - верификация по общей схеме',
            'sys_par_type'=>'integer'
        ]);

        \App\Models\SystemParameterValue::create([
            'id' => 7,
            'sys_par_code' => 'ExtVerificationTypeSystem',
            'sys_par_id' => 8,
            'sys_par_allow_val_option' => '1',
            'sys_par_allow_val_rem' => '1 - без верификации, но с уведомлением по почте',
            'sys_par_type'=>'integer'
        ]);


        \App\Models\SystemParameterValue::create([
            'id' => 8,
            'sys_par_code' => 'ExtVerificationTypeSystem',
            'sys_par_id' => 8,
            'sys_par_allow_val_option' => '2',
            'sys_par_allow_val_rem' => '2 - без верификации и без уведомлений по почте',
            'sys_par_type'=>'integer'
        ]);


        \App\Models\SystemParameterValue::create([
            'id' => 9,
            'sys_par_code' => 'StorageTypeSystem',
            'sys_par_id' => 9,
            'sys_par_allow_val_option' => '0',
            'sys_par_allow_val_rem' => '0 - сохранять в папку проекта',
            'sys_par_type'=>'integer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 09:00:00',
            'updated_at' => '2019-06-06 09:00:00',
        ]);


        \App\Models\SystemParameterValue::create([
            'id' => 10,
            'sys_par_code' => 'StorageTypeSystem',
            'sys_par_id' => 9,
            'sys_par_allow_val_option' => '1',
            'sys_par_allow_val_rem' => '1 - сохранять в базу проекта',
            'sys_par_type'=>'integer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 09:00:00',
            'updated_at' => '2019-06-06 09:00:00',
        ]);
    }
}
