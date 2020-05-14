<?php

namespace App\Http\Controllers\Api\AttachedFiles;

use App\Http\Controllers\Api\Controller;
use App\Models\AttachedDocumentKind;
use App\Models\AttachedDocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;

class AttachedDocumentKindController extends Controller
{
    public function list(Request $request){
        $currrentLang = Lang::locale();
        $methods = $request->accessMethods;
        $captionName= [
            'ok',
            'apply',
            'back', 'Main', 'kind', 'Type','Code',
            'Actual', 'KindsAttachedDocuments', 'DocumentsKinds', 'DocumentsTypes',
            'MaximumNumberOfFiles', 'HaveStandartTitles', 'DocumentKind', 'DocumentType'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $kinds = DB::table('AttachedDocumentKinds')
            ->join('AttachedDocumentTypes', 'AttachedDocumentKinds.att_doc_type_id', '=', 'AttachedDocumentTypes.id')
            ->get()->toArray();
//        $kinds = AttachedDocumentKind::with('attachDocumentType')->get()->toarray();
        $types = AttachedDocumentType::get()->toarray();
//        dd($kinds);
        $list =[
            "main_data_models" => [
                "Kinds" => $kinds,
            ],
            "add_data_models" => [
                "Types" => $types,
            ],
            "links" => [
                ["link_title" => $getArrayCaptions['DocumentsTypes']['translation_captions']['caption_translation'],
                    "link_url" => "/attachedType",
                    "class" => "link btn btn-link",
                    "link_type" => "internal",
                    "img" => ""
                ],
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['KindsAttachedDocuments']['translation_captions']['caption_translation'],
                "form_code" => "kinds",
                "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => "Kinds",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/kinds_new/",
                    "form_search_field" => "att_doc_kind_name",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => "Kinds",
                "dependent_fields" => [
                    "title" =>  $getArrayCaptions['DocumentType']['translation_captions']['caption_translation'],
                    "model" => "att_doc_type_id",
                    "type" => "lt-select",
                    "options" =>[],
                    "options_data" => [
                        "options_data_model"      => "Types",
                        "options_field_id"        => "id",
                        "options_field_id_value"  => "",
                        "options_field_title"     => "att_doc_type_name",
                         "search" => ''
                    ],
                    "width" => "100%"
                ]
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['kind']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => "Kinds",
                            "block_Kind" => "block_list_base",
                            "block_fields" => [
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', 'thStyle'=> 'width: 6%', "zone" => "1", "order" => "1"],
                                ['key' => 'att_doc_kind_code', 'sortable' => true, 'class' => 'att_doc_kind_code',
                                    "label"=> $getArrayCaptions['Code']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 18%', "zone" => "1", "order" => "2"],
                                ['key' => "att_doc_kind_name", 'sortable' => true, 'class' => "att_doc_kind_name",
                                    "label"=> $getArrayCaptions['DocumentKind']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 19%', "zone" => "1", "order" => "3"],
                                ['key' => "att_doc_type_name", 'sortable' => true, 'class' => "['attach_document_type'][0]['att_doc_type_name']",
                                    "label"=> $getArrayCaptions['DocumentType']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 19%', "zone" => "1", "order" => "4"],
                                ['key' => 'att_doc_files_quantity', 'sortable' => true, 'class' => 'att_doc_files_quantity',
                                    "label"=> $getArrayCaptions['MaximumNumberOfFiles']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 19%', "zone" => "1", "order" => "5"],
                                ['key' => 'use_file_titles_l', 'sortable' => true, 'class' => 'actual_l',
                                    "label"=> $getArrayCaptions['HaveStandartTitles']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 19%', "zone" => "1", "order" => "6"],
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return response()->json($list);
    }

    public function card(Request $request)
    {

        $methods = $request->accessMethods;

        $captionName= [
            'ok', 'apply', 'back', 'kind', 'Type', 'Code',
            'Actual', 'Main','CreationDetails',
            'CreationDetails','CreatedAt','CreatedBy',
            'UpdatedAt','UpdatedBy',
            'KindsAttachedDocuments', 'DocumentsKinds', 'DocumentsTypes',
            'MaximumNumberOfFiles', 'HaveStandartTitles', 'DocumentKind', 'DocumentType'
        ];
        $getArrayCaptions= $this->getTranslateByKeys($captionName);

        $kind = AttachedDocumentKind::with('attachDocumentType')
            ->where('id', $request->id)->get()->toArray();

        $kindColumnArray=[];
        $ColumnKind=[];
        foreach ($kind as $kindColumn){
//            dd($kindColumn);
            $kindColumn['att_doc_type_name'] =  $kindColumn['attach_document_type']['0']['att_doc_type_name'];

            $kindColumnArray[]= $kindColumn;

            $ColumnKind[]=[
                'id'=> $kindColumn['id'],
                'att_doc_kind_code'=> $kindColumn['att_doc_kind_code'],
                'att_doc_kind_name'=> $kindColumn['att_doc_kind_name'],
                'att_doc_type_name'=> $kindColumn['att_doc_type_name'],
                'att_doc_files_quantity'=> $kindColumn['att_doc_files_quantity'],
                'use_file_titles_l'=> $kindColumn['use_file_titles_l'],
                'created_at'=> $kindColumn['created_at'],
                'updated_at'=> $kindColumn['updated_at'],
                'created_by'=> $kindColumn['created_by'],
                'updated_by'=> $kindColumn['updated_by'],
            ];
        }


        $type = AttachedDocumentType::select('id','att_doc_type_name')->get()->toarray();

        foreach ($methods as $key=>$value){
            if (isset($value) and ($value == "read") ){
                $card =[
                    "main_data_models" => [
                        "Kind" => $ColumnKind
                    ],
                    "add_data_models" => [
                        "Types" => $type,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['DocumentKind']['translation_captions']['caption_translation'],
                        "form_code" => "kinds",
                        "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "Kinds",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $ColumnKind[0]['att_doc_type_name'],
                        "form_type_list" => [
                            "form_card_url" => "/kinds_new/",
                            "form_search_field" => "att_doc_kind_name",
                        ],
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "Kind",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['DocumentType']['translation_captions']['caption_translation'], 'model' => 'att_doc_type_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['DocumentKind']['translation_captions']['caption_translation'], 'model' => 'att_doc_kind_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['MaximumNumberOfFiles']['translation_captions']['caption_translation'], 'model' => 'att_doc_files_quantity', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'], 'model' => 'att_doc_kind_code', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4"],
                                        ['title' => $getArrayCaptions['HaveStandartTitles']['translation_captions']['caption_translation'], 'model' => 'use_file_titles_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "5"],
                                    ]
                                ],
                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Kind",
                                    "block_type" => "block_card",
                                    "block_fields" => [

                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
            if (isset($value) and  (($value == "update")) ){
                $card =[
                    "main_data_models" => [
                        "Kind" => $ColumnKind
                    ],
                    "add_data_models" => [
                        "Types" => $type,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['DocumentKind']['translation_captions']['caption_translation'],
                        "form_code" => "kinds",
                        "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "Kinds",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $ColumnKind[0]['att_doc_type_name'],
                        "form_type_list" => [
                            "form_card_url" => "/kinds_new/",
                            "form_search_field" => "att_doc_kind_name",
                        ],
                    ],
                    "actions" => [
                        "actions_card" => [
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/kind", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/kind", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 1,
                                    "block_model" => "Kind",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['DocumentType']['translation_captions']['caption_translation'], 'model' => 'att_doc_type_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['DocumentKind']['translation_captions']['caption_translation'], 'model' => 'att_doc_kind_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['MaximumNumberOfFiles']['translation_captions']['caption_translation'], 'model' => 'att_doc_files_quantity', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "3"],
                                        ['title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'], 'model' => 'att_doc_kind_code', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4"],
                                        ['title' => $getArrayCaptions['HaveStandartTitles']['translation_captions']['caption_translation'], 'model' => 'use_file_titles_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "5"],
                                    ]
                                ],
                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Kind",
                                    "block_type" => "block_card",
                                    "block_fields" => [

                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                                    ]
                                ]
                            ]
                        ]
                    ],

                ];
            }
        }
        return response()->json($card);
    }

}

