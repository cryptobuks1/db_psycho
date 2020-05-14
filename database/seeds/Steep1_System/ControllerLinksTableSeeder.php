<?php

use Illuminate\Database\Seeder;

class ControllerLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ControllerLink::truncate();

        \App\Models\ControllerLink::truncate();

//        \App\Models\ControllerLink::create( [
//            'controller_id'=>'14',
//            'controller_id_link'=>'4',
//            'table_field_name_composite'=>'',
//            'table_field_name'=>'contractor_id',
//            'parent_link_l'=>'1'
//
//        ] );
//
//        \App\Models\ControllerLink::create( [
//            'controller_id'=>'4',
//            'controller_id_link'=>'13',
//            'table_field_name_composite'=>'',
//            'table_field_name'=>'country_id',
//            'parent_link_l'=>'0'
//
//        ] );
//
//        \App\Models\ControllerLink::create( [
//            'controller_id'=>'14',
//            'controller_id_link'=>'28',
//            'table_field_name_composite'=>'',
//            'table_field_name'=>'info_type_id',
//            'parent_link_l'=>'1'
//
//        ] );
//
//        \App\Models\ControllerLink::create( [
//            'controller_id'=>'14',
//            'controller_id_link'=>'13',
//            'table_field_name_composite'=>'',
//            'table_field_name'=>'country_id',
//            'parent_link_l'=>'0'
//        ] );
//
//        \App\Models\ControllerLink::create( [
//            'controller_id'=>'63',
//            'controller_id_link'=>'64',
//            'table_field_name_composite'=>'',
//            'table_field_name'=>'att_doc_id',
//            'parent_link_l'=>'1'
//        ] );
//
//        \App\Models\ControllerLink::create( [
//            'controller_id'=>'64',
//            'controller_id_link'=>'4',
//            'table_field_name_composite'=>'',
//            'table_field_name'=>'row_id',
//            'parent_link_l'=>'1'
//        ] );

//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 1,
//            'controller_id' => 14,
//            'controller_id_link' => 4,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'contractor_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 2,
//            'controller_id' => 4,
//            'controller_id_link' => 13,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'country_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 3,
//            'controller_id' => 14,
//            'controller_id_link' => 28,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'info_type_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 4,
//            'controller_id' => 14,
//            'controller_id_link' => 13,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'country_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 5,
//            'controller_id' => 63,
//            'controller_id_link' => 64,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'att_doc_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 6,
//            'controller_id' => 64,
//            'controller_id_link' => 4,
//            'table_field_name_composite' => 'table_n',
//            'table_field_name' => 'row_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-01 13:58:00',
//            'updated_at' => '2019-04-01 13:58:00',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 7,
//            'controller_id' => 73,
//            'controller_id_link' => 72,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_customer_request_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 8,
//            'controller_id' => 92,
//            'controller_id_link' => 94,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_leasing_object_type_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 9,
//            'controller_id' => 93,
//            'controller_id_link' => 92,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_leasing_object_brand_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 10,
//            'controller_id' => 72,
//            'controller_id_link' => 80,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_leasing_object_group_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 11,
//            'controller_id' => 72,
//            'controller_id_link' => 97,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_status_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 12,
//            'controller_id' => 105,
//            'controller_id_link' => 104,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_customer_request_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 13,
//            'controller_id' => 105,
//            'controller_id_link' => 94,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_leasing_object_type_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 14,
//            'controller_id' => 105,
//            'controller_id_link' => 92,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_leasing_object_brand_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 15,
//            'controller_id' => 105,
//            'controller_id_link' => 93,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_leasing_object_model_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 16,
//            'controller_id' => 105,
//            'controller_id_link' => 80,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_leasing_object_group_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 17,
//            'controller_id' => 105,
//            'controller_id_link' => 72,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_leasing_calculation_main_document_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 18,
//            'controller_id' => 105,
//            'controller_id_link' => 51,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'currency_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 19,
//            'controller_id' => 105,
//            'controller_id_link' => 4,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'contractor_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 20,
//            'controller_id' => 105,
//            'controller_id_link' => 99,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'rate_VAT_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 21,
//            'controller_id' => 106,
//            'controller_id_link' => 8,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'company_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 22,
//            'controller_id' => 106,
//            'controller_id_link' => 4,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'contractor_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 23,
//            'controller_id' => 106,
//            'controller_id_link' => 97,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_status_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 24,
//            'controller_id' => 106,
//            'controller_id_link' => 107,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_contractor_request_type_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);

//+++ Зубанов ИА 18062019
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 2,
//            'controller_id' => 4,
//            'controller_id_link' => 13,
//            'table_field_name' => 'country_id',
//            'table_field_name_composite' => NULL,
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 3,
//            'controller_id' => 14,
//            'controller_id_link' => 28,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'info_type_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 4,
//            'controller_id' => 14,
//            'controller_id_link' => 13,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'country_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 1,
//            'controller_id' => 14,
//            'controller_id_link' => 4,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'contractor_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 21,
//            'controller_id' => 14,
//            'controller_id_link' => 27,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'info_kind_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 5,
//            'controller_id' => 63,
//            'controller_id_link' => 64,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'att_doc_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 6,
//            'controller_id' => 64,
//            'controller_id_link' => 4,
//            'table_field_name_composite' => 'table_n',
//            'table_field_name' => 'row_id',
//            'parent_link_l' => 1,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 19,
//            'controller_id' => 105,
//            'controller_id_link' => 4,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'contractor_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 20,
//            'controller_id' => 105,
//            'controller_id_link' => 99,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'rate_VAT_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
////        /**/
////        \App\Models\ControllerLink::create([
////            'id' => 21,
////            'controller_id' => 106,
////            'controller_id_link' => 8,
////            'table_field_name_composite' => NULL,
////            'table_field_name' => 'company_id',
////            'parent_link_l' => 0,
////            'table_l' => 0,
////            'created_by' => 'seed',
////            'updated_by' => 'seed',
////            'created_at' => '2019-04-11 17:36:50',
////            'updated_at' => '2019-04-11 17:36:50',
////        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 22,
//            'controller_id' => 106,
//            'controller_id_link' => 4,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'contractor_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 23,
//            'controller_id' => 106,
//            'controller_id_link' => 97,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_status_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//
//        /**/
//        \App\Models\ControllerLink::create([
//            'id' => 24,
//            'controller_id' => 106,
//            'controller_id_link' => 107,
//            'table_field_name_composite' => NULL,
//            'table_field_name' => 'bl_contractor_request_type_id',
//            'parent_link_l' => 0,
//            'table_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-04-11 17:36:50',
//            'updated_at' => '2019-04-11 17:36:50',
//        ]);
//---Зубанов ИА  18062019


        /**/
        \App\Models\ControllerLink::create([
            'id' => 1,
            'controller_id' => 4,
            'controller_id_link' => 13,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'country_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 2,
            'controller_id' => 14,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 3,
            'controller_id' => 14,
            'controller_id_link' => 27,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'info_kind_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 4,
            'controller_id' => 14,
            'controller_id_link' => 15,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'region_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 5,
            'controller_id' => 14,
            'controller_id_link' => 28,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'info_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 6,
            'controller_id' => 14,
            'controller_id_link' => 13,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'country_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 7,
            'controller_id' => 8,
            'controller_id_link' => 13,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'country_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 8,
            'controller_id' => 30,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 9,
            'controller_id' => 30,
            'controller_id_link' => 27,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'info_kind_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 10,
            'controller_id' => 30,
            'controller_id_link' => 15,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'region_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 11,
            'controller_id' => 30,
            'controller_id_link' => 28,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'info_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 12,
            'controller_id' => 30,
            'controller_id_link' => 13,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'country_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 13,
            'controller_id' => 75,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 1,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 14,
            'controller_id' => 75,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 15,
            'controller_id' => 75,
            'controller_id_link' => 74,
            'table_field_name_composite' => 'table_n',
            'table_field_name' => 'row_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 16,
            'controller_id' => 75,
            'controller_id_link' => 112,
            'table_field_name_composite' => 'table_n',
            'table_field_name' => 'row_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 17,
            'controller_id' => 27,
            'controller_id_link' => 28,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'info_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 18,
            'controller_id' => 15,
            'controller_id_link' => 13,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'country_id',
            'parent_link_l' => 1,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 19,
            'controller_id' => 106,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 20,
            'controller_id' => 106,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 21,
            'controller_id' => 106,
            'controller_id_link' => 97,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_status_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 22,
            'controller_id' => 106,
            'controller_id_link' => 107,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_contractor_request_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 23,
            'controller_id' => 98,
            'controller_id_link' => 8,
            'table_field_name_composite' => 'table_n_owner',
            'table_field_name' => 'row_id_owner',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 24,
            'controller_id' => 98,
            'controller_id_link' => 4,
            'table_field_name_composite' => 'table_n_owner',
            'table_field_name' => 'row_id_owner',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 25,
            'controller_id' => 98,
            'controller_id_link' => 61,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'file_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 26,
            'controller_id' => 98,
            'controller_id_link' => 89,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_att_doc_kind_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 27,
            'controller_id' => 98,
            'controller_id_link' => 106,
            'table_field_name_composite' => 'table_n_doc',
            'table_field_name' => 'row_id_doc',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 28,
            'controller_id' => 98,
            'controller_id_link' => 74,
            'table_field_name_composite' => 'table_n_doc',
            'table_field_name' => 'row_id_doc',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 29,
            'controller_id' => 89,
            'controller_id_link' => 90,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_file_type_set_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 30,
            'controller_id' => 91,
            'controller_id_link' => 90,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_file_type_set_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 31,
            'controller_id' => 91,
            'controller_id_link' => 61,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'file_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 32,
            'controller_id' => 92,
            'controller_id_link' => 94,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_type_id',
            'parent_link_l' => 1,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 33,
            'controller_id' => 93,
            'controller_id_link' => 92,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_brand_id',
            'parent_link_l' => 1,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 34,
            'controller_id' => 71,
            'controller_id_link' => 70,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'physical_person_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 35,
            'controller_id' => 71,
            'controller_id_link' => 27,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'info_kind_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 36,
            'controller_id' => 71,
            'controller_id_link' => 15,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'region_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 37,
            'controller_id' => 71,
            'controller_id_link' => 28,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'info_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 38,
            'controller_id' => 71,
            'controller_id_link' => 13,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'country_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 39,
            'controller_id' => 78,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 40,
            'controller_id' => 78,
            'controller_id_link' => 72,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_calculation_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 41,
            'controller_id' => 78,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 42,
            'controller_id' => 78,
            'controller_id_link' => 109,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_schedule_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 43,
            'controller_id' => 66,
            'controller_id_link' => 78,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_schedule_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 44,
            'controller_id' => 66,
            'controller_id_link' => 79,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_schedule_article_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 45,
            'controller_id' => 67,
            'controller_id_link' => 78,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_schedule_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 46,
            'controller_id' => 67,
            'controller_id_link' => 79,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_schedule_article_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 47,
            'controller_id' => 72,
            'controller_id_link' => 97,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_status_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 48,
            'controller_id' => 72,
            'controller_id_link' => 76,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_contract_specification_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 49,
            'controller_id' => 72,
            'controller_id_link' => 80,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_group_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 50,
            'controller_id' => 72,
            'controller_id_link' => 104,
            'table_field_name_composite' => 'table_n_base',
            'table_field_name' => 'row_id_base',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 51,
            'controller_id' => 72,
            'controller_id_link' => 74,
            'table_field_name_composite' => 'table_n_base',
            'table_field_name' => 'row_id_base',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 52,
            'controller_id' => 72,
            'controller_id_link' => 76,
            'table_field_name_composite' => 'table_n_base',
            'table_field_name' => 'row_id_base',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 53,
            'controller_id' => 72,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 54,
            'controller_id' => 72,
            'controller_id_link' => 51,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'currency_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 55,
            'controller_id' => 73,
            'controller_id_link' => 72,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_calculation_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 56,
            'controller_id' => 73,
            'controller_id_link' => 101,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'one_add_detail_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 57,
            'controller_id' => 104,
            'controller_id_link' => 97,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_status_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 58,
            'controller_id' => 104,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 59,
            'controller_id' => 104,
            'controller_id_link' => 95,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'lessee_bl_legal_form_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 60,
            'controller_id' => 104,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'lessee_contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 61,
            'controller_id' => 104,
            'controller_id_link' => 95,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'supplier_bl_legal_form_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 62,
            'controller_id' => 104,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'supplier_contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 63,
            'controller_id' => 105,
            'controller_id_link' => 104,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_customer_request_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 64,
            'controller_id' => 105,
            'controller_id_link' => 94,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 65,
            'controller_id' => 105,
            'controller_id_link' => 80,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_group_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 66,
            'controller_id' => 105,
            'controller_id_link' => 93,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_model_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 67,
            'controller_id' => 105,
            'controller_id_link' => 92,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_brand_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 68,
            'controller_id' => 105,
            'controller_id_link' => 72,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_calculation_main_document_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 69,
            'controller_id' => 105,
            'controller_id_link' => 51,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'currency_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 70,
            'controller_id' => 105,
            'controller_id_link' => 99,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'rate_VAT_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 71,
            'controller_id' => 105,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'supplier_contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 72,
            'controller_id' => 74,
            'controller_id_link' => 70,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'physical_person_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 73,
            'controller_id' => 74,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 74,
            'controller_id' => 74,
            'controller_id_link' => 108,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_sale_point_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 75,
            'controller_id' => 74,
            'controller_id_link' => 75,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_contract_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 76,
            'controller_id' => 76,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 77,
            'controller_id' => 76,
            'controller_id_link' => 75,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_contract_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 78,
            'controller_id' => 76,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 79,
            'controller_id' => 77,
            'controller_id_link' => 76,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_contract_specification_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 80,
            'controller_id' => 77,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 81,
            'controller_id' => 77,
            'controller_id_link' => 93,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_model_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 82,
            'controller_id' => 77,
            'controller_id_link' => 92,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_brand_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 83,
            'controller_id' => 77,
            'controller_id_link' => 99,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'rate_VAT_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 84,
            'controller_id' => 77,
            'controller_id_link' => 94,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_leasing_object_type_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 85,
            'controller_id' => 117,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 86,
            'controller_id' => 117,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 87,
            'controller_id' => 117,
            'controller_id_link' => 75,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_contract_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 88,
            'controller_id' => 116,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 89,
            'controller_id' => 116,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 90,
            'controller_id' => 116,
            'controller_id_link' => 75,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_contract_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 91,
            'controller_id' => 118,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 92,
            'controller_id' => 118,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 93,
            'controller_id' => 118,
            'controller_id_link' => 75,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_contract_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 94,
            'controller_id' => 96,
            'controller_id_link' => 89,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_att_doc_kind_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 95,
            'controller_id' => 96,
            'controller_id_link' => 104,
            'table_field_name_composite' => 'table_n_doc',
            'table_field_name' => 'row_id_doc',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 96,
            'controller_id' => 96,
            'controller_id_link' => 74,
            'table_field_name_composite' => 'table_n_doc',
            'table_field_name' => 'row_id_doc',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 97,
            'controller_id' => 98,
            'controller_id_link' => 104,
            'table_field_name_composite' => 'table_n_doc',
            'table_field_name' => 'row_id_doc',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 98,
            'controller_id' => 127,
            'controller_id_link' => 8,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'company_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 99,
            'controller_id' => 127,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 100,
            'controller_id' => 127,
            'controller_id_link' => 75,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_contract_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 101,
            'controller_id' => 112,
            'controller_id_link' => 75,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_contract_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 102,
            'controller_id' => 131,
            'controller_id_link' => 112,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'bl_insurance_policy_contract_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 103,
            'controller_id' => 131,
            'controller_id_link' => 75,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_contract_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 104,
            'controller_id' => 131,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 105,
            'controller_id' => 133,
            'controller_id_link' => 4,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 106,
            'controller_id' => 136,
            'controller_id_link' => 133,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'partner_id',
            'parent_link_l' => 1,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 107,
            'controller_id' => 136,
            'controller_id_link' => 137,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'partner_regions_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 108,
            'controller_id' => 137,
            'controller_id_link' => 133,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'partner_id',
            'parent_link_l' => 1,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 109,
            'controller_id' => 140,
            'controller_id_link' => 102,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'menu_item_id_left',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 110,
            'controller_id' => 140,
            'controller_id_link' => 102,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'menu_item_id_top',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 111,
            'controller_id' => 140,
            'controller_id_link' => 141,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'help_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 112,
            'controller_id' => 140,
            'controller_id_link' => 87,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'home_fe_route_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 113,
            'controller_id' => 143,
            'controller_id_link' => 142,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'access_axis_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 114,
            'controller_id' => 144,
            'controller_id_link' => 126,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'controller_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);

        
        /**/
        \App\Models\ControllerLink::create([
            'id' => 115,
            'controller_id' => 145,
            'controller_id_link' => 136,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'partner_point_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 116,
            'controller_id' => 145,
            'controller_id_link' => 4,
            'table_field_name_composite' => '',
            'table_field_name' => 'contractor_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 117,
            'controller_id' => 169,
            'controller_id_link' => 101,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'one_add_detail_id',
            'parent_link_l' => 1,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 118,
            'controller_id' => 174,
            'controller_id_link' => 173,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'calculation_template_id',
            'parent_link_l' => 1,
            'table_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);


        /**/
        \App\Models\ControllerLink::create([
            'id' => 119,
            'controller_id' => 174,
            'controller_id_link' => 169,
            'table_field_name_composite' => NULL,
            'table_field_name' => 'extension_one_additional_detail_id',
            'parent_link_l' => 0,
            'table_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:36:50',
            'updated_at' => '2019-04-11 17:36:50',
        ]);

    }
}
