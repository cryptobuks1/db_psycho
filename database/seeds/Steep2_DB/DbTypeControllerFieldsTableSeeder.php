<?php

use Illuminate\Database\Seeder;

class DbTypeControllerFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DbTypeControllerField::truncate();


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 1,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'individual_l',
            'field_alias' => 'individual_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 2,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_full_name',
            'field_alias' => 'contractor_full_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 3,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_short_name',
            'field_alias' => 'contractor_short_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 4,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'taxpayer_number',
            'field_alias' => 'taxpayer_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 5,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'code_reason_number',
            'field_alias' => 'code_reason_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 6,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'registry_number',
            'field_alias' => 'registry_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 7,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'social_security_number',
            'field_alias' => 'social_security_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 8,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'entrepreneur_certificate',
            'field_alias' => 'entrepreneur_certificate',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 9,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'entrepreneur_certificate_date',
            'field_alias' => 'entrepreneur_certificate_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 10,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 11,
            'db_type_controller_id' => 1,
            'data_type_id' => 39,
            'table_field_name' => 'country_id',
            'field_alias' => 'country_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 13,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'info_kind_id',
            'field_alias' => 'info_kind_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 14,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'region_id',
            'field_alias' => 'region_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 15,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'info_type_id',
            'field_alias' => 'info_type_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 16,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'country_id',
            'field_alias' => 'country_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 18,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'representation',
            'field_alias' => 'representation',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 19,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'city_name',
            'field_alias' => 'city_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 20,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'email',
            'field_alias' => 'e_mail',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 21,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'url_name',
            'field_alias' => 'url_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 22,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'phone_number',
            'field_alias' => 'phone_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 23,
            'db_type_controller_id' => 2,
            'data_type_id' => 39,
            'table_field_name' => 'phone_number_without_codes',
            'field_alias' => 'phone_number_without_codes',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 25,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'country_id',
            'field_alias' => 'country_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 26,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'individual_l',
            'field_alias' => 'individual_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 27,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'company_full_name',
            'field_alias' => 'company_full_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 28,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'company_short_name',
            'field_alias' => 'company_short_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 29,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'taxpayer_number',
            'field_alias' => 'taxpayer_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 30,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'code_reason_number',
            'field_alias' => 'code_reason_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 31,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'registry_number',
            'field_alias' => 'registry_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 32,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'social_security_number',
            'field_alias' => 'social_security_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 33,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'entrepreneur_certificate',
            'field_alias' => 'entrepreneur_certificate',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 34,
            'db_type_controller_id' => 3,
            'data_type_id' => 39,
            'table_field_name' => 'entrepreneur_certificate_date',
            'field_alias' => 'entrepreneur_certificate_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 36,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'region_id',
            'field_alias' => 'region_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 37,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'info_type_id',
            'field_alias' => 'info_type_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 38,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'country_id',
            'field_alias' => 'country_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 39,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'info_kind_id',
            'field_alias' => 'info_kind_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 41,
            'db_type_controller_id' => 4,
            'data_type_id' => 40,
            'table_field_name' => 'representation',
            'field_alias' => 'representation',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 42,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'city_name',
            'field_alias' => 'city_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 43,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'e_mail',
            'field_alias' => 'e_mail',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 44,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'url_name',
            'field_alias' => 'url_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 45,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'phone_number',
            'field_alias' => 'phone_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 46,
            'db_type_controller_id' => 4,
            'data_type_id' => 39,
            'table_field_name' => 'phone_number_without_codes',
            'field_alias' => 'phone_number_without_codes',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 48,
            'db_type_controller_id' => 5,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 49,
            'db_type_controller_id' => 5,
            'data_type_id' => 39,
            'table_field_name' => 'row_id',
            'field_alias' => 'row_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 50,
            'db_type_controller_id' => 5,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_name',
            'field_alias' => 'contractor_contract_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 51,
            'db_type_controller_id' => 5,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_date',
            'field_alias' => 'contractor_contract_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 52,
            'db_type_controller_id' => 5,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_number',
            'field_alias' => 'contractor_contract_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 53,
            'db_type_controller_id' => 5,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_expiration_date',
            'field_alias' => 'contractor_contract_expiration_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 54,
            'db_type_controller_id' => 5,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 56,
            'db_type_controller_id' => 6,
            'data_type_id' => 39,
            'table_field_name' => 'country_name',
            'field_alias' => 'country_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 57,
            'db_type_controller_id' => 6,
            'data_type_id' => 39,
            'table_field_name' => 'country_full_name',
            'field_alias' => 'country_full_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 58,
            'db_type_controller_id' => 6,
            'data_type_id' => 39,
            'table_field_name' => 'country_code',
            'field_alias' => 'country_code',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 59,
            'db_type_controller_id' => 6,
            'data_type_id' => 39,
            'table_field_name' => 'country_code_alpha2',
            'field_alias' => 'country_code_alpha2',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 60,
            'db_type_controller_id' => 6,
            'data_type_id' => 39,
            'table_field_name' => 'country_code_alpha3',
            'field_alias' => 'country_code_alpha3',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 61,
            'db_type_controller_id' => 6,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 63,
            'db_type_controller_id' => 7,
            'data_type_id' => 39,
            'table_field_name' => 'info_type_id',
            'field_alias' => 'info_type_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 64,
            'db_type_controller_id' => 7,
            'data_type_id' => 39,
            'table_field_name' => 'info_kind_code',
            'field_alias' => 'info_kind_code',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 65,
            'db_type_controller_id' => 7,
            'data_type_id' => 39,
            'table_field_name' => 'info_kind_name',
            'field_alias' => 'info_kind_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 67,
            'db_type_controller_id' => 8,
            'data_type_id' => 39,
            'table_field_name' => 'info_type_code',
            'field_alias' => 'info_type_code',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 68,
            'db_type_controller_id' => 8,
            'data_type_id' => 39,
            'table_field_name' => 'info_type_name',
            'field_alias' => 'info_type_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 70,
            'db_type_controller_id' => 10,
            'data_type_id' => 39,
            'table_field_name' => 'bl_contractor_request_type_name',
            'field_alias' => 'bl_contractor_request_type_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 71,
            'db_type_controller_id' => 10,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 72,
            'db_type_controller_id' => 10,
            'data_type_id' => 39,
            'table_field_name' => 'e_mail',
            'field_alias' => 'e_mail',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 74,
            'db_type_controller_id' => 11,
            'data_type_id' => 39,
            'table_field_name' => 'bl_contractor_request_description',
            'field_alias' => 'bl_contractor_request_description',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 75,
            'db_type_controller_id' => 11,
            'data_type_id' => 39,
            'table_field_name' => 'bl_contractor_request_title',
            'field_alias' => 'bl_contractor_request_title',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 76,
            'db_type_controller_id' => 11,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 77,
            'db_type_controller_id' => 11,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 78,
            'db_type_controller_id' => 11,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 79,
            'db_type_controller_id' => 11,
            'data_type_id' => 39,
            'table_field_name' => 'bl_status_id',
            'field_alias' => 'bl_status_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 80,
            'db_type_controller_id' => 11,
            'data_type_id' => 39,
            'table_field_name' => 'bl_contractor_request_type_id',
            'field_alias' => 'bl_contractor_request_type_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 82,
            'db_type_controller_id' => 12,
            'data_type_id' => 39,
            'table_field_name' => 'bl_status_name',
            'field_alias' => 'bl_status_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 83,
            'db_type_controller_id' => 12,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 85,
            'db_type_controller_id' => 13,
            'data_type_id' => 39,
            'table_field_name' => 'file_type_id',
            'field_alias' => 'file_type_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 86,
            'db_type_controller_id' => 13,
            'data_type_id' => 39,
            'table_field_name' => 'row_id_owner',
            'field_alias' => 'row_id_owner',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 87,
            'db_type_controller_id' => 13,
            'data_type_id' => 57,
            'table_field_name' => 'stored_file_id',
            'field_alias' => 'stored_file_id',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 88,
            'db_type_controller_id' => 13,
            'data_type_id' => 39,
            'table_field_name' => 'bl_att_doc_kind_id',
            'field_alias' => 'bl_att_doc_kind_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 89,
            'db_type_controller_id' => 13,
            'data_type_id' => 39,
            'table_field_name' => 'row_id_doc',
            'field_alias' => 'row_id_doc',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 90,
            'db_type_controller_id' => 13,
            'data_type_id' => 39,
            'table_field_name' => 'db_area_file_name',
            'field_alias' => 'db_area_file_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 91,
            'db_type_controller_id' => 13,
            'data_type_id' => 39,
            'table_field_name' => 'actual_l',
            'field_alias' => 'actual_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:01',
            'updated_at' => '2019-07-01 13:58:01',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 92,
            'db_type_controller_id' => 13,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 94,
            'db_type_controller_id' => 14,
            'data_type_id' => 39,
            'table_field_name' => 'bl_file_type_set_id',
            'field_alias' => 'bl_file_type_set_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 95,
            'db_type_controller_id' => 14,
            'data_type_id' => 39,
            'table_field_name' => 'bl_att_doc_kind_name',
            'field_alias' => 'bl_att_doc_kind_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 96,
            'db_type_controller_id' => 14,
            'data_type_id' => 39,
            'table_field_name' => 'bl_att_doc_file_size',
            'field_alias' => 'bl_att_doc_file_size',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 97,
            'db_type_controller_id' => 14,
            'data_type_id' => 39,
            'table_field_name' => 'bl_att_doc_periodic_l',
            'field_alias' => 'bl_att_doc_periodic_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 98,
            'db_type_controller_id' => 14,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 100,
            'db_type_controller_id' => 15,
            'data_type_id' => 39,
            'table_field_name' => 'bl_file_type_set_name',
            'field_alias' => 'bl_file_type_set_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 101,
            'db_type_controller_id' => 15,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-01 13:58:00',
            'updated_at' => '2019-07-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 103,
            'db_type_controller_id' => 16,
            'data_type_id' => 39,
            'table_field_name' => 'file_type_id',
            'field_alias' => 'file_type_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 106,
            'db_type_controller_id' => 17,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_group_name',
            'field_alias' => 'bl_leasing_object_group_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 107,
            'db_type_controller_id' => 17,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 109,
            'db_type_controller_id' => 18,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_type_name',
            'field_alias' => 'bl_leasing_object_type_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 110,
            'db_type_controller_id' => 18,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_type_name_en',
            'field_alias' => 'bl_leasing_object_type_name_en',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 111,
            'db_type_controller_id' => 18,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 114,
            'db_type_controller_id' => 19,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_brand_name',
            'field_alias' => 'bl_leasing_object_brand_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 115,
            'db_type_controller_id' => 19,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_brand_full_name',
            'field_alias' => 'bl_leasing_object_brand_full_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 116,
            'db_type_controller_id' => 19,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 119,
            'db_type_controller_id' => 20,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_model_name',
            'field_alias' => 'bl_leasing_object_model_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 120,
            'db_type_controller_id' => 20,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_model_issue_year',
            'field_alias' => 'bl_leasing_object_model_issue_year',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 121,
            'db_type_controller_id' => 20,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 123,
            'db_type_controller_id' => 21,
            'data_type_id' => 39,
            'table_field_name' => 'bl_legal_form_name',
            'field_alias' => 'bl_legal_form_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 124,
            'db_type_controller_id' => 21,
            'data_type_id' => 39,
            'table_field_name' => 'bl_legal_form_full_name',
            'field_alias' => 'bl_legal_form_full_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 125,
            'db_type_controller_id' => 21,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 127,
            'db_type_controller_id' => 22,
            'data_type_id' => 39,
            'table_field_name' => 'rate_VAT_name',
            'field_alias' => 'rate_VAT_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 128,
            'db_type_controller_id' => 22,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 130,
            'db_type_controller_id' => 23,
            'data_type_id' => 39,
            'table_field_name' => 'bl_sale_point_name',
            'field_alias' => 'bl_sale_point_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 131,
            'db_type_controller_id' => 23,
            'data_type_id' => 40,
            'table_field_name' => 'bl_sale_point_address',
            'field_alias' => 'bl_sale_point_address',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 132,
            'db_type_controller_id' => 23,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 134,
            'db_type_controller_id' => 24,
            'data_type_id' => 39,
            'table_field_name' => 'physical_person_name',
            'field_alias' => 'physical_person_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 135,
            'db_type_controller_id' => 24,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 137,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'region_id',
            'field_alias' => 'region_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 138,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'country_id',
            'field_alias' => 'country_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 139,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'info_kind_id',
            'field_alias' => 'info_kind_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 140,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'info_type_id',
            'field_alias' => 'info_type_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 142,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'representation',
            'field_alias' => 'representation',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 143,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'city_name',
            'field_alias' => 'city_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 144,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'e_mail',
            'field_alias' => 'e_mail',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 145,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'url_name',
            'field_alias' => 'url_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 146,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'phone_number',
            'field_alias' => 'phone_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 147,
            'db_type_controller_id' => 25,
            'data_type_id' => 39,
            'table_field_name' => 'phone_number_without_codes',
            'field_alias' => 'phone_number_without_codes',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 149,
            'db_type_controller_id' => 26,
            'data_type_id' => 39,
            'table_field_name' => 'file_type_name',
            'field_alias' => 'file_type_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 150,
            'db_type_controller_id' => 26,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 152,
            'db_type_controller_id' => 27,
            'data_type_id' => 39,
            'table_field_name' => 'currency_name',
            'field_alias' => 'currency_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 153,
            'db_type_controller_id' => 27,
            'data_type_id' => 39,
            'table_field_name' => 'currency_code',
            'field_alias' => 'currency_code',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 154,
            'db_type_controller_id' => 27,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 00:00:00',
            'updated_at' => '2019-07-02 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 156,
            'db_type_controller_id' => 28,
            'data_type_id' => 39,
            'table_field_name' => 'bl_schedule_article_name',
            'field_alias' => 'bl_schedule_article_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 157,
            'db_type_controller_id' => 28,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 159,
            'db_type_controller_id' => 29,
            'data_type_id' => 39,
            'table_field_name' => 'bl_schedule_type_name',
            'field_alias' => 'bl_schedule_type_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 160,
            'db_type_controller_id' => 29,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 162,
            'db_type_controller_id' => 30,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 163,
            'db_type_controller_id' => 30,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_calculation_id',
            'field_alias' => 'bl_leasing_calculation_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 164,
            'db_type_controller_id' => 30,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 165,
            'db_type_controller_id' => 30,
            'data_type_id' => 39,
            'table_field_name' => 'bl_schedule_type_id',
            'field_alias' => 'bl_schedule_type_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 166,
            'db_type_controller_id' => 30,
            'data_type_id' => 39,
            'table_field_name' => 'bl_schedule_name',
            'field_alias' => 'bl_schedule_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 167,
            'db_type_controller_id' => 30,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 169,
            'db_type_controller_id' => 31,
            'data_type_id' => 39,
            'table_field_name' => 'bl_schedule_article_id',
            'field_alias' => 'bl_schedule_article_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 171,
            'db_type_controller_id' => 31,
            'data_type_id' => 39,
            'table_field_name' => 'schedule_row_n',
            'field_alias' => 'schedule_row_n',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 172,
            'db_type_controller_id' => 31,
            'data_type_id' => 39,
            'table_field_name' => 'schedule_row_date',
            'field_alias' => 'schedule_row_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 173,
            'db_type_controller_id' => 31,
            'data_type_id' => 39,
            'table_field_name' => 'schedule_row_value',
            'field_alias' => 'schedule_row_value',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 175,
            'db_type_controller_id' => 32,
            'data_type_id' => 39,
            'table_field_name' => 'bl_schedule_article_id',
            'field_alias' => 'bl_schedule_article_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 177,
            'db_type_controller_id' => 32,
            'data_type_id' => 39,
            'table_field_name' => 'referential_l',
            'field_alias' => 'referential_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 178,
            'db_type_controller_id' => 32,
            'data_type_id' => 39,
            'table_field_name' => 'calculated_l',
            'field_alias' => 'calculated_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 180,
            'db_type_controller_id' => 33,
            'data_type_id' => 39,
            'table_field_name' => 'one_add_detail_name',
            'field_alias' => 'one_add_detail_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 181,
            'db_type_controller_id' => 33,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 183,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'bl_status_id',
            'field_alias' => 'bl_status_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 184,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_contract_specification_id',
            'field_alias' => 'bl_leasing_contract_specification_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 185,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_group_id',
            'field_alias' => 'bl_leasing_object_group_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 186,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'row_id_base',
            'field_alias' => 'row_id_base',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 187,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 188,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'currency_id',
            'field_alias' => 'currency_code_n',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 189,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_calculation_number',
            'field_alias' => 'bl_leasing_calculation_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 190,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_calculation_date',
            'field_alias' => 'bl_leasing_calculation_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 191,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_calculation_kind',
            'field_alias' => 'bl_leasing_calculation_kind',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 192,
            'db_type_controller_id' => 34,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 194,
            'db_type_controller_id' => 35,
            'data_type_id' => 39,
            'table_field_name' => 'one_add_detail_id',
            'field_alias' => 'one_add_detail_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 196,
            'db_type_controller_id' => 35,
            'data_type_id' => 39,
            'table_field_name' => 'one_add_detail_value',
            'field_alias' => 'one_add_detail_value',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 198,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'bl_customer_request_number',
            'field_alias' => 'bl_customer_request_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 199,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'bl_customer_request_date',
            'field_alias' => 'bl_customer_request_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 200,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'bl_status_id',
            'field_alias' => 'bl_status_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 201,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 202,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_bl_legal_form_id',
            'field_alias' => 'lessee_bl_legal_form_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 203,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_contractor_id',
            'field_alias' => 'lessee_contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 204,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_type',
            'field_alias' => 'lessee_type',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 205,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_name',
            'field_alias' => 'lessee_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 206,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_second_name',
            'field_alias' => 'lessee_second_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 207,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_first_name',
            'field_alias' => 'lessee_first_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 208,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_middle_name',
            'field_alias' => 'lessee_middle_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 209,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_person_phone',
            'field_alias' => 'lessee_person_phone',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 210,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_position',
            'field_alias' => 'lessee_position',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 211,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_email',
            'field_alias' => 'lessee_email',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 212,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_inn',
            'field_alias' => 'lessee_inn',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 213,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_kpp',
            'field_alias' => 'lessee_kpp',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 214,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_ogrn',
            'field_alias' => 'lessee_ogrn',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 215,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_legal_address',
            'field_alias' => 'lessee_legal_address',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 216,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_actual_address',
            'field_alias' => 'lessee_actual_address',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 217,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'lessee_phone',
            'field_alias' => 'lessee_phone',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 218,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_bl_legal_form_id',
            'field_alias' => 'supplier_bl_legal_form_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 219,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_contractor_id',
            'field_alias' => 'supplier_contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 220,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_type',
            'field_alias' => 'supplier_type',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 221,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_name',
            'field_alias' => 'supplier_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 222,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_second_name',
            'field_alias' => 'supplier_second_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 223,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_first_name',
            'field_alias' => 'supplier_first_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 224,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_middle_name',
            'field_alias' => 'supplier_middle_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 225,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_email',
            'field_alias' => 'supplier_email',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 226,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_inn',
            'field_alias' => 'supplier_inn',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 227,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_kpp',
            'field_alias' => 'supplier_kpp',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 228,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_ogrn',
            'field_alias' => 'supplier_ogrn',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 229,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_legal_address',
            'field_alias' => 'supplier_legal_address',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 230,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_actual_address',
            'field_alias' => 'supplier_actual_address',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 231,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_person_phone',
            'field_alias' => 'supplier_person_phone',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 232,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_person_FIO',
            'field_alias' => 'supplier_person_FIO',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 233,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_phone',
            'field_alias' => 'supplier_phone',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 234,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_position',
            'field_alias' => 'supplier_position',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 235,
            'db_type_controller_id' => 36,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 237,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_type_id',
            'field_alias' => 'bl_leasing_object_type_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 238,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_group_id',
            'field_alias' => 'bl_leasing_object_group_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 239,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_model_id',
            'field_alias' => 'bl_leasing_object_model_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 240,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_brand_id',
            'field_alias' => 'bl_leasing_object_brand_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 241,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_calculation_main_document_id',
            'field_alias' => 'bl_leasing_calculation_main_document_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 242,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'currency_id',
            'field_alias' => 'currency_code_n',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 243,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'rate_VAT_id',
            'field_alias' => 'rate_VAT_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 244,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_contractor_id',
            'field_alias' => 'supplier_contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 245,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'supplier_name',
            'field_alias' => 'supplier_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 246,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_price',
            'field_alias' => 'bl_leasing_object_price',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 247,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_quantity',
            'field_alias' => 'bl_leasing_object_quantity',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 248,
            'db_type_controller_id' => 37,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_sum',
            'field_alias' => 'bl_leasing_object_sum',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 250,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'physical_person_id',
            'field_alias' => 'physical_person_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 251,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 252,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'bl_sale_point_id',
            'field_alias' => 'bl_sale_point_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 253,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_id',
            'field_alias' => 'contractor_contract_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 254,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_name',
            'field_alias' => 'contractor_contract_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 255,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'd2_leasing_contract_status',
            'field_alias' => 'd2_leasing_contract_status',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 256,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'd4_payment_with_VAT',
            'field_alias' => 'd4_payment_with_VAT',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 257,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'd5_payment_deadline',
            'field_alias' => 'd5_payment_deadline',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 258,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'd6_payment_status',
            'field_alias' => 'd6_payment_status',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 259,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'd7_payment_number',
            'field_alias' => 'd7_payment_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 260,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'd8_payment_balance',
            'field_alias' => 'd8_payment_balance',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 261,
            'db_type_controller_id' => 38,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 263,
            'db_type_controller_id' => 39,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 264,
            'db_type_controller_id' => 39,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_id',
            'field_alias' => 'contractor_contract_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 265,
            'db_type_controller_id' => 39,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 266,
            'db_type_controller_id' => 39,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_contract_specification_date',
            'field_alias' => 'bl_leasing_contract_specification_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 267,
            'db_type_controller_id' => 39,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 269,
            'db_type_controller_id' => 40,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_model_id',
            'field_alias' => 'bl_leasing_object_model_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 270,
            'db_type_controller_id' => 40,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_type_id',
            'field_alias' => 'bl_leasing_object_type_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 271,
            'db_type_controller_id' => 40,
            'data_type_id' => 39,
            'table_field_name' => 'rate_VAT_id',
            'field_alias' => 'rate_VAT_code',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 272,
            'db_type_controller_id' => 40,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 273,
            'db_type_controller_id' => 40,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_brand_id',
            'field_alias' => 'bl_leasing_object_brand_id',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 274,
            'db_type_controller_id' => 40,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_price',
            'field_alias' => 'bl_leasing_object_price',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 275,
            'db_type_controller_id' => 40,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_quantity',
            'field_alias' => 'bl_leasing_object_quantity',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 276,
            'db_type_controller_id' => 40,
            'data_type_id' => 39,
            'table_field_name' => 'bl_leasing_object_sum',
            'field_alias' => 'bl_leasing_object_sum',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-03 00:00:00',
            'updated_at' => '2019-07-03 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 278,
            'db_type_controller_id' => 41,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-24 00:00:00',
            'updated_at' => '2019-07-24 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 279,
            'db_type_controller_id' => 41,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-24 00:00:00',
            'updated_at' => '2019-07-24 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 280,
            'db_type_controller_id' => 41,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_id',
            'field_alias' => 'contractor_contract_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-24 00:00:00',
            'updated_at' => '2019-07-24 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 281,
            'db_type_controller_id' => 41,
            'data_type_id' => 57,
            'table_field_name' => 'stored_file_id',
            'field_alias' => 'stored_file_id',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-24 00:00:00',
            'updated_at' => '2019-07-24 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 282,
            'db_type_controller_id' => 41,
            'data_type_id' => 39,
            'table_field_name' => 'doc_number',
            'field_alias' => 'doc_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-24 00:00:00',
            'updated_at' => '2019-07-24 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 283,
            'db_type_controller_id' => 41,
            'data_type_id' => 39,
            'table_field_name' => 'doc_date',
            'field_alias' => 'doc_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-24 00:00:00',
            'updated_at' => '2019-07-24 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 284,
            'db_type_controller_id' => 41,
            'data_type_id' => 39,
            'table_field_name' => 'doc_sum',
            'field_alias' => 'doc_sum',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-24 00:00:00',
            'updated_at' => '2019-07-24 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 285,
            'db_type_controller_id' => 41,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-24 00:00:00',
            'updated_at' => '2019-07-24 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 287,
            'db_type_controller_id' => 42,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 288,
            'db_type_controller_id' => 42,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 289,
            'db_type_controller_id' => 42,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_id',
            'field_alias' => 'contractor_contract_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 290,
            'db_type_controller_id' => 42,
            'data_type_id' => 57,
            'table_field_name' => 'stored_file_id',
            'field_alias' => 'stored_file_id',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 291,
            'db_type_controller_id' => 42,
            'data_type_id' => 39,
            'table_field_name' => 'doc_number',
            'field_alias' => 'doc_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 292,
            'db_type_controller_id' => 42,
            'data_type_id' => 39,
            'table_field_name' => 'doc_date',
            'field_alias' => 'doc_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 293,
            'db_type_controller_id' => 42,
            'data_type_id' => 39,
            'table_field_name' => 'start_date',
            'field_alias' => 'start_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 294,
            'db_type_controller_id' => 42,
            'data_type_id' => 39,
            'table_field_name' => 'end_date',
            'field_alias' => 'end_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 295,
            'db_type_controller_id' => 42,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 297,
            'db_type_controller_id' => 43,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 298,
            'db_type_controller_id' => 43,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 299,
            'db_type_controller_id' => 43,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_id',
            'field_alias' => 'contractor_contract_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 300,
            'db_type_controller_id' => 43,
            'data_type_id' => 57,
            'table_field_name' => 'stored_file_id',
            'field_alias' => 'stored_file_id',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 301,
            'db_type_controller_id' => 43,
            'data_type_id' => 39,
            'table_field_name' => 'doc_number',
            'field_alias' => 'doc_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 302,
            'db_type_controller_id' => 43,
            'data_type_id' => 39,
            'table_field_name' => 'doc_date',
            'field_alias' => 'doc_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 303,
            'db_type_controller_id' => 43,
            'data_type_id' => 39,
            'table_field_name' => 'doc_sum',
            'field_alias' => 'doc_sum',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 304,
            'db_type_controller_id' => 43,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 306,
            'db_type_controller_id' => 44,
            'data_type_id' => 39,
            'table_field_name' => 'bl_att_doc_kind_id',
            'field_alias' => 'bl_att_doc_kind_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 308,
            'db_type_controller_id' => 45,
            'data_type_id' => 39,
            'table_field_name' => 'company_id',
            'field_alias' => 'company_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 309,
            'db_type_controller_id' => 45,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 310,
            'db_type_controller_id' => 45,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_id',
            'field_alias' => 'contractor_contract_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 311,
            'db_type_controller_id' => 45,
            'data_type_id' => 57,
            'table_field_name' => 'stored_file_id',
            'field_alias' => 'stored_file_id',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 312,
            'db_type_controller_id' => 45,
            'data_type_id' => 39,
            'table_field_name' => 'doc_number',
            'field_alias' => 'doc_number',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 313,
            'db_type_controller_id' => 45,
            'data_type_id' => 39,
            'table_field_name' => 'doc_date',
            'field_alias' => 'doc_date',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 314,
            'db_type_controller_id' => 45,
            'data_type_id' => 39,
            'table_field_name' => 'doc_sum',
            'field_alias' => 'doc_sum',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 315,
            'db_type_controller_id' => 45,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 317,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_id',
            'field_alias' => 'contractor_contract_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 318,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'deleted_l',
            'field_alias' => 'deleted_l',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 319,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'bl_insurance_policy_contract_insurance_premium',
            'field_alias' => 'bl_insurance_policy_contract_insurance_premium',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 320,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'bl_insurance_policy_contract_franchise_amount',
            'field_alias' => 'bl_insurance_policy_contract_franchise_amount',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 321,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'd1_payment_term_next_installment',
            'field_alias' => 'd1_payment_term_next_installment',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 322,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'd9_insurant',
            'field_alias' => 'd9_insurant',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 323,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'd10_insurance_company',
            'field_alias' => 'd10_insurance_company',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 324,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'd2_leasing_contract_status',
            'field_alias' => 'd2_leasing_contract_status',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 325,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'd3_leasing_object',
            'field_alias' => 'd3_leasing_object',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 326,
            'db_type_controller_id' => 46,
            'data_type_id' => 39,
            'table_field_name' => 'd11_leasing_contract_name',
            'field_alias' => 'd11_leasing_contract_name',
            'field_reference' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-25 00:00:00',
            'updated_at' => '2019-07-25 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 328,
            'db_type_controller_id' => 47,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_contract_id',
            'field_alias' => 'contractor_contract_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-12 00:00:00',
            'updated_at' => '2019-09-12 00:00:00',
        ]);


        /**/
        \App\Models\DbTypeControllerField::create([
            'id' => 329,
            'db_type_controller_id' => 47,
            'data_type_id' => 39,
            'table_field_name' => 'contractor_id',
            'field_alias' => 'contractor_id',
            'field_reference' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-12 00:00:00',
            'updated_at' => '2019-09-12 00:00:00',
        ]);

    }
}
