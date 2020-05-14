<?php

use Illuminate\Database\Seeder;

class FeSetsItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\FeSetsItem::truncate();


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 4,
            'fe_item_id' => 4,
            'fe_set_id' => 2,
            'image_id' => NULL,
            'action_type_id' => 10,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'deleteMark',
            'fe_set_item_name' => 'deleteMark',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'DeletedL',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 5,
            'fe_item_id' => 4,
            'fe_set_id' => 2,
            'image_id' => NULL,
            'action_type_id' => 34,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'unDeleteMark',
            'fe_set_item_name' => 'UnDeleteMark',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'UnDeleteMark',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 6,
            'fe_item_id' => 4,
            'fe_set_id' => 2,
            'image_id' => NULL,
            'action_type_id' => 35,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'actual',
            'fe_set_item_name' => 'actual',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Actual',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 7,
            'fe_item_id' => 4,
            'fe_set_id' => 2,
            'image_id' => NULL,
            'action_type_id' => 36,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'unActual',
            'fe_set_item_name' => 'UnActual',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'UnActual',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 8,
            'fe_item_id' => 4,
            'fe_set_id' => 3,
            'image_id' => 10,
            'action_type_id' => 12,
            'fe_css_class_id' => 3,
            'fe_set_item_code' => 'filter',
            'fe_set_item_name' => 'filter',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 1,
            'caption_code' => 'Filter',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 9,
            'fe_item_id' => 2,
            'fe_set_id' => 4,
            'image_id' => 29,
            'action_type_id' => NULL,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'search',
            'fe_set_item_name' => 'search',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Search',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 10,
            'fe_item_id' => 4,
            'fe_set_id' => 3,
            'image_id' => NULL,
            'action_type_id' => 2,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'add',
            'fe_set_item_name' => 'Add',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Create',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 11,
            'fe_item_id' => 4,
            'fe_set_id' => 1,
            'image_id' => NULL,
            'action_type_id' => 8,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'ok',
            'fe_set_item_name' => 'ok',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'ok',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 12,
            'fe_item_id' => 4,
            'fe_set_id' => 1,
            'image_id' => NULL,
            'action_type_id' => 8,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'apply',
            'fe_set_item_name' => 'apply',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'apply',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 13,
            'fe_item_id' => 4,
            'fe_set_id' => 1,
            'image_id' => NULL,
            'action_type_id' => NULL,
            'fe_css_class_id' => 5,
            'fe_set_item_code' => 'back',
            'fe_set_item_name' => 'back',
            'line_n' => '3',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'back',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 14,
            'fe_item_id' => 4,
            'fe_set_id' => 2,
            'image_id' => NULL,
            'action_type_id' => 32,
            'fe_css_class_id' => 5,
            'fe_set_item_code' => 'download',
            'fe_set_item_name' => 'download',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 1,
            'caption_code' => 'DownloadAll',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 15,
            'fe_item_id' => 4,
            'fe_set_id' => 2,
            'image_id' => NULL,
            'action_type_id' => 33,
            'fe_css_class_id' => 5,
            'fe_set_item_code' => 'upload',
            'fe_set_item_name' => 'upload',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 1,
            'caption_code' => 'upload',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 16,
            'fe_item_id' => 1,
            'fe_set_id' => 6,
            'image_id' => NULL,
            'action_type_id' => NULL,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'items_per_page',
            'fe_set_item_name' => 'items_per_page',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 17,
            'fe_item_id' => 1,
            'fe_set_id' => 5,
            'image_id' => NULL,
            'action_type_id' => NULL,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'items_per_page',
            'fe_set_item_name' => 'items_per_page',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 18,
            'fe_item_id' => 3,
            'fe_set_id' => 5,
            'image_id' => NULL,
            'action_type_id' => NULL,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'pagination',
            'fe_set_item_name' => 'pagination',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => '',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 19,
            'fe_item_id' => 4,
            'fe_set_id' => 2,
            'image_id' => NULL,
            'action_type_id' => 3,
            'fe_css_class_id' => 5,
            'fe_set_item_code' => 'delete',
            'fe_set_item_name' => 'delete',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Delete',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 20,
            'fe_item_id' => 4,
            'fe_set_id' => 9,
            'image_id' => NULL,
            'action_type_id' => 3,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'delete',
            'fe_set_item_name' => 'delete',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Delete',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:00',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 21,
            'fe_item_id' => 4,
            'fe_set_id' => 10,
            'image_id' => NULL,
            'action_type_id' => 2,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'add_section',
            'fe_set_item_name' => 'add section',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'AddSection',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:01',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 22,
            'fe_item_id' => 4,
            'fe_set_id' => 10,
            'image_id' => NULL,
            'action_type_id' => 2,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'add_article',
            'fe_set_item_name' => 'add article',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'AddArticle',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:02',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 23,
            'fe_item_id' => 4,
            'fe_set_id' => 10,
            'image_id' => NULL,
            'action_type_id' => NULL,
            'fe_css_class_id' => 2,
            'fe_set_item_code' => 'expand_all',
            'fe_set_item_name' => 'expand all',
            'line_n' => '3',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'ExpandAll',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:03',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 24,
            'fe_item_id' => 4,
            'fe_set_id' => 10,
            'image_id' => NULL,
            'action_type_id' => NULL,
            'fe_css_class_id' => 2,
            'fe_set_item_code' => 'collapse_all',
            'fe_set_item_name' => 'collapse all',
            'line_n' => '4',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'CollapseAll',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:04',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 25,
            'fe_item_id' => 4,
            'fe_set_id' => 11,
            'image_id' => 45,
            'action_type_id' => 2,
            'fe_css_class_id' => 7,
            'fe_set_item_code' => 'add_article',
            'fe_set_item_name' => 'add article',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'AddArticle',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:05',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 26,
            'fe_item_id' => 4,
            'fe_set_id' => 11,
            'image_id' => 46,
            'action_type_id' => 8,
            'fe_css_class_id' => 7,
            'fe_set_item_code' => 'edit_section',
            'fe_set_item_name' => 'edit section',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Edit',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:06',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 27,
            'fe_item_id' => 4,
            'fe_set_id' => 12,
            'image_id' => 46,
            'action_type_id' => 8,
            'fe_css_class_id' => 7,
            'fe_set_item_code' => 'edit_article',
            'fe_set_item_name' => 'edit article',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Edit',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:07',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 28,
            'fe_item_id' => 4,
            'fe_set_id' => 13,
            'image_id' => NULL,
            'action_type_id' => 33,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'add_att_file',
            'fe_set_item_name' => 'add attached file',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Add',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:08',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 29,
            'fe_item_id' => 4,
            'fe_set_id' => 13,
            'image_id' => 21,
            'action_type_id' => 32,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'download_att_file',
            'fe_set_item_name' => 'download attached file',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Download',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:09',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 30,
            'fe_item_id' => 4,
            'fe_set_id' => 13,
            'image_id' => 49,
            'action_type_id' => 32,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'preview_att_file',
            'fe_set_item_name' => 'preview attached file',
            'line_n' => '3',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Preview',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:10',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 31,
            'fe_item_id' => 4,
            'fe_set_id' => 13,
            'image_id' => 27,
            'action_type_id' => 3,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'delete_att_file',
            'fe_set_item_name' => 'delete attached file',
            'line_n' => '4',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Delete',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 32,
            'fe_item_id' => 4,
            'fe_set_id' => 3,
            'image_id' => NULL,
            'action_type_id' => 42,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'receive_documents',
            'fe_set_item_name' => 'Receive Documents',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 1,
            'caption_code' => 'ReceiveDocuments',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 33,
            'fe_item_id' => 4,
            'fe_set_id' => 3,
            'image_id' => NULL,
            'action_type_id' => 30,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'receive_documents_request',
            'fe_set_item_name' => 'Receive Documents Request',
            'line_n' => '3',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 1,
            'caption_code' => 'ReceiveDocuments',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 34,
            'fe_item_id' => 4,
            'fe_set_id' => 14,
            'image_id' => NULL,
            'action_type_id' => 30,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'receive_documents_request',
            'fe_set_item_name' => 'Receive Documents Request',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'ReceiveDocuments',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 35,
            'fe_item_id' => 4,
            'fe_set_id' => 14,
            'image_id' => NULL,
            'action_type_id' => NULL,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'back',
            'fe_set_item_name' => 'Back',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Cancel',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 36,
            'fe_item_id' => 4,
            'fe_set_id' => 2,
            'image_id' => NULL,
            'action_type_id' => 28,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'delete_all',
            'fe_set_item_name' => 'Delete All Rows',
            'line_n' => '5',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 1,
            'caption_code' => 'DeleteAll',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 37,
            'fe_item_id' => 4,
            'fe_set_id' => 15,
            'image_id' => NULL,
            'action_type_id' => 8,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'save',
            'fe_set_item_name' => 'Save',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Save',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 38,
            'fe_item_id' => 4,
            'fe_set_id' => 16,
            'image_id' => 21,
            'action_type_id' => 32,
            'fe_css_class_id' => NULL,
            'fe_set_item_code' => 'download_att_file',
            'fe_set_item_name' => 'download attached file',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Download',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 39,
            'fe_item_id' => 4,
            'fe_set_id' => 17,
            'image_id' => NULL,
            'action_type_id' => 2,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'add',
            'fe_set_item_name' => 'Add',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Create',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 40,
            'fe_item_id' => 4,
            'fe_set_id' => 18,
            'image_id' => NULL,
            'action_type_id' => 15,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'send_request',
            'fe_set_item_name' => 'Send Request',
            'line_n' => '2',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Send',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 41,
            'fe_item_id' => 4,
            'fe_set_id' => 18,
            'image_id' => NULL,
            'action_type_id' => 8,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'save',
            'fe_set_item_name' => 'Save',
            'line_n' => '3',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'Save',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);


        /**/
        \App\Models\FeSetsItem::create([
            'id' => 42,
            'fe_item_id' => 4,
            'fe_set_id' => 18,
            'image_id' => NULL,
            'action_type_id' => NULL,
            'fe_css_class_id' => 1,
            'fe_set_item_code' => 'back',
            'fe_set_item_name' => 'back',
            'line_n' => '1',
            'execute_fe_action_l' => 1,
            'use_fe_set_item_controller_l' => 0,
            'caption_code' => 'back',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:11',
        ]);

    }
}
