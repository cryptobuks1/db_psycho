<?php

use Illuminate\Database\Seeder;

class DbTypeModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DbTypeModel::truncate();


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 1,
            'db_type_id' => NULL,
            'table_n' => 13,
            'object_type_code' => 'Contractor',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 2,
            'db_type_id' => NULL,
            'table_n' => 14,
            'object_type_code' => 'ContractorInfo',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 13,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 3,
            'db_type_id' => NULL,
            'table_n' => 7,
            'object_type_code' => 'Company',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 4,
            'db_type_id' => NULL,
            'table_n' => 8,
            'object_type_code' => 'CompanyInfo',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 7,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 5,
            'db_type_id' => NULL,
            'table_n' => 87,
            'object_type_code' => 'ContractorContract',
            'object_kind_n' => 2,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => 13,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 6,
            'db_type_id' => NULL,
            'table_n' => 15,
            'object_type_code' => 'Country',
            'object_kind_n' => 1,
            'object_key_field' => 'country_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 7,
            'db_type_id' => NULL,
            'table_n' => 20,
            'object_type_code' => 'InfoKind',
            'object_kind_n' => 1,
            'object_key_field' => 'info_kind_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 8,
            'db_type_id' => NULL,
            'table_n' => 21,
            'object_type_code' => 'InfoType',
            'object_kind_n' => 1,
            'object_key_field' => 'info_type_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 9,
            'db_type_id' => NULL,
            'table_n' => 28,
            'object_type_code' => 'Region',
            'object_kind_n' => 2,
            'object_key_field' => 'region_code',
            'object_owner_table_n' => 15,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 10,
            'db_type_id' => NULL,
            'table_n' => 125,
            'object_type_code' => 'BlContractorRequestType',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 11,
            'db_type_id' => NULL,
            'table_n' => 126,
            'object_type_code' => 'BlContractorRequest',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 12,
            'db_type_id' => NULL,
            'table_n' => 65,
            'object_type_code' => 'BlStatus',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 13,
            'db_type_id' => NULL,
            'table_n' => 94,
            'object_type_code' => 'DbAreaFile',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 14,
            'db_type_id' => NULL,
            'table_n' => 92,
            'object_type_code' => 'BlAttachedDocumentKind',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 15,
            'db_type_id' => NULL,
            'table_n' => 68,
            'object_type_code' => 'BlFileTypeSet',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 16,
            'db_type_id' => NULL,
            'table_n' => 69,
            'object_type_code' => 'BlFileTypeSetTabFileType',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 68,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 17,
            'db_type_id' => NULL,
            'table_n' => 70,
            'object_type_code' => 'BlLeasingObjectGroup',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 18,
            'db_type_id' => NULL,
            'table_n' => 60,
            'object_type_code' => 'BlLeasingObjectType',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 19,
            'db_type_id' => NULL,
            'table_n' => 62,
            'object_type_code' => 'BlLeasingObjectBrand',
            'object_kind_n' => 2,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => 60,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 20,
            'db_type_id' => NULL,
            'table_n' => 61,
            'object_type_code' => 'BlLeasingObjectModel',
            'object_kind_n' => 2,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => 62,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 21,
            'db_type_id' => NULL,
            'table_n' => 63,
            'object_type_code' => 'BlLegalForm',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 22,
            'db_type_id' => NULL,
            'table_n' => 59,
            'object_type_code' => 'RateVAT',
            'object_kind_n' => 1,
            'object_key_field' => 'rate_VAT_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 23,
            'db_type_id' => NULL,
            'table_n' => 22,
            'object_type_code' => 'BlSalePoint',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 24,
            'db_type_id' => NULL,
            'table_n' => 66,
            'object_type_code' => 'PhysicalPerson',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 25,
            'db_type_id' => NULL,
            'table_n' => 67,
            'object_type_code' => 'PhysicalPersonInfo',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 66,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 26,
            'db_type_id' => NULL,
            'table_n' => 85,
            'object_type_code' => 'FileType',
            'object_kind_n' => 1,
            'object_key_field' => 'file_type_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 27,
            'db_type_id' => NULL,
            'table_n' => 50,
            'object_type_code' => 'Currency',
            'object_kind_n' => 1,
            'object_key_field' => 'currency_code_n',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 28,
            'db_type_id' => NULL,
            'table_n' => 91,
            'object_type_code' => 'BlScheduleArticle',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 29,
            'db_type_id' => NULL,
            'table_n' => 64,
            'object_type_code' => 'BlScheduleType',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 30,
            'db_type_id' => NULL,
            'table_n' => 90,
            'object_type_code' => 'BlSchedules',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 31,
            'db_type_id' => NULL,
            'table_n' => 98,
            'object_type_code' => 'BlScheduleTabSchedule',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 90,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 32,
            'db_type_id' => NULL,
            'table_n' => 132,
            'object_type_code' => 'BlScheduleTabArticle',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 90,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 33,
            'db_type_id' => NULL,
            'table_n' => 58,
            'object_type_code' => 'OneAdditionalDetail',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 34,
            'db_type_id' => NULL,
            'table_n' => 71,
            'object_type_code' => 'BlLeasingCalculation',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 35,
            'db_type_id' => NULL,
            'table_n' => 72,
            'object_type_code' => 'BlLeasingCalculationsTabAdditionalDetail',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 71,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 36,
            'db_type_id' => NULL,
            'table_n' => 81,
            'object_type_code' => 'BlCustomerRequest',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 37,
            'db_type_id' => NULL,
            'table_n' => 82,
            'object_type_code' => 'BlCustomerRequestTabLeasingObject',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 81,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 38,
            'db_type_id' => NULL,
            'table_n' => 86,
            'object_type_code' => 'BlLeasingContract',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 39,
            'db_type_id' => NULL,
            'table_n' => 88,
            'object_type_code' => 'BlLeasingContractSpecification',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 40,
            'db_type_id' => NULL,
            'table_n' => 89,
            'object_type_code' => 'BlLeasContSpecTabLeasObjects',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 88,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 41,
            'db_type_id' => NULL,
            'table_n' => 138,
            'object_type_code' => 'ServiceAcceptanceActs',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 42,
            'db_type_id' => NULL,
            'table_n' => 137,
            'object_type_code' => 'SettlementReconciliationActs',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 43,
            'db_type_id' => NULL,
            'table_n' => 139,
            'object_type_code' => 'Invoices',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 44,
            'db_type_id' => NULL,
            'table_n' => 93,
            'object_type_code' => 'BlRequiredDocument',
            'object_kind_n' => 3,
            'object_key_field' => 'register_key',
            'object_owner_table_n' => 81,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 45,
            'db_type_id' => NULL,
            'table_n' => 140,
            'object_type_code' => 'PaymentInvoices',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 46,
            'db_type_id' => NULL,
            'table_n' => 133,
            'object_type_code' => 'BlInsurancePolicyContracts',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_table_n' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 47,
            'db_type_id' => NULL,
            'table_n' => 142,
            'object_type_code' => 'BlInsurancePolicyContractTabLeasingContract',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 133,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-12 12:00:00',
            'updated_at' => '2019-09-12 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeModel::create([
            'id' => 48,
            'db_type_id' => NULL,
            'table_n' => 170,
            'object_type_code' => 'BlCustomerRequestTabComments',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_table_n' => 81,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);

    }
}
