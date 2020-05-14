<?php

namespace App\Http\Controllers\Api\AttachedFiles;

use App\Http\Controllers\Api\Controller;
use App\Models\AttachedDocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;


class AttachedDocumentTypeController extends Controller
{
    public function list(Request $request){
        $currrentLang = Lang::locale();
        $methods = $request->accessMethods;
        $captionName= [
            'ok',
            'apply',
            'back', 'Main', 'Code', 'Type', 'Individual', 'kind',
            'Actual',
            'TypesAttachedDocuments', 'DocumentsKinds', 'DocumentsTypes',
            'MaximumNumberOfFiles', 'HaveStandartTitles', 'DocumentKind', 'DocumentType', 'Name'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $types = AttachedDocumentType::get()->toarray();

        $list =[
            "main_data_models" => [
                "Types" => $types
            ],
//            "links" => [
//                ["link_title" => $getArrayCaptions['DocumentsKinds']['translation_captions']['caption_translation'],
//                    "link_url" => "/attachedKind",
//                    "class" => "link btn btn-link",
//                    "link_type" => "internal",
//                    "img" => ""
//                ],
//            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['TypesAttachedDocuments']['translation_captions']['caption_translation'],
                "form_code" => "kinds",
                "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => "Types",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/types_new/",
                    "form_search_field" => "types_new",
                ],
            ],
            "dependent" => [
                "dependent_data_model" => "",
                "dependent_fields" => [
//                    "title" =>  $getArrayCaptions['Type']['translation_captions']['caption_translation'],
                    "model" => "",
                    "type"  => "label",
                    "width" => "100%"
                ]
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['Type']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => "Types",
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', 'thStyle'=> 'width: 6%', "zone" => "1", "order" => "1"],
                                ['key' => 'att_doc_type_name', 'sortable' => true, 'class' => 'att_doc_type_name',
                                    "label"=> $getArrayCaptions['Name']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 47%', "zone" => "1", "order" => "2"],
                                ['key' => 'att_doc_type_code', 'sortable' => true, 'class' => 'att_doc_type_code',
                                    "label"=> $getArrayCaptions['Code']['translation_captions']['caption_translation'] , 'thStyle'=> 'width: 47%', "zone" => "1", "order" => "5"],
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return response()->json($list);
    }

    public function card(Request $request) {


        $methods = $request->accessMethods;

        $captionName= [
            'ok',
            'apply',
            'back', 'Main', 'kind', 'Type','Code', 'DocumentType',
            'Actual', 'SystemDetails', 'CreatedAt','CreatedBy',
            'UpdatedAt','UpdatedBy', 'Name', 'TypesAttachedDocuments'
        ];

        $getArrayCaptions= $this->getTranslateByKeys($captionName);

        $Types = DB::table('AttachedDocumentTypes')
            ->where('AttachedDocumentTypes.id',$request->id)
            ->get()->toarray();


        foreach ($methods as $key=>$value){
            if (isset($value) and ($value == "read") ){
                $card = [
                    "main_data_models" => [
                        "Types" => $Types,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['DocumentType']['translation_captions']['caption_translation'],
                        "form_code" => "types",
                        "form_is_dependent" => false,
                        "form_type" => "card",
                        "form_base_data_model" => "Types",
                        "form_main_data_model_id_field" => "id",
                        "form_type_list" => [
                            "form_list_url" => "types",
                        ],
                    ],
                    "actions" => [
                        "actions_card" =>
                            [
                                ["title" =>$getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" =>[
                                [
                                    "block_title" =>$getArrayCaptions['TypesAttachedDocuments']['translation_captions']['caption_translation'] ,
                                    "block_zone_quantity" => 1,
                                    "block_model" => "Types",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        [
                                            'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                            'model' => 'att_doc_type_name',
                                            'width' =>'50%',
                                            'type'=>'label',
                                            'zone'=>'1',
                                            'order'=>'1'
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'] ,
                                            'model' => 'att_doc_type_code',
                                            'width' =>'50%',
                                            'type'=>'label',
                                            'zone'=>'1',
                                            'order'=>'2'
                                        ],
                                    ]
                                ]

                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Types",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        [
                                            'title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                            'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                            "order" => "1"
                                        ],
                                        [
                                            'title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                            'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                            "order" => "2"
                                        ],
                                        [
                                            'title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                            'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                            "order" => "1"
                                        ],
                                        [
                                            'title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                            'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                            "order" => "2"
                                        ],
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }

            if (isset($value) and ($value == "update") ){
                $card = [
                    "main_data_models" => [
                        "Types" => $Types,
                    ],
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['DocumentType']['translation_captions']['caption_translation'],
                        "form_code" => "types",
                        "form_is_dependent" => false,
                        "form_type" => "card",
                        "form_base_data_model" => "Types",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $Types['0']->att_doc_type_name,
                        "form_type_list" => [
                            "form_card_url" => "/types/",
                            "form_search_field" => "att_doc_type_name",
                        ],
                    ],
                    "actions" => [
                        "actions_card" =>
                            [
                                ["title" =>$getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "admin/db/update", "img" => ""],
                                ["title" =>$getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "admin/db/update", "img" => ""],
                                ["title" =>$getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            ]
                    ],
                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Types",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        [
                                            'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                            'model' => 'att_doc_type_name',
                                            'width' =>'50%',
                                            'type'=>'label',
                                            'zone'=>'1',
                                            'order'=>'1'
                                        ],
                                        [
                                            'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'] ,
                                            'model' => 'att_doc_type_code',
                                            'width' =>'50%',
                                            'type'=>'label',
                                            'zone'=>'1',
                                            'order'=>'2'
                                        ],
                                    ]
                                ]
                            ]
                        ],
                        [
                            "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Types",
                                    "block_type" => "block_card",
                                    "block_fields" => [
                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                            'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                            "order" => "1"
                                        ],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                            'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                            "order" => "2"
                                        ],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                            'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                            "order" => "1"
                                        ],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                            'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                            "order" => "2"
                                        ],
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }
        return response()->json($card);
    }
}
