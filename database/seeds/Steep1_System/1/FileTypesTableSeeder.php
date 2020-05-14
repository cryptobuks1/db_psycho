<?php

use Illuminate\Database\Seeder;

class FileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FileType::truncate();


        /**/
        \App\Models\FileType::create([
            'id' => 1,
            'file_type_code' => 'jpg',
            'file_type_name' => 'JPG',
            'file_type_mime' => 'image/jpeg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 2,
            'file_type_code' => 'pdf',
            'file_type_name' => 'PDF',
            'file_type_mime' => 'application/pdf',
            'used_for_1c_reports_l' => 1,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 3,
            'file_type_code' => 'html',
            'file_type_name' => 'HTML - Page',
            'file_type_mime' => 'text/html',
            'used_for_1c_reports_l' => 1,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 4,
            'file_type_code' => 'png',
            'file_type_name' => 'PNG',
            'file_type_mime' => 'image/png',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 5,
            'file_type_code' => 'doc',
            'file_type_name' => 'Word 2003-2007 doc',
            'file_type_mime' => 'application/msword',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 6,
            'file_type_code' => 'docx',
            'file_type_name' => 'Word 2010 docx',
            'file_type_mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 7,
            'file_type_code' => 'xls',
            'file_type_name' => 'Excel 2003-2007 xls',
            'file_type_mime' => 'application/vnd.ms-excel',
            'used_for_1c_reports_l' => 1,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 8,
            'file_type_code' => 'xlsx',
            'file_type_name' => 'Excel 2010 xlsx',
            'file_type_mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 9,
            'file_type_code' => 'svg',
            'file_type_name' => 'Scalable Vector Graphics',
            'file_type_mime' => 'image/svg+xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 10,
            'file_type_code' => 'jpeg',
            'file_type_name' => 'JPEG',
            'file_type_mime' => 'image/jpeg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 11,
            'file_type_code' => 'xxx',
            'file_type_name' => '',
            'file_type_mime' => 'document/unknown',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 12,
            'file_type_code' => '3gp',
            'file_type_name' => '',
            'file_type_mime' => 'video/quicktime',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 13,
            'file_type_code' => '7z',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-7z-compressed',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 14,
            'file_type_code' => 'aac',
            'file_type_name' => '',
            'file_type_mime' => 'audio/aac',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 15,
            'file_type_code' => 'accdb',
            'file_type_name' => '',
            'file_type_mime' => 'application/msaccess',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 16,
            'file_type_code' => 'ai',
            'file_type_name' => '',
            'file_type_mime' => 'application/postscript',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 17,
            'file_type_code' => 'aif',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-aiff',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 18,
            'file_type_code' => 'aiff',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-aiff',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 19,
            'file_type_code' => 'aifc',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-aiff',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 20,
            'file_type_code' => 'applescript',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 21,
            'file_type_code' => 'asc',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 22,
            'file_type_code' => 'asm',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 23,
            'file_type_code' => 'au',
            'file_type_name' => '',
            'file_type_mime' => 'audio/au',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 24,
            'file_type_code' => 'avi',
            'file_type_name' => '',
            'file_type_mime' => 'video/x-ms-wm',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 25,
            'file_type_code' => 'bmp',
            'file_type_name' => '',
            'file_type_mime' => 'image/bmp',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 26,
            'file_type_code' => 'c',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 27,
            'file_type_code' => 'cct',
            'file_type_name' => '',
            'file_type_mime' => 'shockwave/director',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 28,
            'file_type_code' => 'cpp',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 29,
            'file_type_code' => 'cs',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-csh',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 30,
            'file_type_code' => 'css',
            'file_type_name' => '',
            'file_type_mime' => 'text/css',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 31,
            'file_type_code' => 'csv',
            'file_type_name' => '',
            'file_type_mime' => 'text/csv',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 32,
            'file_type_code' => 'dv',
            'file_type_name' => '',
            'file_type_mime' => 'video/x-dv',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 33,
            'file_type_code' => 'dmg',
            'file_type_name' => '',
            'file_type_mime' => 'application/octet-stream',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 34,
            'file_type_code' => 'bdoc',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-digidoc',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 35,
            'file_type_code' => 'cdoc',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-digidoc',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 36,
            'file_type_code' => 'ddoc',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-digidoc',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 37,
            'file_type_code' => 'docm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-word.document.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 38,
            'file_type_code' => 'dotx',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 39,
            'file_type_code' => 'dotm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-word.template.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 40,
            'file_type_code' => 'dcr',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-director',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 41,
            'file_type_code' => 'dif',
            'file_type_name' => '',
            'file_type_mime' => 'video/x-dv',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 42,
            'file_type_code' => 'dir',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-director',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 43,
            'file_type_code' => 'dxr',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-director',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 44,
            'file_type_code' => 'eps',
            'file_type_name' => '',
            'file_type_mime' => 'application/postscript',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 45,
            'file_type_code' => 'epub',
            'file_type_name' => '',
            'file_type_mime' => 'application/epub+zip',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 46,
            'file_type_code' => 'fdf',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.fdf',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 47,
            'file_type_code' => 'flac',
            'file_type_name' => '',
            'file_type_mime' => 'audio/flac',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 48,
            'file_type_code' => 'flv',
            'file_type_name' => '',
            'file_type_mime' => 'video/x-flv',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 49,
            'file_type_code' => 'f4v',
            'file_type_name' => '',
            'file_type_mime' => 'video/mp4',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 50,
            'file_type_code' => 'gallery',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-smarttech-notebook',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 51,
            'file_type_code' => 'galleryitem',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-smarttech-notebook',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 52,
            'file_type_code' => 'gallerycollection',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-smarttech-notebook',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 53,
            'file_type_code' => 'gdraw',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.google-apps.drawing',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 54,
            'file_type_code' => 'gdoc',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.google-apps.document',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 55,
            'file_type_code' => 'gsheet',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.google-apps.spreadsheet',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 56,
            'file_type_code' => 'gslides',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.google-apps.presentation',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 57,
            'file_type_code' => 'gif',
            'file_type_name' => '',
            'file_type_mime' => 'image/gif',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 58,
            'file_type_code' => 'gtar',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-gtar',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 59,
            'file_type_code' => 'tgz',
            'file_type_name' => '',
            'file_type_mime' => 'application/g-zip',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 60,
            'file_type_code' => 'gz',
            'file_type_name' => '',
            'file_type_mime' => 'application/g-zip',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 61,
            'file_type_code' => 'gzip',
            'file_type_name' => '',
            'file_type_mime' => 'application/g-zip',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 62,
            'file_type_code' => 'h',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 63,
            'file_type_code' => 'hpp',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 64,
            'file_type_code' => 'hqx',
            'file_type_name' => '',
            'file_type_mime' => 'application/mac-binhex40',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 65,
            'file_type_code' => 'htc',
            'file_type_name' => '',
            'file_type_mime' => 'text/x-component',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 66,
            'file_type_code' => 'xhtml',
            'file_type_name' => '',
            'file_type_mime' => 'application/xhtml+xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 67,
            'file_type_code' => 'htm',
            'file_type_name' => '',
            'file_type_mime' => 'text/html',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 68,
            'file_type_code' => 'ico',
            'file_type_name' => '',
            'file_type_mime' => 'image/vnd.microsoft.icon',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 69,
            'file_type_code' => 'ics',
            'file_type_name' => '',
            'file_type_mime' => 'text/calendar',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 70,
            'file_type_code' => 'isf',
            'file_type_name' => '',
            'file_type_mime' => 'application/inspiration',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 71,
            'file_type_code' => 'ist',
            'file_type_name' => '',
            'file_type_mime' => 'application/inspiration.template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 72,
            'file_type_code' => 'java',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 73,
            'file_type_code' => 'jar',
            'file_type_name' => '',
            'file_type_mime' => 'application/java-archive',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 74,
            'file_type_code' => 'jcb',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 75,
            'file_type_code' => 'jcl',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 76,
            'file_type_code' => 'jcw',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 77,
            'file_type_code' => 'jmt',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 78,
            'file_type_code' => 'jmx',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 79,
            'file_type_code' => 'jnlp',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-java-jnlp-file',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 80,
            'file_type_code' => 'jpe',
            'file_type_name' => '',
            'file_type_mime' => 'image/jpeg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 81,
            'file_type_code' => 'jqz',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 82,
            'file_type_code' => 'js',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-javascript',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 83,
            'file_type_code' => 'json',
            'file_type_name' => '',
            'file_type_mime' => 'application/json',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 84,
            'file_type_code' => 'latex',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-latex',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 85,
            'file_type_code' => 'm',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 86,
            'file_type_code' => 'mbz',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.moodle.backup',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 87,
            'file_type_code' => 'mdb',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-msaccess',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 88,
            'file_type_code' => 'mht',
            'file_type_name' => '',
            'file_type_mime' => 'message/rfc822',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 89,
            'file_type_code' => 'mhtml',
            'file_type_name' => '',
            'file_type_mime' => 'message/rfc822',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 90,
            'file_type_code' => 'mov',
            'file_type_name' => '',
            'file_type_mime' => 'video/quicktime',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 91,
            'file_type_code' => 'movie',
            'file_type_name' => '',
            'file_type_mime' => 'video/x-sgi-movie',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 92,
            'file_type_code' => 'mw',
            'file_type_name' => '',
            'file_type_mime' => 'application/maple',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 93,
            'file_type_code' => 'mws',
            'file_type_name' => '',
            'file_type_mime' => 'application/maple',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 94,
            'file_type_code' => 'm3u',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-mpegurl',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 95,
            'file_type_code' => 'mp3',
            'file_type_name' => '',
            'file_type_mime' => 'audio/mp3',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 96,
            'file_type_code' => 'mp4',
            'file_type_name' => '',
            'file_type_mime' => 'video/mp4',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 97,
            'file_type_code' => 'm4v',
            'file_type_name' => '',
            'file_type_mime' => 'video/mp4',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 98,
            'file_type_code' => 'm4a',
            'file_type_name' => '',
            'file_type_mime' => 'audio/mp4',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 99,
            'file_type_code' => 'mpeg',
            'file_type_name' => '',
            'file_type_mime' => 'video/mpeg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 100,
            'file_type_code' => 'mpe',
            'file_type_name' => '',
            'file_type_mime' => 'video/mpeg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 101,
            'file_type_code' => 'mpg',
            'file_type_name' => '',
            'file_type_mime' => 'video/mpeg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 102,
            'file_type_code' => 'mpr',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.moodle.profiling',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 103,
            'file_type_code' => 'nbk',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-smarttech-notebook',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 104,
            'file_type_code' => 'notebook',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-smarttech-notebook',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 105,
            'file_type_code' => 'odt',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.text',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 106,
            'file_type_code' => 'ott',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.text-template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 107,
            'file_type_code' => 'oth',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.text-web',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 108,
            'file_type_code' => 'odm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.text-master',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 109,
            'file_type_code' => 'odg',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.graphics',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 110,
            'file_type_code' => 'otg',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.graphics-template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 111,
            'file_type_code' => 'odp',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.presentation',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 112,
            'file_type_code' => 'otp',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.presentation-template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 113,
            'file_type_code' => 'ods',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.spreadsheet',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 114,
            'file_type_code' => 'ots',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.spreadsheet-template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 115,
            'file_type_code' => 'odc',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.chart',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 116,
            'file_type_code' => 'odf',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.formula',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 117,
            'file_type_code' => 'odb',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.database',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 118,
            'file_type_code' => 'odi',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.oasis.opendocument.image',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 119,
            'file_type_code' => 'oga',
            'file_type_name' => '',
            'file_type_mime' => 'audio/ogg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 120,
            'file_type_code' => 'ogg',
            'file_type_name' => '',
            'file_type_mime' => 'audio/ogg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 121,
            'file_type_code' => 'ogv',
            'file_type_name' => '',
            'file_type_mime' => 'video/ogg',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 122,
            'file_type_code' => 'pct',
            'file_type_name' => '',
            'file_type_mime' => 'image/pict',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 123,
            'file_type_code' => 'php',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 124,
            'file_type_code' => 'pic',
            'file_type_name' => '',
            'file_type_mime' => 'image/pict',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 125,
            'file_type_code' => 'pict',
            'file_type_name' => '',
            'file_type_mime' => 'image/pict',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 126,
            'file_type_code' => 'pps',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-powerpoint',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 127,
            'file_type_code' => 'ppt',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-powerpoint',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 128,
            'file_type_code' => 'pptx',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 129,
            'file_type_code' => 'pptm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 130,
            'file_type_code' => 'potx',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 131,
            'file_type_code' => 'potm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 132,
            'file_type_code' => 'ppam',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 133,
            'file_type_code' => 'ppsx',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 134,
            'file_type_code' => 'ppsm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 135,
            'file_type_code' => 'ps',
            'file_type_name' => '',
            'file_type_mime' => 'application/postscript',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 136,
            'file_type_code' => 'pub',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-mspublisher',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 137,
            'file_type_code' => 'qt',
            'file_type_name' => '',
            'file_type_mime' => 'video/quicktime',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 138,
            'file_type_code' => 'ra',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-realaudio-plugin',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 139,
            'file_type_code' => 'ram',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-pn-realaudio-plugin',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 140,
            'file_type_code' => 'rar',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-rar-compressed',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 141,
            'file_type_code' => 'rhb',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 142,
            'file_type_code' => 'rm',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-pn-realaudio-plugin',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 143,
            'file_type_code' => 'rmvb',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.rn-realmedia-vbr',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 144,
            'file_type_code' => 'rtf',
            'file_type_name' => '',
            'file_type_mime' => 'text/rtf',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 145,
            'file_type_code' => 'rtx',
            'file_type_name' => '',
            'file_type_mime' => 'text/richtext',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 146,
            'file_type_code' => 'rv',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-pn-realaudio-plugin',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 147,
            'file_type_code' => 'scss',
            'file_type_name' => '',
            'file_type_mime' => 'text/x-scss',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 148,
            'file_type_code' => 'sh',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-sh',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 149,
            'file_type_code' => 'sit',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-stuffit',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 150,
            'file_type_code' => 'smi',
            'file_type_name' => '',
            'file_type_mime' => 'application/smil',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 151,
            'file_type_code' => 'smil',
            'file_type_name' => '',
            'file_type_mime' => 'application/smil',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 152,
            'file_type_code' => 'sqt',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 153,
            'file_type_code' => 'svgz',
            'file_type_name' => '',
            'file_type_mime' => 'image/svg+xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 154,
            'file_type_code' => 'swa',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-director',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 155,
            'file_type_code' => 'swf',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-shockwave-flash',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 156,
            'file_type_code' => 'swfl',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-shockwave-flash',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 157,
            'file_type_code' => 'sxw',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.writer',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 158,
            'file_type_code' => 'stw',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.writer.template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 159,
            'file_type_code' => 'sxc',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.calc',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 160,
            'file_type_code' => 'stc',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.calc.template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 161,
            'file_type_code' => 'sxd',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.draw',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 162,
            'file_type_code' => 'std',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.draw.template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 163,
            'file_type_code' => 'sxi',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.impress',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 164,
            'file_type_code' => 'sti',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.impress.template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 165,
            'file_type_code' => 'sxg',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.writer.global',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 166,
            'file_type_code' => 'sxm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.sun.xml.math',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 167,
            'file_type_code' => 'tar',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-tar',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 168,
            'file_type_code' => 'tif',
            'file_type_name' => '',
            'file_type_mime' => 'image/tiff',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 169,
            'file_type_code' => 'tiff',
            'file_type_name' => '',
            'file_type_mime' => 'image/tiff',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 170,
            'file_type_code' => 'tex',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-tex',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 171,
            'file_type_code' => 'texi',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-texinfo',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 172,
            'file_type_code' => 'texinfo',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-texinfo',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 173,
            'file_type_code' => 'tsv',
            'file_type_name' => '',
            'file_type_mime' => 'text/tab-separated-values',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 174,
            'file_type_code' => 'txt',
            'file_type_name' => '',
            'file_type_mime' => 'text/plain',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 175,
            'file_type_code' => 'vtt',
            'file_type_name' => '',
            'file_type_mime' => 'text/vtt',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 176,
            'file_type_code' => 'wav',
            'file_type_name' => '',
            'file_type_mime' => 'audio/wav',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 177,
            'file_type_code' => 'webm',
            'file_type_name' => '',
            'file_type_mime' => 'video/webm',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 178,
            'file_type_code' => 'wmv',
            'file_type_name' => '',
            'file_type_mime' => 'video/x-ms-wmv',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 179,
            'file_type_code' => 'asf',
            'file_type_name' => '',
            'file_type_mime' => 'video/x-ms-asf',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 180,
            'file_type_code' => 'wma',
            'file_type_name' => '',
            'file_type_mime' => 'audio/x-ms-wma',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 181,
            'file_type_code' => 'xbk',
            'file_type_name' => '',
            'file_type_mime' => 'application/x-smarttech-notebook',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 182,
            'file_type_code' => 'xdp',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.adobe.xdp+xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 183,
            'file_type_code' => 'xfd',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.xfdl',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 184,
            'file_type_code' => 'xfdf',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.adobe.xfdf',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 185,
            'file_type_code' => 'xlsm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 186,
            'file_type_code' => 'xltx',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 187,
            'file_type_code' => 'xltm',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-excel.template.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 188,
            'file_type_code' => 'xlsb',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 189,
            'file_type_code' => 'xlam',
            'file_type_name' => '',
            'file_type_mime' => 'application/vnd.ms-excel.addin.macroEnabled.12',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 190,
            'file_type_code' => 'xml',
            'file_type_name' => '',
            'file_type_mime' => 'application/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 191,
            'file_type_code' => 'xsl',
            'file_type_name' => '',
            'file_type_mime' => 'text/xml',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);


        /**/
        \App\Models\FileType::create([
            'id' => 192,
            'file_type_code' => 'zip',
            'file_type_name' => '',
            'file_type_mime' => 'application/zip',
            'used_for_1c_reports_l' => 0,
            'image_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-16 12:00:00',
            'updated_at' => '2019-04-16 12:00:00',
        ]);

        if (config("database.default") == "pgsql")
            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_FileTypes_id_seq\"', 200, true)");

    }
}
