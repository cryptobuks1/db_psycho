<?php

use Illuminate\Database\Seeder;

class DbTypeControllersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DbTypeController::truncate();
        //Commit Albert 29.05.18
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 4,
//            'db_type_id' => 7,
//            'controller_id' => 14,
//            'object_type_code' => 'ContractorInfo',
//            'object_kind_n' => 3,
//
//            'object_key_field' => 'line_n',
//            'object_owner_id' => 4,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 7,
//            'db_type_id' => 7,
//            'controller_id' => 4,
//            'object_type_code' => 'Contractor',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 8,
//            'db_type_id' => 7,
//            'controller_id' => 13,
//            'object_type_code' => 'Country',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'country_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 9,
//            'db_type_id' => 7,
//            'controller_id' => 28,
//            'object_type_code' => 'InfoType',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'info_type_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 10,
//            'db_type_id' => 7,
//            'controller_id' => 63,
//            'object_type_code' => 'AttachedDocumentFile',
//            'object_kind_n' => 2,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 11,
//            'db_type_id' => 7,
//            'controller_id' => 64,
//            'object_type_code' => 'AttachedDocument',
//            'object_kind_n' => 2,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 12,
//            'db_type_id' => 7,
//            'controller_id' => 65,
//            'object_type_code' => 'AttachedDocumentFileTitle',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 13,
//            'db_type_id' => 7,
//            'controller_id' => 18,
//            'object_type_code' => 'AttachedDocumentKind',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 14,
//            'db_type_id' => 7,
//            'controller_id' => 19,
//            'object_type_code' => 'AttachedDocumentType',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'att_doc_type_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 15,
//            'db_type_id' => 7,
//            'controller_id' => 72,
//            'object_type_code' => 'BlLeasingCalculation',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 16,
//            'db_type_id' => 7,
//            'controller_id' => 73,
//            'object_type_code' => 'BlLeasingCalculationsTabAdditionalDetails',
//            'object_kind_n' => 3,
//
//            'object_key_field' => 'line_n',
//            'object_owner_id' => 72,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 17,
//            'db_type_id' => 7,
//            'controller_id' => 80,
//            'object_type_code' => 'BlLeasingObjectGroup',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 18,
//            'db_type_id' => 7,
//            'controller_id' => 97,
//            'object_type_code' => 'BlStatuses',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 19,
//            'db_type_id' => NULL,
//            'controller_id' => 99,
//            'object_type_code' => 'RateVAT',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'rate_VAT_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 20,
//            'db_type_id' => NULL,
//            'controller_id' => 94,
//            'object_type_code' => 'BlLeasingObjectTypes',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 21,
//            'db_type_id' => NULL,
//            'controller_id' => 92,
//            'object_type_code' => 'BlLeasingObjectBrands',
//            'object_kind_n' => 2,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => 94,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 22,
//            'db_type_id' => NULL,
//            'controller_id' => 93,
//            'object_type_code' => 'BlLeasingObjectModels',
//            'object_kind_n' => 2,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => 92,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 23,
//            'db_type_id' => NULL,
//            'controller_id' => 104,
//            'object_type_code' => 'BlCustomerRequests',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 24,
//            'db_type_id' => NULL,
//            'controller_id' => 105,
//            'object_type_code' => 'BlCustomerRequestTabLeasingObjects',
//            'object_kind_n' => 3,
//
//            'object_key_field' => 'line_n',
//            'object_owner_id' => 104,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 25,
//            'db_type_id' => NULL,
//            'controller_id' => 4,
//            'object_type_code' => 'Contractor',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 26,
//            'db_type_id' => NULL,
//            'controller_id' => 106,
//            'object_type_code' => 'BlContractorRequest',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 27,
//            'db_type_id' => NULL,
//            'controller_id' => 107,
//            'object_type_code' => 'BlContractorRequestType',
//            'object_kind_n' => 1,
//
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-23 12:00:00',
//            'updated_at' => '2019-04-23 12:00:00',
//        ]);
        //Commit Albert 29.05.18

//+++ Зубанов ИА 18062019
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 1,
//            'db_type_id' => NULL,
//            'controller_id' => 4,
//            'object_type_code' => 'Contractor',
//            'object_kind_n' => 1,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 2,
//            'db_type_id' => 7,
//            'controller_id' => 27,
//            'object_type_code' => 'InfoKind',
//            'object_kind_n' => 1,
//            'object_key_field' => 'info_kind_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 4,
//            'db_type_id' => 7,
//            'controller_id' => 14,
//            'object_type_code' => 'ContractorInfo',
//            'object_kind_n' => 3,
//            'object_key_field' => 'line_n',
//            'object_owner_id' => 4,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//         ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 7,
//            'db_type_id' => 7,
//            'controller_id' => 4,
//            'object_type_code' => 'Contractor',
//            'object_kind_n' => 1,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//         ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 8,
//            'db_type_id' => 7,
//            'controller_id' => 13,
//            'object_type_code' => 'Country',
//            'object_kind_n' => 1,
//            'object_key_field' => 'country_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//         ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 9,
//            'db_type_id' => 7,
//            'controller_id' => 28,
//            'object_type_code' => 'InfoType',
//            'object_kind_n' => 1,
//            'object_key_field' => 'info_type_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 10,
//            'db_type_id' => 7,
//            'controller_id' => 63,
//            'object_type_code' => 'AttachedDocumentFile',
//            'object_kind_n' => 2,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 11,
//            'db_type_id' => 7,
//            'controller_id' => 64,
//            'object_type_code' => 'AttachedDocument',
//            'object_kind_n' => 2,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 12,
//            'db_type_id' => 7,
//            'controller_id' => 65,
//            'object_type_code' => 'AttachedDocumentFileTitle',
//            'object_kind_n' => 1,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//         ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 13,
//            'db_type_id' => 7,
//            'controller_id' => 18,
//            'object_type_code' => 'AttachedDocumentKind',
//            'object_kind_n' => 1,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 14,
//            'db_type_id' => 7,
//            'controller_id' => 19,
//            'object_type_code' => 'AttachedDocumentType',
//            'object_kind_n' => 1,
//            'object_key_field' => 'att_doc_type_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//         ]);
//
//        \App\Models\DbTypeController::create([
//            'id' => 15,
//            'db_type_id' => 7,
//            'controller_id' => 72,
//            'object_type_code' => 'BlLeasingCalculation',
//            'object_kind_n' => 1,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//         ]);
//
//        \App\Models\DbTypeController::create([
//            'id' => 16,
//            'db_type_id' => 7,
//            'controller_id' => 97,
//            'object_type_code' => 'BlStatus',
//            'object_kind_n' => 1,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-13 12:00:00',
//            'updated_at' => '2019-06-13 12:00:00',
//        ]);
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 25,
//            'db_type_id' => 7,
//            'controller_id' => 106,
//            'object_type_code' => 'BlContractorRequestsController',
//            'object_kind_n' => 1,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-03 12:00:00',
//            'updated_at' => '2019-06-03 12:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\DbTypeController::create([
//            'id' => 26,
//            'db_type_id' => 7,
//            'controller_id' => 107,
//            'object_type_code' => 'BlContractorRequestTypesController',
//            'object_kind_n' => 1,
//            'object_key_field' => 'uid_1c_code',
//            'object_owner_id' => NULL,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-03 12:00:00',
//            'updated_at' => '2019-06-03 12:00:00',
//        ]);
//--- Зубанов ИА 18062019


        /**/
        \App\Models\DbTypeController::create([
            'id' => 1,
            'db_type_id' => NULL,
            'controller_id' => 4,
            'object_type_code' => 'Contractor',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 2,
            'db_type_id' => NULL,
            'controller_id' => 14,
            'object_type_code' => 'ContractorInfo',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 4,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 3,
            'db_type_id' => NULL,
            'controller_id' => 8,
            'object_type_code' => 'Company',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 4,
            'db_type_id' => NULL,
            'controller_id' => 30,
            'object_type_code' => 'CompanyInfo',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 8,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 5,
            'db_type_id' => NULL,
            'controller_id' => 75,
            'object_type_code' => 'ContractorContract',
            'object_kind_n' => 2,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => 4,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 6,
            'db_type_id' => NULL,
            'controller_id' => 13,
            'object_type_code' => 'Country',
            'object_kind_n' => 1,
            'object_key_field' => 'country_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 7,
            'db_type_id' => NULL,
            'controller_id' => 27,
            'object_type_code' => 'InfoKind',
            'object_kind_n' => 1,
            'object_key_field' => 'info_kind_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 8,
            'db_type_id' => NULL,
            'controller_id' => 28,
            'object_type_code' => 'InfoType',
            'object_kind_n' => 1,
            'object_key_field' => 'info_type_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 9,
            'db_type_id' => NULL,
            'controller_id' => 15,
            'object_type_code' => 'Region',
            'object_kind_n' => 2,
            'object_key_field' => 'region_code',
            'object_owner_id' => 13,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 10,
            'db_type_id' => NULL,
            'controller_id' => 107,
            'object_type_code' => 'BlContractorRequestType',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 11,
            'db_type_id' => NULL,
            'controller_id' => 106,
            'object_type_code' => 'BlContractorRequest',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 12,
            'db_type_id' => NULL,
            'controller_id' => 97,
            'object_type_code' => 'BlStatus',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 13,
            'db_type_id' => NULL,
            'controller_id' => 98,
            'object_type_code' => 'DbAreaFile',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 14,
            'db_type_id' => NULL,
            'controller_id' => 89,
            'object_type_code' => 'BlAttachedDocumentKind',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 15,
            'db_type_id' => NULL,
            'controller_id' => 90,
            'object_type_code' => 'BlFileTypeSet',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 16,
            'db_type_id' => NULL,
            'controller_id' => 91,
            'object_type_code' => 'BlFileTypeSetTabFileType',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 90,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 17,
            'db_type_id' => NULL,
            'controller_id' => 80,
            'object_type_code' => 'BlLeasingObjectGroup',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 18,
            'db_type_id' => NULL,
            'controller_id' => 94,
            'object_type_code' => 'BlLeasingObjectType',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 19,
            'db_type_id' => NULL,
            'controller_id' => 92,
            'object_type_code' => 'BlLeasingObjectBrand',
            'object_kind_n' => 2,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => 94,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 20,
            'db_type_id' => NULL,
            'controller_id' => 93,
            'object_type_code' => 'BlLeasingObjectModel',
            'object_kind_n' => 2,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => 92,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 21,
            'db_type_id' => NULL,
            'controller_id' => 95,
            'object_type_code' => 'BlLegalForm',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 22,
            'db_type_id' => NULL,
            'controller_id' => 99,
            'object_type_code' => 'RateVAT',
            'object_kind_n' => 1,
            'object_key_field' => 'rate_VAT_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 23,
            'db_type_id' => NULL,
            'controller_id' => 108,
            'object_type_code' => 'BlSalePoint',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 24,
            'db_type_id' => NULL,
            'controller_id' => 70,
            'object_type_code' => 'PhysicalPerson',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 25,
            'db_type_id' => NULL,
            'controller_id' => 71,
            'object_type_code' => 'PhysicalPersonInfo',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 70,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 26,
            'db_type_id' => NULL,
            'controller_id' => 61,
            'object_type_code' => 'FileType',
            'object_kind_n' => 1,
            'object_key_field' => 'file_type_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 27,
            'db_type_id' => NULL,
            'controller_id' => 51,
            'object_type_code' => 'Currency',
            'object_kind_n' => 1,
            'object_key_field' => 'currency_code_n',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 28,
            'db_type_id' => NULL,
            'controller_id' => 79,
            'object_type_code' => 'BlScheduleArticle',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 29,
            'db_type_id' => NULL,
            'controller_id' => 109,
            'object_type_code' => 'BlScheduleType',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 30,
            'db_type_id' => NULL,
            'controller_id' => 78,
            'object_type_code' => 'BlSchedules',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 31,
            'db_type_id' => NULL,
            'controller_id' => 66,
            'object_type_code' => 'BlScheduleTabSchedule',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 78,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 32,
            'db_type_id' => NULL,
            'controller_id' => 67,
            'object_type_code' => 'BlScheduleTabArticle',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 78,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 33,
            'db_type_id' => NULL,
            'controller_id' => 101,
            'object_type_code' => 'OneAdditionalDetail',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 34,
            'db_type_id' => NULL,
            'controller_id' => 72,
            'object_type_code' => 'BlLeasingCalculation',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 35,
            'db_type_id' => NULL,
            'controller_id' => 73,
            'object_type_code' => 'BlLeasingCalculationsTabAdditionalDetail',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 72,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 12:00:00',
            'updated_at' => '2019-04-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 36,
            'db_type_id' => NULL,
            'controller_id' => 104,
            'object_type_code' => 'BlCustomerRequest',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 37,
            'db_type_id' => NULL,
            'controller_id' => 105,
            'object_type_code' => 'BlCustomerRequestTabLeasingObject',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 104,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 38,
            'db_type_id' => NULL,
            'controller_id' => 74,
            'object_type_code' => 'BlLeasingContract',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 39,
            'db_type_id' => NULL,
            'controller_id' => 76,
            'object_type_code' => 'BlLeasingContractSpecification',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 40,
            'db_type_id' => NULL,
            'controller_id' => 77,
            'object_type_code' => 'BlLeasContSpecTabLeasObjects',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 76,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 41,
            'db_type_id' => NULL,
            'controller_id' => 117,
            'object_type_code' => 'ServiceAcceptanceActs',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 42,
            'db_type_id' => NULL,
            'controller_id' => 116,
            'object_type_code' => 'SettlementReconciliationActs',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 43,
            'db_type_id' => NULL,
            'controller_id' => 118,
            'object_type_code' => 'Invoices',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 44,
            'db_type_id' => NULL,
            'controller_id' => 96,
            'object_type_code' => 'BlRequiredDocument',
            'object_kind_n' => 3,
            'object_key_field' => 'register_key',
            'object_owner_id' => 104,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 45,
            'db_type_id' => NULL,
            'controller_id' => 127,
            'object_type_code' => 'PaymentInvoices',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 46,
            'db_type_id' => NULL,
            'controller_id' => 112,
            'object_type_code' => 'BlInsurancePolicyContracts',
            'object_kind_n' => 1,
            'object_key_field' => 'uid_1c_code',
            'object_owner_id' => NULL,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-23 12:00:00',
            'updated_at' => '2019-05-23 12:00:00',
        ]);


        /**/
        \App\Models\DbTypeController::create([
            'id' => 47,
            'db_type_id' => NULL,
            'controller_id' => 131,
            'object_type_code' => 'BlInsurancePolicyContractTabLeasingContract',
            'object_kind_n' => 3,
            'object_key_field' => 'line_n',
            'object_owner_id' => 112,
            'write_n' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-12 12:00:00',
            'updated_at' => '2019-09-12 12:00:00',
        ]);

    }
}
