<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\DbAreaFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BLDownloadProfileController extends Controller
{
    public function card(Request $request)
    {

        $translations = $this->getTranslateByKeys(["TitleStep1"]);

        $db_area_files_controller = \App\Models\Controller::query()
            ->where("controller_code", "DbAreaFilesController")
            ->get()->first();

        $tabs = [
            ["tab_title"       => "Tab title",
             "blocks_quantity" => 1,
             "blocks"          => [
                 [
                     "block_title"         => "Block title",
                     "block_zone_quantity" => 1,
                     "block_model"         => $db_area_files_controller->controller_alias,
                     "block_type"          => "block_card",
                     "block_fields"        => [
                         //                         [
                         //                             'title'  => $translations['TitleStep1']['translation_captions']['caption_translation'],
                         //                             'model'  => '',
                         //                             'action' => '',
                         //                             'link'   => "",
                         //                             'type'   => 'title',
                         //                             'width'  => '100%',
                         //                             "zone"   => "1",
                         //                             "order"  => "4",
                         //
                         //                         ],
                         [
                             'title'  => "Скачать анкету",
                             'model'  => 'db_area_file_id',
                             "model_name"=>$db_area_files_controller->controller_alias,
                             'action' => 'download_att_file',
                             'link'   => "/admin/action/file/download",
                             'type'   => 'button',
                             'width'  => '50%',
                             "zone"   => "1",
                             "order"  => "4",

                         ],
                     ]
                 ]
             ]

            ]
        ];

        $controller = \App\Models\Controller::query()
            ->where("controller_code", "BlCustomerRequestsController")
            ->get()->first();

        $db_area_file = DbAreaFile::query()->where([
            "table_n_doc" => $controller->controller_table_n,
            "uid_1c_code" => "rbl_download_profile_file"
        ])->get()->first();


        return [
            "main_data_models" => [
                $db_area_files_controller->controller_alias => [
                    [
                        "db_area_file_id" => $db_area_file->id
                    ]
                ]
            ],
            //TODO Надо сделать чтобы не выводило вообще кнопки.
            "sets"             => [],

            "form_parameters" => [
                "form_title"                    => "",
                "form_code"                     => $db_area_files_controller->controller_alias,
                "disable_inputs"                => false,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $db_area_files_controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $translations['TitleStep1']['translation_captions']['caption_translation'],
                "hide_quotes"                   => true,
                "requires_saving"               => false,
                "form_type_list"                => [
                    "form_list_url" => "/serversDb",

                ],

            ],

            "tabs" => $tabs


        ];
    }
}
